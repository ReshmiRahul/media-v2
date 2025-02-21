<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\DB;

class AudiosController extends Controller
{
    public function index()
    {
        // Fetch audios along with user details
        $data = Media::where('type', 'audio')
            ->join('users', 'media.user_id', '=', 'users.id')
            ->select('media.*', 'users.first', 'users.last', 'users.email')
            ->get();

        return view('audios', compact('data'));
    }
}
