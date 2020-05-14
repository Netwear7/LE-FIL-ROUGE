$(document).ready(function(){
    $('#addNews').click(function(e){
        e.preventDefault();
        $("div#rowAddNews").load('../../html/formAddNews.html');
            $("div#rowAddNews").slideDown();
    });
});
 
