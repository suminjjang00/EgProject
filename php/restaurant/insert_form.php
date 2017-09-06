<form class="" action="<?=$form->encode($_SERVER['PHP_SELF'])?>"  method="post">
  <table>
    <?php if($errors){ ?>
      <tr>
        <td>
          다음 항목을 수정:
          <ul>
            <?php foreach ($errors as $error) { ?>
              <li><?=$form->encode($error) ?></li>
            <?php } ?>
          </ul>
        </td>
      </tr>
    <?php } ?>
    <tr>
      <td>
        새로 추가할 이름을 입력하세요.
      </td>
      <td>
        <?=$form->input('text',['name'=>'dish_name'])?>
      </td>
    </tr>
    <tr>
      <td>
        가격을 입력하세요.
      </td>
      <td>
        <?=$form->input('text',['name'=>'dish_price'])?>
      </td>
    </tr>
    <tr>
      <td>
        매운 정도를 선택하세요.
      </td>
      <td>
        <?=$form->input('checkbox',['name'=>'dish_spicy','value'=>'yes'])?>
        Yes
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <?=$form->input('submit',['name'=>'save','value'=>'추가'])?>
      </td>
    </tr>
  </table>
</form>
