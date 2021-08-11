<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dokter.table');
        // $data = Dokter::latest('poli')->paginate(5);
        return view('dokter.table', [
            'dokters' => Dokter::with('poli')->latest()->paginate(5),
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
        return view('dokter.create', compact('poli'));
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
            'nama_dokter' => ['required'],
            'poli_id' => ['required'],
        ]);

        Dokter::create([
            'nama_dokter' => request('nama_dokter'),
            'slug_dokter' => Str::slug(request('nama_dokter')),
            'poli_id' => request('poli_id'),
        ]);

        // return redirect('dokter')->with('success','Berhasil Ditambahkan!.');
        return back()->with('success','Berhasil Ditambahkan!.');
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
        $data = Dokter::with('poli')->where('id', $id)->first();
        return view('dokter.edit', compact('data'));
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
            'nama_dokter' => ['required'],
            // 'poli_id' => ['required'],
        ]);

        Dokter::where('id', $id)->first()->update([
            'nama_dokter' => $request->nama_dokter,
            // 'poli_id' => $request->poli_id,
            'slug_dokter' => Str::slug(request('nama_dokter')),
        ]);

        return redirect('dokter')->with('success','Berhasil Diedit!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::where('id', $id)->first()->delete();
        return back()->with('success','Berhasil Dihapus!.');
    }
}
