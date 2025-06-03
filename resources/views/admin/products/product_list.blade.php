@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products List</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($productList as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td><small>{{ $product->product_sku  ?? 'Not defined' }}</small></td>
                                <td><img style="max-width:100px;" src="{{ !empty($product->product_thumbnail) ? url($product->product_thumbnail) : url('upload/resim-yok.png') }}" alt=""></td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->product_stock_quantity }}</td>
                                <td>
                                    <input class="product-status" type="checkbox" id="{{ $product->id }}" data-id="{{ $product->id }}" switch="info" {{ $product->product_status ? 'checked' : ''}}>
                                    <label for="{{ $product->id }}" data-on-label="Yes" data-off-label="No"></label>
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" title="Delete" id="delete">
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
    </div> <!-- container-fluid -->
</div>    
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.product-status').change(function() {
            var productId = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;
            var checkbox = $(this);
            
            $.ajax({
                url: "{{ route('product.status') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: productId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        checkbox.prop('checked', !status);
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    checkbox.prop('checked', !status);
                    toastr.error('Error updating product status');
                }
            });
        });
    });
</script>
@endsection