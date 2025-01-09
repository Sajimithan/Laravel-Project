<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health care system</title>
    <style>
        /* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
              <a class="navbar-brand" href="#"><h1>Health Care System</h1></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          </nav>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9 mx-auto">
        <!-- The sidebar -->
         <div class="sidebar">
         <a class="active" href="#home">Home</a>
         <a href="<?php echo e(url("/patients")); ?>">Patients List</a>
         <a href="<?php echo e(url("/doctors")); ?>">Docters Details</a>
         <a href="<?php echo e(url("/appointments")); ?>">Book Appointments</a>
        
    </div></div>
  <!-- Page content -->
  <div class="col-md-9 mx-auto">
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\health-domain\resources\views/layout.blade.php ENDPATH**/ ?>