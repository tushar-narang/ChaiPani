<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $filename = "http://s3.us-east-2.amazonaws.com/chaipaniapp/chaipaniapp/1553547943.png";
        //Storing Image into EC2
        if($request->hasfile('profile_pic')) {
            //Storing the correct file name in the given folder
            $filename = env('AWS_BUCKET')."/".time().".".$request->profile_pic->getClientOriginalExtension();
            $image = $request->file('profile_pic');
            Storage::disk('s3')->put($filename, file_get_contents($image), 'public');
            $filename = Storage::disk('s3')->url(env('AWS_BUCKET')."/".$filename);
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
            $clientIP = \Request::getClientIp(true);
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            Log::emergency("User : ".$request['email']." has logged in from IP: ".$clientIP);
            return $this->sendResponse($success, 'User Logged In successfully.');
        } else {
            $clientIP = \Request::getClientIp(true);
            Log::emergency("Failed Attempt To Log into  : ".$request['email']." From IP: ".$clientIP);
            return $this->sendError("Error", 'Invalid Credentials', 500);

        }
    }

    public function index(){
        return $this->sendResponse("Success", "Hi");
    }
}
