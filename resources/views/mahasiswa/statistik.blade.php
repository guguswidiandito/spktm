@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>Tabel Penggambaran Statistik pada Data</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        @if ($mahasiswa->count() > 0)
                        @php
                        foreach ($mahasiswa->chunk(5) as $chunk) {
                        foreach ($chunk as $value) {
                        $min1  = $value->min_1;
                        $min2  = $value->min_2;
                        $min3  = $value->min_3;
                        $min4  = $value->min_4;
                        $max1  = $value->max_1;
                        $max2  = $value->max_2;
                        $max3  = $value->max_3;
                        $max4  = $value->max_4;
                        $mean1 = $value->mean_1;
                        $mean2 = $value->mean_2;
                        $mean3 = $value->mean_3;
                        $mean4 = $value->mean_4;
                        $std1  = $value->std_1;
                        $std2  = $value->std_2;
                        $std3  = $value->std_3;
                        $std4  = $value->std_4;
                        }
                        }
                        @endphp
                        <table class="table table-bordered table-condensed table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Variabel</th>
                                    <th class="text-center">Minimum</th>
                                    <th class="text-center">Maksimum</th>
                                    <th class="text-center">Mean</th>
                                    <th class="text-center">Std. deviasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>IPK Semester 1</th><td>{{ $min1 }}</td><td>{{ $max1 }}</td><td>{{ substr($mean1, 0, 4) }}</td><td>{{ round($std1, 3) }}</td>
                                </tr>
                                <tr>
                                    <th>IPK Semester 2</th><td>{{ $min2 }}</td><td>{{ $max2 }}</td><td>{{ substr($mean2, 0, 4) }}</td><td>{{ round($std2, 3) }}</td>
                                </tr>
                                <tr>
                                    <th>IPK Semester 3</th><td>{{ $min3 }}</td><td>{{ $max3 }}</td><td>{{ substr($mean3, 0, 4) }}</td><td>{{ round($std3, 3) }}</td>
                                </tr>
                                <tr>
                                    <th>IPK Semester 4</th><td>{{ $min4 }}</td><td>{{ $max4 }}</td><td>{{ substr($mean4, 0, 4) }}</td><td>{{ round($std4, 3) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td class="text-center">Tidak ada data</td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection