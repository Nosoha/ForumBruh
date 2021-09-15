<div id="connexion"> 
<h1>CONNEXION</h1>
<form action="?ctrl=security&action=login" method="post">
    <p>
        <input type="email" name="email" id="" placeholder="E-mail..." required>
    </p>
    <p>
        <input type="password" name="password" id="" placeholder="Mot de passe..." required>
    </p>
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    <p><input type="submit" value="Connexion"></p>
</form>

</div>

