<?php

require "../vendor/autoload.php";

$parts = array_filter(explode('/', $_SERVER['PHP_SELF']), 'strlen');
if (isset($parts[2]) && in_array($parts[2], ['template', 'plugin'])) {
    $type = $parts[2];
    $name = $parts[3];
    unset($parts[1], $parts[2], $parts[3]);

    $file = implode(DS, $parts);

    if ($type === 'template') {
        $path = TEMPLATES_PATH . $name . DS . 'public' . DS;
    } else {
        $path = PLUGINS_PATH . $name . DS . 'public' . DS;
    }

    $file = $path . $file;

    if (file_exists($file)) {
        $pathinfo = pathinfo($file);
        header('Content-Type:' . Mithos\Util\MimeType::getMimeType($pathinfo['extension']));
        echo readfile($file);
    }
} elseif (isset($parts[2]) && in_array($parts[2], ['guild'])) {
    $mark = $parts[4];
    $size = isset($parts[5]) ? $parts[5] : 64;

    $logo = new Mithos\Guild\Logo();
    $logo->setMark($mark)
        ->setSize($size)
        ->toImage();

    header('Content-type: image/png');
} elseif (isset($parts[2]) && in_array($parts[2], ['captcha'])) {
    $width = isset($parts[3]) ? $parts[3] : 200;
    $height = isset($parts[4]) ? $parts[4] : 70;
    $captcha = new CoolCaptcha\Captcha();
    $captcha->width = $width;
    $captcha->height = $height;
    $text = $captcha->createImage();
    Mithos\Network\Session::write('captcha', $text);
}