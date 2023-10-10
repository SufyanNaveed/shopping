<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<section class="popular">

    <div class="heading">
        <span>Popular Products</span>
    </div>

<div class="box-container">
                    <?php
                    $limit = 8;
                    $db = new Database();
                    $db->select('products','*',null,'product_views > 0 AND product_status = 1 AND qty > 0','product_views DESC',$limit);
                    $result = $db->getResult();
                    if(count($result) > 0){
                        foreach($result as $row){ ?>
                            <div class="box">
    <a href="" class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-heart"></i></a>
    <div class="image">
        <a class="" href="single_product.php?pid=<?php echo $row['product_id']; ?>">
            <img class="pic-1" src="product-images/<?php echo $row['featured_image']; ?>">
         </a>
    </div>
    <div class="content">
    <h3 class="title">
        <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo substr($row['product_title'],0,25),'...'; ?></a>
        </h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span> (50) </span>
        </div>
        <div class="price"><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></div>
        <a href="" class="add-to-cart btn" data-id="<?php echo $row['product_id']; ?>">add to cart</a>
    </div>
</div>
        <?php    }
            }?>
                </div>
          
                <div class="col-md-12">
                    <div class="pagination-outer">
                    <?php echo $db->pagination('products',null,'product_views > 0 AND product_status = 1 AND qty > 0',$limit); ?>
                    </div>
                </div>
            </div>
  
      
      </section>

<?php include 'footer.php'; ?>