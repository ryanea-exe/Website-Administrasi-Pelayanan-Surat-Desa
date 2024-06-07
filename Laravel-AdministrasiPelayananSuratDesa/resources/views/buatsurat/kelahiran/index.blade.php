@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                "iDisplayLength": 50
            });

        });
    </script>
@stop
@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-2">
            <a href="{{ route('kelahiran.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>
                Buat Surat Keterangan Kelahiran</a>
        </div>
        <div class="col-lg-12">
            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
                    {{ Session::get('message') }}</div>
            @endif
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title pull-left">Data Surat Keterangan Kelahiran</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>
                                        Nomor Surat
                                    <th>
                                        Nama Bayi
                                    </th>
                                    <th>
                                        Tempat Lahir
                                    </th>
                                    <th>
                                        Tanggal Lahir
                                    </th>
                                    <th>
                                        Jenis Kelamin
                                    </th>
                                    <th>
                                        Berat
                                    </th>
                                    <th>
                                        Nama Ayah
                                    </th>
                                    <th>
                                        Nama Ibu
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td class="py-1">
                                            <a href="{{ route('kelahiran.show', $data->id_kelahiran) }}">
                                                {{ $data->nomor_surat }}
                                            </a>
                                        <td>
                                            {{ $data->nama_bayi }}
                                        </td>
                                        <td>
                                            {{ $data->tempat_lahir }}
                                        </td>
                                        <td>
                                            {{ $data->tanggal_lahir }}
                                        </td>
                                        <td>
                                            {{ $data->jenis_kelamin }}
                                        </td>
                                        <td>
                                            {{ $data->berat }}
                                        </td>
                                        <td>
                                            {{ $data->nama_ayah }}
                                        </td>
                                        <td>
                                            {{ $data->nama_ibu }}
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start"
                                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                                    </form>
                                                    <form action="{{ route('kelahiran.cetak', $data->id_kelahiran) }}"
                                                        class="pull-left" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Cetak surat ini?')">Cetak Surat
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('kelahiran.destroy', $data->id_kelahiran) }}"
                                                        class="pull-left" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete
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
