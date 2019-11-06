<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Joyeux anniversaire</title>
  <style>

/* vietnamese */

  *{
      font-size: 14px;
      font-family:"Lucida Calligraphy";

    }

   </style>

</head>
<body>
  <div>
    <p> Bonjour M/<span  style="color:#ECA057;">  Mme <strong>{{ $employe->nom }}</strong>,</span></p>
    <div>

      <p>En ce jour très spécial pour toi, la Direction Générale et l’ensemble du personnel ABI vous souhaite</p>
      <p style="color:#ECA057;font-weight: bolder ">Joyeux Anniversaire !!!!!!!!</p>
      Santé, Paix et Prospérité !

       <p><img src="{{ $message->embed(asset('storage').'/'.'default/aniv5.gif')}}" width="770" height="400"></p>

        <p>Cordialement,</p>

     </div>

</div>
<div> <img src="{{ $message->embed(asset('img/logo.png'))}}" width="200" height="60"></div>
</body>
</html>
