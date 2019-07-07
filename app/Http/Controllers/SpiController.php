<?php
namespace App\Http\Controllers;

use App\Spi;
use App\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SpiImport;
use Session;
use Auth;
use App\Http\Controllers\Controller;



//SPI
class SpiController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:role_admin');
    }

    public function index(Request $request)
    {
        // dd($request);

        if(Auth::user()->roles[0]->id != 1){
            return redirect('/scan');
        }
        
        $request->session()->put('search', $request->has('search') ? $request->get('search') : ($request->session()->has('search') ? $request->session()->get('search') : ''));
        
        $request->session()->put('searchbelakang', $request->has('searchbelakang') ? $request->get('searchbelakang') : ($request->session()->has('searchbelakang') ? $request->session()->get('searchbelakang') : ''));

        $request->session()->put('KETERANGAN', $request->has('KETERANGAN') ? $request->get('KETERANGAN') : ($request->session()->has('KETERANGAN') ? $request->session()->get('KETERANGAN') : -1));

        $spi = new Spi();

        $spi = $spi->where('KETERANGAN', $request->session()->get('KETERANGAN'));
        $spi = $spi->where('SPA', 'like', '' . $request->session()->get('search') . '%')->orwhere('SPA', 'like', '%' . $request->session()->get('searchbelakang') . '')->paginate(50);

        if ($request->ajax())
            return view('spi', compact('spi'));
        else
            return view('ajax', compact('spi'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('form');
        else {
            $rules = [
                'PLAN' => 'required',
                'ACTUAL' => 'required',
                'LO' => 'required',
                'TRANSPORTIR' => 'required',
                'PERUSAHAAN' => 'required',
                'SPA' => 'required',
                'NOPOL' => 'required',
                'QUANTITY' => 'required',
                'KETERANGAN' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $spi = new Spi();
            $spi->PLAN = $request->PLAN;
            $spi->ACTUAL = $request->ACTUAL;
            $spi->LO = $request->LO;
            $spi->TRANSPORTIR = $request->TRANSPORTIR;
            $spi->PERUSAHAAN = $request->PERUSAHAAN;
            $spi->SPA = $request->SPA;
            $spi->NOPOL = $request->NOPOL;
            $spi->QUANTITY = $request->QUANTITY;
            $spi->KETERANGAN = $request->KETERANGAN;
            $spi->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('spi')
            ]);
        }
    }

    public function delete($id)
    {
        Spi::destroy($id);
        return redirect('/spi');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('form', ['spi' => Spi::find($id)]);
        else {
            $rules = [
                'PLAN' => 'required',
                'ACTUAL' => 'required',
                'LO' => 'required',
                'TRANSPORTIR' => 'required',
                'PERUSAHAAN' => 'required',
                'SPA' => 'required',
                'NOPOL' => 'required',
                'QUANTITY' => 'required',
                'KETERANGAN' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $spi = Spi::find($id);
            $spi->PLAN = $request->PLAN;
            $spi->ACTUAL = $request->ACTUAL;
            $spi->LO = $request->LO;
            $spi->TRANSPORTIR = $request->TRANSPORTIR;
            $spi->PERUSAHAAN = $request->PERUSAHAAN;
            $spi->SPA = $request->SPA;
            $spi->NOPOL = $request->NOPOL;
            $spi->QUANTITY = $request->QUANTITY;
            $spi->KETERANGAN = $request->KETERANGAN;
            $spi->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('spi')
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
    $file->move('file_spi',$nama_file);

    // import data
    Excel::import(new SpiImport, public_path('/file_spi/'.$nama_file));

    // notifikasi dengan session
    Session::flash('sukses','Data SPI Berhasil Diimport!');

    // alihkan halaman kembali
    return redirect('/spi');
}

    public function truncate(){
        Spi::truncate();
       return redirect('/spi');
    }
    public function show(Request $request, $id){
       return redirect('show');
    }
}

