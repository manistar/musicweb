<section class="main">
    <div class="container-fluid">
        <div class="row row--grid">

            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">My Orders</li>
                </ul>
            </div>


            <div class="col-12">

                <div class="main__title main__title--page">
                    <h2>My Orders</h2>
                </div>

                <div class="row row--grid">
                    <div class="col-lg-3">
                        <div class="profile">
                            <div class="profile__user">
                                <div class="profile__avatar">
                                    <img src="upload/profile/<?=$data['upload_image'];?>" alt>
                                </div>
                                <div class="profile__meta">
                                    <h3><?=$data['first_name'].' '. $data['last_name'];?></h3>
                                    <span>User ID: <?=$data['userID'];?></span>
                                </div>
                            </div>

                            <div class="nav flex-column nav-pills">
                                <a href="?p=orders" class="nav-link active"><i class="far fa-shopping-cart"></i> My
                                    Orders</a>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="row row--grid">
                            <div class="col-12">
                                <div class="dashbox">
                                    <div class="dashbox__table-wrap">
                                        <div class="dashbox__table-scroll">
                                            <table class="main__table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Title</th>
                                                        <th>Transaction</th>
                                                        <th>Date</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="main__table-img">
                                                                <img src="musica/assets/img/store/item3.jpg" alt>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text"><a href="#">Headphones</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text"><a href="#">#123456</a></div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">Apr 1, 2021</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">10</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--price">$5000
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--green"><i
                                                                    class="far fa-check-circle"></i> Delivered</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="main__table-img">
                                                                <img src="musica/assets/img/store/item2.jpg" alt>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text"><a href="#">Headphones</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text"><a href="#">#123456</a></div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">Apr 1, 2021</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">10</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--price">$5000
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--red"><i
                                                                    class="far fa-times-circle"></i> Canceled</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="main__table-img">
                                                                <img src="musica/assets/img/store/item1.jpg" alt>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text"><a href="#">Headphones</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text"><a href="#">#123456</a></div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">Apr 1, 2021</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text">10</div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--price">$5000
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="main__table-text main__table-text--grey"><i
                                                                    class="far fa-info-circle"></i> Pending</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <nav class="d-flex justify-content-center col-12">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fal fa-long-arrow-alt-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fal fa-long-arrow-alt-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>