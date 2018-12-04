
@extends('layouts.pdf')

@section('content')
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


</style>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Etat total<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

            
            

                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
                                        <i class="fa fa-globe"></i> BZ-SOFT
                                        <small class="pull-right">Date: {{date('d-m-Y')}}</small>
                                    </h1>
                      </div>
                      <!-- /.col -->

<table>
                          <thead>
                            <tr>
                            <th>Date De Reglement</th>
                                <th>Reçu</th>
                                <th>Observation</th>
                                <th>De -> A (nbr des mois)</th>
                            </tr>
                          </thead>
                          <tbody>
                       @foreach($reglements as $r)
                            <tr>
                       
                            <td>{{$r->created_at}}</td>
                                <td>{{$r->id}}</td>
                               
                                <td>{{ $r->observation }}</td>
                                <?php 
                              $ts1 = strtotime($r->de);
                              $ts2 = strtotime($r->a);
                              
                              $year1 = date('Y', $ts1);  $year2 = date('Y', $ts2);
                              $month1 = date('m', $ts1); $month2 = date('m', $ts2);
                              
                              $value = (($year2 - $year1) * 12) + ($month2 - $month1+1);
                           //   $mnt  =  $r->lignapp->loyer * $value;
                                        ?>
                                         <td> {{ date('m-Y',strtotime($r->de)).' -> '.date('m-Y',strtotime($r->a)).' ('.$value.' months)' }} </td>
                           
                               
                            </tr>
                           @endforeach
                          </tbody>
                        </table>

                    </div>
                    <!-- info row -->
                 
                    <!-- /.row -->
                   
                    <!-- /.row -->

              
                  </section>
             
                </div>
                <div class="col-xs-6">
                      <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <a class="btn btn-primary pull-right" href="#" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                      
                      </div>
                   
              </div>
            </div>
          </div>
        </div>
                                        
       
        <!-- /page content -->

@endsection