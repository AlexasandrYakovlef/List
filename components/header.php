<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="Style.css" rel="stylesheet" type="text/css">
    <script src="ChangeTem.js"></script>
</head>
<body onload="SetTheme()">
    <header>
        <input type="submit" value="Change tema" class="bt" name="tema" onclick = "ChangeTema()">
    </header>