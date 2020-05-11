function loadInfos(){
    $('#ptable').load("displayControlAdmin.php",
    {
        table:  $('#tableSelect').val(),
    }, function(){
        $('#pload').load("displayModalAddInDatabase.php", 
        { 
            "table": $('#tableSelect').val()
        }, function(){
            $('#addInDatabase').click(function(e){
                e.preventDefault();
                table = $('#tableSelect').val()
                // form = $('#form-admin').serializeArray()
                // typeTable = {name: 'selectTable', value : table}
                // form[form.length] = $.extend({}, form, typeTable);
                // $.post( "ControlAdmin.php", form);  

                form = $("form-admin")
                var formData = new FormData(form[0]);
                $('input').each(function(){
                    formData.append(this.name, this.value)
                })
                $('select').each(function(){
                    console.log(this.name)
                    console.log(this.value)
                    formData.append(this.name, $(this).find('option:selected').val())
                })
                if(table == "photo_animal"){
                    formData.append( 'photo', $( '#photo' )[0].files[0] );
                }
                e.stopPropagation()

                $.ajax({
                    url: 'ControlAdmin.php',
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    async: true,
                    processData: false,
                    contentType: false,
                    mimeType: 'multipart/form-data',
                    success: function(data){
                        alert(data);
                    }
                })
                // $('#add').modal('hide');
                
                setTimeout(function(){
                    $('.modal-backdrop').remove();
                    loadInfos();
                },400);
                $('body').removeClass('modal-open');
            })
        })
    })

}

window.onload=function(){
    loadInfos();
    $("#tableSelect").change(function(e){
        id = $(this).val();
        console.log(id);
        loadInfos();
    });
}
























// $(".delete").click(function(e){
    //     var numero = $(this).data('noemp');
    //     e.preventDefault();
    //     $.ajax({
    //         url : 'remove.php?numEmp=' + numero,
    //         success : function(data){
    //             if(data){
    //                 $('#error-message').html(data).show();
    //             }
    //             else{
    //                 loadInfos();
    //             }
    //         }, 
    //         error : function(xhr, message, status){
    //             alert("Error !!");
    //         }
    //     })
    // })