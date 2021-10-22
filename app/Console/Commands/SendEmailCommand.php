<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\UpdateNotification;
use App\Models\DataToSend;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'We will send you an email notifying you of the update of the administrative site';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = DataToSend::groupBy('email')->get('email');

        foreach($emails as $email) {
            $data_to_send = DataToSend::where('email', $email->email)->get();
            Mail::to($email->email)->send(new UpdateNotification($data_to_send));
        }

        return 0;
    }
}
