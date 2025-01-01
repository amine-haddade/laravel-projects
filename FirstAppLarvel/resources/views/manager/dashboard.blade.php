<!-- resources/views/manager/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Manager</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord manager</h1>
    <p>Ceci est une section réservée aux managers.</p>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>
</body>
</html>
