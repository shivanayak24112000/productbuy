<?php 
include 'config.php';

$id=$_SESSION['idd'];

$data=$conn->query("select * from `regstrations`  where `id`='$id' ")->fetch_assoc();
 $datas=$conn->query("select COUNT(card) as total from `userprodutcard`  where `userid`='$id'")->fetch_assoc();

  

?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#">product.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <!-- Use the Bootstrap dropdown class -->
        <a class="nav-link" href="card.php">card <sup style="color:red"><?php  echo $totalproduct=$datas['total']; ?></sup><span class="sr-only">(current)</span></a>
       
      </li>
    </ul>
    
    <!-- Add the search form here -->
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

    </form>
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <!-- Use the Bootstrap dropdown class -->
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <?php echo $data['name']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#option1">card</a>
          
          <a class="dropdown-item" href="#option3">Option 3</a>
        </div>
      </li>
  
    <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
  </div>
</ul>
</nav>
