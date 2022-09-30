<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h2>Rapport Commandes Period</h2>
    <h4>From:{{$start_date}} To {{$start_date}}</h4>
    <table>
      <thead>
        <tr>
          <th>Commande Number</th>
          <th>User</th>
          <th>Departement</th>
          <th>Approved</th>
          <th>Creation Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($commandes_rapport_array as $commande_rapport)
          <tr>
            <td>{{$commande_rapport->commande_number}}</td>
            <td>{{($commande_rapport->user->name)}}</td>
            <td>{{$commande_rapport->user->departement->name}}</td>                   
            <td>{{$commande_rapport->approved}}</td>                   
            <td>{{$commande_rapport->created_at->diffForHumans()}}</td>                   
        @endforeach
      </tbody>
    </table> 
</body>
</html>