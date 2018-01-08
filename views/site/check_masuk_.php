<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluasi */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.warna {
    background-color: #343333;
    border-style: solid;
    border-width: 7px;
    border-color: #AF1111;
}
.qrcode-text {
	padding-right:1.7em; 
	margin-right:0;
}
.qrcode-text-btn {
	display:relative; 
	margin-top: 1%;
	padding: 1% 2% 1% 2%;
	background-color: #f5f5f5;
	cursor:pointer;
	color: #000;
}
.qrcode-text-btn > input[type=file] {
	position:relative;
	width:1px; 
	height:1px; 
	opacity:0
}
</style>
<div class="evaluasi-form">

    <?php $form = ActiveForm::begin(['id' => 'my-form-id',]); ?>

    <?php
	    $ticket = Html::getInputId($model, 'ticket_id');
	?>

	<div class="thumbnail warna col-lg-12" style="padding-top: 2%;">
		<h3 align="center"><b>Tiket Masuk</b></h3>
		<div class="col-lg-6">
			<?= odaialali\qrcodereader\QrReader::widget([
		        'id' => 'qrInput',
		        'successCallback' => "function(data){ 
		        	$('#my-form-id #beep').append('<audio autoplay><source src=sound/beep.mp3 type=audio/mpeg></audio>');
		        	$('#my-form-id #{$ticket}').val(data);
		        	$('#my-form-id #submit').click();
		        	$('#my-form-id #qrInput').val(data); 
		        }"
		    ]); ?>
		</div>
		<div class="col-lg-6" style="padding-top: 10%;">
			<center>
				<label>Scan QRCode atau Masukkan kode tiket</label>
				<p>
					<?= $form->field($model, 'ticket_id')->textInput(['placeholder' => 'Klik Disini!', 'required' => true, 'autofocus' => true, 'class' => 'qrcode-text form-control'])->label(false) ?>
				</p>
				<p>
					<input id="masuk-ticket_id" name="masuk-ticket_id" type=text size=16 placeholder="Silahkan Foto QR Code" class="form-control qrcode-text" style="display: none">
					<label class=qrcode-text-btn>
						<input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1> Foto QRCode Sekarang
					</label>
				</p>
				<div id="beep"></div>

				<div class="form-group" align="center">
					<?= Html::submitButton('Check Ticket', ['class' => 'btn btn-danger', 'id' => 'submit']) ?>
			    </div>
			</center>
		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript" src="js/qrcode.js"></script>
<script type="text/javascript">
function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    document.getElementById("masuk-ticket_id").value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
        document.getElementById("masuk-ticket_id").value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
  reader.readAsDataURL(document.getElementById("masuk-ticket_id").files[0]);
}
</script>