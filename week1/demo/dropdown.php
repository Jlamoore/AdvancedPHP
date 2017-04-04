<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php 
    
      $states = GetStates();
            
            $selectedState = filter_input(INPUT_POST, 'states');
          ?>
        
        <form action="#" method="post">
          <select name="states">
            <?php foreach ($states as $key => $value): ?> 
              <option value="<?php echo $key; ?>" <?php if ( $selectedState == $key ): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
          </select>
            
            <input type="submit" value="submit" />
          </form>
    </body>
</html>
