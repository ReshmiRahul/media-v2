<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $table = 'media'; // Explicitly specify the table name

    // Define a many-to-many relationship with Tag using the pivot table 'media_tag'
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'media_tag', 'medium_id', 'tag_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by'); // Ensure 'uploaded_by' is the correct foreign key
    }
}
