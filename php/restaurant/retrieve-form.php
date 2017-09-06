<form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <table>
    <?php if($errors){?>
      <tr>
        <td>
          다음 항목을 수정해주세요:
          <?php foreach ($errors as $error) { ?>
            <ul>
              <li><?=$error?></li>
            </ul>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
    <tr>
      <td>
        메뉴 이름:
      </td>
      <td>
        <?=$form->input('text',['name'=>'dish_name']) ?>
      </td>
    </tr>
    <tr>
      <td>
        최소 가격:
      </td>
      <td>
        <?=$form->input('text',['name'=>'min_price']) ?>
      </td>
    </tr>
    <tr>
      <td>
        최대 가격:
      </td>
      <td>
        <?=$form->input('text',['name'=>'max_price'])?>
      </td>
    </tr>
    <tr>
      <td>
        맵기 정도
      </td>
      <td>
        <?=$form->select($GLOBALS['spicy_choice'],['name'=>'dish_spicy']) ?>
      </td>
    </tr>
    <tr>
      <td>
        <?=$form->input('submit',['name'=>'search','value'=>'search'])?>
      </td>
    </tr>
  </table>
</form>
