
  @extends('layouts.panel')
  @section('content')

  <body>
    
  

<form action="{{url('category')}}" method="POST">  
    @csrf
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Category</h1>
    <br>
    <div class="form-raw">
      <div class="form-name">Category Name</div>
      <div class="form-txtfld">
        <input type="text" name="category_name" required>
      </div>
    </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="form-raw">
      <div class="form-name">Active</div>
      <div class="form-txtfld">
        <input type="checkbox" name="status">
      </div>      
      <div class="clear"></div>
    </div>
        
    <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width:290px;">
        <input type="submit" class="btn" value="Submit">
      </div>
    </div>
  </div>
  <div class="clear">&nbsp;</div>
</div>
</form>
<div id="wrap3">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
    <tr>
      <th width="59" align="left" valign="middle">Sr.No.</th>
      <th width="752" align="left" valign="middle">Category Name</th>
      <th width="77" align="left" valign="middle">Status</th>
      <th width="54" align="left" valign="middle">Edit</th>
      <th width="71" align="left" valign="middle">Remove</th>
    </tr>
    
        @foreach($data as $key =>$value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->name}}</td>
            @if($value->status == 1 )
            <td>{{"Active"}}</td>
            @else
            <td>{{"Deactive"}}</td>
            @endif
            <td>
              <form action="{{ url('category_edit', $value->id) }}"
                method="GET">
                <button> 
                    Edit</button>
            </form>
            </td>
            <td>
                <form action="{{ url('category_delete', $value->id) }}"
                method="GET">
                <button> 
                    Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
      
    
  </table>
  <div class="clear">&nbsp;</div>
</div>
@Include('layouts.footer');
</body>

@endsection

 