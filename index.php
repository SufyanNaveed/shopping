<?php include 'config.php';  //include config
// set dynamic title
$db = new Database();
$db->select('options','site_title',null,null,null,null);
$result = $db->getResult();

if(!empty($result)){ 
    $title = $result[0]['site_title']; 
}else{ 
    $title = "Taaza Sabziphal";
}
// include header 
include 'header.php'; ?>
<div id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-content ">
                    <div class="banner-carousel owl-carousel owl-theme">
                    <div class="item">
                        <img src="images/food.png" alt=""/>
                    </div>
                    <div class="item">
                            <img src="images/background_1.jpg" alt=""/>
                        </div>    
                        <div class="item">
                            <img src="images/bg_1.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/bg.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/Banner.png" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <section class="popular">

<div class="heading">
    <h3>Latest Products</h3>
</div>

<div class="box-container">
                    <?php
                    $limit = 8;
                    $db = new Database();
                    $db->select('products','*',null,'product_status = 1 AND qty > 0','product_id DESC',$limit);
                    $result = $db->getResult();
                    if(count($result) > 0){
                        foreach($result as $row){ ?>
   <div class="box">
    <a href="" class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-heart"></i></a>
    <div class="image">
            <img class="pic-1" src="product-images/<?php echo $row['featured_image']; ?>">
    </div>
    <div class="content">
    <h3 class="title">
        <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><button class="quick-view"><i class="fa fa-eye"></i></button></a>
        <?php echo substr($row['product_title'],0,25),'...'; ?>
        </h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span> (5) </span>
        </div>
        <div class="price"><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></div>
        <a href="" class="add-to-cart btn" data-id="<?php echo $row['product_id']; ?>">add to cart</a>
    </div>
</div>
                        <?php    }
                    } ?>
                </div>
                <div class="col-md-12">
                    <div class="pagination-outer">
                    <?php echo $db->pagination('products',null,'product_status = 1 AND qty > 0',$limit); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </section>
    <section class="order" id="order">

<div class="heading">
    <h3>fastest home delivery</h3>
</div>

<div class="icons-container">

    <div class="icons">
        <img src="images/icon-1.png" alt="">
        <h3>7:00am to 10:30pm</h3>
    </div>

    <div class="icons">
        <img src="images/icon-2.png" alt="">
        <h3>+923213950710</h3>
    </div>

    <div class="icons">
        <img src="images/icon-3.png" alt="">
        <h3>Khairpur Mirs, Pakistan - 4004</h3>
    </div>

</div>

</section>
<section class="roadmap">
    <img src="images/roadmap.png" alt="">
</section>
<div class="w-icon">
    <a href="https://wa.me/923308599350" target="_blank"><img src="images/wapp.png" alt=""></a>
</div>
<?php include 'footer.php'; ?>