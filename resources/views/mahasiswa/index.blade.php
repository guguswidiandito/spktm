@extends('layouts.backend')
@section('content')
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>Import Data</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <table>
                            {!! Form::open(['url' => route('import.mahasiswa'),
                            'method' => 'post', 'files'=>'true']) !!}
                            <tr>
                                <td>
                                    {!! Form::file('excel') !!}
                                    {!! $errors->first('excel', '<p class="help-block">:message</p>') !!}
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-fw fa-upload"></i> Import</button>
                                </td>
                            </tr>
                            {!! Form::close() !!}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>Option</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="widget-content">
                    <div class="container-fluid">
                        <table>
                            <tr>
                                <td>
                                    <a href="{{ url('/admin/mahasiswa/create') }}" title="" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
                                </td>
                                <td>
                                    @if ($mahasiswa->count() > 0)
                                    <button class="btn btn-danger delete_all" data-url="{{ url('/admin/hapus') }}">Hapus</button>
                                    @else
                                    <button class="btn btn-danger delete_all" data-url="{{ url('/admin/hapus') }}" disabled>Hapus</button>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
            <h3>Data Mahasiswa</h3>
        </div>
        <div class="widget-content">
            <div class="widget big-stats-container">
                <div class="container-fluid">
                    <div class="widget-content">
                        <div class="table-responsive">
                            {!! Form::open(['url' => '/admin/mahasiswa/', 'method'=>'get', 'class'=>'form-inline']) !!}
                            {!! Form::select('angkatan',[]+App\Mahasiswa::pluck('angkatan', 'angkatan')->all(), null,  ['class'=>'form-control', 'placeholder'=>'Pilih angkatan', 'required']) !!}
                            {!! Form::submit('Sort', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <hr>
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="master"></th>
                                        <th class="text-center">No</th>
                                        <th>NIM</th>
                                        <th>Asal Sekolah</th>
                                        <th>Jenis Kelamin</th>
                                        <th>IPK 1</th>
                                        <th>IPK 2</th>
                                        <th>IPK 3</th>
                                        <th>IPK 4</th>
                                        <th>IPK 5</th>
                                        <th>IPK 6</th>
                                        <th>Angkatan</th>
                                        <th>Tanggal Kelulusan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($mahasiswa as $key => $m)
                                        <tr>
                                            <td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$m->id}}"></td>
                                            <td class="text-center">{{ ++$key }}</td>
                                            <td>{{ $m->nim }}</td>
                                            <td>{{ $m->asal_sekolah }}</td>
                                            <td>{{ $m->jenis_kelamin }}</td>
                                            <td>{{ $m->ipk_smt_1 }}</td>
                                            <td>{{ $m->ipk_smt_2 }}</td>
                                            <td>{{ $m->ipk_smt_3 }}</td>
                                            <td>{{ $m->ipk_smt_4 }}</td>
                                            <td>{{ $m->ipk_smt_5 }}</td>
                                            <td>{{ $m->ipk_smt_6 }}</td>
                                            <td>{{ $m->angkatan }}</td>
                                            <td>{{ $m->tgl_kelulusan }}</td>
                                            <td><a href="{{ route('mahasiswa.edit', $m->id) }}" title="" class="btn btn-danger">Edit</a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="14" class="text-center">Tidak ada data</td>
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
    </div>
</div>
@endsection