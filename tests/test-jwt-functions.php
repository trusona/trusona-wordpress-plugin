<?php

require_once 'includes/jwt-functions.php';

use PHPUnit\Framework\TestCase;

final class TestJwtFunctions extends TestCase
{
  public function test_valid_token_sha512()
  {
    $jwt = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiI2NzU1ZjQzOS1kMTVhLTQzZGMtOGZhMS1iYTU3YjkyNTEwOTEiLCJhdWQiOiJpZHAudHJ1c29uYS5jb20iLCJuYmYiOjE1NzY3OTQyMTEsImlzcyI6ImlkcC50cnVzb25hLmNvbSIsImV4cCI6MTY5Njc5NzgxMSwiaWF0IjoxNTc2Nzk0MjExLCJqdGkiOiI2OTk5YjM2ZS0wNzU3LTRkMDYtODA5MS1iNTRlNDU1YzAzNDcifQ.Tx9hu6L7ugGI64ok3qjaj-bUaqTR4KnqwT2lOobSOfgKuGMcSAN6FwOg17hsnw8JFKpH8FHwHpYyEin84xQSRw';
    $this->assertTrue(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }

  public function test_valid_token_sha256()
  {
    $jwt = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI2NzU1ZjQzOS1kMTVhLTQzZGMtOGZhMS1iYTU3YjkyNTEwOTEiLCJhdWQiOiJpZHAudHJ1c29uYS5jb20iLCJuYmYiOjE1NzY3OTQyMTEsImlzcyI6ImlkcC50cnVzb25hLmNvbSIsImV4cCI6MTk5Njc5NzgxMSwiaWF0IjoxNTc2Nzk0MjExLCJqdGkiOiI2OTk5YjM2ZS0wNzU3LTRkMDYtODA5MS1iNTRlNDU1YzAzNDcifQ.pPZlP-Ajz8iQsiV_VEqrfVA8WfVnZ4agNxHxcjV4G1g';
    $this->assertTrue(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }

  public function test_expired_token()
  {
    $jwt = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiI2NzU1ZjQzOS1kMTVhLTQzZGMtOGZhMS1iYTU3YjkyNTEwOTEiLCJhdWQiOiJpZHAudHJ1c29uYS5jb20iLCJuYmYiOjE1NzY3OTQyMTEsImlzcyI6ImlkcC50cnVzb25hLmNvbSIsImV4cCI6MTQ5Njc5NzgxMSwiaWF0IjoxNTc2Nzk0MjExLCJqdGkiOiI2OTk5YjM2ZS0wNzU3LTRkMDYtODA5MS1iNTRlNDU1YzAzNDcifQ.Ku3i8ebogtedwKbFU3AvwXM5pDwiHV98oHyoaJgaZCptsHI51TbOwBQkqeWe8-jZcgwrLGyz4eBc39n9JeY9eg';
    $this->assertFalse(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }

  public function test_token_issued_in_future()
  {
    $jwt = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiI2NzU1ZjQzOS1kMTVhLTQzZGMtOGZhMS1iYTU3YjkyNTEwOTEiLCJhdWQiOiJpZHAudHJ1c29uYS5jb20iLCJuYmYiOjE1NzY3OTQyMTEsImlzcyI6ImlkcC50cnVzb25hLmNvbSIsImV4cCI6MTk5Njc5NzgxMSwiaWF0IjoxNjc2Nzk0MjExLCJqdGkiOiI2OTk5YjM2ZS0wNzU3LTRkMDYtODA5MS1iNTRlNDU1YzAzNDcifQ.6v5CXXqbkZ6cuyJk1K2qASItSvLk64UyxFoYYrFN8zRPd-JEgn5qZD36gJL9MYl4XkC5TXeX0z8e7Tw7I-fjKg';
    $this->assertFalse(is_valid_jwt($jwt, 'ZxNgBxchmExqsoIqs57Xn3mciRtnVAumDSbSSkeden'));
  }
}

?>