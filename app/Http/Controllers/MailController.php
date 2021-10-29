<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;                 // new info
use Illuminate\Support\Facades\Mail;   

class MailController extends Controller
{
    //

    public function sendMailWithPDF()
    {
        $data["email"] = "test@gmail.com";             // target email address
        $data["title"] = "Welcome to MyNotePaper";
        $data["body"] = "This is the email body.";

        $pdf = PDF::loadView('mail', $data);                  // loads view named mail.blade.php which has $data array contnet

        Mail::send('mail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "test.pdf");
        });

        dd('Email has been sent successfully');
    }
}
