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

    protected $fillable = [
        'question',
    ];
}
