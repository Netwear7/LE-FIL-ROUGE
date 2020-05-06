function loadInfos(){
    $('#ptable').load("displayControlAdmin.php",
    {
        table:  $('#tableSelect').val(),
    }, function(){
        $('#pload').load("displayModalAddInDatabase.php", 
        { 
            "table": $('#tableSelect').val()
        }, function(){
            $('#add').click(function(e){
                e.preventDefault();
                console.log($('#form-admin').serializeArray())   
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