<?php
/**
 * Simple emoji search list
 *
 * PHP version 5.4
 *
 * @category Index
 * @package  EmojiBoard
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  GPL http://www.gnu.org/licenses/gpl.html
 * @link     https://github.com/Rudloff/emoji-board
 * */
require_once 'vendor/autoload.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EmojiBoard</title>
    <link rel="stylesheet"
        href="bower_components/jquery-mobile-bower/css/jquery.mobile-1.4.5.min.css"
        />
    <script src="bower_components/jquery/jquery.min.js"></script>
    <script
        src="bower_components/jquery-mobile-bower/js/jquery.mobile-1.4.5.min.js">
    </script>
</head>
<body data-role="page">
    <header data-role="header">
        <h1>EmojiBoard</h1>
    </header>
    <main data-role="content">
        <ul data-role="listview" data-filter="true">
            <?php
            $emojis = json_decode(
                file_get_contents('vendor/emojione/emojione/emoji.json'), true
            );
            foreach ($emojis as $emoji) {
                echo '<li>&#x'.str_replace(
                    '-', ';&#x', $emoji['unicode']
                ).'; - '.$emoji['name'].'</li>';
            }
            ?>
        </ul>
    </main>
</body>
</html>
