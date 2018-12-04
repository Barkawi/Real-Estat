
@extends('layouts.master')

@section('content')
      <!-- page content -->
		
		<div class="right_col" role="main">
		
    <div class="">
@if(count($errors))

 <script>
            function init_PNotify(){
	"undefined"!=typeof PNotify&&(console.log("init_PNotify"),
	new PNotify({
        title: 'Operation failed',
                                  text: '<ul>@foreach($errors->all() as $message) <li>{{$message}}</li>  @endforeach</ul>',
                                  type: 'error',
                                  nonblock: {
                                      nonblock: true
                                  },
                                 
                                  styling: 'bootstrap3'
    })
    )
    };                    
 </script>

@endif

@if(session()->has('success'))

<script>
            function init_PNotify(){
	"undefined"!=typeof PNotify&&(console.log("init_PNotify"),
	new PNotify({
        title: 'Success Operation',
                                  text: '{{ session()->get("success") }}',
                                  type: 'success',
                                  nonblock: {
                                      nonblock: true
                                  },
                                 
                                  styling: 'bootstrap3'
    })
    )
    };                    
 </script>

@endif


      <div class="clearfix"></div>

      <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>OUR DATA </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-print"></i></a>
                
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                <form enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ url('datas') }}" method="POST">
					
                    {{ csrf_field() }}
                          @if(!empty($datas))

                        <input type="hidden" name="_method" value="PUT">

                          @endif
          
                           <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> Libelle </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="select2_group form-control" placeholder="libelle" @if(!empty($datas)) value="{{ $datas[0]->libelle }}" @else value="{{ old('libelle') }}" @endif name="libelle">
                             </div>
                           </div>
     
                 <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> adresse </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                               <textarea class="select2_group form-control"  value="{{ old('adresse') }}"  name="adresse">@if(!empty($datas)) {{ $datas[0]->adresse }} @endif </textarea>
                             </div>
                           </div>
                         
                 <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> Logo </label>
                             <div class="col-md-6 col-sm-9 col-xs-12">
                               <input type="file" class="select2_group form-control"  name="logo">
                               
                             </div>
                             <div class="col-md-3" >
                             @if(!empty($datas))
                             <img width="40%" src="{{ asset('storage/'.$datas[0]->logo) }}">
                             @endif
                             </div>
                           </div>
                          
                           <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tel </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="select2_group form-control" placeholder="Tel" @if(!empty($datas)) value="{{ $datas[0]->tel }}"  @else value="{{ old('tel') }}" @endif name="tel">
                             </div>
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> email </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="select2_group form-control" @if(!empty($datas)) value="{{ $datas[0]->email }}"  @else   value="{{ old('email') }}" @endif name="email">
                             </div>
                           </div>
     
                             <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fixe </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="select2_group form-control" @if(!empty($datas)) value="{{ $datas[0]->fix }}"  @else   value="{{ old('fixe') }}" @endif name="fixe">
                             </div>
                           </div>
     
                            <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"> WebSite </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="select2_group form-control" @if(!empty($datas)) value="{{ $datas[0]->website }}"  @else  value="{{ old('website') }}" @endif name="website">
                             </div>
                           </div>
     
     
                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                               <button type="submit" class="btn btn-success">Valider</button>
                             </div>
                           </div>
     
                         </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection