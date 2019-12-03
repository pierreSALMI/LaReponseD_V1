<?php

namespace App;
use App\Quiz;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function quiz()
    {
        return $this->hasOne('App\Quiz');
    }

    public function choix()
    {
        return $this->hasOne(Choix::class, 'question_id', 'id');
    }

    protected $fillable = [
        'question',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($question) {
            $question->choix->delete();
        });
    }
}
