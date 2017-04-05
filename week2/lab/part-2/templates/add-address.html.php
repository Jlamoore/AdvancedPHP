<!-- Add address form --> 
<div class="container">
    <h1>Add Address</h1>
    <form action="#" method="post">   
       Full Name: <input name="fullName" value="<?php echo $fullName; ?>" /> <br />
       Email: <input name="email" value="<?php echo $email; ?>" /> <br />
       Address: <input name="address" value="<?php echo $address; ?>" /> <br />
       City: <input name="city" value="<?php echo $city; ?>" /> <br />
       State: <select name="state">
            <?php foreach ($states as $key => $value): ?> 
              <option value="<?php echo $key; ?>" <?php if ( $state == $key ): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
          </select><br />
       Zip: <input name="zip" value="<?php echo $zip; ?>" /> <br />
       Birthday: <input type="date" name="bday" value="<?php echo $bday; ?>" /> <br />
       <input type="submit" value="submit" class="btn btn-primary" />
    </form>
</div>