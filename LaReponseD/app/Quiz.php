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
        return $this->hasMany(Question::class, 'id', 'quiz_id');
    }

    protected $fillable = [
        'titre',
        'theme',
    ];
}
