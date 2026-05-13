<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Usuario</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
          Información
        </div>
        <div class="card-body">
          <h3 class="card-title">Notifiación de nuevo usuario</h3>
          <p class="card-text">El usuario {{ $usuario->name }}, se acaba de registrar en la plataforma.</p>
          <p class="card-text">Su correo electrónico es {{ $usuario->email }}.</p>
        </div>
      </div>
</body>
</html>