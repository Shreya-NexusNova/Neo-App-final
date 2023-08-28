  
@extends('layouts.header')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')



          <!-- Main Container -->
            <main id="main-container">
                <div class="bg-header-dark">
                    <div class="content content-full">
                        <div class="row pt-3">
                            <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                                <h1 class="text-white mb-0">
                                    <span class="font-w300">Add Staff Role</span>
                                     
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
                                    <a href="{{url('/staff-role')}}">Staff Role</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Staff Role</li>
                            </ol>
                        </nav>
                        <!-- END Breadcrumb -->

             
                    <!-- New Post -->
                    <form action="{{url('insert-staff-role')}}" class="js-validation" method="POST" enctype="multipart/form-data"  >
                        @csrf


                                             <!-- People -->
                                <div class="block block-rounded block-bordered block-mode-loading-refresh">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">Add Staff Role</h3>
                                        <div class="block-options">
                                           
                                        </div>
                                    </div>
                                    <div class="block-content">
                          
                                <div class="row justify-content-  push">
 
							<div class="col-sm-12 m-auto" >
										<div class="  row">
                                            <label class="col-sm-3 col-form-label" for="example-hf-email">Name</label>
                                          
                                            <div class="col-sm-6 form-group">
                                            	 <input type="text" class="form-control" id="staff_role_name"  value="{{old('staff_role_name')}}" name="staff_role_name" placeholder="Name"  >
                                            </div>
                                   
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
                                        
                                            <a href="{{url('staff-role')}}" type="reset" class="btn btn-alt-danger">
                                            <i class="fa fa-fw fa-times  "></i> Cancel

                                        </a>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END New Post -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


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
                
                'staff_role_name': {
                    required: true,
                  
                },
              
             
           
            },
         
        });

        // Init Validation on Select2 change
        jQuery('.js-select2').on('change', e => {
            jQuery(e.currentTarget).valid();
        });







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
  @endsection('content')
