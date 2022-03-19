<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\Bulan;
class IjtimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bulan = Bulan::where('jenis_bulan', 'H')->where('jenis_tahun', 0)->get();
        return view('ijtima.index', compact('bulan'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=null;
        if(!empty($request->tahun_hijriah) && !empty($request->bulan_hijriah)){
            $data = ijtima($request->tahun_hijriah,$request->bulan_hijriah,0,7);
            $data['bulan_hijriah'] = Bulan::find($request->bulan_hijriah);
            $data['tahun_hijriah'] = $request->tahun_hijriah;
            $data = collect($data);
        }
        return view('ijtima.print', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // $astronomical = collect([
        //     'lintang' => -7.02905,
        //     'bujur' => 106.55772,
        //     'tinggi_tempat' => 52.865,
        //     'zona_waktu' => 7,
        //     'ihtiyath' => 2,
        //     'tanggal' => Carbon::create("2021-4-12")
        // ]);
        // $hilal = hilal($astronomical['bujur'], $astronomical['lintang'],null,null,$astronomical['tanggal'], 7,$astronomical['tinggi_tempat']);
        // // return $data; 
        // // dd($data);
        // // $data = ijtima(1425,8,0,7);
        // // return view('print.hilal', compact('data', 'astronomical', 'hilal'));
        return view('ijtima.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
