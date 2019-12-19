<?php

require_once 'vendor/autoload.php';
require_once 'includes/trusona-functions.php';
require_once 'fixture-functions.php';

use PHPUnit\Framework\TestCase;


final class TestTrusonaFunctions extends TestCase
{
    public function test_compute_site_hash()
    {
        $url = 'https://www.tacoshrimp.com/wp-admin?dipping_sauce=yesplease';
        $this->assertEquals(compute_site_hash($url), sha1('www.tacoshrimp.com'));
    }
}

?>