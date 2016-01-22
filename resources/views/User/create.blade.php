@extends('global.master')

@section('page-title')
	register
@stop

@section('content')
<div class="container"><div class="row">
    <div class="col-md-12">
        
    <h1>registreren</h1>
    {!! Form::open(['route' => 'auth.register']) !!}
        <legend>registreren</legend>
                      
        <div class="form-group">
            <label for="email">E-mail</label>                
            {!! Form::email('email','', array('placeholder' => 'Je e-mail','required' => 'required', 'autofocus','id' => 'email','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="password">Paswoord</label>                
            {!! Form::password('password', ['placeholder' => 'Je paswoord','type' => 'password','required','min' => '8','id' => 'password','class' => 'form-control']) !!}                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="surname">voornaam</label>
                {!! Form::text('surname', '', ['placeholder' => 'jan', 'type' => 'text', 'required','class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-8">
                <label for="surname">naam</label>
                {!! Form::text('name', '', ['placeholder' => 'janssens', 'type' => 'text', 'required','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="surname">geboortedatum</label>
            {!! Form::date('date_of_birth', '',['placeholder' => 'mm/dd/yyyy', 'type' => 'text', 'required']) !!}
        </div>


        <div class="form-group text-center centerbuttons">                        
            <input type="submit" class="btn btn-success btn-login-submit" value="Login" />
            
        </div>
    {!! Form::close() !!}           
    </div>
</div></div>
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.js"></script>
@stop