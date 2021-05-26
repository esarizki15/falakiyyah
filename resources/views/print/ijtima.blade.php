<h4>Data Ijtima'</h4>
<div class="row">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>HY</th>
                    <td>Y + (M * 29.53) / 354.3671</td>
                    <td class="col-value">...</td>
                </tr>
                <tr>
                    <th>K</th>
                    <td>(HY - 1410) * 12</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T</th>
                    <td>K / 1200</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>JD</th>
                    <td>2447740.652 + 29.53058868 * K + 0.0001178 * T<sup>2</sup></td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>M</th>
                    <td>Frac((207.9587074 + 29.10535608 * K + -0.0000333 * T<sup>2</sup>) / 360) * 360</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>M'</th>
                    <td>Frac((111.1791307 + 385.81691806 * K + 0.0107306 * T<sup>2</sup>) / 360) * 360</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T1</th>
                    <td>(0.1734 - 0.000393 * T) * sin M</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T2</th>
                    <td>0.0021 * sin 2M</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T3</th>
                    <td>-0.4068 * sin M'</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T4</th>
                    <td>0.0161 * sin 2M'</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T5</th>
                    <td>-0.0004 * sin 3M'</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T6</th>
                    <td>0.0104 * sin 2F</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T7</th>
                    <td>-0.0051 * sin (M + M')</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T8</th>
                    <td>-0.0074 * sin (M - M')</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T9</th>
                    <td>0.0004 * sin (2F + M)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T10</th>
                    <td>-0.0004 * sin (2F - M)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T11</th>
                    <td>-0.0006 * sin (2F + M')</td>
                    <td class="col-value"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>T12</th>
                    <td>0.0010 * sin (2F - M')</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>T13</th>
                    <td>0.0005 * sin (M + 2M')</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>MT</th>
                    <td>T1 s/d T13</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>JD Ijtima'</th>
                    <td>JD + 0.5 + MT</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>WI</th>
                    <td>(JD - (int)JD) * 24</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>WI WIB</th>
                    <td>WI + Time Zone</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>Z</th>
                    <td>int(JD Ijtima')</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>AA</th>
                    <td>int((Z - 1867216.25) / 36524.25)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>A</th>
                    <td>Z + 1 + AA - int(AA / 4)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>B</th>
                    <td>A + 1524</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>C</th>
                    <td>int((B - 122.1) / 365.25)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>D</th>
                    <td>int(365.25 * C)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>E</th>
                    <td>int((B - D) / 30.6001)</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>TGL</th>
                    <td>int(B - D - int(30.6001 * E))</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>BLN</th>
                    <td>E - 1</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>THN</th>
                    <td>C - 4716</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>PA</th>
                    <td>Z + 2</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>Hari</th>
                    <td>PA - int(PA / 7) * 7</td>
                    <td class="col-value"></td>
                </tr>
                <tr>
                    <th>Pasaran</th>
                    <td>PA - int(PA / 5) * 5</td>
                    <td class="col-value"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>