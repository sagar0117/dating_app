<?php if (count($error_register) > 0) : ?>
    <div class="error">
        <?php foreach ($error_register as $error2) : ?>
            <p><?php echo $error2 ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
