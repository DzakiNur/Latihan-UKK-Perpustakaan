@extends('layouts.app')

@section('title', 'Books')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Collections</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Books</a></div>
                    <div class="breadcrumb-item">Collection</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <h2 class="section-title col-6">Books</h2>
                    @if(Auth::user()->role == 'admin')
                    <div class="button card-header-action dropdown col-6">
                        <a href="#"
                            data-toggle="dropdown"
                            class="btn btn-primary mr-4 dropdown-toggle">Action</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <li class="dropdown-title">Select Action</li>
                            <li>
                                <a href="{{route('admin.add-book')}}" class="dropdown-item">Add Book</a>
                            </li>
                            <li><a href="#"
                                    class="dropdown-item">Download PDF</a></li>
                        </ul>
                    </div>
                    @endif
                </div>
                
                <div class="row">
                    @foreach($collection as $collections)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('/storage/images/'.$collections->buku->gambar) }}">
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">{{$collections->buku->judul}}</a></h2>
                                    <h6>{{$collections->buku->kategori->nama_kategori}}</h2>
                                </div>
                            </div>
                            <div class="article-details">
                                <p>{!! Str::limit($collections->buku->sinopsis, 150, ' ...') !!} <a href="">read more</a></p>
                                <div class="article-cta">
                                    <div class="row">
                                        <form action="" class="col-6">
                                            @csrf
                                            <button href="" class="btn btn-green">
                                                Borrow
                                            </button>
                                        </form>
                                        <form action="" class="col-6">
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    <a href="" class="btn btn-primary mt-2">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
