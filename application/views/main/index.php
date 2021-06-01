<!-- Nav Menu -->
<hr>
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
		<a class="navbar-brand" href="#">AlifTask</a> 
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
			<span class="navbar-toggler-icon"></span> 
		</button> 
		<div class="collapse navbar-collapse" id="navbarNav"> 
			<ul class="navbar-nav"> 
				<li class="nav-item"> <a class="nav-link" href="/list">История покупатели <i class="anticon anticon-clock-circle"></i></a> </li> 
			</ul> 
		</div> 
	</nav>
</div>
<hr>
<!-- Container -->
<div class="container">
	<div class="flex_box">
		<?php foreach ($vars as $value) : ?>
			<div class="card" style="max-width: 350px; margin-left: 5px;">
		    <img class="card-img-top" src="assets/images/products/1.jpg" alt="alif task img">
		    <div class="card-body">
		        <h4 class="m-t-10"><?=$value['title']?></h4>
		        <p>Сумма: <?=$value['summa']?> TJS</p>
		        <?=$value['text']?> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
		        <div class="m-t-20">
		            <button  data-toggle="modal" data-target=".bd-example-modal-lg_<?=$value['id']?>" class="btn btn-success">Купить в рассрочку</button>
		        </div>
		        <br>
		        <i>Дата: <?=dateFormatTj($value['date'], 'Соат')?></i>
		    </div>
		</div>
		<!-- Modal -->
		<div class="modal fade bd-example-modal-lg_<?=$value['id']?>">
		    <div class="modal-dialog modal-lg">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title h4">Купить <?=$value['title']?></h5>
		                <button type="button" class="close" data-dismiss="modal">
		                    <i class="anticon anticon-close"></i>
		                </button>
		            </div>
		            <div class="modal-body">
		            	<form action="/" method="post">
		            		<label>Телефон:</label>
		            		<input type="text" name="phone" class="form-control">
		            		<br>
		            		<label> E-mail:</label>
		            		<input type="email" name="email" class="form-control">
		            		<br>
		            		<input type="text" class="none_view" name="id_product" value="<?=$value['id']?>">
		            		<button class="btn btn-danger" name="submit">Оставит заявку</button>
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
		<?php endforeach; ?>
	</div>
</div>