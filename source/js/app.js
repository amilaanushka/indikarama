$(document).ready(function() {
    "use strict";

    $('#contact-form').submit(function(e) {
        e.preventDefault();
        var dataString = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'email/send.php',
            data: dataString,
            dataType: 'json',
            cache: false,
            beforeSend: function(){
                $('#btnSubmit').html('Sending...').attr('disabled', true).addClass('disabled');
                //$('#btnReset').attr('disabled', true).addClass('disabled');
            },
            success: function(respond){
                if (respond.success) {
                    swal({
                        title: 'Successful',
                        text: "Thank you for submitting your Message. ",
                        type: 'success',
                        confirmButtonColor: '#74c148',
                        allowOutsideClick: false
                    });
                    resetForm();
                }else{
                    swal({
                        title: 'Submission Error!',
                        text: "Your submission process failed. Please try again.",
                        type: 'error',
                        confirmButtonColor: '#e25656',
                        allowOutsideClick: false
                    });
                    
                }
            },
            complete: function(){
                $('#btnSubmit').html('Submit').attr('disabled', false).removeClass('disabled');
                resetForm();
                // $('#btnReset').attr('disabled', false).removeClass('disabled');
            }
        });
    });

    function resetForm(){
        $(':input','#contact-form')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');
    }
    
 
    /**
     * Parallax Section
     */
    ( function() {
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        var testMobile = isMobile.any();

        $('.wpc_row_parallax').each(function() {
            var $this = $(this);
            var bg    = $this.find('.wpc_parallax_bg');

            $(bg).css('backgroundImage', 'url(' + $this.data('bg') + ')');

            if (testMobile == null) {
                $(bg).addClass('not-mobile');
                $(bg).removeClass('is-mobile');
                $(bg).parallax('50%', 0.4);
            }
            else {
                //$(bg).css('backgroundAttachment', 'inherit');
                $(bg).removeClass('not-mobile');
                $(bg).addClass('is-mobile');

            }

        });

    })();



    // $window.bind("scroll", function(e) {
    //     var pos = $window.scrollTop();
    //     //var top = $element.offset().top;
    //     if (pos > 80) {
    //         $('.header > .inner').addClass("fixed");
    //     } else {
    //         $('.header > .inner').removeClass("fixed");
    //     }

    //     if (pos > 90) {
    //         $('.header > .inner').addClass('slidDown');
    //     }else{
    //         $('.header > .inner').removeClass('slidDown');
    //     }

    // });



    /**
     * Back To Top
     */
    ( function() {
        $('#btt').fadeOut();
        $(window).scroll(function() {
            if($(this).scrollTop() != 0) {
                $('#btt').fadeIn();
            } else {
                $('#btt').fadeOut();
            }
        });

        $('#btt').click(function() {
            $('body,html').animate({scrollTop:0},800);
        });
    })();
});


