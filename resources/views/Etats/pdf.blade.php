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
 <h2>Etat<small> Immeuble : {{$immeuble->zone->libelle.' '.$immeuble->libelle}} </small></h2>
 <p style="float:right">Date: {{date('d-m-Y')}}</p><br/><br/>

<table style="font-size:8px">
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