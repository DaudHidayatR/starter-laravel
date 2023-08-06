@extends('layouts.blank_page')

@section('title','user list')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Users</h2>
            <p class="section-lead">
                Manage your user here
            </p>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <form method="GET" action="{{route('users.index')}}">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                {{$users->firstItem() + $loop->index}}
                                            </div>
                                        </td>
                                        <td>
                                            {{$user->name}}
                                        </td>

                                        <td>
                                           {{$user->email}}
                                        </td>
                                        <td>
                                           {{$user->phone}}
                                        </td>
                                        <td>
                                            @if($user->email_verified_at != null)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-warning">Pending</div>

                                            @endif

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center p-5">
                                            Data not found
                                        </td>
                                @endforelse

                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    {{$users->withQueryString()->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('sidebar')
    @parent
    <li class="menu-header">Starter</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Layout</span></a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="layout-default.html">Default Layout</a>
            </li>
            <li>
                <a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a>
            </li>
            <li>
                <a class="nav-link" href="layout-top-navigation.html">Top Navigation</a>
            </li>
        </ul>
    </li>
@endsection
