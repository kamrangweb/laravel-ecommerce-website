@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Izinler liste</h4>
                    <a href="{{ route('izin.ekle') }}">
                        <button class="btn btn-primary waves-effect waves-light">Izin ekle</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Izinler</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sira</th>
                                <th>Izin adi</th>
                                <th>Grup adi</th>
                                <th>Islem</th>
                            </tr>
                            </thead>


                            <tbody>
                                @php
                                    ($s = 1)
                                @endphp


                            @foreach ($izinler as $izin)
                            <tr>
                                <td>{{ $s++ }}</td>
                                <td>{{ $izin->name }}</td>
                                <td>{{ $izin->grup_adi }}</td>
                                <td>
                                    <a href="{{ route('izin.duzenle',$izin->id) }}" class="btn btn-info" title="Duzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('izin.sil',$izin->id) }}" class="btn btn-danger" title="SIL" id="sil">
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