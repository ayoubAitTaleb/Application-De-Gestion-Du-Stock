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
    <h2>Commande Number: {{$commande_number_index->commande_number}}</h2>
    <h4>User name: {{$commande_number_index->user->name}}</h4>
    <table>
      <tr>
        <th>articles</th>
        <th>quantity</th>
        <th>creation date</th>
      </tr>
      @foreach ($data as $commande)
      <tr>
        <td>{{$commande->article_name}}</td>
        <td>{{$commande->quantity}}</td>   
        <td>{{$commande_number_index->created_at->diffForHumans()}}</td>
      </tr>
        @endforeach
    </table> 
</body>
</html>