@extends('layouts.panel')
@section('content')
    <div id="wrap">
        @foreach($data as $key1 =>$val1)
        <?php
                        $cat_id =[];
                        $subcat = [];
                        foreach($data as $k =>$v){
                            $cat_id = $v->subcategory_id;
                        }
                        $subid = explode(',',$cat_id);
                     ?>
        <form action="{{url('product_update',$val1->id)}}" method="POST" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="clear" style="height:5px;"></div>
            <div id="wrap2">
                <h1>Edit Product</h1>
                <br>
                {{-- @if({{Session::has('message')}})

                <div>
                    <h3 style="color: greenyellow">Inserted Successfully</h3>
                </div>
                @endif --}}
                <div class="form-raw">
                    <div class="form-name">Select Category</div>
                    <div class="form-txtfld">
                        <select name="category" onchange="myFunction(this.value)">
                            <option value="">select</option>
                            @foreach ($category as $key => $value)
                            @if($val1->category_id == $value->id)
                            <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                            @else
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-raw">
                    <div class="form-name">Select Sub Category</div>
                    <div class="form-txtfld">
                        <select multiple="multiple" style="height: 100px;" id="subcat" name="subcategory[]" required>
                            @foreach($multiple as $keydata =>$valdata)
                            @if(in_array($valdata->id,$subid))
                            <option selected value="{{$valdata->id}}">{{$valdata->subcategory_name}}</option>
                            @else
                            <option value="{{$valdata->id}}">{{$valdata->subcategory_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-raw">
                    <div class="form-name">Product Name</div>
                    <div class="form-txtfld">
                        <input type="text" name="product_name" value="{{$val1->product_name}}">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-name">Product Image</div>
                    <input type="file" name="photo" id="photo" accept="image/png, image/gif, image/jpeg">
                    <div class="form-name"> Image Size ( Width=560px, Height=390px ) (Product page)</div>
                    @if(!empty($val1->image))
                    <a href="{{asset('images/'.$val1->image)}}" target="_blank">view</a>
                    @else
                    @endif
                 
            </div>
            <div class="form-raw" style="width:100%;">
                <div class="form-name">Short Description</div>
                <div class="form-txtfld">
                    <textarea name="short_description">{!!$val1->short_description!!}</textarea>
                </div>
            </div>
            <div class="clear"></div>
            <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Description</h1>
            <br>

            
            {{-- <div class="form-raw">
                <div class="form-name">Title</div>
                <div class="form-txtfld">
                    <input type="text" name="title[]" required value="{{$val1->title}}">
                </div>
            </div>
            <div class="form-raw" id="apeedi">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld txtfld50"><input type="text" placeholder="heading" name="heading[]" required
                        value="{{$val1->heading}}"></div>
                <div class="form-txtfld txtfld50"><input type="text" placeholder="desciption" name="description[]"
                        required value="{!!$val1->description!!}">
                </div>
                <a href="#"><img src="images/delete.gif" alt=""></a>
                <div class="form-raw">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld" style="width: 320px; text-align: right;">
                        <a href="javascript:show_more_menu()">Add More +</a>
                    </div>
                </div>
            </div> --}}

            {{-- asdf --}}

            @if(!empty($description))
            <div id="apeedi">
            @foreach($description as $kkk  => $vvv)
            <div class="form-raw">
            <div class="form-name">Title</div>
            <div class="form-txtfld">
                <input type="text" name="title[]" required value="{{$vvv->title}}">
            </div>
        </div>
        <div class="form-raw">
            <div class="form-name">&nbsp;</div>
            <div class="form-txtfld txtfld50"><input type="text" placeholder="heading" name="heading[]" required
                    value="{{$vvv->heading}}"></div>
            <div class="form-txtfld txtfld50"><input type="text" placeholder="desciption" name="description[]"
                    required value="{{$vvv->description}}">
            </div>
            <a href="#"><img src="images/delete.gif" alt=""></a>
            <div class="form-raw">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld" style="width: 320px; text-align: right;">
                    <a href="javascript:show_more_menu()">Add More +</a>
                </div>
            </div>
        </div>

            @endforeach
        </div>
            @else

          <div class="form-raw">
                <div class="form-name">Title</div>
                <div class="form-txtfld">
                    <input type="text" name="title[]" required value="{{$val1->title}}">
                </div>
            </div>
            <div class="form-raw" id="apeedi">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld txtfld50"><input type="text" placeholder="heading" name="heading[]" required
                        value="{{$val1->heading}}"></div>
                <div class="form-txtfld txtfld50"><input type="text" placeholder="desciption" name="description[]"
                        required value="{!!$val1->description!!}">
                </div>
                <a href="#"><img src="images/delete.gif" alt=""></a>
                <div class="form-raw">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld" style="width: 320px; text-align: right;">
                        <a href="javascript:show_more_menu()">Add More +</a>
                    </div>
                </div>
            </div>
            @endif

            <div class="clear"></div>
            <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Features</h1>
            <br>
            <div class="form-raw" style="width:100%;">
                <div class="form-name">Content</div>
                <div class="form-txtfld" style="width:780px;">
                    <textarea style="width:100%; height:500px;" name="txtcontainer">{!!$val1->txtcontainer!!}</textarea>
                </div>
            </div>
            <div class="clear"></div>
            <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Upload PDF</h1>
            <br>

            @if(!empty($pdfss))
            <div id="sad">
            @foreach($pdfss as $pdf_key =>$pdf_val)
            <div class="form-raw" >
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld txtfld50"><input type="text" placeholder="PDF heading" name="pdfheading[]"
                        value="{{$pdf_val->pdf_heading}}">

                        @if(!empty($pdf_val->pdf))
                        <a style="margin-left: 290px;" href="{{asset('pdf/'.$pdf_val->pdf) }}"  target="_blank">View</a>
                        @else
                        @endif
                </div>
                <div class="form-txtfld txtfld50"><input type="file" placeholder="desciption" name="pdf[]"></div>

                <div class="form-raw">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="javascript:addpdf()">Add
                            More +</a></div>
                </div>
            </div>

            @endforeach
        </div>
            @else

              <div class="form-raw" id="sad">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld txtfld50"><input type="text" placeholder="PDF heading" name="pdfheading[]"
                        value="">
                </div>
                <div class="form-txtfld txtfld50"><input type="file" placeholder="desciption" name="pdf[]"></div>

                <div class="form-raw">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="javascript:addpdf()">Add
                            More +</a></div>
                </div>
            </div>
            @endif


            <div class="clear"></div>
            <div class="form-raw">
                <div class="form-name">Active</div>
                <div class="form-txtfld">
                    <input type="checkbox" name="status" {{!empty($val1->status)?'checked':''}}>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="form-raw">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld">
                    <input type="submit" class="btn" value="Submit">
                </div>
            </div>
            @endforeach
        </form>
    </div>
    <div class="clear">&nbsp;</div>
    </div>
    
    @Include('layouts.footer')
 
</body>

<script>
    CKEDITOR.replace('short_description',{
      extraPlugins: 'uploadimage',
      uploadUrl:      'https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html',
      filebrowserImageBrowseUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
      filebrowserUploadUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
</script>
<script>
    CKEDITOR.replace('txtcontainer',{
      extraPlugins: 'uploadimage',
      uploadUrl:      'https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html',
      filebrowserImageBrowseUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
      filebrowserUploadUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl:'https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    // $(document).ready(function () {
    function myFunction(id) {

        $('#subcat').html('');

        $.ajax({
            type: 'get',
            url: "{{ url('dependent') }}",
            data: {
                'id': id
            },
            dataType: "json",
            success: function (data) {

                console.log(data);
                $.each(data, function (indexInArray, valueOfElement) {
                    $.each(valueOfElement, function (key, value) {
                        var data = `<option value='${value.id}'>${value.subcategory_name}</option>`
                        $('#subcat').append(data);

                    });


                });
            }
        });

    }


    $('#photo').change(function (e) {

        $('#sdaf').html('');

    });


    // });
</script>

<script>

    var count = 0;

    function show_more_menu() {
        // console.log("hello");
        count += 1;
        $data = `<div id='sadf${count}'>
            <div class=form-raw>
                <div class="form-name">Title</div>
                <div class="form-txtfld">
                    <input type="text" name='title[]'>
                </div>
            </div>
            <div class="form-raw" id="">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld txtfld50">
                    <input type="text" placeholder="heading" name='heading[]' > </div>
                <div class="form-txtfld txtfld50"><input type='text' placeholder='description' name='description[]' ></div>
                <a href="#"><img src="images/delete.gif" alt=""></a>
                    <div class="form-raw">
                        <div class="form-name">&nbsp;</div>
                        <div class="form-txtfld" style="width: 320px; text-align: right;">
                            <a href="javascript:remove(${count})">Remove -</a>
                        </div>
                    </div>
        </div>`;
        $('#apeedi').append($data);
    }
    function remove(id) {
        console.log(id);
        $('#sadf' + id).remove();
    }
</script>
{{-- append for pdf --}}

<script>
    function addpdf() {
        count += 1;

        $data = `<div class="form-raw" id="sad${count}">
            <div class="form-name">&nbsp;</div>
            <div class="form-txtfld txtfld50"><input type="text" placeholder="PDF heading" name="pdfheading[]"></div>
            <div class="form-txtfld txtfld50"><input type="file" placeholder="desciption" name="pdf[]"></div>
            <div class="form-raw">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="javascript:rpdf(${count})">Remove -</a></div>
            </div>
       </div>`;

        $('#sad').append($data);
    }

    function rpdf(id) {
        $('#sad' + id).remove();
    }


</script>

@endsection