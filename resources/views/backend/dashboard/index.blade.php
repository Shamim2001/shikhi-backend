@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <x-page-title page="Dashboard" text="Dashboard" :route="route('dashboard.index')" index="index" />
        <!-- end page title -->

    </div>
    <!-- container-fluid -->
</div>
@endsection