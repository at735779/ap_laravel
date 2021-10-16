<?php

namespace App\Http\Controllers;

use App\Models\InterestWord;
use App\Models\Scraping;
use App\Models\User;
use App\Models\DataToSend;


class LookForUpdateController extends Controller
{
    public function lookForUpdate() {
        $user_ids = InterestWord::groupBy('user_id')->get('user_id');
        $update_titles = array();
        $update_urls = array();

        foreach($user_ids as $user_id) {
            $id = $user_id->user_id;
            $registered_words = InterestWord::where('user_id', $id)->get('word');
            foreach($registered_words as $registered_word) {
                $word = $registered_word->word;
                $update_data = Scraping::where('title', 'like', "%$word%")->get();
                if(isset($update_data[0])) {
                    $date = $update_data[0]->date;
                    foreach($update_data as $update_datum) {
                        array_push($update_titles, $update_datum->title);
                        array_push($update_urls, $update_datum->url);
                    }
                    unset($update_datum);
                }
            }
            unset($registered_word);
            if(isset($update_titles[0])){
                $user = User::where('id', $id)->first(['id', 'name', 'email']);
                for($i=0; $i<count($update_titles); $i++) {
                    $data_to_send = new DataToSend;
                    $data_to_send->date = $date;
                    $data_to_send->title = $update_titles[$i];
                    $data_to_send->url = $update_urls[$i];
                    $data_to_send->user_id = $user->id;
                    $data_to_send->name = $user->name;
                    $data_to_send->email = $user->email;
                    $data_to_send->save();
                }
            }
            $update_titles = array();
        }
        unset($user_id);
    }
}
