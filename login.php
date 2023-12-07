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
    <h2>Login </h2>

    <div class="card">
        <div class="card-img"></div>
        <div class="card-content">
        <form id="registrationForm">
          
                

                <label for="email">Email/ Number</label>
                <input type="text" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

               
                <pre> <button type="submit">login</button> / <a href="registration.php" alt="Registration" style="text-decoration:none;">Registration</a>
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
                url: "backend/login.php",
                method: "post",
                data: $(this).serialize(), // Serialize the form data
                success: function (response) {
                    if(response==1){
                        alert("success");
                        window.location.href = '../home.php';
                    }
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
