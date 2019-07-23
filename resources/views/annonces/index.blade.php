@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Les annonces</div>
                @foreach($annonces as $annonce)
                <div class="box">
                    <div class="col-lg-12 text-center">
                        <h2>{!! $annonce->title !!}
                        <br>
                        <small>{{ $annonce->user->name }}</small>
                        </h2>
                    </div>
                    <div class="col-lg-12 text-center">
                        <img src="{{ asset('storage/' . $annonce->image) }}" width="100" height="100">
                    </div>
                    <div class="col-lg-12">
                        <p>{!! $annonce->description !!}</p>
                    </div>
                    <div class="col-lg-12 text-center">
                        {!! $annonce->prix !!}€
                        <hr>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection