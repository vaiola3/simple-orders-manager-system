<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAPIController extends Controller
{
    public function login(Request $request)
    {
        $response_content = array (
            'error' => true,
            'message' => 'Credenciais Inválidas!',
            'payload' => array ()
        );
        
        $response_status = 401;
        
        $credentials = $request->only('email', 'password');

        if ($this->isValidCredentials($credentials))
        {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            $response_content['error'] = false;
            $response_content['message'] = 'Logged successful!';
            $response_content['payload'] = array (
                'user' => $user,
                'api-token' => $token
            );

            $response_status = 200;
        }

        return response()->json($response_content, $response_status);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();

        $response_content = array (
            'error' => false,
            'message' => 'Logout successful!'
        );

        return response()->json($response_content);
    }

    public function verify(Request $request)
    {
        $response_content = array (
            'error' => false,
            'authenticated' => true,
            'payload' => Auth::user()
        );

        return response()->json($response_content);
    }

    private function isValidCredentials(array $credentials)
    {
        return Auth::attempt($credentials);
    }
}
