<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candy extends Model
{
    protected $table = 'candy';

    protected $fillable = [
        'name',
        'maker',
        'style',
        'taste',
        'url'
    ];

    public function category(){
        return $this->belongsToMany('App\Category')->withTimeStamps();
    }


}
