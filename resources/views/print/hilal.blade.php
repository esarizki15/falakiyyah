@extends('layouts.admin-lte.print')

@section('title')
    
@endsection
@section('style')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row DivIdToPrint">
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
                                        <div class="col"><h4>{{ strtoupper("perhitungan ijtima' & hilal ramadhan ". $data['tahun_hijriah'] ." h / ". $data['THN'] ." m") }}</h4></div>
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
                                                <th>Markaz</th>
                                                <th>Lintang</th>
                                                <th>Bujur</th>
                                                <th>Tinggi Tempat</th>
                                                <th>Zona Waktu</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $astronomical['markaz'] }}</td>
                                                <td>{{ $astronomical['lintang'] }}</td>
                                                <td>{{ $astronomical['bujur'] }}</td>
                                                <td>{{ $astronomical['tinggi_tempat'] }}</td>
                                                <td>{{ $astronomical['zona_waktu'] }}</td>
                                                <td>{{ $astronomical['tanggal']->toDateString() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @include('print.ijtima-hasil')
                            @include('print.data-t')
                        </div>
                    </div>
                </div>
            </div>

            <div class="row divIdToPrint py-5">
                <div class="col">
                    @include('print.data-matahari')
                </div>
            </div>

            <div class="row divIdToPrint py-5 table-breaked" style='page-break-before: always;'>
                <div class="col">
                    @include('print.data-bulan')
                    @include('partial.ringkasan-hilal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection