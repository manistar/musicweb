<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gateway ID</th>
                <th>Amount</th>
                <th>User</th>
                <th>For</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $row) { ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['transaction_id']; ?></td>
                    <td><a href="#"><?= currency['symbol'] . number_format($row['price']) ?></a></td>
                    <td><?= $d->getusername($row['userID']) ?></td>
                    <td><?= $row['payfor'] ?></td>
                    <td><span class="badge badge-<?php if ($row['status'] == "success") {
                                                        echo "success";
                                                    } else {
                                                        echo "danger";
                                                    } ?>"><span style="display:none">status:</span><?= $row['status'] ?></span></td>
                    <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                    <td><a href="payment.php?a=invoice&id=<?= $row['ID']; ?>" target="_blank" rel="noopener noreferrer">Invoice</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>