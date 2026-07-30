<?php

require_once __DIR__ . '/../includes/jwt-functions.php';

use PHPUnit\Framework\TestCase;

final class TestJwtFunctions extends TestCase
{
  const SECRET = 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden';

  // Nonce claim embedded in the sample tokens below.
  const TOKEN_NONCE = 'f3169ae582a4f2256e1383b4c280160c7c0a3c30';

  const VALID_SHA512 = 'eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiI4MTBkNDU0Yy0xN2Y5LTQyYTItODFmYi0xMDYyOWQxNzhkOTAiLCJzdWIiOiI1YWFjMThmNy0wZTNiLTQwYWYtODJkMS1mYTYxMmE2Yzk2MWQiLCJ1cGRhdGVkX2F0IjoxNTYwODY4MTU0NDg1LCJpc3MiOiJpZHAudHJ1c29uYS5jb20iLCJleHAiOjE5NzY4MjEyMDg0MDQsImlhdCI6MTU3NjgxNzYwODQwNCwibm9uY2UiOiJmMzE2OWFlNTgyYTRmMjI1NmUxMzgzYjRjMjgwMTYwYzdjMGEzYzMwIn0.bIhUj7Sc68-IZGe3tzy--pKrXUaK1-t2CKsErGZ8AH6j6ZnVYQzh42ZDu4gp2kdgWRrX6tweEvUTYWin7M8vAQ';

  const VALID_SHA256 = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI4MTBkNDU0Yy0xN2Y5LTQyYTItODFmYi0xMDYyOWQxNzhkOTAiLCJzdWIiOiI1YWFjMThmNy0wZTNiLTQwYWYtODJkMS1mYTYxMmE2Yzk2MWQiLCJ1cGRhdGVkX2F0IjoxNTYwODY4MTU0NDg1LCJpc3MiOiJpZHAudHJ1c29uYS5jb20iLCJleHAiOjE5NzY4MjEyMDg0MDQsImlhdCI6MTU3NjgxNzYwODQwNCwibm9uY2UiOiJmMzE2OWFlNTgyYTRmMjI1NmUxMzgzYjRjMjgwMTYwYzdjMGEzYzMwIn0.PCgH572c1aBHtAaTx6hjLNmTPLE6JuorlxGRsAuq_5U';

  const EXPIRED = 'eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiI4MTBkNDU0Yy0xN2Y5LTQyYTItODFmYi0xMDYyOWQxNzhkOTAiLCJzdWIiOiI1YWFjMThmNy0wZTNiLTQwYWYtODJkMS1mYTYxMmE2Yzk2MWQiLCJ1cGRhdGVkX2F0IjoxNTYwODY4MTU0NDg1LCJpc3MiOiJpZHAudHJ1c29uYS5jb20iLCJleHAiOjE0NzY4MjEyMDg0MDQsImlhdCI6MTU3NjgxNzYwODQwNCwibm9uY2UiOiJmMzE2OWFlNTgyYTRmMjI1NmUxMzgzYjRjMjgwMTYwYzdjMGEzYzMwIn0.BGg_e-g2kPLh9cRv6bV_UfJPx1GYMIMr5rpvfvENi6rcvPonRxpf9jlUzDC6WJ0xoc3xb906jGpKrw2SadfrxQ';

  public function test_valid_token_sha512()
  {
    $this->assertTrue(trusona_is_valid_jwt(self::VALID_SHA512, self::SECRET));
  }

  public function test_valid_token_sha256()
  {
    $this->assertTrue(trusona_is_valid_jwt(self::VALID_SHA256, self::SECRET));
  }

  public function test_expired_token()
  {
    $this->assertFalse(trusona_is_valid_jwt(self::EXPIRED, self::SECRET));
  }

  public function test_wrong_secret_is_rejected()
  {
    $this->assertFalse(trusona_is_valid_jwt(self::VALID_SHA256, 'not-the-secret'));
  }

  public function test_malformed_token_is_rejected()
  {
    $this->assertFalse(trusona_is_valid_jwt('not.a.jwt', self::SECRET));
    $this->assertFalse(trusona_is_valid_jwt('only-two.parts', self::SECRET));
  }

  public function test_valid_token_with_matching_nonce()
  {
    $this->assertTrue(trusona_is_valid_jwt(self::VALID_SHA256, self::SECRET, self::TOKEN_NONCE));
  }

  public function test_valid_token_with_wrong_nonce_is_rejected()
  {
    $this->assertFalse(trusona_is_valid_jwt(self::VALID_SHA256, self::SECRET, 'a-different-nonce'));
  }

  public function test_nonce_binding_is_optional_when_null()
  {
    $this->assertTrue(trusona_is_valid_jwt(self::VALID_SHA256, self::SECRET, null));
  }
}

?>
