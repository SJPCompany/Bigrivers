<div class="container">
    <?php foreach ($news as $news_item): ?>

        <?php if($news_item['status'] == 1){?>
        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
            <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('newsview/'.$news_item['slug']); ?>">View article</a></p>
    <?php }?>
    <?php endforeach; ?>

</div>