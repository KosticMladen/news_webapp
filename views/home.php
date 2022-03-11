<?php
    foreach ($params as $news) :
    /** '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>' */
?>
<div style="position: relative" class="my-4">
    <a href="/article?id=<?= $news['id']; ?>">
        <img height="600" src="data:image/jpeg;base64,<?php echo base64_encode($news['news_image']); ?>">
        <h2 style="color:white; position: absolute; bottom: 8px; left:16px"><?= $news['news_title']; ?></h2>
    </a>
</div>
<?php endforeach; ?>