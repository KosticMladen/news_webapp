<h2 class="mb-4"><?= $params['news_title']; ?></h2>
<a class="btn btn-info" href="/" style="position: absolute; top-left: 10px">Back To Main</a>
<img height="600" src="data:image/jpeg;base64,<?php echo base64_encode($params['news_image']); ?>">
<div class="container-fluid my-4">
    <p style="font-size: 20px; font-weight: 600;"><?= $params['news_body']; ?></p>
</div>