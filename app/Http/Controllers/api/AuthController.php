<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends ApiController
{
    //Register Admin
    public function registerAdmin(Request $request)
    {
        $messages = [
            'email.required' => 'Email field cannot be left blank.',
            'email.unique' => 'There is a record of the e-mail you entered..',
            'name.required' => 'Name field cannot be left blank.',
            'name.min' => 'Name cannot be less than 3 characters.',
            'surname.required' => 'Surname field cannot be left blank.',
            'password.required' => 'Please enter your password.',
            'c_password.required' => 'Please re-enter password.',
            'c_password.same' => 'Password repeat does not match.',
            'password.min' => 'Password cannot be less than 6 characters.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|numeric',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',

        ], $messages);
        if ($validator->fails()) {
            return $this->sendError('validation error.', $validator->errors());
        }
        if (!empty($request->img)) {
            $file =$request->file('img');
            $extension = $file->getClientOriginalExtension();
            $img = time().'.' . $extension;
            $file->move(public_path('images/profile/admins/'), $img);
            $data['image']= 'images/profile/admins/'.$img;
            $img='images/profile/admins/' . $img;
            }
            else{
                $img=null;
            }
        $admin = Admin::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'image' => $img,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);
        $user = Admin::find($admin->id);
        $newAdmin=User::create([
            'user_id'=>$user->id,
            'email'=> $user->email,
            'password'=>$user->password,
            'role_id'=>1
        ]);
        $message = 'Created Successfully';
        return $this->sendResponse($newAdmin, $message);
    }
    //Register Customer
    public function registerCustomer(Request $request)
    {
        $messages = [
            'email.required' => 'Email field cannot be left blank.',
            'email.unique' => 'There is a record of the e-mail you entered..',
            'name.required' => 'Name field cannot be left blank.',
            'name.min' => 'Name cannot be less than 3 characters.',
            'surname.required' => 'Surname field cannot be left blank.',
            'password.required' => 'Please enter your password.',
            'c_password.required' => 'Please re-enter password.',
            'c_password.same' => 'Password repeat does not match.',
            'password.min' => 'Password cannot be less than 6 characters.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|numeric',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',

        ], $messages);
        if ($validator->fails()) {
            return $this->sendError('validation error.', $validator->errors());
        }
        if (!empty($request->img)) {
            $file =$request->file('img');
            $extension = $file->getClientOriginalExtension();
            $img = time().'.' . $extension;
            $file->move(public_path('images/profile/customers/'), $img);
            $data['image']= 'images/profile/customers/'.$img;
            $img='images/profile/customers/' . $img;
            }
            else{
                $img=null;
            }
        $customer = Customer::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $img,
            'identity_number' => $request->identityNumber,
            'country_id' => $request->countryId,
            'gender' => $request->gender,
            'address' => $request->address,

        ]);
        $user = Customer::find($customer->id);
        $newCustomer=User::create([
            'user_id'=>$user->id,
            'email'=> $user->email,
            'password'=>$user->password,
            'role_id'=>3
        ]);
        $message = 'Created Successfully';
        return $this->sendResponse($newCustomer, $message);
    }
    /****LogIn Function*****/
    public function login(Request $request)
    {        
        $validator = Validator::make($request->all(), [
             'email' => 'required|email',
             'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Please check your e-mail and password.');
        }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            if ($auth->role_id == 1) {
                $auth['token'] = $auth->createToken('Admin', ['Admin'])->plainTextToken;
                $auth->role_id = 'Admin';
                $fullname=Admin::where('email','=',$request->email)->select('name as firstName','surname as lastName','image')->get();
            }
            else if ($auth->role_id == 2) {
                $auth['token'] = $auth->createToken('Employee', ['Employee'])->plainTextToken;
                $auth->role_id = 'Employee';
                $fullname=Employee::where('email','=',$request->email)->select('name as firstName','surname as lastName','image')->get();
            } 
            else if ($auth->role_id == 3) {
                $auth['token'] = $auth->createToken('Customer', ['Customer'])->plainTextToken;
                $auth->role_id = 'Teacher';
                $fullname=Customer::where('email','=',$request->email)->select('name as firstName','surname as lastName','image')->get();
            } 
            $n1=[] ;
            $img='https://www.ecommerce.com/';
            if ($fullname['0']['image']==null) {
                $img=null;
            }
            $n2=$n1+['firstName'=>$fullname['0']['firstName'],
            'lastName'=>$fullname['0']['lastName'],
            'img'=>$img . $fullname['0']['image'],
            'id'=>$auth['id'],
            'userId'=>$auth['user_id'],
            'roleId'=>$auth['role_id'],
            'token'=>$auth['token'],
            'password'=>$auth['password'],
            'username'=>$auth['email'],
            ] ;
            $message = 'Login successful';

            return $this->sendResponse($n2, $message);
        } else {
            return $this->sendError('Login failed.');
        }
    }
    /****LogOut Function*****/
    public function logOut(Request $request){
        try{
            $request->user()->tokens()->delete();
            return response()->json(['status'=>'true','message'=>"Checked Out",'data'=>[]]);
        } catch(\Exception $e){
            return response()->json(['status'=>'false','message'=>$e->getMessage(),'data'=>[]],500);
        }
    }
}
