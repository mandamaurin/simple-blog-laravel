@extends('layouts.app')

@section('title', 'Edit Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></div>
                    <div class="breadcrumb-item">Edit Category</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Category Form</h4>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('category.update', $data->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                        class="form-control" name="name" value="{{ $data->name }}">
                                </div>

                                <div class="form-group">
                                    
                                    <div class="custom-control custom-switch">
                                    
                                    <input type="checkbox" class="custom-control-input" name="active" id="customSwitch1" {{ $data->active == 'yes' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch1">Activate this Category</label>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit"class="btn btn-primary mr-1"
                                    >Submit</button>
                                <a href="{{ route('role.index') }}" class="btn btn-secondary"
                                    type="reset">Back</a>
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
