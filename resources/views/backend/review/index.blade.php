@extends('backend.layouts.master')

@section('title', 'Reviews')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <x-page-title page="Reviews" text="Review"  :route="route('review.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="my-3 text-end">
                        <a href="{{ route('review.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Tables Without Borders -->
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Review Star</th>
                                <th scope="col" class="text-center">Content</th>
                                <th scope="col" class="text-center">Student Name</th>
                                <th scope="col" class="text-center">Course Name</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $key => $review)
                                <tr>
                                    <td >{{ ++$key }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('review.show', $review) }}">{{ $review->star }}</a>
                                    </td>
                                    <td class="text-center" style="width: 30%">{!! $review->content !!}</td>
                                    <td class="text-center">{{ optional($review->student)->name }}</td>
                                    <td class="text-center">{{ optional($review->course)->name }}</td>
                                    <td class="text-center">
                                        <div class="hstack gap-3 fs-19 justify-content-center">
                                            <a href="{{ route('review.edit', $review) }}" class="link-primary fs-18"><i
                                                    class="ri-edit-fill "></i></a>
                                            <a href="javascript:void(0);" class="link-success fs-18"><i
                                                    class="ri-eye-line "></i></a>
                                            <form action="{{ route('review.destroy', $review) }}" method="post"
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
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $reviews->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>
@endsection
