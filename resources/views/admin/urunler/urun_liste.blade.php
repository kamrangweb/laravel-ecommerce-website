@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Urunler </h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Urunler</h4>
                        

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
                           

                            @foreach ($urunliste as $urunler)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $urunler->baslik }}</td>
                                <td>{{ $urunler['Altkategori']['altkategori_adi'] }}</td>
                                <td><img style="max-width:100px;" src="{{ !empty($urunler->resim) ? url($urunler->resim) : url('upload/resim-yok.png') }}" alt=""></td>
                                <td>
                                
                                    <input class="urunler" type="checkbox" id="{{ $urunler->id }}" data-id="{{ $urunler->id }}" switch="info" {{ $urunler->durum ? 'checked' : ''}}>
                                    <label  for="{{ $urunler->id }}" data-on-label="Yes" data-off-label="No"></label>

                                </td>
                                <td>
                                    <a href="{{ route('urun.duzenle',$urunler->id) }}" class="btn btn-info" title="Duzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('urun.sil',$urunler->id) }}" class="btn btn-danger" title="SIL" id="sil">
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