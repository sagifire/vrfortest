<?php
use yii\helpers\Url;
/** @var \yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $objectsProvider */
?>
<div class="row">
    <div class="col-12">
        <a class="btn btn-success pull-right" href="<?= Url::to(['/admin/object/create']);?>">Create new</a>
        <h1>Objects list</h1>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $objectsProvider,
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => [ 'style' => 'width: 1px' ],
                ],
                'name',
                [
                    'header' => 'Parent',
                    'value' => function($objectModel) {
                        /** @var \app\models\ObjectModel $objectModel */
                        return $objectModel->parent ? $objectModel->parent->name : '-';
                    }
                ],
                [
                    'header' => 'Actions',
                    'format' => 'raw',
                    'headerOptions' => [ 'style' => 'width: 120px' ],
                    'value' => function($objectModel) {
                        /** @var \app\models\ObjectModel $objectModel */
                        $html = '<a class="btn btn-primary btn-xs" href="' . Url::to(['/admin/object/update', 'id' => $objectModel->id]). '">Edit</a>';
                        $html .= ' <a class="btn btn-danger btn-xs" href="' . Url::to(['/admin/object/delete', 'id' => $objectModel->id]). '"'
                            . 'data-method="post" data-confirm="You really wont to delete this?">Delete</a>';
                        return $html;
                    }
                ]
            ],
        ]) ?>
    </div>
</div>