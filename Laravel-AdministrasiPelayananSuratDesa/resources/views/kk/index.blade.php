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
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('kk.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>Tambah KK</a>
  </div>

    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data KK</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nomor KK
                          </th>
                          <th>
                            RT / RW
                          </th>
                          <th>
                            Dusun
                          </th>
                          <th>
                            Desa
                          </th>
                          <th>
                            Kecamatan
                          </th>
                          <th>
                            Kabupaten
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                            <a href="{{route('kk.show', $data->id_kk)}}"> 
                            {{$data->no_kk}}
                          </a>
                          </td>
                          <td>
                            {{$data->rt}}
                            <h10> / </h10>
                            {{$data->rw}}
                          </td>
                          <td>
                            {{$data->dusun}}
                          </td>
                          <td>
                            {{$data->desa}}
                          </td>
                          <td>
                            {{$data->kecamatan}}
                          </td>
                          <td>
                            {{$data->kabupaten}}
                          </td>
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('kk.edit', $data->id_kk)}}"> Edit </a>
                            <form action="{{ route('kk.destroy', $data->id_kk) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                            </form>
                          </div>
                          </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection