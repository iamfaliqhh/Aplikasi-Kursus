<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Merek;
use App\Models\Tipe;
  
class DropdownController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $data['mereks'] = Merek::get(["name", "id"]);
        return view('dropdown', $data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchTipe(Request $request)
    {
        $data['tipe'] = Tipe::where("merek_id", $request->merek_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
}