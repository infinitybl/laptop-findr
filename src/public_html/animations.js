/* Update copyright year with the Date object */
var date = new Date();
document.querySelector(".copyright-year").textContent = date.getFullYear();
/*  animateElement() function animates the parameter element with the respective string.
    Input: The element selector string and the respective string indicating the animation.
    Output: Nothing.
*/
function animateElement(element, animation) {
    /* Add animated and the respective animation classes with web browser support, 
       and remove it once done so it can repeat the animation next time */
    $(element).addClass("animated " + animation).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
        $(element).removeClass("animated " + animation);
    });
}
/* Animate the elements once webpage loads */
$(document).ready(function() {
    animateElement("#info-text", "rubberBand");
    animateElement("#login-link", "jello");
    animateElement("#noteb-link", "heartBeat");
    animateElement("#inside", "flip");
    animateElement("#copyright", "fadeInLeft");
	
	$("#login-link").hover(function() {
		animateElement("#login-link", "zoomIn");
	});
	
});
