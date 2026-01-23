<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/build/style.css">
    <link rel="icon" type="image/png" href="/src/images/logo/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/src/images/logo/favicon.svg" />
    <link rel="shortcut icon" href="/src/images/logo/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/src/images/logo/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Pura Alegria" />
    <link rel="manifest" href="/site.webmanifest" />
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

if (!empty($currentPageData['data'])) {
    foreach ($currentPageData['data'] as $dataKey => $dataValue) {
        $alpineData[$dataKey] = $dataValue;
    }
}
?>

<body
    x-data='<?= json_encode($alpineData) ?>'
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}">

    <?php
    if (function_exists('current_user') && isset($db)) {
        $user = current_user();
    } else {
        $user = null;
    }
    ?>