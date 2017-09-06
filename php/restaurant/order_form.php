
<form class="" action="<?=$form->encode($_SERVER['PHP_SELF']) ?>" method="post">
  <table>
    <?php if($errors){ ?>
      <tr>
        <td>
          다음 항목을 수정해주세요.:
        </td>
        <td>
          <ul>
            <?php foreach ($errors as $error) { ?>
              <li><?=$form->encode($error)?></li>
            <?php } ?>
          </ul>
        </td>
      </tr>
    <?php } ?>
        <tr>
          <td>
            이름:
          </td>
          <td>
            <?=$form->input('text',['name'=>'name'])?>
          </td>
        </tr>
        <tr>
          <td>
            크기:
          </td>
          <td>
            <?=$form->input('radio',['name'=>'size','value'=>'small'])?>small<br/>
            <?=$form->input('radio',['name'=>'size','value'=>'medium'])?>medium<br/>
            <?=$form->input('radio',['name'=>'size','value'=>'large'])?>large<br/>
          </td>
        </tr>
        <tr>
          <td>
            디저트를 선택하세요.:
          </td>
          <td>
            <?=$form->select($GLOBALS['sweets'],['name'=>'sweet']) ?>
          </td>
        </tr>
        <tr>
          <td>
            주 메뉴를 두가지 선택해주세요.:
          </td>
          <td>
            <?=$form->select($GLOBALS['main_dishes'],['name'=>'main_dish','multiple'=>true]) ?>
          </td>
        </tr>
        <tr>
          <td>
            배달 주문인가요?
          </td>
          <td>
            <?=$form->input('checkbox',['name'=>'delivery','value'=>'yes']) ?>네
          </td>
        </tr>
        <tr>
          <td>
            메모가 있으면 남겨주세요 <br/>
            배달 주문일 경우 주소를 남겨주세요.:<br/>
          </td>
          <td>
            <?=$form->textarea(['name'=>'comments'])?>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <?=$form->input('submit',['value'=>'주문']) ?>
          </td>
        </tr>
  </table>
</form>
