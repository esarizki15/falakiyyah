<div class="row mt-4">
    <div class="col text-center">
        <span>Terjadi Ijtima pada akhir bulan {{ $data['bulan_hijriah']['nama'] }} tahun {{ $data['tahun_hijriah'] }}H pada hari {{ $data['Hari'] }} {{ $data['Pasaran'] }} yang bertepatan dengan tanggal {{ $data['TGL'] }} {{ \App\Bulan::where('nomor', $data['BLN'])->first()->nama }} {{ $data['THN'] }} pada pukul {{ explode(" ", $data['WD'])[0] }} WIB</span>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <span>والله سبحانه وتعالى أعلم</span>
    </div>
</div>