<?php

function is_production($url)
{
  return strpos($url, '.staging.') === FALSE;
}

function trusona_custom_login($url, $allow_wp_form)
{
    $allow_wp_form = apply_filters('trusona_allow_wp_form', $allow_wp_form, $url);

    $data = '<div>';

    if ($allow_wp_form) {
        $data .= '<style type="text/css">form > p {display: none;} p#nav {display: none;} .user-pass-wrap {display: none;}</style>';
    }

    $data .= '<div><a href="' . $url . '" alt="Login With Trusona" class="trusona-employee-button">Login with Trusona</a></div>';

    if (isset($_GET['trusona-openid-error'])) {
        $err_code = $_GET['trusona-openid-error'];
        $message  = TrusonaOpenID::$ERR_MES[$err_code];

        $data .= trusona_error_message($message);
    }

    if ($allow_wp_form) {
        $data .= '<div style="text-align: center;"><br/><script>jQuery(document).ready(function() { jQuery(\'#login\').width(\'350px\').addClass(\'login_center\'); });</script>';
        $data .= '<a href="#" style="font-size:smaller;color:#c0c0c0;" onclick="jQuery(\'form > p\').toggle();jQuery(\'.user-pass-wrap\').toggle();jQuery(\'#user_pass\').prop(\'disabled\',false);this.blur();return false;">Toggle Classic Login</a></div><br/>';
    }

    $data .= '</div>';

    return $data;
}

function trusona_error_message($message)
{
    $str = '<div style="text-align:center;margin-top:2em;color:#907878;background-color:#f1e8e5;border:1px solid darkgray;width:100%;border-radius:3px;font-weight:bolder;">';
    $str .= '<p style="line-height:1.6em;">' . $message . '</p></div><br/>';

    return $str;
}

function compute_site_hash()
{
    return sha1(parse_url(home_url(), PHP_URL_HOST));
}

?>