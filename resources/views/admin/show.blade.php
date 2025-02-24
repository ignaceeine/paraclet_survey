<h1>Nom campagne : {{ $campagne->nom_campagne }}</h1>
<h1>Date debut : {{ $campagne->date_debut }}</h1>
<h1>Date fin : {{ $campagne->date_fin }}</h1><br><br>
<h1>Creer un groupe </h1><br>
<form action="{{ route('members.store') }}" method="Post" enctype="multipart/form-data" >
    @csrf
    <label>Nom Groupe</label>
    <input type="text" name="nom_groupe"><br>
    <label>Charger les membres</label><br>
    <input type="file" name="excel_file"><br>
    <button type="submit">Creer</button>
</form>
