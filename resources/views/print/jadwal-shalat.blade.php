@extends('layouts.admin-lte.print')

@section('title')
    
@endsection
@section('style')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="row DivIdToPrint" id="DivIdToPrint">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            {{-- <div>
                                <img src="{{url('/img/logo.png')}}" alt="..."  style="position:absolute;z-index:1; left:30px; height:110px;">
                            </div> --}}
                            <div class="col text-center">
                                <div class="row" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                                    <div class="col"><h1>{{ strtoupper('مؤسسة معهد دار الحق الإسلامي الإنجلي') }}</h1></div>
                                </div>
                                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                                    <div class="col"><h4>{{ strtoupper('pondok pesantren daar el haqqi') }}</h4></div>
                                </div>
                                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                                    <div class="col"><h4>{{ strtoupper('jadwal sholat & imsakiyah ramadhan 1442 h / 2021 m') }}</h4></div>
                                </div>
                                <div class="row mt-2" style="font-size: 18px; font-weight:bold; font-family: 'Reem Kufi', sans-serif;">
                                    <div class="col">Kp. & Ds. Ciakar Rt. 02/01 Jl. H. Dirman Gg. Encle, Kec. Panongan, Kab. Tangerang</div>
                                </div>
                                <hr style="border: 2px solid black;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Lintang</th>
                                            <th>Bujur</th>
                                            <th>Tinggi Tempat</th>
                                            <th>Zona Waktu</th>
                                            <th>Ihtiyath</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $astronomical['lintang'] }}</td>
                                            <td>{{ $astronomical['bujur'] }}</td>
                                            <td>{{ $astronomical['tinggi_tempat'] }}</td>
                                            <td>{{ $astronomical['zona_waktu'] }}</td>
                                            <td>{{ $astronomical['ihtiyath'] }} Menit</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Imsak</th>
                                            <th>Shubuh</th>
                                            <th>Terbit</th>
                                            <th>Dhuha</th>
                                            <th>Dzuhur</th>
                                            <th>Ashar</th>
                                            <th>Maghrib</th>
                                            <th>Isya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index=>$val)
                                            <tr>
                                                <td>{{ $val["tanggal"] }}</td>
                                                <td>{{ $val["data"]["Imsak"]["WD"] }}</td>
                                                <td>{{ $val["data"]["Subuh"]["WD_IHTIYATH"] }}</td>
                                                <td>{{ $val["data"]["Terbit"]["WD_IHTIYATH"] }}</td>
                                                <td>{{ $val["data"]["Dhuha"]["WD_IHTIYATH"] }}</td>
                                                <td>{{ $val["data"]["Dzuhur"]["WD_IHTIYATH"] }}</td>
                                                <td>{{ $val["data"]["Ashar"]["WD_IHTIYATH"] }}</td>
                                                <td>{{ $val["data"]["Maghrib"]["WD_IHTIYATH"] }}</td>
                                                <td>{{ $val["data"]["Isya"]["WD_IHTIYATH"] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Keterangan</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li>Semua jadwal waktu di atas sudah di tambah dengan ihtiyath waktu 2 menit kecuali waktu terbit</li>
                                    <li>Rumus waktu shalat dihitung berdasarkan metode kitab Anfa' Al Wasilah</li>
                                    <li>Kriteria ketinggian waktu shubuh -20&#730; dan waktu dhuha 4.5</li>
                                    <li>Berlaku untuk daerah ciakar dan sekitarnya</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
@endsection