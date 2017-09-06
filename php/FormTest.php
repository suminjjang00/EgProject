<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="test">
      <form class="" action="<?=$form ->encode($_SERVER['PHP_SELF']) ?>" method="POST">
      <div class="">
        input name
        <?=$form->input('text',['name'=>'name','placeholder'=>'input your name']) ?></br>
        input text message
        <?=$form->input('text',['name'=>'message', 'value'=>'message', 'placeholder'=>'input your message'])?></br>
        <?=$form->input('button',['name'=>'button','value'=>'Click me']) ?></br>

        newInput text
        <?=$form->newInput('text',['name'=>'TEXTINPUT','placeholder'=>'inputTEXT'])?></br>

        box check first
        <?=$form->newInput('checkbox',['checked'=>true])?></br>

        box check seconds
         <input type="checkbox" name="checkbox" checked></br>

        input radio button
        Man<input type="radio" name="gender" value="man" checked>
        Girl<input type="radio" name="gender" value="girl">
        who are you?<input type="radio" name="gender" value="other"></br>

        newInput radio button
        Man
        <?=$form->newInput('radio',['name'=>'gneder','value'=>'man'])?>
        Girl
        <?=$form->newInput('radio',['checked'=>true,'name'=>'gneder','value'=>'girl'])?>
        Who are you?
        <?=$form->newInput('radio',['name'=>'gneder','value'=>'other'])?>
      </div>
      <div class="">
        <input type="button" name="name" value="Hi">
        <input type="text" name="text" placeholder="input your message">
        <select class="test" name="language">
          <option value="korea">korea</option>
          <option value="english">english</option>
          <option value="spanish">spanish</option>
        </select>
      </div>
      <div class="">
        <input type="hidden" name="hidden" value="<?= $testVal ?>">
      </div>
      <div class="">
        <input type="submit" value="submit">
      </div>
    </form>
    </div>
  </body>
</html>
