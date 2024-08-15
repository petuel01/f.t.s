<?php
session_start();
// Check if the user is logged in and has a role set in the session
if(!isset($_SESSION['ROLE'])) {
    header("Location: \fts\php\login.php");
    exit();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add stock</title>
    <link rel="stylesheet" href="\fts\css\main.css">
    <link rel="stylesheet" href="\fts\source\fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.css">
    <script src="\fts\js\jquery-3.7.1.min.js"></script>
    <script src="\fts\chart.umd.js"></script>
</head>
<body>
    <nav class="horizontal">
        <header><i class="fas fa-shopping-cart"></i>HOSPITAL-DASHBOARD</header>
            <i class="fas fa-user" id="usser"  onclick="displayLog()"></i>
    
        <div class="user-box">
            <p>username<span></p>
            <p>role</span></p>
                <button type="submit" class="logout-btn">Log Out</button>
                <button onclick="cancelLog()" class="cancel">X</button>
        </div>
            <script>
                function displayLog(){
                    document.querySelector('.user-box').style.display = 'block';
                }  
                function cancelLog(){
                    document.querySelector('.user-box').style.display = 'none';
                } 
            </script>
        </nav>
    <div class="sidebar">
    <ul class="list">
        <?php if($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'ceo') {
            echo'
            <li class="item "><a href="\fts\php\admin\main-dashboard.php" class="itemLink "><i class="fas fa-tachometer-alt" id="icon"></i>MAIN DASHBOARD</a></li>'; } ?>
            <li class="item "><a href="\fts\php\hospital\hospital-dashboard.php" class="itemLink "><i class="fas fa-hospital" id="icon"></i>DASHBOARD</a></li>
            <li class="item"><a href="#" class="itemLink"  onclick="hovver()"><i class="fas fa-dollar-sign" id="icon"></i><i class="fa fa-money" aria-hidden="true"></i>SALES</a>
                <ul class="sublist">
                    <li class="item"><a href="add-sales.php" class="sublink"><i class="fa fa-plus-circle" id="icon"></i>Add New</a></li>
                    <li class="item"><a href="viewsales.php" class="sublink"><i class="fas fa-eye" id="icon"></i>View Sales</a></li>
                </ul>
                <script>
                    function hovver(){
                    document.querySelector('.sublist').style.display ='block';
                    }
                </script>
            </li> 
            <li class="item"><a href="#" class="itemLink" onclick="hovver2()"><i class="fas fa-product" id="icon"></i>STOCK IN      <i class="fas fa-angle-right" id="angles"></i></a>
                <ul class="sublist2">
                    <li class="item"><a href="addstock.php" class="hov sublink"><i class="fas fa-users" id="icon"></i>Add New</a></li>
                    <li class="item"><a href="viewstock.php" class="sublink"><i class="fas fa-users" id="icon"></i>View Stock</a></li>
                </ul>
                <script>
                    function hovver2(){
                    document.querySelector('.sublist2').style.display ='block';
                    }
                </script> 
            </li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>LOW STOCK</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>PHARMACY</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>EXPIRED STOCK</a></li>
            <li class="item"><a href="#" class="itemLink"><i class="fas fa-users" id="icon"></i>ACCOUNT</a></li>
            <li class="item"><a href="\fts\php\logout.php" class="itemLink"><i class="fas fa-sign-out-alt" id="icon"></i>LOg Out</a></li>

        </ul>
    </div> 
    <section>
    <h4 class="haed">Manage Products</h4>
    <button class="add"><a href="viewstock.php" style="color: white;">view store</a></button>
    <div class="main-products">
        <form class="man" action="addItem.php" method="post">
            <h1>Add New Item</h1>
            <label for="name">Name of Good:</label>
            <input type="text" id="Itemname" name="name" placeholder="Enter Item Name" required>
            <label for="name">Good price:</label>
            <input type="number" id="Quantity" name="price" placeholder="Enter Item Quantity" required>
            <label for="name">Good Quantity:</label>
            <input type="number" id="Quantity" name="quantity" placeholder="Enter Item Quantity" required>
            <label for="name">Date of Delivery:</label>
            <input type="date" id="dateBought" name="date" required>
            <label for="name">Expired Date of Good:</label>
            <input type="date" id="ExpiredDate" name="exdate" required>
            <label for="time">Arrival Time of Goods:</label>
            <input type="time" name="time" id="time" required>
            <button type="submit" name="submit">Save</button>
            <div id="danger">item added successfully   <span onclick="hideDanger();">X</span></div>
        <script>
            function showDanger() {
                document.getElementById('danger').style.display = 'block';
            }

            function hideDanger() {
                document.getElementById('danger').style.display = 'none';
            }
           
        </script>
        </form>
    </div>
    </section>
</body>
</html>