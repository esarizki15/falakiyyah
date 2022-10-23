@extends('layouts.print')
@section('content')
<div class="row">
    <div class="col">
        <div class="row">
            {{-- <div>
                <img src="{{url('/img/logo.png')}}" alt="..."  style="position:absolute;z-index:1; left:30px; height:110px;">
            </div> --}}
            <div class="col text-center">
                <div class="row" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col"><h1>{{ strtoupper(' معهد دار الحق الإسلامي الإنجلي') }}</h1></div>
                </div>
                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col"><h4>{{ strtoupper('pondok pesantren daar el haqqi') }}</h4></div>
                </div>
                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col"><h4>{{ strtoupper("perhitungan gerhana rabi'ul akhir ". $data['tahun_hijriah'] ." h / ". $data['THN'] ." m") }}</h4></div>
                </div>
                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col">Kp. & Ds. Ciakar Rt. 02/01 Jl. H. Dirman Gg. Encle, Kec. Panongan, Kab. Tangerang</div>
                </div>
                <hr style="border: 2px solid black;">
            </div>
        </div>
        @include('khusuf.hasil')
        <div class="row mt-4">
            <div class="col text-center">
                <span>Terjadi Gerhana pada pertengahan bulan {{ $data['bulan_hijriah']['nama'] }} tahun {{ $data['tahun_hijriah'] }}H pada hari {{ $data['Hari'] }} {{ $data['Pasaran'] }} yang bertepatan dengan tanggal {{ $data['TGL'] }} {{ \App\Bulan::where('nomor', $data['BLN'])->first()->nama }} {{ $data['THN'] }} pada pukul {{ explode(" ", $data['WD'])[0] }} WIB</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <span>والله سبحانه وتعالى أعلم</span>
            </div>
        </div>
    </div>
</div>
@endsection