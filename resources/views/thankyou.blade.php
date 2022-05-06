@extends('layouts.app')

@section('pageTitle')
{{ 'Question 1 | ' . config('app.name') }}
@endsection
@dd(\Session::get('res'))
@section('content')
<section class="bg-white">
    <div class="container-fliud">
        <div class="row-cols-1">
            <div class="formHolder">
                
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts') 
<script>

</script>
@stop
