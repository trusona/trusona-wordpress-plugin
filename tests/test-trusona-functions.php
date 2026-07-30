<?php

require_once __DIR__ . '/../includes/trusona-functions.php';

use PHPUnit\Framework\TestCase;

final class TestTrusonaFunctions extends TestCase
{
    public function test_is_production()
    {
      $this->assertTrue(trusona_is_production('https://idp.trusona.com'));
      $this->assertFalse(trusona_is_production('https://idp.staging.trusona.com'));
    }

    public function test_compute_site_hash()
    {
        $this->assertEquals(trusona_compute_site_hash(), sha1('www.tacoshrimp.com'));
    }
}

?>
