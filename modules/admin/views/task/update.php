<?php
use yii\helpers\Url;
/** @var \yii\web\View $this */
/** @var \app\models\Task $task */
?>
<div class="row">
    <div class="col-12">
        <a class="btn btn-info pull-right" href="<?= Url::to(['/admin/task/index']);?>">Return to list</a>
        <h1>Update task</h1>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6">
        <?php require('_form.php') ?>
    </div>
</div>
