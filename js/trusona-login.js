/**
 * Trusona WordPress Plugin - Login JavaScript
 */
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Center the login form if Trusona is enabled
        if ($('.trusona-employee-button').length) {
            $('#login').width('350px').addClass('login_center');
        }
        
        // Toggle classic login form handler
        $(document).on('click', '.trusona-toggle-classic', function(e) {
            e.preventDefault();
            $('form > p').toggle();
            $('.user-pass-wrap').toggle();
            $('#user_pass').prop('disabled', function(i, v) { return !v; });
            this.blur();
            return false;
        });
    });
})(jQuery);