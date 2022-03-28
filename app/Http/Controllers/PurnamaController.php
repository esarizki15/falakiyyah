<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulan;
class PurnamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('purnama.index', compact('bulan', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=null;
        if(!empty($request->tahun_hijriah) && !empty($request->bulan_hijriah) && !empty($request->markaz)){
            $bulan = Bulan::find($request->bulan_hijriah);
            $data = ijtima($request->tahun_hijriah,$bulan->nomor,0,7);
            $data['bulan_hijriah'] = $bulan;
            $data['tahun_hijriah'] = $request->tahun_hijriah;
            $data['markaz'] = $request->markaz;
            $data = collect($data);

            if(!empty($request->lintang) && !empty($request->bujur) && !empty($request->tinggi_tempat) && !empty($request->zona_waktu) && !empty($request->tanggal)){
                $tanggal = Carbon::create($request->tanggal);
                $ihtiyath = intval($request->ihtiyath);
                $astronomical = collect([
                    'lintang' => $request->lintang,
                    'bujur' => $request->bujur,
                    'tinggi_tempat' => $request->tinggi_tempat,
                    'zona_waktu' => $request->zona_waktu,
                    'ihtiyath' => $ihtiyath,
                    'tanggal' => $tanggal,
                    'markaz' => $request->markaz,
                ]);
                $hilal = hilal($astronomical['bujur'], $astronomical['lintang'],null,null,$astronomical['tanggal'], $astronomical['zona_waktu'],$astronomical['tinggi_tempat']);

                $dataSholat = [];
                if(!empty($request->jumlah_hari)){
                    for($i = 0; $i <= $request->jumlah_hari; $i++){
                        $dateTmp = clone $tanggal;
                        if($i > 0) $dateTmp = $dateTmp->addDays($i);
                        $dataSholat[$i] = collect([
                            'tanggal' => $dateTmp->toDateString(),
                            'data' => shalat($astronomical['bujur'], $astronomical['lintang'], null, null, $dateTmp, $astronomical['zona_waktu'], $astronomical['tinggi_tempat'], null, 15, $astronomical['ihtiyath'], "WIB", "anfa")
                        ]);
                    }
                    $dataSholat = collect($dataSholat);
                }
                return view('print.hilal', compact('data', 'astronomical', 'hilal', 'dataSholat'));
            }
            // Kalau hanya ijtima' return ini
            return view('ijtima.print', compact('data'));
        }
        
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
