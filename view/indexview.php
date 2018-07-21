<?php
require('../model/config.php');
require('../model/menulink.php');
?>
<!DOCTYPE html>
<html>
<title>SCDC</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="img/png" href="../img/scdc_logo.png">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    label{ color:grey; }
</style>
<!--
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
        $(function() {
                $('#date').datepicker({ 
                        dateFormat: 'dd-mm-yy'
                });
        });
                
</script>-->
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-blue w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i> Menu</a>
    <a href="indexview.php" class="w3-bar-item w3-button w3-hover-white"><img src="../img/scdc_logo.png" alt="scdc" style="width:25px" class="w3-circle"> SCDC</a>
    <a href="?p=jobsite" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Job site</a>
    <a href="?p=warehouse" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Warehouse</a>
    <a href="?p=category" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Category</a>
    <a href="?p=unit" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Unit</a>
    <a href="?p=material" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Material info</a>
    <a href="?p=shop" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Shop & Supplier</a>
    <div class="w3-right w3-hide-small">
      <a href="#" class="w3-bar-item w3-button w3-wide w3-hide-small w3-hide-medium"><img src="../img/go.jpg" class="w3-circle" style="height:24px;width:24px" alt="Avatar"> Yutthapich Admin</a>  
    </div>
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-light-gray w3-sidebar w3-bar-block w3-collapse w3-large" style="z-index:3;width:270px;margin-top:43px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h5 class="w3-bar-item"><b>Jobsite</b>
  <select class="w3-select" name="option">
    <option value="" disabled selected>Choose Jobsite</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
  </h5>
  <a href="#" class="w3-bar-item w3-button w3-wide w3-large w3-padding-16 w3-hide-large"><img src="../img/go.jpg" class="w3-circle" style="height:30px;width:30px" alt="Avatar"> Profile</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="indexview.php"><span class="w3-tag w3-round-jumbo w3-blue w3-center w3-text-white" ><i class="fa fa-home w3-large"></i></span> Home</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="?p=boq"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">BQ</span></span> Bill of Quantities</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="?p=pr"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">PR</span></span> Purchase Requisition<span class="w3-tag w3-red w3-right w3-small" style="transform:rotate(-8deg)">3</span></a></a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="?p=inventory"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">InS</span></span> Inventory System <span class="w3-tag w3-teal w3-right w3-small" style="transform:rotate(-10deg)">3</span></a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="?p=po"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">PO</span></span> Purchase Order <span class="w3-tag w3-deep-purple w3-right w3-small" style="transform:rotate(-10deg)">3</span></a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="#"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">SuI</span></span> Supplier Invoice</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="?p=accounting"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">AC</span></span> Accounting</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="?p=financial"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">FC</span></span> Financial</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="#"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><span style="font-size:15px;">RE</span></span> Report</a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top" href="#"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><i class="fa fa-user-plus"></i></span> Member <span class="w3-text-gray">(Admin)</span></a>
  <a class="w3-bar-item w3-button w3-hover-blue w3-hide-large w3-hide-medium w3-border-top" href="#" onclick="myFunction('setting')"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><i class="fa fa-cog fa-spin"></i></span> Menu Setting</a>
  <div id="setting" class="w3-hide w3-hide-large w3-hide-medium w3-dark-gray w3-medium w3-padding-large">
      <a class="w3-button w3-block w3-left-align w3-dark-gray" href="?p=jobsite"> Job site</a>
      <a class="w3-button w3-block w3-left-align w3-dark-gray" href="?p=warehouse">Storehouse</a>
      <a class="w3-button w3-block w3-left-align w3-dark-gray" href="?p=category">Category</a>
      <a class="w3-button w3-block w3-left-align w3-dark-gray" href="?p=unit">Unit</a>
      <a class="w3-button w3-block w3-left-align w3-dark-gray" href="?p=material">Material info</a>
      <a class="w3-button w3-block w3-left-align w3-dark-gray" href="?p=shop">Shop & Supplier</a>
  </div>
  <a class="w3-bar-item w3-button w3-hover-blue w3-border-top w3-border-bottom" href="../control/logout.php"><span class="w3-tag w3-round-jumbo w3-blue w3-center" ><i class="fa fa-share-square-o"></i></span> Logout</a><br><br>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- Page Content -->
<br><br>
<div class="w3-main" style="margin-left:270px">
    <div class="w3-container">
        <?php
        $page = new menulink();
        if($page->menupage(@$_GET['p'])){
            require($page->menupage($_GET['p']));
        }else{
            require("main.php");
        }
        ?>
    </div>
</div>
<?php
if(@$_GET['notification']== 'in'){
    echo '<div class="w3-panel w3-green w3-margin w3-round w3-opacity-min w3-display-bottomright w3-card-4 w3-hover-opacity-off w3-animate-zoom" id="message">
            <h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i> info </h3>
            <h6>System has been saved.</h6>
          </div> ';
}else if(@$_GET['notification']== 'up'){
    echo '<div class="w3-panel w3-teal w3-margin w3-round w3-opacity-min w3-display-bottomright w3-card-4 w3-hover-opacity-off w3-animate-zoom" id="message">
            <h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i> info </h3>
            <h6>System has been updated.</h6>
          </div> ';
} else if(@$_GET['notification']== 'de'){
     echo '<div class="w3-panel w3-red w3-margin w3-round w3-opacity-min w3-display-bottomright w3-card-4 w3-hover-opacity-off w3-animate-zoom" id="message">
            <h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i> info </h3>
            <h6>System has been deleted.</h6>
          </div> ';   
}
?>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
setTimeout(function() {
  $('#message').fadeOut('slow');
}, 4000);
</script>

</body>
</html>
