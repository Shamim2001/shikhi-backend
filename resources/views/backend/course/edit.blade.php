@extends('backend.layouts.master')

@section('title', 'Edit')
@section('css')
    <style>
        .visibility_ {
            width: 100%;
            padding: 180px;
            padding: 1rem;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ced4da;
            box-shadow: 0 7px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 capitalize">Edit Course</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('course.update', $course) }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between gap-4">
                            <div class="flex-1">
                                <div class="position-relative mb-5">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $course->name }}" placeholder="type course name" required>
                                    <div class="">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="mb-5 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <x-tinymce-editor name="description">{!! $course->description !!}</x-tinymce-editor>

                                    <div class="mt-2">
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- requirement -->
                                <div class="mb-5 position-relative">
                                    <label for="requirements" class="form-label">Requirement</label>
                                    <x-tinymce-editor name="requirements">{!! $course->requirements !!}</x-tinymce-editor>

                                    <div class="mt-2">
                                        @error('requirement')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Audience -->
                                <div class="mb-5 position-relative">
                                    <label for="audience" class="form-label">Audience</label>
                                    <x-tinymce-editor name="audience">{!! $course->audience !!}</x-tinymce-editor>
                                    <div class="mt-2">
                                        @error('audience')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 mt-4">

                                <div class="card mb-5">
                                    <div class="card-header text-center">
                                        <h4 class="card-title mb-0 text-black">Category</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="mx-n3">
                                            <div data-simplebar data-simplebar-auto-hide="false"
                                                data-simplebar-track="secondary" style="max-height: 274px;">
                                                <div class="list-group list-group-flush px-4">
                                                    @foreach ($categories as $category)
                                                        <div class="form-check py-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="category_id" id="category_id"
                                                                value="{{ $category->id }}"
                                                                {{ $course->category->id == $category->id ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="category_id">
                                                                {{ $category->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                    <div class="mt-3 text-center">
                                                        <a href="#">Add New Category</a>
                                                    </div>
                                                    <div class="mt-2">
                                                        @error('category_id')
                                                            <p class="text-denger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->

                                <!-- image upload-->
                                <div class="mb-5 position-relative">
                                    <label for="thumbnail" class="form-label" style="font-size: 1rem">Thumbnail</label>
                                    <div class="card">
                                        <input type="file" name="thumbnail" id="thumbnail"
                                            value="{{ $course->thumbnail }}">
                                    </div>
                                </div>

                                <!-- Visibility -->
                                <div
                                    class="col-md-3
                                            position-relative mb-5 visibility_">
                                    <div class="border-bottom text-center ">
                                        <h4 class="text-black">Visibility</h4>
                                    </div>
                                    <!-- Custom Radio Color -->
                                    <div class="form-check form-radio-primary py-2">
                                        <label class="form-check-label" for="active">
                                            <input class="form-check-input" type="radio" name="visibility" id="active"
                                                value="active" {{ $course->visibility == 'active' ? 'checked' : '' }}>
                                            <label for="active">Active</label>
                                        </label>
                                    </div>

                                    <!-- Custom Radio Color -->
                                    <div class="form-check form-radio-primary">
                                        <label class="form-check-label" for="inactive">
                                            <input class="form-check-input" type="radio" name="visibility" id="inactive"
                                                value="inactive" {{ $course->visibility == 'inactive' ? 'checked' : '' }}>
                                            <label for="inactive">Inactive</label>
                                        </label>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary w-100" type="submit">Create</button>
                                    </div>

                                    @error('visibility')
                                        <p class="text-denger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@section('script')
    <script>
        // register the plugins with FilePond
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageTransform,
            FilePondPluginFilePoster,
        );

        const inputElement = document.querySelector('#thumbnail');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true,
            files: [{
                // the server file reference
                source: '{{ rand(12, 1232333) }}',

                // set type to local to indicate an already uploaded file
                options: {
                    type: 'local',

                    // optional stub file information
                    file: {
                        name: '{{ $course->thumbnail }}',
                        size: {{ \File::size(public_path('storage/uploads/course/' . $course->thumbnail)) }},
                        type: 'image/png',
                    },

                    // pass poster property
                    metadata: {
                        poster: '{{ getAssetUrl($course->thumbnail, 'storage/uploads/course') }}',
                    },
                },
            }, ],
        });
    </script>
@endsection
