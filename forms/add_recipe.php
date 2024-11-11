<?php
require_once '../includes/connect.php';
  $arl = 'http://127.0.0.1/food-fantasy'; 
  define('ARL', $arl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Recipe</title>
    <link rel="stylesheet" href="<?php echo ARL; ?>public/css/tailwind.css"> 
    <link rel="stylesheet" href="<?php echo ARL; ?>/style.css">
</head>
<body class="body-form bg-gray-100 flex items-center justify-center min-h-screen">

<div class="recipe-form-container">
  <h2 class="recipe-form-header">Add a New Recipe</h2>
<?php

$categories = getCategory($conn);
$categoryCount = count($categories);


  echo'<form action="'.addRecipe($conn).'" method="POST" enctype="multipart/form-data" class="space-y-6">
  <div>
    <label for="title" class="form-label">Category Name</label>
            <select type="text" name="category_name">
                <option selected disabled>Click to select category</option>';

                if($categoryCount > 0){

                    foreach($categories as $category){
                        echo'<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
                    }
                }

            echo'</select>
    </div>
     <div>
      <label for="title" class="form-label">Recipe Name</label>
      <input type="text" id="recipe_name" name="recipe_name" class="form-input" placeholder="Enter recipe title" required>
    </div>
    <div>
      <label for="title" class="form-label">Recipe Description</label>
      <input type="text" id="recipe_description" name="recipe_description" class="form-input" placeholder="Enter recipe_description" required>
    </div>
    <div>
     <div>
      <label for="ingredients" class="form-label">Ingredients</label>
      <textarea id="ingredients" name="ingredients" class="form-textarea" placeholder="List ingredients separated by commas" required></textarea>
    </div> 
    <div>
      <label for="title" class="form-label">Upload Image or Video</label>
      <input type="file" id="recipe_image" name="recipe_image" class="form-input" placeholder="Enter recipe image" required>
    </div>
    <div>
      <label for="title" class="form-label">Recipe VIdeo URL</label>
      <input input type="url" name="video_url" id="video_url" class="form-input" placeholder="Enter recipe url" required>
      </div>
    <div class="text-center">
      <input type="submit" name="addRecipe" value="Add Recipe" class="submit-button">
      </input>
    </div>
  </form>
</div>';?>

<!-- <div>
      <label for="instructions" class="form-label">Instructions</label>
      <textarea id="instructions" name="instructions" class="form-textarea" placeholder="Write down the steps to prepare the recipe" required></textarea>
    </div> -->
</body>
</html>
