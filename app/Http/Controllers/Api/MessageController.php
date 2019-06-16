<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class MessageController extends Controller
{
    public function call(Request $request)
    {

        $text = $request->all();

        Mail::send('email', ['text' => $text], function ($m) use ($text) {
          $m->from(env('MAIL_FROM_ADDRESS'),env('APP_URL'));

          $m->to('eok8177@gmail.com')->subject('Позвонить клиенту '. $text['phone']);
        });

        return response()->json($request, 200);
    }


}
