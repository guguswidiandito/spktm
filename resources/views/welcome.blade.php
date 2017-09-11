@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>Hasil Prediksi</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        {!! Form::open(['url' => '/', 'method'=>'get', 'class'=>'form-inline']) !!}
                        {!! Form::select('nim', []+App\Mahasiswa::pluck('nim', 'nim')->all(), null, ['id'=>'dropdown', 'placeholder' => 'Pilih NIM', 'required']) !!}
                        <button class="btn btn-primary" type="submit">Cari</button>
                        {!! Form::close() !!}
                        <hr>
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>NIM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $key => $m)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td>{{ $m->nim }}</td>
                                    <td><a href="{{ url('/', $m->id) }}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat Prediksi</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection