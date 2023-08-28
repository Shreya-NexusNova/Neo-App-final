
       @section('footer')
            <!-- Footer -->
            <footer id="page-footer" style="padding-left:250px" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        

                        <div class="col-sm-12 order-sm-2 mb-1 mb-sm-0 text-right  ">
                       <a class="font-w600" href="{{url('/')}}" target="_blank">Nexus Nova Ltd &copy {{date('Y')}}</a> 
                        </div>
                        
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

 
        <script src="{{asset('public/dashboard_assets/js/dashmix.core.min.js')}}"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_js/main/app.js
        -->
        <script src="{{asset('public/dashboard_assets/js/dashmix.app.min.js')}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset('public/dashboard_assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('public/dashboard_assets/js/pages/be_pages_dashboard.min.js')}}"></script>
           <!-- Page JS Plugins -->
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script><script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
          <script src="{{asset('public/dashboard_assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('public/dashboard_assets/js/plugins/jquery-validation/additional-methods.js')}}"></script>

        <!-- Page JS Helpers (Select2 plugin) -->
     
        <!-- Page JS Code -->
        <script src="{{asset('public/dashboard_assets/js/pages/be_forms_validation.min.js')}}"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
 <script src="{{asset('public/dashboard_assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
        <!-- Page JS Code -->
        <script src="{{asset('public/dashboard_assets/js/pages/be_tables_datatables.min.js')}}"></script>
            <script src="{{asset('public/dashboard_assets/js/plugins/summernote/summernote-bs4.min.js')}}"></script>


    
        <script src="{{asset('public/dashboard_assets/plugins/simplemde/simplemde.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
            <script src="{{asset('public/dashboard_assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
               <script defer=""  src="{{asset('public/dashboard_assets/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script  defer src="{{asset('public/dashboard_assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('public/js/dropify.js')}}"></script>
              <script src="{{asset('public/js/jquery.floatThead.js')}}"></script>
           <script >jQuery(function(){Dashmix.helpers('flatpickr', 'datepicker', 'select2','ckeditor');});</script>

        <script>
    mybutton = document.getElementById("scrollBtn");
$('.dropify').dropify()
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}




  $(function () {
    $('.selectpicker').selectpicker();
    var $table = $('.floathead');
$table.floatThead({
    top:140,
    
    responsiveContainer: function($table){
        return $table.closest('.table-responsive');
    }
});
$('#accordion2_h1 a').click(function(){

setTimeout(function(){
     var reinit = $table.floatThead('destroy');
    reinit();
},320)
// ... later you want to re-float the headers with same options

})


    $('.select2').select2()
    $("#example1").DataTable({
        'paging':false,
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


     $("#example3").DataTable({
        'paging':true,
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');


     $("#example4").DataTable({
        'paging':true,
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "colvis"]
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');


     $("#example5").DataTable({
        'paging':false,  ordering:  false,
      "responsive": false, "lengthChange": false, "autoWidth": false,'searching':false,
      "buttons":  ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');


    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
     
    });
var push=0;
    $('#pushbtn').click(function(){
            if(push==0){
                push=1;
           $('.brand-link').addClass('d-none');
         
            }
            else{
                  $('.brand-link').removeClass('d-none');     
                push=0;
            }
    })
  });
</script>
    </body>
</html>
 @endsection('footer')

 