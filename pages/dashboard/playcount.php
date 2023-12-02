<?php
// Assuming $d->getall is used to fetch data
$trending_music = $d->getall("playlist", "play_count > ?", [5], fetch: "moredetails");

if (!empty($trending_music)) {
    foreach ($trending_music as $row) {
        ?>
        <div class="trending-item">
            <h4><a href="#"><?= $row['music_title']; ?></a></h4>
            <span><?= $row['artist_name']; ?></span>
            <!-- Other details you want to display -->
        </div>
        <?php
    }
} else {
    echo "No trending music found.";
}
?>