<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      	<th scope="col">
      		<a class="page-link" href="<?='/list/'.$pagenum.'?orderBy=username&orderType='.($orderType == 'asc' ? 'desc' : 'asc')?>">Имя пользователя</a>
  		</th>
      	<th scope="col">
      		<a class="page-link" href="<?='/list/'.$pagenum.'?orderBy=email&orderType='.($orderType == 'asc' ? 'desc' : 'asc')?>">Email</a>
  		</th>
      	<th scope="col">
      		Описание
  		</th>
      	<th scope="col">
      		<a class="page-link" href="<?='/list/'.$pagenum.'?orderBy=status&orderType='.($orderType == 'asc' ? 'desc' : 'asc')?>">Статус</a>
  		</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($items as $item):?>
    <tr>
      <th scope="row"><?=$item['id']?></th>
      <td><?=$item['username']?></td>
      <td><?=$item['email']?></td>
      <td><?=$item['description']?></td>
      <td><?=$item['status']?></td>
    </tr>
	<?php endforeach?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
  	<?php for($i=1; $i<=$total; $i++):?>
    	<li class="page-item <?= ($i==$pagenum ? 'active' : '') ?>"><a class="page-link" href="<?='/list/'.$i.'?orderBy='.$orderBy.'&orderType='.$orderType?>"><?=$i?></a></li>
	<?php endfor?>
  </ul>
</nav>
<hr>
<div class="row">
	<div class="col-6">
		<?php if(isset($alerts['success'])):?>
			<div class="alert alert-success" role="alert">
			  <?=$alerts['success']?>
			</div>
		<?php endif;?>
		<form method="post" action="/todo">
		  <div class="form-group">
		    <label for="username">User name</label>
		    <input type="text" class="form-control <?=isset($form_errors['username']) ? 'is-invalid' : '' ?>" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username" value=<?=$form_data['username']?>>
		    <?php if(isset($form_errors['username'])):?>
			    <div class="invalid-feedback">
			    	<?php foreach($form_errors['username'] as $error):?>
			    		<?=$error?><br>
	        	<?php endforeach?>
		      </div>
	    	<?php endif ?>
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" class="form-control <?=isset($form_errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Enter email" value=<?=$form_data['email']?> >
		    <?php if(isset($form_errors['email'])):?>
			    <div class="invalid-feedback">
			    	<?php foreach($form_errors['email'] as $error):?>
			    		<?=$error?><br>
	        	<?php endforeach?>
		      </div>
	    	<?php endif ?>
		  </div>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control <?=isset($form_errors['description']) ? 'is-invalid' : '' ?>" id="description" name="description"><?=$form_data['description']?></textarea>
		    <?php if(isset($form_errors['description'])):?>
			    <div class="invalid-feedback">
			    	<?php foreach($form_errors['description'] as $error):?>
			    		<?=$error?><br>
	        	<?php endforeach?>
		      </div>
	    	<?php endif ?>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>