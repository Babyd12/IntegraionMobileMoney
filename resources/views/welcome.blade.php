<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
</head>
<body>
    <h2>Paiement via PayTech</h2>
    
    <!-- Formulaire de paiement -->
    <form action="{{ route('paiement') }}" method="POST">
        @csrf <!-- Token de sécurité CSRF -->
        <button type="submit">Payer</button>
    </form>
</body>
</html>
