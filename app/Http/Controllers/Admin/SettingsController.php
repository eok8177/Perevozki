<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        return view('backend.settings.edit', [
            'settings' => Setting::all()
        ]);
    }

    public function update(Request $request)
    {

    }
}