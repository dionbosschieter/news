<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div id="content">
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
</div>
</body>
