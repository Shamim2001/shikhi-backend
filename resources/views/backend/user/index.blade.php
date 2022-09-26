@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">user</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="my-3 text-end">
                        <a href="{{ route('user.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Tables Without Borders -->
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Thumbnail</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">User Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Phone</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td >
                                        <img src="{{ $user->thumbnail }}" style="width: 70px"  alt="{{ $user->thumbnail }}">
                                    </td>
                                    <td><a href="{{ route('user.show', $user) }}">{{ $user->name }}</a></td>
                                    <td class="text-center">{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15 justify-content-center">
                                            <a href="{{ route('user.edit', $user) }}" class="link-primary fs-18"><i
                                                    class="ri-edit-fill "></i></a>
                                            <a href="javascript:void(0);" class="link-success fs-18"><i
                                                    class="ri-eye-line "></i></a>
                                            <form action="{{ route('user.destroy', $user) }}" method="post"
                                                onsubmit="return confirm('Do you really want to delete?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="link-danger fs-18"><i
                                                        class="ri-delete-bin-5-line"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>
@endsection
