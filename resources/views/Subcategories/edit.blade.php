

@extends('layouts.panel')
@section('content')


  <div style="text-align: center">

    <div style="margin-top: 20px;">

    @foreach($data as $key =>$value)
  <form action="{{url('sub_category_update',$value->id)}}">

      <label for="">Category</label>
        <select name="category" class="form-contorl">
             <option>Select </option>
             @foreach($category as $key =>$val)
             
             @if($value->category_id == $val->id)
             
             <option selected value="{{$val->id}}">{{$val->name}}</option>
             @else
             <option value="{{$val->id}}">{{$val->name}}</option>
             @endif
             @endforeach
        </select>
        <br>
    <label style="margin-top:10px;" for="">subcategory</label>
    <input style="margin-top:10px;" class="form-contorl" type="text" id="fname" name="subcategory" value="{{$value->subcategory_name}}"><br>

    <label for="lname">Active</label><br>
    <input type="checkbox" id="lname" name="status" {{$value->status== "1"?'checked':''}} class="form-contorl"><br><br>
    <input class="form-contorl" type="submit" value="Submit">

  </form> 
  @endforeach
  </div>
</div>

  <div class="clear">&nbsp;</div>
</div>
@Include('layouts.footer');

@endsection


