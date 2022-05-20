$(window).scroll(function(){
    
            if( $(window).scrollTop() >= 0 && $(window).scrollTop() + $(window).height() != $(document).height()){
                $(".floatSrchIcn").css({opacity: "1" , zIndex: "8"
                                 }).addClass("animate__animated animate__fadeInUp");
                $(".floatMenuBox").css({opacity: "1" , zIndex: "8"
                                 }).addClass("animate__animated animate__fadeInUp");
                $(".prdctFloatBox").css({opacity: "1" , zIndex: "8"
                                 }).addClass("animate__animated animate__fadeInUp");
            }
            else{
                $(".floatSrchIcn").css({ opacity: "0" , zIndex: "-10"
                                }).removeClass("animate__animated animate__fadeInUp");
                $(".floatMenuBox").css({ opacity: "0" , zIndex: "-10"
                                }).removeClass("animate__animated animate__fadeInUp");
                $(".prdctFloatBox").css({ opacity: "0" , zIndex: "-10"
                                }).removeClass("animate__animated animate__fadeInUp");
            }


            var top = $(window).scrollTop() + $(window).height();

                if ($('.glzrImgList').length) {
                    var isVisible1 = top > $('.glzrImgList').offset().top;
                    $('.glzrImgList .imgLeft').toggleClass('animate__animated animate__fadeInLeft' , isVisible1);
                    $('.glzrImgList .imgCenter').toggleClass('animate__animated animate__fadeInDown' , isVisible1);
                    $('.glzrImgList .imgRight').toggleClass('animate__animated animate__fadeInUp' , isVisible1);
                }


                if ($('.OurHstryList').length) {
                    var isVisible2 = top > $('.OurHstryList').offset().top;
                    $('.OurHstryList .hstryLineOne .OrHstryLstBox').toggleClass('animate__animated animate__fadeInRight' , isVisible2);
                    $('.OurHstryList .hstryLineTwo .OrHstryLstBox').toggleClass('animate__animated animate__fadeInRight' , isVisible2);
                }


                if ($('.ShowRoomList li').length) {
                    var isVisible3 = top > $('.ShowRoomList li').offset().top;
                    $('.ShowRoomList li').toggleClass('animate__animated animate__fadeInDown' , isVisible3);
                }


                if ($('.OurTeamBxList li').length) {
                    var isVisible4 = top > $('.OurTeamBxList li').offset().top;
                    $('.OurTeamBxList li').toggleClass('animate__animated animate__swing' , isVisible4);
                }


                if ($('.ContactInfo').length) {
                    var isVisible5 = top > $('.ContactInfo').offset().top;
                    $('.ContactInfo .NumberInfo').toggleClass('animate__animated  animate__fadeInLeft' , isVisible5);
                    $('.ContactInfo .SocialsInfo').toggleClass('animate__animated  animate__fadeInRight' , isVisible5);
                }


                if ($('.SendEmailBox').length) {
                    var isVisible6 = top > $('.SendEmailBox').offset().top;
                    $('.SendEmailBox').toggleClass('animate__animated animate__fadeInDown' , isVisible6);
                }



        })
