<?php

const SHA_256 = 'sha256';
const SHA_512 = 'sha512';
const HS_256 = 'HS256';
const HS_512 = 'HS512';

const ISSUER = 'idp.trusona.com';

function base64url_encode($data)
{
  $b64 = base64_encode($data);
  $url = strtr($b64, '+/', '-_');
  return rtrim($url, '=');
}

function base64url_decode($data, $strict = false)
{
  $b64 = strtr($data, '-_', '+/');
  return base64_decode($b64, $strict);
}

function extract_algorithm($header) {
  if($header->alg === HS_256) {
    return SHA_256;
  }
  else if($header->alg === HS_512) {
    return SHA_512;
  }

  return NULL;
}

function not_expired($payload) {
  return time() <= ($payload->exp / 1000);
}

function matches_issuer($payload) {
  return $payload->iss === ISSUER;
}

function is_valid_jwt($token, $secret)
{
  try {
    list($first, $second, $third) = explode('.', $token, 3);

    $algorithm = extract_algorithm(json_decode(base64url_decode($first)));
    $payload = json_decode(base64url_decode($second));
    $signature = base64url_encode(hash_hmac($algorithm, "$first.$second", $secret, true));

    return $signature === $third
      && not_expired($payload)
      && matches_issuer($payload);
  }
  catch(Exception $e) {
    return false;
  }
}

?>