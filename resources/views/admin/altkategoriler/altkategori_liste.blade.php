@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Alt Kategoriler </h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Kategoriler</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sira</th>
                                <th>Kategori adi</th>
                                <th>alt Kategori adi</th>
                                <th>Resimmm</th>
                                <th>Islem</th>
                            </tr>
                            </thead>


                            <tbody>
                                @php
                                    ($s = 1)
                                @endphp


                            @foreach ($altkategoriler as $altkategori)
                            <tr>
                                <td>{{ $s++ }}</td>
                                <td>{{ $altkategori['iliskikategori']['kategori_adi'] }}</td>
                                <td>{{ $altkategori->altkategori_adi }}</td>
                                <td><img style="max-width:100px;" src="{{ !empty($altkategori->resim) ? url($altkategori->resim) : url('upload/resim-yok.png') }}" alt=""></td>
                                <td>
                                    <a href="{{ route('altkategori.duzenle',$altkategori->id) }}" class="btn btn-info" title="Duzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('altkategori.sil',$altkategori->id) }}" class="btn btn-danger" title="SIL" id="sil">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        <!-- end row-->
        
    </div> <!-- container-fluid -->
</div>    
@endsection