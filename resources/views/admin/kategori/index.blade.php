@extends('layouts.app')

@section('title', 'Table')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Books</a></div>
                    <div class="breadcrumb-item">Category</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <h2 class="section-title col-6">Table</h2>
                    <div class="button card-header-action dropdown col-6">
                        <a href="#"
                            data-toggle="dropdown"
                            class="btn btn-primary mr-4 dropdown-toggle">Action</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <li class="dropdown-title">Select Action</li>
                            <li>
                                <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Add Category</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">Download PDF</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Category Table</h4>
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
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        @foreach($category as $categories)
                                            <tr>
                                                <td>{{$categories->nama_kategori}}</td>
                                                <td>{{$categories->created_at}}</td>
                                                <td class="action">
                                                    <button data-toggle="modal" data-target="#modalEdit-{{$categories->id}}" class="btn btn-primary mr-2">Edit</button>
                                                    <form action="{{route('admin.category.delete', $categories->id)}}" method="post">
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
            </div>
        </section>
    </div>


    <!-- create modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control" type="text" name="nama_kategori">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="toastr-5">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    @foreach($category as $categories)
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit-{{ $categories->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.update', $categories->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control" type="text" name="nama_kategori" value="{{ $categories->nama_kategori}}">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="toastr-5">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <!-- <script src="{{ asset('js/page/modules-toastr.js') }}"></script> -->

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
@endpush
