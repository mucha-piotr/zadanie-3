<?php
/**
 * Created by PhpStorm.
 * User: muszkin
 * Date: 18.09.2017
 * Time: 16:32
 */

namespace tests\AppBundle\Service;

use AppBundle\Service\RandomUserMeFetcher;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RandomUserMeFetcherTest extends WebTestCase
{
    
    public function testGetUsers()
    {
        $random = new RandomUserMeFetcher();
        
        $users = $random->getUsers();
        
        $this->assertInstanceOf("stdClass",$users);
    }

    /**
     * @depends testGetUsers
     */
    public function testGenerateNamesFromResults()
    {
        $random = new RandomUserMeFetcher();

        $users = $random->getUsers();
        $names = $random->generateNamesFromResults($users);
        
        $this->assertCount(100,$names);
    }
}