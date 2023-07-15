<?php

if (isset($_GET['filter'])) {
    setcookie('accessibilityfilter', $_GET['filter'], time() + (86400 * 30), "/");
    echo "ok";
    die;
}
if ($_SERVER['REQUEST_URI'] == "/sociallinks") {
    echo <<<end
            <a href="https://discord.com/users/718850508135333919" style="display: inline">
                <img src="https://assets-global.website-files.com/6257adef93867e50d84d30e2/636e0a69f118df70ad7828d4_icon_clyde_blurple_RGB.svg" width="35px" height="35px" alt="Discord" title="Discord (not the mlp kind, the chat app kind)">
            </a>
            <a href="https://github.com/strawmelonjuice/">
                <img src="/assets/img/svg/github-mark.svg" height="35px" alt="GitHub" title="Gitty Hub">
            </a>
            <a href="https://tumblr.com/strawmelonjuice/">
                <img src="https://assets.tumblr.com/pop/manifest/favicon-cfddd25f.svg" height="35px" alt="Tumblr" title="Tumblr (dash edition)">
            </a>     
            <a href="https://www.last.fm/user/strawmelonjuice">
                <img src="https://www.last.fm/static/images/lastfm_avatar_applemusic.b06eb8ad89be.png" height="35px" alt="Last.FM" title="LastFM: moosik list">
            </a>
    end;
    die;
}
if (isset($_GET['getimgmote'])) {
    if (file_exists($GLOBALS['rootdir'] . "assets/img/imgmote/" . $_GET['getimgmote'] . ".gif")) {
    $src = '/assets/img/imgmote/' . $_GET['getimgmote'] . '.gif';
  } else if (file_exists($GLOBALS['rootdir'] . "assets/img/imgmote/" . $_GET['getimgmote'] . ".webp")) {
    $src = '/assets/img/imgmote/' . $_GET['getimgmote'] . '.webp';
  } else if (file_exists($GLOBALS['rootdir'] . "assets/img/imgmote/" . $_GET['getimgmote'] . ".png")) {
    $src = '/assets/img/imgmote/' . $_GET['getimgmote'] . '.png';
  } else if (file_exists($GLOBALS['rootdir'] . "assets/img/imgmote/" . $_GET['getimgmote'] . ".svg")) {
    $src = '/assets/img/imgmote/' . $_GET['getimgmote'] . '.svg';
  } else {
    die("/404");
  }
    die($src);
  }
if ($_SERVER['REQUEST_URI'] == "/accessibilityfilter") {
    echo $_COOKIE['accessibilityfilter'];
    die;
}
if (isset($_GET['kitton'])) {
    setcookie('wantkitton', $_GET['kitton'], time() + (86400 * 30), "/");
    echo "ok";
    die;
}
if ($_SERVER['REQUEST_URI'] == "/kittonstatus") {
    if ($_COOKIE['wantkitton'] == "") {
        echo true;
        die;
    }
    echo $_COOKIE['wantkitton'];
    die;
}

// Send users where they need to be

switch ($_SERVER['REQUEST_URI']) {
    case '/oneko.gif':
    case '/onekogif':
        header("Location: /assets/img/kitton.gif");
        // header("Content-type: image/gif");
        // file_get_contents(__DIR__ . "/assets/img/kitton.gif");
        die;
    case '/':
    case '/index.php':
    case '/home/':
    case '/home':
    case '/index':
    case '/index/':
        require_once(__DIR__ . '/pages/home.php');
        die;
    case '/?p=3':
    case '/blog/':
    case '/blog':
        require_once(__DIR__ . '/pages/blog.php');
        die;
    case '/search/':
    case '/search':
        require_once(__DIR__ . '/pages/search-blog.php');
        die;
    case '/?p=2':
    case '/blog/link-in-bio/':
    case '/blog/link-in-bio':
    case '/links':
    case '/links/':
        $file = "links";
        require_once(__DIR__ . '/pages/md.php');
        die;
    case '/about':
    case '/about/':
    case '/aboutme':
    case '/aboutme/':
    case '/about-me':
    case '/about-me/':
        $file = "1";
        require_once(__DIR__ . '/pages/md.php');
        die;
}
if (isset($_GET['p'])) {
    $file = $_GET['p'];
    require_once(__DIR__ . '/pages/md.php');
    die;
}
if (isset($_GET['c'])) {
    $filtercat = $_GET['c'];
    require_once(__DIR__ . '/pages/blog.php');
    die;
}
if (isset($_GET['s'])) {
    $searchtrough = $_GET['s'];
    require_once(__DIR__ . '/pages/blog.php');
    die;
}


// If we're here... we hit a 404 I think!
$file = '404 trigger';
require_once(__DIR__ . '/pages/md.php');
die;