<div class="container_2">
    <div class="newstext">
        <?php
        $text = strip_tags($news_item['text'],'<code>');
        echo '<h2>' . $news_item['title'] . '</h2>';
        echo '<p>' . $text . '</p>';
        ?>
    </div>
</div>
