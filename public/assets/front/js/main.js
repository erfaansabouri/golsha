$(document).ready(function(){

	var $srchDropList = $('.srchDropList');
	var $blgHdrSrchBx = $('.blgHdrSrchBx');




	function callback(){
		var span = '<span class="material-icons">chevron_left</span>';
		if($(window).width() > 991){
			var counter = 0;
			var myInterval =null;

			if ($(".opnSubLink").length) {
				$(".remveLink span").remove();
			}

			$(".havSubMnuLink").hover( function(){
				counter = 0;
		        myInterval = setInterval(function () {
		            $('.hdrSubMnuBox').slideDown();
		        }, 200);
					$(this).find('.navRowSubBx').stop(true, true).delay(300).fadeIn(200);
			},
			function(){
				clearInterval(myInterval);
				$('.hdrSubMnuBox').slideUp();
				$(this).find('.navRowSubBx').stop(true, true).delay(200).fadeOut(200);
			});

			$(".navRowSubLi").hover( function(){
				$(this).find('.navRowSubLnk').addClass('opened');
				$(this).find('.navSubBox').stop(true, true).delay(300).fadeIn(200);
			},
			function(){
				$(this).find('.navRowSubLnk').removeClass('opened');
				$(this).find('.navSubBox').stop(true, true).delay(200).fadeOut(200);
			});
		}
		else{
			if ($(".opnSubLink").length) {
				$(".remveLink span").remove();
			}
			else{
				$(".remveLink").append(span);
				$(".remveLink span").addClass('opnSubLink');
			}

			$(".havSubMnuLink").each(function(){
				var thisItem1 = $(this);
				thisItem1.find('.opnSubLink').click(function(){
					var remveLink = thisItem1.find('.remveLink');				
					if (!thisItem1.find(".navRowSubBx").hasClass('opened')) {
						thisItem1.find(".navRowSubBx").slideDown().addClass('opened');
						remveLink.addClass('opened');
						remveLink.find('span').addClass('opened');
						thisItem1.siblings().find('.navRowSubBx').slideUp().removeClass('opened');
						thisItem1.siblings().find('.remveLink').find('span').removeClass('opened');
						thisItem1.siblings().find('.remveLink').removeClass('opened');
						thisItem1.siblings().find('.remveLink').find('span').removeClass('opened');
					}
					else{
						thisItem1.find(".navRowSubBx").slideUp().removeClass('opened');
						remveLink.find('span').removeClass('opened');
						remveLink.removeClass('opened');
					}
				})
			})
				
			$(".navRowSubLi").each(function(){
				var thisItem2 = $(this);
				thisItem2.find('.opnSubSub').click(function(){
					var navRowSubLnk = thisItem2.find('.navRowSubLnk');				
					if (!thisItem2.find(".navSubBox").hasClass('opened')) {
						thisItem2.find(".navSubBox").slideDown().addClass('opened');
						navRowSubLnk.addClass('opened');
						navRowSubLnk.find('span').addClass('opened');
						thisItem2.siblings().find('.navSubBox').slideUp().removeClass('opened');
						thisItem2.siblings().find('.navRowSubLnk').removeClass('opened');
						thisItem2.siblings().find('.navRowSubLnk').find('span').removeClass('opened');
					}
					else{
						thisItem2.find(".navSubBox").slideUp().removeClass('opened');
						navRowSubLnk.find('span').removeClass('opened');
						navRowSubLnk.removeClass('opened');
					}
				})
			})
				
		}
	}

	$(window).on('resize', callback);

	callback();


	/*******************frqntlyQuSrch*******************/
		if ($('.frqntlyQuSrch').length) {
			var frqntlyQ = $('.frqntlyQuSrch');
			frqntlyQ.find('input').focus(function(){
				frqntlyQ.css('border-color' , '#3DC3EB');
			}).blur(
		        function(){
		            frqntlyQ.css('border-color' , '#E0E0E2');
		        });
		}


	/*******************ftrnewsReg*******************/
		if ($('.ftrnewsReg').length) {
			var ftrnewsReg = $('.ftrnewsReg');
			ftrnewsReg.find('input').focus(function(){
				ftrnewsReg.find('button').css({background: '#10A34A' , color: '#fff'});
			}).blur(
				function(){	
					if (ftrnewsReg.find('input').val().length === 0) {
			            ftrnewsReg.find('button').css({background: '#F5F7FA' , color: '#C6C6C8'});
					}
					else {
			            ftrnewsReg.find('button').css({background: '#10A34A' , color: '#fff'});
					}
		        });
		}


	/**************ProductNav_Link*******************/
		if ($('#prdctTabSec .ProductNav_Link').length) {
			$('.ProductNav_Link').click(function(){
				$(this).addClass('active');
				$(this).siblings().removeClass('active');
			})
		}



	/**********************labelInput Width**************/
		if ($('.formGroupDiv').length) {
			$('.formGroupDiv').each(function(){
				var formGroupDiv = $(this);
				var infoAdrsLablW = formGroupDiv.find('.infoAdrsLabl').width();
				var formGroupDivW = formGroupDiv.width();
				var setWidth = formGroupDivW - infoAdrsLablW;
				formGroupDiv.find('.infoAdrsInpt').width(setWidth);

			})
		}


	/******************number_counter*******************/
		if($('.counter-box').length){
		    var a = 0;
		    $(window).scroll(function() {
		      var oTop = $('.counter-box').offset().top - window.innerHeight;
		      if (a == 0 && $(window).scrollTop() > oTop) {
		        $('.counter').each(function() {
		          var $this = $(this),
		            countTo = $this.attr('data-count');
		          $({
		            countNum: $this.text()
		          }).animate({
		              countNum: countTo
		            },

		            {
		              duration: 2000,
		              easing: 'swing',
		              step: function() {
		                $this.text(Math.floor(this.countNum));
		              },
		              complete: function() {
		                $this.text(this.countNum);
		                //alert('finished');
		              }

		            });
		        });
		        a = 1;
		      }

		    });
		}


	/****************open side menu****************/
	    $(".opnMnuLink").click(function(){
	    	$(".navRow").addClass("openedMnu");
			$("body").css({overflow: "hidden"}).addClass('bodyOpened');
	    });
	    $(".clsMnuLink").click(function(){
	    	$(".navRow").removeClass("openedMnu");
			$("body").css({overflow: "auto"}).removeClass('bodyOpened');
	    });

	    $('.opnMinMnu').click(function(){
	    	$('.blgHdrMenu').addClass("openedMnu");
			$("body").css({overflow: "hidden"}).addClass('bodyOpened');
	    });
	    $(".clsMinMnu").click(function(){
	    	$(".blgHdrMenu").removeClass("openedMnu");
			$("body").css({overflow: "auto"}).removeClass('bodyOpened');
	    });

	    const $menu = $('.navRow');
	    const $minMenu = $('.blgHdrMenu');
		$(document).mouseup(e => {
		   if (!$menu.is(e.target) && $menu.has(e.target).length === 0  &&
		     !$minMenu.is(e.target) && $minMenu.has(e.target).length === 0){
		        $("body").css({overflow: "auto"}).removeClass('bodyOpened');
				$menu.removeClass("openedMnu");
				$minMenu.removeClass("openedMnu");
		   }
		});

	
	/*********************user menu*********************/
		if ($('.opnUserMnu').length) {
			$('.opnUserMnu').click(function(){
				$('.userMnuBox').slideToggle();
			})
		}


		if ($('.ordrPayHstry').length) {
			$('.ordrPayHstry h6').click(function(){
				$('.payHstryBx').slideToggle();
			})
		}


		if($('.blgHdrSrchLnk').length){
			$('.blgHdrSrchLnk').click(function(){
				$('.hdrSubMnuBox').slideDown();
				$('.blgHdrSrchBx').slideDown();

				$(document).mouseup(ev1 => {
				   if (!$blgHdrSrchBx.is(ev1.target) && $blgHdrSrchBx.has(ev1.target).length === 0 ){
							$('.hdrSubMnuBox').slideUp();
							$blgHdrSrchBx.slideUp();
				    }
				});
			})
		}


	/*************collaps***************/
		if ($(".frqntlyQusCrd").length) {
			$(".cardLink").click(function(){
				if ($(this).hasClass(("collapsed"))) {
					$(this).parent().removeClass("hdrOpend");
					$(this).parentsUntil('.frqntlyQusCrd').addClass("CrdOpend");
					$(this).find("span").addClass("collpsedSpan");
				}
				else{
					$(this).parent().addClass("hdrOpend");
					$(this).parentsUntil('.frqntlyQusCrd').removeClass("CrdOpend");
					$(this).find("span").removeClass('collpsedSpan');
				}
			})
		}
	
   
    /*******************slider****************/

    	if($('.topSliderBox').length) {
			var swiper = new Swiper(".topSliderBox .swiper-container", {
			    slidesPerView: 1 ,
		        centeredSlides: true,
		        spaceBetween: 10,
				grabCursor: true,
		        loop: true,
			    autoplay: true ,
			    autoplayTimeout: 5000,
				navigation: {
		          nextEl: ".swiper-button-next",
		          prevEl: ".swiper-button-prev",
		        },
		    });
			$(".topSliderBox .swiper-container").hover(function() {
			    (this).swiper.autoplay.stop();
			}, function() {
			    (this).swiper.autoplay.start();
			});

		}

		if ($(".proivdSwiper").length) {
		    var swiper = new Swiper(".proivdSwiper .swiper-container", {
			    slidesPerView: 5 ,
		        centeredSlides: true,
		        spaceBetween: 10,
				grabCursor: true,
		        loop: true,
			    autoplay: true,
			    autoplayTimeout: 5000,
			    breakpoints: {
			        '0': {
				    	slidesPerView: 1,
				    },  
				    '481': {
				    	slidesPerView: 2,
				    },
				    '576': {
				    	slidesPerView: 3,
				    },
				    '991': {
				    	slidesPerView: 4,
				    },
				    '1200': {
				    	slidesPerView: 5,
				    },
				},
		    });
		    lightGallery(document.getElementById("lightgallery"), {
			    speed: 500,
			});
		}

		if ($(".productSlider").length) {
		    if ($(window).width() > 767) {
		    	var swiperAdSwiper1 = new Swiper(".AdSwiper1", {
			        spaceBetween: 10,
			        direction: "vertical",
			        slidesPerView: 4,
			        freeMode: true,
			        watchSlidesProgress: true,
			    });
			    var swiper2 = new Swiper(".AdSwiper2", {
			        spaceBetween: 10,
			        slidesPerView: 1,
			        thumbs: {
			          swiper: swiperAdSwiper1,
			        },
			    });
		    }
		    else{
		    	var swiperAdSwiper1 = new Swiper(".AdSwiper1", {
			        spaceBetween: 10,
			        direction: "horizontal",
			        slidesPerView: 4,
			        freeMode: true,
			        watchSlidesProgress: true,
				    breakpoints: {
				        '0': {
					    	slidesPerView: 3,
					    },
					    '481': {
					    	slidesPerView: 4,
					    }
					},
			    });
			    var swiper2 = new Swiper(".AdSwiper2", {
			        spaceBetween: 10,
			        slidesPerView: 1,
			        thumbs: {
			          swiper: swiperAdSwiper1,
			        },
			    });
		    }
		}

		if ($(".mostSailSldr").length) {
		    var swiper = new Swiper(".mostSailSldr .swiper-container", {
			    slidesPerView: 5 ,
		        spaceBetween: 10,
				grabCursor: true,
				navigation: {
		          nextEl: ".swiper-button-next",
		          prevEl: ".swiper-button-prev",
		        },
			    breakpoints: {
			        '0': {
				    	slidesPerView: 1,
				    },  
				    '481': {
				    	slidesPerView: 2,
				    },
				    '576': {
				    	slidesPerView: 3,
				    },
				    '991': {
				    	slidesPerView: 4,
				    },
				    '1200': {
				    	slidesPerView: 5,
				    },
				},
		    });
		}

		if ($(".drnkGlshaSldr").length) {
		    var swiper = new Swiper(".drnkGlshaSldr .swiper-container", {
			    slidesPerView: 5 ,
		        spaceBetween: 10,
				grabCursor: true,
				navigation: {
		          nextEl: ".swiper-button-next",
		          prevEl: ".swiper-button-prev",
		        },
			    breakpoints: {
			        '0': {
				    	slidesPerView: 1,
				    },  
				    '481': {
				    	slidesPerView: 2,
				    },
				    '768': {
				    	slidesPerView: 3,
				    },
				    '992': {
				    	slidesPerView: 4,
				    },
				    '1200': {
				    	slidesPerView: 5,
				    },
				},
		    });
		}

		if ($(".prdctRltdSldr").length) {
		    var swiper = new Swiper(".prdctRltdSldr .swiper-container", {
			    slidesPerView: 5 ,
		        spaceBetween: 10,
				grabCursor: true,
			    breakpoints: {
			        '0': {
				    	slidesPerView: 1,
				    },  
				    '481': {
				    	slidesPerView: 2,
				    },
				    '768': {
				    	slidesPerView: 3,
				    },
				    '992': {
				    	slidesPerView: 4,
				    },
				    '1200': {
				    	slidesPerView: 5,
				    },
				},
		    });
		}


	/***********hdrSrchBox**********/
		$('.hdrSrchBox .srchDropInpt').on('click', function() {
			$(this).parent().next().slideDown('fast');
			$('.hdrSrchSubBx').slideDown();

			$(document).mouseup(ev => {
			   if (!$srchDropList.is(ev.target) && $srchDropList.has(ev.target).length === 0 ){
						$srchDropList.fadeOut().removeClass('openeed');
						$('body').removeClass('bodyOpened');
						$('.hdrSrchSubBx').slideUp();
			    }
			});

			$('.srchDropInpt').val('');
			$('.srchDropItem a').on('click', function(evnt1) {
				evnt1.preventDefault();
			    var text = $(this).html();
			    var txtA = $(this).parent();
			    txtA.parent().prev().find('.srchDropInpt').val(text);
			    $('.srchDropList').slideUp('fast');
				$('.hdrSrchSubBx').slideUp();
			});

		});	

	
	/***********************fowm wizard********************/
		var totalSteps = $(".FrmSteps li").length;

		$(".submit").on("click", function(){
		  return false; 
		});

		$(".FrmSteps li:nth-of-type(1)").addClass("active");
		$(".FrmCntanrWiz .form-container:nth-of-type(1)").addClass("active");

		$(".form-container").on("click", ".next", function() { 
		  $(".FrmSteps li").eq($(this).parents(".form-container").index() + 1).addClass("active"); 
		  $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");   
		});

		$(".form-container").on("click", ".back", function() {  
		  $(".FrmSteps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active"); 
		  $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY"); 
		});

	
	/*****************date picker*********************/
		if($("#datepicker1").length) {
			window.pd = $('#datepicker1').persianDatepicker({
	            altFormat: 'LLLL',
	            initialValue: false,
	            observer: true,
	            format: 'YYYY/MM/DD',
	            timePicker: {
	                enabled: false
	            }
	        });
		}

	
	/******************count-down*********************/
		if ($('.timerInput').length) {
			$(function () {
				jQuery.fn.extend({
			    	countdown: function () {
			            let min = 3, sec = 0
			            render(min, sec)
			            
			            const timer = setInterval(() => {
			            	if (min == 0 && sec == 0) {
			                	clearInterval(timer)
			                    return ;
			                }
			                
			            	sec = dealSec(sec)
			                min = dealMin(min, sec)
			                render(min, sec)
			            }, 1000)
			        },
			    })
			    
			    $('#countdown').countdown()
			})

			function dealSec (sec) {
			    const timeRange = [...Array(60).keys()].reverse()
				const idxNow = timeRange.indexOf(sec)
			    const idxNext = (idxNow + 1) % timeRange.length
			    return timeRange[idxNext]
			}

			function dealMin(min, sec) {
			    const timeRange = [...Array(60).keys()].reverse()
			    if (sec === 59) {
			    	const idxNow = timeRange.indexOf(min)
			        const idxNext = (idxNow + 1) % timeRange.length
			        return timeRange[idxNext]
			    }
			    return min
			}

			function render(min, sec) {
			    min  = ("00" + min).slice(-2)
			    sec  = ("00" + sec).slice(-2)
			    
			    $('#countdown').text(`${min}:${sec}`)
			}
		}

	
	/******************acordian*********************/
		if ($("#accordion").length) {
			$("#accordion").each(function(){
				var thisItem3 = $(this);
				var crdLink = $(this).find(".cardLink");
				var crdLinkParent = crdLink.parent()
				crdLink.click(function(){
					if (crdLink.hasClass("collapsed")) {
						thisItem3.addClass("CrdOpend");
						crdLink.find(".expandIconBx span").addClass("collpsedSpan");

						
						thisItem3.siblings().removeClass("CrdOpend");
						thisItem3.siblings().find(".expandIconBx span").removeClass("collpsedSpan");
					}
					else{
						crdLinkParent.addClass("hdrOpend");
						thisItem3.removeClass("CrdOpend");
						crdLink.find(".expandIconBx span").removeClass('collpsedSpan');
					}
				})
			})
		}
		


});



$(window).on('load' , function(){
    $('.material-icons-two-tone').css({opacity:'1' , maxWidth: 'auto'});	    	
    $('.material-icons-sharp').css({opacity:'1' , maxWidth: 'auto'});	    	
    $('.material-icons-outlined').css({opacity:'1' , maxWidth: 'auto'});	    	
    $('.material-icons-round').css({opacity:'1' , maxWidth: 'auto'});	    	
    $('.material-icons').css({opacity:'1' , maxWidth: 'auto'});		    	
}) 

