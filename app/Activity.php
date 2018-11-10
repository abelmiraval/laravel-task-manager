<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['nombre','priority'];

    public function Categories()
    {
        return $this->hasMany('category');
    }

}
