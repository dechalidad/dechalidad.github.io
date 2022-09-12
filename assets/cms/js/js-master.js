
$( document ).ready( function(){
    
    $('.overlay-back').on('click', function () { 
        $(".hidden-box.login-userid").removeClass('active')
        $(".hidden-box.login-face").removeClass('active')
        $('.section-right .box-left').removeClass('hidden')
    });
    $('.trigger-face').on('click', function () { 
        $(".hidden-box.login-userid").removeClass('active')
        $(".hidden-box.login-face").addClass('active')
        $('.section-right .box-left').addClass('hidden')
    });
    $('.trigger-email').on('click', function () { 
        $(".hidden-box.login-face").removeClass('active')
        $(".hidden-box.login-userid").addClass('active')
        $('.section-right .box-left').addClass('hidden')
    });
    $('.create-meeting-trigger').on('click', function () { 
        $(".create-meeting-frame").addClass('active')
    });
    $('.cancel-meeting-trigger').on('click', function () { 
        $(".create-meeting-frame").removeClass('active')
    });
});