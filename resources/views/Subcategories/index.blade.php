
@extends('layouts.panel')
  @section('content')

  <body>
<form action="{{url('addSubCategory')}}" method="POST">
    @csrf
  <div id="wrap">
    <div class="clear" style="height:5px;"></div>
    <div id="wrap2">
      <h1>Add Sub Category</h1>
      <br>
  
      <div class="form-raw">
        <div class="form-name">Select Category</div>
        <div class="form-txtfld">
          <select name="category">
               <option>Select Option</option>
               @foreach($category as $key =>$value)
               <option value="{{$value->id}}">{{$value->name}}</option>
               @endforeach
          </select>
        </div>
      </div>
        <div class="clear"></div>
  
      <div class="form-raw">
        <div class="form-name">Add Sub Category</div>
        <div class="form-txtfld">
          <input type="text" name="subcategory">
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

</form>
    <div class="clear">&nbsp;</div>
  </div>
  <div id="wrap3">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
      <tr>
        <th width="59" align="left" valign="middle">Sr.No.</th>
        <th width="752" align="left" valign="middle">Category Name</th>
         <th width="752" align="left" valign="middle">Sub Category Name</th>
        <th width="77" align="left" valign="middle">Status</th>
        <th width="54" align="left" valign="middle">Edit</th>
        <th width="71" align="left" valign="middle">Remove</th>
      </tr>
      
        @foreach($data as $key =>$value)
        <tr>
        <td>{{$key+1}}</td>
        <td>{{$value->categrory_name}}</td>
        <td>{{$value->subcategory_name}}</td>

        @if($value->status == 1 )
            <td>{{"Active"}}</td>
            @else
            <td>{{"Deactive"}}</td>
            @endif
        <td>
          <form action="{{ url('sub_category_edit', $value->id) }}"
            method="GET">
            <button> 
                Edit</button>
        </form>
        </td>
        <td>
            <form action="{{ url('sub_category_del', $value->id) }}"
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
  <div class="clear"></div>
  @Include('layouts.footer');
  
  </body>

  @endsection
