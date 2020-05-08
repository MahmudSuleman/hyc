<?php
$title = "Homepage";
require_once '../private/includes/header.php';
?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <span class="fa fa-home"></span>
                <a href="#" class="top-bar__link">home</a>
            </div>
            <div class="col-sm-4">
                <i class="fa fa-user"></i>
                <span> <a href="#" class="top-bar__link">login</a></span>
                |
                <span> <a href="#" class="top-bar__link"> register</a></span>
            </div>
            <div class="col-sm-4">
                <span class="fa fa-envelope"></span>
                <a href="#" class="top-bar__link">contact us</a>
            </div>
        </div>
    </div>
</div>

<div class="menu pt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 search">
                <form method="get" class="menu__form">
                    <div class="form-group">
                        <label for="search"></label>
                        <input type="text" placeholder="search" name="search" id="search" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button name="submit" class="btn-c btn-c-outline-pink ml-2"><span class="fa fa-search"></span>Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---->
<!--<div class="section-main">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-9 col-sm-12">-->
<!--                <div class="section-main__slide-show">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-3">-->
<!--                <div class="section-main__account">-->
<!--                    <h1 class="section-main__account--welcome-text">welcome</h1>-->
<!---->
<!--                    <div class="section-main__account--buttons mt-5">-->
<!--                        <button class="btn-c btn-c-create"><i class="fa fa-user mr-2"></i>create an account</button>-->
<!--                        <p class="mt-5 mb-5">---------or-----------</p>-->
<!--                        <button class="btn-c btn-c-signin"><i class="fa fa-sign-in mr-2"></i>signin</button>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->

<div class="categories">
    <div class="container">
        <h2 class="categories__title">Shop by Category</h2>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="categories__item">
                    <p>item 1</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="categories__item">
                    <p>item 2</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="categories__item">
                    <p>item 3</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!---->
<!--<div class="category">-->
<!--    <h4 class="category__title">-->
<!--        <span class="category-desc">Best seller in scarfs</span>-->
<!--        <span><a href="#">learn more</a></span>-->
<!--    </h4>-->
<!---->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!---->
<!--            <div class="col-md-4">-->
<!--                <div class="category-item">-->
<!--                    <img src="img/consult.jpg" alt=""/>-->
<!---->
<!--                    <p class="category-item__desc">just a product on our list ready to be sold our</p>-->
<!---->
<!---->
<!--                    <div class="float-left">-->
<!--                        <a href="#" class=" btn btn-outline-info fa fa-book">see details</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="float-right">-->
<!--                        <a href="#" class=" btn btn-outline-primary fa fa-shopping-cart">add to cart</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-4">-->
<!--                <div class="category-item">-->
<!--                    <img src="img/consult.jpg" alt=""/>-->
<!---->
<!--                    <p class="category-item__desc">just a product on our list ready to be sold our</p>-->
<!---->
<!---->
<!--                    <div class="float-left">-->
<!--                        <a href="#" class=" btn btn-outline-info fa fa-book">see details</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="float-right">-->
<!--                        <a href="#" class=" btn btn-outline-primary fa fa-shopping-cart">add to cart</a>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-4">-->
<!--                <div class="category-item">-->
<!---->
<!--                    <img src="img/consult.jpg" alt=""/>-->
<!---->
<!--                    <p class="category-item__desc">just a product on our list ready to be sold our</p>-->
<!---->
<!--                    <div class="float-left">-->
<!--                        <a href="#" class=" btn btn-outline-info fa fa-book">see details</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="float-right">-->
<!--                        <a href="#" class=" btn btn-outline-primary fa fa-shopping-cart">add to cart</a>-->
<!---->
<!--                    </div>-->
<!---->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->



<?php require_once '../private/includes/footer.php' ?>

