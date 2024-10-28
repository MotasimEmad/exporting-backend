<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactUS;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function send_message(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required'],
            'email' => ['required'],
            'phone_number' => 'required',
            'message' => 'required'
        ], [
            'user_name.required' => 'User name is required.',
            'email.required' => 'Email is required.',
            'phone_number.required' => 'Phone number is required.',
            'message.required' => 'Message is required.'
        ]);

        if ($validator->fails()) {
            return response()->error($validator->errors()->first(), 400);
        }

        try {
            Mail::to('motasimmax@gmail.com')->send(new ContactUS($request->full_name, $request->email, $request->phone_number, $request->message));
        } catch (\Throwable $exception) {
            Log::info($exception->getMessage());
        }

        return response()->success('Message has been send successfully');
    }
}
