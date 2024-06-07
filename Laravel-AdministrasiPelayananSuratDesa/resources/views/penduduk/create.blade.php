@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});
$(document).on('click', '.pilih_kk', function (e) {
                document.getElementById("id_kkk").value = $(this).attr('data-id_kkk');
                document.getElementById("no_kk").value = $(this).attr('data-no_kk');
                $('#myModalKK').modal('hide');
            });

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        $(function () {
                $("#lookup, #lookup2").dataTable();
            });
        </script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('penduduk.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Penduduk Baru</h4>
                        
                        <div class="form-group">
                            <label for="foto_ktp" class="col-md-4 control-label">Foto KTP</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto_ktp">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="nik" class="col-md-4 control-label">NIK</label>
                            <div class="col-md-6">
                                <input id="nik" type="number" maxlength="16" class="form-control" name="nik" value="{{ old('nik') }}" required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('id_kkk') ? ' has-error' : '' }}">
                            <label for="id_kkk" class="col-md-4 control-label">Nomor KK</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="no_kk" type="text" class="form-control" readonly="" required>
                                <input id="id_kkk" type="hidden" name="id_kkk" value="{{ old('id_kkk') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModalKK"><b>Cari KK</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('id_kkk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_kkk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
                            <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
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
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
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
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
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
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="agama" class="col-md-4 control-label">Agama</label>
                            <div class="col-md-6">
                            <select class="form-control" name="agama" required="">
                                <option value=""></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Atheis">Atheis</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                            <label for="pendidikan" class="col-md-4 control-label">Pendidikan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="pendidikan" required="">
                                <option value=""></option>
                                <option value="SD/Sederajat">SD/Sederajat</option>
                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                <option value="Sarjana">Sarjana</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-4 control-label">Pekerjaan</label>
                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
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
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status_keluarga') ? ' has-error' : '' }}">
                            <label for="status_keluarga" class="col-md-4 control-label">Status Keluarga</label>
                            <div class="col-md-6">
                                <input id="status_keluarga" type="text" class="form-control" name="status_keluarga" value="{{ old('status_keluarga') }}" required>
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
                                <input id="golongan_darah" type="text" maxlength="2" class="form-control" name="golongan_darah" value="{{ old('golongan_darah') }}" required>
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
                                <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}" required>
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
                                <input id="nama_ayah" type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
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
                                <input id="nama_ibu" type="text" class="form-control" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
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
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
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
                                <input id="no_hp" type="number" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModalKK" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari KK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor KK</th>
                                    <th>RT / RW</th>
                                    <th>Dusun</th>
                                    <th>Desa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kks as $data)
                                <tr class="pilih_kk" data-id_kkk="<?php echo $data->id_kk; ?>" data-no_kk="<?php echo $data->no_kk; ?>" >
                                    <td>{{$data->no_kk}}</td>
                                    <td>
                                        {{$data->rt}}
                                        <h10> / </h10>
                                        {{$data->rw}}
                                    </td>
                                    <td>{{$data->dusun}}</td>
                                    <td>{{$data->desa}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

@endsection