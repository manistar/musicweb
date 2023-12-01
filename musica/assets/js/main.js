/* =====================================================
Template Name   : Musica
Description     : Music streaming & Record HTML5 Template
Author          : Youtoview
Version         : 1.1
=======================================================*/


$(document).ready(function () {
	"use strict"; // start of use strict


	/*==============================
	preloader
	==============================*/

	$(window).on('load', function() {
		$(".preloader .item-wrapper").delay(1000).animate({
	        top: "-100%"
	    },1000,"easeInQuart");
	    $(".preloader").delay(1000).fadeOut(1000);
	});

	/*==============================
	Menu
	==============================*/
	$('.header__btn').on('click', function() {
		$(this).toggleClass('header__btn--active');
		$('.sidebar').toggleClass('sidebar--active');
	});

	$('.header__search .close, .header__action--search button').on('click', function() {
		$('.header__search').toggleClass('header__search--active');
	});

	/*==============================
	Home slider
	==============================*/
	$('.hero').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: true,
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 600,
		autoHeight: true,
		items: 1,
		responsive: {
			0 : {
				margin: 20,
			},
			576 : {
				margin: 20,
			},
			768 : {
				margin: 30,
			},
			1200 : {
				margin: 30,
			},
		}
	});

	/*==============================
	Carousel
	==============================*/
	$('.main__carousel--events').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: true,
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 600,
		margin: 20,
		autoHeight: true,
		responsive: {
			0 : {
				items: 1,
			},
			576 : {
				items: 2,
			},
			768 : {
				items: 2,
				margin: 30,
			},
			992 : {
				items: 3,
				margin: 30,
			},
			1200 : {
				items: 3,
				margin: 30,
				mouseDrag: false,
			},
		}
	});

	$('.main__carousel--artists').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: true,
		loop: true,
		autoplay: false,
		smartSpeed: 600,
		margin: 20,
		autoHeight: true,
		responsive: {
			0 : {
				items: 2,
			},
			576 : {
				items: 3,
			},
			768 : {
				items: 4,
				margin: 30,
			},
			992 : {
				items: 6,
				margin: 30,
			},
			1200 : {
				items: 6,
				margin: 30,
			},
		}
	});

	$('.main__carousel--store').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: true,
		loop: true,
		autoplay: false,
		smartSpeed: 600,
		margin: 20,
		autoHeight: true,
		responsive: {
			0 : {
				items: 2,
			},
			576 : {
				items: 3,
			},
			768 : {
				items: 3,
				margin: 30,
			},
			992 : {
				items: 4,
				margin: 30,
			},
			1200 : {
				items: 5,
				margin: 30,
			},
		}
	});

	$('.main__carousel--live').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: true,
		loop: true,
		autoplay: false,
		smartSpeed: 600,
		margin: 20,
		autoHeight: true,
		responsive: {
			0 : {
				items: 1,
			},
			576 : {
				items: 2,
			},
			768 : {
				items: 2,
				margin: 30,
			},
			992 : {
				items: 3,
				margin: 30,
			},
			1200 : {
				items: 3,
				margin: 30,
				mouseDrag: false,
			},
		}
	});

	/*==============================
	Navigation
	==============================*/
	$('.main__nav--prev').on('click', function() {
		var carouselId = $(this).attr('data-nav');
		$(carouselId).trigger('prev.owl.carousel');
	});
	$('.main__nav--next').on('click', function() {
		var carouselId = $(this).attr('data-nav');
		$(carouselId).trigger('next.owl.carousel');
	});

	/*==============================
	Partners
	==============================*/
	$('.partners').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: false,
		loop: true,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		smartSpeed: 600,
		margin: 20,
		responsive : {
			0 : {
				items: 2,
			},
			576 : {
				items: 3,
				margin: 20,
			},
			768 : {
				items: 4,
				margin: 30,
			},
			992 : {
				items: 4,
				margin: 30,
			},
			1200 : {
				items: 6,
				margin: 30,
			},
			1900 : {
				items: 8,
				margin: 30,
			},
		}
	});

	/*==============================
	Product
	==============================*/
	$('.store-item__carousel').owlCarousel({
		mouseDrag: true,
		touchDrag: true,
		dots: true,
		loop: true,
		autoplay: false,
		smartSpeed: 600,
		autoHeight: true,
		items: 1,
		margin: 20,
	});

	/*==============================
	Filter
	==============================*/
	$('.filter__item-menu li').each( function() {
		$(this).attr('data-value', $(this).text().toLowerCase());
	});

	$('.filter__item-menu li').on('click', function() {
		var text = $(this).text();
		var item = $(this);
		var id = item.closest('.filter').attr('id');
		$('#'+id).find('.filter__item-btn input').val(text);
	});

	/*==============================
	Modal
	==============================*/
	$('.open-video, .open-map').magnificPopup({
		disableOn: 0,
		fixedContentPos: true,
		type: 'iframe',
		preloader: false,
		removalDelay: 300,
		mainClass: 'mfp-fade',
	});

	/*==============================
	Select
	==============================*/
	$('.main__select').select2({
		minimumResultsForSearch: Infinity
	});



	/*==============================
	bottom to top
	==============================*/
	$(window).scroll(function() {
		if ($(window).scrollTop() > 300) {
		  $('#bottom__to-top').show('slow');
		} else {
		  $('#bottom__to-top').hide('slow');
		}
	});

	$('#bottom__to-top').on("click",function(){
		$('html,body').animate({scrollTop: 0}, 1500);
	});




	/*==============================
	Bg
	==============================*/
	$('.hero__slide, .event').each( function() {
		if ($(this).attr("data-bg")){
			$(this).css({
				'background': 'url(' + $(this).data('bg') + ')',
				'background-position': 'center center',
				'background-repeat': 'no-repeat',
				'background-size': 'cover'
			});
		}
	});

	/*==============================
	Inputmask
	==============================*/
	$('.stats__form input').inputmask('99-99-99-99');


	/*==============================
	cart quantity
	==============================*/
	$('.add').click(function () {
		if ($(this).prev().val() >= 1 ) {
    	$(this).prev().val(+$(this).prev().val() + 1);
		}
     });
	 
     $('.sub').click(function () {
		if ($(this).next().val() > 1) {
    	if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
    });


	/*==============================
	copyright date
	==============================*/
	var date = new Date().getFullYear();
    $('#date').html(date);



	/*==============================
	Player
	==============================*/
	//mobile hide show music bar
	$('.player__btn').on('click', function() {
		$(this).toggleClass('player__btn--active');
	    $('.audio_player').toggleClass('player--active');
	});

	const controls = `
	<div class="plyr__controls">
		<div class="plyr__actions">
			<button type="button" class="plyr__control" data-plyr="restart">
			<a href="#plyr-restart"><i class="far fa-undo-alt"></i></a>
			<span class="plyr__tooltip" role="tooltip">Restart</span>
			</button>
			<button type="button" class="plyr__control plyr__control--prev">
			    <i class="far fa-step-backward"></i>
			</button>

			<button type="button" class="plyr__control" data-plyr="play">
			    <i class="far fa-pause icon--pressed"></i>
			    <i class="far fa-play icon--not-pressed"></i>
			</button>

			<button type="button" class="plyr__control plyr__control--next">
			    <i class="far fa-step-forward"></i>
			</button>
		</div>

		<div class="plyr__wrap">
			<div class="plyr__progress">
				<input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" aria-label="Seek">
				<progress class="plyr__progress__buffer" min="0" max="100" value="0">% buffered</progress>
				<span role="tooltip" class="plyr__tooltip">00:00</span>
			</div>
			<div class="plyr__time plyr__time--current" aria-label="Current time">00:00</div>
            <div class="plyr__time plyr__time--duration" aria-label="Duration">00:00</div>
		</div>

		<div class="plyr__wrap">
			<button type="button" class="plyr__control" aria-label="Mute" data-plyr="mute">
				<i class="far fa-volume-mute icon--pressed"></i>
				<i class="far fa-volume icon--not-pressed"></i>
				<span class="label--pressed plyr__tooltip" role="tooltip">Unmute</span>
				<span class="label--not-pressed plyr__tooltip" role="tooltip">Mute</span>
			</button>

			<div class="plyr__volume">
				<input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" aria-label="Volume">
			</div>

			<a href="playlist-single.html" class="plyr__control" aria-label="Playlist">
			    <i class="far fa-list-ul"></i>
				<span class="plyr__tooltip" role="tooltip">Playlist</span>
			</a>
		</div>
	</div>
	`;
	var player = new Plyr('#audio', {
		controls,
		volume: 0.5,
		duration:true,
	});

	var audio = $('#audio');

	player.on('play', event => {
		$('a[data-link].active, a[data-playlist].active').addClass('play');
		$('a[data-link].active, a[data-playlist].active').removeClass('pause');
	});

	player.on('pause', event => {
		$('a[data-link].active, a[data-playlist].active').removeClass('play');
		$('a[data-link].active, a[data-playlist].active').addClass('pause');
	});

	/* single */
	$('a[data-link]').on('click', function(e){
		e.preventDefault();
		let link = $(this);
		run(link, audio[0]);
	});

	function run(link, player){
		if ($(link).hasClass('play')) {
			$(link).removeClass('play');
			audio[0].pause();
			$(link).addClass('pause');
		}
		else if ($(link).hasClass('pause')) {
			$(link).removeClass('pause');
			audio[0].play();
			$(link).addClass('play');
		}
		else {
			$('a[data-link]').removeClass('active');
			$('a[data-link]').removeClass('pause');
			$('a[data-link]').removeClass('play');
			$(link).addClass('active');
			$(link).addClass('play');
			player.src = $(link).attr('href');

			let title = $(link).data('title');
			let artist = $(link).data('artist');
			let img = $(link).data('img');
			$('.player__title').text(title);
			$('.player__artist').text(artist);
			$('.player__cover img').attr('src', img);
			audio[0].load();
			audio[0].play();
		}
	}

	/* playlist */
	if ($('.main__list--playlist').length) {
		var current = 0;
		var playlist = $('.main__list--playlist');
		var tracks = playlist.find('li a[data-playlist]');
		var len = tracks.length;

		playlist.find('a[data-playlist]').on('click', function(e){
			e.preventDefault();
			let link = $(this);
			current = link.parent().index();
			run2(link, audio[0]);
		});

		player.on('ended', event => {
			let link = $('.single-item__cover.play');
			current++;
			if (current == len) {
				current = 0;
				link = playlist.find('a[data-playlist]')[0];
			} else {
				link = playlist.find('a[data-playlist]')[current];
			}
			run2($(link),audio[0]);
		});

		$('.plyr__control--prev').on('click', function(e){
			let link = $('.single-item__cover.play');
			current--;
			if (current == -1) {
				current = len - 1;
				link = playlist.find('a[data-playlist]')[current];
			} else {
				link = playlist.find('a[data-playlist]')[current];
			}
			run2($(link),audio[0]);
		});

		$('.plyr__control--next').on('click', function(e){
			let link = $('.single-item__cover.play');
			current++;
			if (current == len) {
				current = 0;
				link = playlist.find('a[data-playlist]')[0];
			} else {
				link = playlist.find('a[data-playlist]')[current];
			}
			run2($(link),audio[0]);
		});

		function run2(link, player){
			if ($(link).hasClass('play')) {
				$(link).removeClass('play');
				audio[0].pause();
				$(link).addClass('pause');
			}
			else if ($(link).hasClass('pause')) {
				$(link).removeClass('pause');
				audio[0].play();
				$(link).addClass('play');
			}
			else {
				$('a[data-playlist]').removeClass('active');
				$('a[data-playlist]').removeClass('pause');
				$('a[data-playlist]').removeClass('play');
				$(link).addClass('active');
				$(link).addClass('play');
				player.src = $(link).attr('href');

				let title = $(link).data('title');
				let artist = $(link).data('artist');
				let img = $(link).data('img');
				$('.player__title').text(title);
				$('.player__artist').text(artist);
				$('.player__cover img').attr('src', img);
				audio[0].load();
				audio[0].play();
			}
		}
	}
});