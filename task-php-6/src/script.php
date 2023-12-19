<?php
$servername = "mysql";
$username = "root";
$password = "root";
$database = "php";
$port = '3306';

$conn = new mysqli($servername, $username, $password, $database,$port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$tableName = "Category";
$sql_check_table = "SELECT 1 FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$tableName' LIMIT 1";
$result = $conn->query($sql_check_table);
if ($result->num_rows < 0) {
    $sql_category = "INSERT INTO Category (Name) values('Laptops')";
    $conn->query($sql_category);
    $sql_product = "INSERT INTO Product (Name,Price,categoryId) values ('Lenovo Ideapad',999,$conn->insert_id)";
    $conn->query($sql_product);
    $id_product = $conn->insert_id;
    $sql_user = "INSERT INTO Users (Name) values ('Cartmen')";
    $id_user = $conn->insert_id;
    $conn->query($sql_user);
    $sql_cart = "INSERT INTO Cart (productId,userId) values ($id_product,$id_user)";
    $conn->query($sql_cart);
    for ($i = 0; $i < 9; $i++) {
        $result = $conn->query("INSERT INTO Users (Name) values('Alex$i')");;
    }
}
else{
    //1
    $question_1 = "SELECT * FROM Users";
    $result_1 = $conn->query($question_1);
    if($result_1->num_rows > 0){
        while($row = $result_1->fetch_assoc()){
            echo "Id: " . $row['id'] . ', Name: ' . $row['Name'] . '</br>';
        }
        echo '-----------------------------' . '</br>';
    }
    $question_2 = "SELECT * FROM Cart c
         JOIN Users u on c.userId = u.id
         JOIN Product p on c.productId = p.id
         JOIN Category ct on p.categoryId = ct.id";

    $result_2 = $conn->query(($question_2));
    if($result_2->num_rows>0){
        while($row = $result_2->fetch_assoc()){
            print_r($row);
            echo '</br>';
        }
        echo '-----------------------------' . '</br>';
    }

    $question_3 = "SELECT u.Name as username, ct.Name as categoryName, p.Name as productName, p.Price as productPrice From Cart c JOIN Users u on u.id = c.userId
         JOIN Product p on p.id = c.productId
         JOIN Category ct on ct.id = p.categoryId";
    $result_3 = $conn->query($question_3);
    if($result_3->num_rows>0){
        while($row = $result_3->fetch_assoc()){
            print_r($row);
            echo '</br>';
        }
        echo '-----------------------------' . '</br>';
    }

    $question_4 = "SELECT u.Name as username, p.Name as productName, ct.Name as categoryName FROM Cart c 
         JOIN Users u on c.userId = u.id 
         JOIN Product p on p.id = c.productId 
         JOIN Category ct on ct.id = p.categoryId where u.id = 1";
    $result_4 = $conn->query($question_4);
    if($result_4->num_rows>0){
        while($row = $result_4->fetch_assoc()){
            print_r($row);
            echo '</br>';
        }
        echo '-----------------------------' . '</br>';
    }

    $question_5 = "SELECT ct.Name FROM Cart c JOIN Product p on p.id = c.productId JOIN Category ct on ct.id = p.categoryId JOIN Users u on u.id = c.userId where u.id = 1";
    $result_5 = $conn->query($question_5);
    if($result_5->num_rows>0){
        while($row = $result_5->fetch_assoc()){
            print_r($row);
            echo '</br>';
        }
        echo '-----------------------------' . '</br>';
    }

    $question_6 = "SELECT u.Name FROM Cart c JOIN Product p on p.id = c.productId JOIN Users u on u.id = c.userId where p.id = 2";
    $result_6 = $conn->query($question_6);
    if($result_6->num_rows>0){
        while($row = $result_6->fetch_assoc()){
            print_r($row);
            echo '</br>';
        }
        echo '-----------------------------' . '</br>';
    }

    $question_7 =   "SELECT u.id as user_id, u.Name as user_name, ct.id as category_id, ct.Name as category_name,  p.id as product_id,  p.Name as product_name,  p.Price as product_price FROM Users u
    CROSS JOIN Category ct
    CROSS JOIN Product p
    WHERE NOT EXISTS (SELECT 1 FROM Cart c WHERE c.userId = u.id AND c.productId = p.id)";
    $result_7 = $conn->query($question_7);
    if($result_7->num_rows>0){
        while($row = $result_7->fetch_assoc()){
            print_r($row);
            echo '</br>';
        }
        echo '-----------------------------' . '</br>';
    }
}

$conn->close();
?>
