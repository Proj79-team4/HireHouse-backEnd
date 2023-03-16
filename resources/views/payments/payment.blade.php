<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Braintree-Demo</title>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="https://js.braintreegateway.com/web/dropin/1.31.1/js/dropin.min.js"></script>
  @vite(['resources/js/app.js'])

</head>

<body>
  <div class="container-payment-maxwidth">
    <div class="container-payment-empty">

    </div>
    <div class="container-payment-form">
      <h2> Insersci un metodo di pagamento </h2>
      <div id="dropin-container">

      </div>
      <button type="button" class="btn btn-success" id="submit-button"> Conferma e attiva la promo </button>
      <form name="form" action="{{route('payment.process')}}" method="post">
        @csrf
        @method('POST')
        <form>
          <div class="form-group">
            <input type="hidden" class="form-control" name="fake-valid-nonce" id="nonce" placeholder="" value="12">
            <input type="hidden" class="form-control" name="sponsor" id="nonce" placeholder="" value="{{$sponsor->id}}">
            <input type="hidden" class="form-control" name="apartment" id="nonce" placeholder="" value="{{$apartment->id}}">
          </div>
    </div>
  </div>
  <script type="module">
    var button = document.querySelector('#submit-button');
    braintree.dropin.create({
    authorization: 'sandbox_csftj7wv_m52fv2wvg4mdqvst',
    container: '#dropin-container'
    }, function (err, instance) {
    button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
    document.querySelector('#nonce').value = payload.nonce;
    form.submit();
    });
    });
    });
  </script>
</body>

</html>