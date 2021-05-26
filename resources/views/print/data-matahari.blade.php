<h4>Data Matahari</h4>
<div class="row">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>S</th>
                    <td>Frac((280.46645 + 3600.76983 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['S'] }}</td>
                </tr>
                <tr>
                    <th>m</th>
                    <td>Frac((357.52910 + 35999.05030 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['m'] }}</td>
                </tr>
                <tr>
                    <th>N</th>
                    <td>Frac((125.04 - 1934.136 * T) / 360) * 360</td>
                    <td class="col-value">{{ $hilal['N'] }}</td>
                </tr>
                <tr>
                    <th>K'</th>
                    <td>(17.264 / 3600) * sin N + (0.206 / 3600) * sin 2N</td>
                    <td class="col-value">{{ $hilal['K1'] }}</td>
                </tr>
                <tr>
                    <th>K"</th>
                    <td>(-1.264 / 3600) * sin 2S</td>
                    <td class="col-value">{{ $hilal['K2'] }}</td>
                </tr>
                <tr>
                    <th>R'</th>
                    <td>(9.23 / 3600) * cos N - (0.090 / 3600) * cos 2N</td>
                    <td class="col-value">{{ $hilal['R1'] }}</td>
                </tr>
                <tr>
                    <th>R"</th>
                    <td>(0.548 / 3600) * cos 2S</td>
                    <td class="col-value">{{ $hilal['R2'] }}</td>
                </tr>
                <tr>
                    <th>Q'</th>
                    <td>23.43929111 + R' + R" - (46.8150 / 3600) * T</td>
                    <td class="col-value">{{ $hilal['Q1'] }}</td>
                </tr>
                <tr>
                    <th>E</th>
                    <td>(6898.06 / 3600) * sin m + (72.095 / 3600) * sin 2m + (0.966 / 3600) * sin 3m</td>
                    <td class="col-value">{{ $hilal['E'] }}</td>
                </tr>
                <tr>
                    <th>S'</th>
                    <td>S + E + K' + K" - (20.47 / 3600)</td>
                    <td class="col-value">{{ $hilal['S1'] }}</td>
                </tr>
                <tr>
                    <th>&delta;</th>
                    <td>Sin<sup>-1</sup> (sin S' * sin Q')</td>
                    <td class="col-value">{{ $hilal['d'] }}</td>
                </tr>
                <tr>
                    <th>PT</th>
                    <td>Tan<sup>-1</sup> (tan S' * cos Q')</td>
                    <td class="col-value">{{ $hilal['PT'] }}</td>
                </tr>
                <tr>
                    <th>e</th>
                    <td>(-1.915 * sin m + -0.02 * sin 2m + 2.466 * sin 2S' + -0.053 * sin 4S') / 15</td>
                    <td class="col-value">{{ $hilal['e'] }}</td>
                </tr>
                <tr>
                    <th>s.d</th>
                    <td>0.267 / (1 - 0.017 * cos m)</td>
                    <td class="col-value">{{ $hilal['sd'] }}</td>
                </tr>
                <tr>
                    <th>Dip</th>
                    <td>(1.76 / 60) * &radic; TT</td>
                    <td class="col-value">{{ $hilal['Dip'] }}</td>
                </tr>
                <tr>
                    <th>h</th>
                    <td>-(s.d + (34.5 / 60) + Dip)</td>
                    <td class="col-value">{{ $hilal['h'] }}</td>
                </tr>
                <tr>
                    <th>t</th>
                    <td>Cos<sup>-1</sup> (-tan &phi; * tan &delta; + sin h / cos &phi; / cos &delta;)</td>
                    <td class="col-value">{{ $hilal['t'] }}</td>
                </tr>
                <tr>
                    <th>GLMT</th>
                    <td>t / 15 + (12 - e)</td>
                    <td class="col-value">{{ $hilal['Grb']['LMT'] }}</td>
                </tr>
                <tr>
                    <th>Grb Wib</th>
                    <td>GLMT + (BWD - &lambda;) / 15</td>
                    <td class="col-value">{{ $hilal['Grb']['WD'] }}</td>
                </tr>
                <tr>
                    <th>Az Barat</th>
                    <td>Tan<sup>-1</sup>(-sin &phi; / tan t + cos &phi; * tan &delta; / sin t)</td>
                    <td class="col-value">{{ $hilal['Az']['Barat'] }}</td>
                </tr>
                <tr>
                    <th>Az Utara</th>
                    <td>Az Barat + 270</td>
                    <td class="col-value">{{ $hilal['Az']['Utara'] }}</td>
                </tr>
                <tr>
                    <th>Ra</th>
                    <td>1.00014 - 0.0167 * cos m - 0.00014 * cos 2m</td>
                    <td class="col-value">{{ $hilal['Ra'] }}</td>
                </tr>
                <tr>
                    <th>R</th>
                    <td>Ra * 149597870</td>
                    <td class="col-value">{{ $hilal['R'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>s.d</th>
                    <td>0.267 / (1 - 0.017 * cos m)</td>
                    <td class="col-value">{{ $hilal['sd'] }}</td>
                </tr>
                <tr>
                    <th>Dip</th>
                    <td>(1.76 / 60) * &radic; TT</td>
                    <td class="col-value">{{ $hilal['Dip'] }}</td>
                </tr>
                <tr>
                    <th>h</th>
                    <td>-(s.d + (34.5 / 60) + Dip)</td>
                    <td class="col-value">{{ $hilal['h'] }}</td>
                </tr>
                <tr>
                    <th>t</th>
                    <td>Cos<sup>-1</sup> (-tan &phi; * tan &delta; + sin h / cos &phi; / cos &delta;)</td>
                    <td class="col-value">{{ $hilal['t'] }}</td>
                </tr>
                <tr>
                    <th>GLMT</th>
                    <td>t / 15 + (12 - e)</td>
                    <td class="col-value">{{ $hilal['Grb']['LMT'] }}</td>
                </tr>
                <tr>
                    <th>Grb Wib</th>
                    <td>GLMT + (BWD - &lambda;) / 15</td>
                    <td class="col-value">{{ $hilal['Grb']['WD'] }}</td>
                </tr>
                <tr>
                    <th>Az Barat</th>
                    <td>Tan<sup>-1</sup>(-sin &phi; / tan t + cos &phi; * tan &delta; / sin t)</td>
                    <td class="col-value">{{ $hilal['Az']['Barat'] }}</td>
                </tr>
                <tr>
                    <th>Az Utara</th>
                    <td>Az Barat + 270</td>
                    <td class="col-value">{{ $hilal['Az']['Utara'] }}</td>
                </tr>
                <tr>
                    <th>Ra</th>
                    <td>1.00014 - 0.0167 * cos m - 0.00014 * cos 2m</td>
                    <td class="col-value">{{ $hilal['Ra'] }}</td>
                </tr>
                <tr>
                    <th>R</th>
                    <td>Ra * 149597870</td>
                    <td class="col-value">{{ $hilal['R'] }}</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
</div>