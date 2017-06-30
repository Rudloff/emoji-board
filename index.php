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

        .emoji-btn {
            position: absolute;
                top: 50%; right: 1.15em;
            display: none;
            margin: 0;
            padding: 8px 15px;
            box-shadow: 0 0 50px white;
            transform: translateY(-50%);
        }

        .emoji-line:hover .emoji-btn {
            display: block;
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
                file_get_contents(__DIR__.'/vendor/emojione/assets/emoji.json')
            );
            foreach ($emojis as $emoji) {
                $emojiCode = '&#x'.str_replace(
                    '-',
                    ';&#x',
                    $emoji->code_points->output
                ).';'; ?>
                <li class="emoji-line">
                    <h2>
                        <span class="emoji"><?php echo $emojiCode; ?></span>
                        <?php echo $emoji->name; ?>
                        <button class="ui-btn ui-btn-inline emoji-btn copy-btn" data-clipboard-text="<?php echo $emojiCode; ?>">Copy</button>
                    </h2>
                    <p><?php echo implode(', ', $emoji->keywords); ?></p>
                </li>
            <?php
            } ?>
        </ul>
    </main>
    <script src="bower_components/jquery/jquery.min.js"></script>
    <script src="bower_components/jquery-mobile-bower/js/jquery.mobile-1.4.5.min.js"></script>
    <script src="bower_components/clipboard/dist/clipboard.min.js"></script>
    <script>new Clipboard('.copy-btn');</script>
</body>
</html>
