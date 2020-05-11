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
                    console.log(this.name)
                    console.log(this.value)
                    formData.append(this.name, this.value)

                })
                formData.append("selectTable", table)
                e.stopPropagation()

                $.ajax({
                    url: 'ControlAdmin.php',
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    async: true,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status != 'success'){
                            // $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(9000)
                        } else {
                            // $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(9000);
                            
                        }                       
                    }
                })

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