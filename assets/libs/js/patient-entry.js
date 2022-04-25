var netTotal=0;
var gTotal=0;
var subTotal;
var max_fields=50;
var x=1;
$('.new-field').on('click',function(){ 
if(x < max_fields){
    x++;
    $('.iList').append('<tr><td>Path</td><td><input type="text" class="form-control input-sm" readonly value="2" name="mastergrpid[]"/></td><td><input type="text" class="form-control input-sm" name="tcode[]" value="'+$('.srcbyname1').val()+'" readonly></td><td class="algn-lft"><input type="text" class="form-control input-sm tcost" name="amt[]" value="'+$('.iamt1').val()+'" readonly></td><td style="text-align:center;"><button class="btn btn-primary btn-xs iremove"><i class="fa fa-trash"></i></button></td></tr>');
    calSTotal();
    calDiscount();
}
});

$('.new-field2').on('click',function(){ 
if(x < max_fields){
    x++;
    $('.iList').append('<tr><td>USG</td><td><input type="text" class="form-control input-sm" readonly value="1" name="mastergrpid[]"/></td><td><input type="text" class="form-control input-sm" name="tcode[]" value="'+$('.srcbyname2').val()+'" readonly></td><td class="algn-lft"><input type="text" class="form-control input-sm tcost" name="amt[]" value="'+$('.iamt2').val()+'" readonly></td><td style="text-align:center;"><button class="btn btn-primary btn-xs iremove"><i class="fa fa-trash"></i></button></td></tr>');
    

    calSTotal();
    calDiscount();
}
});

$('.new-field3').on('click',function(){ 
if(x < max_fields){
    x++;
    $('.iList').append('<tr><td>X-Ray</td><td><input type="text" class="form-control input-sm" readonly value="3" name="mastergrpid[]"/></td><td><input type="text" class="form-control input-sm" name="tcode[]" value="'+$('.srcbyname3').val()+'" readonly></td><td class="algn-lft"><input type="text" class="form-control input-sm tcost" name="amt[]" value="'+$('.iamt3').val()+'" readonly></td><td style="text-align:center;"><button class="btn btn-primary btn-xs iremove"><i class="fa fa-trash"></i></button></td></tr>');
    
   

    calSTotal();
    calDiscount();
}
});
//-----------
$('.iList').on("click",".iremove", function(e){ //user click on remove text
  e.preventDefault(); $(this).parent('td').parent('tr').remove(); x--;
  calSTotal();
  calDiscount();
});
//-------------
var noitm;
function calSTotal(){
  noitm=0;
  subTotal=0;
  $(".tcost").each(function(){
    subTotal+=parseInt($(this).val());
    $('.testTotal').val(subTotal);
    noitm++;
});
  $('.noit').val(noitm);
}
function calDiscount(){
  gTotal=0;
  $('.gTotal').empty();
  var dis=parseFloat(parseFloat($(".testTotal").val())/100)*parseFloat($('.disc').val());
  gTotal=parseFloat($(".testTotal").val())-dis;
  $('.gTotal').append(gTotal);
}
$('.disc').on('keyup',function(){
  gTotal=0;
  $('.gTotal').empty();
  var dis=parseFloat(parseFloat($(".testTotal").val())/100)*parseFloat($(this).val());
  gTotal=parseFloat($(".testTotal").val())-dis;
  $('.grandTotal').val(gTotal);
  $('.gTotal').append(gTotal);
});
$('.advp').on('keyup',function(){
  var crramt=gTotal-parseFloat($(this).val());
  $('.balance').val(crramt);
});
//--------------------------
//--------------------------
/*$('.icode').on('change',function(){
  $('.ibatch').empty();
  $(".ibatch").append('<option value="0">Select</option>');
  var url='custom.php?inf=getbatchNo&q='+$(this).val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".ibatch").append('<option>'+field['bcode']+'</option>');
    });
  });
  txtitle="";
  txval=0;
  getiTaxval();
});*/
//--------------------------
//--------------------------
//-------------------------
/*function getAmount(){
  $(".tst").empty();
  $(".tst").append('<option value="0">Select</option>');
  var url="getTestsInformation/2/"+$('.tgroup').val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".tst").append('<option value="'+field['mdt_code']+'">'+field['title']+'</option>');
    });
  });
}*/

$('.srcbyname1').on('change',function(){
  var url="getAmountUX/2/"+$('.srcbyname').val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".iamt1").val(field['cost']);
    });
  });
});
$('.srcbyname2').on('change',function(){
  var url="getAmountUX/1/"+$('.srcbyname2').val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".iamt2").val(field['cost']);
    });
  });
});
$('.srcbyname3').on('change',function(){
  var url="getAmountUX/3/"+$(this).val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".iamt3").val(field['cost']);
    });
  });
});
function getAmount2(){
  $('.iamt2').val('');
  var url="custom.php?inf=getAmount&q="+$('.srcbyname2').val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".iamt2").val(field['cost']);
    });
  });
}
function getAmount3(){
  $('.iamt3').val('');
  var url="custom.php?inf=getAmount&q="+$('.srcbyname3').val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      $(".iamt3").val(field['cost']);
    });
  });
}
//----------------------

//--------------------------
function getiTaxval(){
  var url="custom.php?inf=getiTax&q="+$('.icode').val();
  $.getJSON(url, function(result){
    $.each(result, function(i, field){
      txtitle=field['tax_title'];
       $('.itax').val(field['tax_val']);
    });
  });
}
//---------------------------
$('.idis').on('keyup',function(){
  calDiscount();
});

function calTaxAmount(){
  var txamt=parseFloat(gdtotal/100)*parseFloat($(".itax").val());
  txval=txamt;
  gdtotalamt=parseFloat(gdtotal)+txamt;
  $('.itotal').val(gdtotalamt);
}

/*
$('.iprice').on('change',function(){
  gdtotal=0;
  gdtotalamt=0;
  txval=0;
  $('.iqty').val('');
  $('.ibamt').val('');
  $('.idis').val('0');
  $('.idamt').val('');
  $('.itotal').val('');
});

$(document).keyup(function(e){
  if(e.which==114){
    alert('Hello');
  }
});
*/
function paymentValidate(){
  //alert(parseFloat($('.advp').val()));
  if(parseFloat($('.advp').val())>0){
    return true;
  }else{
    $('.error-msg').empty();
    $('.error-msg').append('Amount should be greater than "Zero" Or Equal To Test Charges!');
    return false;
  }
}