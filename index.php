<?php

//Gestion du mode sombre via cookies
if (isset($_COOKIE['dark'])) {
    if ($_COOKIE['dark'] == 1)
        $dark = true;
    else $dark = false;
}

if (isset($_GET['dark']))
{
    if ($_GET['dark'] == 1) {
        $dark = true;
        setcookie('dark', 1);
    }
    else if ($_GET['dark'] == 0) {
        $dark = false;
        setcookie('dark', 0);
    }
}

//Gestion du compteur des visites via cookies
if (isset($_COOKIE['visites'])) {
    $visites = $_COOKIE['visites'] + 1;
    setcookie('visites', $visites);
}
else {
    setcookie('visites', 1);
    $visites = 1;
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
        }
    </style>
    <title>Atelier Cookies</title>
</head>
<body>
<header>
    <a href="?dark=1"><strong>Mode Sombre</strong></a>
    <br>
    <br>
    <a href="?dark=0"><strong>Mode Clair</strong></a>
</header>
<main>
    <h1>C'est la <?= $visites?> fois que vous visitez ce site</h1>
</main>
</body>
</html>