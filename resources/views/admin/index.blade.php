<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <label>nomcampagne</label>
        <input type="text" id="" name="nom_campagne" ><br>
        <label>Datedebut</label>
        <input type="date" id="" name="date_debut" ><br>
        <label>Datefin</label>
        <input type="date" id="" name="date_fin" ><br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
