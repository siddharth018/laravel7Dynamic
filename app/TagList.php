<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagList extends Model
{
     public $table = "tagslist";
     public $fillable = ['name'];
}
