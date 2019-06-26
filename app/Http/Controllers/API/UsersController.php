<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public $successStatus = 200;
    public $loginAfterSignUp = true;
    //

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->isAdmin = 0;
        $user->password = bcrypt($request->password);
        $user->save();
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $user,
        ], 200);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }

    public function details()
    {
        // Get user from request
        return auth('api')->user();

    }

    public function linkedin(Request $request)
    {
        $email = $request->email;
        $linkedinID = $request->linkedinID;
        $name = $request->name;
        $username = $request->username;
        $app_secret = $request->secretKey;
        $secretKey = env('APP_SOCIAL_KEY', null);

        if ($app_secret === $secretKey) {
            $existingUser = User::where('email', $email)->first();

            if ($existingUser) {
                // log them in
                auth('api')->login($existingUser, true);
                $user = auth('api')->user();
                $success['token'] = $this->respondWithToken($user);
                $success['details'] = $user;
                $success['message'] = 'Login Successful';
                return response()->json(['success' => $success], $this->successStatus);
            } else {
                // create a new user

                $newUser = new User();
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->linked_id = $linkedinID;
                $newUser->save();
                auth('api')->login($newUser, true);
                $user = auth('api')->user();
                $success['token'] = $this->respondWithToken($user);
                $success['details'] = $user;
                $success['message'] = 'Login Successful';
                return response()->json(['success' => $success], $this->successStatus);
            }
        }

    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Pass $user object, and token $lifetime in days
     * Lifetime defaults to one year
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',

            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
