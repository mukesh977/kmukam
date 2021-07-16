// FIXED HEADER
$(window).scroll(function () {
	if ($(window).scrollTop() >= 300) {
		$(".header-bottom").addClass("fixed-header");
	} else {
		$(".header-bottom").removeClass("fixed-header");
	}
});

// DROPDOWN SEARCH
$(document).ready(function () {
	$(".fa-search").click(function () {
		$(".search-box").toggle();
		$(".header-search .search-box input[type='text']").focus();
	});
});

// VIDEO SLIDER
$(document).ready(function () {
	$(".main-video-slider").slick({
		autoplay: false,
		autoplaySpeed: 5000,
		speed: 900,
		slidesToShow: 3,
		arrows: true,
		dots: false,
		slidesToScroll: 1,
		prevArrow: "<i class='fas fa-arrow-left'></i>",
		nextArrow: "<i class='fas fa-arrow-right'></i>",
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});
});




// FONT SIZE CHANGER
function fontInc() {
	document.getElementById("fontSize").style.fontSize = "26px";
  }
  function fontRes() {
	document.getElementById("fontSize").style.fontSize = "23px";
  }
  function fontDec() {
	document.getElementById("fontSize").style.fontSize = "20px";
  }



// TO THE TOP BUTTON
$(document).ready(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 1500) {
			$("#myTopbtn").fadeIn();
		} else {
			$("#myTopbtn").fadeOut();
		}
	});
	$("#myTopbtn").click(function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
});




// FOR SIDE MENU
function openNav() {
	document.getElementById("mySidepanel").style.width = "320px";

  }
  
  function closeNav() {
	document.getElementById("mySidepanel").style.width = "0";

  }


// DARK MODE
$(document).ready(function() {
    $("#color_mode").on("change", function () {
        colorModePreview(this);
    })
});

function colorModePreview(ele) {
    if($(ele).prop("checked") == true){
        $('html').addClass('dark-mode');
    }
    else if($(ele).prop("checked") == false){
        $('html').removeClass('dark-mode');
    }
}