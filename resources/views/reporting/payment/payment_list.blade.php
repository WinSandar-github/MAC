@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">  

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                        <h3 class="text-center m-3" style="font-weight:bold">
                              payment transation</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                      
                        

                        <div class="col-md-12">
                          
                           
                        
                            <table width="100%" id="tbl_payment_list" class="tbl_exam_result_list table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" >စဥ်</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >Section</th>
                                        <th class="bold-font-weight" >Email</th>                      
                                        <th class="bold-font-weight" >Phone</th>
                                        <th class="bold-font-weight" >Amount</th>
                                        <th class="bold-font-weight" >Date</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_payment_list_body" class="hoverTable">
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                            
                    
                </div>
                   
            </div>
    </div>
</div>


@endsection

@push('styles')
    <link href="{{ asset('assets/js/plugins/tableexport/dist/css/tableexport.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/plugins/xlsx.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/FileSave.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/tableexport/dist/js/tableexport.min.js') }}"></script>
    <script>
        $('document').ready(function () {
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            let date = urlParams.get('date')
           
            $('#tbl_payment_list').DataTable({
                responsive:true, 
                searching: true,
                paging:true,
                ajax: {
                    url  : FRONTEND_URL + "/filter_payment",
                    type : "POST" ,
                    data :  function (d) {
                        d.date        =  date
                     



                        
                    }
                },
                columns: [
                    {data: null, render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                    {data: 'name_eng', name: 'name_eng'}, 
                    {data: 'invoiceNo', name: 'invoiceNo'}, 
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'total', name: 'total'},
                    {data: 'payment_date', name: 'created_at'},
               

                    
                    
                ],
                           
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

                });
        });
     
            
            // $("#search").click(function () {
                
    
            //     table_app.draw();
            //     });
            
        

        
        
        </script>


@endpush