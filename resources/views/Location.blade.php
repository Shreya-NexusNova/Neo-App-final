  
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
$field='id';
if(isset($_GET['orderBy'])){
$orderby=$_GET['orderBy'];
$field=$_GET['field'];
}


 
     $qry=DB::table('location') ->where('is_deleted',0)->where(function($query){
    
        $query->Orwhere('location_name','like','%'.@$_GET['search'].'%');
       
       
 
     }) ->orderBy($field,$orderby)->paginate($limit); 
}
 else{
$qry=DB::table('location') ->where('is_deleted',0)->orderBy('id','desc')->paginate($limit); 
 
 }
 ?>       <!-- Main Container -->
            <main id="main-container">
              <!-- Hero -->
                <div class="bg-header-dark">
                    <div class="content content-full">
                        <div class="row pt-3">
                            <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                                <h1 class="text-white mb-0">
                                    <span class="font-w300">Location</span>
                                     
                                </h1>
                            </div>
                            <div class="col-md py-3 d-md-flex align-items-md-center justify-content-md-end text-center">
                                <a href="{{url('add-location')}}" class="btn btn-alt-primary mr-1">
                                    <i class="fa fa-plus mr-1"></i>Add Location

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
                                <li class="breadcrumb-item active" aria-current="page">Location</li>
                            </ol>
                        </nav>
                        <!-- END Breadcrumb -->

             
                                             <!-- People -->
                                <div class="block block-rounded block-bordered block-mode-loading-refresh">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">Location</h3>
                                        <div class="block-options">
                                           
                                        </div>
                                    </div>
                                    <div class="block-content">
                                   
                                
                            <div class="row">
                          <div class="col-sm-3">
                        <form class="push"   method="get">
                                        <input type="hidden" name="limit" value="{{$_GET['limit']??10}}">
                          
                                <div class="input-group">
                                    <input type="text" value="{{@$_GET['search']}}" class="form-control" name="search" placeholder="Quick Search">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-fw fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                                 
                            </form>
</div>
<div class="col-lg-5"></div>

       <div class="col-lg-4   d-inline-flex justify-content-end ">
                                  <form id="limit_form">
                                <select name="limit" onchange="document.getElementById('limit_form').submit()" class="float-right form-control mr-2 mb-2 px-0" style="width:auto">
                                        <option value="10" {{@$limit==10?'selected':''}}>10</option>
                                        <option value="25" {{@$limit==25?'selected':''}}>25</option>
                                        <option value="50" {{@$limit==50?'selected':''}}>50</option>
                                        <option value="100" {{@$limit==100?'selected':''}}>100</option>
                                </select>
                            </form>
                        </div>
                    
</div>
</div>
                            <div class="table-responsive">
                                  <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                    <thead class="thead thead-light ">
                                        <tr>
                                 <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=id" class=" 
                                                ">#  </a></th>
        
                                 
                                            <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=location_name" class=" 
                                                ">Name  </a></th>
                                                 
                                          
                                        
                                                <th><a href="{{url()->current()}}?{{isset($_GET['search'])?'search='.$_GET['search']:''}}&orderBy={{@$_GET['orderBy']=='desc'?'asc':'desc'}}&field=created_at" class=" 
                                                ">Created On  </a></th>
                                                
                                           
                                             <th class="text-center ">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                          @php  $sno= $qry->perPage() * ($qry->currentPage() - 1);@endphp
                                        @foreach($qry as $q)
                                        <tr>
                                             <td>{{++$sno}}</td>
                                            
                                            <td class="font-w600">
                                                  {{$q->location_name}}  
                                            </td>
                                               
                                    
                                                 <td>{{$q->created_at}}</td>
                                          
 
                                            <td class="text-center">
                                                <div class="btn-group">
                                                 
                                                    <a type="button" href="{{url('edit-location')}}?id={{$q->id}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger btnDelete" data="{{$q->id}}" data-toggle="tooltip" title="Delete">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                               
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
            
          {{$qry->appends($_GET)->links()}}
 
                            </div>
                             
                        </div>
                    </div>
                    <!-- END Full Table -->
 
                </div>
                <!-- END Page Content -->
                   

            </main>
            <!-- END Main Container -->
            @endsection('content')

   

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
$(function(){
   @if(Session::has('success'))
             Swal.fire({
  title: '{{Session::get('success')}}',
 
 
  confirmButtonText: 'Ok'
})
             @endif


             
             

               $('#showdata').on('click','.btnDelete',function(){
                    var id=$(this).attr('data');
                   
                    var c=confirm("Are you sure want to delete this Location");
                    if(c){
                        window.location.href="{{url('delete-location')}}?id="+id;
                    }
                            })  
           })
</script>
