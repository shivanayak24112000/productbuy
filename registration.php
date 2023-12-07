<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
        }

        .card {
            display: flex;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

       
        .card-img {
            flex: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
       
        .card-content {
            flex: 1;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
        h2{
            text-align: center;
            
        }
        body{
            background-color: orange;
        }
        .card-img{

            background-image: url("image/product_main.jpeg");
         
            background-size: cover;
        }
        .card-content{
            background-color: white;
        }
    </style>
</head>
<body>
   <div class="maincontainer">
    <h2>User Registration</h2>

    <div class="card">
        <div class="card-img"></div>
        <div class="card-content">
        <form id="registrationForm">
          
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="Address">Address:</label>
                <input type="text" id="Address" name="Address" required>
                <label for="state">state:</label>
                <input type="text" id="state" name="state" required>
                <label for="state">pincode:</label>
                <input type="text" id="pincode" name="pincode" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="Number">Number:</label>
                <input type="number" id="Number" name="Number" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

               
               <pre> <button type="submit" >Register</button>/<a href="login.php" alert="" style="text-decoration:none;">Login</a>
            </pre>
            </form>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function () {
     
        $("#registrationForm").submit(function (e) {
            e.preventDefault(); 

         
            $.ajax({
                url: "backend/registion.php",
                method: "post",
                data: $(this).serialize(), // Serialize the form data
                success: function (response) {
                    if(response==1)
                    Swal.fire({
                               title: "success insert",
                            text: "You clicked the button!",
                            icon: "success"
                               });
                               else{ 

                                Swal.fire({
                                         icon: "error",
                                                 title: "Oops...",
                                                  text: "Something went wrong!",
                                      footer: '<a href="#">Why do I have this issue?</a>'
});}
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
