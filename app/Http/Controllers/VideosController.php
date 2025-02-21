<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    public function index()
    {
        // Fetch videos along with user details
        $data = Media::where('type', 'video')
            ->join('users', 'media.user_id', '=', 'users.id')
            ->select('media.*', 'users.first', 'users.last', 'users.email')
            ->get();

        return view('videos', compact('data'));
    }
}
