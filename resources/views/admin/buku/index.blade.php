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
                <h1>Books</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Books</a></div>
                    <div class="breadcrumb-item">Books</div>
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

                @if(Auth::user()->role == 'admin')
                    @if($book->count() == 0)
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Empty Data</h4>
                                </div>
                                <div class="card-body">
                                    <div class="empty-state"
                                        data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>We couldn't find any data</h2>
                                        <p class="lead">
                                            Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                        </p>
                                        <a href="#"
                                            class="btn btn-primary mt-4">Create new One</a>
                                        <a href="#"
                                            class="bb mt-4">Need Help?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Books Table</h4>
                                    <div class="card-header-form">
                                        <form>
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control search"
                                                    placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-green"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table-striped table">
                                                <tr>
                                                    <th>Tittle</th>
                                                    <th>Writter</th>
                                                    <th>Publisher</th>
                                                    <th>Year Publisher</th>
                                                </tr>
                                            @foreach($book as $books)
                                                <tr>
                                                    <td>{{$books->judul}}</td>
                                                    <td>{{$books->penulis}}</td>
                                                    <td>{{$books->penerbit}}</td>
                                                    <td>{{$books->tahun_terbit}}</td>
                                                    <td class="action">
                                                        <a href="" data-toggle="edit" data-target="#exampleModal" class="btn btn-primary mr-2">Edit</a>
                                                        <form action="">
                                                            @csrf
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                
                @elseif(Auth::user()->role == 'user')
                    @if($book->count() == 0)
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Empty Data</h4>
                                </div>
                                <div class="card-body">
                                    <div class="empty-state"
                                        data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>We couldn't find any data</h2>
                                        <p class="lead">
                                            Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                        </p>
                                        <a href="#"
                                            class="btn btn-primary mt-4">Create new One</a>
                                        <a href="#"
                                            class="bb mt-4">Need Help?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        @foreach($book as $books)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image"
                                        data-background="{{ asset('/storage/images/'.$books->gambar) }}">
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">{{$books->judul}}</a></h2>
                                        <h6>{{$books->kategori->nama_kategori}}</h2>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <p>{!! Str::limit($books->sinopsis, 150, ' ...') !!} <a href="">read more</a></p>
                                    <div class="article-cta">
                                        <div class="row">
                                            <form action="{{route('admin.collection.store')}}" method="post" class="col-6">
                                                @csrf
                                                <input type="hidden" name="buku_id" value="{{$books->id}}">
                                                <button type="submit" class="btn btn-primary">
                                                    +Collection
                                                </button>
                                            </form>
                                            <form action="{{route('admin.borrow.store')}}" method="post" class="col-6">
                                                @csrf
                                                <input type="hidden" name="buku_id" value="{{$books->id}}">
                                                <button type="submit" class="btn btn-green" id="toastr-5">
                                                    Borrow
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    @endif
                
                @endif
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
