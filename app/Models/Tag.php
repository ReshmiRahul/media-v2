<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags'; // Optional if following naming convention

    public function media()
    {
        return $this->belongsToMany(\App\Models\Media::class, 'media_tag', 'tag_id', 'medium_id');
    }
}
