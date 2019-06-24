<?php if (!isset($layout_context)) {
    $layout_context = "public";} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheets/public.css" media="all" type="text/css" >
    <title>Widget Corp <?php if ($layout_context == "admin") { echo "Admin";} ?></title>
</head>
<body>
<div id="header">
            <h1>Widget Corp 
                <?php 
                if ($layout_context == "admin") 
                { echo "Admin";} ?>
            </h1>
        </div>

