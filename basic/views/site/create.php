<?php use yii\helpers\Html;
 use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
<?php echo $form->field($model, 'mail')->textInput(array('class' => 'span')); ?><br>
<?php echo $form->field($model, 'pass')->textInput(array('class' => 'span')); ?><br>
<?php echo $form->field($model, 'login')->textInput(array('class' => 'span')); ?><br>
<?php echo $form->field($model, 'birthdate')->textInput(array('class' => 'span')); ?><br>
    <div class="form-actions">
        <?php echo Html::submitButton('Submit', null, null, array('class' => 'btn btn-primary')); ?>
    </div>
<?php ActiveForm::end(); ?>
