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


                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4 position-relative">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="type course name" required>
                            <div class="valid-tooltip">
                                @error('name')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="requirements" class="form-label">Requirements</label>
                            <input type="text" class="form-control" id="requirements" value="Otto" required>
                            <div class="valid-tooltip">
                                @error('requirements')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="audience" class="form-label">Audience</label>
                            <input type="text" class="form-control" id="audience" required>
                            @error('audience')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="validationTooltip04" class="form-label">Status</label>
                            <select class="form-select" id="validationTooltip04" required>
                                <option selected disabled value="">select status</option>
                                <option>public</option>
                                <option>privet</option>
                            </select>
                            @error('validationTooltip04')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" required>
                                <option selected disabled value="">select category</option>
                                <option>wordpress</option>
                                <option>vue</option>
                            </select>
                            <div class="invalid-tooltip">
                                @error('category')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>




                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
