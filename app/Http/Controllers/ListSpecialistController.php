<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ListSpecialistController extends Controller
{
    public function index(){
        $specialist = DB::table('specialist')->get();
        // dd($specialist);
        return view('user.specialist',[
            'specialist' => $specialist,
        ]);
    }
}
