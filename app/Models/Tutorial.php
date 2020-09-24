<?php

namespace App\Models;

use App\Models\Paragraphs\BackgroundVideo;
use App\Models\Paragraphs\Headline;
use App\Models\Paragraphs\NormalText;
use App\Models\Paragraphs\CenterText;
use App\Models\Paragraphs\TextImage;
use App\Models\Paragraphs\TextWithBigFont;
use App\Models\Paragraphs\TextWithHighImage;
use App\Models\Paragraphs\TextWithLogo;
use App\Models\Paragraphs\TxtSpecialImg;
use App\Models\Paragraphs\Video;
use App\Models\Paragraphs\VideoSlider;
use App\Models\Paragraphs\VideoWithText;
use App\Models\Pivots\TutorialAssignee as TutorialAssigneePivot;
use App\Models\Pivots\TutorialCompanycategory as TutorialCompanycategoryPivot;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paragraph;
use Illuminate\Support\Facades\Auth;

class Tutorial extends Model
{
    protected $fillable = [
        'name', 'tutorial_background', 'parent_tutorial_id', 'category_id', 'company_id', 'sortorder', 'progress'
    ];

    /**
     * Get the categories of the tutorial
     */
    final public function categories() {
        return $this->belongsToMany('App\Models\Companycategory', 'tutorial_companycategory', 'tutorial_id', 'category_id');
    }

    /**
     * Get the assignees of the tutorial
     */
    final public function assignees() {
        return $this->belongsToMany('App\User', 'tutorial_assignee', 'tutorial_id', 'assignee_id');
    }

    /**
     * Get the paragraphs of the tutorial
     */
    final public function paragraphs() {
        return $this->hasMany('App\Models\Paragraph');
    }

    /**
     * Delete all tutorial categories
     */
    final public function deleteAllCategories():void {
        $categories = $this->categories()->get()->toArray();
        foreach($categories as $category){
            TutorialCompanycategoryPivot::where('tutorial_id', $this->id)
                ->where('category_id', $category['id'])->delete();
        }
    }

    /**
     * Delete all tutorial assignees
     */
    final public function deleteAllAssignees():void {
        $assignees = $this->assignees()->get()->toArray();
        foreach($assignees as $assignee){
            TutorialAssigneePivot::where('tutorial_id', $this->id)
                ->where('assignee_id', $assignee['id'])->delete();
        }
    }

    /**
     * Delete all tutorial paragraphs
     */
    final public function deleteAllParagraphs():void {
        $paragraphs = $this->paragraphs()->get()->toArray();
        foreach($paragraphs as $paragraph){
            // 1. Delete paragraph data
            $this->deleteParagraphData($paragraph);

            // 2. Delete paragraph relation to tutorial
            Paragraph::find($paragraph['id'])->delete();
        }
    }

    /**
     * Delete paragraph data
     * @param array $paragraph
     */
    final public function deleteParagraphData(array $paragraph):void {
        switch ($paragraph['paragraph_type']) {
            //Text Layouts
            case 'Headline':
                Headline::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'NormalText':
                NormalText::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'CenterText':
                CenterText::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'TextWithBigFont':
                TextWithBigFont::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'TextWithLogo':
                TextWithLogo::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'TextImg':
                TextImage::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'TxtSpecialImg':
                TxtSpecialImg::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'TextWithHighImage':
                TextWithHighImage::where('paragraph_id', $paragraph['id'])->delete();
                break;
            //Text Layouts

            //Video Layouts
            case 'Video':
                Video::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'BackgroundVideo':
                BackgroundVideo::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'VideoWithText':
                VideoWithText::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'VideoSlider':
                VideoSlider::where('paragraph_id', $paragraph['id'])->delete();
                break;
            //Video Layouts

            //Image Layouts

            //Image Layouts

            //Other Layouts

            //Other Layouts

            default:
                break;
        }
    }

    /**
     * Update tutorials sortorder
     * @param int $oldIndex
     * @param int $newIndex
     */
    final public function updateTutorialsSortorder(int $oldIndex, int $newIndex):void {
        // 1. Searching for a tutorial into which place we are moving current tutorial
        $targetTutorial = self::where('parent_tutorial_id', $this->parent_tutorial_id)
            ->where('company_id', $this->company_id)
            ->orderBy('sortorder')
            ->get()[$newIndex];

        // 2. Saving sortorder value of target tutorial for future for our current tutorial, because it will be changed
        // when tutorials sortorders will be updated
        $currentTutorialNewSortorder = $targetTutorial->sortorder;

        // 3. We are searching all tutorials between to update their sortorders(they have to be moved up or down)
        if($oldIndex > $newIndex){
            $tutorialsInRange = self::where('parent_tutorial_id', $this->parent_tutorial_id)
                ->where('company_id', $this->company_id)
                ->where('sortorder', '>=', $targetTutorial->sortorder)
                ->where('sortorder', '<', $this->sortorder)
                ->orderBy('sortorder')
                ->get();

            // 4. increasing sortorder of each tutorial up by 1
            foreach($tutorialsInRange as $tutorial){
                $tutorial->sortorder++;
                $tutorial->save();
            }
        } else {
            $tutorialsInRange = self::where('parent_tutorial_id', $this->parent_tutorial_id)
                ->where('company_id', $this->company_id)
                ->where('sortorder', '<=', $targetTutorial->sortorder)
                ->where('sortorder', '>', $this->sortorder)
                ->orderBy('sortorder')
                ->get();

            // 4. decreasing sortorder of each tutorial down by 1
            foreach($tutorialsInRange as $tutorial){
                $tutorial->sortorder--;
                $tutorial->save();
            }
        }

        // 5. Setting current tutorial our previous saved sortorder value of target tutorial
        $this->sortorder = $currentTutorialNewSortorder;
        $this->save();
    }

    /**
     * Delete tutorial
     */
    final public function deleteTutorial():void {
        // 1. Delete tutorial assignees(who have permission to view it)
        $this->deleteAllAssignees();

        // 2. Delete all tutorial categories
        $this->deleteAllCategories();

        // 3. Delete all tutorial paragraph blocks
        $this->deleteAllParagraphs();

        // 4. Delete tutorial
        $this->delete();
    }

    /**
     * Delete tutorial with all child tutorials
     */
    final public function deleteRecursively():void {
        $childTutorials = $this::where('parent_tutorial_id', $this->id)->get();
        foreach($childTutorials as $tutorial){
            $tutorial->deleteRecursively();
        }
        $this->deleteTutorial();
    }

    final public function userCompletedTutorial(int $tutorialId, int $userId):bool {
        $tutorialUserCompletion = TutorialUserCompletion::where('user_id', $userId)
            ->where('tutorial_id', $tutorialId)
            ->get()
            ->count();

        if($tutorialUserCompletion === 0){
            TutorialUserCompletion::create([
                'user_id' => $userId,
                'tutorial_id' => $tutorialId,
                'completion' => 'completed',
            ]);
        }

        return true;
    }

    final public function getNextCompanyTutorialId($currentTutorialId){
        $user = Auth::user();
        $userCompany = $user->company();
        $userCompanyTutorials = $userCompany->tutorials;
        $userCompanyTutorialsNested = [];
        foreach($userCompanyTutorials->toArray() as $tutorial){
            if($tutorial['parent_tutorial_id'] === 0){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                    'count' => count($userCompanyTutorialsNested),


                ];

                $resChildren = $this->getTutorialChildren($userCompanyTutorials->toArray(), $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;


                }
                $userCompanyTutorialsNested[] = $resTutorial;
            }
        }

        return $this->searchNextTutorialIdRecursively($userCompanyTutorialsNested, $currentTutorialId);
    }

    final public function getTutorialChildren(array $tutorials, int $tutorialId):array {
        $resTutorials = [];

        foreach($tutorials as $tutorial){
            if($tutorial['parent_tutorial_id'] === $tutorialId){
                $resTutorial = [
                    'id' => $tutorial['id'],
                    'label' => $tutorial['name'],
                ];
                $resChildren = $this->getTutorialChildren($tutorials, $tutorial['id']);
                if($resChildren){
                    $resTutorial['children'] = $resChildren;
                }

                $resTutorials[] = $resTutorial;
            }
        }

        return $resTutorials;
    }

    final public function searchNextTutorialIdRecursively(array $tutorials, int $currentTutorialId, bool $returnId = false){
        foreach($tutorials as $tutorial){
            //dump($tutorial['id']);
            //dump($returnId);

            if($returnId){
                return $tutorial['id'];
            }

            if($tutorial['id'] === $currentTutorialId){
                $returnId = true;
            }

            if(isset($tutorial['children'])){
                $res = $this->searchNextTutorialIdRecursively($tutorial['children'], $currentTutorialId, $returnId);
                if($res){
                    return $res;
                }
            }
        }
    }

    final public function getTutorialBreadcrumb(){
        return $this->getTutorialBreadcrumbRecursive([], $this);
    }

    final public function getTutorialBreadcrumbRecursive(array $breadcrumb, $tutorial): array{
        $breadcrumb[] = ['name' => $tutorial->name, 'id' => $tutorial->id];

        if($tutorial->parent_tutorial_id === 0){
            return array_reverse($breadcrumb);
        }

        $parentTutorial = self::find($tutorial->parent_tutorial_id);

        return $this->getTutorialBreadcrumbRecursive($breadcrumb, $parentTutorial);
    }

    final public function isCompleted():bool {
        $user = Auth::user();

        $progressObj = TutorialUserCompletion::where([
            'user_id' => $user['id'],
            'tutorial_id' => $this->id,
        ])->get('completion')->first();

        return $progressObj !== null && $progressObj->completion === 'completed';
    }
}
