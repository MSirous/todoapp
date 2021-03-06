<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthController
 *
 * @package \App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
//                'refresh_token' => 'the--token',
                'client_id' => '1',
                'client_secret' => 'VaGnnZWHqYQm37B8YJNY84rP7VsaP0AtE1a0qlN9',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return response(['data' => json_decode((string) $response->getBody(), true)]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
        {
            return response([
                'status' => 'error',
                'message' => 'User Not found!'
                ]);
        }
        if (Hash::check($request->password, $user->password))
        {

        }
    }
}
