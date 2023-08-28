
@extends('layouts.header')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')
<?php





if(Auth::user()->role=='user'){
$myIssues=DB::table('issue')->where('user_id',Auth::id())->where('is_deleted',0)->count();
$resolvedIssues=DB::table('issue')->where('user_id',Auth::id())->where('status','Resolved')->where('is_deleted',0)->count();
$unresolvedIssues=DB::table('issue')->where('user_id',Auth::id())->where('status','Unresolved')->where('is_deleted',0)->count();
$todayIssues=DB::table('issue')->where('user_id',Auth::id())->where('created_at','>=',date('Y-m-d 00:00:00'))->where('created_at','<=',date('Y-m-d 23:59:59'))->where('is_deleted',0)->count();
    $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id')->where('i.created_at','>=',date('Y-m-d 00:00:00'))->where('i.created_at','<=',date('Y-m-d 23:59:59')) ->where('i.user_id',Auth::id()) ->where('i.is_deleted',0)->orderBy('i.id','desc')->get();

}
else{
 $myIssues=DB::table('issue')->where('is_deleted',0)->count();
 $todayIssues=DB::table('issue')->where('created_at','>=',date('Y-m-d 00:00:00'))->where('created_at','<=',date('Y-m-d 23:59:59'))->where('is_deleted',0)->count();
$resolvedIssues=DB::table('issue') ->where('status','Resolved')->where('is_deleted',0)->count();
$unresolvedIssues=DB::table('issue') ->where('status','Unresolved')->where('is_deleted',0)->count();
 $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name') ->leftjoin('location as l','l.id','=','i.location')->where('i.created_at','>=',date('Y-m-d 00:00:00'))->where('i.created_at','<=',date('Y-m-d 23:59:59'))->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id')  ->where('i.is_deleted',0)->orderBy('i.id','desc')->get();

}

$users=DB::Table('users')->where('is_deleted',0)->count();
?>
   <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-header-dark " >
                    <div class="content content-full">
                        <div class="row pt-3">
                            <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                                <h1 class="text-white mb-0">
                                    <span class="font-w300">Dashboard</span>
                                    <span class="font-w400 font-size-lg text-white-75 d-block d-md-inline-block">Welcome {{Auth::user()->name}}</span>
                                </h1>
                            </div>
                            <div class="col-md py-3 d-md-flex align-items-md-center justify-content-md-end text-center">
                                <a href="{{url('log-issue')}}" class="btn btn-alt-primary mr-1">
                                    <i class="fa fa-plus mr-1"></i> Log Issue

                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="bg-white" >
                    <div class="content content-full">
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt bg-light px-4 push">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0)">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <!-- END Breadcrumb -->




                        <!-- Quick Stats -->
                        <div class="row">
                            <div class="col-md ">
                                <a class="block block-rounded block-bordered" href="javascript:void(0)">
                                    <div class="block-content p-2">
                                        <div class="py-5 text-center bg-body-light rounded">
                                            <div class="font-size-h2 font-w700 mb-0 text-black">{{$myIssues}}</div>
                                            <div class="font-size-sm font-w600 text-uppercase">Total Issues</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md ">
                                <a class="block block-rounded block-bordered" href="javascript:void(0)">
                                    <div class="block-content p-2">
                                        <div class="py-5 text-center bg-body-light rounded">
                                            <div class="font-size-h2 font-w700 mb-0 text-black">{{$todayIssues}}</div>
                                            <div class="font-size-sm font-w600 text-uppercase">Today Issues</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                              <div class="col-md ">
                                <a class="block block-rounded block-bordered" href="javascript:void(0)">
                                    <div class="block-content p-2">
                                        <div class="py-5 text-center bg-body-light rounded">
                                            <div class="font-size-h2 font-w700 mb-0 text-black">{{$resolvedIssues}}</div>
                                            <div class="font-size-sm font-w600 text-uppercase">Resolved</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                              <div class="col-md ">
                                <a class="block block-rounded block-bordered" href="javascript:void(0)">
                                    <div class="block-content p-2">
                                        <div class="py-5 text-center bg-body-light rounded">
                                            <div class="font-size-h2 font-w700 mb-0 text-black">{{$unresolvedIssues}}</div>
                                            <div class="font-size-sm font-w600 text-uppercase">Unresolved</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @if(Auth::user()->role=='admin')
                            <div class="col-md   ">
                                <a class="block block-rounded block-bordered" href="javascript:void(0)">
                                    <div class="block-content p-2">
                                        <div class="py-5 text-center bg-body-light rounded">
                                            <div class="font-size-h2 font-w700 mb-0 text-black">{{$users}}</div>
                                            <div class="font-size-sm font-w600 text-uppercase">Users</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif

                        </div>
                        <!-- END Quick Stats -->

                        <!-- People and Tickets -->
                        <div class="row row-deck">
                            <div class="col-xl-12  invisible" data-toggle="appear">
                                <!-- People -->
                                <div class="block block-rounded block-bordered block-mode-loading-refresh">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">Today Issues</h3>
                                        <div class="block-options">

                                        </div>
                                    </div>
                                    <div class="block-content table-responsive">
                                        <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                            <thead>
                                                <tr class="text-uppercase">
                                                                 @if(Auth::user()->role=='admin')
                                            <th style="min-width: 120px"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=u.name" class="
                                                ">Added By</a></th>
                                                @endif
                                            <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=it.type_name" class="
                                                ">Type  </a></th>



                                                   <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=l.location_name" class="
                                                ">Location  </a></th>


                                                <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.staff_firstname" class="
                                                ">Staff   </a></th>

                                                <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.email" class="
                                                ">Email  </a></th>
                                                <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.phone" class="
                                                ">Phone  </a></th>

                                                     <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.status" class="
                                                ">Status  </a></th>
                                                <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                          @foreach($qry as $q)
                                                <tr>
                                                      @if(Auth::user()->role=='admin')
                                                  <td>{{$q->name}}</td>
                                                  @endif
                                            <td class="font-w600">
                                                  {{$q->type_name}}
                                            </td>

                                                    <td>{{$q->location_name}}</td>

                                                   <td>{{$q->staff_firstname}} {{$q->staff_lastname}}</td>

                                                   <td>{{$q->email}}</td>
                                                   <td>{{$q->phone}}</td>
                                                     <td>
                                            @if($q->status=='Resolved')
                                                <div class="badge badge-success">Resolved</div>
                                                @else
                                                <div class="badge badge-danger">Unresolved</div>
                                                @endif
                                            </td>
                                            <td>    <a type="button" href="{{url('edit-issue')}}?id={{$q->id}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-eye"></i>
                                                    </a></td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END People -->
                            </div>

                        </div>
                        <!-- END People and Tickets -->

                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


@endsection('content')
