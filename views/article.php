<?php
    use app\core\Application;

    $user = Application::$app->user;
    $article_id = $_GET['id'];
?>

<h2 class="mb-4"><?= $params['news_title']; ?></h2>
<?php if ($user['users_status'] === 'admin'): ?>
    <div class="mb-2">
        <a class="btn btn-danger" href="/delete?id=<?= $article_id ?>">Delete Article</a>
        <a class="btn btn-info" href="/update?id=<?= $article_id ?>">Update Article</a>
    </div>
<?php endif; ?>
<a class="btn btn-info" href="javascript:history.go(-1)" style="position: absolute; top-left: 10px">Back</a>
<img height="600" src="data:image/jpeg;base64,<?php echo base64_encode($params['news_image']); ?>">
<div class="container-fluid my-4">
    <p style="font-size: 20px; font-weight: 600;"><?= $params['news_body']; ?></p>
</div>
