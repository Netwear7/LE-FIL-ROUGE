window.onload=function() {
    
    $(document).ready(function(){
        $(".parent-card").click(function(){
            $(this).find(".card-body").height( 250 ).css('z-index', 3);
            $(this).find(".card-body").toggle();
        });
      });
}