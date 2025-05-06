@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Coklu Resimler hepsi</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">coklu_resimler</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sira</th>
                                <th>Resim</th>
                                <th>Islem</th>
                            </tr>
                            </thead>


                            <tbody>
                                @php
                                    ($s = 1)
                                @endphp


                            @foreach ($coklu_resimler as $resimler)
                            <tr>
                                <td>{{ $s++ }}</td>
                                <td><img style="max-width:100px;" src="{{ asset($resimler->resim) }}" alt=""></td>
                                <td>
                                    <a href="{{ route('coklu.duzenle',$resimler->id) }}" class="btn btn-info" title="Duzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('coklu.sil',$resimler->id) }}" class="btn btn-danger" title="SIL" id="sil">
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