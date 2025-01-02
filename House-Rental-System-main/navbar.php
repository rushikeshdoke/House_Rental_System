<!DOCTYPE html>
<html lang="en">
<head>
  <title>RentHouse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-sm navbar-light justify-content-between" style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <a class="navbar-header" href="index.php">
    <img src="" alt="logo" style="height:50px;">
  </a>
  
  <!-- Links -->
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="admin-index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Students Need</a>
    </li>
    <li class="nav-item">
      <!-- <a class="nav-link" href="#">Tutors</a> -->
      <a href="#"class="nav-link">Tutors &#9662;</a>
          <ul class="dropdown-menu">
            <li><a href="login.html">Peer</a></li>
            <li><a href="login.html">Teacher</a></li>
            <li><a href="login.html">Working Professionals</a></li>
          </ul>
    </li>
    <style>
.dropdown .dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  padding: 10px;
  list-style: none;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

.dropdown-menu li {
  margin-bottom: 5px;
}

.dropdown-menu li a {
  text-decoration: none;
  color: #333;
}
.dropdown-menu {
  display: none;
}
.dropdown:hover .dropdown-menu {
  display: block;
}
/* ... existing CSS code ... */
</style>
    <script>
    function search() {
      var searchQuery = document.getElementById('searchInput').value;
      // Perform the search operation with the searchQuery value
      console.log('Search query:', searchQuery);
      // Replace the console.log statement with your actual search functionality
    }
  </script>
  <li class="nav-item">
      <a class="nav-link" href="#">What's New</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">team</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
      <?php 
if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
  echo '<li><a href="logout.php">Logout</a></li>';
}

else {?>
      <li><a href="how-to-register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="how-to-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php } ?>
    </ul>
  </div>
</nav>

</body>
</html>