<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\User;

class UserController extends ApiController
{
    /*********************Employee************************/
    //Add Employee
    public function CreateEmployee(Request $request)
    {
       $user = auth()->user();
       if($user->tokenCan('Admin')){
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
          $file->move(public_path('images/profile/employee/'), $img);
          $data['image']= 'images/profile/employee/'.$img;
          $img='images/profile/employee/' . $img;
          }
          else{
              $img=null;
          }
       $employee = Employee::create([
           'name' => $request->name,
           'surname' => $request->surname,
           'telephone' => $request->telephone,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'image' => $img,
           'identity_number' => $request->identityNumber,
           'country_id'=>$request->countryId,
           'mother_name'=>$request->motherName,
           'father_name'=>$request->fatherName,
           'gender'=>$request->gender,
           'place_of_birth'=>$request->placeOfBirth,
           'birth_date'=>$request->birthDate,
           'address'=>$request->address,
       ]);
       $user = Employee::find($employee->id);
       User::create([
          'user_id'=>$user->id,
          'email'=> $user->email,
          'password'=>$user->password,
          'role_id'=>2
       ]);
       $message = 'Employee added successfully';
           return $this->sendResponse($employee, $message);
       }
           return response()->json(['success'=>false]);
    } 
    //Delete Employee
    public function deleteEmployee($id)
    {
        $user = auth()->user();
        if($user->tokenCan('Admin')){
        try {
            $employeeId =Employee::leftJoin('users','employees.id', '=','users.user_id')
                ->where('employees.id', $id); 
                $userId=User::where('user_id', $id)->delete();                           
                $deleteEmployee=$employeeId->delete();
                $message = "Employee Deleted.";
            return $this->sendResponse($deleteEmployee, $message);
        } catch (\Exception $é) {
            $message = "Something went wrong.";
            return $this->sendError($message);
        }
        }
        return response()->json(['success'=>false]);
    }
}
