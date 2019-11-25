<!DOCTYPE html>
<html>
<head>
@php ($date = date('m/Y'))
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    *{
    
     font-family: Roboto;
    font-size: 11px;
  
    }
  .mytable tf{
        background-color: white ;
    }
    .mytable th{
    background-color: #0B6FA4 ;color: white;
    font-size: 12px;
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
    R.001/INV-IT/{{ $date }}
<div class="wrapper">
      <table class="mytable" style="font-size:10px; ">
        <tr>
          <th>NO.INVENTARIS</strong></td>
          <th>MERK/TYPE</td>
          <th>JENIS</td>
          <th>WARNA</td>
          <th>TAHUN</td>
          <th>KONDISI </td>
          <th>POSISI</td>
          <th>KANTOR</td>
          <th>HARGA</td>
        </tr>
          @php ($date_now = date('Y-m-d'))

        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all inventaris_it --}}
        @foreach ($inventaris_it as $data)
                                
        @php ($nilai = (number_format($data->harga,0,",",".").""))                                     
          <tr>
            <td>{{ $data->no_inventaris }}</td>
            <td>{{ $data->merk_Type }}</td>
            <td>{{ $data->jenis_barang }}</td>
            <td>{{ $data->warna }}</td>
            <td>{{ $data->tahun }}</td>
            <td>{{ $data->kondisi}}</td>          
            <td>{{ $data->posisi }}</td>
            <td>{{ $data->kantor }}</td>
            <td>{{ $nilai }}</td>
        </tr>      
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</body>
</html>
