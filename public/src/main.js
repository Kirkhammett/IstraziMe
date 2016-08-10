/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery to collapse the navbar on scroll
function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
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

$(document).ready(function () {
    $(".on-hover").hover(
        function () {
            $(this).find(".caption").css("background-color", "rgba(10, 172, 167, 1)");
        },
        function () {
            $(this).find(".caption").css("background-color", "rgba(10, 172, 167, 0.7)");
        }
    )
});
