<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		    table {
    border-spacing: 0;
    width: 100%;
    }
    th {
      font-size: 12pt;
    }
    .center {
    	text-align: center;
    }
	</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data Penduduk</title>
</head>
<body>
<h1 class="center">LAPORAN DATA PENDUDUK</h1>
 <table class="table table-bordered" id="pseudo-demo">
                      <thead>
                        <tr>
                          <th>
                            NIK
                          </th>
                          <th>
                            Nama
                          </th>
                          <th>
                            Nomor KK
                          </th>
                          <th>
                            Jenis Kelamin
                          </th>
                          <th>
                            Tempat Lahir
                          </th>
                          <th>
                            Tanggal Lahir
                          </th>
                          <th>
                            Agama
                          </th>
                          <th>
                            Pekerjaan
                          </th>
                          <th>
                            Pendidikan
                          </th>
                          <th>
                            Golongan Darah
                          </th>
                          <th>
                            Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                       <tr>
                          <td class="py-1">
                            {{$data->nik}}
                          </td>
                          <td>
                            {{$data->nama_lengkap}}
                          </td>
                          <td>
                            {{$data->kk->no_kk}}
                          </td>
                          <td>
                            {{$data->tempat_lahir}}
                          </td>
                          <td>
                            {{date('d/m/y', strtotime($data->tanggal_lahir))}}
                          </td>
                          <td>
                            {{$data->agama}}
                          </td>
                          <td>
                            {{$data->pekerjaan}}
                          </td>
                          <td>
                            {{$data->pendidikan}}
                          </td>
                          <td>
                            {{$data->golongan_darah}}
                          </td>
                          <td>
                            {{$data->status}}
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
</body>
</html>