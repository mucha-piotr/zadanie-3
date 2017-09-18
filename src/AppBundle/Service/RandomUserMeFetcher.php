<?php
/**
 * Created by PhpStorm.
 * User: muszkin
 * Date: 18.09.2017
 * Time: 16:05
 */

namespace AppBundle\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RandomUserMeFetcher
{
    public function getUsers()
    {
        $client = new Client();
        
        $response = $client->request("GET","https://randomuser.me/api/",[
            "query" => [
                "inc" => "name",
                "results" => 100,
                "nat" => "GB"
            ]
        ]);
        
        try {
            $result = json_decode($response->getBody()->getContents());
        }catch (ClientException $exception){
            $result = null;
        }
        
        return $result;
    }
    
    public function generateNamesFromResults($array)
    {
        $names = [];
        foreach ($array->results as $result){
            $names[] = $result->name->first;
        }
        
        return $names;
    }
}