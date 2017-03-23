<!doctype html>
<html>
  <head>
    <title>HTML form</title>
    <style type="text/css">
      html {
        font-family: sans-serif;
      }
      fieldset {
        max-width: 640px;
        margin: 1em auto;
      }
      label {
        display: block;
      }
      .row {
        margin: 1em 0;
      }
    </style>
  </head>
  <body>
    <form action="receive.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Test form</legend>

        <div class="row">
          <label for="text1">Text 1</label>
          <input type="text" name="text1" value="<?php echo @htmlentities(date('r')); ?>" />
        </div>

        <div class="row">
          <label for="file1">File 1</label>
          <input type="file" name="file1" />
        </div>

        <div class="row">
          <label for="file2">File 2</label>
          <input type="file" name="file2" />
        </div>

        <div class="row">
          <input type="submit" name="submit" value="Send!" />
        </div>

      </fieldset>
    </form>
  </body>
</html>
