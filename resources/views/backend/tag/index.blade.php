@extends('backend.layouts.master')

@section('title', 'Tags')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tags</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Tags</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="my-3 text-end">
                        <a href="{{ route('tag.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Tables Without Borders -->
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">slug</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $key=>$tag)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{!! $tag->name !!}</td>
                                    <td class="text-center">{{ $tag->slug }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-19 justify-content-center">
                                            <a href="{{ route('tag.edit', $tag) }}" class="link-primary"><i
                                                    class="ri-edit-fill "></i></a>

                                            <form action="{{ route('tag.destroy', $tag) }}" method="post"
                                                onsubmit="return confirm('Do you really want to delete?');">
                                                @csrf
                                                @method('DELETE')

                                                <button style="border: none;" type="submit" class="link-danger"><i
                                                        class="ri-delete-bin-5-line"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-danger">Tags Not Found!</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $tags->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>>
@endsection
