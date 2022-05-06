@extends('layouts.app')

@section('pageTitle')
{{ 'Question 1 | ' . config('app.name') }}
@endsection
@section('content')
<section class="bg-white">
  <div class="container-fliud">
    <div class="row-cols-1">
      <div class="formHolder">
        <div class="formHeader">
          <h4>Talcum Powder Linked To Ovarian Cancer And Other Cancer Subsets</h4>
        </div>
        <div class="formBody">
          <h4>See If You Qualify</h4>
          <div class="indicator"><img src="img/Indicator_1.png" alt="indicator"></div>
          <h4 class="minHeight">Have you have or a loved one been diagnosed with one of the following cancers?</h4>
          <ul class="btnBox smallBtn">
                <li><a href="javascript:void(0)" class="btn btn-success" id="a-Ovarian-Cancer"><img src="img/Not-selected.png" alt="btn">Ovarian Cancer</a></li>
                <li><a href="javascript:void(0)" class="btn btn-success" id="a-Fallopian-Tube"><img src="img/Not-selected.png" alt="btn">Fallopian Tube</a></li> 
                <li><a href="javascript:void(0)" class="btn btn-success" id="a-Mesothelioma"><img src="img/Not-selected.png" alt="btn">Mesothelioma</a></li>
                <li><a href="javascript:void(0)" class="btn btn-success" id="a-Peritonearl-Cancer"><img src="img/Not-selected.png" alt="btn">Peritonearl Cancer</a></li>
                <li><a href="javascript:void(0)" class="btn btn-success" id="a-Death-from-Ovarian-Cancer-of-Fallopian-Tube-Cancer"><img src="img/Not-selected.png" alt="btn">Death from Ovarian Cancer of Fallopian Tube Cancer</a></li>
                <li><a href="javascript:void(0)" class="btn btn-success" id="a-No-Other"><img src="img/Not-selected.png" alt="btn">No/Other</a></li>
          </ul>
          <div id="msgdiv" style="display:none;"></div>
          @csrf
          @include('includes.footnotes')
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts') 
<script>
$(function(){
    $('a[id^="a-"]').on('click', function(){
        var ans = $(this).prop('id').replace('a-', '');
        $(this).children('img').prop('src', "{{ asset('/img/Selected.png') }}");
        $('a[id^="a-"]').each(function(){
            if($(this).prop('id').replace('a-', '') != ans){
                $(this).children('img').prop('src', "{{ asset('/img/Not-selected.png') }}");
            }
        });

        var arg = '_token='+$('input[name="_token"]').val()+'&ques1='+ans+'&ques=ques1';
        //alert(arg);return false;
        $.ajax({
            url: "{{ route('submitques') }}",
            type: "POST",
            data: arg,
            timeout: 50000,
            cache: false,
            success: function (html) {
                if (html.sms == 1) {
                    window.location = "{{ route('ques2') }}";
                } else {
                    $('div#msgdiv').prop('class', 'alert alert-danger');
                    $('div#msgdiv').html('Updation failed. Please try after some time.');
                    $("div#msgdiv").fadeIn(100);
                    var et = setTimeout('$("div#msgdiv").fadeOut(100)', 5000);
                }
                return false;
            },
            error: function (jqXHR, exception)
            {
                    var msg = '';
                    $('div#msgdiv').prop('class','alert alert-danger');
                    if (jqXHR.status === 0) {
                            msg = 'Not connect. Verify Network.';
                    } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                    } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                    } else {
                            msg = 'Uncaught Error ' + jqXHR.responseText;
                    }
                    $('div#msgdiv').fadeIn(100);
                    $('div#msgdiv').html(msg);
                    var et = setTimeout('$("div#msgdiv").fadeOut(100)', 4000);
                    return false;
            }
        });
    });
});
</script>
@stop
