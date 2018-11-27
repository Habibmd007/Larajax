<!DOCTYPE html>
<html lang="en">
<body>
    <h3>Dear {{$user->name}}</h3>
    <p>Your account has been created by event. Please click the following link to activate your account</p>
    <a href="{{route('verify',$user->email_verification_token)}}">Click here  </a>
    <br>
    <h3>Thanks</h3>
</body>
</html>