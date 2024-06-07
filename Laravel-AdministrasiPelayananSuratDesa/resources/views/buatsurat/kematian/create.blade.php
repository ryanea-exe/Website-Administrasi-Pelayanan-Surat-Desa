@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});
$(document).on('click', '.pilih_nik', function (e) {
                document.getElementById("nik").value = $(this).attr('data-nik');
                document.getElementById("nama").value = $(this).attr('data-nama');
                $('#myModalNik').modal('hide');
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
<div class="row">
  <div class="col-lg-2">
    <a href="{{ route('kematian.index') }}" class="btn btn-primary btn-rounded btn-fw"></i>- Data Surat Keterangan Kematian -</a>
  </div>

    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>

<form method="POST" action="{{ route('kematian.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row" style="margin-top: 20px;">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Surat Keterangan Kematian</h4>
                      
                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                            <label for="nik" class="col-md-4 control-label">NIK</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nik" type="text" name="nik" value="{{ old('nik') }}" class="form-control" readonly="" required>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModalNik"><b>Cari NIK</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
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
                        <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
                            <label for="umur" class="col-md-4 control-label">Umur</label>
                            <div class="col-md-6">
                                <input id="umur" type="number" maxlength="3" class="form-control" name="umur" value="{{ old('umur') }}" required>
                                @if ($errors->has('umur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('umur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tanggal_meninggal') ? ' has-error' : '' }}">
                            <label for="tanggal_meninggal" class="col-md-4 control-label">Tanggal Meninggal</label>
                            <div class="col-md-6">
                                <input id="tanggal_meninggal" type="date" class="form-control" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}" required>
                                @if ($errors->has('tanggal_meninggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_meninggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat_meninggal') ? ' has-error' : '' }}">
                            <label for="tempat_meninggal" class="col-md-4 control-label">Tempat Meninggal</label>
                            <div class="col-md-6">
                                <input id="tempat_meninggal" type="text" class="form-control" name="tempat_meninggal" value="{{ old('tempat_meninggal') }}" required>
                                @if ($errors->has('tempat_meninggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_meninggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat_makam') ? ' has-error' : '' }}">
                            <label for="tempat_makam" class="col-md-4 control-label">Tempat Makam</label>
                            <div class="col-md-6">
                                <input id="tempat_makam" type="text" class="form-control" name="tempat_makam" value="{{ old('tempat_makam') }}" required>
                                @if ($errors->has('tempat_makam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_makam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('penyebab_meninggal') ? ' has-error' : '' }}">
                            <label for="penyebab_meninggal" class="col-md-4 control-label">Penyebab Meninggal</label>
                            <div class="col-md-6">
                                <input id="penyebab_meninggal" type="text" class="form-control" name="penyebab_meninggal" value="{{ old('penyebab_meninggal') }}" required>
                                @if ($errors->has('penyebab_meninggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penyebab_meninggal') }}</strong>
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
                        <a href="{{route('kematian.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModalNik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari NIK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penduduks as $data)
                                <tr class="pilih_nik" data-nik="<?php echo $data->nik; ?>" >
                                    <td>{{$data->nik}}</td>
                                    <td>{{$data->nama_lengkap}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    <td>{{$data->tempat_lahir}}</td>
                                    <td>{{$data->tanggal_lahir}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

@endsection