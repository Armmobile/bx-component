function Login() {
    var self = this;

    //classes
    this.inputsBox           = 'hsb__inputs-box';
    this.inputsBoxVisible    = 'hsb__inputs-box_visible';
    this.inputItem           = 'hsb__input-item';
    this.signInIconInvisible = 'hsb__icon_invisible';
    this.errClass            = 'hsb__inputs-box_blinkError';
    this.knownUserBoxVisible = 'hsb__known-user-box_visible';
    this.wrapMobile          = 'header-signin-wrapper_mobile';
    this.wrapDesktop         = 'header-signin-wrapper_desktop';

    //targets
    this.signupButton     = $('.hsb__signup-button');
    this.signoutButton    = $('.known-user-box__sign-out-btn');
    this.signupInputsBox  = $('.hsb__inputs-box');
    this.knownUserBox     = $('.hsb__known-user-box');
    this.knownUserNameBox = $('.known-user-box__name');
    this.login            = $('input[name=login]');
    this.password         = $('input[name=password]');

    //methods
    this.init = function () {
        checkAuthorization();
        setActionSignInBtn();
        setActionSignOutBtn();
        setActionCloseSignInBoxByEmptyClick();
        setActionSignInKeypress();
    };

    function setActionSignInBtn() {
        self.signupButton.click(function (e) {
            self.signupInputsBox.toggleClass(self.inputsBoxVisible);
            self.signupButton.toggleClass(self.signInIconInvisible);
            e.stopPropagation();

            var prefix = getDesktopMobilePrefix();
            setTimeout(function () {
                $(prefix + ' .' + self.inputsBox + ' > input:first-child').focus();
            }, 300);
        });
    }

    function setActionSignOutBtn() {
        self.signoutButton.click(function () {
            $.ajax({
                url:     '/local/ajax/signout.php',
                success: function () {
                    self.knownUserBox.removeClass(self.knownUserBoxVisible);
                    self.signupButton.removeClass(self.signInIconInvisible);
                }
            });
        });
    }

    function setActionCloseSignInBoxByEmptyClick() {
        $(document).click(function (e) {
            if (self.signupInputsBox.hasClass(self.inputsBoxVisible) && !$(e.target).hasClass(self.inputItem)) {
                self.signupInputsBox.toggleClass(self.inputsBoxVisible);
                self.signupButton.toggleClass(self.signInIconInvisible);
            }
        });
    }

    function setActionSignInKeypress(e) {
        $('.' + self.inputsBox + ' > input').bind('keypress', function (e) {

            var prefix = getDesktopMobilePrefix(),
                user   = $(prefix + ' .' + self.inputsBox + ' > input[name=login]').val(),
                pass   = $(prefix + ' .' + self.inputsBox + ' > input[name=password]').val();

            if (e.which == 13) {
                $.ajax({
                    url:     '/local/ajax/signin.php',
                    data:    {
                        LOGIN:    user,
                        PASSWORD: pass
                    },
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.TYPE == 'SUCCESS') {
                            $('header').click();    // close inputs
                            $(e.target).blur();
                            self.signupButton.addClass(self.signInIconInvisible);
                            showKnownUser(data.LOGIN);
                        }
                        else if (data.TYPE == 'ERROR') {
                            showAuthError();
                        }
                    }
                });
            }
        });

    }

    function showAuthError() {
        self.signupInputsBox.addClass(self.errClass);

        setTimeout(function () {
            self.signupInputsBox.removeClass(self.errClass);
        }, 100);
    }

    function showKnownUser(userName) {
        self.knownUserNameBox.text(userName);
        self.knownUserBox.addClass(self.knownUserBoxVisible);
        self.signupButton.addClass(self.signInIconInvisible)
    }

    function checkAuthorization() {
        $.ajax({
            url:     '/local/ajax/checkauth.php',
            success: function (data) {
                if ((data) && (data.length < 300)) {
                    showKnownUser(data);
                }
            }
        });

    }

    function isMobile() {
        var res     = false;
        var display = $('.header-signin-wrapper_desktop').css('display');

        if (display == 'none') {
            res = true;
        }
        else {
            res = false;
        }

        return res;
    }

    function getDesktopMobilePrefix() {
        var prefix;
        if (isMobile())
            prefix = '.' + self.wrapMobile;
        else
            prefix = '.' + self.wrapDesktop;

        return prefix;
    }



}


$(document).ready(function () {
    var login = new Login();
    login.init();
});








