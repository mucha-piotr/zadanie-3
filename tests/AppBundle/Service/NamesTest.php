<?php
/**
 * Created by PhpStorm.
 * User: muszkin
 * Date: 18.09.2017
 * Time: 16:31
 */

namespace tests\AppBundle\Service;


use AppBundle\Service\Names;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NamesTest extends WebTestCase
{
    private $defaultNames = [
        "adam", "piotr", "marcin", "sławek", "andrzej", "patrycja", "monika"
    ];
    
    private $group;
    
    public function testGroupNames()
    {
        $names = new Names();
        
        $group = $names->groupNames($this->defaultNames);
        
        $this->assertArrayHasKey("a",$group);
        $this->assertArrayHasKey("m",$group);
        $this->assertArrayHasKey("p",$group);
        $this->assertArrayHasKey("s",$group);
        $this->assertArrayNotHasKey("z",$group);
        $this->assertArrayNotHasKey("x",$group);
        
    }

    /**
     * @depends testGroupNames
     */
    public function testPrettyArray()
    {
        $names = new Names();
        $group = $names->groupNames($this->defaultNames);
        $pretty = $names->prettyArray($group);
        
        $this->assertContains("a adam,andrzej - 2",$pretty[0]);
    }
}