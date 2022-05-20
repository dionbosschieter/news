<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div id="content">
<?php

function readArticle($article) {
    $context = stream_context_create([
      'http'=> [
        'protocol_version' => 1.0,
        'method'           => "GET",
        'header'           => "Accept-language: en\r\n",
        'user_agent'       => $_SERVER['HTTP_USER_AGENT'] ?? 'curl/7.81.0'
      ]
    ]);
    $content = file_get_contents('http://www.nrc.nl/' . $article, false, $context);

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
