<?php

namespace App\Jobs;

use App\Mail\SendBulkEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBulkEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $mail_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        //
        $this->mail_data = $mail_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
         $users = User::get();
        // dd($users);
         foreach ($users as $user) {
             Mail::to($user->email)
                 ->send(new SendBulkEmail($this->mail_data));
         }
    }
}
