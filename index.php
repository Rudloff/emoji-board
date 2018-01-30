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
        href="node_modules/jquery-mobile/dist/jquery.mobile.min.css"
        />
    <link rel="icon" href="favicon.png" />
    <link rel="canonical" href="https://emoji.netlib.re/" />
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
            top: 50%;
            right: 1.15em;
            display: none;
            margin: 0;
            padding: 8px 15px;
            box-shadow: 0 0 50px white;
            transform: translateY(-50%);
        }

        .emoji-line:hover .emoji-btn {
            display: block;
        }

        .ui-listview > li {
            font-size: 0.75em;
        }

        .ui-listview > li h2 {
            font-size: 16px;
        }
    </style>
    <script src="node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="node_modules/jquery-mobile/dist/jquery.mobile.min.js" defer></script>
    <script src="node_modules/clipboard/dist/clipboard.min.js" defer></script>
    <script src="js/copy.js" async></script>
</head>
<body data-role="page">
    <header data-role="header">
        <h1>EmojiBoard</h1>
        <a data-mini="true" class="ui-btn-right ui-btn"
            href="https://github.com/Rudloff/emoji-board"
            title="EmojiBoard on GitHub" target="_blank" rel="noopener">Get the code</a>
    </header>
    <main data-role="content">
        <ul data-role="listview" data-filter="true">
            <?php
            $emojis = json_decode(
                file_get_contents(__DIR__.'/vendor/emojione/assets/emoji.json')
            );
            foreach ($emojis as $emoji) {
                //Don't indent the HTML at all because the output is really big.
                $emojiCode = '&#x'.str_replace(
                    '-',
                    ';&#x',
                    $emoji->code_points->output
                ).';'; ?><li class="emoji-line"><h2><span class="emoji"><?php
    echo $emojiCode; ?></span> <?php
    echo $emoji->name; ?> <button class="ui-btn ui-btn-inline emoji-btn copy-btn" data-clipboard-text="<?php
    echo $emojiCode; ?>">Copy</button></h2> <?php
    echo implode(', ', $emoji->keywords); ?></li>
<?php
            }
            ?>
        </ul>
    </main>
</body>
</html>
