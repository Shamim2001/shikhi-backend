@extends('backend.layouts.master')

@section('title', 'Create')
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
            <x-page-title page="Add new Course" text="Course"  :route="route('course.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation">
                        @csrf
                        <div class="d-flex justify-content-between gap-4">
                            <div class="flex-1">
                                <div class="position-relative mb-5">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="type here" required>
                                    <div class="mt-3">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="mb-5 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <x-tinymce-editor name="description" ></x-tinymce-editor>
                                    <div class="mt-2">
                                        @error('description')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- requirement -->
                                <div class="mb-5 position-relative">
                                    <label for="requirements" class="form-label">Requirement</label>
                                    <x-tinymce-editor name="requirements" ></x-tinymce-editor>
                                    <div class="mt-2">
                                        @error('requirement')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Audience -->
                                <div class="mb-5 position-relative">
                                    <label for="audience" class="form-label">Audience</label>
                                    <x-tinymce-editor name="audience" ></x-tinymce-editor>
                                    <div class="mt-2">
                                        @error('audience')
                                            <p class="text-denger">{{ $message }}</p>
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
                                                                value="{{ $category->id }}">
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
                                    <div class="">
                                        <input type="file" name="thumbnail" id="thumbnail">
                                    </div>
                                </div>

                                <!-- Visibility -->
                                <div class="col-md-3 position-relative mb-5 visibility_">
                                    <div class="border-bottom text-center ">
                                        <h4 class="text-black">Visibility</h4>
                                    </div>
                                    <!-- Custom Radio Color -->
                                    <div class="form-check form-radio-primary py-2">
                                        <label class="form-check-label" for="active">
                                            <input class="form-check-input" type="radio" name="visibility" id="active"
                                                value="active" checked>
                                            <label for="active">Active</label>
                                        </label>
                                    </div>

                                    <!-- Custom Radio Color -->
                                    <div class="form-check form-radio-primary">
                                        <label class="form-check-label" for="inactive">
                                            <input class="form-check-input" type="radio" name="visibility" id="inactive"
                                                value="inactive" checked>
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
            FilePondPluginImageTransform
        );

        const inputElement = document.querySelector('#thumbnail');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true
        });
    </script>
@endsection
