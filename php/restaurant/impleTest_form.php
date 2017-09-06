<form class="" action="<?=$form->encode($_SERVER['PHP_SELF'])?>" method="post">
  <table>
    <?php if($errors){ ?>
      <tr>
        <td>
          다음 항목 수정 ?
        </td>
      </tr>
      <tr>
        <td>
          <?php foreach ($errors as $error) { ?>
            <?=$form->encode($error)?>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
    <tr>
      <td>
        인풋 타입 셀렉트 테스트
      </td>
    </tr>
    <tr>
      <td>
        <?=$form->input('selected',$GLOBALS['sweets'],['name'=>'sweet'])?>
      </td>
    </tr>
    <tr>
      <td>
        체크 박스 테스트
      </td>
    </tr>
    <tr>
      <td>
        <?=$form->input('checkbox',['name'=>'delivery','checked'=>true])?>
      </td>
    </tr>
  </table>
</form>
