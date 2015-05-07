<?php

if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__) . DS);
}

if (!defined('TEMPLATES_PATH')) {
    define('TEMPLATES_PATH', ROOT . 'app' . DS . 'templates' . DS);
}
if (!defined('PLUGINS_PATH')) {
    define('PLUGINS_PATH', ROOT . 'plugins' . DS);
}

if (!defined('CONTROLLERS_PATH')) {
    define('CONTROLLERS_PATH', ROOT . 'app' . DS . 'controllers' . DS);
}

if (!defined('CONFIGS_PATH')) {
    define('CONFIGS_PATH', ROOT . 'configs' . DS);
}

if (!defined('ADMIN_PATH')) {
    define('ADMIN_PATH', ROOT . 'app' . DS . 'admin' . DS);
}

if (!defined('CACHE_PATH')) {
    define('CACHE_PATH', ROOT . 'cache' . DS);
}

if (!function_exists('base')) {
    function base() {
        return '';
    }
}

if (!function_exists('url_to')) {
    function url_to($url) {
        return base() . (config('url_rewrite', true) ? '' : '/index.php') . (substr($url, 0, 1) == '/' ? $url : '/' . $url);
    }
}

if (!function_exists('static_to')) {
    function static_to($url) {
        return base() . '/static.php' . (substr($url, 0, 1) == '/' ? $url : '/' . $url);
    }
}

if (!function_exists('message')) {
    function message($message, $type = 'success', $options = []) {
        $app = Mithos\Slim\Application::getInstance();
        if ($app->request()->isAjax()) {
            $app->response()->header('Content-Type', 'application/json');
            $json = json_encode(array_merge([
                'success' => $type === 'success',
                (is_array($message) ? 'errors' : 'message') => $message
            ], $options));
            $app->response()->body($json);
        } else {
            $app->flash($type, $message);
            if (isset($options['redirect'])) {
                $app->redirect($options['redirect']);
            }
        }
    }
}

if (!function_exists('success')) {
    function success($message, $options = []) {
        message($message, 'success', $options);
    }
}

if (!function_exists('error')) {
    function error($message, $options = []) {
        message($message, 'error', $options);
    }
}

if (!function_exists('fetch')) {
    function fetch($type) {
        $out = '';
        $data = Mithos\Slim\Application::getInstance()->view()->get($type);
        $data = $data === null ? [] : $data;
        switch ($type) {
            case 'javascript':
                foreach ($data as $script) {
                    $out .= '<script type="text/javascript" src="' . static_to($script) . '"></script>';
                }
            break;
            case 'css':
                foreach ($data as $style) {
                    $out .= '<link rel="stylesheet" href="' . static_to($style) . '" />';
                }
            break;
            default:
                $out = join('', $data);
        }

        return $out;
    }
}

if (!function_exists('partial')) {
    function partial($partial) {
        require config('path.templates') . config('template.site', 'default') . DS . 'views' . DS . 'partials' . DS . $partial . '.php';
    }
}

if (!function_exists('account')) {
    function account($username = null) {
        return new Mithos\Account\Account($username);
    }
}

if (!function_exists('character')) {
    function character($name = null) {
        return new Mithos\Character\Character($name);
    }
}

if (!function_exists('guild')) {
    function guild($name = null) {
        return new Mithos\Guild\Guild($name);
    }
}