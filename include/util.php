<?php
function debug($something) {
    echo "<div class='debug'>\n";
    print_r($something);
    echo "\n</div>\n";
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function redirectRelative($url) {
    redirect(relativeURL($url));
}

function relativeUrl($url) {
    $arr = explode('/', $_SERVER['SCRIPT_NAME']);
    $arr = array_slice($arr, 1, count($arr) - 2);
    return '/' . implode('/', $arr) . '/' . $url;
}

function render($view, $params) {
    extract($params);
    ob_start();
    include "views/{$view}.inc";
    echo ob_get_clean();
    exit();
}

function __importTemplate($matches) {
    $fileName = $matches[1];
    if (!file_exists($fileName)) {
        debug("File $fileName doesn't exist.");
        return '';
    }
    $contents = file_get_contents($fileName);
    $contents = preg_replace_callback('/%%\s*(.*)\s*%%/', '__importTemplate', $contents);
    return $contents;
}

function __resolveRelativeUrls($matches) {
    return relativeUrl($matches[1]);
}

function renderTemplate($view, $params) {
    if (!file_exists($view)) {
        die("File $view doesn't exist.");
    } else {
        # do we have a cached version?
        clearstatcache();
        $cacheName = $view . '.cache';
        if (file_exists($cacheName) && (filemtime($cacheName) >= filemtime($view))) {
            $contents = file_get_contents($cacheName);
        } else {
            # we need to build the file (doesn't exist or template is newer)
            $contents = __importTemplate(array('unused', $view));

            $contents = preg_replace_callback('/@@\s*(.*)\s*@@/', '__resolveRelativeUrls', $contents);

            $patterns = array( array('src' => '/{{/', 'dst' => '<?php echo('), array('src' => '/}}/', 'dst' => '); ?>'), array('src' => '/\[\[/', 'dst' => '<?php '), array('src' => '/\]\]/', 'dst' => ' ?>'));
            foreach ($patterns as $pattern) {
                $contents = preg_replace($pattern['src'], $pattern['dst'], $contents);
            }
            file_put_contents($cacheName, $contents);
        }
        extract($params);
        ob_start();
        eval("?>" . $contents);
        $result = ob_get_contents();
        ob_end_clean();
        echo $result;
    }
}
?>