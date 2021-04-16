<?php
use yii\helpers\Url;
/** @var \yii\web\View $this */
/** @var \app\models\ObjectModel $objectModel */
?>
<div class="row">
    <div class="col-12">
        <a class="btn btn-info pull-right" href="<?= Url::to(['/admin/object/index']);?>">Return to list</a>
        <h1>Create new object</h1>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6">
        <?php require('_form.php') ?>
    </div>
</div>
