<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media'; // Explicitly specify the table name

    // Define a many-to-many relationship with Tag using the pivot table 'media_tag'
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'media_tag', 'medium_id', 'tag_id');
    }
}
