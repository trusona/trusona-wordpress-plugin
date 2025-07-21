<?php

require_once __DIR__ . '/../includes/jwt-functions.php';

use PHPUnit\Framework\TestCase;

final class TestJwtFunctions extends TestCase
{
  public function test_valid_token_sha512()
  {
    $jwt = 'eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiI4MTBkNDU0Yy0xN2Y5LTQyYTItODFmYi0xMDYyOWQxNzhkOTAiLCJzdWIiOiI1YWFjMThmNy0wZTNiLTQwYWYtODJkMS1mYTYxMmE2Yzk2MWQiLCJ1cGRhdGVkX2F0IjoxNTYwODY4MTU0NDg1LCJpc3MiOiJpZHAudHJ1c29uYS5jb20iLCJleHAiOjE5NzY4MjEyMDg0MDQsImlhdCI6MTU3NjgxNzYwODQwNCwibm9uY2UiOiJmMzE2OWFlNTgyYTRmMjI1NmUxMzgzYjRjMjgwMTYwYzdjMGEzYzMwIn0.bIhUj7Sc68-IZGe3tzy--pKrXUaK1-t2CKsErGZ8AH6j6ZnVYQzh42ZDu4gp2kdgWRrX6tweEvUTYWin7M8vAQ';
    $this->assertTrue(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }

  public function test_valid_token_sha256()
  {
    $jwt = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI4MTBkNDU0Yy0xN2Y5LTQyYTItODFmYi0xMDYyOWQxNzhkOTAiLCJzdWIiOiI1YWFjMThmNy0wZTNiLTQwYWYtODJkMS1mYTYxMmE2Yzk2MWQiLCJ1cGRhdGVkX2F0IjoxNTYwODY4MTU0NDg1LCJpc3MiOiJpZHAudHJ1c29uYS5jb20iLCJleHAiOjE5NzY4MjEyMDg0MDQsImlhdCI6MTU3NjgxNzYwODQwNCwibm9uY2UiOiJmMzE2OWFlNTgyYTRmMjI1NmUxMzgzYjRjMjgwMTYwYzdjMGEzYzMwIn0.PCgH572c1aBHtAaTx6hjLNmTPLE6JuorlxGRsAuq_5U';
    $this->assertTrue(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }

  public function test_expired_token()
  {
    $jwt = 'eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiI4MTBkNDU0Yy0xN2Y5LTQyYTItODFmYi0xMDYyOWQxNzhkOTAiLCJzdWIiOiI1YWFjMThmNy0wZTNiLTQwYWYtODJkMS1mYTYxMmE2Yzk2MWQiLCJ1cGRhdGVkX2F0IjoxNTYwODY4MTU0NDg1LCJpc3MiOiJpZHAudHJ1c29uYS5jb20iLCJleHAiOjE0NzY4MjEyMDg0MDQsImlhdCI6MTU3NjgxNzYwODQwNCwibm9uY2UiOiJmMzE2OWFlNTgyYTRmMjI1NmUxMzgzYjRjMjgwMTYwYzdjMGEzYzMwIn0.BGg_e-g2kPLh9cRv6bV_UfJPx1GYMIMr5rpvfvENi6rcvPonRxpf9jlUzDC6WJ0xoc3xb906jGpKrw2SadfrxQ';
    $this->assertFalse(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }
}

?>