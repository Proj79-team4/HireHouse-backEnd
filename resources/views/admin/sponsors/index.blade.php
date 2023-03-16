@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mt-5">
            @foreach($sponsors as $sponsor)
            <div class="col mt-5">
                <div class="card mt-5">
                    <h3 class="card-header">
                        {{$sponsor->name}}
                    </h3>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Scegli questa sponsorizzazione per una durata di: <strong>{{$sponsor->hours}} ore</strong> </p>
                        <a href="{{route('admin.sponsors.add', [$apartment->id, $sponsor->id])}}" class="btn my-btn-orange">{{$sponsor->price}} €</a>
                    </div>
                </div>

            </div>
                
            @endforeach

        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div id="dropin-wrapper">
                    <div id="checkout-message"></div>
                    <div id="dropin-container"></div>
                    <button class="btn btn-success" id="submit-button">Submit payment</button>
                </div>
            </div>
        </div>
            
    </div>
    <script type="application/javascript">
        var button = document.querySelector('#submit-button');
    
        braintree.dropin.create({
          // Insert your tokenization key here
          authorization: 'sandbox_ndvsp77m_j38ywbfrfgkswnzf',
          container: '#dropin-container'
          }, function (createErr, instance) {
            button.addEventListener('click', function () {
              instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
                // When the user clicks on the 'Submit payment' button this code will send the
                // encrypted payment information in a variable called a payment method nonce
                $.ajax({
                  type: 'POST',
                  url: '/checkout',
                  data: {'paymentMethodNonce': payload.nonce}
                }).done(function(result) {
                  // Tear down the Drop-in UI
                  instance.teardown(function (teardownErr) {
                    if (teardownErr) {
                      console.error('Could not tear down Drop-in UI!');
                    } else {
                      console.info('Drop-in UI has been torn down!');
                      // Remove the 'Submit payment' button
                      $('#submit-button').remove();
                    }
                  });
                  
                  if (result.success) {
                    $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
                  } else {
                    console.log(result);
                    $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
                  }
                });
              });
            });
        });
    </script>

@endsection
