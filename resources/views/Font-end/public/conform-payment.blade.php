@extends('Font-end.master')
@section('body')
     <div class="container">
         <div class="row  text-center">
             <div class="col-md-3"></div>
             <div class="col-md-6">
                 <div class="card">
                     <div class="card-header">
                         <h1>
                             Hi mr.{{Session::get('customerName')}} your order conform ,we will contact with you very soon.
                         </h1>
                     </div>
                 </div>

             </div>
         </div>
     </div>

    @endsection
