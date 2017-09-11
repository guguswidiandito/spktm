@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h1>Hasil Prediksi <b>{{ $mahasiswa->nim }}</b></h1>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <h2>Prediksi Berdasarkan IPK Semester 1-2</h2>
                        <table class="table table-bordered">
                            <tr>
                                <th>NIM</th>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $mahasiswa->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td>{{ $mahasiswa->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>Hasil Uji IPK Semester 1-2</th>
                                <td>{{ $mahasiswa->prediksi12 }}</td>
                            </tr>
                            @if ($mahasiswa->ipk_smt_3 > 0)
                            <tr>
                                <th>Hasil Uji IPK Semester 1-3</th>
                                <td>{{ $mahasiswa->prediksi13 }}</td>
                            </tr>
                            @endif
                            @if ($mahasiswa->ipk_smt_4 > 0 && $mahasiswa->ipk_smt_3 > 0)
                            <tr>
                                <th>Hasil Uji IPK Semester 1-4</th>
                                <td>{{ $mahasiswa->prediksi14 }}</td>
                            </tr>
                            @endif
                            @if ($mahasiswa->ipk_smt_4 > 0 && $mahasiswa->ipk_smt_3 > 0 && $mahasiswa->ipk_smt_5 > 0 && $mahasiswa->ipk_smt_6 > 0)
                            <tr>
                                <th>Hasil Uji IPK Semester 1-6</th>
                                <td>{{ $mahasiswa->prediksi16 }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection