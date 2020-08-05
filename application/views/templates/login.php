<br> <br>
<h2 class="login-header">ADMIN LOGIN PAGE</h2>
<br>
<?php if(isset($error)):?>
    <div class="error">
        <?= $error; ?>
    </div>
<?php endif; ?>    
<div class="form-container">
 <br>
 <form action="<?= base_url('login/auth') ?>" method="post">
 <?= form_error('name','<p class="form-error">','</p>'); ?>
 <?= form_input(['type'=>'text','name'=>'name','placeholder'=>"NAME..",
 'value'=>set_value('name')]); ?>
 <?= form_error('pw','<p class="form-error">','</p>'); ?>
 <?= form_input(['type'=>'password','name'=>'pw','placeholder'=>"PASSWORD..",
 'value'=>set_value('pw')]); ?>
 <?= form_submit(['value'=>'ENTER ADMIN']); ?>
 </form>
</div>