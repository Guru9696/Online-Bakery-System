<?php
include 'includes/connect.php';
include 'includes/wallet.php';

	if($_SESSION['customer_sid']==session_id())
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Order Food</title>

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
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet"
        media="screen,projection">

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
    </style>
</head>

<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <?php include("header.php") ?>

    <div id="main">
        <div class="wrapper">
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
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
                    <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i
                                class="mdi-editor-border-color"></i> Order Food</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                                        class="mdi-editor-insert-invitation"></i> Orders</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="orders.php">All Orders</a>
                                        </li>
                                        <?php
                                          $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
                                          while($row = mysqli_fetch_array($sql)){
                                                            echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                                            </li>';
                                          }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!--  
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="tickets.php">All Tickets</a>
                                </li>
								<?php
                /*
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets WHERE poster_id = $user_id AND not deleted;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
                  */
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>	
                -->
                    <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i
                                class="mdi-social-person"></i> Edit Details</a>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out"
                    class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i
                        class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- START CONTENT -->
            <section id="content">
                <!--breadcrumbs start-->
                <div id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="breadcrumbs-title">Order</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs end-->


                <!--start container-->
                <div class="container">
                    <p class="caption">Order your food here.</p>
                    <div class="divider"></div>
                    <form class="formValidate" id="formValidate" method="post" action="place-order.php"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col s12 m4 l3">
                                <h4 class="header">Order Food</h4>
                            </div>
                            <div>
                                <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                                    <!-- <table>     -->
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Item Price/Piece</th>
                                            <th>Stock</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                          $result = mysqli_query($con, "SELECT * FROM items where deleted = 0;");
                                          while($row = mysqli_fetch_array($result))
                                          {
                                            // TABLE ROW WITH NAME,IMAGE,PRICE,STOCK,QUANTITY
                                            echo '<tr><td>'.$row["name"].'</td><td><img src="'.$row["photo"].'" alt="'.$row["photo"].'" width="100px"></td><td>'.$row["price"].'</td><td>'.$row["stock"].'</td>';    

                                            echo '<td><div class="input-field col s12"><label for='.$row["id"].' >Quantity</label></div>';
                                            echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="number" data-error=".errorTxt'.$row["id"].'" onblur="validateOrder('.$row["id"].','.$row["stock"].')" class="input_class" required><div class="errorTxt'.$row["id"].'"></div></td></tr>';

                                            // echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_price">Price</label></div>';
                                            // echo '<input value="'.$row["price"].'" id="'.$row["id"].'_price" name="'.$row['id'].'_price" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
                                          }
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="input-field col s12">
                                <i class="mdi-editor-mode-edit prefix"></i>
                                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                                <label for="description" class="">Any note(optional)</label>
                            </div>
                            <div>
                                <div class="input-field col s12">
                                    <button id="orderBtn" class="btn cyan waves-effect waves-light right" type="submit" name="action"
                                        onclick="checkOrder()" disabled>Order
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                    </form>
                    <div class="divider"></div>

                </div>
        </div>
        <!--end container-->
        </section>
        <!-- END CONTENT -->
    </div>
    <!-- END MAIN -->

    <!-- FOOTER -->
    <?php include("footer.php") ?>


    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <script type="text/javascript">
    function validateOrder(itemID, itemStock) {
        console.log("Validating....");
        console.log(itemID);
        console.log(itemStock);
        let orderValueInput = document.getElementById("" + itemID);
        let canPlaceOrder = false;
        let orderButton = document.getElementById("orderBtn");


        console.log(orderValueInput);


        let orderValue = parseInt(document.getElementById("" + itemID).value);
        console.log(orderValue);

        if (orderValue > itemStock) {
            alert("Only " + itemStock + " items are left...!!");
            orderValueInput.value = itemStock;
            canPlaceOrder = true;
            orderButton.disabled = false;
        } else if (orderValue <= 0) {
            console.log("Please, select items to order");
            // canPlaceOrder = false;
            // orderButton.disabled = true;
        } else if (!(Number.isInteger(orderValue))) {
            // console.log("Not a number")
            alert("Please, enter a valid quantity number...!!");
            orderValueInput.value = 0;
            // canPlaceOrder = false;
            // orderButton.disabled = true;
        } else {
            console.log("Success");
            canPlaceOrder = true;
            orderButton.disabled = false;
        }

        // console.log(orderValue);

        // let orderValueInputGroup = document.getElementsByClassName("input_class");
        // let orderButton = document.getElementById("orderBtn");
        // // console.log(orderButton);

        // let canPlaceOrder = false;
        // console.log("TOTAL INPUT TAGS : ", orderValueInputGroup.length);

        // for (const orderValue in orderValueInputGroup) {
        //     if (orderValueInputGroup.hasOwnProperty.call(orderValueInputGroup, orderValue)) {
        //         const element = orderValueInputGroup[orderValue];
        //         console.log(element.value);

        //         if (!(element.value == '') || !(element.value == 0)) {
        //             canPlaceOrder = true;
        //             orderButton.disabled = false;
        //             continue;

        //         } else {
        //             canPlaceOrder = false;
        //             orderButton.disabled = true;
        //         }
        //     }
        // }

        if(canPlaceOrder) {
            console.log("Order can be placed...!!!");            
        } else {
            console.log("Please select at least one product to place order...!!!");
        }
    }

    // function checkOrder() {
    //     let orderValueInputGroup = document.getElementsByClassName("input_class");
    //     let orderButton = document.getElementById("orderBtn");
    //     console.log(orderButton);

    //     // orderButton.disabled = true;
    //     let canPlaceOrder = false;
    //     console.log("TOTAL INPUT TAGS : ", orderValueInputGroup.length);

    //     for (const orderValue in orderValueInputGroup) {
    //         if (orderValueInputGroup.hasOwnProperty.call(orderValueInputGroup, orderValue)) {
    //             const element = orderValueInputGroup[orderValue];
    //             console.log(element.value);

    //             if (!(element.value == '') || !(element.value == 0)) {
    //                 canPlaceOrder = true;
    //             } else {
    //                 canPlaceOrder = false;
    //             }
    //         }
    //     }

    //     if(canPlaceOrder) {
    //         alert("Order can be placed...!!!");            
    //     } else {
    //         alert("Please select at least one product to place order...!!!");
    //     }
    // }
    </script>

    <!-- <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            <?php
                // $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
                // while($row = mysqli_fetch_array($result))
                // {
                //     echo $row["id"].':{min: 0,max: $row},';
                // }
                // echo '},';
            ?>},
        messages: {
            <?php
                // $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
                // while($row = mysqli_fetch_array($result))
                // {  
                //     echo $row["id"].':{
                //         required: true,
                //         min: "Minimum 0",
                //         max: "Maximum 10"
                //     },';
                // }
                // echo '},';
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
    </script> -->
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>