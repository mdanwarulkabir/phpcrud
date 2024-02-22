<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width initial-scale=1" >
    <meta name="author" content="Md Anwarul Kabir">
    <meta name="description" content="This is the assignment one where we will have to insert and view data according to the instruction">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <title>PHP</title>
  </head>
  <body>
    <header>
      <nav class="mainnav">
        <div class="logo">
          <a href="index.php">
            <img src="img/logo.png" alt="header">
          </a>
        </div>
        <div class="menu">
          <a href="index.php">Home</a>
          <?php
            if(isset($_SESSION['email'])){
              echo "<a href='adduser.php'>Add User</a>";
              echo "<a href='viewuser.php'>View User</a>";
              echo "<a href='add.php'>Garment Entry</a>";
            }
          ?>
          <a href="view.php">Garment List</a>
          <?php
          if(isset($_SESSION['email'])){
            echo "<a href='signout.php'>Sign out</a>";
          }
          ?>
          <?php
          if(isset($_SESSION['email'])){
            echo "<a href='viewcurrentuser.php' style='display:inline;'>Signed in as ", $_SESSION['email'],"</a>";
          }
          else{
            echo '<a href="signup.php">Sign up</a>';
            echo '<a href="signin.php">Sign in</a>';
          }
          ?>
        </div>
      </nav>
    </header>