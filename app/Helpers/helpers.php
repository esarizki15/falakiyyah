<?php
use App\Hari;
use App\Bulan;
use \Carbon\Carbon;
if (!function_exists('sinDegree')) {

    function sinDegree($variable)
    {
        return sin($variable * pi() / 180);
    }
}

if (!function_exists('cosDegree')) {

    function cosDegree($variable)
    {
        return cos($variable * pi() / 180);
    }
}

if (!function_exists('tanDegree')) {

    function tanDegree($variable)
    {
        return tan($variable * pi() / 180);
    }
}

if (!function_exists('asinDegree')) {

    function asinDegree($variable)
    {
        return asin($variable) * (180/pi());
    }
}

if (!function_exists('acosDegree')) {

    function acosDegree($variable)
    {
        return acos($variable) * (180/pi());
    }
}

if (!function_exists('atanDegree')) {

    function atanDegree($variable)
    {
        return atan($variable) * (180/pi());
    }
}

if (!function_exists('shalat')) {

    function shalat($BT, $LT, $e, $d, $tanggal, $TZ, $TT, $sd, $rounded = 15, $ihtiyath = 0, $wdFormat = "WD", $metode="irsyad", $menitOnly = false)
    {
        $dataMatahari = dataMatahari($BT, $LT,$e,$d,$tanggal, $TZ,$TT);
        if ($tanggal != null){
            if($metode == "irsyad"){
                $e = ($e == null) ? $dataMatahari['e'] : $e;
                $d = ($d == null) ? $dataMatahari['d'] : $d;
                $sd = ($sd == null) ? $dataMatahari['sd'] : $sd;
            }else{
                $e = ($e == null) ? jeanMeus($tanggal, $rounded)['W'] : $e;
                $d = ($d == null) ? jeanMeus($tanggal, $rounded)['Dek'] : $d;
                $sd = ($sd == null) ? jeanMeus($tanggal, $rounded)['sd'] : $sd;
            }
        }
        // Ashar
        $B = abs($LT - $d);
        $H = atanDegree(1 / ((tanDegree(abs($B)) + 1)));
        $F = -tanDegree($LT) * tanDegree($d);
        $G = cosDegree($LT) * cosDegree($d);
        $As = (12 + acosDegree($F + sinDegree($H) / $G) / 15);
        if($metode != "irsyad"){
            $A = abs($B);
            $H = atanDegree(pow((tanDegree($A) + 1), -1));
            $As = acosDegree(-tanDegree($LT) * tanDegree($d)+ pow(cosDegree($LT),-1) * pow(cosDegree($d), -1) * sinDegree($H))/15;
            $As = $As + 12;
        }
        // Maghrib
        $Dip = (1.76 / 60) * sqrt($TT);
        $h = -($sd + (34.5 / 60) + $Dip) - 0.0024;
        $Mg = (12 + acosDegree($F + (sinDegree($h) / $G)) /15);
        if($metode != "irsyad"){
            $Mg = acosDegree(-tanDegree($LT) * tanDegree($d)+ pow(cosDegree($LT),-1) * pow(cosDegree($d), -1) * sinDegree(-1))/15;
            $Mg = $Mg + 12;
        }
        // Isya
        $isya = (12 + acosDegree($F + sinDegree(-18) / $G) / 15);
        if($metode != "irsyad"){
            $isya = acosDegree(-tanDegree($LT) * tanDegree($d)+ pow(cosDegree($LT),-1) * pow(cosDegree($d), -1) * sinDegree(-18))/15;
            $isya = $isya + 12;
        }
        // Shubuh
        $subuh = 12 - acosDegree($F + sinDegree(-20) / $G) / 15;
        if($metode != "irsyad"){
            $subuh = acosDegree(tanDegree($LT) * tanDegree($d)+ pow(-cosDegree($LT),-1) * pow(cosDegree($d), -1) * sinDegree(-20))/15;
        }
        // Terbit
        $terbit = 12 - acosDegree($F + sinDegree($h) / $G) / 15;
        if($metode != "irsyad"){
            $terbit = acosDegree(tanDegree($LT) * tanDegree($d)+ pow(-cosDegree($LT),-1) * pow(cosDegree($d), -1) * sinDegree(-1))/15;
        }
        // Dhuha dan I'ed
        $dhuha = 12 - acosDegree($F + sinDegree(4.5) / $G) / 15;
        if($metode != "irsyad"){
            $dhuha = acosDegree(tanDegree($LT) * tanDegree($d)+ pow(-cosDegree($LT),-1) * pow(cosDegree($d), -1) * sinDegree(4.5))/15;
        }
        return [
            'Data_Astro' => [
                'e' => formatDMS($e),
                'd' => formatDMS($d),
                'sd' => formatDMS($sd),
                'Dip' => formatDMS($Dip),
                'h' => formatDMS($h),
                'G' => formatDMS($G),
                'TT' => $TT,
                'LT' => formatDMS($LT),
                'BT' => formatDMS($BT),
                'TZ' => $TZ,
                'T' => $dataMatahari['T']
            ],
            'Dzuhur' => [
                'WIS' => pecahJam(12, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam(12, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam(12, $e, $TZ, $BT, $ihtiyath, $wdFormat,$metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam(12, $e, $TZ, $BT, $ihtiyath,null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam(12, $e, $TZ, $BT, $ihtiyath,null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam(12, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD_IHTIYATH']
            ],
            'Ashar' => [
                'B' => formatDMS(abs($B)),
                'H' => formatDMS($H),
                'F' => formatDMS($e),
                'G' => formatDMS($d),
                'WIS' => pecahJam($As, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam($As, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam($As, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam($As, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam($As, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam($As, $e, $TZ, $BT, $ihtiyath, $wdFormat,  $metode, $menitOnly)['WD_IHTIYATH'],
            ],
            'Maghrib' => [
                'Dip' => formatDMS($Dip),
                'h' => formatDMS($h),
                'WIS' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD_IHTIYATH'],
                'UTC' => pecahJam($Mg, $e, $TZ, $BT, $ihtiyath)['UTC'],
            ],
            'Isya' => [
                'WIS' => pecahJam($isya, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam($isya, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam($isya, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam($isya, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam($isya, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam($isya, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD_IHTIYATH']
            ],
            'Subuh' => [
                'WIS' => pecahJam($subuh, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam($subuh, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam($subuh, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam($subuh, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam($subuh, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam($subuh, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD_IHTIYATH']
            ],
            'Imsak' => [
                'WIS' => formatImsak($subuh, "WIS", $ihtiyath, $menitOnly),
                'LMT' => desimalJam($subuh, $e, $TZ, $BT, $ihtiyath, "LMT",$menitOnly)['LMT'],
                'WD' => desimalJam($subuh, $e, $TZ, $BT, $ihtiyath, $wdFormat, $menitOnly)['WD']
            ],
            'Terbit' => [
                'h' => formatDMS($h),
                'WIS' => pecahJam($terbit, $e, $TZ, $BT, null, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam($terbit, $e, $TZ, $BT, null, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam($terbit, $e, $TZ, $BT, null, $wdFormat, $metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam($terbit, $e, $TZ, $BT, null, null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam($terbit, $e, $TZ, $BT, null, null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam($terbit, $e, $TZ, $BT, null, $wdFormat, $metode, $menitOnly)['WD_IHTIYATH']
            ],
            'Dhuha' => [
                'WIS' => pecahJam($dhuha, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS'],
                'LMT' => pecahJam($dhuha, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT'],
                'WD' => pecahJam($dhuha, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD'],
                'WIS_IHTIYATH' => pecahJam($dhuha, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['WIS_IHTIYATH'],
                'LMT_IHTIYATH' => pecahJam($dhuha, $e, $TZ, $BT, $ihtiyath, null, $metode, $menitOnly)['LMT_IHTIYATH'],
                'WD_IHTIYATH' => pecahJam($dhuha, $e, $TZ, $BT, $ihtiyath, $wdFormat, $metode, $menitOnly)['WD_IHTIYATH']
            ],
        ];
    }
}
if (!function_exists('jadwalShalat')) {

    function jadwalShalat($BT, $LT, $e, $d, $tanggalAwal, $tanggalAkhir, $TZ, $TT, $sd)
    {
        $kabisatBasithoh = kabisatBasithoh($tanggalAwal->year);
        if ($kabisatBasithoh == 'kabisat'){
            $jenisTahun = 1;
        }else{
            $jenisTahun = 0;
        }
        $tglAwal = $tanggalAwal->day;
        $bulanAwal = $tanggalAwal->month;
        $tahunAwal = $tanggalAwal->year;
        
        $tglAkhir = $tanggalAkhir->day;
        $bulanAkhir = $tanggalAkhir->month;
        $tahunAkhir = $tanggalAkhir->year;

        $hari = 0;
        if(($bulanAkhir - $bulanAwal) > 0){
            for($i = $bulanAwal; $i < $bulanAkhir; $i++){
                $hari += Bulan::where('jenis_tahun', $jenisTahun)->where('jenis_bulan', 'M')->where('nomor', $i)->first()->nilai;
            }
            $hari += $tglAkhir + 1;
            $hari -= $tglAwal;
        }else{
            $hari += Bulan::where('jenis_tahun', $jenisTahun)->where('jenis_bulan', 'M')->where('nomor', $bulanAwal)->first()->nilai;
        }
        for($a  = 0; $a <= $hari; $a++){
            $waktu = [
                'Dzuhur' => [
                    'WIS' => $hari,
                ]    
            ];
        }
        // for($i = $tanggalAwal; $i < $tanggalAkhir; $i++){
        //   $dz = [ 'Dzuhur' => [
        //         'WIS' => pecahJam(12, $e, $TZ, $BT)['WIS'],
        //     ]];
        // };
        return [ 
            $waktu 
        ];
    }
}

if (!function_exists('dataMatahari')) {
    function dataMatahari($BT, $LT, $e, $d, $tanggal, $TZ, $TT)
    {// sedikit berbeda dengan kitab irsyadul murid karena nilai JD dan T tidak dibulatkan
        $Aa = (int)($tanggal->year / 100);
        $A = (int)($Aa / 4);
        $B = 2 - $Aa + $A;
        $tanggal < \Carbon\Carbon::create("1582-10-15") ? $B = 0 : $B = $B;
        
        $maghribUTC = 17.5;
        // dd($maghribUTC);
        $JDa = (int)(365.25 * ($tanggal->year + 4716));
        $JDb = (int)(30.6001 * ($tanggal->month + 1));
        $JDc = $tanggal->day + ($maghribUTC / 24) + $B - 1524.5 ;
        $JD = $JDa + $JDb + $JDc;
        $JD = (int)(365.25 * ($tanggal->year + 4716)) + (int)(30.6001 * ($tanggal->month + 1)) + $tanggal->day + $maghribUTC/24 + $B - 1524.5;
        // Dibulatkan
        $JD = round($JD, 3); //
        $T = ($JD - 2451545) / 36525;
        $T = round($T, 9); //
        $Sa = (280.46645 + (36000.76983 * $T)) / 360;
        $S = ($Sa - (int)$Sa) * 360;

        $ma = (357.52910 + (35999.05030 * $T)) / 360;
        $m = ($ma - (int)$ma) * 360;

        $Na = (125.04 - (1934.136 * $T)) / 360;
        $N = ($Na - (int)$Na) * 360;
        $N < 0 ? $N += 360 : $N;

        $K1 = (17.264 / 3600) * sinDegree($N) + (0.206 / 3600) * sinDegree(2 * $N);
        $K2 = (-1.264 / 3600) * sinDegree(2 * $S);
        
        $R1 = (9.23 / 3600) * cosDegree($N) - (0.090 / 3600) * cosDegree(2 * $N);
        $R2 = (0.548 / 3600) * cosDegree(2 * $S);

        $Q1 = 23.43929111 + $R1 + $R2 - (46.8150 / 3600) * $T;
        $E = (6898.06 / 3600) * sinDegree($m) + (72.095 / 3600) * sinDegree(2 * $m) + (0.966 / 3600) * sinDegree(3 * $m);
        $S1 = $S + $E + $K1 + $K2 - (20.47 / 3600);
        $d = asinDegree(sinDegree($S1) * sinDegree($Q1));
        $eHilal = (-1.915 * sinDegree($m) + -0.02 * sinDegree(2 * $m) + 2.466 * sinDegree(2 * $S1) + -0.053 * sinDegree(4 * $S1)) / 15;
        $sdHilal = 0.267 / (1 - 0.017 * cosDegree($m));
        // Data Matahari
        return [
            'e' => $eHilal,
            'd' => $d,
            'sd' => $sdHilal,
            'T' => $T,
        ];
    }
}

if (!function_exists('hilal')) {

    function hilal($BT, $LT, $e, $d, $tanggal, $TZ, $TT)
    {   
        // sedikit berbeda dengan kitab irsyadul murid karena nilai JD dan T tidak dibulatkan
        $Aa = (int)($tanggal->year / 100);
        $A = (int)($Aa / 4);
        $B = 2 - $Aa + $A;
        $tanggal < \Carbon\Carbon::create("1582-10-15") ? $B = 0 : $B = $B;
        
        $sd = jeanMeus($tanggal)['sd'];
        $maghribUTC = shalat($BT, $LT, $e, $d, $tanggal, 0, $TT, $sd)['Maghrib']['UTC'];
        $JDa = (int)(365.25 * ($tanggal->year + 4716));
        $JDb = (int)(30.6001 * ($tanggal->month + 1));
        $JDc = $tanggal->day + ($maghribUTC / 24) + $B - 1524.5 ;
        $JD = $JDa + $JDb + $JDc;
        $JD = (int)(365.25 * ($tanggal->year + 4716)) + (int)(30.6001 * ($tanggal->month + 1)) + $tanggal->day + $maghribUTC/24 + $B - 1524.5;
        // Dibulatkan
        // $JD = round($JD, 3);
        $T = ($JD - 2451545) / 36525;
        // $T = round($T, 9);
        $Sa = (280.46645 + (36000.76983 * $T)) / 360;
        $S = ($Sa - (int)$Sa) * 360;

        $ma = (357.52910 + (35999.05030 * $T)) / 360;
        $m = ($ma - (int)$ma) * 360;

        $Na = (125.04 - (1934.136 * $T)) / 360;
        $N = ($Na - (int)$Na) * 360;
        $N < 0 ? $N += 360 : $N;

        $K1 = (17.264 / 3600) * sinDegree($N) + (0.206 / 3600) * sinDegree(2 * $N);
        $K2 = (-1.264 / 3600) * sinDegree(2 * $S);
        
        $R1 = (9.23 / 3600) * cosDegree($N) - (0.090 / 3600) * cosDegree(2 * $N);
        $R2 = (0.548 / 3600) * cosDegree(2 * $S);

        $Q1 = 23.43929111 + $R1 + $R2 - (46.8150 / 3600) * $T;
        $E = (6898.06 / 3600) * sinDegree($m) + (72.095 / 3600) * sinDegree(2 * $m) + (0.966 / 3600) * sinDegree(3 * $m);
        $S1 = $S + $E + $K1 + $K2 - (20.47 / 3600);
        $d = asinDegree(sinDegree($S1) * sinDegree($Q1));
        $PT = atanDegree(tanDegree($S1) * cosDegree($Q1));
        if($S1 >= 90  && $S1 < 270){
            $PT += 180;
        }else if($S1 >= 270  && $S1 <= 360){
            $PT += 360;
        }
        $eHilal = (-1.915 * sinDegree($m) + -0.02 * sinDegree(2 * $m) + 2.466 * sinDegree(2 * $S1) + -0.053 * sinDegree(4 * $S1)) / 15;
        $sdHilal = 0.267 / (1 - 0.017 * cosDegree($m));
        $Dip = (1.76 / 60) * sqrt($TT);
        $h = -($sdHilal + (34.5 / 60) + $Dip);
        $t = acosDegree(-tanDegree($LT) * tanDegree($d) + sinDegree($h) / cosDegree($LT) / cosDegree($d));
        $Grb = $t / 15 + (12 - $eHilal);
        $GrbWD = $Grb + (($TZ * 15) - $BT) / 15;
        $AzBarat = atanDegree(-sindegree($LT) / tanDegree($t) + cosDegree($LT) * tanDegree($d) / sinDegree($t));
        $AzUtara = $t < 180 ? $AzBarat + 270 : $AzBarat + 90;
        $Ra = 1.00014 - 0.01671 * cosDegree($m) - 0.00014 * cosDegree(2 * $m);
        $R = $Ra * 149597870;
        // Data Matahari
        // Data Bulan
        $Ma = (218.31617 + 481267.88088 * $T) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        $AaHilal = (134.96292 + 477198.86753 * $T) / 360;
        $AHilal = ($AaHilal - (int)$AaHilal) * 360;
        $Fa = (093.27283 + 483202.01873 * $T) / 360;
        $F = ($Fa - (int)$Fa) * 360;
        $Da = (297.85027 + 445267.11135 * $T) / 360;
        $D = ($Da - (int)$Da) * 360;
        $T1 = (22640 / 3600) * sinDegree($AHilal);
        $T2 = (-4586 / 3600) * sinDegree($AHilal - (2 * $D));
        $T3 = (2370 / 3600) * sinDegree(2 * $D);
        $T4 = (769 / 3600) * sinDegree(2 * $AHilal);
        $T5 = (-668 / 3600) * sinDegree($m);
        $T6 = (-412 / 3600) * sinDegree(2 * $F);
        $T7 = (-212 / 3600) * sinDegree((2 * $AHilal) - (2 * $D));
        $T8 = (-206 / 3600) * sinDegree($AHilal + $m - (2 * $D));
        $T9 = (192 / 3600) * sinDegree($AHilal + (2 * $D));
        $T10 = (-165 / 3600) * sinDegree($m - (2 * $D));
        $T11 = (148 / 3600) * sinDegree($AHilal - $m);
        $T12 = (-125 / 3600) * sinDegree($D);
        $T13 = (-110 / 3600) * sinDegree($AHilal + $m);
        $T14 = (-55 / 3600) * sinDegree((2 * $F) - (2 * $D));
        $C = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13 + $T14;
        $Mo = ($M + $C + $K1 + $K2 - (20.47 / 3600));
        $A1 = $AHilal + $T2 + $T3 + $T5;
        $L1 = (18461 / 3600) * sinDegree($F) + (1010 / 3600) * sinDegree($AHilal + $F) + (1000 / 3600) * sinDegree($AHilal - $F) - (624 / 3600) * sinDegree($F - (2 * $D)) - (199 / 3600) * sinDegree($AHilal - $F - (2 * $D)) - (167 / 3600) * sinDegree($AHilal + $F - (2 * $D));
        $x = atanDegree(sinDegree($Mo) * tanDegree($Q1));
        $y = ($L1 + $x);
        $dc = asinDegree(sinDegree($Mo) * sinDegree($Q1) * sinDegree($y) / sinDegree($x));
        $PTc = acosDegree(cosDegree($Mo) * cosDegree($L1) / cosDegree($dc));
        if($Mo >= 180 && $Mo <= 360){
            $PTc = 360 - $PTc;
        }
        $tc = ($PT - $PTc) + $t;
        $hc = asinDegree(sinDegree($LT) * sinDegree($dc) + cosDegree($LT) * cosDegree($dc) * cosDegree($tc));
        
        $p = (384401 * (1 - pow(0.0549, 2)) / (1 + 0.0549 * cosDegree($A1 + $T1)));
        $p1 = $p / 384401;
        $HP = 0.9507 / $p1;
        $sdc = (0.5181 / $p1) / 2;
        $P = $HP * cosDegree($hc);
        $Ref = 0.0167 / tanDegree($hc + 7.31 / ($hc + 4.4));
        $hc1 = $hc - $P;
        if($hc1 >= 0){
            $hc1 += $sdc + $Ref + $Dip;
        }
        
        $AzcBarat = atanDegree(-sinDegree($LT) / tanDegree($tc) + cosDegree($LT) * tanDegree($dc) / sinDegree($tc));
        $AzcUtara = $AzcBarat + 270;
        $z = $AzcUtara - $AzUtara;
        $Dc = ($PTc - $PT) / 15;
        $Dh = abs($hc1 - $h);
        $Dz = abs($AzcUtara - $AzUtara);
        $AL = acosDegree(cosDegree($Dh) * cosDegree($Dz));
        // dd(formatDMS($Dz));
        // $AL = acosDegree(cosDegree(abs($hc1 - $h)) * cosDegree(abs($AzcUtara - $AzUtara)));
        $Cw = (1 -cosDegree($AL)) * $sdc * 60;
        $EL = acosDegree(cosDegree($Mo - $S1) * cosDegree($L1));
        $FIa = acosDegree(- cosDegree($EL));
        $FI = (1 + cosDegree($FIa)) / 2;
        $FIPersen = $FI * 100;
        $Ms = $GrbWD + $Dc;
        $result = [
            'Aa' => $Aa,
            'A' => $A,
            'B' => $B,
            'JDa' => $JDa,
            'JDb' => $JDb,
            'JDc' => $JDc,
            'JD' => $JD,
            'T' => $T,
            'S' => formatDMS($S),
            'm' => formatDMS($m),
            'N' => formatDMS($N),
            'K1' => formatDMS($K1),
            'K2' => formatDMS($K2),
            'R1' => formatDMS($R1),
            'R2' => formatDMS($R2),
            'Q1' => formatDMS($Q1),
            'E' => formatDMS($E),
            'S1' => formatDMS($S1),
            'd' => formatDMS($d),
            'PT' => formatDMS($PT),
            'e' => formatDMS($eHilal),
            'sd' => formatDMS($sdHilal),
            'Dip' => formatDMS($Dip),
            'h' => formatDMS($h),
            't' => formatDMS($t),
            'Grb' => [
                'LMT' => formatJam($Grb, "LMT"),
                'WD' => formatJam($GrbWD, "WIB") //WD
            ],
            'Az' => [
                'Barat' => formatDMS($AzBarat),
                'Utara' => formatDMS($AzUtara)
            ],
            'Ra' => $Ra . " (AU)",
            'R' => $R . " (Km)",
            'M' => formatDMS($M),
            'AHilal' => formatDMS($AHilal),
            'F' => formatDMS($F),
            'D' => formatDMS($D),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'T14' => formatDMS($T14),
            'C' => formatDMS($C),
            'Mo' => formatDMS($Mo),
            'A1' => formatDMS($A1),
            'L1' => formatDMS($L1),
            'x' => formatDMS($x),
            'y' => formatDMS($y),
            'dc' => formatDMS($dc),
            'PTc' => formatDMS($PTc),
            'tc' => formatDMS($tc),
            'hc' => formatDMS($hc),
            'p' => $p . " (km)",
            'p1' => $p1,
            'HP' => formatDMS($HP),
            'sdc' => formatDMS($sdc),
            'P' => formatDMS($P),
            'Ref' => formatDMS($Ref),
            'hc1' => formatDMS($hc1),
            'Azc' => [
                'Barat' => formatDMS($AzcBarat),
                'Utara' => formatDMS($AzcUtara)
            ],
            'z' => formatDMS($z),
            'Dc' => formatJam($Dc, ""),
            'AL' => formatDMS($AL),
            'Cw' => $Cw . " M",
            'EL' => formatDMS($EL),
            'FIa' => formatDMS($FIa),
            'FI' => $FI ." / " . round($FIPersen, 2) . "%",
            'Ms' => formatJam($Ms, "WIB"), //WD
        ];
        return $result;
    }
}

if (!function_exists('ijtima')) {

    function ijtima($tahun, $bulan, $jenis, $TZ, $rounded = 15)
    {   
        // $jenis=0; untuk ijtima, 0.5 untuk purnama
        $HY = $tahun + (($bulan * 29.53) / 354.3671);
        $K = round(($HY - 1410) * 12) - $jenis;
        $T = $K / 1200;
        $JD = 2447740.652 + 29.53058868 * $K + 0.0001178 * pow($T, 2);
        $Ma = (207.9587074 + 29.10535608 * $K + -0.0000333 * pow($T, 2)) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        // M'
        $MQa = (111.1791307 + 385.81691806 * $K + 0.0107306 * pow($T, 2)) / 360;
        $Mq = ($MQa - (int)$MQa) * 360;
        $Fa = (164.2162296 + 390.67050646 * $K + -0.0016528 * pow($T, 2)) / 360;
        $F = ($Fa - (int)$Fa) * 360;

        $T1 = (0.1734 - 0.000393 * $T) * sinDegree($M);
        $T2 = 0.0021 * sinDegree(2 * $M);
        $T3 = -0.4068 * sinDegree($Mq);
        $T4 = 0.0161 * sinDegree(2 * $Mq);
        $T5 = -0.0004 * sinDegree(3 * $Mq);
        $T6 = 0.0104 * sinDegree(2 * $F);
        $T7 = -0.0051 * sinDegree($M + $Mq);
        $T8 = -0.0074 * sinDegree($M - $Mq);
        $T9 = 0.0004 * sinDegree((2 * $F) + $M);
        $T10 = -0.0004 * sinDegree((2 * $F) - $M);
        $T11 = -0.0006 * sinDegree((2 * $F) + $Mq);
        $T12 = 0.0010 * sinDegree((2 * $F) - $Mq);
        $T13 = 0.0005 * sinDegree($M + (2 * $Mq));
        $MT = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13; 

        $JDI = $JD + 0.5 + $MT;
        $W1 = ($JDI - (int)$JDI) * 24;
        $WD = $W1 + $TZ;

        if((int)$JDI < 2299161){
            $Z = (int)($JDI);
            $A = $Z;
        }else{
            $Z = (int)($JDI);
            $AA = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $AA - (int)($AA / 4);
        }

        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E = (int)(($B - $D) / 30.6001);
        $TGL = (int)($B - $D - (int)(30.6001 * $E));
        $WD > 24 ? $TGL += 1 : $TGL = $TGL;
        $BLN = ($E < 13.5) ? ($E -1) : $E;

        // Harus di uji
        $THN = $BLN < 2.5 ? ($C - 4715 ): ($C - 4716);

        $PA = (int)($Z) + 2;

        $date =  $THN . "-" . $BLN . "-" . $TGL;
        return [
            'HY' => $HY,
            'K' => $K,
            'T' => $T,
            'JD' => $JD,
            'M' => formatDMS($M),
            'Mq' => formatDMS($Mq),
            'F' => formatDMS($F),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'MT' => formatDMS($MT),
            'JDI' => $JDI,
            'W1' => formatJam($W1, "UT"),
            'WD' => formatJam($WD, "WIB"), //WD
            'Z' => $Z,
            'AA' => $AA,
            'A' => $A,
            'B' => $B,
            'C' => $C,
            'D' => $D,
            'E' => $E,
            'TGL' => $TGL,
            'BLN' => $BLN,
            'PA' => $PA,
            'THN' => $THN,
            'DATE_CARBON' => Carbon::create($THN . '-' . $BLN . '-' . $TGL),
            'Hari' => cariHari(\Carbon\Carbon::create($date))['Hari'],
            'Pasaran' => cariHari(\Carbon\Carbon::create($date))['Pasaran'],
        ];
    }
}
if (!function_exists('khusuf')) {

    function khusuf($tahun, $bulan, $TZ, $rounded = 15)
    {   
        $HY = $tahun + (($bulan * 29.53) / 354.3671);
        $K = round(($HY - 1410) * 12) - 0.5;
        $T = $K / 1200;
        $Fa = (164.2159288 + 390.67050274 * $K + -0.0016341 * pow($T, 2) + -0.00000227 * pow($T, 3)) / 360;
        $F = ($Fa - (int)$Fa) * 360;
        $JD = 2447740.651689 + 29.530588853 * $K + (0.0001337 * pow($T, 2)) - (0.00000015 * pow($T, 3));
        $Ma = (207.9623868 + 29.10535669 * $K + -0.0000218 * pow($T, 2)) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        // M'
        $MQa = (111.1797657 + 385.81693528 * $K + 0.0107438 * pow($T, 2) + 0.00001239 * pow($T, 3)) / 360;
        $Mq = ($MQa - (int)$MQa) * 360;
        
        $omegaQ = (326.4991207 + -1.5637558 * $K + 0.0020691 * pow($T, 2) + 0.00000215 * pow($T, 3)) / 360;
        $omega = ($omegaQ - (int)$omegaQ) * 360;
        $F1a = (($F - 0.02665 * sinDegree($omega)) / 360);
        $F1 = ($F1a - (int)$F1a) * 360;
        $A1a = ((285.9142682 + 0.107408 * $K + -0.009173 * pow($T, 2)) / 360);
        $A1 = ($A1a - (int)$A1a) * 360;
        $E = 1 - 0.002516 * $T + -0.0000074 * pow($T, 2);

        $T1 = -0.4065 * sinDegree($Mq);
        $T2 = 0.1727 * $E * sinDegree($M);
        $T3 = 0.0161 * sinDegree(2 * $Mq);
        $T4 = -0.0097 * sinDegree(2 * $F1);
        $T5 = 0.0073 * $E * sinDegree($Mq - $M);
        $T6 = -0.005 * $E * sinDegree($Mq + $M);
        $T7 = -0.0023 * sinDegree($Mq - (2 * $F1));
        $T8 = 0.0021 * $E * sinDegree(2 * $M);
        $T9 = 0.0012 * sinDegree($Mq + (2 * $F1));
        $T10 = 0.0006 * $E * sinDegree((2 * $Mq) + $M);
        $T11 = -0.0004 * sinDegree(3 * $Mq);
        $T12 = -0.0003 * $E * sinDegree($M + (2 * $F1));
        $T13 = 0.0003 * sinDegree($A1);
        $T14 = -0.0002 * $E * sinDegree($M + (2 * $F1));
        $T15 = -0.0002 * $E * sinDegree((2 * $Mq) - $M);
        $T16 = -0.0002 * sinDegree($omega);
        $MT = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13 + $T14 + $T15 + $T16; 

        $JDI = $JD + 0.5 + $MT;
        $T0 = ($JDI - (int)$JDI) * 24;
        $WD = $T0 + $TZ;

        if((int)$JDI < 2299161){
            $Z = (int)($JDI);
            $A = $Z;
        }else{
            $Z = (int)($JDI);
            $AA = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $AA - (int)($AA / 4);
        }

        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E2 = (int)(($B - $D) / 30.6001);
        $TGL = (int)($B - $D - (int)(30.6001 * $E2));
        $WD > 24 ? $TGL += 1 : $TGL = $TGL;
        $BLN = ($E2 < 13.5) ? ($E2 -1) : $E2;

        // Harus di uji
        $THN = $BLN < 2.5 ? ($C - 4715 ): ($C - 4716);

        $PA = (int)($Z) + 2;

        $date =  $THN . "-" . $BLN . "-" . $TGL;

        $S1 = -0.0048 * $E * cosDegree($M);
        $S2 = 0.0020 * $E * cosDegree(2*$M);
        $S3 = -0.3299 * cosDegree($Mq);
        $S4 = -0.0060 * $E * cosDegree($M + $Mq);
        $S5 = 0.0041 * $E * cosDegree($M - $Mq);
        $S = 5.2207 + $S1 + $S2 + $S3 + $S4 + $S5;

        $C1 = 0.0024 * $E * sinDegree(2 * $M);
        $C2 = -0.0392 * sinDegree($Mq);
        $C3 = 0.0116 * sinDegree(2 * $Mq);
        $C4 = -0.0073 * $E * sinDegree($M + $Mq);
        $C5 = -0.0067 * $E * sinDegree($M - $Mq);
        $C6 = 0.0118 * sinDegree(2 * $F);
        $CI = 0.2070 * sinDegree($M) + $C1 + $C2 + $C3 + $C4 + $C5 + $C6;

        $W = abs(cosDegree($F1));
        $Y = ($S * sinDegree($F1) + $CI * cosDegree($F1)) * (1 - 0.0048 * $W);

        $U1 = 0.0046 * $E * cosDegree($M);
        $U2 = -0.0182 * cosDegree($Mq);
        $U3 = 0.0004 * cosDegree(2 * $Mq);
        $U4 = -0.0005 * cosDegree($M + $Mq);
        $U = 0.00059 + $U1 + $U2 + $U3 + $U4;

        $H = 1.5800 + $U;
        $P = 1.0128 - $U;
        $R = 0.4678 - $U;
        $N = 0.5458 + 0.0400 * cosDegree($Mq);
        $MG = (1.0128 - $U - abs($Y)) / 0.5450;

        $T1 = 60 / $N * sqrt(pow($H, 2) - pow($Y, 2)) / 60;
        $T2 = 60 / $N * sqrt(pow($P, 2) - pow($Y, 2)) / 60;
        $T3 = 60 / $N * sqrt(pow($R, 2) - pow($Y, 2)) / 60;

        $W1 = $WD - $T1;
        $W2 = $WD - $T2;
        $W3 = $WD - $T3;
        $W4 = $WD + $T3;
        $W5 = $WD + $T2;
        $W6 = $WD + $T1;

        return [
            'HY' => $HY,
            'K' => $K,
            'T' => $T,
            'F' => formatDMS($F),
            'JD' => $JD,
            'M' => formatDMS($M),
            'Mq' => formatDMS($Mq),
            'omega' => formatDMS($omega),
            'F1' => formatDMS($F1),
            'A1' => formatDMS($A1),
            'E' => ($E),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'T14' => formatDMS($T14),
            'T15' => formatDMS($T15),
            'T16' => formatDMS($T16),
            'MT' => formatDMS($MT),
            'JDI' => $JDI,
            'T0' => formatJam($T0, "UT"),
            'WD' => formatJam($WD, "WIB"),
            'Z' => $Z,
            'AA' => $AA,
            'A' => $A,
            'B' => $B,
            'C' => $C,
            'D' => $D,
            'E2' => $E2,
            'TGL' => $TGL,
            'BLN' => $BLN,
            'PA' => $PA,
            'THN' => $THN,
            'S1' => formatDMS($S1),
            'S2' => formatDMS($S2),
            'S3' => formatDMS($S3),
            'S4' => formatDMS($S4),
            'S5' => formatDMS($S5),
            'S' => formatDMS($S),
            'C1' => formatDMS($C1),
            'C2' => formatDMS($C2),
            'C3' => formatDMS($C3),
            'C4' => formatDMS($C4),
            'C5' => formatDMS($C5),
            'C6' => formatDMS($C6),
            'CI' => formatDMS($CI),
            'W' => formatDMS($W),
            'Y' => formatDMS($Y),
            'U1' => formatDMS($U1),
            'U2' => formatDMS($U2),
            'U3' => formatDMS($U3),
            'U4' => formatDMS($U4),
            'U' => formatDMS($U),
            'H' => formatDMS($H),
            'P' => formatDMS($P),
            'R' => formatDMS($R),
            'N' => formatDMS($N),
            'MG' => ($MG),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'W1' => formatJam($W1, "WIB"),
            'W2' => formatJam($W2, "WIB"),
            'W3' => formatJam($W3, "WIB"),
            'W4' => formatJam($W4, "WIB"),
            'W5' => formatJam($W5, "WIB"),
            'W6' => formatJam($W6, "WIB"),
            'DURASI' => formatJam($W5 - $W2, ""),
            'DURASI_TOTAL' => formatJam($W4 - $W3, ""),
            'DATE_CARBON' => Carbon::create($THN . '-' . $BLN . '-' . $TGL),
            'Hari' => cariHari(\Carbon\Carbon::create($date))['Hari'],
            'Pasaran' => cariHari(\Carbon\Carbon::create($date))['Pasaran'],
        ];
    }
}
if (!function_exists('kusuf')) {

    function kusuf($tahun, $bulan, $TZ, $rounded = 15)
    {   
        $HY = $tahun + (($bulan * 29.53) / 354.3671);
        $K = round(($HY - 1410) * 12);
        $T = $K / 1200;
        $Fa = (164.2162296 + 390.67050646 * $K + -0.0016528 * pow($T, 2)) / 360;
        $F = ($Fa - (int)$Fa) * 360;
        $JD = 2447740.652 + 29.53058868 * $K;
        $Ma = (207.9587074 + 29.10535608 * $K + -0.0000333 * pow($T, 2)) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        // M'
        $MQa = (111.1791307 + 385.81691806 * $K + 0.0107306 * pow($T, 2)) / 360;
        $Mq = ($MQa - (int)$MQa) * 360;
        
        $T1 = (0.1734 - 0.000393 * $T) * sinDegree($M);
        $T2 = 0.0021 * sinDegree(2 * $M);
        $T3 = -0.4068 * sinDegree($Mq);
        $T4 = 0.0161 * sinDegree(2 * $Mq);
        $T5 = -0.0051 * sinDegree($M + $Mq);
        $T6 = -0.0074 * sinDegree($M - $Mq);
        $T7 = -0.0104 * sinDegree(2 * $F);
        $MT = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7; 

        $JDI = $JD + 0.5 + $MT;
        $T0 = ($JDI - (int)$JDI) * 24;
        $WD = $T0 + $TZ;

        if((int)$JDI < 2299161){
            $Z = (int)($JDI);
            $A = $Z;
        }else{
            $Z = (int)($JDI);
            $AA = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $AA - (int)($AA / 4);
        }

        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E2 = (int)(($B - $D) / 30.6001);
        $TGL = (int)($B - $D - (int)(30.6001 * $E2));
        $WD > 24 ? $TGL += 1 : $TGL = $TGL;
        $BLN = ($E2 < 13.5) ? ($E2 -1) : $E2;

        // Harus di uji
        $THN = $BLN < 2.5 ? ($C - 4715 ): ($C - 4716);

        $PA = (int)($Z) + 2;

        $date =  $THN . "-" . $BLN . "-" . $TGL;

        $S1 = -0.0048 * cosDegree($M);
        $S2 = 0.0020 * cosDegree(2*$M);
        $S3 = -0.3283 * cosDegree($Mq);
        $S4 = -0.0060 * cosDegree($M + $Mq);
        $S5 = 0.0041 * cosDegree($M - $Mq);
        $S = 5.19595 + $S1 + $S2 + $S3 + $S4 + $S5;

        $C1 = 0.0024 * sinDegree(2 * $M);
        $C2 = -0.0390 * sinDegree($Mq);
        $C3 = 0.0115 * sinDegree(2 * $Mq);
        $C4 = -0.0073 * sinDegree($M + $Mq);
        $C5 = -0.0067 * sinDegree($M - $Mq);
        $C6 = 0.0117 * sinDegree(2 * $F);
        $CI = 0.2070 * sinDegree($M) + $C1 + $C2 + $C3 + $C4 + $C5 + $C6;

        $W = abs(cosDegree($F)); // ?
        $Y = ($S * sinDegree($F) + $CI * cosDegree($F));
        // irsyadul murid 190
        // kalau hasil positif => utara
        // kalau negatif => selata
        $U = 0.00059 + 0.0046 * cosDegree($M) -0.0182 * cosDegree($Mq) + 0.0004 * cosDegree(2 * $Mq) -0.0005 * cosDegree($M + $Mq);

        $P = 1 + $U + 0.5460;
        $Q = 1 + $U;
        $N = 0.5458 + 0.0400 * cosDegree($Mq);

        $saatKusuf = 60 / $N * sqrt(pow($P, 2) - pow($Y, 2)) / 60;
        $saatMukts = 60 / $N * sqrt(pow($Q, 2) - pow($Y, 2)) / 60;
        $tengahGerhana = $T0;
        $awalGerhana = $T0 - $T1;
        $awalTotal = $T0 - $T2;
        $akhirTotal = $T0 + $T2;
        $akhirGerhana = $T0 + $T1;

        // need code sds and sdm for kusuf kulli and halqy

        // this code, for juz'i
        $Mag = (1.5432 + $U - abs($y)) / (0.5460 + 2 * $U);

        return [
            'HY' => $HY,
            'K' => $K,
            'T' => $T,
            'F' => formatDMS($F),
            'JD' => $JD,
            'M' => formatDMS($M),
            'Mq' => formatDMS($Mq),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'MT' => formatDMS($MT),
            'JDI' => $JDI,
            'T0' => formatJam($T0, "UT"),
            'WD' => formatJam($WD, "WIB"),
            'Z' => $Z,
            'AA' => $AA,
            'A' => $A,
            'B' => $B,
            'C' => $C,
            'D' => $D,
            'E2' => $E2,
            'TGL' => $TGL,
            'BLN' => $BLN,
            'PA' => $PA,
            'THN' => $THN,
            'S1' => formatDMS($S1),
            'S2' => formatDMS($S2),
            'S3' => formatDMS($S3),
            'S4' => formatDMS($S4),
            'S5' => formatDMS($S5),
            'S' => formatDMS($S),
            'C1' => formatDMS($C1),
            'C2' => formatDMS($C2),
            'C3' => formatDMS($C3),
            'C4' => formatDMS($C4),
            'C5' => formatDMS($C5),
            'C6' => formatDMS($C6),
            'CI' => formatDMS($CI),
            'W' => formatDMS($W),
            'Y' => formatDMS($Y),
            'U' => formatDMS($U),
            'P' => formatDMS($P),
            'Q' => formatDMS($Q),
            'N' => formatDMS($N),
            'saatKusuf' => formatDMS($saatKusuf),
            'saatMukts' => formatDMS($saatMukts),
            'tengahGerhana' => formatJam($tengahGerhana, "WIB"),
            'awalGerhana' => formatJam($awalGerhana, "WIB"),
            'awalTotal' => formatJam($awalTotal, "WIB"),
            'akhirTotal' => formatJam($akhirTotal, "WIB"),
            'akhirGerhana' => formatJam($akhirGerhana, "WIB"),
            '$Mag' => $Mag,
            'DURASI' => formatJam($akhirGerhana - $awalGerhana, ""),
            'DATE_CARBON' => Carbon::create($THN . '-' . $BLN . '-' . $TGL),
            'Hari' => cariHari(\Carbon\Carbon::create($date))['Hari'],
            'Pasaran' => cariHari(\Carbon\Carbon::create($date))['Pasaran'],
        ];
    }
}

if (!function_exists('quarter')) {

    function quarter($tahun, $bulan, $jenis, $TZ)
    {   
        $HY = $tahun + ($bulan * 29.53) / 354.3671;
        $K = round(($HY - 1410) * 12) - $jenis;
        $T = $K / 1200;
        $JD = 2447740.652 + 29.53058868 * $K + 0.0001178 * pow($T, 2);
        $Ma = (207.9587074 + 29.10535608 * $K + -0.0000333 * pow($T, 2)) / 360;
        $M = ($Ma - (int)$Ma) * 360;
        // M'
        $MQa = (111.1791307 + 385.81691806 * $K + 0.0107306 * pow($T, 2)) / 360;
        $Mq = ($MQa - (int)$MQa) * 360;
        $Fa = (164.2162296 + 390.67050646 * $K + -0.0016528 * pow($T, 2)) / 360;
        $F = ($Fa - (int)$Fa) * 360;

        $T1 = (0.1721 - 0.0004 * $T) * sinDegree($M);
        $T2 = 0.0021 * sinDegree(2 * $M);
        $T3 = -0.6280 * sinDegree($Mq);
        $T4 = 0.0089 * sinDegree(2 * $Mq);
        $T5 = -0.0004 * sinDegree(3 * $Mq);
        $T6 = 0.0079 * sinDegree(2 * $F);
        $T7 = -0.0119 * sinDegree($M + $Mq);
        $T8 = -0.0047 * sinDegree($M - $Mq);
        $T9 = 0.0003 * sinDegree((2 * $F) + $M);
        $T10 = -0.0004 * sinDegree((2 * $F) - $M);
        $T11 = -0.0006 * sinDegree((2 * $F) + $Mq);
        $T12 = 0.0021 * sinDegree((2 * $F) - $Mq);
        $T13 = 0.0003 * sinDegree($M + (2 * $Mq));
        $T14 = 0.0004 * sinDegree($M - (2 * $Mq));
        $T15 = -0.0003 * sinDegree((2 * $M) + $Mq);
        $MT1 = $T1 + $T2 + $T3 + $T4 + $T5 + $T6 + $T7 + $T8 + $T9 + $T10 + $T11 + $T12 + $T13 + $T14 + $T15; 
        $MT = $MT1 + (0.0028 - (0.0004 * cosDegree($Mq)) + (0.0003 * cosDegree($Mq)));
        $JDI = $JD + 0.5 + $MT;
        $W1 = ($JDI - (int)$JDI) * 24;
        $WD = $W1 + $TZ;

        if((int)$JDI < 2299161){
            $A = $JDI;
        }else{
            $Z = (int)($JDI);
            $AA = (int)(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $AA - (int)($AA / 4);
        }

        $B = $A + 1524;
        $C = (int)(($B - 122.1) / 365.25);
        $D = (int)(365.25 * $C);
        $E = (int)(($B - $D) / 30.6001);

        $TGL = (int)($B - $D - (int)(30.6001 * $E));
        $WD > 24 ? $TGL += 1 : $TGL = $TGL;

        $E < 13.5 ? $BLN = $E -1 : $BLN = $E;

        // ?Harus di uji
        $BLN < 2.5 ? $THN = $C - 4715 : $THN = $C - 4716;

        $PA = (int)($Z) + 2;

        $date =  $THN . "-" . $BLN . "-" . $TGL ;
        return [
            'HY' => $HY,
            'K' => $K,
            'T' => $T,
            'JD' => $JD,
            'M' => formatDMS($M),
            'Mq' => formatDMS($Mq),
            'F' => formatDMS($F),
            'T1' => formatDMS($T1),
            'T2' => formatDMS($T2),
            'T3' => formatDMS($T3),
            'T4' => formatDMS($T4),
            'T5' => formatDMS($T5),
            'T6' => formatDMS($T6),
            'T7' => formatDMS($T7),
            'T8' => formatDMS($T8),
            'T9' => formatDMS($T9),
            'T10' => formatDMS($T10),
            'T11' => formatDMS($T11),
            'T12' => formatDMS($T12),
            'T13' => formatDMS($T13),
            'T14' => formatDMS($T14),
            'T15' => formatDMS($T15),
            'MT' => formatDMS($MT),
            'JDI' => $JDI,
            'W1' => formatJam($W1, "UT"),
            'WD' => formatJam($WD, "WD"),
            'A' => $A,
            'B' => $B,
            'C' => $C,
            'D' => $D,
            'E' => $E,
            'TGL' => $TGL,
            'BLN' => $BLN,
            'THN' => $THN,
            'Hari' => cariHari(\Carbon\Carbon::create($date))['Hari'],
            'Pasaran' => cariHari(\Carbon\Carbon::create($date))['Pasaran'],
        ];
    }
}

if (!function_exists('formatDMS')) {

    function formatDMS($variable)
    {   
        $da = floor(abs($variable));
        if($variable < 0){
          $da = (floor(abs($variable)) - floor(abs($variable)) * 2);
          $da == 0 ? $da = -$da : $da = $da;
        }
        $ma = abs((($variable) - $da) * 60);
        $mb = floor($ma);
        $sa = $ma - $mb;
        $sb = round((($sa/60) * 3600) ,2);
        $hasil = $da . "° " . $mb . "' " . $sb . "\"";
        return $hasil;
    }
}

if (!function_exists('formatJam')) {

    function formatJam($variable, $satuan, $ihtiyath=0, $menitOnly=false)
    {   
        $variable += ($ihtiyath / 60); 
        $variable < 0 ? $variable += 24 : $variable = $variable;
        $variable > 24 ? $variable -= 24 : $variable = $variable;
        $da = floor(abs($variable));
        if($variable < 0){
            $da = (floor(abs($variable)) - floor(abs($variable)) * 2);
        }
        
        $ma = abs((($variable) - $da) * 60);
        $mb = floor($ma);
        $sa = $ma - $mb;
        $sb = round((($sa/60) * 3600) ,2);
        if(!$menitOnly){
            if($sb == 60) {
                $mb += 1;
                $sb = 0;
            }
            $formatedDa = strlen($da) == 1 ? 0 . $da : $da;
            $formatedMb = strlen($mb) == 1 ? 0 . $mb : $mb;
            $formatedSb = strlen((int)$sb) == 1 ? 0 . $sb : $sb;
            $hasil = $formatedDa . ":" . $formatedMb . ":" . $formatedSb . " " . $satuan;
        }else{
            if(round($sb) >= 30) {
                $mb += 1;
            }
            if($mb == 60){
                $mb = 0;
                $da += 1;
            }
            $sb = 0;
            $formatedDa = strlen($da) == 1 ? 0 . $da : $da;
            $formatedMb = strlen($mb) == 1 ? 0 . $mb : $mb;
            $formatedSb = strlen((int)$sb) == 1 ? 0 . $sb : $sb;
            $hasil = $formatedDa . ":" . $formatedMb . " " . $satuan;
        }
        return $hasil;
    }
}

if (!function_exists('conversiMiladiHijri')) {

    function conversiMiladiHijri($tanggals, $AW, $hari, $bulan, $tahun)
    {   
        $B = cariHari($tanggals)['B'];
        $AM = cariHari($tanggals)['AM'];
        $AH = $AM - $AW;
        $tahunHijri = (int)($AH / 354.3671);
        $hariA = $tahunHijri * 354.3671;
        $haria = $AH - $hariA;
        $haria < 0 ? $hari = floor(($haria)) : $hari = ceil($haria); 
        $jenis = kabisatBasithohHijri(abs($tahunHijri));

        if($jenis == "basithoh"){
            $hari < 0 ? $hari += 354 : $hari == $hari;
            $bulan = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'H')->where('jumlah', '>=', ($hari))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'H')->where('jumlah', '<', ($hari))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }
        else{
            $hari < 0 ? $hari += 354 : $hari == $hari;
            $bulan = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'H')->where('jumlah', '>=', ($hari))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'H')->where('jumlah', '<', ($hari))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }

        $tanggal = $hari - $jumlahTanggal;
        return [
            'AW' => $tanggal,
            'AH' => $AH,
            'AM' => $AM,
            'tanggal' => $tanggal,
            'bulan' => $namaBulan,
            'tahun' => $tahunHijri,
            'hari' => cariHari($tanggals)['Hari'],
            'pasaran' => cariHari($tanggals)['Pasaran'],
        ];
    }
}

if (!function_exists('conversiHijriMiladi')) {

    function conversiHijriMiladi($tanggal, $mabda , $hari, $bulan, $tahun)
    {   
        if(!is_null($hari) && !is_null($bulan) && !is_null($tahun)){
            $day = $hari;
            $month = $bulan;
            $year = $tahun;
        }else{
            $day = $tanggal->day;
            $month = $tanggal->month;
            $year = $tanggal->year;
        }

        $AW = $mabda;
        $AHa = (int)(11 * ($year/30));
        $AHb = (int)(354 * $year);
        $AHc = $month * 30;
        $AHd = (int)(($month - 1) / 2);
        $AH = $AHa + $AHb + $AHc - $AHd + $day - 384;
        $AM = $AH + $AW;
        $AMa = (int)($AM / 1461);
        // Tahun Miladi
        $AMb = $AMa * 4;
        $AMc = $AMa * 1461;
        // Jumlah Hari
        $AMd = $AM - $AMc;
        $AMe = (int)($AMd / 365); 
        $AMf = $AMe * 365;
        // Sisa Hari 
        $AMg = $AMd - $AMf;
        // Jumlah Tahun
        $y = $AMb + $AMe + 1;
        if($y <= 1582 && $AMg < 288){
            $B = 0;
        }else{
            $A = (int)($y / 100);
            $AB = (int)($A / 4); 
            $B = 2 - $A + $AB;
        }
        // Jumlah Hari
        $AMh = $AMg - $B;
        if(kabisatBasithoh($y) == "basithoh"){
            $bulan = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'M')->where('jumlah', '>', ($AMh))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 0)->where('jenis_bulan', 'M')->where('jumlah', '<', ($AMh))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }else{
            $bulan = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'M')->where('jumlah', '>', ($AMh))->first();
            $namaBulan = $bulan->nama;
            $tanggal = Bulan::where('jenis_tahun', 1)->where('jenis_bulan', 'M')->where('jumlah', '<', ($AMh))->latest('id')->first();
            $jumlahTanggal = $tanggal->jumlah;
        }

        $tanggal = $AMh - $jumlahTanggal;
        $date = \Carbon\Carbon::create($y . "-" . $bulan->nomor . "-" . $tanggal) ;

        return [
            'AW' => $AW,
            'AH' => $AH,
            'AM' => $AM,
            'tanggal' => $tanggal,
            'bulan' => $namaBulan,
            'tahun' => $y,
            'hari' => cariHari($date)['Hari'],
            'pasaran' => cariHari($date)['Pasaran'],
        ];
    }
}

if (!function_exists('cariHari')) {

    function cariHari($hariIni)
    {   
        $day = $hariIni->day;
        $month = $hariIni->month;
        $year = $hariIni->year;

        if($month < 3){
            $month += 12;
            $year -= 1;
        }

        if($hariIni < '1582-10-15'){
            $B = 0;
        }else{
            $B = 2 - (int)($year / 100) + (int)((int)($year / 100) / 4);
        }
        $AM = (int)(365.25 * $year) + (int)(30.6001 * ($month + 1)) + $day + $B - 428;
        $Hr = $AM - (int)($AM / 7) * 7;
        $Psr = $AM - (int)($AM / 5) * 5;

        $hari = Hari::where('jenis', 7)->where('nilai', $Hr)->first()->nama;
        $pasaran = Hari::where('jenis', 5)->where('nilai', $Psr)->first()->nama;
        
        if($month == 10 && $year == 1582){
            if($day > 4 && $day < 15){
                $B = "Tanggal tidak tercatat di dalam sejarah";
                $AM = "Tanggal tidak tercatat di dalam sejarah";
                $hari = "Tanggal tidak tercatat di dalam sejarah";
                $pasaran = "Tanggal tidak tercatat di dalam sejarah";
            }
        }

        return [
            'B' => $B,
            'AM' => $AM,
            'Hari' => $hari,
            'Pasaran' => $pasaran
        ];
    }
}

if (!function_exists('hariHijri')) {

    function hariHijri($hariIni)
    {   
        $day = $hariIni->day;
        $month = $hariIni->month;
        $year = $hariIni->year;

        // if($month < 3){
        //     $month += 12;
        //     $year -= 1;
        // }
        // if($day < 15 && $month <= 10 && $year <= 1582){
        //     $B = 0;
        // }else{
        //     $B = 2 - (int)($year / 100) + (int)((int)($year / 100) / 4);
        // }
        $AH = (int)((11 * $year) / 30) + (int)(354 * $year) + (int)($month * 30) - (int)(($month - 1) / 2) + $day - 384;
        $Hr = $AH - (int)($AH / 7) * 7;
        $Psr = $AH - (int)($AH / 5) * 5;
        
        $Hr == 0 ? $Hr = 6 : $Hr-= 1;
        $Psr == 4 ? $Psr = 0 : $Psr += 1;
    
        $hari = Hari::where('jenis', 7)->where('nilai', $Hr)->first()->nama;
        $pasaran = Hari::where('jenis', 5)->where('nilai', $Psr)->first()->nama;

        return [
            'AH' => $AH,
            'Hari' => $hari,
            'Pasaran' => $pasaran
        ];
    }
}

if (!function_exists('kabisatBasithohHijri')) {

    function kabisatBasithohHijri($y)
    {   
        $a = ($y / 30) - (int)($y / 30);
        $hasil = round($a * 30);
        if ($hasil == 2 || $hasil == 5 || $hasil == 7 || $hasil == 10 || $hasil == 13 || $hasil == 16 || $hasil == 18 || $hasil == 21 || $hasil == 24 || $hasil == 26 || $hasil == 29){
            $jenis = "kabisat";
        }else{
            $jenis = "basithoh";
        }

        return $jenis;
    }
}

if (!function_exists('kabisatBasithoh')) {

    function kabisatBasithoh($y)
    {   
        $length = strlen($y);
        $abad = substr($y, ($length - 2));
        if ($abad == 00){
            if($y % 400 == 0){
                $jenis = "kabisat";
            }else{
                $jenis = "basithoh";
            }
        }elseif($y % 4 == 0){
            $jenis = "kabisat";
        }else{
            $jenis = "basithoh";
        }

        return $jenis;
    }
}

if (!function_exists('angle')) {

    function angle($variable)
    {   
        // pembulatan
        $depan = floor(abs($variable));
        $belakang = abs($variable) - floor(abs($variable));
        if($variable < 0){
          $depan = floor(abs($variable)) - floor(abs($variable)) * 2;
          $belakang -= $belakang * 2;
        }
        if($depan >= 360 || $depan <= -360){
            $depan = $depan % 360;
        }
        // pembulatan
        return $depan + $belakang;
    }
}

if (!function_exists('pecahJam')) {

    function pecahJam($WIS, $e, $TZ, $BT, $ihtiyath = 0, $wdFormat = "WD", $metode="irsyad", $menitOnly=false)
    {   
        $LMT = angle($WIS - $e);
        $WD = angle($LMT + (($TZ * 15) - $BT) / 15);
        
        if($metode != "irsyad"){
            $WD = $WIS + ((105-$BT)/15) - $e;
        }
        // pembulatan
        return [
            'WIS_IHTIYATH' => formatJam($WIS, 'WIS', $ihtiyath, $menitOnly),
            'LMT_IHTIYATH' => formatJam($LMT, 'LMT', $ihtiyath, $menitOnly),
            'WD_IHTIYATH' => formatJam($WD, $wdFormat, $ihtiyath, $menitOnly),
            'WIS' => formatJam($WIS, 'WIS', 0, $menitOnly),
            'LMT' => formatJam($LMT, 'LMT', 0, $menitOnly),
            'WD' => formatJam($WD, $wdFormat, 0, $menitOnly),
            'UTC' => $WD,
        ];
    }
}

if (!function_exists('desimalJam')) {

    function desimalJam($WIS, $e, $TZ, $BT, $ihtiyath=0, $wdFormat="WD", $menitOnly)
    {   
        $LMT = angle($WIS - $e);
        $WD = angle($LMT + (($TZ * 15) - $BT) / 15);
        // pembulatan
        return [
            'WIS' => $WIS,
            'LMT' => formatImsak($LMT, "LMT", $ihtiyath, $menitOnly),
            'WD' => formatImsak($WD, $wdFormat, $ihtiyath, $menitOnly), 
        ];
    }
}

if (!function_exists('formatImsak')) {

    function formatImsak($WIS, $satuan, $ihtiyath=0, $menitOnly)
    {   
        $WIS = $WIS + ($ihtiyath / 60);
        // pembulatan
        $WIS < 0 ? $WIS += 24 : $WIS = $WIS;
        $da = floor(abs($WIS));
        if($WIS < 0){
          $da = (floor(abs($WIS)) - floor(abs($WIS)) * 2);
        }
        $ma = abs((($WIS) - $da) * 60);
        $mb = floor($ma);
        $sa = $ma - $mb;
        $sb = round((($sa/60) * 3600) ,2);
        if($mb < 10){
            $da -= 1;
            $mb += 50; 
        }else{
            $mb -= 10;
        }
        if(!$menitOnly){
            $formatedDa = strlen($da) == 1 ? 0 . $da : $da;
            $formatedMb = strlen($mb) == 1 ? 0 . $mb : $mb;
            $formatedSb = strlen((int)$sb) == 1 ? 0 . $sb : $sb;
            $hasil = $formatedDa . ":" . $formatedMb . ":" . $formatedSb . " " . $satuan;
        }else{
            if($sb >= 30){
                $mb += 1;
            }
            $formatedDa = strlen($da) == 1 ? 0 . $da : $da;
            $formatedMb = strlen($mb) == 1 ? 0 . $mb : $mb;
            $hasil = $formatedDa . ":" . $formatedMb . " " . $satuan;
        }
        return $hasil;
    }
}

if (!function_exists('jeanMeus')) {

    function jeanMeus($date, $rounded = 15)
    {   
        // $date = \Carbon\Carbon::now();
        // $A = (int)($date->year / 100);
        
        // Data Tes
        // $tahun = 2004;
        // $bulan = 1;
        // $hari = 1;

        $A = (int)($date->year / 100);
        $B = (int)($A / 4);
        $G = (2 - $A + $B);
    
        if($date->month < 3){
            $M = $date->month + 12;
            $Y = $date->year - 1;
        }else{
            $M = $date->month;
            $Y = $date->year;
        }
        // Data Tes
        // if($bulan < 3){
        //     $M = $bulan + 12;
        //     $Y = $tahun - 1;
        // }else{
        //     $M = $bulan;
        //     $Y = $tahun;
        // }
    
        $W = (12 + (30 / 60) - 7) / 24;
        $JDa = (int)(365.25 * $Y);
        $JDb = (int)(30.6001 * ($M + 1));
        //Julian Date
        $JD = $JDa + $JDb + $date->day + 1720994.5 + $W + $G; 
        $T = ($JD - 2415020) / 36525;
        $WSa = (279.69668 + 36000.76892 * $T + 0.0003025 * pow($T, 2)) / 360;
        //Wasatus Syams
        $WS = ($WSa -(int)$WSa) * 360; 
        $KSa = (358.47583 + 35999.04975 * $T - 0.00015 * pow($T, 2) - 0.0000033 * pow($T, 3)) / 360;
        //Khosoh Syams
        $KS = ($KSa -(int)$KSa) * 360;
        // semi diameter matahari irsyadul murid - harus di uji
        $sd = 0.267 / (1 - 0.017 * cosDegree($KS));
        // Ta'dilu Syams
        $TDS = (1.91946 - 0.004789 * $T - 0.000014 * pow($T, 2)) * sinDegree($KS) + (0.020094 - 0.0001 * $T) * sinDegree(2 * $KS) + 0.000293 * sinDegree(3 * $KS);
        //Thulusy Syams
        $TS = $WS + $TDS;
        // Maillul Kulli 
        $Mkl = 23.452294 - 0.0130125 * $T - 0.000000164 * pow($T, 2) + 0.000000503 * pow($T, 3);
        // Mailusy Syams
        $Dek = asinDegree(sinDegree($TS) * sinDegree($Mkl));
        $QA = 0.5 * $Mkl;
        $A = round(pow(tanDegree($QA), 2), $rounded);
        $E1 = round((0.01675104 - 0.0000418 * $T), $rounded);
        $E2 = round((0.000000126 * pow($T, 2)), $rounded);
        $E = round(($E1 + $E2), $rounded);
        $Q1 = round($A * sinDegree(2 * $WS), $rounded);
        $Q2 = round(2 *$E * sinDegree($KS), $rounded);
        $Q3 = round((4 * $E * $A * sinDegree($KS) * cosDegree(2 * $WS)),$rounded);
        $Q4 = round((0.5 * pow($A, 2) * sinDegree(4 * $WS)), $rounded);
        $Q5 = round((1.25 * pow($E, 2) * sinDegree(2 * $KS)), $rounded);
        $Q = round(($Q1 - $Q2 + $Q3 - $Q4 - $Q5),$rounded);
        // Daqoiqut Tafawut
        $W = ($Q * 57.29577951) / 15;
        $data = [
            'JD' => $JD,
            'WS' => $WS,
            'KS' => $KS,
            'TDS' => $TDS,
            'TS' => $TS,
            'Mkl' => $Mkl,
            'Dek' => $Dek,
            'W' => $W,
            'sd' => $sd
        ];
        return $data;
    }
}