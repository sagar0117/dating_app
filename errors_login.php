<?php if (count($error_login) > 0) : ?>
    <div class="error">
        <?php foreach ($error_login as $error1) : ?>
            <p><?php echo $error1 ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>


