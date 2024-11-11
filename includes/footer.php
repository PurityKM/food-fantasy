<?php
require_once 'connect.php';

$meals = getCategory($conn);
$all_meals = $meals;
// var_dump($all_meals);

echo'<footer class="w-full flex flex-row justify-center>
    <div class="footer-cont">
        <h3>Every small effort helps</h3>
    </div>
    <div class="flex footer-cont flex-col">
        <h3>Meals</h3>
        <ul class="flex>';
        $query = "SELECT category_name FROM category"; // Make sure this matches your table and column names
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
            echo'<a href="">'.$row['category_name'].'</a>';
            // echo'<a href="">'.$meal['category_name'].'</a>';
            }
         } else {
             echo 'No meals found';
         }
        echo'</ul>
    </div>
    <div class="footer-cont">
        
    </div>
</footer>';

?>