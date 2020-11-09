 
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
        <h2 class="text-center">liste de stage</h2>
        <table class="table table-bordered text-nowrap table-striped ">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">N°</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nom & prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Objet</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offres as $key=>$data)
                <tr>
                    <td scope="row">{{++$key}}</td>
                    <td scope="row">{{$data->created_at->format('d/m/y à H:m')}} </td>
                    <td scope="row">{{$data->nom}}  </td>
                    <td scope="row">{{$data->email}}</td>
                    <td scope="row">{{$data->motif}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>