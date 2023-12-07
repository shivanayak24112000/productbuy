<?php 
include 'config.php';
session_start(); 
$id=$_SESSION['idd'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
     $number = $_POST["number"];
     $ids = $_POST["id"];
     $dataproduct=$conn->query(" select * from  `productdata` where `id`='$ids'")->fetch_assoc();
     $amout= $dataproduct['totalamount'];
     $totalamount=$amout* $number;
    $userupdate=$conn->query("INSERT INTO `userprodutcard`( `productid`, `amount`, `card`,`userid`) VALUES ('$ids','$totalamount','$number','$id')");
    if ($userupdate) {
      // Redirect to a new URL after a successful update
      header("Location: home.php");
      exit(); // Make sure to exit to stop further execution
  }
   
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
<title>Document</title>
</head>
<style>
     footer {
    background-color:orange;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
} 
.card {
    height:300px;
    width: 250px;
    margin-top: 10px;
    margin-left: 10px;
    float: left;
}

</style>
<body>
    <?php include 'navbar.php'; ?>
    
    <?php
    $user=$conn->query("SELECT * FROM `userprodutcard` WHERE userid like '$id'")->fetch_assoc();
    $product=$user['productid'];
$result = $conn->query("SELECT * FROM productdata where ID like '$product' ");

while ($imgdata = $result->fetch_assoc()) {
    echo '<div class="card">
            <div class="card-body text-center">
                <input type="hidden"  class="product-id" value="'. $imgdata['id'] .' ">
                <img src="../admin/backend/image/' . $imgdata['image'] . '" alt="alternative_text" style="width: 100%; height:70%;margin-top: -15px;" class="mx-auto img-clickable" data-toggle="modal" data-target="#myModal">
                <span style="color:Black" > '.$imgdata['productName'].'</span></br>
                <span style="color: Red; text-decoration: line-through;"> amount: '. $imgdata['amount'].'</span>
                <span style="color:black"> Discount:'.$imgdata['discount'].'</span>
                <span style="color:black"> charge:'.$imgdata['charge'].'</span>
                <span style="color:green"> Total Amount:'.$imgdata['totalamount'].'</span>
                <input type="hidden" class="product-amount" value="'. $imgdata['totalamount'] .' ">

                </div>
          </div>';
}
?>

<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
        <p id="product-id" ></p> <!-- Display the product ID in the modal -->
        <p id="product-amount" ></p> <!-- Display the product ID in the modal -->
        <div>
         
<button type="submit" class="btn" id="buyButton">BUY</button>
<form action="" method="post" id="buyForm">

    <input type="hidden" name="id" id="id" style="height:30px; width: 40px;">
    <input type="number" name="number" id="dataField" style="height:30px; width: 40px;" value="1">
    <button type="submit" class="btns" id="buyButtons">ADDCARD</button>
</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional buttons or actions can go here -->
      </div>
    </div>
  </div>
</div>
  
<!-- Address -->
<div id="myModals" class="modal" style=" display: none;
              
            position: fixed;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 300px;
            width:500px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-sizing: border-box;">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div>

    </div>
  </div>
</div>
 
    <footer>
    <div>
        <span>do not copywrite@2018</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<!-- Your custom script -->
<script>
  // Handle the click event on the image
  $('.img-clickable').click(function(){
    // Get the product ID and amount from the hidden input fields
    var productId = $(this).closest('.card').find('.product-id').val(); 
    var productAmount = $(this).closest('.card').find('.product-amount').val(); 
    
    // Display the product ID and amount in the modal
    $('#product-id').text('Product ID: ' + productId);
    $('#product-amount').text('Total Amount: ' + productAmount).css('color', 'blue');

    // Set the value of the hidden input field with the ID "id" to productId
    $('#id').val(productId);
    $('#dataField').val(productAmount);

    // Show the modal
    $('#myModal').modal('show');
  });
</script>
<script>
  // Handle the form submission
  $('#buyForm').submit(function(event) {
    // Get the product ID from the modal
    var productId = $('#product-id').text().replace('Product ID: ', '');

    // Set the value of the hidden input field with the ID "id" to productId
    $('#id').val(productId);
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the button element by its ID
    var buyButton = document.getElementById("buyButton");

    // Attach a click event listener to the button
    buyButton.addEventListener("click", function() {
        // Show the modal
        showModal();
    });

    // Function to show the modal
    function showModal() {
        var modal = document.getElementById("myModals");
        modal.style.display = "inline";

        // Close the modal when the close button (×) is clicked
        var closeBtn = modal.querySelector(".close");
        closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
        });

        // Close the modal if the user clicks outside of it
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
});
</script>


<!-- <script>
$(document).ready(function() {
    $("#buyButtons").on("click", function() {
        // Get the data you want to send (assuming you have a form with an input field with ID "dataField")
        var inputData = $("#dataField").val();

        // Make an AJAX request to send data to the backend
        $.ajax({
            type: "POST",  // Use "POST" or "GET" depending on your backend configuration
            url: "home.php",  // Replace with your actual backend endpoint
            data: { inputData: inputData },  // Replace with the data you want to send
            success: function(response) {
                // Handle the successful response from the backend
                console.log("Data sent successfully:", response);
            },
            error: function(error) {
                // Handle any errors that occur during the AJAX request
                console.error("Error sending data:", error);
            }
        });
    });
});
</script> -->


</body>

</html>