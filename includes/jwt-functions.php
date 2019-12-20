<?php

const SHA_256 = 'sha256';
const SHA_512 = 'sha512';
const HS_256 = 'HS256';
const HS_512 = 'HS512';

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
  $obj = json_decode(base64url_decode($header));

  if($obj->alg === HS_256) {
    return SHA_256;
  }
  else if($obj->alg === HS_512) {
    return SHA_512;
  }

  return NULL;
}

function not_expired($payload) {
  $obj = json_decode(base64url_decode($payload));
  return time() < $obj->exp;
}

function issued_in_past($payload) {
  $obj = json_decode(base64url_decode($payload));
  return time() >= $obj->iat;
}

function is_valid_jwt($token, $secret)
{
  try {
    $arr = explode('.', $token, 3);
    $algorithm = extract_algorithm($arr[0]);
    $signature = base64url_encode(hash_hmac($algorithm, "{$arr[0]}.{$arr[1]}", $secret,true));

    return $signature === $arr[2] 
      && not_expired($arr[1]) 
      && issued_in_past($arr[1]);
  }
  catch(Exception $e) {
    return false;
  }
}

?>