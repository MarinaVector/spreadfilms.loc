<?php

namespace App\Models;

use App\Models\Paragraphs\NormalText;
use App\Models\Paragraphs\TextImage;
use App\Models\Pivots\TutorialAssignee as TutorialAssigneePivot;
use App\Models\Pivots\TutorialCompanycategory as TutorialCompanycategoryPivot;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paragraph;

class Tutorial extends Model
{
    protected $fillable = [
        'name', 'tutorial_background', 'parent_tutorial_id', 'category_id', 'company_id', 'sortorder'
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
            case 'NormalText':
                NormalText::where('paragraph_id', $paragraph['id'])->delete();
                break;
            case 'TxtImg':
                TextImage::where('paragraph_id', $paragraph['id'])->delete();
                break;
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
        $secondTutorial = $this::where('parent_tutorial_id', $this->parent_tutorial_id)
            ->where('company_id', $this->company_id)
            ->where('sortorder', $newIndex + 1)
            ->first();
        $secondTutorial->sortorder = $oldIndex + 1;
        $secondTutorial->save();
        $this->sortorder = $newIndex + 1;
        $this->save();
    }
}
