<?php
$form = new Form(array(
    'username'=>'Roger'
));

echo $form->input('username','Pseudo');
echo $form->input('password','Mot de passe',['type'=>'password']);
echo $form->submit();