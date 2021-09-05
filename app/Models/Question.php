<?php

namespace APDS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question_text', 
        'code_snippet', 
        'answer_explanation', 
        'more_info_link', 
        'topic_id'
    ];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \APDS\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTopicIdAttribute($input)
    {
        $this->attributes['topic_id'] = $input ? $input : null;
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id')->withTrashed();
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }
}
