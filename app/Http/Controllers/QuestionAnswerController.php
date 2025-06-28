<?php

namespace App\Http\Controllers;

use App\Mail\QuestionAnswerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionAnswerController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'answer' => 'required|string',
            'name' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        Mail::to('rbradleykerr@gmail.com')->send(new QuestionAnswerMail($data));

        return back()->with('success', 'Your answer has been submitted!');
    }
}
