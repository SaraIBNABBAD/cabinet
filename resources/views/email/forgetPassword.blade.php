
<h2 class="text-center"><strong> Mr/Mme  </strong></h2>

{{-- Vous avez oublié votre mot de passe ?
Rien de grave!
Voici le lien pour créer un nouveau mot de passe et accéder à votre compte.
<a href="{{ route('reset.password.get', $token) }}">Réinitialiser le mot de passe</a> --}}

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <p class="card-text">Vous avez oublié votre mot de passe ?</p>
      <p class="card-text">Rien de grave!</p>
      <p class="card-text">Voici le lien pour créer un nouveau mot de passe et accéder à votre compte.
    </p>
      <a href="{{ route('reset.password.get', $token) }}" class="btn btn-primary">Réinitialiser</a>
    </div>
  </div>


  