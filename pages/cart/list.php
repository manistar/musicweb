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
                                            // $boolValue = true;
                                            // $value = $boolValue[0];
                                            $total_cat = 0;
                                            if ($product_cart->rowCount() > 0) {
                                                foreach ($product_cart as $row) {
                                                    $carting = $d->getall("products", "ID = ?", [$row['productID']]); 
                                                // 
                                                    //  // Check if the product already exists in the cart
                                                    //     $existingProduct = $d->getall("cart", "productID = ?", [$row['productID']]);
                                                    //     if ($existingProduct) {
                                                    //         // Handle the case where the product already exists in the cart
                                                    //         $d->message("This exact Cart already exists for product ID {$row['productID']}", "error");
                                                            
                                                    //         // You might want to update the existing cart entry or take other actions
                                                    //         // For example, you could break out of the loop or skip the current iteration
                                                    //         continue;
                                                    //     }
                                                // 
                                                    $total = substr($carting['amount'], 1) * $row['no_product'];
                                                    $total_cat += $total;
                                                    //  $total_cat = $total_cat + $total;
                                                     $add_cart["input_data"]['productID'] = $row['productID'];
                                                     $add_cart["input_data"]['no_product'] = $row['no_product'];
                                                    //  var_dump($row['no_product']);   
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

                                                        <form action="passer" id="foo" onsubmit="return false">
                                                        <?php unset($add_cart['no_product']) ?>
                                                        <?= $c->create_form($add_cart) ?>
                                                        <div id="custommessage"></div>    
                                                        <div class="cart__amount">
                                                            <input type="hidden" name="add_to_cart" value="">
                                                            <input type="hidden" name="page" value="shop">
                                                            
                                                                <!-- Minus -->
                                                            <button type="submit" class="sub" value="submit">
                                                                    <i class="far fa-minus"></i>
                                                                </button>
                                                                <!--  -->
                                                                
                                                                <!-- Plus --> 
                                                                <input type="text" onchange="updateTotal()" name="no_product" value="<?= $row['no_product'] ?>">
                                                                
                                                                
                                                                <button type="submit" class="add" value="submit">
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
                                <!-- <input type="hidden" name="public_key" value="FLWPUBK_TEST-9b9efaabfbb3b031e6a9fba2f9dafb60-X" /> -->
                            <?= $c->create_form($checkout);?>
                        <div class="form-group">
                            <label>Payment method</label>
                            <div class="custom-control custom-radio mb-2">
                                <!-- <input type="radio" id="pay1" checked name="payment" class="custom-control-input">
                                <label class="custom-control-label" for="pay1">Paypal</label>
                            </div>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" id="pay2" name="payment" class="custom-control-input">
                                <label class="custom-control-label" for="pay2">Stripe</label>
                            </div> -->
                            
                        </div>
                        <div class="custommessage"></div>
                        <button type="submit" class="payment__btn" name="newpayment" value="submit" id="start-payment-button" onclick="makePayment()">Checkout</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>
