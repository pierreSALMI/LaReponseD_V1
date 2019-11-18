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

    protected $fillable = [
        'titre',
        'theme',
        'Q1',
        'Q2',
        'Q3',
        'Q4',
        'Q5',
    ]
}
