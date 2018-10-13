<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $clientId = 'f7679-35c20-15b5d-48c04-1968b-0d816';
        $clientSecret = '90fa4-827eb-4c828-1691e-476a9-b1836';

        $client = new \Shutterstock\Api\Client($clientId, $clientSecret);

        $imageResponse = $client->get('images/search', array('query' => 'puppies'));

        $images = $imageResponse->getBody()->jsonSerialize()['data'];

        dd($images);
    }
}
