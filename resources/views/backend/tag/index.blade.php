@extends('backend.layouts.master')

@section('title', 'Tags')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <x-page-title page="Tags" text="Tag"  :route="route('tag.index')" index="index" />
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
                                <th scope="col" class="text-center">Course</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $key=>$tag)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{!! $tag->name !!}</td>
                                    <td class="text-center">{{ $tag->slug }}</td>
                                    <td class="text-center">{{ $tag->course_id }}</td>
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
