<?php

    use yii\helpers\Html;
  use yii\widgets\ActiveForm;

?>

<?php \yii\widgets\Pjax::begin() ?>

<?php if(!empty($answer)): ?>

<div class="m-overlay answer">

	<div class="m-modal m-modal--checkout" id="quick-checkout-dialog" style="display: block; top:50%;left:50%;transform: translate(-50%,-50%)">
		<div class="m-modal-wrapper" style="text-align: center">
			<p>Спасибо, за заказ.</p>
			<p> Менеджер свяжется с Вами в течение часа</p>
			<button id="answer" class="m-modal-close"></button>
		</div>
	</div>
</div>

<?php else: ?>
<div class="m-overlay" style="opacity: 0; display: none">

	<div class="m-modal m-modal--checkout" id="quick-checkout-dialog" style="opacity: 0; display: none;">
		<div class="m-modal-wrapper">

            <?php $form = ActiveForm::begin([
                'id'        => 'quick_checkout_form',
                'options'     => [
                    'data-pjax' => true,
                ],
                'fieldConfig' => [
                    'template'     => " <div class='m-input \'>{label}\n\n{input}\n{hint}\n{error}\n</div>",
                    'labelOptions' => ['class' => 'm-input-label'],
                    'inputOptions' => ['class' => 'm-input-field'],
                    'errorOptions'=>['class'=>'help-block','style'=>'color:red;']
                ],
            ]) ?>

			<button class="m-modal-close"></button>
			<div class="m-modal-heading">Заказ в один клик</div>
			<div class="m-input m-input--required ">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'phone')->input('tel',['placeholder'=>'+38 099 999-99-99']) ?>
                <?= $form->field($model, 'email')->input('email') ?>
                <?= $form->field($model, 'message')->textarea(['rows' => 5,'placeholder'=>'Напишите артикул или название товара']) ?></div>
				<div class="m-modal-footer">
                    <?= Html::submitButton('Заказать', ['class' => 'm-modal-button m-modal-button--checkout button--checkout', 'name'  => 'contact-button']) ?>
				</div>
                <?php ActiveForm::end() ?>
                <?php endif; ?>
			</div>
		</div>
	</div>

<?php \yii\widgets\Pjax::end() ?>


