<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class LoginsController extends Controller
{
    private $status_code = 200;

    public function signup (Request $request) {
        $validator = Validator::make($request->all(), [
            "first_name" => "required",
            "last_name"  => "required",
            "gender"     => "required",
            "birth_date" => "required",
            "mobile_number" => "required",
            "email"      => "required|email",
            "password"   => "required"
        ]);

        if($validator->fails()) {
            return response()->json(["status"=>"failed",
                                     "message"=>"validation_error",
                                     "errors"=>$validator->errors()
        ]);
        }

        $userDetails = array("first_name" => $request->first_name,
                             "last_name" =>$request->last_name,
                             "gender" => $request->gender,
                             "birth_date" => $request->birth_date,
                             "mobile_number"=>$request->mobile_number,
                             "email"=>$request->email,
                             "password"=>md5($request->password)
        )

        $user_status = User::where("email", $request->email)->first();

        if(!is_null($user_status)) {
            return response()->json(["status"=>"failed",
                                     "success"=>false,
                                     "message"=>"此邮箱已被注册过！"
        ]);
        }

        $user = User::create($userDetails);

        if(!is_null($user)) {
            return response()->json(["status"=>$this->status_code,
                                     "success"=>true,
                                     "message"=>"您已注册成功！"，
                                     "data"=>$user
        ]);
        }

        else {
            return response()->json(["status"=>"failed",
                                     "success"=>false,
                                     "message"=>"注册失败！"
            ])
        }
    }


    public function login(Request $request) {
      $validator = Validator::make($request->all(), [
          "emial" => "required|email",
          "password" => "required"
      ]);
      
      if($validator->fails()) {
          return response->json(["status"=>"failed",
                                 "validation_error"=> $validator->errors()
      ]);
      }

      $email_status = User::where("email", $request->email)->first();

      if(!is_null($email_status)) {
          $password_status = User::where("email", $request->email)->where("password", md5($request->password))->first();

          if(!is_null($password_status)) {
              $user = $this->showUser($request->email);

              return response()->json(["status"=>$this->status_code,
                                       "success"=>true,
                                       "message"=>"您已成功登录！",
                                       "data"=>$user
          ]);
          }

          else {
              return response()->json(["status"=>"failed",
                                       "success"=>false,
                                       "message"=>"密码错误，无法登录！"
          ]);
          }
        }

        else {
            return response()->json(["status"=>"failed",
                                     "success"=>false,
                                     "message"=>"您使用的邮箱不存在，无法登录!"
        ]);
        }
    }


    public function showUser($email) {
        $user = array();

        if($email!="") {
            $user = User::where("email", $email)->first();
            return $user;
        }
    }
}
