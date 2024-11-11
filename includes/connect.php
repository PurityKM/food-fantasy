<?php


$conn = mysqli_connect('localhost:3306', 'root', '', 'food-fantasy');

// if($conn){
//     echo'connected successfully';
// }else{
//     echo'not connected';
// }

function addCategory($conn)
{
  if(isset($_POST['addCategory'])){
    $category_name = $_POST['category_name'];
    $stmt = "INSERT INTO category (category_name) VALUES('$category_name')";

        $res = mysqli_query($conn, $stmt);

        if($res){
            header("Location: ".ARL."/");
            echo"<script>alert('New Category has been inserted successfully.')</script>";
            exit();
        }
  }
}

function getCategory($conn)
{
  $stmt = "SELECT * FROM category ORDER BY category_name ASC";

    $result = mysqli_query($conn, $stmt);

    $category = [];

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){

            $category[] = [
                'category_id'      => $row['category_id'],
                'category_name'   => $row['category_name'],
            ];
        }

        return $category;     

    }
}

function addRecipe($conn)
{
  if(isset($_POST['addRecipe'])){
        
    $category_id = $_POST['category_name'];
    $recipe_name = htmlentities($_POST['recipe_name']);
    $recipe_description = htmlentities($_POST['recipe_description']);
    $ingredients = htmlentities($_POST['ingredients']);

    $photo_name = $_FILES['recipe_image']['name'];
    $photo_temp = $_FILES['recipe_image']['tmp_name'];
    $ren_photo = uniqid().$photo_name;
    $dir = '../photos/'.$ren_photo;
    move_uploaded_file($photo_temp, $dir);

    $video_url = htmlentities($_POST['video_url']);

    $stmt = "INSERT INTO recipe(category_id, recipe_name, recipe_description, ingredients, recipe_image, video_url) 
    VALUES('$category_id', '$recipe_name', '$recipe_description', '$ingredients', '$ren_photo', '$video_url')";

    $state =  mysqli_query($conn, $stmt);

  if($state){
    "<script>Recipe was added successfully</script>";
    // header("Location: ".ARL."/index.php");
    exit();
  }
}
}

function getRecipe($conn)
{
  $stmt = "SELECT * FROM recipe  ORDER BY category_id ASC";

    $res = mysqli_query($conn, $stmt);

    if(mysqli_num_rows($res)>0){

        $recipes = [];

        while($row = mysqli_fetch_assoc($res)){

            $recipes[] = [

                'recipe_id'  => $row['recipe_id'],
                'category_id'  => $row['category_id'],
                'recipe_name'  => $row['recipe_name'],
                'recipe_description'  => $row['recipe_description'],
                'ingredients'  => $row['ingredients'],
                'recipe_image'  => $row['recipe_image'],
                'video_url'  => $row['video_url'],
            ];

        }

       return $recipes;

    }
    // Return an empty array if there are no recipes
    return [];

}
 
function totalIngredients($conn, $recipe_id) {
  // Prepare the SQL query
  $sql = "SELECT ingredients FROM recipe WHERE recipe_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $recipe_id);
  $stmt->execute();
  $result = $stmt->get_result();

  // Initialize ingredient count
  $ingredientCount = 0;

  if ($result->num_rows > 0) {
      // Fetch the ingredients
      $row = $result->fetch_assoc();
      $ingredients = $row['ingredients'];

      // Split ingredients by commas and count them
      $ingredientsArray = explode(',', $ingredients);
      $ingredientsArray = array_map('trim', $ingredientsArray); // Trim extra spaces
      $ingredientCount = count($ingredientsArray);
  }

  // Close the statement
  $stmt->close();

  // Return the total count of ingredients
  return $ingredientCount;
}


function userRegister($conn)
{
    if(isset($_POST['user_register'])){

    $user_name          = $_POST['user_name'];
    $user_email         = $_POST['user_email'];
    $user_role          = $_POST['user_role'];
    $user_password      = $_POST['user_password'];
    $hash_password      = password_hash($user_password, PASSWORD_DEFAULT);
    $confirm_password   = $_POST['confirm_password'];
    $user_image         = $_FILES['user_image']['name']; 
    $tmp_user_image     = $_FILES['user_image']['tmp_name']; 

    if(emptyInputSignup($user_name, $user_email, $user_role, $hash_password, $confirm_password, $user_image) !== false){
        header("Location: ./register.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($user_name) !== false){
        header("Location: ./register.php?error=invalidusername");
        exit();
   }
   if(invalidEmail($user_email) !== false){
    header("Location: ./register.php?error=invalidemail");
    exit();
  }
  if(empty($user_role)){
    header("Location: ./register.php?error=emptyrole");
    exit();
  }
//    if(invalidRole($user_role) == false){
//     header("Location: ./register.php?error=invalidrole");
//     exit();
//   }
  if(passwordMatch($user_password, $confirm_password) !== false){
    header("Location: ./register.php?error=passwordmismatch");
    exit();
  }

    //select query
    $select = "SELECT * FROM usersdetails WHERE user_name= '$user_name' OR
    user_email = '$user_email'";
    $result = mysqli_query($conn, $select);

    $row_count = mysqli_num_rows($result);
    if($row_count > 0){
        echo "<script>alert('Username and email already exist')</script>";
    } else if($user_password != $confirm_password){
        echo "<script>alert('Password do not match')</script>";
    }else{

    move_uploaded_file($tmp_user_image, "./user_images/$user_image");
    //insert query
    $stmt = "INSERT INTO usersdetails (user_name, user_email, user_role, user_password, user_image)
    VALUES ('$user_name','$user_email', '$user_role', '$hash_password','$user_image')";

    $res = mysqli_query($conn, $stmt);

    // if it executes
    if($res){
        echo"<script>alert('Data inserted successfully')</script>";
        header("Location: ./login.php?error=none");
        exit();
    }

    }

}
}

?>