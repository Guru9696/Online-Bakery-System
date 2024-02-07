<?php

    include '../includes/connect.php';

    $name = $_POST['name'];
    $price = $_POST['price'];
    $photo = $_FILES["fileToUpload"]["name"];

    echo "<br>Name : " . $name;
    echo "<br>Price : " . $price;
    echo "<br>Photo : " . $photo;


    $result = mysqli_query($con, "SELECT * FROM items WHERE name = '$name'");
    if($row = mysqli_fetch_array($result)) {
        echo "<br>FOUND";
        $new_stock = $row['stock'] + 1;
        $product_id = $row['id'];

        settype($product_id, "integer");
        $sql = "UPDATE items SET stock=$new_stock, price=$price WHERE id = $product_id;";
        if($con->query($sql)) {
            echo "<br>Stock Updated";
        } else {
            echo "<br>No Stock Updated";
        }

    } else {
        echo "<br>NOT FOUND";

        if(isset($_POST["add_action"])) {
            echo "<br>Set";

            $temp_name = $_FILES["fileToUpload"]["tmp_name"];
            echo "<br>";

            var_dump($temp_name);
            
            echo "<br>";
            
            $d = date("YmdHis");
            echo $d;
            $new_name = $d . $_FILES["fileToUpload"]["name"];
            echo "<br>";
            
            var_dump($new_name);
            echo "<br>";
            
            $result = move_uploaded_file($temp_name,"/opt/lampp/htdocs/sa/uploads/".$new_name);
            echo "<br>";

            var_dump($result);
            echo "<br>";

            $photo_location = "uploads/" . $new_name;
            $sql = "INSERT INTO items(name, price, photo) VALUES ('$name', $price, '$photo_location')";
            if($con->query($sql)) {
                echo "<br>Inserted";
            } else {
                echo "<br>Not Inserted";
            }
        } else {
            echo "<br>Not Set";
        }
    }
    header("location: ../admin-page.php");
?>