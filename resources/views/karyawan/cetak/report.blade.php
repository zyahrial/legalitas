<!DOCTYPE html>
<html>
<head>
@php ($date = date('m/Y'))
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    *{
    
     font-family: Roboto;
    font-size: 11px;
    border: 0px solid black;
  
    }
  .mytable tf{
        background-color: white ;
    }
    .mytable th{
        background-color: #0B6FA4 ;color: white;
    font-size: 12px;
    border-radius : 3px 3px;
    }

    .mytable td, th{
  height: 50px;
    border-bottom: 1px solid #eee;
      }
  
  style=" width:250; height:30; border-radius: 5px 5px 5px 5px;"
  #table tr:nth-child(odd){
text-decoration: underline;
  background-color: #ffffff;
  font-family: Tahoma, Helvetica;
  font-size: 13px;
  -moz-user-select: none;
  
}
        @page { margin: 30px 10px 10px 10px; }
        .header { position: fixed; left: 0px; top: -100px; right: 0px; height: 100px; text-align: center; }
        .footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px;text-align: center;}
        .footer .pagenum:before { content: counter(page); }
        </style>
</head>
<body >
    R.001/KAR/{{ $date }}
<div class="wrapper">
      <table class="mytable" style="font-size:10px; ">
        <tr>
          <th>NO</th>
          <th>NPP</th>
          <th>NAMA</th>
          <th>TGL.LAHIR</th>
          <th>ALAMAT</th>
          <th>TELP</th>
          <th>EMAIL</th>
          <th>JK</th>
          <th>TGL.MASUK</th>       
          <th>JABATAN</th>
          <th>DIVISI</th>
        </tr>
          @php ($date_now = date('Y-m-d'))
    
        @php(  $no = 1 {{-- buat nomor urut --}} )
        {{-- loop all karyawan --}}
        @foreach ($karyawan as $data)                               
                                @if (($data->jk == 'Laki-Laki'))
                                @php ($K = "L")
                                @else
                                @php ($K = "P")
                                @endif
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->npp }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->tanggal_lahir }}</td>
            <td><p>{{ $data->alamat}}</p></td>
            <td>{{ $data->telp }}</td>
            <td>{{ $data->email }}</td>
            <td>{{$K}}</td>           
            <td>{{ $data->tanggal_masuk }}</td>
            <td>{{ $data->jabatan }}</td>
            <td>{{ $data->divisi }}</td>
        </tr>      
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</body>
</html>
