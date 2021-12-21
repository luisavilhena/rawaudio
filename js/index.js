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
	  speed: 1000,
	  autoplaySpeed: 0,
	  dots: true,
	  adaptiveHeight: true,
	  fade: true,
	  // cssEase: 'linear',
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
	const para2 = document.getElementById("para2");
  let loop;

  // Vamos fazer com que o segundo paragrafo se posicione depois do primeiro
  para2.style.left = para1.offsetWidth + 'px';
	  
	function animate(element, endStart) {
    let loop;
    // Guarda a largura do elemento
	  let elementWidth = element.offsetWidth;
    // Guarda a largura do elemento pai
	  let parentWidth = element.parentElement.offsetWidth;
    // Velocidade da animacao
    let speed = 3;
    
    // Aqui cria-se um loop para aa animação que será executado a cada frame
    // window.requestAnimationFrame executa a animacao no proxima frame
    // Para deixar em loop, no final da função, chamamos o window.requestAnimationFrame novamente para executar o animationLoop de novo
    const animationLoop = () => {
      // Primeiro pegamos a posição atual do elemento
      let left = parseFloat(window.getComputedStyle(element).left);
      // Movemos o elemento X pixels para a esquerda, sendo que X é a variabel "speed"
      element.style.left = left - speed + "px";
      // Se a posição do elemento sair completamente da tela, seta a posição dele para a posicao "endStart"
	    if (left < -elementWidth) {
    	  element.style.left = endStart + 'px';
	    }
      
      loop = window.requestAnimationFrame(animationLoop);
    }
    animationLoop();
    return loop;
	}
  // Quando o elemento sair completamente da tela
  // Fazemos com que ele recomece do outro lado, logo depois do paragrafo anterior
  animate(para1, para1.offsetWidth);
  animate(para2, para1.offsetWidth);


})

//////////////TRANSLATE
$(document).ready(function(){
	$('.weglot-inline ul .br a').text('PORT');
	$('.weglot-inline ul .en a').text('ENG');
})

//LOADING
$(document).ready(function(){
	$('.carousel-loading').on("click", function(e){
		$(this).css('display', "none")
	})
	$('.carousel-loading').delay(1000).fadeOut('slow')
})



//PROJECTS
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








