$('.srch').on('click',function(){
	  $('.rinq').empty();
	  var url='custom.php?inf=getRecordByDates&q1='+$('.frm').val()+"&q2="+$('.to').val();
	  $.getJSON(url, function(result){
	    $.each(result, function(i, field){
	      $(".rinq").append('<tr><th scope="row">'+(i+1)+'</th><td class="algn-lft">000'+field['c_id']+'</td><td class="algn-lft">'+field['pname']+'</td><td class="algn-lft">'+field['age']+' Yrs.</td><td class="algn-lft">'+field['address']+'</td><td class="algn-lft">+91-'+field['contact']+'</td><td class="algn-lft">'+field['email']+'</td><td class="algn-lft">'+field['city']+'</td><td class="algn-lft">'+field['doe']+'</td><td style="text-align:center;"><div class="pull-right btn-group"><button data-toggle="dropdown" class="btn btn-primary btn-sm down-toggle" type="button" aria-expanded="true"><i class="fa fa-cog"></i></button><ul role="menu" class="dropdown-menu"><li><a href="patient-profile.php?i='+field['c_id']+'">View</a></li><li><a href="custom.php?inf=delPatientRec&q='+field['c_id']+'" class="confirmation">Delete</a></li></ul></div></td></tr>');
	    });
	  });
});
function getBySearch(){
	$('.rinq').empty();
	  var url='custom.php?inf=getBySearch&q='+$('.srcbyname').val();
	  $.getJSON(url, function(result){
	    $.each(result, function(i, field){
	      $(".rinq").append('<tr><th scope="row">'+(i+1)+'</th><td class="algn-lft">000'+field['c_id']+'</td><td class="algn-lft">'+field['pname']+'</td><td class="algn-lft">'+field['age']+' Yrs.</td><td class="algn-lft">'+field['address']+'</td><td class="algn-lft">+91-'+field['contact']+'</td><td class="algn-lft">'+field['email']+'</td><td class="algn-lft">'+field['city']+'</td><td class="algn-lft">'+field['doe']+'</td><td style="text-align:center;"><div class="pull-right btn-group"><button data-toggle="dropdown" class="btn btn-primary btn-sm down-toggle" type="button" aria-expanded="true"><i class="fa fa-cog"></i></button><ul role="menu" class="dropdown-menu"><li><a href="patient-profile.php?i='+field['c_id']+'">View</a></li><li><a href="custom.php?inf=delPatientRec&q='+field['c_id']+'" class="confirmation">Delete</a></li></ul></div></td></tr>');
	    });
	  });
}