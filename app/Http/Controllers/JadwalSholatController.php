<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
class JadwalSholatController extends Controller
{
    public function index() {
        $date = Carbon::now();
        $date = Carbon::create(2021,4,13);
        // $date = Carbon::create(2004,10,14);
        // $date = collect(jeanMeus($date));
        // $date = $date->map(function ($item, $key) {
        //     return $key != "JD" ? formatDMS($item) : $item;
        // });
        // Tangerang
        $astronomical = collect([
            'lintang' => -6.265794,
            'bujur' => 106.540265,
            'tinggi_tempat' => 38,
            'zona_waktu' => 7,
            'ihtiyath' => 2,
        ]);
        // Surabaya
        // $astronomical = collect([
        //     'lintang' => -7.25,
        //     'bujur' => 112.75,
        //     'tinggi_tempat' => 10,
        //     'zona_waktu' => 7,
        //     'ihtiyath' => 0,
        // ]);
        // Sampang
        // $astronomical = collect([
        //     'lintang' => -7.183,
        //     'bujur' => 113.25,
        //     'tinggi_tempat' => 10,
        //     'zona_waktu' => 7,
        //     'ihtiyath' => 0,
        // ]);
        $data = [];
        for($i = 0; $i <= 30; $i++){
            $dateTmp = clone $date;
            if($i > 0) $dateTmp = $dateTmp->addDays($i);
            $data[$i] = collect([
                'tanggal' => $dateTmp->toDateString(),
                'data' => shalat($astronomical['bujur'], $astronomical['lintang'], null, null, $dateTmp, $astronomical['zona_waktu'], $astronomical['tinggi_tempat'], null, 15, $astronomical['ihtiyath'], "WIB", "anfa")
            ]);
        }
        $data = collect($data);
        return view('print.jadwal-shalat', compact('data', 'astronomical'));
    }

    public function ijtima(Request $request)
    {
        // Tangerang
        // $astronomical = collect([
        //     'lintang' => -6.265794,
        //     'bujur' => 106.540265,
        //     'tinggi_tempat' => 38,
        //     'zona_waktu' => 7,
        //     'ihtiyath' => 2,
        //     'tanggal' => Carbon::create("2021-4-12")
        // ]);
        // Pelabuhan Ratu
        $astronomical = collect([
            'lintang' => -7.02905,
            'bujur' => 106.55772,
            'tinggi_tempat' => 52.865,
            'zona_waktu' => 7,
            'ihtiyath' => 2,
            'tanggal' => Carbon::create("2021-4-12")
        ]);
        $data = ijtima(1442,8,0,7); 
        $hilal = hilal($astronomical['bujur'], $astronomical['lintang'],null,null,$astronomical['tanggal'], 7,$astronomical['tinggi_tempat']);
        // return $data; 
        // dd($data);
        // $data = ijtima(1425,8,0,7);
        return view('print.hilal', compact('data', 'astronomical', 'hilal'));
    }

    public function hilal()
    {
        // $astronomical = collect([
        //     'lintang' => -6.265794,
        //     'bujur' => 106.540265,
        //     'tinggi_tempat' => 38,
        //     'zona_waktu' => 7,
        //     'ihtiyath' => 2,
        // ]);
        $astronomical = collect([
            'lintang' => -7.25,
            'bujur' => 112.75,
            'tinggi_tempat' => 10,
            'zona_waktu' => 7,
            'ihtiyath' => 0,
        ]);
        $data = hilal($astronomical['bujur'], $astronomical['lintang'],null,null,Carbon::create("2021-4-12"),$astronomical['zona_waktu'],$astronomical['tinggi_tempat']);
        return $data;
    }
}
