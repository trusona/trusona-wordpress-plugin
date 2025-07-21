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
  if(!isset($header->alg)) {
    return NULL;
  }
  
  if($header->alg === HS_256) {
    return SHA_256;
  }
  else if($header->alg === HS_512) {
    return SHA_512;
  }

  return NULL;
}

function not_expired($payload) {
  if(!isset($payload->exp) || !is_numeric($payload->exp)) {
    return false;
  }
  // Trusona uses milliseconds for exp, so we need to divide by 1000
  return time() <= ($payload->exp / 1000);
}

function matches_issuer($payload) {
  return isset($payload->iss) && $payload->iss === ISSUER;
}

function is_valid_jwt($token, $secret)
{
  try {
    // Validate token format
    $parts = explode('.', $token);
    if(count($parts) !== 3) {
      return false;
    }
    
    list($first, $second, $third) = $parts;

    $header = json_decode(base64url_decode($first));
    if(!$header) {
      return false;
    }
    
    $algorithm = extract_algorithm($header);
    if(!$algorithm) {
      return false;
    }
    
    $payload = json_decode(base64url_decode($second));
    if(!$payload) {
      return false;
    }
    
    $signature = base64url_encode(hash_hmac($algorithm, "$first.$second", $secret, true));

    // Use hash_equals for constant-time comparison
    return hash_equals($signature, $third)
      && not_expired($payload)
      && matches_issuer($payload);
  }
  catch(Throwable $e) { // Catch Throwable for PHP 8 compatibility
    return false;
  }
}

?>