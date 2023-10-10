<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<div class="container-checkout">

<form action="">

    <div class="row">

        <div class="col">

            <h3 class="title">billing address</h3>

            <div class="inputBox">
                <span>full name :</span>
                <input type="text" placeholder="Enter Your Name">
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="email" placeholder="example@example.com">
            </div>
            <div class="inputBox">
                <span>address :</span>
                <input type="text" placeholder="Address..">
            </div>
            <div class="inputBox">
                <span>city :</span>
                <input type="text" placeholder="City">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>state :</span>
                    <input type="text" placeholder="Pakistan">
                </div>
                <div class="inputBox">
                    <span>zip code :</span>
                    <input type="text" placeholder="123 456">
                </div>
            </div>

        </div>

        <div class="col">

            <h3 class="title">payment</h3>

            <div class="inputBox">
                <span>cards accepted :</span>
                <img class="p-img" src="images/payment.png" alt="">
            </div>
            <div class="inputBox">
                <span>name on card :</span>
                <input type="text" placeholder="Card Holder name">
            </div>
            <div class="inputBox">
                <span>credit card number :</span>
                <input type="number" placeholder="1111-2222-3333-4444">
            </div>
            <div class="inputBox">
                <span>Payment :</span>
                <input type="number" placeholder="Enter Amount">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>issue date:</span>
                    <input type="date" placeholder="">
                </div>
                <div class="inputBox">
                    <span>CVV :</span>
                    <input type="text" placeholder="XXXX">
                </div>
            </div>

        </div>

    </div>

    <input type="button" value="Confirm Your Order" class="submit-btn" onclick="showPopup()">

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