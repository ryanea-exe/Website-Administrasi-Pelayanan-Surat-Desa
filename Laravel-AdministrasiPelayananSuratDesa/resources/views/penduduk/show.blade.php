@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->nik}}</b></h4>

                        <div class="form-group">
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->foto_ktp) src="{{ asset('images/penduduk/'.$data->foto_ktp) }}" @endif />
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="nik" class="col-md-4 control-label">NIK</label>
                            <div class="col-md-6">
                                <input id="nik" type="number" maxlength="16" class="form-control" name="nik" value="{{ $data->nik }}" readonly>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_kk" class="col-md-4 control-label">Nomor KK</label>
                            <div class="col-md-6">
                                <input id="id_kk" type="number" class="form-control" value="{{ $data->no_kk }}" readonly="">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
                            <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}" readonly>
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
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}" readonly>
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
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" readonly>
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
                                <input id="jenis_kelamin" type="text" class="form-control" name="jenis_kelamin" value="{{ $data->jenis_kelamin }}" readonly>
                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama</label>
                            <div class="col-md-6">
                                <input id="agama" type="text" class="form-control" name="agama" value="{{ $data->agama }}" readonly>
                                @if ($errors->has('agama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                            <label for="pendidikan" class="col-md-4 control-label">Pendidikan</label>
                            <div class="col-md-6">
                                <input id="pendidikan" type="text" class="form-control" name="pendidikan" value="{{ $data->pendidikan }}" readonly>
                                @if ($errors->has('pendidikan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pendidikan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-4 control-label">Pekerjaan</label>
                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" readonly>
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
                                <input id="status" type="text" class="form-control" name="status" value="{{ $data->status }}" readonly>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status_keluarga') ? ' has-error' : '' }}">
                            <label for="status_keluarga" class="col-md-4 control-label">Status Keluarga</label>
                            <div class="col-md-6">
                                <input id="status_keluarga" type="text" class="form-control" name="status_keluarga" value="{{ $data->status_keluarga }}" readonly>
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
                                <input id="golongan_darah" type="text" maxlength="2" class="form-control" name="golongan_darah" value="{{ $data->golongan_darah }}" readonly>
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
                                <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="{{ $data->kewarganegaraan }}" readonly>
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
                                <input id="nama_ayah" type="text" class="form-control" name="nama_ayah" value="{{ $data->nama_ayah }}" readonly>
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
                                <input id="nama_ibu" type="text" class="form-control" name="nama_ibu" value="{{ $data->nama_ibu }}" readonly>
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
                                <input id="email" type="text" class="form-control" name="email" value="{{ $data->email }}" readonly>
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
                                <input id="no_hp" type="number" class="form-control" name="no_hp" value="{{ $data->no_hp }}" readonly>
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <a href="{{route('penduduk.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection