<style>
    body {
        padding-top: 14px;
        font-family: "DejaVu Sans Mono", Monospaced, Ubuntu, Serif;
        font-size: 1em;
        margin: 0 auto;
        max-width: 700px;
    }
    a {
        color: #000;
    }
</style>
<body>
<?php

function readArticle($article) {
    $content = file_get_contents('http://www.nrc.nl/' . $article);

    preg_match('/<div class="content article__content">\s+(.*?)\s+<\/div>/sm', $content, $matches);

    if ($matches) {
        $content = $matches[1];
        echo $content;
    }
}

function write($message) {
    echo $message . '<br>' . PHP_EOL;
}

readArticle($_GET['link']);

?>
</body>
