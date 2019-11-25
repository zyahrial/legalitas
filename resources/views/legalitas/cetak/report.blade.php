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
    R.001/LEG/{{ $date }}
<div class="wrapper">
      <table class="mytable" style="font-size:10px; ">
        <tr>
            <th><strong>NO</strong></td>
            <th><strong>DOKUMEN</strong></td>
            <th><strong>KARYAWAN</strong></td>
            <th ><strong>DITERBITKAN</strong></td>
            <th><strong>PERINGATAN</strong></td>
            <th><strong>KADALUARSA</strong></td>
            <th><strong>PENGERJAAN</strong></td>                        
            <th><strong>BIAYA</strong></td>
            <th align="center"><strong>STATUS</strong></td>
        </tr>
          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all legalitas --}}
        @foreach ($legalitas as $data)
        @php ($nilai = (number_format($data->nilai,0,",",".").""))                                     
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nama_dok }}</td>
            <td>{{ $data->penanggung_jawab}} </td>
            <td>{{ $data->tgl_terbit }}</td>
            <td>{{ $data->tgl_warning }}</td>           
            <td>{{ $data->tgl_expired }}</td>
            <td>{{ $data->progres }}</td>
            <td>{{ $nilai }}</td>
                 @if(($date_now) < ($data->tgl_warning))
            <td align="center"><text style="color: green;">AKTIF</text></td>
                 @elseif ($date_now > ($data->tgl_warning < $data->tgl_expired))
            <td align="center"> <text style=" color: orange;">WARNING</text></td>
                 @elseif ($date_now > $data->tgl_expired)
            <td align="center"> <text style="color: red;">EXPIRED</text></td>
                 @else
            <td align="center"> <text style="color: orange;">WARNING</text></td>
                 @endif        </tr>      
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</body>
</html>
