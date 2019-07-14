<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: "DejaVu Sans Mono", Monospaced, Ubuntu, Serif;
        font-size: 1em;
        margin: 0 auto;
        max-width: 700px;
        padding: 14px;
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
