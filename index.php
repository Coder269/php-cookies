<?php

//Gestion du mode sombre via cookies
if (isset($_COOKIE['dark'])) {
   $_COOKIE['dark'] == 1 ? $dark = true : $dark = false;
}

if (isset($_GET['dark']))
{
    if ($_GET['dark'] == 1) {
        $dark = true;
        setcookie('dark', 1, time() + (86400 * 30));
    }
    else if ($_GET['dark'] == 0) {
        $dark = false;
        setcookie('dark', 0, time() + (86400 * 30));
    }
}

//Gestion du compteur des visites via cookies
if (isset($_COOKIE['visites'])) {
    $visites = (int)$_COOKIE['visites'] + 1;
    setcookie('visites', $visites, time() + (86400 * 30)); //Cookie expires in 30 days
}
else {
    $visites = 1;
    setcookie('visites', $visites, time() + (86400 * 30));
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: <?= $dark ? 'black' : 'white'; ?>;
            color: <?= $dark ? 'white' : 'black'; ?>;
        }
        a {
            text-decoration: none;
            color: <?= $dark ? 'white' : 'black'; ?>;
        }
    </style>
    <title>Atelier Cookies</title>
</head>
<body>
<header>
    <div style="text-align: center">
    <h1>Atelier Cookies Mode sombre | Nombre de visites</h1>
    <a href="?dark=1"><strong>Mode Sombre</strong></a>
        <span> | </span>
    <a href="?dark=0"><strong>Mode Clair</strong></a>
    </div>
</header>
<main>
    <p>C'est la <strong><?= $visites?> fois</strong> que vous visitez ce site</p>
</main>
</body>
</html>