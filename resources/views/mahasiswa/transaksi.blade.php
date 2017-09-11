@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>
                Tabel Perhitungan Algoritma C4.5
            </h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <blockquote>
                            <p>
                                Entropy(S) = ∑ -pi * log2 pi
                            </p>
                        </blockquote>
                        <blockquote>
                            <p>
                                Gain(S,A) = Entropy(S) - ∑ (|Si|/|S|) * Entropy(Si)
                            </p>
                        </blockquote>
                        @if ($mahasiswa->where('angkatan', '2011')->count() > 0)
                        <table class="table table-bordered table-striped text-center table-condensed">
                            <tr>
                                <th>
                                    Node 1
                                </th>
                                <th>
                                </th>
                                <th class="text-center">
                                    Jumlah Kasus
                                </th>
                                <th class="text-center">
                                    Lulus Tepat Waktu
                                </th>
                                <th class="text-center">
                                    Tidak Lulus Tepat Waktu
                                </th>
                                <th class="text-center">
                                    Entropy
                                </th>
                                <th class="text-center">
                                    Gain
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Total
                                </th>
                                <td>
                                </td>
                                <td>
                                    {{ $total }}
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->target == "lulus tepat waktu") {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $tep[] = $satu;
                                    }
                                    $tepat = collect($tep)->sum();
                                    @endphp
                                    {{ $tepat }}
                                </td>
                                <td>
                                    @php
                                    $tidak = $total-$tepat;
                                    @endphp
                                    {{ $tidak }}
                                </td>
                                <td>
                                    @php
                                    $entotal = substr((-$tepat/$total)*log($tepat/$total,2)+(-$tidak/$total)*log($tidak/$total,2), 0, 12);
                                    @endphp
                                    {{ $entotal }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    IPK Semester 1
                                </th>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 2.3375 && $value->ipk_smt_1 >= 0) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii1[] = $satu;
                                    }
                                    $int01 = collect($ii1)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 2.3375 && $value->ipk_smt_1 >= 0 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii2[] = $satu;
                                    }
                                    $int01tepat = collect($ii2)->sum();
                                    $int01tidak = $int01-$int01tepat;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int01 == 0 || $int01tepat == 0 || $int01tidak == 0)
                                    {
                                    $en01 = 0;
                                    }
                                    else
                                    {
                                    $en01 = substr((-$int01tepat/$int01)*log($int01tepat/$int01, 2)+(-$int01tidak/$int01)*log($int01tidak/$int01, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 2.845 and $value->ipk_smt_1 >= 2.3376) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $assad2[] = $satu;
                                    }
                                    $int12 = collect($assad2)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 2.845 and $value->ipk_smt_1 >= 2.3376 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii3[] = $satu;
                                    }
                                    $int12tepat = collect($ii3)->sum();
                                    $int12tidak = $int12-$int12tepat;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int12 == 0 || $int12tepat == 0 || $int12tidak == 0)
                                    {
                                    $en12 = 0;
                                    }
                                    else
                                    {
                                    $en12 = substr((-$int12tepat/$int12)*log($int12tepat/$int12, 2)+(-$int12tidak/$int12)*log($int12tidak/$int12, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 3.3525 and $value->ipk_smt_1 >= 2.845) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii4[] = $satu;
                                    }
                                    $int23 = collect($ii4)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 3.3525 and $value->ipk_smt_1 >= 2.845 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii5[] = $satu;
                                    }
                                    $int23tepat = collect($ii5)->sum();
                                    $int23tidak = $int23-$int23tepat;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int23 == 0 || $int23tepat == 0 || $int23tidak == 0)
                                    {
                                    $en23 = 0;
                                    }
                                    else
                                    {
                                    $en23 = substr((-$int23tepat/$int23)*log($int23tepat/$int23, 2)+(-$int23tidak/$int23)*log($int23tidak/$int23, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 4 && $value->ipk_smt_1 >= 3.3526) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii6[] = $satu;
                                    }
                                    $int34 = collect($ii6)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_1 <= 4 && $value->ipk_smt_1 >= 3.3526 and $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ii7[] = $satu;
                                    }
                                    $int34tepat = collect($ii7)->sum();
                                    $int34tidak = $int34-$int34tepat;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int34 == 0 || $int34tepat == 0 || $int34tidak == 0)
                                    {
                                    $en34 = 0;
                                    }
                                    else
                                    {
                                    $en34 = substr((-$int34tepat/$int34)*log($int34tepat/$int34, 2)+(-$int34tidak/$int34)*log($int34tidak/$int34, 2), 0, 12);
                                    }
                                    $gainipk1 = substr(($entotal-(($int01/$total)*$en01)-(($int12/$total)*$en12)-(($int23/$total)*$en23)-(($int34/$total)*$en34)), 0, 12);
                                    @endphp
                                    {{ $gainipk1 }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 0  -  2.3375
                                </td>
                                <td>
                                    {{ $int01 }}
                                </td>
                                <td>
                                    {{ $int01tepat }}
                                </td>
                                <td>
                                    {{ $int01tidak }}
                                </td>
                                <td>
                                    {{ $en01 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.3375  -  2.845
                                </td>
                                <td>
                                    {{ $int12 }}
                                </td>
                                <td>
                                    {{ $int12tepat }}
                                </td>
                                <td>
                                    {{ $int12tidak }}
                                </td>
                                <td>
                                    {{ $en12 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.845  -  3.3525
                                </td>
                                <td>
                                    {{ $int23 }}
                                </td>
                                <td>
                                    {{ $int23tepat }}
                                </td>
                                <td>
                                    {{ $int23tidak }}
                                </td>
                                <td>
                                    {{ $en23 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.3525  -  4
                                </td>
                                <td>
                                    {{ $int34 }}
                                </td>
                                <td>
                                    {{ $int34tepat }}
                                </td>
                                <td>
                                    {{ $int34tidak }}
                                </td>
                                <td>
                                    {{ $en34}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    IPK Semester 2
                                </th>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 2.3725 && $value->ipk_smt_2 >= 0) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iii1[] = $satu;
                                    }
                                    $int0122 = collect($iii1)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 2.3725 && $value->ipk_smt_2 >= 0 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiii2[] = $satu;
                                    }
                                    $int01tepat22 = collect($iiii2)->sum();
                                    $int01tidak22 = $int0122-$int01tepat22;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int0122 == 0 || $int01tepat22 == 0 || $int01tidak22 == 0)
                                    {
                                    $ent0122 = 0;
                                    }
                                    else
                                    {
                                    $ent0122 = substr((-$int01tepat22/$int0122)*log($int01tepat22/$int0122, 2)+(-$int01tidak22/$int0122)*log($int01tidak22/$int0122, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 2.855 && $value->ipk_smt_2 > 2.3725) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiii2[] = $satu;
                                    }
                                    $int1222 = collect($iiiii2)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 2.855 && $value->ipk_smt_2 > 2.3725 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiii3[] = $satu;
                                    }
                                    $int12tepat22 = collect($iiiii3)->sum();
                                    $int12tidak22 = $int1222-$int12tepat22;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int1222 == 0 || $int12tepat22 == 0 || $int12tidak22 == 0)
                                    {
                                    $ent1222 = 0;
                                    }
                                    else
                                    {
                                    $ent1222= substr((-$int12tepat22/$int1222)*log($int12tepat22/$int1222, 2)+(-$int12tidak22/$int1222)*log($int12tidak22/$int1222, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 3.3375 && $value->ipk_smt_2 > 2.855) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiii4[] = $satu;
                                    }
                                    $int2322 = collect($iiiii4)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 3.3375 && $value->ipk_smt_2 > 2.855 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiii5[] = $satu;
                                    }
                                    $int23tepat22 = collect($iiii5)->sum();
                                    $int23tidak22 = $int2322-$int23tepat22;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int2322 == 0 || $int23tepat22 == 0 || $int23tidak22 == 0)
                                    {
                                    $ent2322 = 0;
                                    }
                                    else
                                    {
                                    $ent2322 = substr((-$int23tepat22/$int2322)*log($int23tepat22/$int2322, 2)+(-$int23tidak22/$int2322)*log($int23tidak22/$int2322, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 4 && $value->ipk_smt_2 > 3.3375) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiii6[] = $satu;
                                    }
                                    $int3422 = collect($iiiii6)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_2 <= 4 && $value->ipk_smt_2 > 3.3375 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiii7[] = $satu;
                                    }
                                    $int34tepat22 = collect($iiiii7)->sum();
                                    $int34tidak22 = $int3422-$int34tepat22;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int3422 == 0 || $int34tepat22 == 0 || $int34tidak22 == 0)
                                    {
                                    $ent3422 = 0;
                                    }
                                    else
                                    {
                                    $ent3422 = substr((-$int34tepat22/$int3422)*log($int34tepat22/$int3422, 2)+(-$int34tidak22/$int3422)*log($int34tidak22/$int3422, 2), 0, 12);
                                    }
                                    $gainipk2 = substr(($entotal-(($int0122/$total)*$ent0122)-(($int1222/$total)*$ent1222)-(($int2322/$total)*$ent2322)-(($int3422/$total)*$ent3422)), 0, 12);
                                    @endphp
                                    {{ $gainipk2 }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 0  -  2.3725
                                </td>
                                <td>
                                    {{ $int0122 }}
                                </td>
                                <td>
                                    {{ $int01tepat22 }}
                                </td>
                                <td>
                                    {{ $int01tidak22 }}
                                </td>
                                <td>
                                    {{ $ent0122 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.3725  -  2.855
                                </td>
                                <td>
                                    {{ $int1222 }}
                                </td>
                                <td>
                                    {{ $int12tepat22 }}
                                </td>
                                <td>
                                    {{ $int12tidak22 }}
                                </td>
                                <td>
                                    {{ $ent1222 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.855  -  3.3375
                                </td>
                                <td>
                                    {{ $int2322 }}
                                </td>
                                <td>
                                    {{ $int23tepat22 }}
                                </td>
                                <td>
                                    {{ $int23tidak22 }}
                                </td>
                                <td>
                                    {{ $ent2322 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.3375  -  4
                                </td>
                                <td>
                                    {{ $int3422 }}
                                </td>
                                <td>
                                    {{ $int34tepat22 }}
                                </td>
                                <td>
                                    {{ $int34tidak22 }}
                                </td>
                                <td>
                                    {{ $ent3422}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    IPK Semester 3
                                </th>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 2.6175 && $value->ipk_smt_3 >= 0) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $sss1[] = $satu;
                                    }
                                    $int0133 = collect($sss1)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 2.6175 && $value->ipk_smt_3 >= 0 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $sss2[] = $satu;
                                    }
                                    $int01tepat33 = collect($sss2)->sum();
                                    $int01tidak33 = $int0133-$int01tepat33;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int0133 == 0 || $int01tepat33 == 0 || $int01tidak33 == 0)
                                    {
                                    $en0133 = 0;
                                    }
                                    else
                                    {
                                    $en0133 = substr((-$int01tepat33/$int0133)*log($int01tepat33/$int0133, 2)+(-$int01tidak33/$int0133)*log($int01tidak33/$int0133, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 3.025 and $value->ipk_smt_3 > 2.6175) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiii2[] = $satu;
                                    }
                                    $int1233 = collect($iiiiii2)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 3.025 and $value->ipk_smt_3 > 2.6175 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiiii3[] = $satu;
                                    }
                                    $int12tepat33 = collect($iiiiiii3)->sum();
                                    $int12tidak33 = $int1233-$int12tepat33;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int1233 == 0 || $int12tepat33 == 0 || $int12tidak33 == 0)
                                    {
                                    $en1233 = 0;
                                    }
                                    else
                                    {
                                    $en1233 = substr((-$int12tepat33/$int1233)*log($int12tepat33/$int1233, 2)+(-$int12tidak33/$int1233)*log($int12tidak33/$int1233, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 3.4325 && $value->ipk_smt_3 > 3.025) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiiii4[] = $satu;
                                    }
                                    $int2333 = collect($iiiiiii4)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 3.4325 && $value->ipk_smt_3 > 3.025 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiii5[] = $satu;
                                    }
                                    $int23tepat33 = collect($iiiiii5)->sum();
                                    $int23tidak33 = $int2333-$int23tepat33;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int2333 == 0 || $int23tepat33 == 0 || $int23tidak33 == 0)
                                    {
                                    $ent2333 = 0;
                                    }
                                    else
                                    {
                                    $ent2333 = substr((-$int23tepat33/$int2333)*log($int23tepat33/$int2333, 2)+(-$int23tidak33/$int2333)*log($int23tidak33/$int2333, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 4 && $value->ipk_smt_3 > 3.4325) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiii6[] = $satu;
                                    }
                                    $int3433 = collect($iiiiii6)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_3 <= 4 && $value->ipk_smt_3 > 3.4325 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiii7[] = $satu;
                                    }
                                    $int34tepat33 = collect($iiiiii7)->sum();
                                    $int34tidak33 = $int3433-$int34tepat33;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int3433 == 0 || $int34tepat33 == 0 || $int34tidak33 == 0)
                                    {
                                    $ent3433 = 0;
                                    }
                                    else
                                    {
                                    $ent3433 = substr((-$int34tepat33/$int3433)*log($int34tepat33/$int3433, 2)+(-$int34tidak33/$int3433)*log($int34tidak33/$int3433, 2), 0, 12);
                                    }
                                    $gainipk3 = substr(($entotal-(($int0133/$total)*$en0133)-(($int1233/$total)*$en1233)-(($int2333/$total)*$ent2333)-(($int3433/$total)*$ent3433)), 0, 12);
                                    @endphp
                                    {{ $gainipk3 }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 0  -  2.6175
                                </td>
                                <td>
                                    {{ $int0133 }}
                                </td>
                                <td>
                                    {{ $int01tepat33 }}
                                </td>
                                <td>
                                    {{ $int01tidak33 }}
                                </td>
                                <td>
                                    {{ $en0133 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.6175  -  3.025
                                </td>
                                <td>
                                    {{ $int1233 }}
                                </td>
                                <td>
                                    {{ $int12tepat33 }}
                                </td>
                                <td>
                                    {{ $int12tidak33 }}
                                </td>
                                <td>
                                    {{ $en1233 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.025  -  3.4325
                                </td>
                                <td>
                                    {{ $int2333 }}
                                </td>
                                <td>
                                    {{ $int23tepat33 }}
                                </td>
                                <td>
                                    {{ $int23tidak33 }}
                                </td>
                                <td>
                                    {{ $ent2333 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.4325  -  4
                                </td>
                                <td>
                                    {{ $int3433 }}
                                </td>
                                <td>
                                    {{ $int34tepat33 }}
                                </td>
                                <td>
                                    {{ $int34tidak33 }}
                                </td>
                                <td>
                                    {{ $ent3433}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    IPK Semester 4
                                </th>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 2.7125 && $value->ipk_smt_4 >= 0) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ssss1[] = $satu;
                                    }
                                    $int0144 = collect($ssss1)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 2.7125 && $value->ipk_smt_4 >= 0 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ssss2[] = $satu;
                                    }
                                    $int01tepat44 = collect($ssss2)->sum();
                                    $int01tidak44 = $int0144-$int01tepat44;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int0144 == 0 || $int01tepat44 == 0 || $int01tidak44 == 0)
                                    {
                                    $en0144 = 0;
                                    }
                                    else
                                    {
                                    $en0144 = substr((-$int01tepat44/$int0144)*log($int01tepat44/$int0144, 2)+(-$int01tidak44/$int0144)*log($int01tidak44/$int0144, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 2.95 and $value->ipk_smt_4 > 2.7) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ssss2[] = $satu;
                                    }
                                    $int1244 = collect($ssss2)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 3.085 and $value->ipk_smt_4 > 2.7 and $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ssss3[] = $satu;
                                    }
                                    $int12tepat44 = collect($ssss3)->sum();
                                    $int12tidak44 = $int1244-$int12tepat44;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int1244 == 0 || $int12tepat44 == 0 || $int12tidak44 == 0)
                                    {
                                    $en1244 = 0;
                                    }
                                    else
                                    {
                                    $en1244 = substr((-$int12tepat44/$int1244)*log($int12tepat44/$int1244, 2)+(-$int12tidak44/$int1244)*log($int12tidak44/$int1244, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 3.4575 && $value->ipk_smt_4 > 3.085) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $sssssss4[] = $satu;
                                    }
                                    $int2344 = collect($sssssss4)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 3.4575 && $value->ipk_smt_4 > 3.085 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ssssss5[] = $satu;
                                    }
                                    $int23tepat44 = collect($ssssss5)->sum();
                                    $int23tidak44 = $int2344-$int23tepat44;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int2344 == 0 || $int23tepat44 == 0 || $int23tidak44 == 0)
                                    {
                                    $ent2344 = 0;
                                    }
                                    else
                                    {
                                    $ent2344 = substr((-$int23tepat44/$int2344)*log($int23tepat44/$int2344, 2)+(-$int23tidak44/$int2344)*log($int23tidak44/$int2344, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 4 && $value->ipk_smt_4 > 3.4575) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $iiiiiiii6[] = $satu;
                                    }
                                    $int3444 = collect($iiiiiiii6)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_4 <= 4 && $value->ipk_smt_4 > 3.4575 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ssssss7[] = $satu;
                                    }
                                    $int34tepat44 = collect($ssssss7)->sum();
                                    $int34tidak44 = $int3444-$int34tepat44;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int3444 == 0 || $int34tepat44 == 0 || $int34tidak44 == 0)
                                    {
                                    $ent3444 = 0;
                                    }
                                    else
                                    {
                                    $ent3444 = substr((-$int34tepat44/$int3444)*log($int34tepat44/$int3444, 2)+(-$int34tidak44/$int3444)*log($int34tidak44/$int3444, 2), 0, 12);
                                    }
                                    $gainipk4 = substr(($entotal-(($int0144/$total)*$en0144)-(($int1244/$total)*$en1244)-(($int2344/$total)*$ent2344)-(($int3444/$total)*$ent3444) ), 0, 12);
                                    @endphp
                                    {{ $gainipk4 }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 0  -  2.7125
                                </td>
                                <td>
                                    {{ $int0144 }}
                                </td>
                                <td>
                                    {{ $int01tepat44 }}
                                </td>
                                <td>
                                    {{ $int01tidak44 }}
                                </td>
                                <td>
                                    {{ $en0144 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.7125  -  3.085
                                </td>
                                <td>
                                    {{ $int1244 }}
                                </td>
                                <td>
                                    {{ $int12tepat44 }}
                                </td>
                                <td>
                                    {{ $int12tidak44 }}
                                </td>
                                <td>
                                    {{ $en1244 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.085  -  3.4575
                                </td>
                                <td>
                                    {{ $int2344 }}
                                </td>
                                <td>
                                    {{ $int23tepat44 }}
                                </td>
                                <td>
                                    {{ $int23tidak44 }}
                                </td>
                                <td>
                                    {{ $ent2344 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.4575  -  4
                                </td>
                                <td>
                                    {{ $int3444 }}
                                </td>
                                <td>
                                    {{ $int34tepat44 }}
                                </td>
                                <td>
                                    {{ $int34tidak44 }}
                                </td>
                                <td>
                                    {{ $ent3444}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    IPK Semester 5
                                </th>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 2.78 && $value->ipk_smt_5 >= 0) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk5[] = $satu;
                                    }
                                    $int0155 = collect($ipk5)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 2.78 && $value->ipk_smt_5 >= 0 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk52[] = $satu;
                                    }
                                    $int01tepat55 = collect($ipk52)->sum();
                                    $int01tidak55 = $int0155-$int01tepat55;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int0155 == 0 || $int01tepat55 == 0 || $int01tidak55 == 0)
                                    {
                                    $en0155 = 0;
                                    }
                                    else
                                    {
                                    $en0155 = substr((-$int01tepat55/$int0155)*log($int01tepat55/$int0155, 2)+(-$int01tidak55/$int0155)*log($int01tidak55/$int0155, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 3.13 and $value->ipk_smt_5 > 2.78) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk53[] = $satu;
                                    }
                                    $int1255 = collect($ipk53)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 3.13 and $value->ipk_smt_5 > 2.78 and $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk54[] = $satu;
                                    }
                                    $int12tepat55 = collect($ipk54)->sum();
                                    $int12tidak55 = $int1255-$int12tepat55;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int1255 == 0 || $int12tepat55 == 0 || $int12tidak55 == 0)
                                    {
                                    $en1255 = 0;
                                    }
                                    else
                                    {
                                    $en1255 = substr((-$int12tepat55/$int1255)*log($int12tepat55/$int1255, 2)+(-$int12tidak55/$int1255)*log($int12tidak55/$int1255, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 3.48 && $value->ipk_smt_5 > 3.13) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk55[] = $satu;
                                    }
                                    $int2355 = collect($ipk55)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 3.48 && $value->ipk_smt_5 > 3.13 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk56[] = $satu;
                                    }
                                    $int23tepat55 = collect($ipk56)->sum();
                                    $int23tidak55 = $int2355-$int23tepat55;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int2355 == 0 || $int23tepat55 == 0 || $int23tidak55 == 0)
                                    {
                                    $ent2355 = 0;
                                    }
                                    else
                                    {
                                    $ent2355 = substr((-$int23tepat55/$int2355)*log($int23tepat55/$int2355, 2)+(-$int23tidak55/$int2355)*log($int23tidak55/$int2355, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 4 && $value->ipk_smt_5 > 3.48) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk57[] = $satu;
                                    }
                                    $int3455 = collect($ipk57)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_5 <= 4 && $value->ipk_smt_5 > 3.48 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk58[] = $satu;
                                    }
                                    $int34tepat55 = collect($ipk58)->sum();
                                    $int34tidak55 = $int3455-$int34tepat55;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int3455 == 0 || $int34tepat55 == 0 || $int34tidak55 == 0)
                                    {
                                    $ent3455 = 0;
                                    }
                                    else
                                    {
                                    $ent3455 = substr((-$int34tepat55/$int3455)*log($int34tepat55/$int3455, 2)+(-$int34tidak55/$int3455)*log($int34tidak55/$int3455, 2), 0, 12);
                                    }
                                    $gainipk5 = substr(($entotal-(($int0155/$total)*$en0155)-(($int1255/$total)*$en1255)-(($int2355/$total)*$ent2355)-(($int3455/$total)*$ent3455) ), 0, 12);
                                    @endphp
                                    {{ $gainipk5 }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 0  -  2.78
                                </td>
                                <td>
                                    {{ $int0155 }}
                                </td>
                                <td>
                                    {{ $int01tepat55 }}
                                </td>
                                <td>
                                    {{ $int01tidak55 }}
                                </td>
                                <td>
                                    {{ $en0155 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.78  -  3.13
                                </td>
                                <td>
                                    {{ $int1255 }}
                                </td>
                                <td>
                                    {{ $int12tepat55 }}
                                </td>
                                <td>
                                    {{ $int12tidak55 }}
                                </td>
                                <td>
                                    {{ $en1255 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.13  -  3.48
                                </td>
                                <td>
                                    {{ $int2355 }}
                                </td>
                                <td>
                                    {{ $int23tepat55 }}
                                </td>
                                <td>
                                    {{ $int23tidak55 }}
                                </td>
                                <td>
                                    {{ $ent2355 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.48  -  4
                                </td>
                                <td>
                                    {{ $int3455 }}
                                </td>
                                <td>
                                    {{ $int34tepat55 }}
                                </td>
                                <td>
                                    {{ $int34tidak55 }}
                                </td>
                                <td>
                                    {{ $ent3455}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    IPK Semester 6
                                </th>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    @php
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 2.725 && $value->ipk_smt_4 >= 0) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk61[] = $satu;
                                    }
                                    $int0166 = collect($ipk61)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 2.725 && $value->ipk_smt_4 >= 0 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk62[] = $satu;
                                    }
                                    $int01tepat66 = collect($ipk62)->sum();
                                    $int01tidak66 = $int0166-$int01tepat66;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int0166 == 0 || $int01tepat66 == 0 || $int01tidak66 == 0)
                                    {
                                    $en0166 = 0;
                                    }
                                    else
                                    {
                                    $en0166 = substr((-$int01tepat66/$int0166)*log($int01tepat66/$int0166, 2)+(-$int01tidak66/$int0166)*log($int01tidak66/$int0166, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 3.05 and $value->ipk_smt_4 > 2.75) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk63[] = $satu;
                                    }
                                    $int1266 = collect($ipk63)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 3.05 and $value->ipk_smt_4 > 2.74 and $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk64[] = $satu;
                                    }
                                    $int12tepat66 = collect($ipk64)->sum();
                                    $int12tidak66 = $int1266-$int12tepat66;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int1266 == 0 || $int12tepat66 == 0 || $int12tidak66 == 0)
                                    {
                                    $en1266 = 0;
                                    }
                                    else
                                    {
                                    $en1266 = substr((-$int12tepat66/$int1266)*log($int12tepat66/$int1266, 2)+(-$int12tidak66/$int1266)*log($int12tidak66/$int1266, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 3.375 && $value->ipk_smt_6 > 3.05) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk65[] = $satu;
                                    }
                                    $int2366 = collect($ipk65)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 3.375 && $value->ipk_smt_6 > 3.05 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk66[] = $satu;
                                    }
                                    $int23tepat66 = collect($ipk66)->sum();
                                    $int23tidak66 = $int2366-$int23tepat66;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int2366 == 0 || $int23tepat66 == 0 || $int23tidak66 == 0)
                                    {
                                    $ent2366 = 0;
                                    }
                                    else
                                    {
                                    $ent2366 = substr((-$int23tepat66/$int2366)*log($int23tepat66/$int2366, 2)+(-$int23tidak66/$int2366)*log($int23tidak66/$int2366, 2), 0, 12);
                                    }
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 4 && $value->ipk_smt_6 > 3.375) {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk67[] = $satu;
                                    }
                                    $int3466 = collect($ipk67)->sum();
                                    foreach ($mahasiswa as $value) {
                                    if (in_array($value->angkatan, range(2010, 2012)) && $value->ipk_smt_6 <= 4 && $value->ipk_smt_6 > 3.375 && $value->target == 'lulus tepat waktu') {
                                    $satu = 1;
                                    } else {
                                    $satu = 0;
                                    }
                                    $ipk68[] = $satu;
                                    }
                                    $int34tepat66 = collect($ipk68)->sum();
                                    $int34tidak66 = $int3466-$int34tepat66;
                                    if (in_array($value->angkatan, range(2010, 2012)) &&$int3466 == 0 || $int34tepat66 == 0 || $int34tidak66 == 0)
                                    {
                                    $ent3466 = 0;
                                    }
                                    else
                                    {
                                    $ent3466 = substr((-$int34tepat66/$int3466)*log($int34tepat66/$int3466, 2)+(-$int34tidak66/$int3466)*log($int34tidak66/$int3466, 2), 0, 12);
                                    }
                                    $gainipk6 = substr(($entotal-(($int0166/$total)*$en0166)-(($int1266/$total)*$en1266)-(($int2366/$total)*$ent2366)-(($int3466/$total)*$ent3466) ), 0, 12);
                                    @endphp
                                    {{ $gainipk6 }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 0  -  2.725
                                </td>
                                <td>
                                    {{ $int0166 }}
                                </td>
                                <td>
                                    {{ $int01tepat66 }}
                                </td>
                                <td>
                                    {{ $int01tidak66 }}
                                </td>
                                <td>
                                    {{ $en0166 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 2.725  -  3.05
                                </td>
                                <td>
                                    {{ $int1266 }}
                                </td>
                                <td>
                                    {{ $int12tepat66 }}
                                </td>
                                <td>
                                    {{ $int12tidak66 }}
                                </td>
                                <td>
                                    {{ $en1266 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.05  -  3.375
                                </td>
                                <td>
                                    {{ $int2366 }}
                                </td>
                                <td>
                                    {{ $int23tepat66 }}
                                </td>
                                <td>
                                    {{ $int23tidak66 }}
                                </td>
                                <td>
                                    {{ $ent2366 }}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    interval 3.375  -  4
                                </td>
                                <td>
                                    {{ $int3466 }}
                                </td>
                                <td>
                                    {{ $int34tepat66 }}
                                </td>
                                <td>
                                    {{ $int34tidak66 }}
                                </td>
                                <td>
                                    {{ $ent3466}}
                                </td>
                                <td>
                                </td>
                            </tr>
                        </table>
                        @else
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                        </table>
                        @endif
                        <blockquote>
                            <p>Dapat diambil kesimpulan bahwa IPK Semester 2 adalah variabel yang paling berpengaruh, karena variabel tersebut memiliki <i>information gain</i> yang paling besar dari semua variabel</p>
                        </blockquote>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
