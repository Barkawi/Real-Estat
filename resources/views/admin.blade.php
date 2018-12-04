
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                    You are logged in as Administrator
                        </div>
                    
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
    <tr>
    <th>Nom</th>
    <th>Email</th>
    </tr>
    @foreach($users as $c)
    <tr>
   <td> {{ $c->name }} </td>
   <td> {{ $c->email }} </td>
   </tr>
    @endforeach
    </table>
    </div>
</div>
@endsection
