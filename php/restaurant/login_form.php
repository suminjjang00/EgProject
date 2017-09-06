<link rel="stylesheet" href="../../../css/CssTestFolder/main.css" media="screen" title="no title">

<h1>Login</h1></br>
  <form class="" action="<?=$form->encode($_SERVER['PHP_SELF']) ?>" method="POST">
<?php if($errors){ ?>
  <div class="">
    <h1>다음 항목을 수정하기 바람.</h1>
    <div class="">
      <?php foreach ($errors as $error ) { ?>
        <div class="">
          <?=$form->encode($error)?>
        </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>
    <?=$form->input('text',['name'=>'login','placeholder'=>'input your email'])?>
    <?=$form->input('password',['name'=>'password','placeholder'=>'input your password'])?>
    <?=$form->input('submit',['name'=>'login_submit','value'=>'Login'])?></br>
  </form>
