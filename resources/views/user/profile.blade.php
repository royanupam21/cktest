@extends('layouts.main-layout')
@section('title','Manage Pages')
@section('content')
<style type="text/css">
	.table-condensed{
	  font-size: 14px;
	}

	.table-cbordered > tbody > tr > th {
	     border: 1px solid blue;
	}

	.padding-zero{
		padding-left: 4px;
    	padding-right: 4px;
	}
</style>
<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">My Profile
					</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="#index.html">Home</a></li>
						<li class="breadcrumb-item active">My Profile</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">

				<div class="card card-table">
					<div class="card-header">
						<h4 class="card-title"></h4>
						
						<a href="#" class="btn btn-sm btn-warning float-right btnUpdatePassword" id="btnUpdatePassword_{{$datas->id}}"><i class="fa fa-lock"></i> Change Password</a>

						<a href="#" class="btn btn-sm btn-warning float-right btnEditProfile" id="btnEditProfile_{{$datas->id}}" style="margin-right: 5px"><i class="fa fa-edit"></i> Update Profile</a>
					</div>

					<div class="card-body">
						<div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div class="col-md-12">
											<img src="{{ (isset($datas->photo))? asset('public/uploads/user/').'/'.$datas->photo:asset('assets/images/avtr.png')}}" width="100" height="80"/>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Name</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" value="{{$datas->first_name.' '.$datas->last_name}}">
					                    </div>
					                 </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Email</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" value="{{$datas->email}}">
					                    </div>
					                 </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Mobile No</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" value="{{$datas->phone}}">
					                    </div>
					                 </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Role</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm">
					                    </div>
					                 </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <!-- modal start -->
  <div class="modal fade" id="updatePasswordModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{url('admin/update-my-profile')}}" enctype="multipart/form-data" autocomplete="off">
            	{{ csrf_field() }}
	              <div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Old Password</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" placeholder="Old Password" name="txtOldPsw" id="txtOldPsw">
					                    </div>
					                 </div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
					                    <label class="col-md-12 control-label">New Password</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" placeholder="New Password" name="txtNewPsw" id="txtNewPsw">
					                    </div>
					                 </div>
								</div>
							</div>
              	  </div> 
          
        </div>
        <div class="modal-footer">
          <button id="btnUpdatePsw" class="btn btn-sm btn-secondary float-right btnUpdatePsw"><i class="fa fa-save"></i> Update Password </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal end -->

 <!-- modal start -->
  <div class="modal fade" id="editProfileModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit My Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{url('admin/update-my-profile')}}" enctype="multipart/form-data" autocomplete="off">
            	{{ csrf_field() }}
            	<input type="hidden" name="txtID" id="txtID">
	              <div class="box-body">
	              	<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div class="col-md-12">
											<img src="{{ (isset($datas->photo))? asset('public/uploads/user/').'/'.$datas->photo:asset('assets/images/avtr.png')}}" id="txtImgPreview" width="100" height="80"/>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">First Name</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" value="{{$datas->first_name}}" name="first_name" id="first_name">
					                    </div>
					                 </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Last Name</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" value="{{$datas->last_name}}" name="last_name" id="last_name">
					                    </div>
					                 </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Email</label>
					                    <div class="col-md-12">
					                      <input type="text" class="form-control input-sm" value="{{$datas->email}}" name="email">
					                    </div>
					                 </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Mobile No</label>
					                    <div class="col-md-12">
					                      <input type="number" class="form-control input-sm" value="{{$datas->phone}}" id="phone" name="phone">
					                    </div>
					                 </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
					                    <label class="col-md-12 control-label">Upload Profile Image</label>
					                    <div class="col-md-12">
					                      <input type="file" id="txtProfilePic" name="txtProfilePic" class="form-control input-sm">
					                    </div>
					                 </div>
								</div>
							</div>
              	  </div> 
          
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnUpdate" class="btn btn-sm btn-secondary float-right btnUpdate"><i class="fa fa-save"></i> Update Changes </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal end -->
@endsection

@section('scripts')
<script src="{{ asset('/assets/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">
	var baseurl="{{url('/admin/')}}";
	var token="{{csrf_token()}}";
$(document).ready(function(){
	//#28a745 -success
	//#ffc107 warning
	@if(Session::has('success'))
	showToast('#28a745','{{Session::get('success')}}');
	@endif
});

$(document).on("click","#createPage",function(){
	$("#createPageModal").modal({backdrop: 'static',  keyboard: false});
	  CKEDITOR.replace('txtPageContentDescription',{
	    filebrowserUploadUrl: "{{route('admin.ckupload',['_token'=>csrf_token()])}}",
	    filebrowserUploadMethod:'form'
	});
});

$(document).on("click",".btnUpdatePassword",function(){
	var user_id=$(this).attr("id").split("_")[1];
	$("#updatePasswordModal").modal({backdrop: 'static',  keyboard: false});
    $(".btnUpdatePsw").attr("id","btnUpdatePsw_"+user_id);
});


$(document).on("click",".btnUpdatePsw",function(){
	var user_id=$(this).attr("id").split("_")[1];
});

$(document).on("click",".btnEditProfile",function(){
	var user_id=$(this).attr("id").split("_")[1];
	$("#editProfileModal").modal({backdrop: 'static',  keyboard: false});

	$.ajax({
        url: baseurl+"/edit-my-profile",
        type: "POST",
        dataType: "json",
        cache: false,
        data:{"_token": token,id:user_id},
        beforeSend: function() {
        	$("#txtID").val(user_id);
        	$(".btnUpdate").attr("id","btnUpdate_"+user_id);
        },
        success: function(response){    
        },
        complete: function(response){
        }
    });
});
/*
//Getting all the states from state master 
    

*/



function storeValidate() {
	if($("#txtName").val()=="" && $("#txtName").val()==null){
		alert("Page Name/Title is required!");
		$("#txtName").focus();
		return false;
	}else if($("#txtIsActive").val()==""){
		alert("Publish field is required!");
		$("#txtIsActive").focus();
		return false;
	}else{
		return true;
	}
}

function showToast(boxcolor,msg){
	$.toast({ 
	  text : msg, 
	  showHideTransition : 'slide',  // It can be plain, fade or slide
	  bgColor : boxcolor,              // Background color for toast
	  textColor : '#eee',            // text color
	  allowToastClose : true,       // Show the close button or not
	  hideAfter : 3000,              // `false` to make it sticky or time in miliseconds to hide after
	  stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
	  textAlign : 'left',            // Alignment of text i.e. left, right, center
	  position : 'top-right'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
	});
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#txtImgPreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#txtProfilePic").change(function(){
    readURL(this);
});
</script>
@endsection