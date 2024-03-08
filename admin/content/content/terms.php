<?php
    $data = $d->getall("settings", "meta_name = ?", ["terms_and_conditions"], fetch: "details");
?>

    <label for="">System terms and conditions</label> <br>
    <small>Information you write here will be available to the public, also for your users to agree on at the point of registration</small>
    <div class="input-group mb-3">
        <textarea name="terms_and_conditions" id="terms_and_conditions" class="customtextarea22"  style="height: 300px"><?php echo $data['meta_value'] ?></textarea> 
        <hr> <br>
        <button class="btn btn-primary mt-4" onclick="updatestaus('terms_and_conditions', 'settings')">Save Info</button>
    </div>
    <script>
    $(document).ready(function() {
        $('.customtextarea').richText();
    });
</script>