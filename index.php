<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ok..</title>
    <link rel="stylesheet" href="./css/main.css" media="screen" title="no title">
  </head>
  <body>
    <header>

      <div class="header main_header_div">
        <div class="header main_inside_div">

          <div class="header table_div">

            <div class="header table_row_1">
              <div class="header table_row_table">

                <div class="header table_table_cell_1">
                  <div class="header table_contents_wrap_1">
                    <span>it is contents?</span>
                  </div>
                </div>
                <div class="header table_table_cell_2">
                  <div class="header table_contents_wrap_2">
                    <span>seconds contents</span>
                  </div>
                </div>
                <div class="header table_table_cell_3">
                  <div class="header table_contents_wrap_3">
                    <input type="button" name="login" value="Login">
                  </div>
                </div>

              </div>
            </div>

            <div class="header table_row_2">
              <div class="header table_row_table_2">

                <div class="header table_table_cell_header">
                  <div class="header header_image_wrap">
                    <img src="./img/cap.png"/ id="img_logo">
                  </div>
                </div>
                <div class="header table_table_cell_subject">
                  <div class="header header_subject_wrap">
                    <span id="subject">It is a Egg!!</span>
                  </div>
                </div>
                <div class="header table_table_cell_describ">
                  <div class="header header_discrib_wrap">
                    <span id="describ">It is a describ</span>
                  </div>
                </div>

              </div>
            </div>

          </div>

        </div>
      </div>

    </header>
    <nav>
      <div class="nav nav_wrap">
        <div class="nav nav_table_wrap">
          <div class="nav nav_table_cell_1">
            <div class="nav nav_link_wrap_1">
              <a href="#">contents</a>
            </div>
          </div>
          <div class="nav nav_table_cell2">
            <div class="nav nav_link_wrap_2">
              <a href="#">link #2</a>
            </div>
          </div>
          <div class="nav nav_table-cell3">
            <div class="nav nav_cell_wrap_1">
              <a href="#">link #3</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <article class="">
      <div class="contents">
        <form class="formClass" action="./php/test.php" method="post">
          <div class="text">
            <span>show me your ability</span>
            <input type="text" name="text" placeholder="input your text" maxlength="30">
          </div><br />
          <span>input your age</span>
          <input type="text" name="age" placeholder="input your age">
          <div class="checkbox_test">
          <input type="checkbox" name="checkbox"> <span>test check box</span>
        </div></br>
          <select class="" name="language" >
            <option value="korea">korea</option>
            <option value="english">english</option>
            <option value="spain">spain</option>
          </select>
          <button type="submit" name="submit">submit</button>
        </form>
      </div>
    </article>
  </body>
</html>
