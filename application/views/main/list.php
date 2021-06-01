<div class="container">
	<br>
	<a href="/"><i class="anticon anticon-arrow-left"></i> Назад</a>
	<hr>
	<h2><?=$title?> <i class="anticon anticon-team"></i></h2>
	<? foreach ($vars as $value) : ?>
	<div class="alert alert-success">
		<h4><i class="anticon anticon-shopping"></i> <?=ResultTov($value['id_tovar'])['title']?></h4>
    	<p><b>Телефон:</b> <?=$value['phone']?></p>
    	<p><b>E-mail:</b> <?=$value['email']?></p>
    	<p><b>Сумма:</b> <?=ResultTov($value['id_tovar'])['summa']?> TJS</p>
    	<p><b>Дата:</b> <?=dateFormatTj($value['date'], 'time')?></p>
	</div>
	<?php endforeach; ?>
</div>