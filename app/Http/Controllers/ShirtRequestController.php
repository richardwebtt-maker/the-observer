<?php

namespace App\Http\Controllers;

use App\Mail\ShirtRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShirtRequestController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'shirtName' => 'required|string',
            'size' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
        ]);

        Mail::to('rbradleykerr@gmail.com')->send(new ShirtRequestMail($data));

        return back()->with('success', 'Your shirt request has been sent!');
    }
}
