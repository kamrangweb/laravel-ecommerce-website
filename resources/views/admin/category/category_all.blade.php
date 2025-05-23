@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Categories</h4>
                        <a href="{{ route('category.add') }}" class="btn btn-info waves-effect waves-light mb-3">Add Category</a>
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <img src="{{ asset($category->category_image) }}" style="width: 60px; height: 60px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 