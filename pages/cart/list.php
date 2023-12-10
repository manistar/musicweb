<?php require_once "include/auth-ini.php"?>
<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Cart</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Your Cart</h2>
                </div>

                <div class="row row--grid">
                    <div class="col-12 col-lg-8">

                        <div class="cart">
                            <div class="cart__table-wrap">
                                <div class="cart__table-scroll">
                                    <table class="cart__table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Title</th>
                                                <th>No of Product</th>
                                                <th>Amount</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                              
                                            <!--  -->
                                            <?php
                                            $total_cat = 0;
                                            if ($product_cart->rowCount() > 0) {
                                                foreach ($product_cart as $row) {
                                                    $carting = $d->getall("products", "ID = ?", [$row['productID']]);
                                                    // $d->getall("products", "ID = ?", [$productID], fetch: "details");
                                                    $total = substr($carting['amount'], 1) * $row['no_product'];
                                                     $total_cat = $total_cat + $total;
                                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="cart__img">
                                                        <img src="musica/assets/img/store/<?= $carting['img']; ?>" alt>
                                                            </div>
                                                        </td>
                                                        <td><a href="product.html">
                                                                <?= $carting['title']; ?>
                                                            </a></td>
                                                        <td>

                                                        <form action="passer" id="foo">
                                                        <div class="custommessage"></div>
                                                            <div class="cart__amount">
                                                                <button type="submit" class="sub">
                                                                    <i class="far fa-minus"></i>
                                                                </button>
                                                                <input type="text" value="<?= $row['no_product'] ?>">
                                                                <button type="submit" class="add">
                                                                    <i class="far fa-plus"></i>
                                                                </button>
                                                        </form>
                                                            </div>
                                                        </td>
                                                        <td><span class="cart__price">$
                                                                <?= number_format(substr($carting['amount'], 1)); ?>
                                                            </span></td>
                                                            <td><span class="cart__price">
                                                            $ <?= number_format($total); ?>
                                                            </span></td>
                                                        <td>
                                                            <button class="cart__delete" type="button">
                                                            <a href="?p=cart&pID=<?= $carting['ID'];?>&products"><i class="far fa-times"></i></a></button></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "No data found";
                                            } ?>
                                            <!--  -->
                                            <!-- <tr>
                                                <td>
                                                    <div class="cart__img">
                                                        <img src="assets/img/store/item3.jpg" alt>
                                                    </div>
                                                </td>
                                                <td><a href="product.html">Real Headphones</a></td>
                                                <td>
                                                    <div class="cart__amount">
                                                        <button type="button" class="sub">
                                                            <i class="far fa-minus"></i>
                                                        </button>
                                                        <input type="text" value="1">
                                                        <button type="button" class="add">
                                                            <i class="far fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td><span class="cart__price">$300</span></td>
                                                <td><button class="cart__delete" type="button"><i
                                                            class="far fa-times"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="cart__img">
                                                        <img src="assets/img/store/item4.jpg" alt>
                                                    </div>
                                                </td>
                                                <td><a href="product.html">Canon Camera</a></td>
                                                <td>
                                                    <div class="cart__amount">
                                                        <button type="button" class="sub">
                                                            <i class="far fa-minus"></i>
                                                        </button>
                                                        <input type="text" value="1">
                                                        <button type="button" class="add">
                                                            <i class="far fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td><span class="cart__price">$700</span></td>
                                                <td><button class="cart__delete" type="button"><i
                                                            class="far fa-times"></i></button></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="cart__info">
                                <div class="cart__total">
                                    <p>Total:</p>
                                    <span>$<?= number_format($total_cat); ?></span>
                                </div>

                                <form action="#" class="cart__promo">
                                    <input type="text" class="promo__input" placeholder="Promo code">
                                    <button type="button" class="promo__btn">Apply</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="checkout">
                            <h4 class="checkout__title">Checkout</h4>
                            <form action="passer" id="foo">
                            <?= $c->create_form($checkout);?>
                            <!-- <div class=" form-group">
                            <input type="text" name="name" class="form-control" placeholder="Customer Name">
                            </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Customer Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Customer Phone">
                        </div> -->
                        <div class="form-group">
                            <label>Payment method</label>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" id="pay1" checked name="payment" class="custom-control-input">
                                <label class="custom-control-label" for="pay1">Paypal</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="pay2" name="payment" class="custom-control-input">
                                <label class="custom-control-label" for="pay2">Stripe</label>
                            </div>
                        </div>
                        <div class="custommessage"></div>
                        <button type="submit" class="payment__btn" value="submit">Checkout</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>