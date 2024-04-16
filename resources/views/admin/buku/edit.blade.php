@extends('layouts.app')

@section('title', 'Books')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Books</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Books</a></div>
                    <div class="breadcrumb-item">Add</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Some Book</h4>
                            </div>
                            <form action="{{route('admin.book.update', $book->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="judul"
                                                class="form-control" value="{{$book->judul}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Writter</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="penulis"
                                                class="form-control" value="{{$book->penulis}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="penerbit"
                                                class="form-control" value="{{$book->penerbit}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Year Published</label>
                                        <div class="input-group col-sm-12 col-md-7">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                            <input type="text" name="tahun_terbit" class="form-control" value="{{$book->tahun_terbit}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="kategori_id">
                                                @foreach($category as $categories)
                                                <option value="{{$categories->id}}">{{$categories->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Synopsis</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="sinopsis" class="form-control" value="{{$book->sinopsis}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview"
                                                class="image-preview">
                                                <label for="image-upload"
                                                    id="image-label">Choose File</label>
                                                <input type="file"
                                                    name="gambar"
                                                    id="image-upload" value="{{$book->gambar}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    
    <!-- Page Specific JS File -->
@endpush
