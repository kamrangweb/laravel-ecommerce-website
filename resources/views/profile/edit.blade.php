@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile Information</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                            <div class="col-md-6">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                @include('profile.partials.resim')
                            </div>
                            <div class="col-md-6">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection