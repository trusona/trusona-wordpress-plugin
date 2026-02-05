<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function trusona_is_production($url)
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

    $data .= '<div><a href="' . esc_url($url) . '" alt="Login With Trusona" class="trusona-employee-button">Login with Trusona</a></div>';

    // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Display-only, no data modification
    if (isset($_GET['trusona-openid-error'])) {
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Display-only, no data modification
        $err_code = intval(wp_unslash($_GET['trusona-openid-error']));
        if (isset(TrusonaOpenID::$ERR_MES[$err_code])) {
            $message = TrusonaOpenID::$ERR_MES[$err_code];
            $data .= trusona_error_message($message);
        }
    }

    if ($allow_wp_form) {
        $data .= '<div style="text-align: center;"><br/>';
        $data .= '<a href="#" class="trusona-toggle-classic" style="font-size:smaller;color:#c0c0c0;">Toggle Classic Login</a></div><br/>';
    }

    $data .= '</div>';

    return $data;
}

function trusona_error_message($message)
{
    $str = '<div style="text-align:center;margin-top:2em;color:#907878;background-color:#f1e8e5;border:1px solid darkgray;width:100%;border-radius:3px;font-weight:bolder;">';
    $str .= '<p style="line-height:1.6em;">' . esc_html($message) . '</p></div><br/>';

    return $str;
}

function trusona_compute_site_hash()
{
    return sha1(wp_parse_url(home_url(), PHP_URL_HOST));
}

?>