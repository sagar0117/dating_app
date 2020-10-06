<?php if (count($error_profile) > 0) : ?>
    <div class="error">
        <?php foreach ($error_profile as $error3) : ?>
            <p><?php echo $error3 ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
