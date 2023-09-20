@extends('v2.layouts.app')

@section('content')
    <!-- Title
    ============================================= -->
    <section id="page-title" class="page-title-pattern">

        <div class="container clearfix text-white">
            <h1 class="text-white">Blogs</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('v2.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </div>

    </section> <!-- #title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <p class="text-dark">Coming Soon</p>

            </div>
        </div>
    </section> <!-- #content end -->
@endsection