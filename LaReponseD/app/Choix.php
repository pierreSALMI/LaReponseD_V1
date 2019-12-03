<?php

namespace App;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    protected $table = 'choix';

    public function question() {
        return $this->hasOne('App\Question');
    }

    protected $fillable = [
        'choix0',
        'choix1',
        'choix2',
        'choix3',
    ];

}
