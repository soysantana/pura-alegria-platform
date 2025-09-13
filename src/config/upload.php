<?php

function resize_image($fileTmpPath, $fileExt, $maxWidth = 1920, $jpegQuality = 85)
{
    switch ($fileExt) {
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($fileTmpPath);
            break;
        case 'png':
            $image = imagecreatefrompng($fileTmpPath);
            break;
        case 'gif':
            $image = imagecreatefromgif($fileTmpPath);
            break;
        default:
            return false;
    }
    if (!$image) {
        return false;
    }
    $width = imagesx($image);
    $height = imagesy($image);
    if ($width > $maxWidth) {
        $newWidth = $maxWidth;
        $newHeight = intval($height * $maxWidth / $width);
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        if ($fileExt === 'png' || $fileExt === 'gif') {
            imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
        }
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagedestroy($image);
        $image = $newImage;
    }
    return $image;
}

function upload_image($file, $subfolder = '', $maxWidth = 1920, $jpegQuality = 85)
{
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['error' => 'Error al subir el archivo'];
    }
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileName = $file['name'];
    $fileTmpPath = $file['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($fileExt, $allowedExtensions)) {
        return ['error' => 'Tipo de archivo no permitido'];
    }
    $image = resize_image($fileTmpPath, $fileExt, $maxWidth, $jpegQuality);
    if (!$image) {
        return ['error' => 'No se pudo crear la imagen'];
    }
    $random = substr(bin2hex(random_bytes(2)), 0, 7);
    $newFileName = $random . '.' . $fileExt;
    $baseDir = __DIR__ . '/../uploads/';
    if ($subfolder) {
        $folderPath = rtrim($baseDir, '/\\') . '/' . trim($subfolder, '/\\') . '/';
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        $destPath = $folderPath . $newFileName;
    } else {
        $destPath = $baseDir . $newFileName;
    }
    switch ($fileExt) {
        case 'jpg':
        case 'jpeg':
            $saved = imagejpeg($image, $destPath, $jpegQuality);
            break;
        case 'png':
            $pngCompression = 6;
            $saved = imagepng($image, $destPath, $pngCompression);
            break;
        case 'gif':
            $saved = imagegif($image, $destPath);
            break;
    }
    imagedestroy($image);
    if (!$saved) {
        return ['error' => 'No se pudo guardar la imagen'];
    }
    if ($subfolder) {
        $imagePath = $subfolder . '/' . $newFileName;
    } else {
        $imagePath = $newFileName;
    }
    return ['fileName' => $imagePath];
}
