<?php
require_once __DIR__.'/vendor/autoload.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EmojiBoard</title>
    <link rel="stylesheet"
        href="bower_components/jquery-mobile-bower/css/jquery.mobile-1.4.5.min.css"
        />
    <link rel="icon" href="favicon.png" />
    <meta name="description" content="Simple emoji search list" />
    <meta name="theme-color" content="#E9E9E9">
    <link rel="manifest" href="manifest.json" />
    <style>
        .emoji {
            font-size:x-large;
            vertical-align: middle;
            padding-right: 0.5ex;
        }
    </style>
</head>
<body data-role="page">
    <header data-role="header">
        <h1>EmojiBoard</h1>
        <a data-mini="true" class="ui-btn-right ui-btn"
            href="https://github.com/Rudloff/emoji-board"
            title="EmojiBoard on GitHub" target="_blank">Get the code</a>
    </header>
    <main data-role="content">
        <ul data-role="listview" data-filter="true">
            <?php
            $emojis = json_decode(
                file_get_contents(__DIR__.'/vendor/emojione/emojione/emoji.json')
            );
            foreach ($emojis as $emoji) {
                echo '<li>
                    <h2><span class="emoji">&#x'.
                    str_replace(
                        '-',
                        ';&#x',
                        $emoji->code_points->output
                    ).';</span> '.$emoji->name.'</h2>
                <p>'.implode(', ', $emoji->keywords).'</p>
                </li>';
            }
            ?>
        </ul>
    </main>
    <script src="bower_components/jquery/jquery.min.js"></script>
    <script
        src="bower_components/jquery-mobile-bower/js/jquery.mobile-1.4.5.min.js">
    </script>
</body>
</html>
