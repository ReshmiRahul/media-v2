<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Media;

class HomeController extends Controller
{
    public function index()
{
    $tags = Tag::all();

    // Fetch media with user details using Eloquent relationships
    $mediaItems = Media::with('user')->where('type', 'image')->get();

    return view('home', [
        'tags' => $tags,
        'mediaItems' => $mediaItems
    ]);
}

public function search(Request $request)
{
    $type = $request->input('type', 'image'); // Default to image
    $tagId = $request->input('tag');

    $mediaItems = Media::with('user')
        ->where('type', $type)
        ->whereHas('tags', function ($query) use ($tagId) {
            $query->where('id', $tagId);
        })
        ->get();

    return view('search-results', [
        'mediaItems' => $mediaItems,
        'type' => $type
    ]);
}

}