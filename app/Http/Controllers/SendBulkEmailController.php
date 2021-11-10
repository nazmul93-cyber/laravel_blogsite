<?php

namespace App\Http\Controllers;

use App\Jobs\SendBulkEmailJob;
use App\Models\User;
use Illuminate\Http\Request;

class SendBulkEmailController extends Controller
{
    //
    public function sendBulkEmail()
    {
        $users =User::get();
        foreach($users as $user) {
            $to_email = $user->email;

            $mail_data = [
                'to_mail' => $to_email,
                'subject' => 'sending bulk mail in hundreds of thousands',
                'body' => 'lorem ipsum dolor sin',
            ];
    
            dispatch(new SendBulkEmailJob($mail_data));
           
        }

//         $mail_data = [
//             'to_mail' => 'nazmulalamcuet12@gmail.com',
//             'subject' => 'sending bulk mail in hundreds of thousands',
//             'body' => 'lorem ipsum dolor sin',
//         ];
// // dd($mail_data['subject']);
//         dispatch(new SendBulkEmailJob($mail_data));

       
        // dd('All emails were sent successfully');
        return view('success_bulk_mail');
    }
}
