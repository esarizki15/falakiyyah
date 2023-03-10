<h4>Data Gerhana Matahari</h4>
<div class="row">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>HY</th>
                    <td>Y + (M * 29.53) / 354.3671</td>
                    <td class="col-value">{{ $data['HY'] }}</td>
                </tr>
                <tr>
                    <th>K</th>
                    <td>(HY - 1410) * 12 - 0.5</td>
                    <td class="col-value">{{ $data['K'] }}</td>
                </tr>
                <tr>
                    <th>T</th>
                    <td>K / 1200</td>
                    <td class="col-value">{{ $data['T'] }}</td>
                </tr>
                <tr>
                    <th>F</th>
                    <td>Frac((164.2162296 + 390.67050646 * K + -0.0016528 * T<sup>2</sup>) / 360) * 360</td>
                    <td class="col-value">{{ $data['F'] }}</td>
                </tr>
                <tr>
                    <th>JD</th>
                    <td>2447740.652 + 29.53058868 * K</td>
                    <td class="col-value">{{ $data['JD'] }}</td>
                </tr>
                <tr>
                    <th>M</th>
                    <td>Frac((207.9587074 + 29.10535608 * K + -0.0000333 * T<sup>2</sup>) / 360) * 360</td>
                    <td class="col-value">{{ $data['M'] }}</td>
                </tr>
                <tr>
                    <th>M'</th>
                    <td>Frac((111.1791307 + 385.81691806 * K + 0.0107306 * T<sup>2</sup>) / 360) * 360</td>
                    <td class="col-value">{{ $data['Mq'] }}</td>
                </tr>
                <tr>
                    <th>T1</th>
                    <td>(0.1734 - 0.000393 * T) * sin M'</td>
                    <td class="col-value">{{ $data['T1'] }}</td>
                </tr>
                <tr>
                    <th>T2</th>
                    <td>0.0021 * sin 2M</td>
                    <td class="col-value">{{ $data['T2'] }}</td>
                </tr>
                <tr>
                    <th>T3</th>
                    <td>-0.4068 * sin M'</td>
                    <td class="col-value">{{ $data['T3'] }}</td>
                </tr>
                <tr>
                    <th>T4</th>
                    <td>-0.0161 * sin 2M'</td>
                    <td class="col-value">{{ $data['T4'] }}</td>
                </tr>
                <tr>
                    <th>T5</th>
                    <td>-0.0051 *  sin (M + M')</td>
                    <td class="col-value">{{ $data['T5'] }}</td>
                </tr>
                <tr>
                    <th>T6</th>
                    <td>-0.0074 * sin(M - M')</td>
                    <td class="col-value">{{ $data['T6'] }}</td>
                </tr>
                <tr>
                    <th>T7</th>
                    <td>-0.0104 * sin 2F</td>
                    <td class="col-value">{{ $data['T7'] }}</td>
                </tr>
                <tr>
                    <th>MT</th>
                    <td>T1 s/d T7</td>
                    <td class="col-value">{{ $data['MT'] }}</td>
                </tr>
                <tr>
                    <th>JD Ijtima'</th>
                    <td>JD + 0.5 + MT</td>
                    <td class="col-value">{{ $data['JDI'] }}</td>
                </tr>
                <tr>
                    <th>Tengah Gerhana</th>
                    <td>(JD - (int)JD) * 24</td>
                    <td class="col-value">{{ $data['T0'] }}</td>
                </tr>
                <tr>
                    <th>Tengah Gerhana WIB</th>
                    <td>Tengah Gerhana + Time Zone</td>
                    <td class="col-value">{{ $data['WD'] }}</td>
                </tr>
                <tr>
                    <th>Z</th>
                    <td>int(JD Ijtima')</td>
                    <td class="col-value">{{ $data['Z'] }}</td>
                </tr>
                <tr>
                    <th>AA</th>
                    <td>int((Z - 1867216.25) / 36524.25)</td>
                    <td class="col-value">{{ $data['AA'] }}</td>
                </tr>
                <tr>
                    <th>A</th>
                    <td>Z + 1 + AA - int(AA / 4)</td>
                    <td class="col-value">{{ $data['A'] }}</td>
                </tr>
                <tr>
                    <th>B</th>
                    <td>A + 1524</td>
                    <td class="col-value">{{ $data['B'] }}</td>
                </tr>
                <tr>
                    <th>C</th>
                    <td>int((B - 122.1) / 365.25)</td>
                    <td class="col-value">{{ $data['C'] }}</td>
                </tr>
                <tr>
                    <th>D</th>
                    <td>int(365.25 * C)</td>
                    <td class="col-value">{{ $data['D'] }}</td>
                </tr>
                <tr>
                    <th>E</th>
                    <td>int((B - D) / 30.6001)</td>
                    <td class="col-value">{{ $data['E2'] }}</td>
                </tr>
                <tr>
                    <th>TGL</th>
                    <td>int(B - D - int(30.6001 * E))</td>
                    <td class="col-value">{{ $data['TGL'] }}</td>
                </tr>
                <tr>
                    <th>BLN</th>
                    <td>E - 1</td>
                    <td class="col-value">{{ $data['BLN'] }}</td>
                </tr>
                <tr>
                    <th>THN</th>
                    <td>C - 4716</td>
                    <td class="col-value">{{ $data['THN'] }}</td>
                </tr>
                <tr>
                    <th>PA</th>
                    <td>Z + 2</td>
                    <td class="col-value">{{ $data['PA'] }}</td>
                </tr>
                <tr>
                    <th>Hari</th>
                    <td>PA - int(PA / 7) * 7</td>
                    <td class="col-value">{{ $data['Hari'] }}</td>
                </tr>
                <tr>
                    <th>Pasaran</th>
                    <td>PA - int(PA / 5) * 5</td>
                    <td class="col-value">{{ $data['Pasaran'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>S1</th>
                    <td>-0.0048 * cos (M)</td>
                    <td class="col-value">{{ $data['S1'] }}</td>
                </tr>
                <tr>
                    <th>S2</th>
                    <td>0.0020 * cos (2*M)</td>
                    <td class="col-value">{{ $data['S2'] }}</td>
                </tr>
                <tr>
                    <th>S3</th>
                    <td>-0.3283 * cos (M')</td>
                    <td class="col-value">{{ $data['S3'] }}</td>
                </tr>
                <tr>
                    <th>S4</th>
                    <td>-0.0060 * cos (M + M')</td>
                    <td class="col-value">{{ $data['S4'] }}</td>
                </tr>
                <tr>
                    <th>S5</th>
                    <td>0.0041 * cos (M - M')</td>
                    <td class="col-value">{{ $data['S5'] }}</td>
                </tr>
                <tr>
                    <th>S</th>
                    <td>5.19595 + S1 + S2 + S3 + S4 + S5</td>
                    <td class="col-value">{{ $data['S'] }}</td>
                </tr>
                <tr>
                    <th>C1</th>
                    <td>0.0024 * sin (2 * M)</td>
                    <td class="col-value">{{ $data['C1'] }}</td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td>-0.0390 * sin (M')</td>
                    <td class="col-value">{{ $data['C2'] }}</td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td>0.0115 * sin (2 * M')</td>
                    <td class="col-value">{{ $data['C3'] }}</td>
                </tr>
                <tr>
                    <th>C4</th>
                    <td>-0.0073 * sin (M + M')</td>
                    <td class="col-value">{{ $data['C4'] }}</td>
                </tr>
                <tr>
                    <th>C5</th>
                    <td>-0.0067 * sin (M - M')</td>
                    <td class="col-value">{{ $data['C5'] }}</td>
                </tr>
                <tr>
                    <th>C6</th>
                    <td>0.0117 * sin (2 * F)</td>
                    <td class="col-value">{{ $data['C6'] }}</td>
                </tr>
                <tr>
                    <th>C</th>
                    <td>0.2070 * sin (M) + C1 + C2 + C3 + C4 + C5 + C6</td>
                    <td class="col-value">{{ $data['CI'] }}</td>
                </tr>
                <tr>
                    <th>Y</th>
                    <td>S * sin F + C * cos F (Gamma)</td>
                    <td class="col-value">{{ $data['Y'] }}</td>
                </tr>
                <tr>
                    <th>U</th>
                    <td>0.0059 + 0.0046 * cos M - 0.0182 * cos M' + 0.0004 * cos 2M' - 0.0005 * cos(M + M')</td>
                    <td class="col-value">{{ $data['U'] }}</td>
                </tr>
                <tr>
                    <th>P</th>
                    <td>1 + U + 0.5460</td>
                    <td class="col-value">{{ $data['P'] }}</td>
                </tr>
                <tr>
                    <th>Q</th>
                    <td>1 + U</td>
                    <td class="col-value">{{ $data['Q'] }}</td>
                </tr>
                <tr>
                    <th>N</th>
                    <td>0.5458 + 0.0400 * cos (M')</td>
                    <td class="col-value">{{ $data['N'] }}</td>
                </tr>
                <tr>
                    <th>T1</th>
                    <td>60 / N * &Sqrt;(P<sup>2</sup> - Y<sup>2</sup>) / 60</td>
                    <td class="col-value">{{ $data['saatKusuf'] }}</td>
                </tr>
                <tr>
                    <th>T2</th>
                    <td>60 / N * &Sqrt;(Q<sup>2</sup> - Y<sup>2</sup>) / 60</td>
                    <td class="col-value">{{ $data['saatMukts'] }}</td>
                </tr>
                <tr>
                    <th>Tengah Gerhana</th>
                    <td>T0</td>
                    <td class="col-value">{{ $data['tengahGerhana'] }}</td>
                </tr>
                <tr>
                    <th>Awal Gerhana</th>
                    <td>T0 - T1</td>
                    <td class="col-value">{{ $data['awalGerhana'] }}</td>
                </tr>
                <tr>
                    <th>Akhir Gerhana</th>
                    <td>T0 - T3</td>
                    <td class="col-value">{{ $data['akhirGerhana'] }}</td>
                </tr>
                <tr>
                    <th>Mag</th>
                    <td>(1.5432 + U - abs(Y)) / (0.5460 + 2 * U)</td>
                    <td class="col-value">{{ $data['Mag'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row divIdToPrint py-5">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>