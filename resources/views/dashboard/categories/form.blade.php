

<div class="form-group mb-3">
    <label  for ="name"  >Name</label>
    <input type="text" name="name" id="name"  class="form-control" >
    @error('name')

    @enderror
</div>
<div class="form-group mb-3">
    <label  for ="category_id"  >Category Parent</label>
    <select name="category_id" class="form-control  @error('parent_id') is-invalid @enderror" style="height: calc(2.8rem + 10px)" >
        <OPTION value="">No Parent </OPTION>
        @foreach ($parents as $parent)
            <option value="{{$parent->id}}"> {{$parent->name}} </option>
        @endforeach
    </select>
</div>



<div class="form-group mb-3">
    <label  for ="description"  >Description:</label>
    <textarea name="description"   class="form-control @error("description") is-invalid  @enderror"></textarea>

    @error("description")
    @foreach($errors->get("description") as $fehler)
        <P class="text-danger"> {{$fehler}}</P>
    @endforeach
    @enderror
</div>


<div class="form-group mb-3">
    <label  for ="art_path"  >Image:</label>
    <input type="file" name="art_path" id="image"  class="form-control" >
</div>


<div class="form-group mb-3">
    <label  for ="status"  >Status:</label>
    <div>
        <label>
            <input type="radio" name="status" value="active">
                   Active</label>
        <label>
            <input type="radio" name="status" value="inactive"   >
            inActive</label>
    </div>
</div>

