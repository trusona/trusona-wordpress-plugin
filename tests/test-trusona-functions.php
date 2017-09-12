<?php

require_once(dirname(dirname(__FILE__))."/includes/trusona-functions.php");

final class TestTrusonaFunctions extends PHPUnit_Framework_TestCase
{
    public function test_compute_site_hash()
    {
        $url = 'https://www.tacoshrimp.com/wp-admin?dipping_sauce=yesplease';
        $this->assertEquals(compute_site_hash($url), sha1('www.tacoshrimp.com'));
    }
}
