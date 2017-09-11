@extends('layouts.backend')
@section('content')
@if ($mahasiswa->whereIn('angkatan', ['2010', '2011', '2012'])->count() > 0)
@php
foreach ($mahasiswa as $m) {
if (($m->target == 'lulus tepat waktu') and ($m->prediksi12 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tp[] = $satu;
$sumtp = collect($tp)->sum();
if (($m->target == 'tidak lulus tepat waktu') and ($m->prediksi12 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fp[] = $satu;
$sumfp = collect($fp)->sum();
if (($m->target == 'lulus tepat waktu') && ($m->prediksi12 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fn[] = $satu;
$sumfn = collect($fn)->sum();
if (($m->target == 'tidak lulus tepat waktu') && ($m->prediksi12 == 'tidak lulus tepat waktu')) {
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
if ($sumtn == 0 and $sumfp == 0 && $sumtn == 0) {
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
{{-- batas --}}
@php
foreach ($mahasiswa as $m) {
if (($m->target == 'lulus tepat waktu') and ($m->prediksi13 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tp1[] = $satu;
$sumtp1 = collect($tp1)->sum();
if (($m->target == 'tidak lulus tepat waktu') and ($m->prediksi13 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fp1[] = $satu;
$sumfp1 = collect($fp1)->sum();
if (($m->target == 'lulus tepat waktu') && ($m->prediksi13 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fn1[] = $satu;
$sumfn1 = collect($fn1)->sum();
if (($m->target == 'tidak lulus tepat waktu') && ($m->prediksi13 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tn1[] = $satu;
$sumtn1 = collect($tn1)->sum();
}
$total1 = $mahasiswa->count();
$tpfp1 = $sumtp1+$sumfp1;
$fntn1 = $sumfn1+$sumtn1;
$fntp1 = $sumfn1+$sumtp1;
$fptn1 = $sumfp1+$sumtn1;
$accuracy1 = round(($sumtp1+$sumtn1)/$total1, 4);
$acc1001 = $accuracy1*100;
$error1 = round(($sumfp1+$sumfn1)/$total1, 4);
$err1001 = $error1*100;
if ($sumtn1 == 0 and $sumfp1 == 0) {
$recall1 = 0;
} else {
$recall1 = round($sumtn1 /($sumfp1+$sumtn1), 4);
}
$rec1001 = $recall1*100;
if ($sumtn1 == 0 and $sumfn1 == 0) {
$precision1 = 0;
} else {
$precision1 = round($sumtn1 /($sumfn1+$sumtn1), 4);
}
$prec1001 = $precision1*100;
@endphp
{{-- Batas --}}
@php
foreach ($mahasiswa as $m) {
if (($m->target == 'lulus tepat waktu') and ($m->prediksi14 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tp2[] = $satu;
$sumtp2 = collect($tp2)->sum();
if (($m->target == 'tidak lulus tepat waktu') and ($m->prediksi14 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fp2[] = $satu;
$sumfp2 = collect($fp2)->sum();
if (($m->target == 'lulus tepat waktu') && ($m->prediksi14 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fn2[] = $satu;
$sumfn2 = collect($fn2)->sum();
if (($m->target == 'tidak lulus tepat waktu') && ($m->prediksi14 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tn2[] = $satu;
$sumtn2 = collect($tn2)->sum();
}
$total2 = $mahasiswa->count();
$tpfp2 = $sumtp2+$sumfp2;
$fntn2 = $sumfn2+$sumtn2;
$fntp2 = $sumfn2+$sumtp2;
$fptn2 = $sumfp2+$sumtn2;
$accuracy2 = round(($sumtp2+$sumtn2)/$total2, 4);
$acc1002 = $accuracy2*100;
$error2 = round(($sumfp2+$sumfn2)/$total2, 4);
$err1002 = $error2*100;
if ($sumtn2 == 0 and $sumfp2 == 0) {
$recall2 = 0;
} else {
$recall2 = round($sumtn2 /($sumfp2+$sumtn2), 4);
}
$rec1002 = $recall2*100;
if ($sumtn2 == 0 and $sumfn2 == 0) {
$precision2 = 0;
} else {
$precision2 = round($sumtn2 /($sumfn2+$sumtn2), 4);
}
$prec1002 = $precision2*100;
@endphp
{{-- Batas --}}
@php
foreach ($mahasiswa as $m) {
if (($m->target == 'lulus tepat waktu') and ($m->prediksi16 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tp3[] = $satu;
$sumtp3 = collect($tp3)->sum();
if (($m->target == 'tidak lulus tepat waktu') and ($m->prediksi16 == 'lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fp3[] = $satu;
$sumfp3 = collect($fp3)->sum();
if (($m->target == 'lulus tepat waktu') && ($m->prediksi16 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$fn3[] = $satu;
$sumfn3 = collect($fn3)->sum();
if (($m->target == 'tidak lulus tepat waktu') && ($m->prediksi16 == 'tidak lulus tepat waktu')) {
$satu = 1;
} else {
$satu = 0;
}
$tn3[] = $satu;
$sumtn3 = collect($tn3)->sum();
}
$total3 = $mahasiswa->count();
$tpfp3 = $sumtp3+$sumfp3;
$fntn3 = $sumfn3+$sumtn3;
$fntp3 = $sumfn3+$sumtp3;
$fptn3 = $sumfp3+$sumtn3;
$accuracy3 = round(($sumtp3+$sumtn3)/$total3, 4);
$acc1003 = $accuracy3*100;
$error3 = round(($sumfp3+$sumfn3)/$total3, 4);
$err1003 = $error3*100;
if ($sumtn3 == 0 and $sumfp3 == 0) {
$recall3 = 0;
} else {
$recall3 = round($sumtn3 /($sumfp3+$sumtn3), 4);
}
$rec1003 = $recall3*100;
if ($sumtn3 == 0 and $sumfn3 == 0) {
$precision3 = 0;
} else {
$precision3 = round($sumtn3 /($sumfn3+$sumtn3), 4);
}
$prec1003 = $precision3*100;
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
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#lA" data-toggle="tab">IPK Semester 1-2</a></li>
                            <li><a href="#lB" data-toggle="tab">IPK Semester 1-3</a></li>
                            <li><a href="#lC" data-toggle="tab">IPK Semester 1-4</a></li>
                            <li><a href="#lD" data-toggle="tab">IPK Semester 1-6</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="lA">
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
                                    <p><i>Accuracy</i> = (TP+TN)/Total = ({{$sumtp}}+{{$sumtn}})/{{ $total }} = {{ $accuracy }} = {{ $acc100 }}%</p>
                                    <p><i>Error Rate</i> = (FP+FN)/Total = ({{$sumfp}}+{{$sumfn}})/{{ $total }} = {{ $error }} = {{ $err100 }}%</p>
                                    <p><i>Recall</i> (<i>TP Rate</i>) = TN/(FP+TN) = {{ $sumtn }}/({{ $sumfp }}+{{ $sumtn }}) = {{ $recall }} = {{ $rec100 }}%</p>
                                    <p><i>Precision</i> = TN/(FN+TN) = {{ $sumtn }}/({{ $sumfn }}+{{ $sumtn }}) = {{ $precision }} = {{ $prec100 }}%</p>
                                </blockquote>
                            </div>
                            <div class="tab-pane fade" id="lB">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>N = {{ $mahasiswa->count() }}</td>
                                        <th>Prediksi Tepat Waktu (1)</th>
                                        <th>Prediksi Tidak Tepat Waktu (0)</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Aktual Tepat Waktu (1)</th>
                                        <td>TP = {{ $sumtp1 }}</td>
                                        <td>FN = {{ $sumfn1 }}</td>
                                        <td>FN + TP = {{ $fntp1 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Aktual Tidak Tepat Waktu (0)</th>
                                        <td>FP = {{ $sumfp1 }}</td>
                                        <td>TN = {{ $sumtn1 }}</td>
                                        <td>FP + TN = {{ $fptn1 }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>TP + FP = {{ $tpfp1 }}</td>
                                        <td>FN + TN = {{ $fntn1 }}</td>
                                        <td>Total = {{ $total1 }}</td>
                                    </tr>
                                </table>
                                <blockquote>
                                    <h3>Perhitungan: </h3>
                                    <p><i>Accuracy</i> = (TP+TN)/Total = ({{$sumtp1}}+{{$sumtn1}})/{{ $total1 }} = {{ $accuracy1 }} = {{ $acc1001 }}%</p>
                                    <p><i>Error Rate</i> = (FP+FN)/Total = ({{$sumfp1}}+{{$sumfn1}})/{{ $total1 }} = {{ $error1 }} = {{ $err1001 }}%</p>
                                    <p><i>Recall</i> (<i>TP Rate</i>) = TN/(FP+TN) = {{ $sumtn1 }}/({{ $sumfp1 }}+{{ $sumtn1 }}) = {{ $recall1 }} = {{ $rec1001 }}%</p>
                                    <p><i>Precision</i> = TN/(FN+TN) = {{ $sumtn1 }}/({{ $sumfn1 }}+{{ $sumtn1 }}) = {{ $precision1 }} = {{ $prec1001 }}%</p>
                                </blockquote>
                            </div>
                            <div class="tab-pane fade" id="lC">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>N = {{ $mahasiswa->count() }}</td>
                                        <th>Prediksi Tepat Waktu (1)</th>
                                        <th>Prediksi Tidak Tepat Waktu (0)</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Aktual Tepat Waktu (1)</th>
                                        <td>TP = {{ $sumtp2 }}</td>
                                        <td>FN = {{ $sumfn2 }}</td>
                                        <td>FN + TP = {{ $fntp2 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Aktual Tidak Tepat Waktu (0)</th>
                                        <td>FP = {{ $sumfp2 }}</td>
                                        <td>TN = {{ $sumtn2 }}</td>
                                        <td>FP + TN = {{ $fptn2 }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>TP + FP = {{ $tpfp2 }}</td>
                                        <td>FN + TN = {{ $fntn2 }}</td>
                                        <td>Total = {{ $total2 }}</td>
                                    </tr>
                                </table>
                                <blockquote>
                                    <h3>Perhitungan: </h3>
                                    <p><i>Accuracy</i> = (TP+TN)/Total = ({{$sumtp2}}+{{$sumtn2}})/{{ $total2 }} = {{ $accuracy2 }} = {{ $acc1002 }}%</p>
                                    <p><i>Error Rate</i> = (FP+FN)/Total = ({{$sumfp2}}+{{$sumfn2}})/{{ $total2 }} = {{ $error2 }} = {{ $err1002 }}%</p>
                                    <p><i>Recall</i> (<i>TP Rate</i>) = TN/(FP+TN) = {{ $sumtn2 }}/({{ $sumfp2 }}+{{ $sumtn2 }}) = {{ $recall2 }} = {{ $rec1002 }}%</p>
                                    <p><i>Precision</i> = TN/(FN+TN) = {{ $sumtn2 }}/({{ $sumfn2 }}+{{ $sumtn2 }}) = {{ $precision2 }} = {{ $prec1002 }}%</p>
                                </blockquote>
                            </div>
                            <div class="tab-pane fade" id="lD">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>N = {{ $mahasiswa->count() }}</td>
                                        <th>Prediksi Tepat Waktu (1)</th>
                                        <th>Prediksi Tidak Tepat Waktu (0)</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Aktual Tepat Waktu (1)</th>
                                        <td>TP = {{ $sumtp3 }}</td>
                                        <td>FN = {{ $sumfn3 }}</td>
                                        <td>FN + TP = {{ $fntp3 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Aktual Tidak Tepat Waktu (0)</th>
                                        <td>FP = {{ $sumfp3 }}</td>
                                        <td>TN = {{ $sumtn3 }}</td>
                                        <td>FP + TN = {{ $fptn3 }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>TP + FP = {{ $tpfp3 }}</td>
                                        <td>FN + TN = {{ $fntn3 }}</td>
                                        <td>Total = {{ $total3 }}</td>
                                    </tr>
                                </table>
                                <blockquote>
                                    <h3>Perhitungan: </h3>
                                    <p><i>Accuracy</i> = (TP+TN)/Total = ({{$sumtp3}}+{{$sumtn3}})/{{ $total3 }} = {{ $accuracy3 }} = {{ $acc1003 }}%</p>
                                    <p><i>Error Rate</i> = (FP+FN)/Total = ({{$sumfp3}}+{{$sumfn3}})/{{ $total3 }} = {{ $error3 }} = {{ $err1003 }}%</p>
                                    <p><i>Recall</i> (<i>TP Rate</i>) = TN/(FP+TN) = {{ $sumtn3 }}/({{ $sumfp3 }}+{{ $sumtn3 }}) = {{ $recall3 }} = {{ $rec1003 }}%</p>
                                    <p><i>Precision</i> = TN/(FN+TN) = {{ $sumtn3 }}/({{ $sumfn3 }}+{{ $sumtn3 }}) = {{ $precision3 }} = {{ $prec1003 }}%</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<table class="table">
    <tr><td>Tidak ada data</td></tr>
</table>
@endif
@endsection