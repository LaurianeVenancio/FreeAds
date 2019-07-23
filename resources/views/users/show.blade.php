@extends('layouts.app')

@section('content')
<div class="col-sm-offset-4 col-sm-4">
         <br>
         <div class="panel panel-primary">   
            <div class="panel-heading">Fiche d'utilisateur</div>
                <div class="panel-body"> 
                    <p>Nom : {{ $user->name }}</p>
                    <p>Email : {{ $user->email }}</p>
                </div>
            </div>
        </div>
</div>
@endsection