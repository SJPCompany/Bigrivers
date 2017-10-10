<div class="container">
    <?php foreach ($news as $news_item): ?>

    <?php if($news_item['status'] == 'actief'){?>
        <h1><?php echo $news_item['title']; ?></h1>
        <h3><?php echo $news_item['creation_date']; ?></h3>
        <div class="main">
            <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('newsview/'.$news_item['slug']); ?>">lees meer</a></p>
    <?php }?>
<?php endforeach; ?>

</div>