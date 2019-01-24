@extends('admin.admin-template')

@section('content')
<section class="content-header">
	<h1>
		Data Dosen
	</h1>	
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
	<div class="box-body">
      @if (session('success'))<div class="alert alert-default alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
      @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
      
    			<table class="table table-bordered">
                    <tbody>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Tahun Ajaran</th>
                      <th>Tempat Kp</th>
                      <th>Nama</th>
                      <th>Hp</th>
                      <th>Alamat </th>
                      <th>email </th>
                    </tr>
                    <?php $no = 1;?>
                    @foreach($pembimbings as $pembimbing)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$pembimbing->tahun->tahun_ajaran}}</td>
                      <td>{{$pembimbing->tempatkp->nama}}</td>
                      <td>{{$pembimbing->nama}}</td>
                      <td>{{$pembimbing->hp}}</td>
                      <td>{{$pembimbing->alamat}}</td>
                      <td>{{$pembimbing->email}}</td>
                  </tr>
                  @endforeach
                 </tbody>
               </table>
                <div class="box-footer clearfix">
                    {{$pembimbings->links()}}
              </div>
		</div>	
</div>
</section>
@endsection	