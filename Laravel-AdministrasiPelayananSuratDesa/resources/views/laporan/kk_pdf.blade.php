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
	<title>Laporan Data KK</title>
</head>
<body>
<h1 class="center">LAPORAN DATA KARTU KELUARGA</h1>
 <table class="table table-bordered" id="pseudo-demo">
                      <thead>
                        <tr>
                          <th>
                            Nomor KK
                          </th>
                          <th>
                            RT
                          </th>
                          <th>
                            RW
                          </th>
                          <th>
                            Dusun
                          </th>
                          <th>
                            Desa
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                            {{$data->no_kk}}
                          </td>
                          <td>
                            {{$data->rt}}
                          </td>
                          <td>
                            {{$data->rw}}
                          </td>
                          <td>
                            {{$data->dusun}}
                          </td>
                          <td>
                            {{$data->desa}}
                          </td>
                          
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
</body>
</html>