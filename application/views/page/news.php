<div class="container_2">
    <h1>nieuwsberichten</h1>
    <?php foreach ($news as $news_item): ?>

        <?php if ($news_item['status'] == 'actief') { ?>
            <h2><?php echo $news_item['title']; ?></h2>
            <h3><?php if (strlen($news_item['text']) > 0) echo $str = substr($news_item['text'], 0, 50); ?></h3>
            <h5><?php echo $news_item['creation_date']; ?></h5>
            <h4><a href="<?php echo site_url('newsview/' . $news_item['slug']); ?>">lees meer</a></h4>
        <?php } ?>
    <?php endforeach; ?>
</div>