<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lyric extends Model
{
    public $timestamps = false;
    
    static public function viewLyric($lyric_id) {
        $lyric = Lyric::findOrFail($lyric_id);
        $lyric->views ++;
        $lyric->save();
    }

    static public function getLyricByID($lyric_id) {
        return Lyric::findOrFail($lyric_id);
    }
}
