<?php
use yii\helpers\Url;
/** @var \yii\web\View $this */

?>
<h1>Dashboard</h1>
<a class="btn btn-success" href="<?= Url::to(['/admin/object/create']);?>">Create Object</a>
<a class="btn btn-success" href="<?= Url::to(['/admin/task/create']);?>">Create Task</a>
<a class="btn btn-info" href="<?= Url::to(['/admin/object/index']);?>">View all objects</a>
<a class="btn btn-info" href="<?= Url::to(['/admin/task/index']);?>">View all tasks</a>
