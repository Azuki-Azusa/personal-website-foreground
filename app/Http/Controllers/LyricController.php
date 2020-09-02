<?php

namespace App\Http\Controllers;
use App\Lyric;

use Illuminate\Http\Request;

class LyricController extends Controller
{

    public function lyric($lyric_id)
    {
        Lyric::viewLyric($lyric_id);
        return view('lyric', ['lyric' => Lyric::getLyricByID($lyric_id)]);
    }
}
