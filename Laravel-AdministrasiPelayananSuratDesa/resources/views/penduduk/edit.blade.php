@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('penduduk.update', $data->id_penduduk) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Penduduk <b>{{$data->nik}}</b> </h4>
                      <form class="forms-sample">
                      
                      <div class="form-group">
                            <label for="foto_ktp" class="col-md-4 control-label">Foto KTP</label>
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->foto_ktp) src="{{ asset('images/penduduk/'.$data->foto_ktp) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto_ktp">
                            </div>
                      </div>
                      
                      <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="nik" class="col-md-4 control-label">NIK</label>
                            <div class="col-md-6">
                                <input id="nik" type="number" maxlength="16" class="form-control" name="nik" value="{{ $data->nik }}" required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_kk') ? ' has-error' : '' }}">
                            <label for="no_kk" class="col-md-4 control-label">Nomor KK</label>
                            <div class="col-md-6">
                                <input id="no_kk" type="number" maxlength="16" class="form-control" name="no_kk" value="{{ $data->no_kk }}" required>
                                @if ($errors->has('no_kk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_kk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
                            <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>
                                @if ($errors->has('nama_lengkap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                            <label for="tanggal_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jenis_kelamin" required="">
                                <option value=""></option>
                                <option value="Laki-Laki" {{$data->jenis_kelamin === "Laki-Laki" ? "selected" : ""}} >Laki-Laki</option>
                                <option value="Perempuan" {{$data->jenis_kelamin === "Perempuan" ? "selected" : ""}} >Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama</label>
                            <div class="col-md-6">
                            <select class="form-control" name="agama" required="">
                                <option value=""></option>
                                <option value="Islam" {{$data->agama === "Islam" ? "selected" : ""}} >Islam</option>
                                <option value="Kristen" {{$data->agama === "Kristen" ? "selected" : ""}} >Kristen</option>
                                <option value="Katholik" {{$data->agama === "Katholik" ? "selected" : ""}} >Katholik</option>
                                <option value="Hindu" {{$data->agama === "Hindu" ? "selected" : ""}} >Hindu</option>
                                <option value="Budha" {{$data->agama === "Budha" ? "selected" : ""}} >Budha</option>
                                <option value="Konghucu" {{$data->agama === "Konghucu" ? "selected" : ""}} >Konghucu</option>
                                <option value="Atheis" {{$data->agama === "Atheis" ? "selected" : ""}} >Atheis</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                            <label for="pendidikan" class="col-md-4 control-label">Pendidikan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="pendidikan" required="">
                                <option value=""></option>
                                <option value="SD/Sederajat" {{$data->pendidikan === "SD/Sederajat" ? "selected" : ""}} >SD/Sederajat</option>
                                <option value="SMP/Sederajat" {{$data->pendidikan === "SMP/Sederajat" ? "selected" : ""}} >SMP/Sederajat</option>
                                <option value="SMA/Sederajat" {{$data->pendidikan === "SMA/Sederajat" ? "selected" : ""}} >SMA/Sederajat</option>
                                <option value="Sarjana" {{$data->pendidikan === "Sarjana" ? "selected" : ""}} >Sarjana</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-4 control-label">Pekerjaan</label>
                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" required>
                                @if ($errors->has('pekerjaan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" required="">
                                <option value=""></option>
                                <option value="Belum Kawin" {{$data->status === "Belum Kawin" ? "selected" : ""}} >Belum Kawin</option>
                                <option value="Kawin" {{$data->status === "Kawin" ? "selected" : ""}} >Kawin</option>
                                <option value="Cerai Hidup" {{$data->status === "Cerai Hidup" ? "selected" : ""}} >Cerai Hidup</option>
                                <option value="Cerai Mati" {{$data->status === "Cerai Mati" ? "selected" : ""}} >Cerai Mati</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status_keluarga') ? ' has-error' : '' }}">
                            <label for="status_keluarga" class="col-md-4 control-label">Status Keluarga</label>
                            <div class="col-md-6">
                                <input id="status_keluarga" type="text" class="form-control" name="status_keluarga" value="{{ $data->status_keluarga }}" required>
                                @if ($errors->has('status_keluarga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_keluarga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('golongan_darah') ? ' has-error' : '' }}">
                            <label for="golongan_darah" class="col-md-4 control-label">Golongan Darah</label>
                            <div class="col-md-6">
                                <input id="golongan_darah" type="text" maxlength="2" class="form-control" name="golongan_darah" value="{{ $data->golongan_darah }}" required>
                                @if ($errors->has('golongan_darah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_darah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kewarganegaraan') ? ' has-error' : '' }}">
                            <label for="kewarganegaraan" class="col-md-4 control-label">Kewarganegaraan</label>
                            <div class="col-md-6">
                                <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="{{ $data->kewarganegaraan }}" required>
                                @if ($errors->has('kewarganegaraan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_ayah') ? ' has-error' : '' }}">
                            <label for="nama_ayah" class="col-md-4 control-label">Nama Ayah</label>
                            <div class="col-md-6">
                                <input id="nama_ayah" type="text" class="form-control" name="nama_ayah" value="{{ $data->nama_ayah }}" required>
                                @if ($errors->has('nama_ayah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_ayah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_ibu') ? ' has-error' : '' }}">
                            <label for="nama_ibu" class="col-md-4 control-label">Nama Ibu</label>
                            <div class="col-md-6">
                                <input id="nama_ibu" type="text" class="form-control" name="nama_ibu" value="{{ $data->nama_ibu }}" required>
                                @if ($errors->has('nama_ibu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_ibu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $data->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                            <label for="no_hp" class="col-md-4 control-label">Nomor HP</label>
                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control" name="no_hp" value="{{ $data->no_hp }}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('penduduk.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection