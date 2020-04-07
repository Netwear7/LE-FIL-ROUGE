window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 125 || document.documentElement.scrollTop > 125) {
//    $("#navbar").
   $("#logo").css("width", "41px").css("height", "40px").css("transition", "0.6s");


   $("#navbar").addClass("border-bot-header");
   $("#navbarSupportedContent").removeClass("mt-4");
   //    $("#navbar").css("-webkit-box-shadow", "0px 7px 9px 0px rgba(0,0,0,0.15)")
   //    .css("box-shadow", "0px 7px 9px 0px rgba(0,0,0,0.15);");
   
} else{
    $("#navbar").removeClass("border-bot-header");
    $("#navbarSupportedContent").addClass("mt-4");
    $("#navbar").removeProp("box-shadow");
    $("#logo").css("width", "81px").css("height", "80px");
  }
}