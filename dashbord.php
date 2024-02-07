<?php
  include 'includes/connect.php';

  if($_SESSION['admin_sid']==session_id())
  {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Food Menu</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" href="mystyles.css">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet"
        media="screen,projection">
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<!-- 
    <style type="text/css">
    .input-field div.error {
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color: #FF4081;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }

    .input-field label.active {
        width: 100%;
    }

    .left-alert input[type=text]+label:after,
    .left-alert input[type=password]+label:after,
    .left-alert input[type=email]+label:after,
    .left-alert input[type=url]+label:after,
    .left-alert input[type=time]+label:after,
    .left-alert input[type=date]+label:after,
    .left-alert input[type=datetime-local]+label:after,
    .left-alert input[type=tel]+label:after,
    .left-alert input[type=number]+label:after,
    .left-alert input[type=search]+label:after,
    .left-alert textarea.materialize-textarea+label:after {
        left: 0px;
    }

    .right-alert input[type=text]+label:after,
    .right-alert input[type=password]+label:after,
    .right-alert input[type=email]+label:after,
    .right-alert input[type=url]+label:after,
    .right-alert input[type=time]+label:after,
    .right-alert input[type=date]+label:after,
    .right-alert input[type=datetime-local]+label:after,
    .right-alert input[type=tel]+label:after,
    .right-alert input[type=number]+label:after,
    .right-alert input[type=search]+label:after,
    .right-alert textarea.materialize-textarea+label:after {
        right: 70px;
    }
    </style> -->
</head>

<body>
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->

    <?php include 'header.php';?>

    <div id="main">
        <div class="wrapper">
            <!-- SIDEBAR -->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s2 m2 l0">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"
                                    href="#" data-activates="profile-dropdown"><?php echo $name;?> <i
                                        class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?php echo $role;?></p>
                            </div>
                        </div>
                    </li>
                    <li class="bold active"><a href="dashbord.php" class="waves-effect waves-cyan"><i
                                class="fa fa-user-secret"></i> Dashbord</a>
                    </li>
                    <li class=""><a href="index.php" class="waves-effect waves-cyan"><i
                                class="mdi-editor-border-color"></i> Food Menu</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                                        class="mdi-editor-insert-invitation"></i> Orders</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="all-orders.php">All Orders</a>
                                        </li>
                                        <?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i
                                class="mdi-social-person"></i> Users</a>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out"
                    class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i
                        class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- SIDEBAR END -->

            <!-- START CONTENT -->
            <section id="content">

                <!--breadcrumbs start-->
                <div id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="breadcrumbs-title">Admin Dashbord</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs end-->


                <!--start container-->
                <div class="container">
                    <p class="caption">View all infomation</p>
                    <div class="divider"></div>


                    <!--  <div class="page-wrapper"> -->
         
        
<!--         
         <div class="container-fluid"> -->
         <div class="col-lg-15">
                     <div class="card card-outline-primary">
                         <div class="card-header">
                             <h4 class="m-b-0 text-white">Admin Dashboard</h4>
                         </div> 
                  <div class="row">
                
                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-cubes f-s-40 "></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from items where stock!='0'";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Available Dishes</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-hourglass-o f-s-40 "></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from items where stock='0'";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Out of Stocks </p>
                             </div>
                         </div>
                     </div>
                 </div>
                 
                  <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from items";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Dishes</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-users f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from users";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">users</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from orders";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Total Orders</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from orders where status='Delivered'";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Delivered Orders</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from orders where status='Yet to be delivered'";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Processing Orders</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-user-times f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from orders where status='Cancelled by Customer'";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Orders Cancel by customer </p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php $sql="select * from orders where status='Cancelled by Admin'";
                                             $result=mysqli_query($con,$sql); 
                                                 $rws=mysqli_num_rows($result);
                                                 
                                                 echo $rws;?></h2>
                                 <p class="m-b-0">Orders Cancel by Admin </p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="card p-30">
                         <div class="media">
                             <div class="media-left meida media-middle">
                                 <span><i class="fa fa-inr f-s-40" aria-hidden="true"></i></span>
                             </div>
                             <div class="media-body media-text-right">
                                 <h2><?php  $result = mysqli_query($con, 'SELECT SUM(total) AS value_sum FROM orders WHERE status = "Delivered"'); 
                                        $row = mysqli_fetch_assoc($result); 
                                        $sum = $row['value_sum'];
                                        echo $sum;?></h2>
                                 <p class="m-b-0">Total Earning</p>
                             </div>
                         </div>
                     </div>
                 </div>
                 


                 

                 
             </div>
          </div>
     <!-- </div>  -->
    </div> 
    <!-- </div>   -->
    <!--end container-->
 </div> 
 
    </section>
    <!-- END CONTENT -->
    </div>
    <?php include 'footer.php';?>
    </div>

    <?php// include 'footer.php';?>

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>

    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <script>
        function checkPhoto(){
            let photoInput = document.getElementById("photo");
            let productImageTag = document.getElementById("product_image");
            console.log(productImageTag);
            console.log(photoInput);

            let pathLength = photoInput.value.split('\\').length;
            let imageName = photoInput.value.split('\\')[pathLength - 1];
            console.log("VALUE : ",imageName);

            productImageTag.src = "images/"+imageName;
        }
    </script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            <?php
              $result = mysqli_query($con, "SELECT * FROM items");
              while($row = mysqli_fetch_array($result))
              {
                echo $row["id"].'_name:{
                required: true,
                minlength: 5,
                maxlength: 20 
                },';
                echo $row["id"].'_price:{
                required: true,	
                min: 0
                },';				
              }
            echo '},';
        ?>},
        messages: {
            <?php
			$result = mysqli_query($con, "SELECT * FROM items");
			while($row = mysqli_fetch_array($result))
			{  
				echo $row["id"].'_name:{
				required: "Ener item name",
				minlength: "Minimum length is 5 characters",
				maxlength: "Maximum length is 20 characters"
				},';
				echo $row["id"].'_price:{
				required: "Ener price of item",
				min: "Minimum item price is Rs. 0"
				},';				
			}
		echo '},';
  ?>},
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
    </script>
    <script type="text/javascript">
    $("#formValidate1").validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            price: {
                required: true,
                min: 0
            },
        },
        messages: {
            name: {
                required: "Enter item name",
                minlength: "Minimum length is 5 characters"
            },
            price: {
                required: "Enter item price",
                minlength: "Minimum item price is Rs.0"
            },
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
    </script>




<script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php
	} else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:index.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>