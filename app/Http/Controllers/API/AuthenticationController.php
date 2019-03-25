<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthenticationController extends BaseController
{
    //
    //
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users|string',
            'password' => 'required|string|min:8',
            'roll_no' => 'required|string|min:8|max:10|unique:users',
            'profile_pic' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if($request->hasfile('profile_pic')) {
            $filename = $request->file('profile_pic')->store('profile_pic', 'public');
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roll_no' => $request->get('roll_no'),
            'profile_pic' => $filename,
            'is_admin'  => 'no',
        ]);

        $success['token'] = $user->createToken('ChaiPani')->accessToken;
        $success['roll_no'] = $user->roll_no;
        $success['name'] = $user->name;

        //Client ID and Secret, Update this later.
        $success['client_id'] = 2;
        $success['client_secret'] = "O2PpVvgH6Y6zV5KoYSBnCVLZlD0aAUoKCB14S6AJ";

        return $this->sendResponse($success, 'User register successfully.');

    }

    //
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return $this->sendResponse($success, 'User Logged In successfully.');
        } else {
            return $this->sendResponse("Error", 'Invalid Credentials');

        }
    }
}
