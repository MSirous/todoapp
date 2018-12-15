<?php

namespace App\Http\Controllers\TodoLists;

use App\Models\User;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

/**
 * Class AuthController
 *
 * @package \App\Http\Controllers\TodoLists
 */
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->Validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $http = new Client;

        $response = $http->post('http://todoapp.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
//                'refresh_token' => 'the--token',
                'client_id' => '2',
                'client_secret' => 'VaGnnZWHqYQm37B8YJNY84rP7VsaP0AtE1a0qlN9',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return response(['data' => json_decode((string) $response->getBody(), true)]);
    }

    public function login()
    {

    }
}
