
var x=1;
$('.addnew-field').on('click',function(){ 
if(x < 50){
    $('.iList').append('<tr><td>Title</td><td><input type="text" class="form-control input-sm" value="'+$('.title').val()+'" readonly name="title[]"></td><td>Unit</td><td><input type="text" class="form-control input-sm" readonly value="'+$('.unit').val()+'" name="unit[]"></td><td>Range</td><td><input type="text" class="form-control input-sm" readonly value="'+$('.range').val()+'" name="range[]"></td><td>Price</td><td><input type="text" class="form-control input-sm" readonly value="'+$('.price').val()+'" name="price"></td><td><button class="btn btn-sm btn-danger iremove"><i class="fa fa-trash"></i></button></td></tr>');
    x++;
    $('.title').val('');
    $('.unit').val('');
    $('.range').val('');
    $('.price').val('');
}
});

$('.iList').on("click",".iremove", function(e){ //user click on remove text
  e.preventDefault(); $(this).parent('td').parent('tr').remove(); x--;
});

