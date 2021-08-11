<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\Poli;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli = Poli::all();
        $daftar = Pendaftaran::latest()->first();
        return view('home', compact('poli', 'daftar'));
        // return view('home', [
        //     'daftar' => Jadwal::with('dokter','poli')->latest()->paginate(5),
        // ]);
    }

    public function getDokter($id)
    {
        $getdokter = Dokter::where("poli_id", $id)->pluck("nama_dokter", "id");
        return response()->json($getdokter);
    }

    public function getJadwal($id)
    {
        $getjadwal = Jadwal::where("dokter_id", $id)->pluck("slug", "id");
        return response()->json($getjadwal);
    }

    public function getDaftar($id)
    {
        $getDaftar = Pendaftaran::where("id", $id)->first();
        return response()->json($getDaftar);
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
        $request->validate([
            'tgl_periksa' => ['required', 'date'],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'tgl_lahir' => ['required', 'date'],
            'no_telp' => ['required'],
            'poli_id' => ['required', 'integer'],
            'dokter_id' => ['required', 'integer'],
            'jadwal_id' => ['required', 'integer'],
        ]);

        $tgl_now = date('Y-m-d');
        $count = Pendaftaran::where('tgl_periksa', $request->tgl_periksa)->count();

        if($tgl_now == $request->tgl_periksa){
            if($count == 0){
                $i = 1;
            }else{
                $i = $count + 1;
            }
        }else{
            if($count == 0){
                $i = 1;
            }else{
                $i = $count + 1;
            }
        }

        $no_antrian = 'R0'.$i;

        Pendaftaran::create([
            'tgl_periksa' => request('tgl_periksa'),
            'nomer_antrian' => $no_antrian,
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'tgl_lahir' => request('tgl_lahir'),
            'no_telp' => request('no_telp'),
            'poli_id' => request('poli_id'),
            'dokter_id' => request('dokter_id'),
            'jadwal_id' => request('jadwal_id'),
        ]);

        return redirect('/')->with('success','Berhasil Melakukan Pendaftaran!...');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
