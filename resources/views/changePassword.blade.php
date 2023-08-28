  
@extends('layouts.header')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('content')






          <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Change Password</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a  href="{{url('/')}}">Home</a></li>
                                     
                                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content content-full content-boxed">
                    <form action="{{url('update-user-password')}}" class="js-validation1" method="POST" enctype="multipart/form-data"  >
                                              <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        @csrf<div class="block">

                            <div class="block-header block-header-default">
                                <a class="btn btn-light" >
                                Change Password
                                </a>
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
                                        <button type="submit" class="btn btn-alt-warning">
                                              Change
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END New Post -->
                </div>
                </main>

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
 		    // Init Form Validation


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
   

        // Init Validation on Select2 change
        jQuery('.js-select2').on('change', e => {
            jQuery(e.currentTarget).valid();
        });



 
 	})
 </script>