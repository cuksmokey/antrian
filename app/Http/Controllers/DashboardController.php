<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\Poli;
use Illuminate\Http\Request;
use PDF;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Pendaftaran::count();
        // $dashboard = Pendaftaran::with('poli', 'dokter', 'jadwal')->latest()->paginate(10);
        // return view('dashboard', compact('dashboard', 'count'));
        return view('dashboard', [
            'dashboard' => Pendaftaran::with('poli', 'dokter', 'jadwal')->latest()->paginate(10),
            'count' => $count,
        ]);
    }

    public function pdf($id) {
        $count = Pendaftaran::count();
        $data = Pendaftaran::with('poli', 'dokter', 'jadwal')->find($id);
        // dd($data);

        $pdf = PDF::loadView('pdf', [
            'daftar' => $data,
            'count' => $count,
        ]);

        return $pdf->stream($data->nomer_daftar.'.pdf');
    }

    public function antrian($id) {
        $data = Pendaftaran::with('poli', 'dokter', 'jadwal')->find($id);
        // dd($data);

        $pdf = PDF::loadView('antrian', [
            'data' => $data,
        ])->setPaper('a6', 'potrait');

        return $pdf->stream($data->nomer_daftar.'-'.$data->nomer_antrian.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $tgl_now = date('Y-m-d');
        $data = Pendaftaran::find($id);
        $nullantri = Pendaftaran::where('tgl_periksa', $data->tgl_periksa)->whereNull('nomer_antrian')->groupBy('nomer_antrian')->count();
        $nnantri = Pendaftaran::where('tgl_periksa', $data->tgl_periksa)->whereNotNull('nomer_antrian')->count();

        if(($tgl_now == $data->tgl_periksa || $tgl_now <> $data->tgl_periksa) && $nullantri < 1){
            $i = 1;
        }else{
            $i = $nnantri + 1;
        }

        $no_antrian = 'AP0'.$i;

        Pendaftaran::where('id', $id)->first()->update([
            'nomer_antrian' => $no_antrian,
        ]);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendaftaran::where('id', $id)->first()->delete();
        return back()->with('success','Berhasil Dihapus!.');
    }
}
