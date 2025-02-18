<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    public function index()
    {
        // Fetch images along with user details
        $data = Media::where('type', 'image')
            ->join('users', 'media.user_id', '=', 'users.id')
            ->select('media.*', 'users.first', 'users.last', 'users.email')
            ->get();

        return view('images', compact('data'));
    }
}
