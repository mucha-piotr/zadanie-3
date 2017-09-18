<?php
/**
 * Created by PhpStorm.
 * User: muszkin
 * Date: 18.09.2017
 * Time: 16:14
 */

namespace AppBundle\Service;


class Names
{
    public function groupNames($names = [])
    {
        $alphabet = range('a','z');
        
        $group = [];
        
        foreach ($alphabet as $letter){
            foreach ($names as $name){
                if (substr($name,0,1) == $letter){
                    $group[$letter][] = $name;
                }
            }
        }
        
        return $group;
    }
    
    public function prettyArray($names)
    {
        $return = [];
        foreach ($names as $key => $letter){
            $all = implode(',',$letter);
            $count = count($letter);
            $return[] = "{$key} {$all} - {$count}";
        }
        
        return $return;
    }
    
}