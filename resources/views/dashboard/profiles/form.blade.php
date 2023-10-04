

<div class="form-group mb-3">
    <label  for ="first_name" >Fisrt Name</label>
    <input type="text" name="first_name" id="first_name"  value=" {{old("first_name",$user->profile->first_name)}}"  class="form-control" >

</div>
@error('first_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-3">
    <label  for ="last_name"  >Last Name</label>
    <input type="text" name="last_name" id="last_name"  value=" {{old("name",$user->profile->last_name)}}"  class="form-control" >

</div>
@error('last_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group mb-3">
    <label  for ="birthday"  >Last Name</label>
    <input type="date" name="birthday" id="birthday"  value=" {{old("birthdate",$user->profile->birthday)}}"  class="form-control" >

</div>

<div class="form-group mb-3">
    <label  for ="country"  >country</label>

{{--    <input type="text" name="country" id="country"  value=" {{old("country",$user->profile->country)}}"  class="form-control" >--}}
            <x-select name="country" :options="$countries" :selected="$user->profile->country">

            </x-select>
</div>


<div class="form-group mb-3">
    <label  for ="gender"  >gender:</label>
    <div>
        <label>
            <input type="radio" name="gender" value="male" @checked( old('gender',$user->profile->gender) == "male") >
                   Mail</label>
        <label>
            <input type="radio" name="gender" value="female" @checked( old('gender',$user->profile->gender) == "female" ) >
            Female</label>
    </div>

    @error('gender')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


</div>

<button type="submit"  class="btn btn-primary" >{{$button_lable ?? 'save'}}</button>
