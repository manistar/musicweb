<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Store</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>Store</h2>
                </div>

                <div class="row row--grid">
                    <div class="col-12">
                        <div class="main__filter">
                            <form action="#" class="main__filter-search">
                                <input type="text" placeholder="Search here...">
                                <button type="button"><i class="far fa-search"></i></button>
                            </form>
                            <div class="main__filter-wrap">
                                <select class="main__select" name="years">
                                    <option value="All genres">All Category</option>
                                    <option value="1">Headphones</option>
                                    <option value="2">Camera</option>
                                    <option value="3">Music Board</option>
                                    <option value="4">Microphone</option>
                                </select>
                            </div>
                            <div class="slider-radio">
                                <input type="radio" name="grade" id="trending" checked="checked"><label
                                    for="trending">Trending</label>
                                <input type="radio" name="grade" id="featured"><label for="featured">Featured</label>
                                <input type="radio" name="grade" id="newest"><label for="newest">Newest</label>
                                <input type="radio" name="grade" id="popular"><label for="popular">Popular</label>
                            </div>
                        </div>
                        <div class="row row--grid">
                           <!--  -->
                           <?php
                           if ($products_data->rowCount() > 0) {
                               foreach ($products_data as $row) {
                                   ?>
                                <div class="col-6 col-sm-4 col-lg-3">
                                        <div class="product">
                                            <span class="product__new">New</span>
                                            <a href="#" class="product__img">
                                                <img src="admin/upload/<?= $row['upload_image']; ?>" alt>
                                            </a>
                                            <h3 class="product__title"><a href="product.html"><?= $row['title']; ?></a></h3>
                                            <span class="product__price"><?= $row['amount']; ?></span>
                                    <form action="" id="foo">
                                        <?php
                                        $add_cart['input_data']['productID']  = $row['ID'];
                                        $add_cart['input_data']['no_product'] = $s->get_no_of_product_in_cart($userID, $row['ID']);
                                        echo $c->create_form($add_cart);
                                        ?>
                                        <input type="hidden" name="add_to_cart" value="">
                                        <input type="hidden" name="page" value="shop">
                                        <div id="custommessage"></div>
                                            <button type="submit" title="Add To Cart" value="submit">
                                                <span class="product__cart"><i class="far fa-shopping-cart"></i></span>
                                            </button>
                                    
                                        </div>
                                        </form>
                                    </div>

                                    <?php
                               }
                           } else {
                               echo "No data found";
                           }
            ?>


<!--  -->
                        </div>
                        <button class="main__load" type="button">Load more <i
                                class="fal fa-long-arrow-alt-right fa-lg ml-2"></i> </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>