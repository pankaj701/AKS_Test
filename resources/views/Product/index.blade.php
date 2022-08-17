@extends('layouts.panel') @section('content') {{--
<script src="{{ asset('plugins/plugin.js') }}"></script>
--}}

<body>
    @if(Session::has('success'))
    <style>
        #dsa {
            background-color: greenyellow;
            opacity: 50%;
            overflow: visible;
            position: sticky;
        }
    </style>

    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5" id="dsa">
            <h6 style="text-align: center; color: green">
                Upated successfully
            </h6>
        </div>
    </div>
    @endif

    <div id="wrap">
        <form
            action="{{ url('product_store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="sadf"
        >
            @csrf
            <div class="clear" style="height: 5px"></div>
            <div id="wrap2">
                <h1>Add Product</h1>
                <br />

                {{-- @if({{Session::has('message')}})

                <div>
                    <h3 style="color: greenyellow">Inserted Successfully</h3>
                </div>
                @endif --}}
                <div class="form-raw">
                    <div class="form-name">Select Category</div>
                    <div class="form-txtfld">
                        <select
                            name="category"
                            onchange="myFunction(this.value)"
                        >
                            <option value="">--Select--</option>
                            @foreach ($category as $key => $value)
                            <option value="{{ $value->id }}">
                                {{ $value->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-raw">
                    <div class="form-name">Select Sub Category</div>
                    <div class="form-txtfld">
                        <select
                            multiple="multiple"
                            style="height: 100px"
                            id="subcat"
                            name="subcategory[]"
                            required
                        ></select>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-raw">
                    <div class="form-name">Product Name</div>
                    <div class="form-txtfld">
                        <input type="text" name="product_name" />
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-name">Product Image1</div>
                {{--
                <div class="form-txtfld">
                    --}}
                    <input
                        type="file"
                        name="photo"
                        id="photo"
                        accept="image/png, image/gif, image/jpeg"
                    />
                    <div class="form-name">
                        Image Size ( Width=560px, Height=390px ) (Product page)
                    </div>
                    {{--
                </div>
                --}}
            </div>
            <div class="form-raw" style="width: 100%">
                <div class="form-name">Short Description</div>
                <div class="form-txtfld">
                    <textarea
                        id="short_description"
                        name="short_description"
                    ></textarea>
                </div>
            </div>
            <div class="clear"></div>
            <h1
                style="
                    border-bottom: 1px solid #ccc;
                    padding-bottom: 10px;
                    margin: 20px 0 0px 0;
                "
            >
                Description
            </h1>
            <br />
            <div id="">
                <div class="form-raw">
                    <div class="form-name">Title</div>
                    <div class="form-txtfld">
                        <input type="text" name="title[]" required />
                    </div>
                </div>
                <div class="form-raw" id="apeedi">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld txtfld50">
                        <input
                            type="text"
                            placeholder="heading"
                            name="heading[]"
                            required
                        />
                    </div>
                    <div class="form-txtfld txtfld50">
                        <input
                            type="text"
                            placeholder="desciption"
                            name="description[]"
                            required
                        />
                    </div>
                    <a href="#"><img src="images/delete.gif" alt="" /></a>
                    <div class="form-raw">
                        <div class="form-name">&nbsp;</div>
                        <div
                            class="form-txtfld"
                            style="width: 320px; text-align: right"
                        >
                            <a href="javascript:show_more_menu()">Add More +</a>
                            {{--
                            <button type="button" onclick="show_more_menu()">
                                Add More
                            </button>
                            --}}
                        </div>
                    </div>
                </div>
                <!--  <div class="form-raw">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld txtfld50"><input type="text" placeholder="heading"></div>
                    <div class="form-txtfld txtfld50"><input type="text" placeholder="desciption"></div>
                    <a href="#"><img src="images/delete.gif" alt=""></a>
                </div> -->
                <div class="clear"></div>
                <h1
                    style="
                        border-bottom: 1px solid #ccc;
                        padding-bottom: 10px;
                        margin: 20px 0 0px 0;
                    "
                >
                    Features
                </h1>
                <br />
                <div class="form-raw" style="width: 100%">
                    <div class="form-name">Content</div>
                    <div class="form-txtfld" style="width: 780px">
                        <textarea
                            id="txtcontainer"
                            style="width: 100%; height: 500px"
                            name="txtcontainer"
                        ></textarea>
                    </div>
                </div>
                <div class="clear"></div>
                <h1
                    style="
                        border-bottom: 1px solid #ccc;
                        padding-bottom: 10px;
                        margin: 20px 0 0px 0;
                    "
                >
                    Upload PDF
                </h1>
                <br />
                <div class="form-raw" id="sad">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld txtfld50">
                        <input
                            type="text"
                            placeholder="PDF heading"
                            name="pdfheading[]"
                        />
                    </div>
                    <div class="form-txtfld txtfld50">
                        <input
                            type="file"
                            placeholder="desciption"
                            name="pdf[]"
                        />
                    </div>

                    <div class="form-raw">
                        <div class="form-name">&nbsp;</div>
                        <div
                            class="form-txtfld"
                            style="width: 320px; text-align: right"
                        >
                            <a href="javascript:addpdf()">Add More +</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-raw">
                    <div class="form-name">Active</div>
                    <div class="form-txtfld">
                        <input type="checkbox" name="status" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="form-raw">
                    <div class="form-name">&nbsp;</div>
                    <div class="form-txtfld">
                        <input type="submit" class="btn" value="Submit" />
                    </div>
                </div>
            </div>
            <div class="clear">&nbsp;</div>
        </form>
    </div>
    <div id="wrap2">
        <table
            width="100%"
            border="0"
            cellspacing="0"
            cellpadding="0"
            class="admintable"
        >
            <tr>
                <th width="53" align="left" valign="middle">Sr.No.</th>
                <th width="153" align="left" valign="middle">Category</th>
                <th width="71" align="left" valign="middle">SubCategory</th>
                <th width="71" align="left" valign="middle">Product Name</th>
                <th width="408" align="left" valign="middle">
                    Short Description
                </th>
                <th width=" " align="left" valign="middle">Full Description</th>
                <th width="49" align="left" valign="middle">Status</th>
                <th width="49" align="left" valign="middle">Edit</th>
                <th width="61" align="left" valign="middle">Remove</th>
            </tr>
            @foreach($data as $key=>$value)
            <?php
                            $cat_id =[];
                            $subcat = [];
                            $subname =[];
                            foreach($data as $k =>$v){ $cat_id =
            $v->subcategory_id; } $subid = explode(',',$cat_id); //
            $id = enCrypt($value->id); ?>
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{$value->category_name}}</td>
                <td>{{$value->subcategory_name}}</td>
                <td>{{$value->product_name}}</td>
                <td>{!! $value->short_description!!}</td>
                <td>{!! $value->txtcontainer !!}</td>
                @if($value->status==1)
                <td>Active</td>
                @else
                <td>Deactive</td>
                @endif
                <td>
                    <form action="{{ url('product_edit', $id) }}" method="GET">
                        <button>Edit</button>
                    </form>
                </td>
                <td>
                    <form
                        action="{{ url('product_delete', $id) }}"
                        method="GET"
                    >
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="clear">&nbsp;</div>
    </div>
    @Include('layouts.footer');
</body>

<script>
    CKEDITOR.replace("short_description", {
        extraPlugins: "uploadimage",
        uploadUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json",

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        filebrowserBrowseUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html",
        filebrowserImageBrowseUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html?type=Images",
        filebrowserUploadUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files",
        filebrowserImageUploadUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images",
    });
</script>

<script>
    CKEDITOR.replace("txtcontainer", {
        extraPlugins: "uploadimage",
        uploadUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json",

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        filebrowserBrowseUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html",
        filebrowserImageBrowseUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.html?type=Images",
        filebrowserUploadUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files",
        filebrowserImageUploadUrl:
            "https://ckeditor.com/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images",
    });
</script>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>

<script>
    function myFunction(id) {
        $("#subcat").html("");
        $.ajax({
            type: "get",
            url: "dependent",
            data: {
                id: id,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $.each(data, function (indexInArray, valueOfElement) {
                    $.each(valueOfElement, function (key, value) {
                        var data = `<option value='${value.id}'>${value.subcategory_name}</option>`;
                        $("#subcat").append(data);
                    });
                });
            },
        });
    }
</script>
{{-- for data apppend --}}
<script>
    var count = 0;

    function show_more_menu() {
        // console.log("hello");
        count += 1;
        $data = `<div id='sadf${count}'>
            <div class=form-raw>
                <div class="form-name">Title ${count}</div>
                <div class="form-txtfld">
                    <input type="text" name='title[]'>
                </div>
            </div>
            <div class="form-raw" id="">
                <div class="form-name">&nbsp;</div>
                <div class="form-txtfld txtfld50">
                    <input type="text" placeholder="heading" name='heading[]' > </div>
                <div class="form-txtfld txtfld50"><input type='text' placeholder='desciption' name='description[]' ></div>
                <a href="#"><img src="images/delete.gif" alt=""></a>
                    <div class="form-raw">
                        <div class="form-name">&nbsp;</div>
                        <div class="form-txtfld" style="width: 320px; text-align: right;">
                            <a href="javascript:remove(${count})">Remove -</a>
                        </div>
                    </div>
        </div>`;
        $("#apeedi").append($data);
    }
    function remove(id) {
        console.log(id);
        $("#sadf" + id).remove();
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
        $("#sad").append($data);
    }
    function rpdf(id) {
        $("#sad" + id).remove();
    }
</script>

<script>
    $(document).ready(function () {
        setTimeout(() => {
            const box = document.getElementById("dsa");
            box.style.visibility = "hidden";
        }, 5000);
    });
</script>

@endsection
