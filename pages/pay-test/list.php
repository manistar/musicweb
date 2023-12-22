<?php require_once "include/auth-ini.php"; ?>
<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Register</li>
                </ul>
            </div>

       
       <form action="pay"  method="POST">

        <label>Email</label>
        <input type="email" name="email">
        <br>
        <label>Amount</label>
        <input type="number" name="amount">
        <br>
        <!-- <div class="custommessage"></div> -->
        <input type="submit" name="pay" vlaue="Send Payment">

        </form>

</div>
</div>
</section>
    