<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramStudi;
use App\Models\Kategori;
use Alert;

class ProgramStudiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function($request,$next){
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


    //data produk kompliit
    public function dataproduk(){
        $viewData = ProgramStudi::all();
        $kategori = Kategori::all();
        return view ('produk.data-studyProgram-admin',compact('viewData','kategori'));
    }

    public function simpanproduk(Request $a)
    {
        try{

            $kode=ProgramStudi::id();

            // $fileft = $a->file('foto');
            // if(file_exists($fileft)){
            //     $nama_fileft = "produk".time() . "-" . $fileft->getClientOriginalName();
            //     $namaFolderft = 'foto produk';
            //     $fileft->move($namaFolderft,$nama_fileft);
            //     $path = $namaFolderft."/".$nama_fileft;
            // } else {
            //     $path = null;
            // }

            ProgramStudi::create([
                'id_produk'         => $a->kode,//$kode,
                'nama_produk'       => $a->nama,
                'kategori_produk'   => $a->kategori,
                // 'foto_produk'       => $path
        ]);
            return redirect('/data-produk')->with('success', 'Data Tersimpan!!');
        } catch (\Exception $e){
            echo $e;
            //return redirect()->back()->with('error', 'Data Tidak Berhasil Disimpan!');
        }
    }

    public function updateproduk(Request $a, $id_produk){
        //$dataUser = Pengguna::all();
        try{
            // $fileft = $a->file('foto');
            // if(file_exists($fileft)){
            //     $nama_fileft = "produk".time() . "-" . $fileft->getClientOriginalName();
            //     $namaFolderft = 'foto produk';
            //     $fileft->move($namaFolderft,$nama_fileft);
            //     $path = $namaFolderft."/".$nama_fileft;
            // } else {
            //     $path = $a->pathnya;
            // }
            ProgramStudi::where("id", $id_produk)->update([
                'nama_produk' => $a->nama,
                'kategori_produk' => $a->kategori,
                // 'foto_produk' => $path,
        ]);
            return redirect('/data-produk')->with('success', 'Data Terubah!!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah!');
        }
    }

    public function hapusproduk($id_produk){
        //$dataUser = Pengguna::all();
        try{
            $data = ProgramStudi::find($id_produk);
            $data->delete();
            return redirect('/data-produk')->with('success', 'Data Terhapus!!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }
}
