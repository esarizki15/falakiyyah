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
                    <th>JD Istiqbal</th>
                    <td>JD + 0.5 + MT</td>
                    <td class="col-value">{{ $data['JDI'] }}</td>
                </tr>
                <tr>
                    <th>T0</th>
                    <td>(JD - (int)JD) * 24</td>
                    <td class="col-value">{{ $data['T0'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>T0 WIB</th>
                    <td>T0 + Time Zone</td>
                    <td class="col-value">{{ $data['WD'] }}</td>
                </tr>
                <tr>
                    <th>Z</th>
                    <td>int(JD Istiqbal)</td>
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
                <tr>
                    <th>S1</th>
                    <td>-0.0048 * E * cos (M)</td>
                    <td class="col-value">{{ $data['S1'] }}</td>
                </tr>
                <tr>
                    <th>S2</th>
                    <td>0.0020 * E * cos (2*M)</td>
                    <td class="col-value">{{ $data['S2'] }}</td>
                </tr>
                <tr>
                    <th>S3</th>
                    <td>-0.3299 * cos (M')</td>
                    <td class="col-value">{{ $data['S3'] }}</td>
                </tr>
                <tr>
                    <th>S4</th>
                    <td>-0.0060 * E * cos (M + M')</td>
                    <td class="col-value">{{ $data['S4'] }}</td>
                </tr>
                <tr>
                    <th>S5</th>
                    <td>0.0041 * E * cos (M - M')</td>
                    <td class="col-value">{{ $data['S5'] }}</td>
                </tr>
                <tr>
                    <th>S</th>
                    <td>5.2207 + S1 + S2 + S3 + S4 + S5</td>
                    <td class="col-value">{{ $data['S'] }}</td>
                </tr>
                <tr>
                    <th>C1</th>
                    <td>0.0024 * E * sin (2 * M)</td>
                    <td class="col-value">{{ $data['C1'] }}</td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td>-0.0392 * sin (M')</td>
                    <td class="col-value">{{ $data['C2'] }}</td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td>0.0116 * sin (2 * M')</td>
                    <td class="col-value">{{ $data['C3'] }}</td>
                </tr>
                <tr>
                    <th>C4</th>
                    <td>-0.0073 * E * sin (M + M')</td>
                    <td class="col-value">{{ $data['C4'] }}</td>
                </tr>
                <tr>
                    <th>C5</th>
                    <td>-0.0067 * E * sin (M - M')</td>
                    <td class="col-value">{{ $data['C5'] }}</td>
                </tr>
                <tr>
                    <th>C6</th>
                    <td>0.0118 * sin (2 * F)</td>
                    <td class="col-value">{{ $data['C6'] }}</td>
                </tr>
                <tr>
                    <th>C</th>
                    <td>0.2070 * sin (M) + C1 + C2 + C3 + C4 + C5 + C6</td>
                    <td class="col-value">{{ $data['C'] }}</td>
                </tr>
                <tr>
                    <th>W</th>
                    <td>abs(cos (F<sub>1</sub>))</td>
                    <td class="col-value">{{ $data['W'] }}</td>
                </tr>
                <tr>
                    <th>Y</th>
                    <td>(S * sin (F<sub>1</sub>) + C * cos (F<sub>1</sub>)) * (1 - 0.0048 * W)</td>
                    <td class="col-value">{{ $data['Y'] }}</td>
                </tr>
                <tr>
                    <th>U1</th>
                    <td>0.0046 * E * cos (M)</td>
                    <td class="col-value">{{ $data['U1'] }}</td>
                </tr>
                <tr>
                    <th>U2</th>
                    <td>-0.0182 * cos (M')</td>
                    <td class="col-value">{{ $data['U2'] }}</td>
                </tr>
                <tr>
                    <th>U3</th>
                    <td>0.0004 * cos (2 * M')</td>
                    <td class="col-value">{{ $data['U3'] }}</td>
                </tr>
                <tr>
                    <th>U4</th>
                    <td>-0.0005 * cos (M + M')</td>
                    <td class="col-value">{{ $data['U4'] }}</td>
                </tr>
                <tr>
                    <th>U</th>
                    <td>0.00059 + U1 + U2 + U3 + U4</td>
                    <td class="col-value">{{ $data['U'] }}</td>
                </tr>
                <tr>
                    <th>H</th>
                    <td>1.5800 + U</td>
                    <td class="col-value">{{ $data['H'] }}</td>
                </tr>
                <tr>
                    <th>P</th>
                    <td>1.0128 - $U</td>
                    <td class="col-value">{{ $data['P'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row divIdToPrint py-5">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>R</th>
                    <td>0.4678 - U</td>
                    <td class="col-value">{{ $data['R'] }}</td>
                </tr>
                <tr>
                    <th>N</th>
                    <td>0.5458 + 0.0400 * cos (M')</td>
                    <td class="col-value">{{ $data['N'] }}</td>
                </tr>
                <tr>
                    <th>MG</th>
                    <td>(1.0128 - U - abs(Y)) / 0.5450</td>
                    <td class="col-value">{{ $data['MG'] }}</td>
                </tr>
                <tr>
                    <th>T1</th>
                    <td>60 / N * &Sqrt;(H<sup>2</sup> - Y<sup>2</sup>) / 60</td>
                    <td class="col-value">{{ $data['T1'] }}</td>
                </tr>
                <tr>
                    <th>T2</th>
                    <td>60 / N * &Sqrt;(P<sup>2</sup> - Y<sup>2</sup>) / 60</td>
                    <td class="col-value">{{ $data['T2'] }}</td>
                </tr>
                <tr>
                    <th>T3</th>
                    <td>60 / N * &Sqrt;(R<sup>2</sup> - Y<sup>2</sup>) / 60</td>
                    <td class="col-value">{{ $data['T3'] }}</td>
                </tr>
                <tr>
                    <th>W1</th>
                    <td>T0 - T1</td>
                    <td class="col-value">{{ $data['W1'] }} (Awal Penumbra)</td>
                </tr>
                <tr>
                    <th>W2</th>
                    <td>T0 - T2</td>
                    <td class="col-value">{{ $data['W2'] }} (Awal Gerhana)</td>
                </tr>
                <tr>
                    <th>W3</th>
                    <td>T0 - T3</td>
                    <td class="col-value">{{ $data['W3'] }} (Awal Total)</td>
                </tr>
                <tr>
                    <th>T0</th>
                    <td>T0</td>
                    <td class="col-value">{{ $data['WD'] }} (Tengah Gerhana)</td>
                </tr>
                <tr>
                    <th>W4</th>
                    <td>T0 + T3</td>
                    <td class="col-value">{{ $data['W4'] }} (Akhir Total)</td>
                </tr>
                <tr>
                    <th>W5</th>
                    <td>T0 + T2</td>
                    <td class="col-value">{{ $data['W5'] }} (Akhir Gerhana)</td>
                </tr>
                <tr>
                    <th>W6</th>
                    <td>T0 + T1</td>
                    <td class="col-value">{{ $data['W6'] }} (Akhir Penumbra)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>