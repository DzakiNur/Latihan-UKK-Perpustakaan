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
                <h1>Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <h2 class="section-title col-6">Table</h2>
                    @if(Auth::user()->role == 'admin')
                    <div class="button card-header-action dropdown col-6">
                        <a href="#"
                            data-toggle="dropdown"
                            class="btn btn-primary mr-4 dropdown-toggle">Action</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <li class="dropdown-title">Select Action</li>
                            <li>
                                <a href="{{route('admin.add-user')}}" class="dropdown-item">Add User</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">Download PDF</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>

                @if(Auth::user()->role == 'admin')
                    @if($user->count() == 0)
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
                                    <h4>Users Table</h4>
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
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            @foreach($user as $users)
                                                <tr>
                                                    <td>{{$users->name}}</td>
                                                    <td>{{$users->email}}</td>
                                                    <td>{{$users->alamat}}</td>
                                                    <td>
                                                        @if($users->role == 'user')
                                                        <div class="badge badge-primary">
                                                            {{$users->role}}
                                                        </div>
                                                        @elseif($users->role = 'admin')
                                                        <div class="badge badge-success">
                                                            {{$users->role}}
                                                        </div>
                                                        @else
                                                        <div class="badge badge-warning">
                                                            {{$users->role}}
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td class="action">
                                                        <a href="{{route('admin.user.edit', $users->id)}}" class="btn btn-primary mr-2">Edit</a>
                                                        <form action="{{route('admin.user.delete', $users->id)}}" method="post">
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
