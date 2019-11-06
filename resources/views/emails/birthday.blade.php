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
      font-family:"Brush Script MT";
    }

   </style>

</head>
<body>
  <div >
    <p> Bonjour M/<span  style="color:#ECA057;">  Mme <strong>{{ $employe->nom }}</strong>,</span></p>
    <div>
      <p style="margin-left: 270px;border-radius: 50%;">
        <img src="{{$message->embed(asset('storage').'/'.$employe->photo) }}"  width="130" height="130">
      </p>
      <p>En ce jour très spécial pour toi, la Direction Générale et l’ensemble du personnel ABI te souhaite</p>
      <p style="color:#ECA057;font-weight: bolder;font-size: 20px;margin-left: 200px;">Joyeux Anniversaire !!!!!!!!</p>
      <p style="margin-left: 235px;">Santé, Paix et Prospérité !</p>
       <p><img src="{{ $message->embed(asset('storage').'/'.'default/aniv8.jpg')}}" width="770" height="400"></p>

        <p>Cordialement,</p>

     </div>

</div>
<div> <img src="{{ $message->embed(asset('img/logo.png'))}}" width="200" height="60"></div>
</body>
</html>
