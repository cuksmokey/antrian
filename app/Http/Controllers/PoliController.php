<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('poli.table', [
            'polis' => Poli::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('poli');
        $request->validate([
            'nama_poli' => ['required', 'unique:polis']
        ]);

        Poli::create([
            'nama_poli' => request('nama_poli'),
            'slug_poli' => Str::slug(request('nama_poli')),
        ]);

        // return redirect('poli')->with('success','Berhasil Ditambahkan!.');
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
        $data = Poli::where('id', $id)->first();
        // dd($data);
        return view('poli.edit', compact('data'));
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
            'nama_poli' => ['required', 'unique:polis']
        ]);
        Poli::where('id', $id)->first()->update(['nama_poli' => $request->nama_poli]);

        return redirect('poli')->with('success','Berhasil Diedit!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poli::where('id', $id)->first()->delete();
        return back()->with('success','Berhasil Dihapus!.');
    }
}
