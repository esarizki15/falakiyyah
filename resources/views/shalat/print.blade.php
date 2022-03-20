<div class="row">
    <div class="col">
        @include('partial.header-print')
        @if(!empty($astronomical))
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
        @endif
    </div>
</div>