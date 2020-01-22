<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';

    public function user() {
        return $this->hasOne('App\User');
    }

    public function questions() {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }
    public function question() {
        return $this->hasOne(Question::class, 'quiz_id', 'id');
    }

    protected $fillable = [
        'titre',
        'theme',
        'joues',
    ];

    public static function boot() {
        parent::boot();
        static::deleting(function($quiz) {
            foreach($quiz->questions as $question)
            $question->delete();
        });
    }
}
