<?php include "includes/navigation.php" ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Afspraak Maken</h1>

<div>
    <form action="">

        <!--         Select the sort haircut-->
        <select placeholder="Soort Knipbeurt">
            <option value="" disabled selected hidden>Soort Knipbeurt</option>
            <option value="0">Heren Knippen</option>
            <option value="1">Heren Knippen & Wassen</option>
            <option value="2">Dames Knippen</option>
            <option value="3">Dames Knippen & Verven</option>
        </select>

        <br>

        <!--        Select the date-->
        <form action="">
            <input type="date" id="birthday" name="birthday">
        </form>

        <!--         Select the time-->
        <select placeholder="Tijd">
            <option value="" disabled selected hidden>Tijd</option>
        </select>

        <br>

        <button>Volgende</button>

    </form>
</div>

</body>
</html>
