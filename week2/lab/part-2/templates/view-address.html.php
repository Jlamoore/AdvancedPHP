<div class="container">
    <div class="row">
        <h1>Address List</h1>
       <!-- If there are addresses, display them-->
        <?php if (is_array($addresses) && count($addresses) > 0): ?>

            <table class="table-striped col-lg-12 col-md-12 col-sm-12"> 
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Birthday</th>
                <?php foreach ($addresses as $row): ?>
                    <tr>
                        <td style="padding: 5px;"><?php echo $row['fullname']; ?></td>
                        <td style="padding: 5px;"><?php echo $row['email']; ?></td>
                        <td style="padding: 5px;"><?php echo $row['addressline1']; ?></td>
                        <td style="padding: 5px;"><?php echo $row['city']; ?></td>
                        <td style="padding: 5px;"><?php echo $row['state']; ?></td>
                        <td style="padding: 5px;"><?php echo $row['zip']; ?></td>
                        <td style="padding: 5px;"><?php echo date("F j, Y", strtotime($row['birthday'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
