/* For Local Server*/
// var base_url = window.location.origin + "/alib/"; //
var session_role = $('#custom_session').val();

/* For Production Server*/
var base_url = window.location.origin + "/";

/* Close alert message */

function closeAlert() {
    $('.alert').empty();
}

/* END: close alert message */

/*Start: smart carousel */
	var api,api1,api2,api3;
    $(document).ready(function() {
        //Default carousel
        $("#smart-carousel").smartCarousel({
            itemWidth: 170,
            itemHeight: 250,
            distance: 15,
            selectedItemDistance: 50,
            selectedItemZoomFactor: 1,
            unselectedItemZoomFactor: 0.67,
            unselectedItemAlpha: 0.6,
            motionStartDistance: 170,
            topMargin: 119,
            gradientStartPoint: 0.35,
            gradientOverlayColor: "#f0f0f0",
            gradientOverlaySize: 190,
            reflectionVisible: true,
            reflectionSize: 70,
            selectByClick: true,
            // autoSlideshow: true,
            // autoSlideshowDelay: 5000
        });
		/*Start: for Popular Category */
         $("#smart-carousel-popular").smartCarousel({
            itemWidth: 170,
            itemHeight: 250,
            distance: 15,
            selectedItemDistance: 50,
            selectedItemZoomFactor: 1,
            unselectedItemZoomFactor: 0.67,
            unselectedItemAlpha: 0.6,
            motionStartDistance: 170,
            topMargin: 119,
            gradientStartPoint: 0.35,
            gradientOverlayColor: "#f0f0f0",
            gradientOverlaySize: 190,
            reflectionVisible: true,
            reflectionSize: 70,
            selectByClick: true,
            // autoSlideshow: true,
            // autoSlideshowDelay: 5000
        });
        /*End: for Popular Category */

        /*Start: for Fresh Category */
        $("#smart-carousel-fresh").smartCarousel({
            itemWidth: 170,
            itemHeight: 250,
            distance: 15,
            selectedItemDistance: 50,
            selectedItemZoomFactor: 1,
            unselectedItemZoomFactor: 0.67,
            unselectedItemAlpha: 0.6,
            motionStartDistance: 170,
            topMargin: 119,
            gradientStartPoint: 0.35,
            gradientOverlayColor: "#f0f0f0",
            gradientOverlaySize: 190,
            reflectionVisible: true,
            reflectionSize: 70,
            selectByClick: true,
            // autoSlideshow: true,
            // autoSlideshowDelay: 5000
        });
        /*End: for Fresh Category */

        /*Start: for Prime Category */
        $("#smart-carousel-prime").smartCarousel({
            itemWidth: 170,
            itemHeight: 250,
            distance: 15,
            selectedItemDistance: 50,
            selectedItemZoomFactor: 1,
            unselectedItemZoomFactor: 0.67,
            unselectedItemAlpha: 0.6,
            motionStartDistance: 170,
            topMargin: 119,
            gradientStartPoint: 0.35,
            gradientOverlayColor: "#f0f0f0",
            gradientOverlaySize: 190,
            reflectionVisible: true,
            reflectionSize: 70,
            selectByClick: true,
            // autoSlideshow: true,
            // autoSlideshowDelay: 5000
        });
        /*End: for Prime Category */
    });
   /*End: smart carousel */