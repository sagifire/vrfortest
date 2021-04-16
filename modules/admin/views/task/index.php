<?php

use yii\helpers\Html;
use yii\helpers\Url;
/** @var \yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $tasksProvider */
?>
<div class="row">
    <div class="col-12">
        <a class="btn btn-success pull-right" href="<?= Url::to(['/admin/task/create']);?>">Create new</a>
        <h1>Tasks list</h1>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $tasksProvider,
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => [ 'style' => 'width: 1px' ],
                ],
                'name',
                [
                    'header' => 'Actions',
                    'format' => 'raw',
                    'headerOptions' => [ 'style' => 'width: 120px' ],
                    'value' => function($task) {
                        /** @var \app\models\Task $task */
                        $html = '<a class="btn btn-primary btn-xs" href="' . Url::to(['/admin/task/update', 'id' => $task->id]). '">Edit</a>';
                        $html .= ' <a class="btn btn-danger btn-xs" href="' . Url::to(['/admin/task/delete', 'id' => $task->id]). '"'
                            . 'data-method="post" data-confirm="You really wont to delete this?">Delete</a>';
                        return $html;
                    }
                ]
            ],
        ]) ?>
    </div>
</div>