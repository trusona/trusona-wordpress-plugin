<?php
//
//
// JWT dependencies:
// -----------------
//   1. https://github.com/acodercat/php-jwk-to-pem
//      > composer require codercat/jwk-to-pem
//   2. https://github.com/firebase/php-jwt
//      > composer require firebase/php-jwt
//
require_once 'vendor/autoload.php';

use CoderCat\JWKToPEM\JWKConverter;
use Firebase\JWT\JWT;

const PROD_WELL_KNOWN_URL = 'https://gateway.trusona.net/oidc/.well-known/openid-configuration';
const UAT_WELL_KNOWN_URL = 'https://gateway.staging.trusona.net/oidc/.well-known/openid-configuration';

function is_valid($jwt, $env = true)
{
  try {
    $url = $env == true ? PROD_WELL_KNOWN_URL : UAT_WELL_KNOWN_URL;
    $jwk_arr = (array)json_decode(jwk_set_json($url));

    foreach ($jwk_arr['keys'] as $value) {
      $result = is_valid_jwt($value, $jwt);

      if($result) {
        return true;
      }
    }
  }
  catch(Exception $e) {
    return false;
  }

  return false;
}

function is_valid_jwt($key, $jwt)
{
  try {
    $jwkConverter = new JWKConverter();
    $publicJwk = $jwkConverter->toPEM((array)$key);
    $decoded = JWT::decode($jwt, $publicJwk, array('RS256'));
    return isset($decoded);
  }
  catch(Exception $e) {
    return false;
  }
}

function jwk_set_json($url)
{
  $json = json_decode(file_get_contents($url));
  return file_get_contents($json->jwks_uri);
}

?>