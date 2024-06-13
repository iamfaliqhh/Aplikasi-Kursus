<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ResellerController extends Controller
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
        $data = Reseller::all();

        return view('reseller.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $checkkategori = Reseller::where('reseller', $request->reseller)->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Reseller Telah Terdaftar!');
            }
            Reseller::create([
                'reseller' =>$request->reseller,
                'create_id' => auth()->user()->id,
                'created_at' => Carbon::now()
            ]);
    
            return redirect('/data-reseller')->with('success', 'Data Tersimpan!');
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
            $checkkategori = Reseller::where('reseller', $request->reseller)->where('id','!=',$request->id)->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Reseller Telah Terdaftar!');
            }
            Reseller::find($request->id)->update([
                'reseller'=>$request->reseller,
                'modify_id' => auth()->user()->id,
                'updated_at' => Carbon::now()
            ]);

            return redirect('/data-reseller')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataKategori = Reseller::find($id);
            $dataKategori->delete();
            return redirect('/data-reseller')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }
}
