<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Warranty;
use Illuminate\Http\Request;
use App\Models\WindowFilms;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fp');
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

    public function claim(Request $request)
    {
        $check = Warranty::with('tipe_mobil.merek')->where('code', $request->code)->first();
        $mereks = Merek::all();
        $windowfilms = WindowFilms::all();
        if($check == null){
            return redirect('fp');
        }

        if($check->status == 'pending'){
            return view('tunggu', compact('check'));
        }elseif($check->status == 'claimed'){
            return view('udah', compact('check'));
        }else{
            return view('klaim', compact('check','mereks','windowfilms'));
        }
    }

    public function mauklaim($code)
    {
        $check = Warranty::where('code', $code)->first();
        return view('klaim', compact('check'));
    }

    public function tunggu($code)
    {
        $data = Warranty::where('code', $code)->first();
        return view('tunggu', compact('data'));
    }

    public function udah($code)
    {
        $data = Warranty::where('code', $code)->first();
        return view('udah', compact('data'));
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
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Warranty $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function claimadmin($code)
    {
        Warranty::where('code', $code)->update([
            'status' => 'claimed'
        ]);
        $check = Warranty::where('code', $code)->first();
        return view('udah', compact('check'));
    }
    public function update(Request $request, $code)
    {
        Warranty::where('code', $code)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'email' => $request->email,
            'handphone' => $request->handphone,
            'alamat' => $request->alamat,
            'tipe' => $request->tipe,
            'nomor_rangka' => $request->nomor_rangka,
            'nomor_plat' => $request->nomor_plat,
            'front_window' => $request->front_window,
            'side_window' => $request->side_window,
            'back_window' => $request->back_window,
            'status' => 'pending'
        ]);
        return view('tunggu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warranty $resource)
    {
        //
    }
}
