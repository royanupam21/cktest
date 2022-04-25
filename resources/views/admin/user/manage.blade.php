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
					<h3 class="page-title">View Team/Users Info
					</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="#index.html">Home</a></li>
						<li class="breadcrumb-item active">Team/Users Info</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">

				<div class="card card-table">
					<div class="card-header">
						<h4 class="card-title">List of Team/Users</h4>

						<a href="#" class="btn btn-sm btn-success float-right" id="createPage"><i class="fa fa-plus"></i> Add Profile</a>
					</div>

					<div class="card-body" style="padding-bottom: 20px;">
						<div class="col-md-12" style="overflow-y: visible;">
							<table class="table table-condensed table-bordered table-sm">
								<thead>
									<tr>
										<th>Action</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Published?</th>
										<th>Created On</th>
									</tr>
								</thead>
								<tbody>
									@if(count($datas)>0)
									@foreach($datas as $data)
									<tr>
										<td>
										<div class="dropdown float-left">
										  <button class="btn btn-sm btn-success dropdown-toggle" data-flip="false" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    <i class="fa fa-gear"></i>
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										    <a class="dropdown-item btnUserView" id="btnUserView_{{$data->id}}" href="#"><i class="fa fa-bookmark"></i> View</a>
										    <a class="dropdown-item btnUserEdit" id="btnUserEdit_{{$data->id}}" href="#"><i class="fa fa-edit"></i> Edit</a>
										    <a class="dropdown-item confirmation deleteUsers" href="{{url('admin/deleteUsers/'.$data->id)}}" id="deleteUsers_{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
										  </div>
										</div>	
										</td>
										<td>{{$data->first_name." ".$data->last_name}}</td>
										<td>{{$data->email}}</td>
										<td>{{($data->phone=="")?'-NA-':$data->phone}}</td>
										<td>{{($data->isactive==1)?'-Published-':'-Not Published-'}}</td>
										<td>{{date_format(date_create($data->craeted_at),"d-m-Y")}}</td>
									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
						</div>
						<div class="d-flex justify-content-center">
			        {!! $datas->links() !!}
			      </div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal start -->
  <div class="modal fade" id="createPageModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Team/User Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{url('admin/createUsers')}}" enctype="multipart/form-data" onSubmit="storeValidate()" autocomplete="off">
            	{{ csrf_field() }}
	              <div class="box-body">
	              	<div class="row">
	              		<div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">First Name</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtFName" placeholder="First Name" required>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Last Name</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtLName" placeholder="Last Name" required>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <div class="row">
		                <div class="col-md-4 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Email</label>
		                    <div class="col-md-12">
		                      <input type="email" class="form-control" name="txtEmail" placeholder="Email" required>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-4 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Mobile</label>
		                    <div class="col-md-12">
		                      <input type="number" class="form-control" name="txtPhone" placeholder="Mobile Number">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-4 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Photo</label>
		                    <div class="col-md-12">
		                      <input type="file" class="form-control" name="txtPhoto">
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Password</label>
		                    <div class="col-md-12">
		                      <input type="password" class="form-control" name="txtPassword" placeholder="Password" required>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Publish to Public?</label>
		                    <div class="col-md-12">
		                      <select class="form-control" name="txtIsPublish">
		                      	<option value="1">Yes</option>
		                      	<option value="0">No</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-12 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Short Description</label>
		                    <div class="col-md-12">
		                      <textarea class="form-control" name="txtShortDescription" placeholder="Short Description"></textarea>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-12 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Long Description</label>
		                    <div class="col-md-12">
		                      <textarea class="form-control" name="txtLongDescription" placeholder="Long Description"></textarea>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Twitter</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtTwitter" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Facebook</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtFacebook" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Instagram</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtInstagram" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">LinkedIn</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtLinkedin" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              </div> 
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-secondary float-right"><i class="fa fa-save"></i> Save Changes </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal end -->

 <!-- modal start -->
  <div class="modal fade" id="editPageModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User/Team Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{url('admin/updateUsers')}}" enctype="multipart/form-data" onSubmit="storeValidate()">
            {{ csrf_field() }}
	        	<div class="box-body">
	          			<div class="row">
	              		<div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                  	<input type="hidden" id="txtID" name="txtID">
		                    <label class="col-md-12 control-label">First Name</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtFNameUp" id="txtFNameUp" placeholder="First Name" required>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Last Name</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtLNameUp" id="txtLNameUp" placeholder="Last Name" required>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <div class="row">
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Email</label>
		                    <div class="col-md-12">
		                      <input type="email" class="form-control" name="txtEmailUp" id="txtEmailUp" placeholder="Email" required>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Mobile</label>
		                    <div class="col-md-12">
		                      <input type="number" class="form-control" name="txtPhoneUp" id="txtPhoneUp" placeholder="Mobile Number">
		                    </div>
		                  </div>
		                </div>
		                
	              	</div>
	              	<div class="row">
	              		<div class="col-md-6 col-xs-12 padding-zero" style="display:none;">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Password</label>
		                    <div class="col-md-12">
		                      <input type="password" class="form-control" name="txtPasswordUp" placeholder="Password">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Photo</label>
		                    <div class="col-md-12">
		                      <input type="file" class="form-control" name="txtPhotoUp">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-6 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Publish to Public?</label>
		                    <div class="col-md-12">
		                      <select class="form-control" name="txtIsPublishUp" id="txtIsPublishUp">
		                      	<option value="1">Yes</option>
		                      	<option value="0">No</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-12 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Short Description</label>
		                    <div class="col-md-12">
		                      <textarea class="form-control" name="txtShortDescriptionUp" id="txtShortDescriptionUp" placeholder="Short Description"></textarea>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-12 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Long Description</label>
		                    <div class="col-md-12">
		                      <textarea class="form-control" name="txtLongDescriptionUp" id="txtLongDescriptionUp" placeholder="Long Description"></textarea>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	              		<div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Twitter</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtTwitterUp" id="txtTwitterUp" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Facebook</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtFacebookUp" id="txtFacebookUp" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">Instagram</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtInstagramUp" id="txtInstagramUp" placeholder="https://">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3 col-xs-12 padding-zero">
		                  <div class="form-group">
		                    <label class="col-md-12 control-label">LinkedIn</label>
		                    <div class="col-md-12">
		                      <input type="text" class="form-control" name="txtLinkedinUp" id="txtLinkedinUp" placeholder="https://">
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
});

$(document).on("click",".btnUserEdit",function(){
	var keyid=$(this).attr("id").split("_")[1];
	$("#editPageModal").modal({backdrop: 'static',  keyboard: false});

	$.ajax({
        url: baseurl+"/editUsers",
        type: "POST",
        dataType: "json",
        cache: false,
        data:{"_token": token,id:keyid},
        beforeSend: function() {
        	$("#txtID").val(keyid);
        	$(".btnUpdate").attr("id","btnUpdate_"+keyid);
        },
        success: function(response){    
          $("#txtFNameUp").val(response.first_name);
          $("#txtLNameUp").val(response.last_name);
          $("#txtEmailUp").val(response.email);
          $("#txtPhoneUp").val(response.phone);
          $("#txtIsPublishUp").val(response.isactive);
          $("#txtShortDescriptionUp").val(response.sort_desc);
          $("#txtLongDescriptionUp").val(response.long_desc);
          $("#txtTwitterUp").val(response.twitter);
          $("#txtFacebookUp").val(response.facebook);
          $("#txtInstagramUp").val(response.insta);
          $("#txtLinkedinUp").val(response.linkedin);
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

    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
@endsection