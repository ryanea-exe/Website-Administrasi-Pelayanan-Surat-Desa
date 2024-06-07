@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
  
<div>  
  <div class="col-lg-2">
    <a href="{{ route('kematian.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>Surat Keterangan Kematian</a>
  </div>
  <br>
  <div class="col-lg-2">
    <a href="{{ route('kelahiran.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>Surat Keterangan Kelahiran</a>
  </div>

    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>

@endsection