@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Cliente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<br>

@if (count($errors) > 0)

    <div class="alert alert-danger">
        <strong>Ops!</strong> Há algo errado com os dados passados.<br><br>
        <ul>
        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>

@endif

{!! Form::model($client, ['method' => 'PATCH','route' => ['clients.update', $client->id]]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>E-mail:</strong>

            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Endereço:</strong>

            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</div>
{!! Form::close() !!}


@endsection