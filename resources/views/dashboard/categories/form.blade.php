

<div class="form-group mb-3">
    <label  for ="name"  >Name</label>
    <input type="text" name="name" id="name"  value=" {{old("name",$category->name)}}"  class="form-control" >

</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group mb-3">
    <label  for ="category_id"  >Category Parent</label>
    <select name="category_id" class="form-control  @error('parent_id') is-invalid @enderror" style="height: calc(2.8rem + 10px)" >
        <OPTION value="">No Parent </OPTION>
        @foreach ($parents as $parent)
            <option value="{{$parent->id}}" @if($parent->id == old('category_id',$category->category_id) ) selected  @endif> {{$parent->name}} </option>
        @endforeach
    </select>
</div>
@error('category_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group mb-3">
    <label  for ="description"  >Description:</label>
    <textarea name="description"  value="{{old("description",$category->description)}}"  class="form-control @error("description") is-invalid  @enderror"></textarea>

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
@if($category->imag)
    <td><img src="{{asset('uploads/'.$category->imag)}} " height="50"></td>
@endif

<div class="form-group mb-3">
    <label  for ="status"  >Status:</label>
    <div>
        <label>
            <input type="radio" name="status" value="active" @checked( old('status',$category->status)=="active") >
                   Active</label>
        <label>
            <input type="radio" name="status" value="inactive" @checked( old('status',$category->status) =="inactive" ) >
            inActive</label>
    </div>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


</div>

<button type="submit"  class="btn btn-primary" >{{$button_lable ?? 'save'}}</button>
