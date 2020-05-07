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
                form = $('#form-admin').serializeArray()
                typeTable = {name: 'selectTable', value : table}
                form[form.length] = $.extend({}, form, typeTable);
                $.post( "ControlAdmin.php", form);  
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