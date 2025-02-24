<a href="{{ route('admin.create')  }}">add</a>
<table>
    <thead>
    <td>Nom</td>
    <td>DateDebut</td>
    <td>DateFin</td>
    <td>Action</td>
    </thead>
    <tbody>
    @foreach($campagnes as $c)
        <tr>
            <td>{{ $c->nom_campagne  }}</td>
            <td>{{ $c->date_debut  }}</td>
            <td>{{ $c->date_fin  }}</td>
            <td>
                <a href=""><button>delete</button></a>
                <a href=""><button>edit</button></a>
                <a href="{{ route('admin.show',$c->id) }}"><button>Show</button></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
