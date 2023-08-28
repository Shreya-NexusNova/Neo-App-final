  
@extends('layouts.header')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')
<?php 
$qry=DB::Table('users')->where('id',$_GET['id'])->first();
?>



          <!-- Main Container -->
            <main id="main-container">
                      <div class="bg-header-dark">
                    <div class="content content-full">
                        <div class="row pt-3">
                            <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                                <h1 class="text-white mb-0">
                                    <span class="font-w300">Edit User</span>
                                     
                                </h1>
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
                              <li class="breadcrumb-item">
                                    <a href="{{url('/users')}}">Users</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                            </ol>
                        </nav>
                        <!-- END Breadcrumb -->

                    <div class="container px-0 mt-4">
                <!-- Page Content -->
                <div class="row">
                <div class="col-sm-8">
                 
                    <!-- New Post -->
                    <form action="{{url('update-users')}}" class="js-validation" method="POST" enctype="multipart/form-data"  >
                        <input type="hidden" name="id" value="{{$qry->id}}">
                        @csrf

                      <div class="block block-rounded block-bordered block-mode-loading-refresh">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">Edit User Details</h3>
                                        <div class="block-options">
                                           
                                        </div>
                                    </div>
                                    <div class="block-content">
                                    
                                <div class="row justify-content-  push">
 
							<div class="col-sm-12 m-auto" >
									   <div class="col-sm-12 m-auto" >
                                        <div class="  row">
                                            <label class="col-sm-3 col-form-label" for="example-hf-email">Name</label>
                                          
                                            <div class="col-sm-6 form-group">
                                                 <input type="text" class="form-control" id="name"  value="{{$qry->name}}" name="name" placeholder="Name"  >
                                            </div>
                                         
                                        </div>

 
                                     
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="example-hf-email">Email</label>
                                            <div class="col-sm-6">
                                                 <input type="email" class="form-control" id="email"  value="{{$qry->email}}" name="email" placeholder="Email"  >
                                            </div>
                                          
                                        </div>  
                                          
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="example-hf-email">Role</label>
                                            <div class="col-sm-6">
                                                 <select type="" class="form-control" id="role"  value="{{old('role')}}" name="role" placeholder="Role"  >
                                                               <option value="user" {{$qry->role=='user'?'selected':''}}>User</option>
                                                               <option value="admin" {{$qry->role=='admin'?'selected':''}}>Admin</option>

                                                 </select>
                                            </div>
                                          
                                        </div> 
                                             
                                             
                                     
                                <!-- People -->
                              
                            
 
                            </div>
                        </div>
                            </div>
                        </div>
                            <div class="block-content bg-body-light">
                                <div class="row justify-content-center push">
                                    <div class="col-md-10">
                                         <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-fw fa-check ml-1"></i> Save
                                        </button>
                                         
                                          
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END New Post -->
                </div>
     
                <!-- END Page Content -->
                <div class="col-sm-4">
                       
                <div class="  content-full  -boxed">
                    <!-- New Post -->
                    <form action="{{url('update-user-password')}}" class="js-validation1" method="POST" enctype="multipart/form-data"  >
                        <input type="hidden" name="id" value="{{$qry->id}}">
                        @csrf
                     <div class="block block-rounded block-bordered block-mode-loading-refresh">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">Change Password</h3>
                                        <div class="block-options">
                                           
                                        </div>
                                    </div>
                                    <div class="block-content">
                                <div class="row justify-content-  push">
 
                            <div class="col-sm-12 m-auto" >
                                      
 
                                          <div class="form-group  ">
                                            <label class="col-form-label" for="example-hf-email">Password</label>
                                             
                                                 <input type="password" class="form-control" id="password" value="{{old('password')}}" name="password" placeholder="Password"  >
                                           
                                          
                                        </div>
                                        <div class="form-group">
                                            <label class=" col-form-label" for="example-hf-email">Confirm Password</label>
                                          
                                                 <input type="password" class="form-control" id="comfirm_password" value="{{old('comfirm_password')}}" name="comfirm_password" placeholder="Confirm Password"  >
                                          
                                          
                                        </div>
         </div>
                            </div>
                        </div>
                            <div class="block-content bg-body-light">
                                <div class="row justify-content-center push">
                                    <div class="col-md-10">
                                        
                                        <button type="submit" class="btn btn-primary">
                                              Change
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END New Post -->
                </div>
                <!-- END Page Content -->
            </div>
            </div>
        </div>

            </main>
            <!-- END Main Container -->

 @endsection('content')

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 
  

        <!-- Page JS Helpers (BS Datepicker + BS Colorpicker plugins) -->
        <script>jQuery(function(){Dashmix.helpers(['datepicker', 'colorpicker']);});</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
 	
 	$(function(){
 		  @if(Session::has('success'))
             Swal.fire({
  title: '{{Session::get('success')}}',
 
 
  confirmButtonText: 'Ok'
})
             @endif

             $('#access_type').change(function(){
    if($(this).val()=='admin'){
        $('.divHide').addClass('d-none');
    }
    else{
        $('.divHide').removeClass('d-none');
    }
})


$('#email').focusout(function(){
   
var val=$(this).val();
var text='@rzy.'+val.replaceAll('@','.');
$('#rzAddress').val(text);
    

})

 		    // Init Form Validation
        jQuery('.js-validation').validate({
            ignore: [],



 
 
 



            rules: {
                'salutation': {
                    required: true,
                   
                },
                'firstname': {
                    required: true,
                  
                },
                'lastname': {
                    required: true,
                  
                },
              
                'email': {
                    required: true,
                    email:true,
                },
                

                'work_phone': {
                    required: true,
  
                     maxlength: 20
                  
                },
                'mobile': {
                    required: true,
                  
                     maxlength: 20
                },
                'password': {
                    required: true,
                     
                },
                'comfirm_password': {
                     
             required: true,
              equalTo: '#password'

                },
                
           
            },
         
        });

        // Init Validation on Select2 change
        jQuery('.js-select2').on('change', e => {
            jQuery(e.currentTarget).valid();
        });




jQuery('.js-validation1').validate({
            ignore: [],
 
            rules: {
    'password': {
                    required: true,
                     
                },
                'comfirm_password': {
                     
             required: true,
              equalTo: '#password'

                },
                
           
            },
         
        });

        // Init Validation on Select2 change
   





 		$('.add-more').click(function(){
	 				var html='';
	 					var l=$('.emailRows').length;
	 					if(l<5){
	 					 	html+=' <div class="form-group emailRows row" data="'+l+'">'+
                                            '<label class="col-sm-3 col-form-label" for="example-hf-email"></label>'+
                                            '<div class="col-sm-6"><div class="input-group">'+
                                            	  '<input type="email" class="form-control"   name="notification_renewal_email[]"  placeholder="Email '+(l+parseInt(1))+'"  >'+
                                            '<div class="input-group-append">'+
                                                    '<button type="button"  data="'+l+'" class="btn btn-alt-danger btnDel">'+
                                                        '<i class="fa fa-times"></i>'+
                                                    '</button>'+
                                                '</div></div></div>'+
                                          '</div>';
 				$('#EmailBlock').append(html)
 		}
 	})
 		$('#EmailBlock').on('click','.btnDel',function(){
 		 
 			var id=$(this).attr('data');
 			$('.emailRows[data='+id+']').remove()
 			 var sno=0;
 			 $('.emailRows input').each(function(){
 			 	$(this).attr('placeholder','Email '+(++sno))
 			 	  			 })
 		})
 	})
 </script>