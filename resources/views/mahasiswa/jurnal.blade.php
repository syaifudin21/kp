@extends('mahasiswa.mahasiswa-template')

@section('head')
<link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')
<div class="searchAndFilter">
        <table class="table table-bordered">
            <tbody>
                <tr class="text-center">
                    <th>Nama Kelompok</th>
                    <th>Tempat Kerja Praktek</th>
                    <th>Dosen Pembimbing</th>
                    <th>File Proposal</th>
                    <th>Status</th>
    
                </tr>
                            <tr>
                    <td style="min-width: 250px">
                        <p>ACHMAD GILANG PRAMESTYO</p>
                        <p>ADIB MARSUDI</p>
                        <p>AHMAD FAISAL JAWAHIR</p>
                    </td>
                    <td style="min-width: 150px">Abel Convection Lamongan</td>
                    <td style="min-width: 150px">Wajib, S.Pd, S.ST, M.Kom.</td>
                    <td style="min-width: 150px" class="text-center"><a href="/stream/Form TA_ Elva Hidayatul Haque (2103177040).pdf" target="_blank">File
                            Proposal</a></td>
                    <td style="min-width: 100px" class="text-center">
                                            Diterima
                                        </td>
                </tr>
                        </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection