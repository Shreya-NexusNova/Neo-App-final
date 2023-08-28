<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
 use App\Imports\UsersImport;
use Excel;
use PDF;
use Validator;
use Hash;
class HomeController extends Controller
{
    //
public function __construct(){
     
     }



   public function PrivacyPolicy(Request $request){
            return view('PrivacyPolicy');

        }

   public function Error(Request $request){
            return view('error',['message'=>'You dont have access to portal']);

        }


 
}