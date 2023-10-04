

<div class="form-group mb-3">
    <label  for ="product_name"  >Name</label>
    <input type="text" name="product_name" id="product_name"  value=" {{old("name",$product->product_name)}}"  class="form-control" >

</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group mb-3">
    <label  for ="category_id"  >Category Parent</label>
    <select name="category_id" class="form-control" style="height: calc(2.8rem + 10px)" >
        <OPTION value="">Primary Category</OPTION>
        @foreach (\App\Models\Category::all() as $parent)
            <option value="{{$parent->id}}" @if($parent->id == old('category_id',$product->category_id) ) selected  @endif> {{$parent->name}} </option>
        @endforeach
    </select>
</div>
@error('category_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group mb-3">
    <label  for ="description"  >Description:</label>
    <textarea name="description"  value="{{old("description",$product->description)}}"  class="form-control @error("description") is-invalid  @enderror">{{$product->description}}</textarea>

    @error("description")
    @foreach($errors->get("description") as $fehler)
        <P class="text-danger"> {{$fehler}}</P>
    @endforeach
    @enderror
</div>



<div class="form-group mb-3">
    <label  for ="art_path"  >Image:</label>
    <input type="file" name="imag" id="image"  class="form-control" >
</div>
@error('imag')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@if($product->product_image)
    <td><img src="{{asset('uploads/'.$product->product_image)}} " height="50"></td>
@endif


<div class="form-group mb-3">
    <label  for ="price"  >Price</label>
    <input type="text" name="price" id="price"  value=" {{old("price",$product->price)}}"  class="form-control" >

</div>


<div class="form-group mb-3">
    <label  for ="stock"  >stock</label>
    <input type="text" name="stock" id="stock"  value=" {{old("stock",$product->stock)}}"  class="form-control" >

</div>


<div class="form-group mb-3">
    <label  for ="tags" >Tags</label>
    <input type="text" name="tags" id="tags"  value=" {{old("tags",$tags)}}"  class="form-control" >

</div>
<div class="form-group mb-3">
    <label  for ="status"  >Status:</label>
    <div>
        <label>
            <input type="radio" name="status" value="active" @checked( old('status',$product->status) == "active") >
                   Active</label>
        <label>
            <input type="radio" name="status" value="archvied" @checked( old('status',$product->status) == "archvied" ) >
            archvied
        </label>
        <label>
            <input type="radio" name="status" value="draft" @checked( old('status',$product->status) == "draft" ) >
            draft
        </label>
    </div>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


</div>

<button type="submit"  class="btn btn-primary" >{{$button_lable ?? 'save'}}</button>
