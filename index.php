<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fs-4 fw-bold" href="#">Garden Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active fs-4 fw-bold" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4 fw-bold" href="#">View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4 fw-bold" href="services.php">Add Services</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled fs-4 fw-bold" href="services.php" aria-disabled="true">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .nav-link, .dropdown-item {
    padding: 10px 15px; /* Add some padding for better spacing */
    font-weight: bold; /* Bold the text */
  }

  .nav-link:hover, .dropdown-item:hover {
    background-color: #5a6268; /* Add a hover effect for better user interaction */
    color: #fff; /* Change the text color on hover for better visibility */
  }

  .navbar-nav .nav-item {
    margin-right: 10px; /* Add some spacing between the items */
  }

  .navbar {
    padding: 10px 0; /* Add some padding for the navbar */
  }

  .navbar-brand {
    font-size: 1.5rem; /* Make the brand text larger */
  }
</style>
</body>


<?php
include 'banner.php';
?>

<?php
include 'about.php';
?>
<?php
include 'cta.php';
?>

<?php
include 'front_services.php';
?>

<?php
include 'review.php';
?>

<?php
include 'faq.php';
?>


<?php
include 'footer.php';
?>
</body>


</html>