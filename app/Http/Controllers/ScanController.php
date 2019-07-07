<?php

namespace App\Http\Controllers;

use App\Spi;
use App\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Http\Controllers\Controller;

class ScanController extends Controller
{
	public function index()
    {
        return view('scan');
    }


   public function __construct()
    {
        $this->middleware('auth');
    }
    public function scan(Request $request)
    {

        if(0){

        }else{
            $request->session()->put('searchscsan', $request->has('searchscsan') ? $request->get('searchscsan') : ($request->session()->has('searchscsan') ? $request->session()->get('searchscsan') : ''));
            $request->session()->put('LO', $request->has('LO') ? $request->get('LO') : ($request->session()->has('LO') ? $request->session()->get('LO') : -1));
            $spi = new Spi();
            if ($request->session()->get('LO') != -1)
                $spi = $spi->where('LO', $request->session()->get('LO'));
            $spi = $spi->where('LO', 'like', '%' . $request->session()->get('searchscsan') . '%')
                //->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                ->paginate(50);
            // dd($spi);

        }            

        if ($request->ajax())
            return view('scan', compact('spi'));
        else
            return view('ajaxscan', compact('spi'));        
        
    
        
    }

    public function ceksession(){
        dd(session());
    }
}
