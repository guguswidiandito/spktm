@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h1>Prediksi</h1>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        {!! Form::open(['url' => '/admin/mahasiswa/prediksi/ipk/semester1-4/', 'method'=>'get', 'class'=>'form-inline']) !!}
                        {!! Form::select('angkatan',[]+App\Mahasiswa::pluck('angkatan', 'angkatan')->all(), null,  ['class'=>'form-control', 'placeholder'=>'Pilih angkatan', 'required']) !!}
                        {!! Form::submit('Lihat Prediksi', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($mahasiswa->whereIn('angkatan', ['2010', '2011', '2012'])->count() > 0)
@php
foreach ($mahasiswa as $m) {
if (($m->target == 'lulus tepat waktu') and ($m->prediksi14 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tp[] = $satu;
$sumtp = collect($tp)->sum();
if (($m->target == 'tidak lulus tepat waktu') and ($m->prediksi14 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fp[] = $satu;
$sumfp = collect($fp)->sum();
if (($m->target == 'lulus tepat waktu') && ($m->prediksi14 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fn[] = $satu;
$sumfn = collect($fn)->sum();
if (($m->target == 'tidak lulus tepat waktu') && ($m->prediksi14 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tn[] = $satu;
$sumtn = collect($tn)->sum();
}
$total = $mahasiswa->count();
$tpfp = $sumtp+$sumfp;
$fntn = $sumfn+$sumtn;
$fntp = $sumfn+$sumtp;
$fptn = $sumfp+$sumtn;
$accuracy = round(($sumtp+$sumtn)/$total, 4);
$acc100 = $accuracy*100;
$error = round(($sumfp+$sumfn)/$total, 4);
$err100 = $error*100;
if ($sumtn == 0 and $sumfp == 0) {
$recall = 0;
} else {
$recall = round($sumtn /($sumfp+$sumtn), 4);
}
$rec100 = $recall*100;
if ($sumtn == 0 and $sumfn == 0 && $sumtn == 0) {
$precision = 0;
} else {
$precision = round($sumtn /($sumfn+$sumtn), 4);
}
$prec100 = $precision*100;
@endphp
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h1>Confussion Matrix</h1>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <table class="table table-bordered">
                            <tr>
                                <td>N = {{ $mahasiswa->count() }}</td>
                                <th>Prediksi Tepat Waktu (1)</th>
                                <th>Prediksi Tidak Tepat Waktu (0)</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Aktual Tepat Waktu (1)</th>
                                <td>TP = {{ $sumtp }}</td>
                                <td>FN = {{ $sumfn }}</td>
                                <td>FN + TP = {{ $fntp }}</td>
                            </tr>
                            <tr>
                                <th>Aktual Tidak Tepat Waktu (0)</th>
                                <td>FP = {{ $sumfp }}</td>
                                <td>TN = {{ $sumtn }}</td>
                                <td>FP + TN = {{ $fptn }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TP + FP = {{ $tpfp }}</td>
                                <td>FN + TN = {{ $fntn }}</td>
                                <td>Total = {{ $total }}</td>
                            </tr>
                        </table>
                        <blockquote>
                            <h3>Perhitungan: </h3>
                            <p><i>Accuracy</i> = (TP+TN)/Total = ({{$sumtp}}+{{$sumtn}}/{{ $total }}) = {{ $accuracy }} = {{ $acc100 }}%</p>
                            <p><i>Error Rate</i> = (FP+FN)/Total = ({{$sumfp}}+{{$sumfn}}/{{ $total }}) = {{ $error }} = {{ $err100 }}%</p>
                            <p><i>Recall</i> (<i>TP Rate</i>) = TN/(FP+TN) = {{ $sumtn }}/({{ $sumfp }}+{{ $sumtn }}) = {{ $recall }} = {{ $rec100 }}%</p>
                            <p><i>Precision</i> = TN/(FN+TN) = {{ $sumtn }}/({{ $sumfn }}+{{ $sumtn }}) = {{ $precision }} = {{ $prec100 }}%</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
foreach ($mahasiswa as $m) {
if ($m->target == $m->prediksi14) {
$satu = 1;
} else {
$satu = 0;
}
$jml[] = $satu;
}
$sum = collect($jml)->sum();
$all = $mahasiswa->count();
$nol = $all - $sum;
$cocok = ($sum/$all)*100;
$beda = ($nol/$all)*100;
@endphp
<div class="span6">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h1>{{ round($cocok, 2) }}% Cocok</h1>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <div class="progress progress-success active">
                            <div class="bar" style="width: {{ round($cocok, 2) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="span6">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h1>{{ round($beda, 2) }}% Tidak Cocok</h1>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <div class="progress progress-danger active">
                            <div class="bar" style="width: {{ round($beda, 2) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if ($mahasiswa->whereIn('angkatan', ['2010', '2011', '2012'])->count() > 0)
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h1>IPK Semester 1-4</h1>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        @if ($mahasiswa->count() > 0)
                        <div>
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>NIM</th>
                                        <th>IPK 1</th>
                                        <th>IPK 2</th>
                                        <th>IPK 3</th>
                                        <th>IPK 4</th>
                                        <th>Aktual</th>
                                        <th>Hasil Uji</th>
                                        <th>Ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mahasiswa as $key => $m)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $m->nim }}</td>
                                        <td>{{ $m->ipk_smt_1 }}</td>
                                        <td>{{ $m->ipk_smt_2 }}</td>
                                        <td>{{ $m->ipk_smt_3 }}</td>
                                        <td>{{ $m->ipk_smt_4 }}</td>
                                        <td>{{ $m->target }}</td>
                                        <td>
                                            @php
                                            if ($m->target == $m->prediksi14) {
                                            echo $m->prediksi14;
                                            } elseif ($m->target <> $m->prediksi14) {
                                            echo '<strong class="text-danger">';
                                            echo $m->prediksi14;
                                            echo '</strong>';
                                            }
                                            if ($m->prediksi14 == '') {
                                            echo '<strong class="text-info">tidak ada hasil</strong>';
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            if ($m->target == $m->prediksi14) {
                                            echo 'sama';
                                            } else {
                                            echo 'beda';
                                            }
                                            @endphp
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @else
                        Tidak ada data
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>{!! Form::open(['url' => route('export.prediksi.semester1-4'),
            'method' => 'post']) !!}
            {!! Form::submit('Laporan', ['class'=>'btn btn-primary']) !!}
            Implementasi
            {!! Form::close() !!}</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        @if ($mahasiswa->count() > 0)
                        <div>
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>NIM</th>
                                        <th>IPK 1</th>
                                        <th>IPK 2</th>
                                        <th>IPK 3</th>
                                        <th>IPK 4</th>
                                        <th>Prediksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mahasiswa as $key => $m)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $m->nim }}</td>
                                        <td>{{ $m->ipk_smt_1 }}</td>
                                        <td>{{ $m->ipk_smt_2 }}</td>
                                        <td>{{ $m->ipk_smt_3 }}</td>
                                        <td>{{ $m->ipk_smt_4 }}</td>
                                        <td>
                                            @php
                                            if ($m->target == $m->prediksi14) {
                                            echo $m->prediksi14;
                                            } elseif ($m->target <> $m->prediksi14) {
                                            echo '<strong class="text-danger">';
                                            echo $m->prediksi14;
                                            echo '</strong>';
                                            }
                                            if ($m->prediksi14 == '') {
                                            echo '<strong class="text-info">tidak ada hasil</strong>';
                                            }
                                            @endphp
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @else
                        Tidak ada data
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection