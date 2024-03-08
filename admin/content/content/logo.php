<form class="card p-3" action="<?php echo basename($_SERVER['PHP_SELF']) ?>?a=general" method="POST" enctype="multipart/form-data">
    <h4>New Logo?</h4>
    <small>Make sure logo upload is visible on both dark and light background</small>
    <hr>
    <label for="logo">Upload <?= website_name ?> Logo</label>
    <input type="file" name="logo" id="logo">
    <hr>
    <label for="logo_icon">Upload <?= website_name ?> Logo Icon</label>
    <input type="file" name="logo_icon" id="uplaod_logo">
    <br>
    <?php
        if(isset($_POST['upload_logo'])){
            $content->logoupload();
        }
    ?>
    <button name="upload_logo" class="btn btn-dark">Upload New Logo</button>
</form>