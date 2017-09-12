<?php

    function trusona_custom_login($url, $allow_wp_form) {

        $allow_wp_form = apply_filters('trusona_allow_wp_form', $allow_wp_form, $url);

        $data = '<div>';

        if ($allow_wp_form) {
            $data .= '<style type="text/css">form > p {display: none;} p#nav {display: none;}</style>';
        }

        $data .= '<a href="' . $url . '" alt="Login With Trusona" id="trusona_btn">Login with Trusona</a>';

        if (isset($_GET['trusona-openid-error'])) {
            $err_code = $_GET['trusona-openid-error'];
            $message  = TrusonaOpenID::$ERR_MES[$err_code];

            $data .= trusona_error_message($message);
        }

        if ($allow_wp_form) {
            $data .= '<div style="text-align: center;"><br/>';
            $data .= '<a href="#" style="font-size:smaller;color:#c0c0c0;" onclick="jQuery(\'form > p\').toggle();this.blur();return false;">Toggle Classic Login</a></div><br/>';
        }

        $data .= '</div>';

        return $data;
    }

    function trusona_error_message($message) {
        $str = '<div style="text-align:center;margin-top:2em;color:#907878;background-color:#f1e8e5;border:1px solid darkgray;width:100%;border-radius:3px;font-weight:bolder;">';
        $str .= '<p style="line-height:1.6em;">' . $message . '</p></div><br/>';

        return $str;
    }

    function compute_site_hash($url) {
        return sha1(parse_url($url, PHP_URL_HOST));
    }

?>
