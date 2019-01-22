@extends('koordinator.koordinator-template')

@section('content')
<section class="content-header">
	<h1>
		Tempat KP
	</h1>	
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
	<div class="box-body">
      @if (session('success'))<div class="alert alert-default alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
      @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
      
        <a href="{{route('tempatkp.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    			<table class="table table-bordered">
                    <tbody>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Instansi</th>
                      <th>Alamat</th>
                      <th>Kapasitas</th>
                      <th style="width: 40px">Tombol</th>
                    </tr>
                    <?php $no = 1;?>
                    @foreach($tempatkps as $tempatkp)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$tempatkp->nama}}</td>
                      <td>{{$tempatkp->alamat}}</td>
                      <td>{{$tempatkp->kapasitas}}</td>
                      <td style="min-width: 300px">
                      <div class="btn-group-veritical">
                      <a href="{{route('tempatkp.show',$tempatkp->id)}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      <a href="{{route('tempatkp.edit',$tempatkp->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="" type="button" 
                            onclick="event.preventDefault();
                            document.getElementById('hapus-form{{$tempatkp->id}}').submit();" class="btn btn-danger">
                            <i class="fa fa-trash"></i></a>

                            <form id="hapus-form{{$tempatkp->id}}" action="{{route('tempatkp.destroy',$tempatkp->id)}}" method="POST" style="display: none;"> @csrf @method('delete') </form>
                       </div>
                   </td>
                  </tr>
                  @endforeach
                 </tbody>
               </table>
                <div class="box-footer clearfix">
                    {{$tempatkps->links()}}
              </div>
		</div>	
</div>
</section>
@endsection	