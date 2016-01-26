Klik hier om je wachtwoord te resetten: <a href="{{ $link = url('wachtwoord/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
