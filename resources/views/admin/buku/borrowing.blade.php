@extends('layouts.app')

@section('title', 'Books')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Borrowing</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Books</a></div>
                    <div class="breadcrumb-item">Borrowing</div>
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
                    @foreach($borrowing as $borrow)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('/storage/images/'.$borrow->buku->gambar) }}">
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">{{$borrow->buku->judul}}</a></h2>
                                    <h6>{{$borrow->buku->kategori->nama_kategori}}</h2>
                                </div>
                            </div>
                            <div class="article-details">
                                <p>{!! Str::limit($borrow->buku->sinopsis, 150, ' ...') !!} <a href="">read more</a></p>
                                <div class="article-cta">
                                    <div class="row">
                                        <form action="" class="col-6" style="flex: 0 0 45%">
                                            @csrf
                                            <button href="" class="btn btn-green">
                                                Return
                                            </button>
                                        </form>
                                        <a href="" class="btn btn-primary col-6">
                                            Read More
                                        </a>
                                    </div>
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
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    @if(Session::has('success'))
    <script type="text/javascript">

        $(document).ready(function() {
            iziToast.success({
                title: 'Successed!',
                message: "{{Session::get('success')}}",
                position: 'bottomRight' 
            });
        });
    </script>

    @endif
    @if(Session::has('error'))
    <script type="text/javascript">

        $(document).ready(function() {
            iziToast.error({
                title: 'Error!',
                message: "{{Session::get('error')}}",
                position: 'bottomRight' 
            });
        });
    </script>
    @endif
@endpush
