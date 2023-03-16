<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree-Demo</title>
    <script  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="  crossorigin="anonymous"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.31.1/js/dropin.min.js"></script>
    @vite(['resources/js/app.js'])

</head>
<body>
  <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3">
         <div id="dropin-container"></div>
         <button id="submit-button">Submit</button>
       </div>
     </div>
  </div>
  <script type="module">
    
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "sandbox_ndvsp77m_j38ywbfrfgkswnzf",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          axios.get('{{ route('payment.process') }}', {payload}, function (response) {
            if (response.success) {
              alert('Payment successfull!');
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });
      });
    });
  </script>
</body>
</html>