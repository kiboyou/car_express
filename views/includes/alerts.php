<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif (!empty($success)) : ?>
    <div class="alert alert-success text-center">
        <ul>
            <?php foreach ($success as $success) : ?>
                <li style="list-style: none;"><?= $success; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>