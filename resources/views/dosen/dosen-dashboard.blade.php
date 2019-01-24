@extends('dosen.dosen-template')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
  <div class="box-header" style="text-align: center">
    @if (!empty($ta))
      <h4><b>Grafik Peminatan Bidang Pekerjaan Mahasiswa Dalam Kerja Praktek</b></h4>
    @else
    <b>Tahun Ajaran Tidak Ada Yang Aktif</b>
    @endif
  </div>
  <div class="box-body">
      <canvas id="densityChart" width="600" height="400"></canvas>
  </div>
</div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript">
  var densityCanvas = document.getElementById("densityChart");

  Chart.defaults.global.defaultFontSize = 12;

  var densityData = {
    label: '{{(!empty($ta->tahun_ajaran))? $ta->tahun_ajaran: "Tahun Ajaran Tidak Ada Yang Aktif"}}',
    data: [{{$total}}]
  };

  var barChart = new Chart(densityCanvas, {
    type: 'bar',
    data: {
      labels: [<?=$bidang;?>],
      datasets: [densityData]
    }
  });

  $(document).ready(function() {
    @if(Session::has('berhasil'))
      Materialize.toast('{{ Session::get('berhasil') }}', 4000);
    @endif
  });
</script>
@endsection