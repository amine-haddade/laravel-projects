<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Admin</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord administrateur</h1>
    <p>Ceci est une section réservée aux administrateurs.</p>

    <!-- Bouton de Déconnexion -->
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>
</body>
</html>
