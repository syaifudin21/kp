@extends('admin.admin-template')

@section('content')
<section class="content-header">
	<h1>
		Data Mahasiswa Akademi Komunitas Negeri Lamongan
	</h1>	
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
	<div class="box-body">
      @if (session('success'))<div class="alert alert-default alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
      @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
      
        <a href="{{route('mahasiswa.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    			<table class="table table-bordered">
                    <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama</th>
                      <th>NRP </th>
                      <th>Prodi </th>
                      <th style="width: 40px">Tombol</th>
                    </tr>
                    </thead>
                    <?php $no = 1;?>
                    @foreach($mahasiswas as $mahasiswa)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$mahasiswa->nama}}</td>
                      <td>{{$mahasiswa->nrp}}</td>
                      <td>{{$mahasiswa->prodi->prodi}}</td>
                      <td style="min-width: 300px">
                      <div class="btn-group-veritical">
                      <a href="{{route('mahasiswa.show',$mahasiswa->id)}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      <a href="{{route('mahasiswa.edit',$mahasiswa->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="" type="button" 
                            onclick="event.preventDefault();
                            document.getElementById('hapus-form{{$mahasiswa->id}}').submit();" class="btn btn-danger">
                            <i class="fa fa-trash"></i></a>

                            <form id="hapus-form{{$mahasiswa->id}}" action="{{route('mahasiswa.destroy',$mahasiswa->id)}}" method="POST" style="display: none;"> @csrf @method('delete') </form>
                       </div>
                   </td>
                  </tr>
                  @endforeach
                 </tbody>
               </table>
                <div class="box-footer clearfix">
                    {{$mahasiswas->links()}}
              </div>
		</div>	
</div>
</section>
@endsection	