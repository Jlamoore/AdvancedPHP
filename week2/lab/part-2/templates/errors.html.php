<?php if ( isset($errors) && is_array($errors) ) : ?>
<ul>
    <!-- If there are errors on the form, display them-->
    <?php foreach ($errors as $error): ?>
        <li class="bg-danger"><?php echo $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>