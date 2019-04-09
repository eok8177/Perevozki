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
          $m->from('admin@korona.ari.in.ua', 'korona.ari.in.ua');

          $m->to('admin@korona.ari.in.ua')->subject('Позвонить клиенту '. $text['phone']);
        });

        return response()->json($request, 200);
    }


}
