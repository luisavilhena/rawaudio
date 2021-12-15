//js functions
//create location change

(function() {
    var pushState = history.pushState;
    var replaceState = history.replaceState;

    history.pushState = function() {
        pushState.apply(history, arguments);
        window.dispatchEvent(new Event('pushstate'));
        window.dispatchEvent(new Event('locationchange'));
    };

    history.replaceState = function() {
        replaceState.apply(history, arguments);
        window.dispatchEvent(new Event('replacestate'));
        window.dispatchEvent(new Event('locationchange'));
    };

    window.addEventListener('popstate', function() {
        window.dispatchEvent(new Event('locationchange'))
    });
})();



$(document).ready(function(){
	$('#mobile-menu-trigger').on("click", function(e){
		$('#main-header').toggleClass('menu-open')
	})
})


$(document).ready(function(){
	$('#name1').attr("placeholder", "NAME")
	$('#email1').attr("placeholder", "E-MAIL")
	$('#phone1').attr("placeholder", "PHONE")
	$('.captachinput').attr("placeholder", "RECAPCTHA")
	$('input[type="password"]').attr("placeholder", "PASSWORD")
})

///////////////////CAROUSEL/////////////////////////////
$(document).ready(function(){
  $('.carousel__imgs').on('init', function(event, slick){
    var dots = $( '.slick-dots li' );
    dots.each( function( k, v){
      $(this).find( 'button' ).addClass( 'heading'+ k );
    });
    var items = slick.$slides;
    console.log(items)
    items.each( function( k, v){
        var text = $(this).find( 'h2' ).text();
        console.log(text)
        $( '.heading' + k ).text(text);
        // $('.heading' + k).css('content', 'text');

    });
  });
  $('.carousel__imgs').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  speed: 900,
	  autoplaySpeed: 0,
	  dots: true,
	  adaptiveHeight: true,
	  cssEase: "linear",
	  easing: 'linear',
	  waitForAnimate: false,
	  asNavFor: '.carousel__description',
  });
});
$(document).ready(function(){
  $('.carousel__description').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: false,
	  speed: 100,
	  autoplaySpeed: 0,
	  dots: true,
	  adaptiveHeight: true,
	  fade: true,
	  cssEase: 'linear',
	  asNavFor: '.carousel__imgs',
  });
});
$(document).ready(function(){
	$('.carousel__imgs__item__img').on('click', function(e){
		$('.carousel__imgs').slick('slickPause')
		$('.main__description__main *').css('color', 'transparent')
		$('.carousel__description__item__description p').css('color', 'white')
		$('.carousel__description__item__description p span').css('color', 'white')
		$('.carousel__description__item__description h1').css('color', '#CC0000')
		$('.carousel__description__item__description h1 span').css('color', '#CC0000')
		$('.carousel__description__item__description h1 span').css('font-weight', 'bold')
	})
	$('.slick-dots li button').on('click', function(e){
		$('.carousel__imgs').slick('slickPause')
		$('.main__description__main *').css('color', 'transparent')
		$('.carousel__description__item__description p').css('color', 'white')
		$('.carousel__description__item__description p span').css('color', 'white')
		$('.carousel__description__item__description h1').css('color', '#CC0000')
		$('.carousel__description__item__description h1 span').css('color', '#CC0000')
		$('.carousel__description__item__description h1 span').css('font-weight', 'bold')
	})
});

///////////////////////PLACARD////////////

$(document).ready(function(){
	const para1 = document.getElementById("para1");
	  
	function animate(element) {
	  let elementWidth = element.offsetWidth;
	  let parentWidth = element.parentElement.offsetWidth;
	  let flag = 0;

	  setInterval(() => {
      element.style.marginLeft = --flag + "px";
      if (elementWidth == -flag) {
          flag = parentWidth;
	      }
	  }, 10);
	}
	animate(para1);
})


//CONTACT
$(document).ready(function(){
	$('.wpcf7-radio .wpcf7-list-item').on("click", function(e){
		if ($('.wpcf7-radio .wpcf7-list-item').hasClass("structure-color-black")) {
			$('.wpcf7-radio .wpcf7-list-item').removeClass("structure-color-black")
			$(this).toggleClass('structure-color-black')
		} else {
			$(this).toggleClass('structure-color-black')
		}
  })
})




//LOADING
$(document).ready(function(){
	$('.loading').on("click", function(e){
		$(this).css('display', "none")
	})
	$('.loading').delay(7000).fadeOut('slow')
})



//TEXT BOX CLICk
$(document).ready(function(){
	$('.project-list__item').on("click", function(e){
		$(this).toggleClass("active")
		$('.close').toggleClass("closeActive")
	})
	$('.close').on("click", function(e){
		$('.project-list__item').removeClass("active")
		$('.close').removeClass("closeActive")
	})
})

$(document).ready(function(){
	$('.text-box__item__more').on("click", function(e){
		console.log('clicou out location')
		$(this).toggleClass("active")
	})
	if($('.text-box__item__more a')){
		$('.text-box__item__more').on("click", function(e){
			$(this).removeClass("active")
		})
	}

})

//BACKGROUND-COLOR MENU
// $(document).ready(function(){
// 		const backgroundColor = $('main').css('background-color')
// 		const color = $('main').css('color')
// 		$('header').css('background-color', backgroundColor)
// 		$('ul#main-menu').css('background-color', backgroundColor)
// 		$('#mobile-menu-trigger div span').css('background-color', color)
// 		$('footer').css('background-color', backgroundColor)
// 		$('header').css('color', color)
// 		$('footer').css('color', color)
// 		$('footer svg').css('fill', color)
// 		$('header svg').css('fill', color)
// 		$('header h1').css('color', color)
// 		$('#main-menu li a').css('color', color)

// 	// }
// })

//ABOUT SCROLL
$(document).ready(function(){
	$(function() {
	  $('.arrow').click(function(e) {
	  	const heightElement = window.pageYOffset
	      $('html, body').animate({ scrollTop: $('html').offset().top  + heightElement + 600}, 1000);
	  });
	});
})


//ABOUT TAMANHO DO FIXED
$(document).ready(function(){
	$(function() {
		const w = $(window).height()
		const h = $('.about__content__fixed-right').height()
	  const height = w - h - 175
	  $('#part-3').css('margin-bottom', height)
	});
})
//MENU
$(document).ready(function(){
	$(window).on('scroll', function(event) {
			const heightElement2 = window.pageYOffset
				if (heightElement2 > 150) {
					$('header').addClass('header-animation-small')
					$('header').removeClass('header-animation-bigger')
				} else {
					$('header').removeClass('header-animation-small')
					$('header').addClass('header-animation-bigger')
				} 
			// }
		})
})








