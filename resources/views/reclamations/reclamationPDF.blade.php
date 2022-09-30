<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reclamation Document</title>
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
    <h2>Reclamation Number: {{$attribute->id}}</h2>
    <h4>User name: {{$attribute->user->name}}</h4>
    <table>
      <tr>
        <th>reclamation number</th>
        <th>user</th>
        <th>description</th>
        <th>reclamation date</th>
      </tr>
      @foreach ($reclamation as $rec)
      <tr>
        <td>{{$rec->id}}</td>
        <td>{{$attribute->user->name}}</td>
        <td>{{$rec->description}}</td>  
        <td>{{$attribute->created_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    </table> 
</body>
</html>