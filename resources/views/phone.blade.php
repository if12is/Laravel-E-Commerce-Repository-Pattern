<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
    <title>phone number</title>
    <style>
        .hide{
            display: none;
        }
        #valid-msg{
            color: green;
        }
        #error-msg{
            color:red;
        }
    </style>
</head>

<body>
<p id="message"></p>
<form id="form" action="{{route('phone-value')}}" method="post">
    @csrf
    @method('post')
    <input id="phone" type="tel" name="value">
    <span id="valid-msg" class="hide">✓ Valid</span>
    <span id="error-msg" class="hide"></span>
    <input type="submit">
</form>

</table>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
     <script src="{{ asset('phone.js') }}"></script>
</body>

</html>
