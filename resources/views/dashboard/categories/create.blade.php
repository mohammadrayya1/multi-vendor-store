
@extends("layouts.dashboard")

@section("title","create new Category")
@section("breadcrumb")
@parent
<li class="breadcrumb-item active">{{$Createcategory}}</li>
@endsection

@section("content")

    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('dashboard.categories.form')

        <button type="submit"  class="btn btn-primary" >save</button>
    </form>


@endsection

@push("style")
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Starter</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

@endpush



@push("script")
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
@endpush
