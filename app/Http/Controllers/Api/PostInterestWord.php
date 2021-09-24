<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestWord;

class PostInterestWord extends Controller
{
    public function postInterestWord(Request $request)
    {
        $interest_word = new InterestWord;

        $interest_word->word = $request['word'];

        $interest_word->save();
    }
}