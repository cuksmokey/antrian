<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Poli;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal.table', [
            'jadwals' => Jadwal::with('dokter','poli')->latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poli = Poli::all();
        // $poli = Poli::pluck("nama_poli", "id");
        return view('jadwal.create', compact('poli'));
    }

    public function getDokter($id)
    {
        $getdokter = Dokter::where("poli_id", $id)->pluck("nama_dokter", "id");
        return response()->json($getdokter);
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
            'poli_id' => ['required'],
            'dokter_id' => ['required'],
            'shift' => ['required'],
            'dari' => ['required', ''],
            'sampai' => ['required'],
        ]);

        $slug = request('dari').' - '.request('sampai').' - '.request('shift');

        Jadwal::create([
            'poli_id' => request('poli_id'),
            'dokter_id' => request('dokter_id'),
            'shift' => request('shift'),
            'dari' => request('dari'),
            'sampai' => request('sampai'),
            'slug' => $slug,
        ]);

        return redirect('jadwal')->with('success','Berhasil Ditambahkan!.');
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
        $data = Jadwal::with('dokter','poli')->where('id', $id)->first();
        // dd($data);
        return view('jadwal.edit', compact('data'));
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
        $request->validate([
            // 'poli_id' => ['required'],
            // 'dokter_id' => ['required'],
            'shift' => ['required'],
            'dari' => ['required', ''],
            'sampai' => ['required'],
        ]);

        $slug = request('dari').' - '.request('sampai').' - '.request('shift');

        Jadwal::where('id', $id)->first()->update([
            // 'poli_id' => $request->poli_id,
            // 'dokter_id' => $request->dokter_id,
            'shift' => $request->shift,
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'slug' => $slug,
        ]);

        return redirect('jadwal')->with('success','Berhasil Diedit!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::where('id', $id)->first()->delete();
        return back()->with('success','Berhasil Dihapus!.');
    }
}
