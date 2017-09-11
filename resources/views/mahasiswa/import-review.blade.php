@extends('layouts.backend')
@section('content')
<div class="span12">
  <div class="widget widget-nopad">
    <div class="widget-header">
      <h3>Review Mahasiswa</h3>
    </div>
    <div class="widget-content">
      <div class="widget big-stats-container">
        <div class="widget-content">
          <div class="container-fluid">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>NIM</th>
                  <th>Asal Sekolah</th>
                  <th>Jenis Kelamin</th>
                  <th>IPK 1</th>
                  <th>IPK 2</th>
                  <th>IPK 3</th>
                  <th>IPK 4</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($mahasiswa as $m)
                <tr>
                  <td class="text-center">{{ $no++ }}</td>
                  <td>{{ $m->nim }}</td>
                  <td>{{ $m->asal_sekolah }}</td>
                  <td>{{ $m->jenis_kelamin }}</td>
                  <td>{{ $m->ipk_smt_1 }}</td>
                  <td>{{ $m->ipk_smt_2 }}</td>
                  <td>{{ $m->ipk_smt_3 }}</td>
                  <td>{{ $m->ipk_smt_4 }}</td>
                  <td>{{ $m->target }}</td>
                  <td>
                    {!! Form::open(['url' => route('mahasiswa.destroy', $m->id),
                    'id'           => 'form-'.$m->id, 'method'=>'delete',
                    'data-confirm' => 'Yakin menghapus ' . $m->nim . '?',
                    'class'        => 'form-inline js-review-delete']) !!}
                    {!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <p> <a class="btn btn-success" href="{{ url('/admin/mahasiswa')}}">Selesai</a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection