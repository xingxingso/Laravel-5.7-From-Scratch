<?php  

namespace App\Services;

class Twitter 
{
    protected $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }
}
