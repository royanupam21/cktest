var max_fields=50;
var x=1;
$('.new-field').on('click',function(){ 
if(x < max_fields){
    x++;
    $('.iList').append('<tr><td><input type="text" readonly class="form-control input-sm" value="'+$('.srcbyname').val()+'" name="itmcode[]"></td><td><input type="text" readonly class="form-control input-sm" value="'+$('.qunatity').val()+'" name="qty[]"></td><td><a href="#" class="btn btn-xs btn-danger iremove"><i class="fa fa-trash"></i></a></td></tr>');
    $('.qunatity').val('');
}
});
//-----------
$('.iList').on("click",".iremove", function(e){ //user click on remove text
  e.preventDefault(); $(this).parent('td').parent('tr').remove(); x--;
  calSTotal();
  calDiscount();
});