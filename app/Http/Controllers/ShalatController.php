<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulan;
use \Carbon\Carbon;
class ShalatController extends Controller
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
            $data = ijtima($request->tahun_hijriah,$selectedBulan->nomor,0,7);
            $data['bulan_hijriah'] = $selectedBulan;
            $data['tahun_hijriah'] = $request->tahun_hijriah;
            $data = collect($data);
        }
        return view('shalat.index', compact('bulan', 'data'));
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
            $data['metode'] = "irsyad";
            $data = collect($data);

            if(!empty($request->lintang) && !empty($request->bujur) && !empty($request->ihtiyath) && !empty($request->tanggal)){
                $tanggal = Carbon::create($request->tanggal);
                $zonaWaktu = intval($request->zona_waktu);
                $tinggiTempat = intval($request->tinggi_tempat);
                $astronomical = collect([
                    'lintang' => $request->lintang,
                    'bujur' => $request->bujur,
                    'tinggi_tempat' => $tinggiTempat,
                    'zona_waktu' => $zonaWaktu,
                    'ihtiyath' => $request->ihtiyath,
                    'tanggal' => $tanggal,
                    'markaz' => $request->markaz
                ]);
                $dataSholat = [];
                if(!empty($request->jumlah_hari)){
                    for($i = 0; $i <= $request->jumlah_hari; $i++){
                        $dateTmp = clone $tanggal;
                        if($i > 0) $dateTmp = $dateTmp->addDays($i);
                        $dataSholat[$i] = collect([
                            'tanggal' => $dateTmp->toDateString(),
                            'data' => shalat($astronomical['bujur'], $astronomical['lintang'], null, null, $dateTmp, $astronomical['zona_waktu'], $astronomical['tinggi_tempat'], null, 15, $astronomical['ihtiyath'], "WIB", $data['metode'], true)
                        ]);
                    }
                    $dataSholat = collect($dataSholat);
                }
                return view('print.jadwal-shalat', compact('data', 'dataSholat', 'astronomical'));
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
