<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use Hash;
use PDF;


  use Excel;
  use File;
  use App\Exports\ExportIssues;



 use Validator;
class MainController extends Controller
{
    //
public function __construct(){

}

        public function MyIssues(){

     return view('MyIssues');

    }
    public function LogIssue(){

     return view('LogIssue');

    }
    public function LocationReports(){
        $locations = DB::table('location')->where('is_deleted', 0)->get();
        $issueTypes = DB::table('issue_type')->where('is_deleted', 0)->get();

        $data = [];

        foreach ($locations as $location) {
            $locationData = [
                'label' => $location->location_name,
                'data' => [],
            ];

            foreach ($issueTypes as $issueType) {
                $count = DB::table('issue')
                    ->where('location', $location->id)
                    ->where('issue_type_id', $issueType->id)
                    ->where('is_deleted', 0)
                    ->count();

                $locationData['data'][] = $count;
            }

            $data[] = $locationData;
        }

        return view('LocationReports', ['locations' => $locations, 'issueTypes' => $issueTypes, 'data' => $data]);
    }




    public function EditIssue(){


     return view('EditIssue');

    }


    public function DeleteIssue(Request $request){


          DB::Table('issue')->where('id',$request->id)->update(['is_deleted'=>1,'deleted_at'=>date('Y-m-d H:i:s')]);
          return redirect()->back()->with('success','Issue Deleted Successfully');
    }




     public function exportIssues(Request $request)
    {

        return Excel::download(new ExportIssues($request), 'IssuesData.xlsx');

    }



     public function InsertIssue(Request $request){
        $image='';

        if($request->file!=''){
                $image =   time() . rand(0, 1000) . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path() . '/uploads', $image);
        }


                     $data=array(
                                'user_id'=>Auth::id(),
                                'status'=>$request->status,
                                'location'=>$request->location,
                                'staff_firstname'=>$request->staff_firstname,
                                'staff_lastname'=>$request->staff_lastname,
                                'staff_role'=>$request->staff_role,
                                'email'=>$request->email,
                                'phone'=>$request->phone,
                                'file'=>$image,
                                'issue_type_id'=>$request->issue_type_id,
                                'issue_sub_id'=>$request->issue_sub_id,
                                'issue_detail'=>$request->issue_detail,

                       );



                     DB::Table('issue')->insert($data);



    return redirect()->back()->with('success','Issue Added Successfully');



    }


    public function UpdateIssue(Request $request){

  $image='';
        if($request->file!=''){
                $image =   time() . rand(0, 1000) . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path() . '/uploads', $image);

    }else{
      $image=$request->hidden_file;
    }


           $data=array(


                                'status'=>$request->status,
                                'location'=>$request->location,
                                'staff_firstname'=>$request->staff_firstname,
                                'staff_lastname'=>$request->staff_lastname,
                                'staff_role'=>$request->staff_role,
                                'email'=>$request->email,
                                'phone'=>$request->phone,
                                'file'=>$image,
                                'issue_type_id'=>$request->issue_type_id,
                                'issue_sub_id'=>$request->issue_sub_id,
                                'issue_detail'=>$request->issue_detail,
                                'updated_at'=>date('Y-m-d H:i:s'),


                        );


                     DB::Table('issue')->where('id',$request->id)->update($data);

     return redirect()->back()->with('success','Issue Updated Successfully');



    }




     public function Location(){

     return view('Location');

    }
    public function AddLocation(){

     return view('AddLocation');

    }

    public function EditLocation(){


     return view('EditLocation');

    }


    public function DeleteLocation(Request $request){


          DB::Table('location')->where('id',$request->id)->update(['is_deleted'=>1,'deleted_at'=>date('Y-m-d H:i:s')]);
          return redirect()->back()->with('success','Location Deleted Successfully');


    }








     public function InsertLocation(Request $request){
   $data=array(

                                'location_name'=>$request->location_name,

                        );



                     DB::Table('location')->insert($data);



    return redirect()->back()->with('success','Location Added Successfully');



    }


    public function UpdateLocation(Request $request){


           $data=array(

                              'location_name'=>$request->location_name,



                        );


                     DB::Table('location')->where('id',$request->id)->update($data);

     return redirect()->back()->with('success','Location Updated Successfully');



    }








  public function StaffRole(){

     return view('StaffRole');

    }
    public function AddStaffRole(){

     return view('AddStaffRole');

    }

    public function EditStaffRole(){


     return view('EditStaffRole');

    }


    public function DeleteStaffRole(Request $request){


          DB::Table('staff_role')->where('id',$request->id)->update(['is_deleted'=>1,'deleted_at'=>date('Y-m-d H:i:s')]);
          return redirect()->back()->with('success','Staff Role Deleted Successfully');


    }








     public function InsertStaffRole(Request $request){
                        $data=array(
                                 'staff_role_name'=>$request->staff_role_name,
                         );

                   DB::Table('staff_role')->insert($data);
                   return redirect()->back()->with('success','Staff Role Added Successfully');

    }


    public function UpdateStaffRole(Request $request){


           $data=array(
                           'staff_role_name'=>$request->staff_role_name,
                             );


                     DB::Table('staff_role')->where('id',$request->id)->update($data);

     return redirect()->back()->with('success','Staff Role Updated Successfully');

      }








    public function IssueType(){

     return view('IssueType');

    }
    public function AddIssueType(){

     return view('AddIssueType');

    }

    public function EditIssueType(){


     return view('EditIssueType');

    }


    public function DeleteIssueType(Request $request){


          DB::Table('issue_type')->where('id',$request->id)->update(['is_deleted'=>1,'deleted_at'=>date('Y-m-d H:i:s')]);
          return redirect()->back()->with('success','Issue Type Deleted Successfully');


    }








     public function InsertIssueType(Request $request){
   $data=array(

                                'type_name'=>$request->type_name,

                        );



                     DB::Table('issue_type')->insert($data);



    return redirect()->back()->with('success','Issue Type Added Successfully');



    }

    public function UpdateIssueType(Request $request){



           $data=array(

                              'type_name'=>$request->type_name,



                        );


                     DB::Table('issue_type')->where('id',$request->id)->update($data);

     return redirect()->back()->with('success','Issue Type Updated Successfully');



    }







    public function IssueTypeDetail($id){

     return view('IssueTypeDetail',['id'=>$id]);

    }
    public function AddIssueTypeDetail(){

     return view('AddIssueTypeDetail');

    }

    public function EditIssueTypeDetail(){


     return view('EditIssueTypeDetail');

    }


    public function DeleteIssueTypeDetail(Request $request){


          DB::Table('issue_type_detail')->where('id',$request->id)->update(['is_deleted'=>1,'deleted_at'=>date('Y-m-d H:i:s')]);
          return redirect()->back()->with('success','Issue Type Detail Deleted Successfully');


    }








     public function InsertIssueTypeDetail(Request $request){
   $data=array(
                                  'issue_type_id'=>$request->issue_type_id,
                                'type_detail_name'=>$request->type_detail_name,

                        );



                     DB::Table('issue_type_detail')->insert($data);



    return redirect()->back()->with('success','Issue Type Detail Added Successfully');



    }

    public function UpdateIssueTypeDetail(Request $request){



           $data=array(

                              'type_detail_name'=>$request->type_detail_name,



                        );


                     DB::Table('issue_type_detail')->where('id',$request->id)->update($data);

     return redirect()->back()->with('success','Issue Type Detail Updated Successfully');



    }



public function GetIssueDetail(Request $request){
  $qry=DB::table('issue_type_detail')->where('issue_type_id',$request->id)->get();

return response()->json($qry);
}



    public function Users(){

     return view('users');

    }
    public function AddUsers(){

     return view('AddUsers');

    }

    public function EditUsers(){


     return view('EditUsers');

    }


    public function DeleteUsers(Request $request){


          DB::Table('users')->where('id',$request->id)->update(['is_deleted'=>1]);
          return redirect()->back()->with('success','Users Deleted Successfully');


    }
    public function ShowUsers(Request $request){


          $qry=DB::Table('users')->where('id',$request->id)->first();
          return response()->json($qry);


    }


      public function UpdateUserPassword(Request $request){


          DB::Table('users')->where('id',$request->id)->update(
                ['password'=>Hash::make($request->password),'password_verified'=>date('Y-m-d H:i:s')]
            );
          return redirect()->back()->with('success','Password Changed Successfully');


    }





     public function InsertUsers(Request $request){





    $check=DB::table('users')->where('email',$request->email)->first();
            if($check!=''){
                            return redirect()->back()->withInput();
            }
           $data=array(

                                'name'=>$request->name,
                                'email'=>$request->email,
                                'password'=>Hash::make($request->password),
                                'role'=>$request->role,


                        );



                     DB::Table('users')->insert($data);






    return redirect()->back()->with('success','Users Added Successfully');



    }

    public function UpdateUsers(Request $request){



    $check=DB::table('users')->where('id','!=',$request->id)->where('email',$request->email)->first();
            if($check!=''){
                       return redirect()->back()->with('success','Email Already Exist');
            }
           $data=array(

                              'name'=>$request->name,
                                'email'=>$request->email,

                                'role'=>$request->role,


                        );


                     DB::Table('users')->where('id',$request->id)->update($data);

     return redirect()->back()->with('success','Users Updated Successfully');



    }



}
