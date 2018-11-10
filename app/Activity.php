<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = ['nombre','priority','category_id'];

    public function Categories()
    {
        return $this->hasMany('category');
    }

}
