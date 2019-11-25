<?php

namespace App;
use App\Quiz;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function quiz() {
        return $this->hasOne('App\Quiz');
    }

    public function choix() {
        return $this->hasMany(choix::class, 'id', 'question_id');
    }

    protected $fillable = [
        'question',
    ];
}
