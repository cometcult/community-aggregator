var FB_user;

 window.fbAsyncInit = function() {
    FB.init({
        appId      : '1408863152698002',
        status     : true,
        xfbml      : false
    });

    FB.XFBML.parse(document.querySelector('footer'));

    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            FB.api('/me', function (response) {
                FB_user = response;
                Functions.facebookAuthorized(response);
            });
        } else {
            FB_user = null;
        }
    });
};


var Functions = {
    // have the pop-up align right if element is in the 2nd half of the screen
    alignDescription: function(element) {
        element.each(function() {
            var elementOffsetLeft = $(this).position().left,
                documentWidth = $('body').width(),
                windowHeight = $(window).height(),
                windowOffsetTop = $(window).scrollTop(),
                elementOffsetTop = $(this).position().top - windowOffsetTop;
            if ( elementOffsetLeft > 0.6 * documentWidth ) {
                $(this).addClass('right');
            }
            if ( elementOffsetTop > 0.38 * windowHeight) {
                $(this).addClass('bottom');
            }
        });
    },
    swapTitles: function() {
        var titles = ['entrepreneurs ', 'designers', 'artists ', 'journalists', 'architects', 'creatives', 'photographers', 'marketers', 'builders', 'dancers', 'DJs', 'athletes ', 'astronauts', 'paleontologist', 'plumbers', 'painters', 'art directors', 'developers', 'philosophers ', 'singers', 'politicians', 'writers', 'doctors', 'engineers', 'astrologists'];

        var titleSpan = $('#title'),
            len = titles.length,
            index = 0;

        function swapTitle () {
            if (index >= len) {
                index = 0;
            }
            titleSpan.text(titles[index++]);
            window.setTimeout(swapTitle, 250);
        }
        window.setTimeout(swapTitle, 250);
    },
    updateTextareaCounter: function () {
        var l = $(this).val().length;
        if (l > 140) {
            $(this).val(prevText);
        } else {
            prevText = $(this).val();
            $('.bio .counter').text(140 - l);
        }
    },
    checkFormValidation: function () {
        if (Functions.validateForm()) {
            $('section.form .add-to-list button').prop('disabled', false);
        } else {
            $('section.form .add-to-list button').prop('disabled', true);
        }
    },
    validateForm: function () {
        if (!FB_user) {
            return false;
        }
        var inputs = $('section.form input[required="required"], section.form textarea[required="required"]');
        var textarea = $('section.form textarea');
        if (textarea.val() > 140) {
            return false;
        }
        var emptyInputs = inputs.filter(function () { return !$(this).val().length; });
        if (emptyInputs.length) {
            return false;
        }
        return true;
    },
    facebookAuthorized: function (user)  {
        console.log(user);
        $('section.form').addClass('authorized');
        $('.connect-facebook .not-authorized').hide();
        var container = $('.connect-facebook .authorized').show();

        container.find('.fb-avatar').prop('src', 'http://graph.facebook.com/' + user.id + '/picture?width=120&height=120');
        container.find('.fb-name').text(user.first_name);
        container.find('.fb-age').text(Functions.calcAge(user.birthday));

        container.find('input#member_fbId').val(user.id);
        container.find('input#member_name').val(user.first_name);
        container.find('input#member_age').val(Functions.calcAge(user.birthday));

        setTimeout(Functions.checkFormValidation);
    },
    deauthorizeFacebook: function () {
        FB.api('/me/permissions/', 'DELETE');
        $('.connect-facebook .authorized').hide();
        $('.connect-facebook .not-authorized').show();
    },
    calcAge: function (date) {
        var now = new Date();
        var birth = new Date(date);

        var age = now.getFullYear() - birth.getFullYear();

        if (now.getMonth() < birth.getMonth()) {
            return --age;
        }
        if (now.getMonth() === birth.getMonth() && now.getDate() < birth.getDate()) {
            return --age;
        }
        return age;
    }
};

var Site = {
    init: function() {
        var element = $('.people li');;
        // Functions.swapTitles();
        setTimeout(function () {
            Functions.alignDescription(element);
            Functions.checkFormValidation();
        });
        Functions.swapTitles();
        $(window).resize( function() { Functions.alignDescription(element) });

        var prevText = '';

        $('.bio textarea').on('change keypress keydown keyup input', Functions.updateTextareaCounter);
        $('section.form input, section.form textarea').on('change keypress keydown keyup input', function () {
            Functions.checkFormValidation();
        });

        $('.connect-facebook button').click(function (e) {
            e.preventDefault();
             FB.login(function (response) {
                if (response.authResponse) {
                    FB.api('/me', function (response) {
                        FB_user = response;
                        Functions.facebookAuthorized(response);
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {scope: 'user_birthday'});
        });

        $('.join .button').click(function (e) {
            e.preventDefault();
            $('section.form').addClass('visible');
        });

        if ($('section.form .error').length) {
            $('section.form').addClass('visible');
        }

        $('img').unveil();
    },
};

$(document).ready(function() {
    Site.init();
});