<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/build/style.css">
    <title>
        <?php
        if (!empty($page_title))
            echo remove_junk($page_title);
        else
            echo "503";
        ?>
    </title>
</head>

<?php $pages = include_once __DIR__ . '/../config/pages.php';
$currentFile = basename($_SERVER['PHP_SELF']);
$currentPageData = $pages[$currentFile] ?? ["title" => "Unknown", "modals" => []];

// variable for Alpine.js
$alpineData = [
    'page'        => $currentPageData['title'],
    'loaded'      => true,
    'darkMode'    => false,
    'stickyMenu'  => false,
    'sidebarToggle' => false,
    'scrollTop'   => false
];

if (!empty($currentPageData['modals'])) {
    foreach ($currentPageData['modals'] as $modal) {
        $alpineData["is{$modal}Modal"] = false;
    }
}
?>

<body
    x-data='<?= json_encode($alpineData) ?>'
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}">