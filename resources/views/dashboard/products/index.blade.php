
@extends("layouts.dashboard")

@section("title","Products")
@section("breadcrumb")
    @parent

    <li class="breadcrumb-item active">{{$product}}</li>
@endsection

@section("content")

    <div class="mb-5 ">
        <a href="{{route('dashboard.products.create')}}" class="btn btn-sm btn-outline-primary">Create</a>

    </div>


    <x-alert  type="crud" />


        <form  action="{{URL::current()}}" method="get" class="d-flex justify-content-between mb-4 ">
            <input class="form-control mr-sm-2" type="search" name="name" placeholder="Search" aria-label="Search" :value="request('name')">
            <select name="status" class="form-control">
                <option value="">All</option>
                <option value="active" @selected(request('active') =="active")>Active</option>
                <option value="inactive" @selected(request('active') =="active")>Inactive</option>
            </select>
            <button class="btn btn-dark mx-2" type="submit">Filter</button>
        </form>


    <table class="table">
        <thead>
        <tr>

            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Store</th>
            <th scope="col">Created At</th>
            <th scope="col" colspan="2" class="align-content-between">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td><img src="{{asset('uploads/'.$product->product_image)}} " height="50"></td>
            <td>{{$product->category->name}}</td>

{{--            <td>{{$product->stores()->first() == null ? "no store" : $product->stores()->first()->store_id}}</td>--}}
            <td>

                <select name="category_id" class="form-control"  >
                    @if($product->stores()->first() == null)

                        <option value="">   {{"no store"}}</option>>
                    @else

                        @foreach ($product->stores as $productwithstore)
                            <option value="{{$productwithstore->store_id}}"> {{\App\Models\Product::getstorename($productwithstore->store_id)->first()->name}} </option>
                        @endforeach
                    @endif

                </select>
            </td>
            <td>{{$product->created_at}}</td>

            <td>
                <a href="{{route("dashboard.products.edit",$product->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>

        @empty
            <tr>
                <th scope="col">No categories defined</th>
            </tr>
        @endforelse


        </tbody>
    </table>
    {{$products->links()}}
{{--    <x-nav-paginate number1="1" number2="2"/>--}}
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
