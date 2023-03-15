let rol = document.getElementsByClassName("role");
let viewA = document.getElementsByClassName("patient");

rol.addEventListener("click", function () {
    if ((rol.value = "doctor")) {
        viewA.style.display = none;
    } else {
        viewA.style.display = block;
    }
});

$(document).ready(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 300) {
          $(".black").css("background" , "blue");
        }
  
        else{
            $(".black").css("background" , "#333");  	
        }
    })
  })