<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var \yii\web\View $this */
/** @var \app\models\ObjectModel $objectModel */
/** @var array */
$parentsDataQuery = \app\models\ObjectModel::find()->select(['id', 'name']);
if ($objectModel->id) {
    $parentsDataQuery->where(['!=', 'id', $objectModel->id]);
}
$parentsData = $parentsDataQuery->asArray()->all();
$parentsData = $parentsData ? ArrayHelper::map($parentsData, 'id', 'name') : [];
?>

<?php $form = ActiveForm::begin([ 'id' => 'task-form']); ?>
    <?= $form->field($objectModel, 'name') ?>
    <?= $form->field($objectModel, 'parent_id')->widget(Select2::classname(), [
        'data' => $parentsData,
        'options' => ['placeholder' => 'Select a parent object'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <button type="submit" class="btn btn-success">Save</button>
<?php ActiveForm::end() ?>