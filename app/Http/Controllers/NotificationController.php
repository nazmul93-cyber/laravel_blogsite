<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    //

    public function sendInvoiceNotification() {
            $user = User::first();

            $invoice = [
                'name' => 'dodo',
                'body' => 'Paid Invoice',
                'text' => 'Back To Home',
                'url' => url('/'),
                'thanks' => 'Thank You For Paying',
                'invoice_id' => '123456',
            ];

//            Notification::send($user, new InvoicePaid($invoice));
             $user->notify(new InvoicePaid($invoice));
            dd('sent');
    }
}
