<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Merek;
use App\Models\ProfileUsers;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

class TipeController extends Controller
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
        $data = Tipe::all();
        $kode = ProfileUsers::id();
        $merk = Merek::all();

        return view('tipe.index', compact('data','kode','merk'));
    }

    public function store(Request $request)
    {
        try {
            $checktipe = Tipe::where('name', $request->name)->first();
            if ($checktipe) {
                return redirect()->back()->with('warning', 'Tipe Telah Terdaftar!');
            }
            Tipe::create([
                'name' => $request->name,
                'merek_id' => $request->merek
            ]);

            return redirect('/data-tipe')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan user: ' . $e->getMessage());
            dd($e->getMessage());
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
            $checktipe = Tipe::where('name', $request->name)->where('id','!=',$request->id)->first();
            if ($checktipe) {
                return redirect()->back()->with('warning', 'Tipe Telah Terdaftar!');
            }
            Tipe::find($request->id)->update([
                'name' => $request->name,
                'merek_id' => $request->merek
            ]);

            return redirect('/data-tipe')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataTipe = Tipe::find($id);
            $dataTipe->delete();
            return redirect('/data-tipe')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }
}
