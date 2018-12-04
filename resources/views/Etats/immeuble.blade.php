
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
                    <h2>Etat total<small> pour l'immeuble : {{ $immeuble->zone->libelle.' '.$immeuble->libelle }}</small></h2>
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
                              <th>Code</th>
                              <th>Nom et prénom</th>
                              <th>Appartement</th>
                              <th>Date d'habitation</th>
                              <th>Loyer</th>
                              <th> Annee </th>
                              <?php for($i=1;$i<=12;$i++){ ?>
                              <th><?=$i?></th>
                              <?php } ?>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($lignapps as $l)
                              <?php $maxyear = date('Y',strtotime($l->maxyear())); ?>
                            <tr>
                              <td>{{$l->id}}</td>
                              <td>{{ $l->locataire->nom.' '.$l->locataire->prenom }}</td>
                              <td>{{ $l->appartement->libelle }}</td>
                              <td>{{ date('d-m-Y',strtotime($l->dateh)) }}</td>
                              <td> {{ $l->loyer.' DHS' }} </td>
                              <?php if($l->maxyear() != '') {?>
                              <td>{{ $maxyear }}</td>
                              <?php for($i=1;$i<=12;$i++){ ?>
                          
                          @foreach($l->existe($i,$maxyear) as $r)
                          
                          <td>{{ date('d-m-Y',strtotime($r->created_at)) }}</td>
                          
                          @endforeach
         <?php if(count($l->existe($i,$maxyear)) == 0){ ?>               
<td style="background:grey;"></td>
         <?php } ?>

<?php }  ?>
                          <?php }else{ ?>
                                <td></td>
                                <?php for($i=1;$i<=12;$i++){ ?>

<td></td>
<?php }} ?>
                              

                              @if($l->total() != '')
                              <td>{{ $l->total()." DHS" }}</td>
                              @else
                              <td></td>
                                  @endif
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
                        <a class="btn btn-primary pull-right" href="{{ url('immeuble/pdf/'.$immeuble->id) }}" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                      
                      </div>
                   
              </div>
            </div>
          </div>
        </div>
                                        
       
        <!-- /page content -->

@endsection