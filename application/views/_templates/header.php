<?php if (!$this) {exit(header('HTTP/1.0 403 Forbidden')); } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>PHP MVC Eswood</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href="<?php echo URL_WITH_INDEX_FILE; ?>"><?php echo URL_WITH_INDEX_FILE; ?>home</a></li>
                <li><a href="<?php echo URL_WITH_INDEX_FILE; ?>home/exampleone"><?php echo URL_WITH_INDEX_FILE; ?>home/exampleone</a></li>
                <li><a href="<?php echo URL_WITH_INDEX_FILE; ?>home/exampletwo"><?php echo URL_WITH_INDEX_FILE; ?>home/exampletwo</a></li>
                <li><a href="<?php echo URL_WITH_INDEX_FILE; ?>songs/"><?php echo URL_WITH_INDEX_FILE; ?>songs/index</a></li>
            </ul>
        </div>
    </div>
