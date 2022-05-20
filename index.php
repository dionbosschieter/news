<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: "DejaVu Sans Mono", Monospaced, Courier, Ubuntu, Serif;
        font-size: 1em;
        margin: 0 auto;
        max-width: 700px;
        padding: 14px 14px;
    }
    a {
        color: #000;
    }
</style>
<body>
<?php

function write($message) {
    echo $message . '<br>' . PHP_EOL;
}

$context = stream_context_create([
  'http'=> [
    'protocol_version' => 1.0,
    'method'           => "GET",
    'header'           => "Accept-language: en\r\n",
    'user_agent'       => $_SERVER['HTTP_USER_AGENT'] ?? 'curl/7.81.0'
  ]
]);
$content = file_get_contents('https://www.nrc.nl/', false, $context);

function getNewsForDate(DateTime $date) {
    global $content;
    $dateAsString = $date->format('Y/m/d');
    $day = preg_quote($dateAsString, '/');

    write('<h1># &#128197; ' . $dateAsString . '</h1>');

    preg_match_all('/<a href="(\/nieuws\/'.$day.'\/.*?)" class="nmt-item__link">/', $content, $matches);

    $links = $matches[1];
    foreach ($links as $link) {
        write("<a href='/article.php?link={$link}'><article>{$link}</article></a>");
    }
}

getNewsForDate(new DateTime);
getNewsForDate(new DateTime('-1 day'));

?>
</body>
