<?php
if (isset($_POST['id']) && $_POST['id'] != "") {
    $id = htmlspecialchars($_POST['id']);
    $sub = $d->fastgetwhere("subscriptions", "planID = ?", $id, "moredetails");
    $plan = $d->fastgetwhere("plans", "ID = ?", $id, "details");
    if ($sub != "") { ?>
        <table id="simpletable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date:</th>
                    <th>Status</th>
                    <th>Ref</th>
                    <th>User Name</th>
                    <th>Plan Name</th>
                    <th>Type</th>
                    <th>State Date</th>
                    <th>End date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $c->subtable($sub);
                ?>
            </tbody>
        </table>
<?php } else {
        echo "<center> <h2></h2> <p>No Subscription found in " . $plan['name'] . "</p></center>";
    }
}
?>