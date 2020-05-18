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
                // form = $('#form-add').serializeArray()
                // typeTable = {name: 'selectTable', value : table}
                // form[form.length] = $.extend({}, form, typeTable);
                // $.post( "ControlAdmin.php", form);  

                form = $("form-add")
                var formData = new FormData(form[0]);
                $('#pload input').each(function(){
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
                if(table == "animaux"){
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
        $(".delete").click(function(e){
            e.preventDefault();
            console.log(e.currentTarget);
            var numero = $(e.currentTarget).data('row'); //  e.currentTarget étant un éléments du DOM 
            // n'a pas la méthode data de jquery, il faut donc l'entourer avec le selecteur jquery --> $(..)
            console.log("numero : " + numero)
            var table = $('#tableSelect').val()
            $.ajax({
                url : 'ControlAdmin.php?id=' + numero + '&table=' + table + '&action=delete',
                success : function(data){
                    loadInfos();
                }, 
                error : function(xhr, message, status){
                    alert("Errer !!");
                }
            })
        })



        $(".update").click(function(e){
            e.preventDefault();
            console.log(e.currentTarget);
            var numero = $(e.currentTarget).data('row'); //  e.currentTarget étant un éléments du DOM 
            // n'a pas la méthode data de jquery, il faut donc l'entourer avec le selecteur jquery --> $(..)
            console.log("numero : " + numero)
            var table = $('#tableSelect').val()


            $('#updateLoad').load("displayModalUpdateInDatabase.php", 
            { 
                "table": $('#tableSelect').val(),
                "id": numero,
                "action": "update"
            }, function(){
                $('#update').modal('toggle')
                $('#updateInDatabase').click(function(e){
                    e.preventDefault();
                    table = $('#tableSelect').val()
                    form = $("form-update")
                    var formData = new FormData(form[0]);
                    $('#update input').each(function(){
                        if(this.name != "URGENCE"){
                            formData.append(this.name, this.value)
                        }else{
                            this.value = this.checked ? 1 : 0;
                            formData.append(this.name, this.value)
                        }
                    })
                    formData.append("tableSelect", $('#tableSelect').val())
                    // $('select').each(function(){
                    //     console.log(this.name)
                    //     console.log(this.value)
                    //     formData.append(this.name, $(this).find('option:selected').val())
                    // })
                    // if(table == "photo_animal"){
                    //     formData.append( 'photo', $( '#photo' )[0].files[0] );
                    // }
                    // if(table == "animaux"){
                    //     formData.append( 'photo', $( '#photo' )[0].files[0] );
                    // }
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
                    $('#update').modal('toggle')
                    loadInfos();
                    // setTimeout(function(){
                    //     $('.modal-backdrop').remove();
                    //     loadInfos();
                    // },400);
                    // $('body').removeClass('modal-open');
                })
            })




            // $.ajax({
            //     url : 'displayModalUpdateInDatabase.php?id=' + numero + '&table=' + table + '&action=update',
            //     success : function(data){
            //         loadInfos();
            //     }, 
            //     error : function(xhr, message, status){
            //         alert("Errer !!");
            //     }
            // })
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