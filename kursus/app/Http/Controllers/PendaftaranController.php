<?php

namespace App\Http\Controllers;

use App\Models\Merek;
<<<<<<< HEAD
use App\Models\Tipe;
=======
>>>>>>> 7c5b6cbca974581d665962c8e1a63f2b7563effc
use App\Models\Pendaftaran;
use App\Models\ProfileUsers;
use App\Models\Warranty;
use App\Models\Timeline;
use App\Models\User;
use App\Models\WindowFilms;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('warning')) {
                Alert::warning(session('warning'));
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data = Warranty::with('tipe_mobil.merek')->get();
        $kode = ProfileUsers::id();
        $mereks = Merek::all();
<<<<<<< HEAD
        $tipes = Tipe::all();
        $windowfilms = WindowFilms::all();

        return view('pendaftaran.index', compact('data','kode','mereks','tipes', 'windowfilms'));
=======

        return view('pendaftaran.index', compact('data','kode','mereks'));
>>>>>>> 7c5b6cbca974581d665962c8e1a63f2b7563effc
    }

    public function store(Request $request)
    {
        try {
            $checkpendaftaran = Pendaftaran::where('name', $request->name)->first();
            if ($checkpendaftaran) {
                return redirect()->back()->with('warning', 'Garansi Telah Terdaftar!');
            }
            Pendaftaran::create([
                'name' => $request->name,
            ]);

            return redirect('/data-pendaftaran')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        try {
            $checkpendaftaran = Pendaftaran::where('nama', $request->nama)->where('id','!=',$request->id)->first();
            if ($checkpendaftaran) {
                return redirect()->back()->with('warning', 'Garansi Telah Terdaftar!');
            }
            // dd($request->all());
            // kalo pengen liat datanya
            Pendaftaran::find($request->id)->update([
<<<<<<< HEAD
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'email' => $request->email,
                'handphone' => $request->handphone,
                'alamat' => $request->alamat,
                'merek' => $request->merek,
                'tipe' => $request->tipe,
                'windowfilms' => $request->produk,

=======
                'name' => $request->name,
                'tanggal' => $request->tanggal,
                'email' => $request->email,
>>>>>>> 7c5b6cbca974581d665962c8e1a63f2b7563effc
                //lanjutin datanya

            ]);

            return redirect('/data-pendaftaran')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataPendaftaran = Pendaftaran::find($id);
            $dataPendaftaran->delete();
            return redirect('/data-pendaftaran')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }

    public function verifikasistatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "claimed"
        ]);
        return redirect('/data-pendaftaran');
    }

    public function notverifikasistatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "pending"
        ]);
        return redirect('/data-pendaftaran');
    }

    public function invalidstatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "Tidak Sah"
        ]);
        return redirect('/data-pendaftaran');
    }

    public function selesaistatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "claimed"
        ]);
        return redirect('/data-pendaftaran');
    }
}
