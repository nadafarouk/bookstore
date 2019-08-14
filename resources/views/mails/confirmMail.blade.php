Hello <i></i>,
<p>This is a demo email for confirming your email </p>

<p><u>click the following link to confirm your account </u></p>


<div>
    <p><a href="{{url('api/users/verify', $user['activation_token'])}}">Verify Email</a></p>

</div>

Thank You,
<br/>
