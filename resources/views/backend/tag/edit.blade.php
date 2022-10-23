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
            <x-page-title page="Add New Tags" text="Tag"  :route="route('tag.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('tag.update', $tag) }}" method="POST" enctype="multipart/form-data"
                        class="row needs-validation">
                        @csrf
                        @method('PUT')
                        <div class="d-flex align-items-center gap-4">
                            <div class="position-relative w-75">
                                <label for="name" class="form-label">Tag Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}"
                                    placeholder="type here" required>
                                <div class="">
                                    @error('name')
                                        <p class="text-denger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

