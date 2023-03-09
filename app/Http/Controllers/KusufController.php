<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulan;

class KusufController extends Controller
{
    public function index(Request $request)
    {
        $bulan = Bulan::where('jenis_bulan', 'H')->where('jenis_tahun', 0)->get();
        $data=null;
        if(!empty($request->tahun_hijriah) && !empty($request->bulan_hijriah)){
            $selectedBulan = Bulan::find($request->bulan_hijriah);
            $data = ijtima($request->tahun_hijriah,$selectedBulan->nomor,0.5,7);
            $data['bulan_hijriah'] = $selectedBulan;
            $data['tahun_hijriah'] = $request->tahun_hijriah;
            $data = collect($data);
        }
        return view('kusuf.index', compact('bulan', 'data'));
    }

    public function create(Request $request)
    {
        $data=null;
        if(!empty($request->tahun_hijriah) && !empty($request->bulan_hijriah)){
            $bulan = Bulan::find($request->bulan_hijriah);
            $data = kusuf($request->tahun_hijriah,$bulan->nomor,$request->zona_waktu);
            $data['bulan_hijriah'] = $bulan;
            $data['tahun_hijriah'] = $request->tahun_hijriah;
            $data['markaz'] = $request->markaz;
            $data = collect($data);
            // Kalau hanya ijtima' return ini
            return view('kusuf.print', compact('data'));
        }
        
        return redirect()->back();
    }
}
