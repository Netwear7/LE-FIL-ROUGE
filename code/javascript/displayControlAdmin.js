function loadInfos(){
    $('#ptable').load("displayControlAdmin.php",
    {
        table:  $('#tableSelect').val(),
    }, function(){
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
        //             alert("Errer !!");
        //         }
        //     })
        // })
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