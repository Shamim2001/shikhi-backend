@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Courses</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">
                        @csrf
                        <div class="col-md-4 position-relative">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="type course name" required>
                            <div class="">
                                @error('name')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 position-relative">
                            <label for="requirements" class="form-label">Requirements</label>
                            <input type="text" class="form-control" name="requirements" id="requirements"
                                placeholder="type requirement" required>
                            <div class="valid-tooltip">
                                @error('requirements')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="statused" class="form-label">Status</label>
                            <select class="form-select" name="statused" id="statused" required style="width: 340px">
                                <option  disabled value="">select status</option>
                                <option>public</option>
                                <option>privet</option>
                            </select>
                            @error('statused')
                                <p class="text-denger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description"></textarea>
                            <div class="valid-tooltip">
                                @error('description')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="audience" class="form-label">Audience</label>
                            <input type="text" class="form-control" name="audience" id="audience" required>
                            @error('audience')
                                <p class="text-denger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3 position-relative">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id" id="category_id" required>
                                <option disabled>select category</option>
                                <option>wordpress</option>
                                <option>vue</option>
                            </select>
                            <div class="invalid-tooltip">
                                @error('category_id')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="thumbnails" class="form-label">Thumbnail</label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropzone p-0" style="min-height: 0;">
                                        <div class="fallback">
                                            <input name="thumbnail" id="thumbnail" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <h5>Drop files here or click to upload.</h5>
                                        </div>
                                    </div>
                                    <div class="invalid-tooltip">
                                        @error('thumbnail')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                                src="#" alt="Dropzone-Image" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="pt-1">
                                                            <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-3">
                                                        <button data-dz-remove class="btn btn-sm btn-danger"><i
                                                                class="ri-delete-bin-5-line"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end dropzon-preview -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-12 mb-3">
                            <button class="btn btn-primary" type="submit">Create</button>
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
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection
