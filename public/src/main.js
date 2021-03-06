/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

 function changeSliderCap()
 {
    //console.log("called");
    var width = Math.sqrt($(".slider-p").width() * $(".slider-p").height());
    var sqrt2 = Math.sqrt(2);
    //$(".pozadina-p").height(width);
    //$(".pozadina-p").width(width);
    $(".slider-caption").width(sqrt2 * width);
    $(".slider-caption").height(sqrt2 * width);
 }

$(window).resize(changeSliderCap())

 // Dynamically change the caption width depending on the inner text, has issues atm.
/*
 function changeSliderCap()
 {
    console.log("called");
    var width = Math.sqrt($(".slider-p").width() * $(".slider-p").height());
    var sqrt2 = Math.sqrt(2);
    $(".pozadina-p").height(width);
    $(".pozadina-p").width(width);
    $(".slider-caption").width(sqrt2 * width);
    $(".slider-caption").height(sqrt2 * width);
 }

changeSliderCap();

$(window).resize(function()
{
    changeSliderCap();
});
*/

// jQuery to collapse the navbar on scroll
/*
var vp_width = $(window).width();
function collapseNavbar() {
    if ($(".navbar").offset().top > 50 && vp_width > 768) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".dropdown-menu").addClass("dropdown-menu-black");
        $(".dropdown-menu").removeClass("dropdown-menu-transparent");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".dropdown-menu").addClass("dropdown-menu-transparent");
    }
}


$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

*/
$(document).ready(function () {
    $(".wrapper").css("visibility","visible");
    $(".on-hover").hover(
        function () {
            $(this).find(".caption").css("background-color", "rgba(10, 172, 167, 1)");
        },
        function () {
            $(this).find(".caption").css("background-color", "rgba(10, 172, 167, 0.7)");
        }
    )
});
