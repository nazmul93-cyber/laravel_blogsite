<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AlertController extends Controller
{
    // 
    // all users
    public function users()
    {
        $users = User::all();
        return view('alert', compact('users'));
    }

    // delete user
    public function delete($id)
    {
        $delete = User::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
