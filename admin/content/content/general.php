<?php // require "content/content/logo.php"; ?>
<style>
    .richText a {
        color: gray !important;
    }
</style>
<form id="foo" class="card">
    <div class="row">
        <div class="col-md-6 p-3">
            <h5>Basic & Contact Information</h5>
            <hr>
            <?php
            $c->createform([
                "website name" => "text",
                "slogan" => "text",
                "phone number" => "number",
                "email" => "email",
                "address" => "address",
            ], "input", "", content);
            ?>
            <div class="form-group">
                <label for="anout">About</label><br>
                <span>Tell your visitors about <a href="https://<?= website_name ?>.com"><?= website_name ?></a></span>
                <textarea name="about" class="customtextarea" style="height: 300px"><?= content['about'] ?></textarea>
            </div>
        </div>

        <div class="col-md-5 p-3">
            <h5>SEO Meta</h5>
            <small>Meta tags tell search engines important information about your web page, such as how they should display it in search results. They also tell web browsers how to display it to visitors. <a target="_BLANK" href="https://ahrefs.com/blog/seo-meta-tags/">Learn More</a></small>
            <hr>
            <?php
            $c->createform([
                "meta title" => "text",
                "meta key words" => "text",
            ], "input", "", content);

            $c->createform(["meta description" => "meta description"], "textarea", "", content);
            ?>
            <h5>Social Media</h5>
            <hr>
            <?php
            $c->createform([
                "instagram" => "text",
                "facebook" => "text",
                "twitter" => "text",
                "youtube" => "text",
                "whatsapp" => "text",
                "tiktok" => "text",

            ], "input", "", content);
            ?>
            <input type="hidden" name="edit_content">
        </div>
        <!-- <button class="btn btn-success" type="button">Save Changes</button> -->
    </div>
    <div id="custommessage"></div>
    <input type="submit" value="Save Changes" class="btn btn-success">
</form>
<script>
    $(document).ready(function() {
        $('.customtextarea').richText();
    });
</script>