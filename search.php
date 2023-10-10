<?php
include 'config.php';
if($_GET['search'] == ''){
    header("Location: " . $hostname);
}else {
    $db = new Database();
    $db->select('options','site_title',null,null,null,null);
    $result = $db->getResult();
    if(!empty($result)){ 
        $title = $result[0]['site_title']; 
    }else{ 
        $title = "Shopping Project";
    }
    include 'header.php';  ?>
    <section class="popular">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-head">Search Results</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 left-sidebar">
                    <?php
                    $db = new Database();
                    $search = $db->escapeString($_GET['search']);
                    $db->sql('SELECT sub_categories.sub_cat_id,sub_categories.sub_cat_title FROM products
                            LEFT JOIN sub_categories ON products.product_cat = sub_categories.cat_parent
                            WHERE products.product_title LIKE "%' . $search . '%"');
                    $result = $db->getResult();  ?>
                    <h3>Related Categories</h3>
                    <ul>
                        <?php if(count($result[0]) > 0){
                            foreach($result[0] as $row){ ?>
                            <li>
                                <a href="category.php?cat=<?php echo $row['sub_cat_id']; ?>"><?php echo $row['sub_cat_title']; ?></a>
                            </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
                <div class="box-container">
                    <?php
                    $limit = 8;
                    $db->select('products','*',null,"product_title LIKE '%{$search}%'",null,$limit);
                    $result3 = $db->getResult();
                    if (count($result3) > 0) {
                        foreach($result3 as $row) {
                            ?>
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
            <span> (50) </span>
        </div>
        <div class="price"><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></div>
        <a href="" class="add-to-cart btn" data-id="<?php echo $row['product_id']; ?>">add to cart</a>
    </div>
</div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="empty-result">!!! Result Not Found !!!</div>
                    <?php } ?>
                    <div class="pagination-outer">
                        <?php
                        echo $db->pagination('products',null,"product_title LIKE '%{$search}%'",$limit);
                        ?>
                    </div>
                </div>
                </div>
                    </div>
                </section>
    </div>

<?php include 'footer.php';

} ?>