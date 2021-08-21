<form method="post" action="/login">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control <?=isset($form_errors['username']) ? 'is-invalid' : '' ?>"" id="exampleInputEmail1" name="username" placeholder="Enter username">
		    <?php if(isset($form_errors['username'])):?>
			    <div class="invalid-feedback">
			    	<?php foreach($form_errors['username'] as $error):?>
			    		<?=$error?><br>
	        	<?php endforeach?>
		      </div>
	    	<?php endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control <?=isset($form_errors['password']) ? 'is-invalid' : '' ?>"" id="exampleInputPassword1" placeholder="Password" name="password">
		    <?php if(isset($form_errors['password'])):?>
			    <div class="invalid-feedback">
			    	<?php foreach($form_errors['password'] as $error):?>
			    		<?=$error?><br>
	        	<?php endforeach?>
		      </div>
	    	<?php endif ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>