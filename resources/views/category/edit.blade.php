@extends('layouts.panel')
@section('content')
<body>
  <div style="text-align: center">

    @foreach($catdata as $key =>$value)
  <form action="{{url('category_update',$value->id)}}">
    
    <label for="fname">Company</label><br>
    <input class="form-contorl" type="text" id="fname" name="name" value="{{$value->name}}"><br>
    <label for="lname">Active</label><br>
    <input type="checkbox" id="lname" name="status"  {{$value->status=="1"?'checked':''}} class="form-contorl"><br><br>
    <input type="submit" value="Submit">
    
  </form> 
  @endforeach
  </div>
  

  <div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>

@Include('layouts.footer')

</body>

@endsection

