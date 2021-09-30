<?php

namespace app\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestWord;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class GetInterestWordController extends Controller
{
    public function getInterestWord(Request $request)
    {
        $user_id = Auth::id();
        $interest_words = InterestWord::where('user_id', $user_id)
                            ->get();
        return response()
                ->json(compact('interest_words', 'user'),200);
    }
}
