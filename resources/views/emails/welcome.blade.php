<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bienvenue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #000a46;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 30px;
            text-align: left;
        }

        .content h2 {
            color: #000a46;
            font-size: 20px;
            margin-top: 0;
        }

        .credentials {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 4px;
            margin: 20px 0;
        }

        .credentials ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .credentials li {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }

        .credentials strong {
            color: #000a46;
            font-weight: 600;
        }

        .footer {
            background-color: #000a46;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                border-radius: 0;
            }

            .content, .header, .footer {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Bienvenue</h1>
    </div>
    <div class="content">
        <h2>Bonjour {{ $member->prenom }} {{ $member->nom }} !</h2>
        <p>Votre compte a été créé avec succès. Voici vos identifiants de connexion :</p>
        <div class="credentials">
            <ul>
                <li><strong>Nom d'utilisateur :</strong> {{ $member->username }}</li>
                <li><strong>Mot de passe :</strong> {{ $password }}</li>
            </ul>
        </div>
        <p>Veuillez conserver ces informations en sécurité. Vous pouvez vous connecter via notre site web.</p>
    </div>
    <div class="footer">
        <p>Cordialement,<br>L'équipe Paraclet</p>
        <p>&copy; {{ date('Y') }} Paraclet. Tous droits réservés.</p>
    </div>
</div>
</body>
</html>
