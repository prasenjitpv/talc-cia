@extends('layouts.error')
@section('pageTitle')
Error 401
@stop

@section('content')
<div class="nk-content ">
    <div class="nk-block nk-block-middle wide-xs mx-auto">
        <div class="nk-block-content nk-error-ld text-center">
            <h1 class="nk-error-head">401</h1>
            <h3 class="nk-error-title">Oops! Why you’re here?</h3>
            <p class="nk-error-text">We are very sorry for inconvenience. It looks like you’re try to access a page which you are unauthorized.</p>
            <a href="{{ route('home') }}" class="btn btn-lg btn-primary mt-2">Back To Home</a>
        </div>
    </div><!-- .nk-block -->
</div>
@stop() 