@extends('layouts.backend')
@section('content')
<div class="span12">
	<div class="widget widget-nopad">
		<div class="widget-header">
			<h3>Tambah Mahasiswa</h3>
		</div>
		<div class="widget-content">
			<div class="widget big-stats-container">
				<div class="widget-content">
					<div class="container-fluid">
						{!! Form::open(['url' => route('mahasiswa.store')]) !!}
						<table class="table table-bordered">
							<tr>
								<th>NIM</th>
								<td>
									{!! Form::text('nim', null, ['class'=>'form-control', 'placeholder'=>'NIM']) !!}
									{!! $errors->first('nim', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>Asal Sekolah</th>
								<td>
									{!! Form::text('asal_sekolah', null, ['class'=>'form-control', 'placeholder'=>'Asal Sekolah']) !!}
									{!! $errors->first('asal_sekolah', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td>
									{!! Form::select('jenis_kelamin', ['L'=>'L', 'P'=>'P'], null, ['class'=>'form-control', 'placeholder'=>'Jenis Kelamin']) !!}
									{!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>IPK Semester 1</th>
								<td>
									{!! Form::text('ipk_smt_1', null, ['class'=>'form-control', 'placeholder'=>'IPK Semester 1']) !!}
									{!! $errors->first('ipk_smt_1', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>IPK Semester 2</th>
								<td>
									{!! Form::text('ipk_smt_2', null, ['class'=>'form-control', 'placeholder'=>'IPK Semester 2']) !!}
									{!! $errors->first('ipk_smt_2', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>IPK Semester 3</th>
								<td>
									{!! Form::text('ipk_smt_3', null, ['class'=>'form-control', 'placeholder'=>'IPK Semester 3']) !!}
									{!! $errors->first('ipk_smt_3', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>IPK Semester 4</th>
								<td>
									{!! Form::text('ipk_smt_4', null, ['class'=>'form-control', 'placeholder'=>'IPK Semester 4']) !!}
									{!! $errors->first('ipk_smt_4', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>IPK Semester 5</th>
								<td>
									{!! Form::text('ipk_smt_5', null, ['class'=>'form-control', 'placeholder'=>'IPK Semester 5']) !!}
									{!! $errors->first('ipk_smt_5', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>IPK Semester 6</th>
								<td>
									{!! Form::text('ipk_smt_6', null, ['class'=>'form-control', 'placeholder'=>'IPK Semester 6']) !!}
									{!! $errors->first('ipk_smt_6', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>Angkatan</th>
								<td>
									{!! Form::selectRange('angkatan', 2000, 2020, null, ['class'=>'form-control', 'placeholder'=>'angkatan']) !!}
									{!! $errors->first('angkatan', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
							<tr>
								<th>Tanggal Lulus</th>
								<td>
									{!! Form::date('tgl_kelulusan', null, ['class'=>'form-control']) !!}
									{!! $errors->first('tgl_kelulusan', '<p class="help-block">:message</p>') !!}
								</td>
							</tr>
						</table>
						{!! Form::submit('Simpan', ['class'=>'btn btn-danger']) !!}
						<a href="{{ route('mahasiswa.index') }}" title="" class="btn btn-primary">Kembali</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection