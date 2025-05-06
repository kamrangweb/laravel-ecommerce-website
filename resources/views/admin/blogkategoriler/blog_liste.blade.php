@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog kategorlier' </h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blog liste</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sira</th>
                                <th>Basllik</th>
                                <th>Alt Kategori adi</th>
                                <th>Resimmm</th>
                                <th>Durum</th>
                                <th>Islem</th>
                            </tr>
                            </thead>


                            <tbody>
                           

                            @foreach ($blogliste as $bloglar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bloglar->kategori_adi }}</td>
                                <td>{{ $bloglar->kategori_adi }}</td>
                                <td>
                                
                                    <input class="icerikler" type="checkbox" id="{{ $bloglar->id }}" data-id="{{ $bloglar->id }}" switch="info" {{ $bloglar->durum ? 'checked' : ''}}>
                                    <label  for="{{ $bloglar->id }}" data-on-label="Yes" data-off-label="No"></label>

                                </td>
                                <td>
                                    <a href="{{ route('blog.kategori.duzenle',$bloglar->id) }}" class="btn btn-info" title="Duzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('blog.kategori.sil',$bloglar->id) }}" class="btn btn-danger" title="SIL" id="sil">
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