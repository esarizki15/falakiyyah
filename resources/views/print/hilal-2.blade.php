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
                                    <div class="col">
                                        <table class="table table-hover display nowrap text-center table-bordered"
                                            style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>Markaz</th>
                                                    <th>Lintang</th>
                                                    <th>Bujur</th>
                                                    <th>Tinggi Tempat</th>
                                                    <th>Zona Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $astronomical['markaz'] }}</td>
                                                    <td>{{ $astronomical['lintang'] }}</td>
                                                    <td>{{ $astronomical['bujur'] }}</td>
                                                    <td>{{ $astronomical['tinggi_tempat'] }}</td>
                                                    <td>{{ $astronomical['zona_waktu'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover display nowrap text-center table-bordered"
                                            style="width:100%;">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 50%;">Ijtima // Akhir Bulan</th>
                                                    <td>{{ $data['bulan_hijriah']['nama'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tahun</th>
                                                    <td>{{ $data['tahun_hijriah'] . ' H' }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tanggal</th>
                                                    <td>{{ $astronomical['tanggal']->format('d M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Hari</th>
                                                    <td>{{ $data['Hari'] . ' - ' . $data['Pasaran'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Jam</th>
                                                    <td>{{ $data["WD"] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Matahari Terbenam</th>
                                                    <td>{{ $hilal['Grb']['WD'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Azimut Matahari</th>
                                                    <td>{{ $hilal['Az']['Barat'] }} dari arah Barat</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Hilal Terbenam</th>
                                                    <td>{{ $hilal['Ms'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Azimut Hilal</th>
                                                    <td>{{ $hilal['Azc']['Barat'] }} dari arah Barat</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tinggi Hakiki</th>
                                                    <td>{{ $hilal['hc'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tinggi Lihat</th>
                                                    <td>{{ $hilal['hc1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Lama Hilal di Atas Ufuk</th>
                                                    <td>{{ $hilal['Dc'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Cahaya Hilal</th>
                                                    <td>{{ $hilal['FI'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr class="my-5" style="border: 1px solid red;">
                                        <table class="table table-hover display nowrap text-center table-bordered"
                                            style="width:100%;">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 50%;">Purnama</th>
                                                    <td>{{ $purnama['bulan_hijriah']['nama'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tahun</th>
                                                    <td>{{ $purnama['tahun_hijriah'] . ' H' }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tanggal</th>
                                                    <td>{{ $purnama['DATE_CARBON']->format('d M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Hari</th>
                                                    <td>{{ $purnama['Hari'] . ' - ' . $purnama['Pasaran'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Jam</th>
                                                    <td>{{ $purnama["WD"] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr class="my-5" style="border: 1px solid red;">
                                        <table class="table table-hover display nowrap text-center table-bordered"
                                            style="width:100%;">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 50%;">Ijtima // Akhir Bulan</th>
                                                    <td>{{ $dataNextMonth['bulan_hijriah']['nama'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tahun</th>
                                                    <td>{{ $dataNextMonth['tahun_hijriah'] . ' H' }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tanggal</th>
                                                    <td>{{ $dataNextMonth['DATE_CARBON']->format('d M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Hari</th>
                                                    <td>{{ $dataNextMonth['Hari'] . ' - ' . $dataNextMonth['Pasaran'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Jam</th>
                                                    <td>{{ $dataNextMonth["WD"] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Matahari Terbenam</th>
                                                    <td>{{ $hilalNextMonth['Grb']['WD'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Azimut Matahari</th>
                                                    <td>{{ $hilalNextMonth['Az']['Barat'] }} dari arah Barat</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Hilal Terbenam</th>
                                                    <td>{{ $hilalNextMonth['Ms'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Azimut Hilal</th>
                                                    <td>{{ $hilalNextMonth['Azc']['Barat'] }} dari arah Barat</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tinggi Hakiki</th>
                                                    <td>{{ $hilalNextMonth['hc'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Tinggi Lihat</th>
                                                    <td>{{ $hilalNextMonth['hc1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Lama Hilal di Atas Ufuk</th>
                                                    <td>{{ $hilalNextMonth['Dc'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Cahaya Hilal</th>
                                                    <td>{{ $hilalNextMonth['FI'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li>Dihitung menggunakan algoritma yang tertulis pada kitab irsyadul murid cetakan ke 4</li>
                                </ul>
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
