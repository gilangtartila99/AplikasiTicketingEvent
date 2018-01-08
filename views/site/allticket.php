<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluasi */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
	.ticket {
		margin-left: 1px;
		margin-right: 1px;		
	}
</style>
<div class="evaluasi-form">

	<div class="thumbnail col-lg-12" style="border: 2px solid #AF1111;">
		<table width="100%" style="color: #000; border-color: transparent;font-family: monospace;">
			<tr style="margin-bottom: 1%;border-style: solid;border-bottom-width: 2px;border-bottom-color: #AF1111;">
				<td colspan="4" align="left">
					<img src="uploads/himatif.png" width="7%"> 
					<b><font size="5"><u> HIMATIF POLTEKPOS</u></font></b>
				</td>
				<td align="right" width="32%">
					<b><font size="6" style="color: #AF1111;">| </font><font size="6">BOARDING PASS</font></b>
				</td>
			</tr>
			<tr>
				<td align="center" width="32%" rowspan="4">
					<br>
					<?= \PHPQRCode\QRcode::png($model->id, "uploads/qrcode/".$model->id.".png", 'L', 4, 2); ?>
					<img src="uploads/qrcode/<?= $model->id ?>.png" width="125px">
					<br>
					<b>TKT <?= $model->id ?></b>
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="4">
				  	<p>
					  	<font size="2"><i>Nama</i></font>
					  	<br>
					  	<b><font size="3"><?= $model->nama ?></font></b>
					</p>
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="2">
				  	<p>
					  	<font size="2"><i>Acara</i></font>
					  	<br>
					  	<b><font size="3"><?= $model->nama_acara ?></font></b>
					</p>
				</td>
				<td align="left" valign="top" colspan="2">
				  	<p>
					  	<font size="2"><i>Tempat</i></font>
					  	<br>
					  	<b><font size="3"><?= $model->tempat_acara ?></font></b>
					</p>
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="2">
				  	<p>
					  	<font size="2"><i>Tanggal</i></font>
					  	<br>
					  	<b><font size="3"><?= Yii::$app->formatter->asDate($model->waktu_acara,'d MMMM Y') ?></font></b>
					</p>
				</td>
				<td align="left" valign="top" colspan="2">
				  	<p>
					  	<font size="2"><i>Waktu</i></font>
					  	<br>
					  	<b><font size="3"><?= Yii::$app->formatter->asDate($model->waktu_acara,'H:i') ?> WIB</font></b>
					</p>
				</td>
			</tr>
			<tr style="border-style: solid;border-top-width: 2px;border-top-color: #AF1111;">
				<td align="center" valign="top" colspan="5" style="padding-top: 2%;">
					<p>
						<font size="2"><i>Pastikan anda menyerahkan tiket ini kepada panitia ketika masuk maupun keluar lokasi acara.</i></font>
					</p>
				</td>
			</tr>
		</table>
	</div>

</div>
