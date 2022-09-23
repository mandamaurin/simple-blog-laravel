@extends('layouts.app')

@section('title', 'Add New Tag')

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
                <h1>Add New Tag</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></div>
                    <div class="breadcrumb-item">Add New Tag</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Tag Form</h4>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('tag.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"
                                        class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit"class="btn btn-primary mr-1"
                                    >Submit</button>
                                <a href="{{ route('tag.index') }}" class="btn btn-secondary"
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
