<?php
include_once 'database.php';
include_once 'taskClass.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();
$product = new taskClass($connection);
$stmt = $product->read();
$count = $stmt->rowCount();

if($count > 0){

    $products = [];
    //$products["count"] = $count;
    $i = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $products[$i]['id']    = $id;
        $products[$i]['title'] = $title;
        $products[$i]['description'] = $description;
        $i++;
    }

    echo json_encode($products);
}

else {

    http_response_code(404);
}
?>

