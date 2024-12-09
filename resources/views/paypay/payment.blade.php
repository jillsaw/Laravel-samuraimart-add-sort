<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel PayPay API</title>
</head>

<body>
  <form method="POST" action="{{ route('paypay.payment') }}">
    @csrf

    <input type="number" name="price">

    <button type="submit">決済</button>
  </form>
</body>

</html>