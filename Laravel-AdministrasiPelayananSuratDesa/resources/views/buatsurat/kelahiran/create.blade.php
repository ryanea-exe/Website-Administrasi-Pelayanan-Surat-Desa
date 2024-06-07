@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
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
        </script>
@stop

@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-2">
    <a href="{{ route('kelahiran.index') }}" class="btn btn-primary btn-rounded btn-fw"></i>- Data Surat Keterangan Kelahiran -</a>
  </div>

    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>

<form method="POST" action="{{ route('kelahiran.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row" style="margin-top: 20px;">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Surat Keterangan Kelahiran</h4>
                      
                        <div class="form-group{{ $errors->has('nomor_surat') ? ' has-error' : '' }}">
                            <label for="nomor_surat" class="col-md-4 control-label">Nomor Surat</label>
                            <div class="col-md-6">
                                <input id="nomor_surat" type="text" class="form-control" name="nomor_surat" value="{{ old('nomor_surat') }}  /SKL/DS/SM/I/2023" required>
                                @if ($errors->has('nomor_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_surat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_bayi') ? ' has-error' : '' }}">
                            <label for="nama_bayi" class="col-md-4 control-label">Nama Bayi</label>
                            <div class="col-md-6">
                                <input id="nama_bayi" type="text" class="form-control" name="nama_bayi" value="{{ old('nama_bayi') }}" required>
                                @if ($errors->has('nama_bayi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_bayi') }}</strong>
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
                        <div class="form-group{{ $errors->has('berat') ? ' has-error' : '' }}">
                            <label for="berat" class="col-md-4 control-label">Berat</label>
                            <div class="col-md-6">
                                <input id="berat" type="number" step="0.01" class="form-control" name="berat" value="{{ old('berat') }}" required>
                                @if ($errors->has('berat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('berat') }}</strong>
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
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_pelapor') ? ' has-error' : '' }}">
                            <label for="nama_pelapor" class="col-md-4 control-label">Nama Pelapor</label>
                            <div class="col-md-6">
                                <input id="nama_pelapor" type="text" class="form-control" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required>
                                @if ($errors->has('nama_pelapor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_pelapor') }}</strong>
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
                        <a href="{{route('kelahiran.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection