<?php

use yii\bootstrap\ActiveForm;

/** @var \yii\web\View $this */
/** @var \app\models\Task $task */
?>

<?php $form = ActiveForm::begin([ 'id' => 'task-form']); ?>
    <?= $form->field($task, 'name') ?>
    <hr/>
    <?= $form->field($task, 'tasks')->textarea() ?>

    <button type="submit" class="btn btn-success">Save</button>
<?php ActiveForm::end() ?>