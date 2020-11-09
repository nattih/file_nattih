 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>IMPRESSION</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="card table-responsive ">
            <h2 class="text-center">liste des  anciens employés</h2>
        <table class="table table-bordered  text-nowrap table-striped ">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">N°</th>
                    <th scope="col">Fin du contrat</th>
                    <th scope="col">Contrat</th>
                    <th scope="col">Nom & prénom(s)</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Residence</th>
                    <th scope="col">poste</th>
                  </tr>
            </thead>
            <tbody>
                @foreach($users as $key=>$data)
                <tr>
                    <td scope="row">{{++$key}}</td>
                    <td scope="row">{{$data->updated_at->format('d/m/y à H:m')}}</td>
                    <td scope="row">{{$data->contrat}}</td>
                    <td scope="row">{{$data->name}} {{$data->prenom}} </td>
                    <td scope="row">{{$data->sexe}}</td>
                    <td scope="row">{{$data->contact}}</td>
                    <td scope="row">{{$data->email}}</td>
                    <td scope="row">{{$data->residence}}</td>
                    <td scope="row">{{$data->poste->nom}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </body>
</html>