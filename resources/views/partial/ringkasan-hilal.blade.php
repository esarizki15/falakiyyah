<div class="row mt-4">
    <div class="col">
        <span>Terjadi Ijtima pada akhir bulan {{ $data['bulan_hijriah']['nama'] }} tahun {{ $data['tahun_hijriah'] }}H pada hari {{ $data['Hari'] }} {{ $data['Pasaran'] }} yang bertepatan dengan tanggal {{ $data['TGL'] }} {{ \App\Bulan::where('nomor', $data['BLN'])->first()->nama }} {{ $data['THN'] }} pada pukul {{ explode(" ", $data['WD'])[0] }} WIB, dan tinggi hilal pada waktu maghrib di markaz {{ $data['markaz'] }} pada tanggal {{ \Carbon\Carbon::parse($astronomical['tanggal'])->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }} berkisar pada {{ $hilal['hc1'] }}, berada di atas ufuk selama {{ $hilal['Dc'] }}, cahayanya {{ explode(" / ",$hilal['FI'])[1] }}, terletak pada {{ $hilal['Azc']['Barat'] }} dari arah barat, dan terbenam hilal pada {{ explode(" ", $hilal['Ms'])[0] }} WIB</span>
    </div>
</div>
<div class="row mt-3">
    <div class="col text-center">
        <span>والله سبحانه وتعالى أعلم</span>
    </div>
</div>