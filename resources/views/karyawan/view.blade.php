<div class="panel-body" style="height: 100%;">
       @include('alert.flash-message')
<div class="navbar navbar-info">
<div class="form-group" align="right">

<form action="{{ url('karyawan/') }}" method="GET">
    <input type="text" class="validate" placeholder="Cari Nama" name="nama" onChange="form.submit()">
 </form>

      <div class="container-fluid">
        <a href="{{ URL('karyawan/create') }}" class="btn btn-default pull-left"><i class="fa fa-plus"></i> Tambah</a>
      </div>
</div>

    {{-- part alert --}}
    
      {{-- Kita cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}
    
    @if (Session::has('after_update'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-dismissible alert-{{ Session::get('after_update.alert') }}">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('after_update.title') }}</strong>
            <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_update.text-1') }}</a> {{ Session::get('after_update.text-2') }}
          </div>
        </div>
                            
      </div>
    @endif
    {{-- end part alert --}}
    <table class="table table-bordered table-hover" style="font-size:12px;">
      <thead>
        <tr>
          <th>NPP</th>
          <th>NAMA</th>
          <th ><text style="color:white;">_</text>T.<text style="color:white;">_</text>LAHIR<text style="color:white;">_</text></th>
          <th>ALAMAT</th>
          <th>TELP</th>
          <th>EMAIL</th>
          <th>JK</th>
          <th><text style="color:white;">_</text>T.<text style="color:white;">_</text>MASUK<text style="color:white;">_</text></th>
          
          <th>JABATAN</th>
          <th>DIVISI</th>
  <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
                            
            @if (count($karyawan))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all karyawan --}}
        @foreach ($karyawan as $data)
                                
                                @if (($data->jk == 'Laki-Laki'))
                                @php ($K = "L")
                                @else
                                @php ($K = "P")
                                @endif
          <tr>
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
            <td>
          <div class="tools">
            <a href="{{ URL('karyawan/show') }}/{{ $data->kode }}" >
          <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
          type="submit">
          <i class="fa fa-chevron-right"></i></button></a>
         <form action="{{action('KaryawanController@destroy', $data['kode'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i>
        </button>
        </form>
        </div>
        </td>
  </tr>      
        @endforeach
      </tbody>
    </table>
@else
   <div style="height: 50px; background-color: white;">Oops..Maaf Data Tidak Ditemukan</div>
@endif
  </div>
{{ $karyawan->links() }}

<script type="text/javascript">
  $('.cari').select2({
    placeholder: 'Cari...',
    ajax: {
      url: '/cari',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.email,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
  });
</script>
</div>