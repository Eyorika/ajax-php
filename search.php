<html>

<style>
    h2{
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    p{
        margin-top: 0;
        margin-bottom: 10px;
    }
</style>
<?php
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output = '';
if(isset($_POST['query'])){
    $search = $_POST['query'];
    $search = mysqli_real_escape_string($conn, $search);
    
    $sql = "SELECT * FROM products WHERE pro_titel LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= '<div>';
            $output .= '<h2>' . $row['pro_titel'] . '</h2>';
            $output .= '<p>Description: ' . $row['description'] . '</p>';
            $output .= '<p>Price: ETB`' . $row['price'] . '</p>';
            $output .= '<p>Quantity: ' . $row['quantity'] . '</p>';
            $output .= '</div>';
        }
    } else {
        $output .= '<p>No products found.</p>';
    }
    echo $output;
}
$conn->close();


?>
</html>