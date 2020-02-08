function formData(id){
    return new FormData($('#'+id)[0]);
}

function token(){
    return $('input[name="_token"]').val();
}

function cleanForm(idformulario) {
    $('#'+idformulario)[0].reset();
}

function nuevoPost(){
	$('#idPost').val('');
    cleanForm('FormPublicar');
}

function publicar(){
    var datos=formData('FormPublicar');
    var _token=token();
    $.ajax({
        headers: {'X-CSRF-TOKEN':_token},
        url: 'publicar',
        type: 'post',
        data: datos,
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res);
            location.reload();
            
        },
        error: function(error){
          var erro = JSON.parse(error.responseText);
          console.log(error);
          nuevoPost();
        },complete : function(){
            //EnableSave('Usuarios');
        }
        
    });
}