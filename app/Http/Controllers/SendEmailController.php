<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\UpdateNotification;
use App\Models\DataToSend;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail() {
        $emails = DataToSend::groupBy('email')->get('email');

        foreach($emails as $email) {
            $data_to_send = DataToSend::where('email', $email->email)->get();
            Mail::to($email->email)->send(new UpdateNotification($data_to_send));
        }
    }
}
