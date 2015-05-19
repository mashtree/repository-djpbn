$(document).foundation();
$(function(){
	$('#search').keypress(function(e){
		var code = e.keyCode || e.which;
		if(code==13){
			alert('test');
		}
	});
});

var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID
var url ='http://localhost/repository-djpbn-master/public/get_author';

$(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    $.getJSON(url, function(data) {
        var option = '<option value=0>--PILIH AUTHOR--</option>';
        //console.log(data);
        for (var i in data) {
            option += '<option value='+data[i].id+'>'+data[i].name+' - '+data[i].nip+'</option>';
        };

        $(wrapper).append('<div><select name="author[]">'+option+'</select><a href="#" class="hapus">Hapus kolom atas ane!</a></div>');
    });
});

$(wrapper).on("click",".hapus", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); 
});
