@extends('layouts.print')
@section('content')
<div class="row">
    <div class="col">
        @include('partial.header-print')
        @if(!empty($astronomical))
        <div class="row">
            <div class="col">
                <table class="table table-hover display nowrap text-center table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Lintang</th>
                            <th>Bujur</th>
                            <th>Tinggi Tempat</th>
                            <th>Zona Waktu</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
        @endif
        @include('print.ijtima-hasil')
        @include('partial.ringkasan-ijtima')
    </div>
</div>
@endsection