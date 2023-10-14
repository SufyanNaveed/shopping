<?php include 'config.php'; ?>
<?php include 'header.php'; ?> 


<?php 
        
        $db = new Database();
        $db->select('user','*',null,'user_id = '.$_SESSION['user_id']);
        $result = $db->getResult();

        // echo '<pre>'; print_r($_POST); exit;

        if(isset($_POST["product_user"]) AND $_POST["product_user"]){
            
            $db->insert('order_products',array('product_id'=>$_POST["product_id"],'product_qty'=>$_POST["product_qty"],
            'total_amount'=>$_POST["total_amount"],
            'product_user'=>$_POST["product_user"],
            'pay_req_id'=>md5('123456'),
            'order_date'=>date('Y-m-d'))); 
            $response = $db->getResult();
            // echo '<pre>'; print_r($response);exit;
            if ($response[0] > 0) {

                $db->insert('payments',array('item_number'=>$_POST["product_id"],'payment_gross'=>$_POST["total_amount"],
                'payment_status'=>'credit',
                'txn_id'=>md5('123456'))); 
                unset($_COOKIE['cart_count']);
                unset($_COOKIE['user_cart']); 
            }
        }
?>

<div class="container-checkout">

<form action="instamojo.php" method="POST" role="form">

    <div class="row">

        <div class="col">

            <h3 class="title">billing address</h3>

            <div class="inputBox">
                <span>full name :</span>
                <input type="text" placeholder="Enter Your Name" value="<?php echo $result[0]['f_name'] ?>">
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="email" placeholder="example@example.com" value="<?php echo $result[0]['username'] ?>">
            </div>
            <div class="inputBox">
                <span>address :</span>
                <input type="text" placeholder="Address.." value="<?php echo $result[0]['address'] ?>">
            </div>
            <div class="inputBox">
                <span>city :</span>
                <input type="text" placeholder="City" value="<?php echo $result[0]['city'] ?>">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>state :</span>
                    <input type="text" placeholder="Pakistan" value="">
                </div>
                <div class="inputBox">
                    <span>zip code :</span>
                    <input type="text" placeholder="123 456" value="">
                </div>
            </div>

        </div>
        <input type="hidden" name="product_id" value="<?php echo $_POST['product_id']; ?>">
        <input type="hidden" name="product_qty" value="<?php echo $_POST['product_qty']; ?>">
        <input type="hidden" name="product_user" value="<?php echo $_SESSION['user_id']; ?>">
        <div class="col">

            <h3 class="title">payment</h3>

            <div class="inputBox">
                <span>cards accepted :</span>
                <img class="p-img" src="images/payment.png" alt="" required="required">
            </div>
            <div class="inputBox">
                <span>name on card :</span>
                <input type="text" placeholder="Card Holder name" required="required">
            </div>
            <div class="inputBox">
                <span>credit card number :</span>
                <input type="number" placeholder="1111-2222-3333-4444" required="required">
            </div>
            <div class="inputBox">
                <span>Payment :</span>
                <input type="number" name="total_amount" placeholder="Enter Amount" value="<?php echo $_POST['product_total'];?>">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>issue date:</span>
                    <input type="date" placeholder="" required="required">
                </div>
                <div class="inputBox">
                    <span>CVV :</span>
                    <input type="text" placeholder="XXXX" required="required">
                </div>
            </div>

        </div>

    </div>

    <input type="submit" value="Confirm Your Order" class="submit-btn"">
    <!-- <input type="submit" value="Confirm Your Order" class="submit-btn" onclick="showPopup()"> -->

</form>
</div> 
<div id="orderPlacedPopup" class="popup-container">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <h2>Your order has been placed!</h2>
            <p>Thank you for ordering.</p>
        </div>
    </div>   
<?php include 'footer.php'; ?>

<script>
    function showPopup() {
    document.getElementById('orderPlacedPopup').style.display = 'block';
}

// Function to close the popup
function closePopup() {
    document.getElementById('orderPlacedPopup').style.display = 'none';
}
</script>