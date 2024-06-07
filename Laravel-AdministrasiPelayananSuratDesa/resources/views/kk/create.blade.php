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

<form method="POST" action="{{ route('kk.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah KK Baru</h4>

                        <div class="form-group">
                            <label for="foto_kk" class="col-md-4 control-label">Foto KK</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto_kk">
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('no_kk') ? ' has-error' : '' }}">
                            <label for="no_kk" class="col-md-4 control-label">Nomor KK</label>
                            <div class="col-md-6">
                                <input id="no_kk" type="number" maxlength="16" class="form-control" name="no_kk" value="{{ old('no_kk') }}" required>
                                @if ($errors->has('no_kk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_kk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
                            <label for="rt" class="col-md-4 control-label">RT</label>
                            <div class="col-md-6">
                                <input id="rt" type="number" maxlength="2" class="form-control" name="rt" value="{{ old('rt') }}" required>
                                @if ($errors->has('rt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                            <label for="rw" class="col-md-4 control-label">RW</label>
                            <div class="col-md-6">
                                <input id="rw" type="number" maxlength="2" class="form-control" name="rw" value="{{ old('rw') }}" required>
                                @if ($errors->has('rw'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rw') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('dusun') ? ' has-error' : '' }}">
                            <label for="dusun" class="col-md-4 control-label">Dusun</label>
                            <div class="col-md-6">
                                <input id="dusun" type="text" class="form-control" name="dusun" value="{{ old('dusun') }}" required>
                                @if ($errors->has('dusun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dusun') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('desa') ? ' has-error' : '' }}">
                            <label for="desa" class="col-md-4 control-label">Desa</label>
                            <div class="col-md-6">
                                <input id="desa" type="text" class="form-control" name="desa" value="{{ old('desa') }}" required>
                                @if ($errors->has('desa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                            <label for="kecamatan" class="col-md-4 control-label">Kecamatan</label>
                            <div class="col-md-6">
                                <input id="kecamatan" type="text" class="form-control" name="kecamatan" value="{{ old('kecamatan') }}" required>
                                @if ($errors->has('kecamatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
                            <label for="kabupaten" class="col-md-4 control-label">Kabupaten</label>
                            <div class="col-md-6">
                                <input id="kabupaten" type="text" class="form-control" name="kabupaten" value="{{ old('kabupaten') }}" required>
                                @if ($errors->has('kabupaten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                            <label for="provinsi" class="col-md-4 control-label">Provinsi</label>
                            <div class="col-md-6">
                                <input id="provinsi" type="text" class="form-control" name="provinsi" value="{{ old('provinsi') }}" required>
                                @if ($errors->has('provinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
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
                        <a href="{{route('kk.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection