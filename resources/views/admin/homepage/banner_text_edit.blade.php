@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Banner Text</h4>
                        <form method="post" action="{{ route('banner.text.update') }}" class="mt-6 space-y-6">
                            @csrf
                            <input type="hidden" name="id" value="{{ $homebanner->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" placeholder="Title" id="example-text-input" value="{{ $homebanner->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Subtitle</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="subtitle" placeholder="Subtitle" id="example-text-input" value="{{ $homebanner->subtitle }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="url" name="url" placeholder="URL" id="example-text-input" value="{{ $homebanner->url }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="url" name="video_url" placeholder="Video URL" id="example-text-input" value="{{ $homebanner->video_url }}">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info" value="Update Text">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 