<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'name', 'tutorial_background', 'parent_tutorial_id', 'category_id', 'company_id'
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
}
