<?php

namespace App\Exports;
 
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use Auth;
class ExportIssues implements FromView
{
    protected $request;

 function __construct($request) {
        $this->request = $request;
 }

public function view(): View
{      

 

if(sizeof($_GET)>0){

$orderby='desc';
$field='i.id';
if(isset($_GET['orderBy'])){
$orderby=$_GET['orderBy'];
$field=$_GET['field'];
}

$where='';
if(isset($_GET['date']) && $_GET['date']!=''){
$date=explode(' to ',$_GET['date']);
$from_date=$date[0].' 00:00:00';
$to_date=@$date[1]!=''?$date[1]:$date[0];
$where.=" and i.created_at>='$from_date' and i.created_at<='$to_date 23:59:59'";
}

if(isset($_GET['location']) && $_GET['location']!=''){
$location=$_GET['location'];
$where.=" and i.location='$location'  ";
 }


if(isset($_GET['issue_type_id']) && $_GET['issue_type_id']!=''){
$issue_type_id=$_GET['issue_type_id'];
$where.=" and i.issue_type_id='$issue_type_id'  ";
 }

 

     if(Auth::user()->role=='admin'){
     $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name')->whereRaw("i.is_deleted=0 $where") ->leftjoin('staff_role as s','s.id','=','i.staff_role')->leftjoin('location as l','l.id','=','i.location')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id')  ->orderBy($field,$orderby)->get(); 
 }
 else{
      $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name')->whereRaw("i.is_deleted=0 $where")->leftjoin('staff_role as s','s.id','=','i.staff_role') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id') ->where('i.user_id',Auth::id()) ->orderBy($field,$orderby)->get(); 
 
 }
}
 else{
    if(Auth::user()->role=='admin'){
$qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('staff_role as s','s.id','=','i.staff_role')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id')  ->where('i.is_deleted',0)->orderBy('i.id','desc')->get(); 
 }
 else{
    $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('staff_role as s','s.id','=','i.staff_role')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id') ->where('i.user_id',Auth::id()) ->where('i.is_deleted',0)->orderBy('i.id','desc')->get(); 
 }
 }
 
 
    return view('exports.ExportIssues', [
        'qry' => $qry
    ]);
 }
}