<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kim;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KimImport;
use Session;
use App\Http\Controllers\Controller;

class KimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:role_admin');
    }
    public function index(Request $request)
    { $request->session()->put('search', $request->has('search') ? $request->get('search') : ($request->session()->has('search') ? $request->session()->get('search') : ''));
        $request->session()->put('NOPOL', $request->has('NOPOL') ? $request->get('NOPOL') : ($request->session()->has('NOPOL') ? $request->session()->get('NOPOL') : -1));
        $kim = new Kim();
        if ($request->session()->get('NOPOL') != -1)
            $kim = $kim->where('NOPOL', $request->session()->get('NOPOL'));
        $kim = $kim->where('NOPOL', 'like', '%' . $request->session()->get('search') . '%')
            //->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(50);
        if ($request->ajax())
            return view('kim', compact('kim'));
        else
            return view('ajaxkim', compact('kim'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('formkim');
        else {
            $rules = [
                'PLANT' => 'required',
                'NOPOL' => 'required',
                'PERUSAHAAN' => 'required',
                'KIM' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $kim = new kim();
            $kim->PLANT = $request->PLANT;
            $kim->NOPOL = $request->NOPOL;
            $kim->PERUSAHAAN = $request->PERUSAHAAN;
            $kim->KIM = $request->KIM;
            $kim->KETERANGAN = $request->KETERANGAN;
            $kim->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('kim')
            ]);
        }
    }

    public function delete($id)
    {
        kim::destroy($id);
        return redirect('/kim');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('formkim', ['kim' => kim::find($id)]);
        else {
            $rules = [
                'PLANT' => 'required',
                'NOPOL' => 'required',
                'PERUSAHAAN' => 'required',
                'KIM' => 'required',
         
                
                
                
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $kim = kim::find($id);
            $kim->PLANT = $request->PLANT;
            $kim->NOPOL = $request->NOPOL;
            $kim->PERUSAHAAN = $request->PERUSAHAAN;
            $kim->KIM = $request->KIM;
            $kim->KETERANGAN = $request->KETERANGAN;
            $kim->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('kim')
            ]);
        }
    }
    public function import_excel(Request $request) 
{
    // validasi
    $this->validate($request, [
        'file' => 'required|mimes:csv,xls,xlsx'
    ]);

    // menangkap file excel
    $file = $request->file('file');

    // membuat nama file unik
    $nama_file = rand().$file->getClientOriginalName();

    // upload ke folder file_siswa di dalam folder public
    $file->move('file_kim',$nama_file);

    // import data
    Excel::import(new KimImport, public_path('/file_kim/'.$nama_file));

    // notifikasi dengan session
    Session::flash('sukses','Data kim Berhasil Diimport!');

    // alihkan halaman kembali
    return redirect('/kim');
}

	    public function truncate(){
	        Kim::truncate();
	       return redirect('/kim');
	    }

}
