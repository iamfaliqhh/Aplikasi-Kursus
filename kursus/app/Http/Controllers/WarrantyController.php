<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Warranty;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\WindowFilms;
use App\Models\Reseller;
use App\Models\Tipe;
use Carbon\Carbon;


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
        $check = Warranty::with('tipe_mobil.merek')
        ->leftJoin('produk as x','warranty.front_window','=','x.id')
        ->leftJoin('produk as y','warranty.side_window','=','y.id')
        ->leftJoin('produk as z','warranty.back_window','=','z.id')
        ->select('warranty.*',
                 'x.nama_produk as front',
                 'y.nama_produk as side',
                 'z.nama_produk as back')
        ->where('code', $request->code)->first();
        $mereks = Merek::all();
        $windowfilms = WindowFilms::all();
        $produk_ppf = ProgramStudi::where('kategori_produk','=','3')->get();
        $produk_window = ProgramStudi::where('kategori_produk','=','1')->get();
        $reseller = Reseller::all();
        $tipe = Tipe::all();

        if($check == null){
            return redirect('fp');
        }

        if($check->status == 'pending'){
            return view('tunggu', compact('check'));
        }elseif($check->status == 'claimed'){
            return view('udah', compact('check'));
        }else{
            return view('klaim', compact('check','mereks','windowfilms','produk_ppf','produk_window','reseller','tipe'));
        }
    }

    public function warrantyCountdown($code,$parts)
    {
        switch ($parts) {
            case 'front':
                $windowParts = 'front_window';
                break;
            case 'side':
                $windowParts = 'side_window';
                break;
            case 'back':
                $windowParts = 'back_window';
                break;
            default:
                // Jika nilai $parts tidak valid, kembalikan pesan kesalahan
                return 'Nilai $parts tidak valid';
        }

        $data = Warranty::where('code', $code)
        ->leftJoin('produk as a',"warranty.$windowParts",'=','a.id')
        ->leftJoin('m_warranties as b','a.tipe_warranty','=','b.id')
        ->select('warranty.tgl_verif','a.is_lifetime','b.tahun_berlaku','a.nama_produk')
        ->first();

        if($data->is_lifetime == true){
            $remaining = 'Seumur Hidup';
        }else{
            $verifikasi = Carbon::parse($data->tgl_verif);
            $endDate = $verifikasi->copy()->addYears($data->tahun_berlaku);
            
            // Hitung sisa masa garansi
            $remainingDays = $endDate->diffInDays(Carbon::now());
            $years = floor($remainingDays / 365);
            $remainingDays %= 365;
            $months = floor($remainingDays / 30);
            $days = $remainingDays % 30;

            $remaining = "$years tahun, $months bulan, $days hari";
        }

        return $remaining;
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
            'id_reseller' => $request->id_reseller,
            'tgl_pemasangan' => Carbon::createFromFormat('d-m-Y', $request->tgl_pasang)->format('Y-m-d'),
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
