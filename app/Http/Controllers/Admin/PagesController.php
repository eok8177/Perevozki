<?php
/**
 * Created by PhpStorm.
 * User: qw
 * Date: 22.03.19
 * Time: 20:29
 */


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd('hello');
        return view('backend.pages.index', [
        ]);
    }
}