<?php
include 'config.php';

$db = new Database();
$cat = $db->escapeString($_GET['cat']);

$db->select('sub_categories','sub_cat_title',null,"sub_cat_id = '{$cat}'",null,null);
$result = $db->getResult();
if(!empty($result)){ 
    $title = $result[0]['sub_cat_title'].' : Buy '.$result[0]['sub_cat_title'].' at Best Price'; 

}else{ 
    $title = "Result Not Found";
}
$page_head = $result[0]['sub_cat_title'];

?>
<?php include 'header.php'; ?>
<section class="popular">
                    <h2 class="section-head"><?php echo $page_head; ?></h2>
                    

            <?php if(!empty($result)){ ?>
            <div class="row">
                <div class="col-md-3 left-sidebar">
                    <h3>Related Products</h3>
                    <?php
                    $db->select('sub_categories','cat_parent',null,"sub_cat_id = '{$cat}'",null,null);
                    $cat_name = $db->getResult();

                    $db->select('brands','*',null,"brand_cat = '{$cat_name[0]["cat_parent"]}'",null,null);
                    $result2 = $db->getResult();
                    if(count($result2) > 0){ ?>
                        <ul>
                            <?php foreach($result2 as $row2){ ?>
                                <li><a href="brands.php?brand=<?php echo $row2['brand_id']; ?>"><?php echo $row2['brand_title']; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="box-container">
                    <?php
                    $limit = 8;
                    $db->select('products','*',null,"product_sub_cat = '{$cat}' AND product_status = 1 AND qty > 0",null,null);
                    $result3 = $db->getResult();
                    if(count($result3) > 0){
                        foreach($result3 as $row){ ?>
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
                    }else{ ?>
                        <div class="empty-result">Result Empty</div>
                <?php } ?>
                <div class="col-md-12 pagination-outer">
                        <?php
                            echo $db->pagination('products',null,"product_sub_cat = '{$cat}' AND product_status = 1 AND qty > 0",$limit);
                        ?>
                    </div>
               
            <?php } ?>
    </div>
                    </div>
                </section>

<?php include 'footer.php'; ?>