<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
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
        $data = Kategori::all();

        return view('kategori.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $checkkategori = Kategori::where('kategori', $request->name)->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Kategori Telah Terdaftar!');
            }
            Kategori::create([
                'kategori' => $request->kategori
            ]);
    
            return redirect('/data-kategori')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            // Log::error('Error saat menyimpan user: ' . $e->getMessage());
            // dd($e->getMessage());
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
            $checkkategori = Kategori::where('kategori', $request->kategori)->where('id','!=',$request->id)->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Kategori Telah Terdaftar!');
            }
            Kategori::find($request->id)->update([
                'kategori' => $request->kategori,
            ]);

            return redirect('/data-kategori')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            // Log::error('Error saat menyimpan user: ' . $e->getMessage());
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataKategori = Kategori::find($id);
            $dataKategori->delete();
            return redirect('/data-kategori')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }
}
