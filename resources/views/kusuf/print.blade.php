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
                    <div class="col"><h1>{{ strtoupper('معهد دار الحق الإسلامي') }}</h1></div>
                </div>
                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col"><h4>{{ strtoupper('pondok pesantren daar el haqqi') }}</h4></div>
                </div>
                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col"><h4>{{ strtoupper("perhitungan gerhana bulan rabi'ul akhir ". $data['tahun_hijriah'] ." h / ". $data['THN'] ." m") }}</h4></div>
                </div>
                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                    <div class="col">Kp. & Ds. Ciakar Rt. 02/01 Jl. H. Dirman Gg. Encle, Kec. Panongan, Kab. Tangerang</div>
                </div>
                <hr style="border: 2px solid black;">
            </div>
        </div>
        @include('kusuf.hasil')
        
        <div class="row">
            <div class="col-12 text-center">
                <h3><i>KESIMPULAN</i></h3>
            </div>
            <div class="col-12">
                <ul>
                    <li>
                        Terjadi Gerhana Matahari pada akhir bulan {{ $data['bulan_hijriah']['nama'] }} tahun {{ $data['tahun_hijriah'] }}H pada hari {{ $data['Hari'] }} {{ $data['Pasaran'] }} yang bertepatan dengan tanggal {{ $data['TGL'] }} {{ \App\Bulan::where('nomor', $data['BLN'])->first()->nama }} {{ $data['THN'] }}
                    </li>
                    @php
                        $juzI = ($data['Y'] >= 0.9972 && $data['Y'] <= 1.54332);
                    @endphp
                    @if($juzI)
                    <li>
                        Jenis Gerhana = Sebagian
                    </li>
                    @endif
                    <li>
                        Awal Gerhana = {{ $data['awalGerhana'] }}
                    </li>
                    {{-- <li>
                        Awal Gerhana Total = {{ $data['awalTotal'] }}
                    </li> --}}
                    <li>
                        Tengah Gerhana = {{ $data['tengahGerhana'] }}
                    </li>
                    {{-- <li>
                        Akhir Gerhana Total = {{ $data['akhirTotal'] }}
                    </li> --}}
                    <li>
                        Akhir Gerhana = {{ $data['akhirGerhana'] }}
                    </li>
                    <li>
                        Durasi Gerhana = {{ $data['DURASI'] }}
                    </li>
                    <li>Dihitung menggunakan algoritma yang tertulis pada kitab irsyadul murid cetakan ke 4</li>
                    <li>Berlaku untuk daerah dengan zona waktu GMT +7 (WIB)</li>
                </ul>
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