<?php

namespace App\Http\Controllers;

use App\Models\M_Warranty;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class M_WarrantyController extends Controller
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
        $data = M_Warranty::all();

        return view('m_warranty.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $checkkategori = M_Warranty::where('tipe', $request->tipe)->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Tipe Telah Terdaftar!');
            }
            M_Warranty::create([
                'tipe' =>$request->tipe,
                'tahun_berlaku' => $request->tahun,
                'create_id' => auth()->user()->id,
                'created_at' => Carbon::now()
            ]);
    
            return redirect('/data-m_warranty')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            // Log::error('Error saat menyimpan user: ' . $e->getMessage());
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
            $checkkategori = M_Warranty::where('tipe', $request->tipe)->where('id','!=',$request->id)->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Tipe Telah Terdaftar!');
            }
            M_Warranty::find($request->id)->update([
                'tipe'=>$request->tipe,
                'tahun_berlaku' => $request->tahun,
                'modify_id' => auth()->user()->id,
                'updated_at' => Carbon::now()
            ]);

            return redirect('/data-m_warranty')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataKategori = M_Warranty::find($id);
            $dataKategori->delete();
            return redirect('/data-m_warranty')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }
}
