


@extends('layouts.panel')
@section('content')
    <div id="wrap">
        @if (Session::has('success'))
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-sm-8">
                    <h3 style="color: forestgreen; text-align: center">Password Change Successfully</h3>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-sm-6">
                    <h3 style="color: red; text-align: center">Your current password does not matches with the password
                        you provided. Please try again</h3>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-sm-6">
                    <h3 style="color: red; text-align: center"> Password not Matched</h3>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        @endif
        <section class="bodymain" style="min-height:580px;">
            <aside class="middle-container">
                <div class="admin-inr"><br>
                    <form action="{{ url('update_password') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outer" style="margin-left:320px; width:500px;">
                            <h1>Change Password</h1>
                            <div class="contact-row">
                                <div class="name">Current Password</div>
                                <div class="txtfld-box">
                                    <input type="text" name="current_password" autocomplete="off" required>
                                </div>
                                <div class="req-field"> This Field Required </div>
                            </div>
                            <div class="clear"></div>
                            <div class="contact-row">
                                <div class="name">New Password</div>
                                <div class="txtfld-box">
                                    <input type="text" name="new_password" id="new_password" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="contact-row">
                                <div class="name">Confirm Password</div>
                                <div class="txtfld-box">
                                    <input type="password" name="cpassword" id="cpassword" autocomplete="off" required>
                                </div>
                                <p id="msg"></p>
                            </div>
                            <div class="clear">&nbsp;</div>
                            <div class="contact-row">
                                <div class="name" style="float:right; width:1px;">&nbsp;</div>
                                <div style="background:none; border:none; float:left;">
                                    <input type="submit" class="btn" value="Change Password">
                                    <br>
                                </div>
                    </form>
                </div>
    </div>
    <div class="clear">&nbsp;</div>
    <div class="clear"></div>
    </div>
    </aside>
    <div class="clear"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </section>
    </div>
    <div class="clear"></div>
    
@Include('layouts.footer')


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $('#cpassword').keyup(function(e) {

            var pas1 = $('#new_password').val();
            var pas2 = $('#cpassword').val();
            if (pas1 == pas2) {
                $('#msg').html("matched").css('color', 'green');
            } else {
                $('#msg').html("password not matched").css('color', 'red');
            }
        });
    </script>


@endsection