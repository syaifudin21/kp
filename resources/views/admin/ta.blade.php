@extends('admin.admin-template')

@section('content')
<section class="content-header">
	<h1>
		Data Prodi Akademi Komunitas Negeri Lamongan
	</h1>	
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
	<div class="box-body">
      @if (session('success'))<div class="alert alert-default alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
      @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
      
        <a href="{{route('ta.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    			<table class="table table-bordered">
                    <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Tahun Ajaran</th>
                      <th>Koordinator </th>
                      <th>Status </th>
                      <th>Tampil </th>
                      <th style="width: 40px">Tombol</th>
                    </tr>
                    </thead>
                    <?php $no = 1;?>
                    <tbody>
                    @foreach($tas as $ta)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$ta->tahun_ajaran}}</td>
                      <td>{{$ta->koordinator->nama}}</td>
                      <td>{{$ta->status}}</td>
                      <td>{{$ta->aktif}}</td>
                      <td style="min-width: 300px">
                      <div class="btn-group-veritical">
                      <a href="{{route('ta.show',$ta->id)}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      <a href="{{route('ta.edit',$ta->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="" type="button" 
                            onclick="event.preventDefault();
                            document.getElementById('hapus-form{{$ta->id}}').submit();" class="btn btn-danger">
                            <i class="fa fa-trash"></i></a>

                            <form id="hapus-form{{$ta->id}}" action="{{route('ta.destroy',$ta->id)}}" method="POST" style="display: none;"> @csrf @method('delete') </form>
                       </div>
                   </td>
                  </tr>
                  @endforeach
                 </tbody>
               </table>
                <div class="box-footer clearfix">
                    {{$tas->links()}}
              </div>
		</div>	
</div>
</section>
@endsection	