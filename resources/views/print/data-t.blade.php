<h4>Data T</h4>
<div class="row">
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>Aa</th>
                    <td>int(MY / 100)</td>
                    <td class="col-value">{{ $hilal['Aa'] }}</td>
                </tr>
                <tr>
                    <th>A</th>
                    <td>Aa / 4</td>
                    <td class="col-value">{{ $hilal['A'] }}</td>
                </tr>
                <tr>
                    <th>B</th>
                    <td>2 - Aa + A</td>
                    <td class="col-value">{{ $hilal["B"] }}</td>
                </tr>
                <tr>
                    <th>JDa</th>
                    <td>365.25 * ({{ $astronomical['tanggal']->year }} + 4716)</td>
                    <td class="col-value">{{ $hilal["JDa"] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-hover display nowrap table-bordered table-rumus" style="width:100%;">
            <tbody>
                <tr>
                    <th>JDb</th>
                    <td>30.6001 * ({{ $astronomical['tanggal']->month }} + 1)</td>
                    <td class="col-value">{{ $hilal['JDb'] }}</td>
                </tr>
                <tr>
                    <th>JDc</th>
                    <td>14 + (Maghrib UTC / 24) + -13 - 1524.5</td>
                    <td class="col-value">{{ $hilal['JDc'] }}</td>
                </tr>
                <tr>
                    <th>JD</th>
                    <td>(JDa + JDb + JDc)</td>
                    <td class="col-value">{{ $hilal['JD'] }}</td>
                </tr>
                <tr>
                    <th>T</th>
                    <td>(JD - 2451545) / 36525</td>
                    <td class="col-value">{{ $hilal['T'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>