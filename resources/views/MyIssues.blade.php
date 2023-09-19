  @extends('layouts.header')
  @extends('layouts.sidebar')
  @extends('layouts.footer')
  @section('content')


  <?php


$limit=10;

if(isset($_GET['limit'])){
    $limit=$_GET['limit'];
}



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
     $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name')->whereRaw("i.is_deleted=0 $where")->leftjoin('staff_role as s','s.id','=','i.staff_role') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id')  ->orderBy($field,$orderby)->paginate($limit);
 }
 else{
      $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name')->whereRaw("i.is_deleted=0 $where") ->leftjoin('staff_role as s','s.id','=','i.staff_role')->leftjoin('location as l','l.id','=','i.location')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id') ->where('i.user_id',Auth::id()) ->orderBy($field,$orderby)->paginate($limit);

 }
}
 else{
    if(Auth::user()->role=='admin'){
$qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('staff_role as s','s.id','=','i.staff_role')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id')  ->where('i.is_deleted',0)->orderBy('i.id','desc')->paginate($limit);
 }
 else{
    $qry=DB::table('issue as i')->select('i.*','u.name','l.location_name','it.type_name','itd.type_detail_name','s.staff_role_name') ->leftjoin('location as l','l.id','=','i.location')->leftjoin('staff_role as s','s.id','=','i.staff_role')->leftjoin('issue_type as it','it.id','=','i.issue_type_id')->leftjoin('issue_type_detail as itd','itd.id','=','i.issue_sub_id')->leftjoin('users as u','u.id','=','i.user_id') ->where('i.user_id',Auth::id()) ->where('i.is_deleted',0)->orderBy('i.id','desc')->paginate($limit);
 }
 }
 ?>
  <!-- Main Container -->
  <main id="main-container">
      <!-- Hero -->
      <div class="bg-header-dark">
          <div class="content content-full">
              <div class="row pt-3">
                  <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                      <h1 class="text-white mb-0">
                          <span class="font-w300">Issues</span>

                      </h1>
                  </div>
                  <div class="col-md py-3 d-md-flex align-items-md-center justify-content-md-end text-center">
                      <a href="{{url('log-issue')}}" class="btn btn-alt-primary mr-1">
                          <i class="fa fa-plus mr-1"></i>Add Issue

                      </a>

                  </div>
              </div>
          </div>
      </div>
      <!-- END Hero -->

      <!-- Page Content -->
      <div class="bg-white">
          <div class="content content-full">
              <!-- Breadcrumb -->
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-alt bg-light px-4 push">
                      <li class="breadcrumb-item">
                          <a href="{{url('/')}}">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Issues</li>
                  </ol>
              </nav>
              <!-- END Breadcrumb -->


              <!-- People -->
              <div class="block block-rounded block-bordered block-mode-loading-refresh">
                  <div class="block-header border-bottom">
                      <h3 class="block-title">Issues List</h3>
                      <div class="block-options">
                          <a class="btn btn-alt-success"
                              href="{{url('export-issues')}}?{{$_SERVER['QUERY_STRING']}}">Export</a>
                      </div>
                  </div>
                  <div class="block-content">

                      <form>
                          <div class="row">
                              <div class="col-lg-4">

                                  <div class="form-group  ">
                                      <label>Select Daterange</label>
                                      <input type="text" class="js-flatpickr form-control bg-white"
                                          id="example-flatpickr-range" value="{{@$_GET['date']}}" name="date"
                                          placeholder="Select Date Range" data-mode="range">
                                  </div>

                              </div>
                              <div class="col-lg-3  ">

                                  <div class="form-group  ">
                                      <label>Select Location</label>
                                      <select type="text" class="form-control select2" id="location" name="location"
                                          placeholder="Name">
                                          <option value="">All Location</option>
                                          <?php $location=DB::Table('location')->where('is_deleted',0)->get();?>
                                          @foreach($location as $q)
                                          <option value="{{$q->id}}" {{@$_GET['location']==$q->id?'selected':''}}>
                                              {{$q->location_name}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                              </div>
                              <div class="col-lg-3  ">

                                  <div class="form-group  ">
                                      <label>Select Issue Type</label>
                                      <select type="text" class="form-control select2" id="issue_type_id"
                                          name="issue_type_id" placeholder="Name">
                                          <option value="">All Issue Type</option>
                                          <?php $issue_type=DB::Table('issue_type')->where('is_deleted',0)->get();?>
                                          @foreach($issue_type as $q)
                                          <option value="{{$q->id}}" {{@$_GET['issue_type_id']==$q->id?'selected':''}}>
                                              {{$q->type_name}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                              </div>



                              <div class="col-lg-2       " style="margin-top:30px">
                                  <button class="btn btn-primary">Filter</button>
                              </div>

                          </div>
                      </form>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                          <thead class="thead thead-light ">
                              <tr>
                                  <th style="width: 5%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.id"
                                          class=""># </a></th>
                                  @if(Auth::user()->role=='admin')
                                  <th style="width: 15%"><a
                                          href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=u.name"
                                          >Added By</a></th>
                                  @endif
                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=it.type_name"
                                         >Type </a></th>

                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=itd.type_detail_name"
                                          >Sub Type </<a>
                                  </th>

                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=l.location_name"
                                         >Location </a></th>

                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.status"
                                          >Status </a></th>
                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.staff_firstname"
                                       >Staff </a></th>
                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.staff_role"
                                          >Staff Role </a></th>
                                  <th style="width: 10%"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.email"
                                          >Email </a></th>
                                  <th style="width: 10%;"><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.phone"
                                         >Phone </a></th>



                                  <th style="width: 15%"><a
                                          href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=i.created_at"
                                          >Created On </a></th>


                                  <th style="width: 5%" class="text-center">Actions</th>
                              </tr>
                          </thead>
                          <tbody id="showdata">
                              @php $sno= $qry->perPage() * ($qry->currentPage() - 1);@endphp
                              @foreach($qry as $q)
                              <tr>
                                  <td>{{++$sno}}</td>
                                  @if(Auth::user()->role=='admin')
                                  <td>{{$q->name}}</td>
                                  @endif
                                  <td class="font-w600">
                                      {{$q->type_name}}
                                  </td>


                                  <td>{{$q->type_detail_name}}</td>
                                  <td>{{$q->location_name}}</td>
                                  <td>
                                      @if($q->status=='Resolved')
                                      <div class="badge badge-success">Resolved</div>
                                      @else
                                      <div class="badge badge-danger">Unresolved</div>
                                      @endif
                                  </td>
                                  <td>{{$q->staff_firstname}} {{$q->staff_lastname}}</td>
                                  <td>{{$q->staff_role_name}}</td>
                                  <td>{{$q->email}}</td>
                                  <td>{{$q->phone}}</td>
                                  <td>{{$q->created_at}}</td>


                                  <td class="text-center">
                                      <div class="btn-group">

                                          <a type="button" href="javascript:;" data="{{$q->issue_detail}}"
                                              class="btn btn-sm btn-success btnDetail" data-toggle="tooltip"
                                              title="View Issue Detail">
                                              <i class="fa fa-eye"></i>
                                          </a>
                                          <a type="button" href="{{url('edit-issue')}}?id={{$q->id}}"
                                              class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                              <i class="fa fa-pencil-alt"></i>
                                          </a>
                                          <button type="button" class="btn btn-sm btn-danger btnDelete"
                                              data="{{$q->id}}" data-toggle="tooltip" title="Delete">
                                              <i class="fa fa-times"></i>
                                          </button>
                                      </div>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
                      {{$qry->appends($_GET)->links()}}
                      <form id="limit_form">
                          <select name="limit" onchange="document.getElementById('limit_form').submit()"
                              class="float-right form-control mr-2 mb-2 mt-4 px-0" style="width:auto">
                              <option value="10" {{@$limit==10?'selected':''}}>10</option>
                              <option value="25" {{@$limit==25?'selected':''}}>25</option>
                              <option value="50" {{@$limit==50?'selected':''}}>50</option>
                              <option value="100" {{@$limit==100?'selected':''}}>100</option>
                          </select>
                      </form>


              </div>
          </div>
          <!-- END Full Table -->

      </div>
      <!-- END Page Content -->
      <div class="modal" id="viewData" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-popin" role="document">
              <div class="modal-content">
                  <div class="block block-themed block-transparent mb-0">
                      <div class="block-header bg-primary-dark">
                          <h3 class="block-title" id="firstname">Issue Detail</h3>
                          <div class="block-options">
                              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                  <i class="fa fa-fw fa-times"></i>
                              </button>
                          </div>
                      </div>
                      <div class="block-content pb-2 InfoDiv">


                      </div>
                      <div class=" text-right  p-3  bg-light">


                          <button type="button" class="btn btn-sm    btn-light" data-dismiss="modal">Close</button>

                      </div>
                  </div>
              </div>
          </div>
      </div>


  </main>
  <!-- END Main Container -->
  @endsection('content')



  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">
$(function() {
    @if(Session::has('success'))
    Swal.fire({
        title: '{{Session::get('
        success ')}}',


        confirmButtonText: 'Ok'
    })
    @endif



    $(document).on('click', '.btnDetail', function() {
        var id = $(this).attr('data');
        $('#viewData').modal('show')
        $('.InfoDiv').html($(this).attr('data'));

    })



    $('#showdata').on('click', '.btnDelete', function() {
        var id = $(this).attr('data');

        var c = confirm("Are you sure want to delete this Issue");
        if (c) {
            window.location.href = "{{url('delete-issue')}}?id=" + id;
        }
    })
})
  </script>
