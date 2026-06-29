@extends('coresdk::layouts.page',['mainTitle'=>'Account'])
@section('content')
@push('scripts')
<script language="javascript">
function UPDATE_PROFILE()
{
    var error = false;
    $("#submit_profile").attr("disabled", true);
    $('#submit_profile').html('<i class="fa fa-spinner fa-spin"></i>');
    var input = ["name"];
    
    $.each(input, function( index, value ) {
        $('#'+ value).removeClass('is-invalid');
        $('#span-'+ value).remove();
    });
    
    
    $.ajax({
        data: {
            "_token": $("meta[name=csrf-token]").attr("content"),
            "name": $('#name').val(),
            "action": 'profile',
        },
        type: 'PUT',
        url: '{{ route('route_coresdk_account.update',$user->id) }}'
        }).done(function( data ) {
            
            if(data.id=="1")
            {
                    $("#result_profile").empty().append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> '+ data.message +'!</div>').hide().fadeIn();
                    $("#submit_profile").attr("disabled", false);
                    $('#submit_profile').html('<i class="fa fa-save"></i> {{ __('Save') }}');
            }
            else
            {
                $.each( data, function( index, value ) {
                    $('#'+ index).addClass('is-invalid');
                        if(value!="")
                        {
                            $('#'+ index).after('<span id="span-'+ index  +'" class="invalid-feedback" role="alert"><strong>'+ value +'</strong></span>');
                        }
                    });
                $("#submit_profile").attr("disabled", false);
                $('#submit_profile').html('<i class="fa fa-save"></i> {{ __('Save') }}');
            }
        });
    
    
    return false;
}
</script>

<script language="javascript">
function UPDATE_EMAIL()
{
    var error = false;
    $("#submit_email").attr("disabled", true);
    $('#submit_email').html('<i class="fa fa-spinner fa-spin"></i>');
    var input = ["new_email","password"];
    
    $.each(input, function( index, value ) {
        $('#'+ value).removeClass('is-invalid');
        $('#span-'+ value).remove();
    });
    
    
    $.ajax({
        data: {
            "_token": $("meta[name=csrf-token]").attr("content"),
            "new_email": $('#new_email').val(),
            "password": $('#password').val(),
            "action": 'email',
        },
        type: 'PUT',
        url: '{{ route('route_coresdk_account.update',$user->id) }}'
        }).done(function( data ) {
            
            if(data.id=="1")
            {
                    $("#result_email").empty().append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> '+ data.message +'!</div>').hide().fadeIn();
                    $("#submit_email").attr("disabled", false);
                    $('#submit_email').html('<i class="fa fa-save"></i> {{ __('Save') }}');
            }
            else
            {
                $.each( data, function( index, value ) {
                    $('#'+ index).addClass('is-invalid');
                        if(value!="")
                        {
                            $('#'+ index).after('<span id="span-'+ index  +'" class="invalid-feedback" role="alert"><strong>'+ value +'</strong></span>');
                        }
                    });
                $("#submit_email").attr("disabled", false);
                $('#submit_email').html('<i class="fa fa-save"></i> {{ __('Save') }}');
            }
        });
    
    
    return false;
}
</script>

<script language="javascript">
function UPDATE_PASSWORD()
{
    var error = false;
    $("#submit_password").attr("disabled", true);
    $('#submit_password').html('<i class="fa fa-spinner fa-spin"></i>');
    var input = ["current_password","new_password","password_confirmation"];
    
    $.each(input, function( index, value ) {
        $('#'+ value).removeClass('is-invalid');
        $('#span-'+ value).remove();
    });
    
    
    $.ajax({
        data: {
            "_token": $("meta[name=csrf-token]").attr("content"),
            "current_password": $('#current_password').val(),
            "new_password": $('#new_password').val(),
            "password_confirmation": $('#password_confirmation').val(),
            "action": 'password',
        },
        type: 'PUT',
        url: '{{ route('route_coresdk_account.update',$user->id) }}'
        }).done(function( data ) {
            
            if(data.id=="1")
            {
                    $("#result_password").empty().append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> '+ data.message +'!</div>').hide().fadeIn();
                    $("#current_password").val('');
                    $("#new_password").val('');
                    $("#password_confirmation").val('');
                    $("#submit_password").attr("disabled", false);
                    $('#submit_password').html('<i class="fa fa-save"></i> {{ __('Save') }}');
            }
            else
            {
                $.each( data, function( index, value ) {
                    $('#'+ index).addClass('is-invalid');
                        if(value!="")
                        {
                            $('#'+ index).after('<span id="span-'+ index  +'" class="invalid-feedback" role="alert"><strong>'+ value +'</strong></span>');
                        }
                    });
                $("#submit_password").attr("disabled", false);
                $('#submit_password').html('<i class="fa fa-save"></i> {{ __('Save') }}');
            }
        });
    
    
    return false;
}
</script>
@endpush
    
                    

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Email</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Password</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active pt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<form onSubmit="UPDATE_PROFILE(); return false;">
                    <div id="result_profile"></div>
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" autocomplete="off" value="{{ $user->name }}">
                    </div>
                    <button id="submit_profile" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </form>

  </div>
  <div class="tab-pane fade pt-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 <form onSubmit="UPDATE_EMAIL(); return false;">
                    <div id="result_email"></div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="new_email">New email :</label>
                        <input type="email" id="new_email" name="new_email" class="form-control" placeholder="New Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                    </div>
                    <button id="submit_email" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </form>


  </div>
  <div class="tab-pane fade pt-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

 <form onSubmit="UPDATE_PASSWORD(); return false;">
                    <div id="result_password"></div>
                    <div class="form-group">
                        <label for="current_password">Current Password :</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Current Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password :</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation :</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Confirmation" autocomplete="off">
                    </div>
                    <button id="submit_password" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </form>

  </div>
</div>




              

@endsection
