<h4>Data Bulan</h4>
<div class="row">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>M</th>
                    <td>Frac((218.31617 + 481267.88088 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['M'] }}</td>
                </tr>
                <tr>
                    <th>A</th>
                    <td>Frac((134.96292 + 477198.86753 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['AHilal'] }}</td>
                </tr>
                <tr>
                    <th>F</th>
                    <td>Frac((093.27283 + 483202.01873 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['F'] }}</td>
                </tr>
                <tr>
                    <th>D</th>
                    <td>Frac((297.85027 + 445267.11135 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['D'] }}</td>
                </tr>
                <tr>
                    <th>T1</th>
                    <td>(22640 / 3600) * sin A</td>
                    <td class="col-value">{{ $hilal['T1'] }}</td>
                </tr>
                <tr>
                    <th>T2</th>
                    <td>(-4586 / 3600) * sin (A - 2D)</td>
                    <td class="col-value">{{ $hilal['T2'] }}</td>
                </tr>
                <tr>
                    <th>T3</th>
                    <td>(2370 / 3600) * sin 2D</td>
                    <td class="col-value">{{ $hilal['T3'] }}</td>
                </tr>
                <tr>
                    <th>T4</th>
                    <td>(769 / 3600) * sin 2A</td>
                    <td class="col-value">{{ $hilal['T4'] }}</td>
                </tr>
                <tr>
                    <th>T5</th>
                    <td>(-668 / 3600) * sin m</td>
                    <td class="col-value">{{ $hilal['T5'] }}</td>
                </tr>
                <tr>
                    <th>T6</th>
                    <td>(-412 / 3600) * sin 2F</td>
                    <td class="col-value">{{ $hilal['T6'] }}</td>
                </tr>
                <tr>
                    <th>T7</th>
                    <td>(-212 / 3600) * sin (2A - 2D)</td>
                    <td class="col-value">{{ $hilal['T7'] }}</td>
                </tr>
                <tr>
                    <th>T8</th>
                    <td>(-206 / 3600) * sin (A + m - 2D)</td>
                    <td class="col-value">{{ $hilal['T8'] }}</td>
                </tr>
                <tr>
                    <th>T9</th>
                    <td>(192 / 3600) * sin (A + 2D)</td>
                    <td class="col-value">{{ $hilal['T9'] }}</td>
                </tr>
                <tr>
                    <th>T10</th>
                    <td>(-165 / 3600) * sin (m - 2D)</td>
                    <td class="col-value">{{ $hilal['T10'] }}</td>
                </tr>
                <tr>
                    <th>T11</th>
                    <td>(148 / 3600) * sin (A - m)</td>
                    <td class="col-value">{{ $hilal['T11'] }}</td>
                </tr>
                <tr>
                    <th>T12</th>
                    <td>(-125 / 3600) * sin D</td>
                    <td class="col-value">{{ $hilal['T12'] }}</td>
                </tr>
                <tr>
                    <th>T13</th>
                    <td>(-110 / 3600) * sin (A + m)</td>
                    <td class="col-value">{{ $hilal['T13'] }}</td>
                </tr>
                <tr>
                    <th>T14</th>
                    <td>(-55 / 3600) * sin (2F - 2D)</td>
                    <td class="col-value">{{ $hilal['T14'] }}</td>
                </tr>
                <tr>
                    <th>C</th>
                    <td>T1 + T2 s/d T14</td>
                    <td class="col-value">{{ $hilal['C'] }}</td>
                </tr>
                <tr>
                    <th>M&omicron;</th>
                    <td>(M + C + K' + K" - 20.47")</td>
                    <td class="col-value">{{ $hilal['Mo'] }}</td>
                </tr>
                <tr>
                    <th>A'</th>
                    <td>A + T2 + T3 + T5</td>
                    <td class="col-value">{{ $hilal['A1'] }}</td>
                </tr>
                <tr>
                    <th>L'</th>
                    <td>(18461 / 3600) * sin F + (1010 / 3600) * sin (A + F) + (1000/3600) * sin (A - F) - (624 / 3600) * sin (F -2D) - (199 / 3600)* sin (A - F - 2D) - (167 / 3600) * sin (A + F - 2D)</td>
                    <td class="col-value">{{ $hilal['L1'] }}</td>
                </tr>
                <tr>
                    <th>x</th>
                    <td>Tan<sup>-1</sup> (sin M&omicron; * Tan Q')</td>
                    <td class="col-value">{{ $hilal['x'] }}</td>
                </tr>
                <tr>
                    <th>y</th>
                    <td>(L' + x)</td>
                    <td class="col-value">{{ $hilal['y'] }}</td>
                </tr>
                <tr>
                    <th>&delta;c</th>
                    <td>Sin<sup>-1</sup> (sin M&omicron; * sin Q' * sin y / sin x)</td>
                    <td class="col-value">{{ $hilal['dc'] }}</td>
                </tr>
                <tr>
                    <th>PTc</th>
                    <td>Cos<sup>-1</sup> (Cos M&omicron; * cos L' / cos &delta;c)</td>
                    <td class="col-value">{{ $hilal['PTc'] }}</td>
                </tr>
                <tr>
                    <th>tc</th>
                    <td>(PT - PTc) + t</td>
                    <td class="col-value">{{ $hilal['tc'] }}</td>
                </tr>
                <tr>
                    <th>hc</th>
                    <td>Sin<sup>-1</sup> (sin &phi; * sin &delta;c + cos &phi; * cos &delta;c * cos tc)</td>
                    <td class="col-value">{{ $hilal['hc'] }}</td>
                </tr>
                <tr>
                    <th>p</th>
                    <td>(384401 * (1 - 0.0549<sup>2</sup>)) / (1 + 0.0549 * cos (A' + T1))</td>
                    <td class="col-value">{{ $hilal['p'] }}</td>
                </tr>
                <tr>
                    <th>p'</th>
                    <td>p / 384401</td>
                    <td class="col-value">{{ $hilal['p1'] }}</td>
                </tr>
                <tr>
                    <th>HP</th>
                    <td>0.9507 / p'</td>
                    <td class="col-value">{{ $hilal['HP'] }}</td>
                </tr>
                <tr>
                    <th>s.d.c</th>
                    <td>(0.5181 / p') / 2</td>
                    <td class="col-value">{{ $hilal['sdc'] }}</td>
                </tr>
                <tr>
                    <th>P</th>
                    <td>HP * cos hc</td>
                    <td class="col-value">{{ $hilal['P'] }}</td>
                </tr>
                <tr>
                    <th>Ref</th>
                    <td>0.0167 / tan (hc + 7.31 / (hc + 4.4))</td>
                    <td class="col-value">{{ $hilal['Ref'] }}</td>
                </tr>
                <tr>
                    <th>hc'</th>
                    <td>hc - P + s.d.c + Ref + Dip</td>
                    <td class="col-value">{{ $hilal['hc1'] }}</td>
                </tr>
                <tr>
                    <th>Azc Barat</th>
                    <td>Tan<sup>-1</sup> (-sin &phi; / tan tc + cos &phi; * tan &delta;c / sin tc)</td>
                    <td class="col-value">{{ $hilal['Azc']['Barat'] }}</td>
                </tr>
                <tr>
                    <th>Azc Utara</th>
                    <td>Azc Barat + 270</td>
                    <td class="col-value">{{ $hilal['Azc']['Utara'] }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>

<div class="row divIdToPrint py-5" style='page-break-before: always;'>
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>z</th>
                    <td>Azc - Az</td>
                    <td class="col-value">{{ $hilal['z'] }}</td>
                </tr>
                <tr>
                    <th>Dc</th>
                    <td>(PTc - PT) / 15</td>
                    <td class="col-value">{{ $hilal['Dc'] }}</td>
                </tr>
                <tr>
                    <th>AL</th>
                    <td>Cos<sup>-1</sup> (cos abs(hc' - h) * cos abs(Azc - Az))</td>
                    <td class="col-value">{{ $hilal['AL'] }}</td>
                </tr>
                <tr>
                    <th>CW</th>
                    <td>(1 - cos AL) * s.d.c * 60</td>
                    <td class="col-value">{{ $hilal['Cw'] }}</td>
                </tr>
                <tr>
                    <th>EL</th>
                    <td>Cos<sup>-1</sup> (cos (M&omicron; - S') * cos L')</td>
                    <td class="col-value">{{ $hilal['EL'] }}</td>
                </tr>
                <tr>
                    <th>FIa</th>
                    <td>Cos<sup>-1</sup> (-cos EL)</td>
                    <td class="col-value">{{ $hilal['FIa'] }}</td>
                </tr>
                <tr>
                    <th>FI</th>
                    <td>(1 + cos FIa) / 2</td>
                    <td class="col-value">{{ $hilal['FI'] }}</td>
                </tr>
                <tr>
                    <th>Ms</th>
                    <td>Grb + Dc</td>
                    <td class="col-value">{{ $hilal['Ms'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>