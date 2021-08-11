<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return view('home');
        return view('home', [
            'jadwals' => Jadwal::with('dokter','poli','jadwal')->latest()->paginate(5),
        ]);
    }
}
