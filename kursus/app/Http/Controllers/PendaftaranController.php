<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Tipe;
use App\Models\Pendaftaran;
use App\Models\ProfileUsers;
use App\Models\ProgramStudi;
use App\Models\Warranty;
use App\Models\Timeline;
use App\Models\User;
use App\Models\WindowFilms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


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
        $data = Warranty::with('tipe_mobil.merek')
        ->leftJoin('produk as x', 'warranty.side_window', '=', 'x.id')
        ->leftJoin('produk as y', 'warranty.front_window', '=', 'y.id')
        ->leftJoin('produk as z', 'warranty.back_window', '=', 'z.id')
        ->leftJoin('produk as w', 'warranty.ppf', '=', 'w.id')
        ->leftJoin('official_reseller as o', 'warranty.id_reseller','=', 'o.id')
        ->select(
            'warranty.*',
            'x.nama_produk as side',
            'y.nama_produk as front',
            'z.nama_produk as back',
            'w.nama_produk as ppf_name',
            'o.reseller'
        )
        ->get();
        // dd($data);
        $kode = ProfileUsers::id();
        $mereks = Merek::all();
        $tipes = Tipe::all();
        $windowfilms = ProgramStudi::where('kategori_produk',1)->get();
        $res_ppf = ProgramStudi::where('kategori_produk',3)->get();

        return view('pendaftaran.index', compact('data','kode','mereks','tipes','windowfilms','res_ppf'));
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
            $data = $request->all();
            $formattedDate = \DateTime::createFromFormat('Y-m-d', $request->code)->format('Ymd');
            $data['code'] = $formattedDate.'-'.Str::random(10);
            Pendaftaran::find($request->id)->update($data);
                // 'nama' => $request->nama,
                // 'tanggal' => $request->tanggal,
                // 'email' => $request->email,
                // 'handphone' => $request->handphone,
                // 'alamat' => $request->alamat,
                // 'merek' => $request->merek,
                // 'tipe' => $request->tipe,
                // 'window_films' => $request->produk,

                //lanjutin datanya

            // ]);

            return redirect('/data-pendaftaran')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            dd($e->getMessage());
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
            'status' => "claimed",
            'verify_id' => auth()->user()->id,
            'tgl_verif' => Carbon::now()
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
            'status' => "claimed",
            'verify_id' => auth()->user()->id,
            'tgl_verif' => Carbon::now()
        ]);
        return redirect('/data-pendaftaran');
    }

    public function generateKode(Request $request)
    {
        $data = $request->query('jumlah',5);
        $tanggal = $request->query('tanggal');

        // Validate the inputs
        if (!is_numeric($data) || !$this->validateDate($tanggal)) {
            return redirect()->back()->withErrors(['error' => 'Invalid input data']);
        }

        $formattedDate = \DateTime::createFromFormat('Y-m-d', $tanggal)->format('Ymd');

        $kode = [];
        for($i=0; $i<$data; $i++) {
            $rand_code = $formattedDate.'-'.Str::random(10);
            $kode[] = ['code' => $rand_code];
        }

        Pendaftaran::insert($kode);

        return redirect('/data-pendaftaran')->with('success', 'Berhasil Generate Kode Garansi!');
    }

    private function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
