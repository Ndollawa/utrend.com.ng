$(document).ready(function() {
				$("#owl-demo").owlCarousel({
					autoPlay: 3000,
					nav: false,
					slideSpeed: 1000,
					// pagination:false,
					paginationSpeed: 400,
					singleItem: true
				});
				$("#owl-demo2").owlCarousel({
					autoPlay: 3000,
					items: 3,
					itemsDesktop: [1199, 3],
					itemsDesktopSmall: [979, 3]
				});

	$("#owl-demo3").owlCarousel({
					autoPlay: 3000,
					nav: false,
					// rtl:true,
					slideSpeed: 1000,
					pagination:false,
					paginationSpeed: 400,
					responsive:{
			        0:{
			            items:1,
			            nav:true
			        },
			        600:{
			            items:2,
			            nav:false
			        },
			        1000:{
			            items:3,
			            nav:true,
			            loop:false
			        }
			    }
				});
	$("#owl-demo4").owlCarousel({
					autoPlay: 3000,
					nav:false,
					pagination:false,
					items: 4,
					itemsDesktop: [1199, 3],
					itemsDesktopSmall: [979, 2]
					
				});

	
			});