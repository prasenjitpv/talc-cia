@extends('layouts.app')

@section('pageTitle')
{{ 'Final Step | ' . config('app.name') }}
@endsection
@section('content')
<section class="bg-white">
  <div class="container-fliud">
    <div class="row-cols-1">
      <div class="formHolder finalForm">
        <div class="formHeader">
          <h4><span class="gold">Good News!</span> It looks like you qualify for a <em>Fast Free Case Review.</em> Let’s get your information to one our attorneys.</h4>
        </div>
        <div class="formBody">
          <h4>Final Step</h4>
          <div class="indicator"><img src="img/Indicator_4.png" alt="indicator"></div>
          <h4 class="minHeight">Who should receive compensation?:</h4>
          <form id="finalstep" class="form-validate">
            <div class="col-12 mb-10 form-group">
              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required value="{{ $firstname }}">
            </div>
            <div class="col-12 mb-10 form-group">
              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required value="{{ $lastname }}">
            </div>
            <div class="col-12 mb-10 form-group">
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required value="{{ $phone }}">
            </div>
            <div class="col-12 mb-10 form-group">
              <input type="text" name="address" id="address" class="form-control" placeholder="Address" required value="{{ $address }}">
            </div>
            <div class="col-12 mb-10 form-group">
              <input type="text" name="city" id="city" class="form-control" placeholder="City" required value="{{ $city }}">
            </div>
            <div class="col-12 mb-10 form-group">
                <select class="form-control" required id="state" name="state">
                    <option value="">Select State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>	
            </div>
            <div class="col-12 mb-10 form-group">
              <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Zip Code" required value="{{ $zip_code }}">
            </div>
            <div class="col-12 mb-10 form-group">
              <input type="text" name="email" id="email" class="form-control" placeholder="Email" required value="{{ $email }}">
            </div>
            <div class="col-12 mb-10 form-group">
              <textarea rows="3" name="tellus" id="tellus" class="form-control" placeholder="Tell us about your case" required>{{ $tellus }}</textarea>
            </div>
            <div class="col-12">
              <p>By submitting this information, you agree to our Terms & Conditions and that Legal Injury Advocates and its partner law firms may contact you about their services at your above phone number(s)  even if it is on a National or State Do Not Call List. Calls/texts may employ automated dialing technology and pre-recorded/artificial voice messages. I understand my consent is not a condition of any purchase.</p>
            </div>
            <div class="col-12 form-group">
                @csrf
              <button type="submit" class="btn btn-success" id="btnsubmit">Submit Claim Request</button>
            </div>
          </form>
        </div>
        <img src="img/icon.png" alt="icon" class="text-center finalIcon">
        <div class="formFooter">
          <p>This site is 100% secure and confidential</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts') 
<script src="{{ asset('/js/formValidation.js') }}" type="text/javascript"></script> 
<script src="{{ asset('/js/bootstrapfrm.js') }}" type="text/javascript"></script> 
<script src="{{ asset('/js/jquery.inputmask.bundle.min.js') }}"></script>
<script>
$(function(){
    $("input#phone").inputmask('(999)-999-9999');

    $('select#state').val('{{ $state }}');

    $('form#finalstep').formValidation({
        framework: 'bootstrap',
        message: 'This value is not valid',
        icon: {
            valid: 'fas fa-check',
            invalid: 'fas fa-times',
            validating: 'fas fa-sync-alt'
        },
        fields: {
            email: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/,
                        message: 'The input is not a valid email address.'
                    }
                }
            },
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'The firstname is required.'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'The lastname is required.'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required.'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'The city is required.'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'The state is required.'
                    }
                }
            },
            zip_code: {
                validators: {
                    notEmpty: {
                        message: 'The zip is required.'
                    },
                    regexp: {
                        regexp: /^[0-9]{5}(?:-[0-9]{4})?$/,
                        message: 'The input is not a valid zip code.'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The phone number is required.'
                    },
                    regexp: {
                        regexp: /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/,
                        message: 'The input is not a valid phone number.'
                    }
                }
            },
            tellus: {
                validators: {
                    notEmpty: {
                        message: 'The tellus is required.'
                    }
                }
            }
        }
    })
    .on('success.form.fv', function (e) {
        // Prevent form submission
        e.preventDefault();
        var arg = $("form#finalstep").serialize();
        //alert(arg);
        $.ajax({
            url: "{{ route('submitfinal') }}",
            type: "POST",
            data: arg,
            timeout: 50000,
            cache: false,
            success: function (html) {
                if (html.sms == 1) {
                    window.location = "{{ route('thankyou') }}";
                } else {
                    $('div#msgdiv').prop('class', 'alert alert-danger');
                    $('div#msgdiv').html('Updation failed. Please try after some time.');
                    $("div#msgdiv").fadeIn(100);
                    var et = setTimeout('$("div#msgdiv").fadeOut(100)', 5000);
                    $('button#btnsubmit').removeClass('disabled');
                    $('button#btnsubmit').removeAttr('disabled');
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
                    $('button#btnsubmit').removeClass('disabled');
                    $('button#btnsubmit').removeAttr('disabled');
                    return false;
            }
        });
    });
});
</script>
@stop
