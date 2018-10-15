<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $clientId = 'f7679-35c20-15b5d-48c04-1968b-0d816';
        $clientSecret = '90fa4-827eb-4c828-1691e-476a9-b1836';

        $client = new \Shutterstock\Api\Client($clientId, $clientSecret);
        $imageResponse = $client->get('images/search', array('query' => $request['search']));
        $images = $imageResponse->getBody()->jsonSerialize()['data'];

        return view('index', compact('images'));
    }

    public function upload(Request $request)
    {
        dd($request['images']);
        $file = Input::file('file');
        $data = file_get_contents($file->getRealPath());

        $emails = explode(' ', $data);
        self::sendEmails();
    }

    public function sendEmails()
    {
        dd(343);
    }
}
