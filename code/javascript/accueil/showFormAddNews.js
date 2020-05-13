$(document).ready(function(){
    $('#addNews').click(function(e){
        e.preventDefault();
        $("div#formAddNews").load('../../html/formAddNews.html');
            $("div#formAddNews").slideDown();
    });
});
 
