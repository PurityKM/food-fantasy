<?php
 require_once('includes/html_a.php');
require_once('includes/navbar.php');
?>


<?php

$recipes =  getRecipe($conn);
// var_dump($recipes);

if (!empty($recipes) && count($recipes) > 0) {
  // Process and display recipes
  $all_recipes = $recipes;
} else {
  echo "No recipes found.";
}

$recipeCount = count($all_recipes);
// var_dump($all_recipes['category_id['])
?>


<div class="flex flex-col justify-center items-center mx-auto p-6">
  <h1 class="text-4xl font-bold text-center mb-6">
    Welcome to Food Fantasy!
  </h1>
  <p class="text-lg text-yellow text-center mb-8">
    Discover and create delicious recipes. Start by adding your favorite ingredients or browse through our collection!
  </p>

  <div class="w-[100%] flex flex-col justify-center items-center mb-8 gap-16 lg:flex-row">
    <!-- Popular Ingredients Section -->
    <div class="flex flex-col items-center">
      <h2 class="text-2xl font-semibold mb-4">Popular Ingredients:</h2>
      <div class="flex flex-wrap gap-4">
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-3 rounded-md shadow-md">
          Chicken
        </button>
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-3 rounded-md shadow-md">
          Pasta
        </button>
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-3 rounded-md shadow-md">
          Tomato </button>
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-3 rounded-md shadow-md">
          Cheese
        </button>
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-3 rounded-md shadow-md">
          Tomato
        </button>
        <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-3 rounded-md shadow-md">
          Garlic
        </button>
      </div>
    </div>

    <!-- Must-Have Ingredient Dropdown -->
    <div class="flex flex-col items-center w-full lg:w-auto">
      <h2 class="text-2xl font-semibold mb-4">Must-Have Ingredient:</h2>
      <select class="w-full lg:w-[90%] border border-gray-300 rounded-md py-2 px-4 text-gray-700">
        <option value="">Select a must-have ingredient...</option>
        <option value="ingredient1">Ingredient 1</option>
        <option value="ingredient2">Ingredient 2</option>
      </select>
    </div>
  </div>
  <!-- Ingredient Input Section -->
  <div class="mb-8 w-[80%]">
    <h2 class="text-2xl font-semibold mb-4">Enter more ingredients to find matching recipes:</h2>
    <input
      type="text"
      class="w-full border border-gray-300 rounded-md py-2 px-4 mb-4"
      placeholder="Enter an ingredient and press Enter..." />

    <!-- Selected Ingredients -->
    <div class="flex flex-wrap gap-2 mt-4">
      <div class="flex items-center bg-green-200 text-green-800 font-medium py-1 px-3 rounded-full shadow-sm">
        <span>Ingredient</span>
        <button class="ml-2 text-red-500 hover:text-red-700 font-bold text-sm">x</button>
      </div>
    </div>
  </div>
  <h1 class="text">Start adding ingredients to begin</h1>
  <h4 class="text mb-8">Each ingredient you add reveals more recipe</h4>
  <h3 class="text mb-8">You can make <?php echo $recipeCount ?> recipes</h3>
  <?php
  echo'<div class="recipe-cont flex flex-row gap-16">';
  if(count($all_recipes) > 0){$i=0;
    foreach($all_recipes as $recipe){$i++;
    echo '
    <div class="recipe-card flex flex-row shadow-md rounded-md">
      <img src="'.ARL.'/photos/'.$recipe['recipe_image'].'" alt="" class="img">
      <div class="flex flex-row justify-start items-start">
        <div class="flex flex-col gap-6">
          <div class="bg-white p-4">
          <a href="'.$recipe['video_url'].'" >
            <h2>'.$recipe['recipe_name'].'</h2>
            </a>
            <p class="text-gray-600 mt-2 line-clamp-2">'.$recipe['recipe_description'].'</p>';?>
<?php

            echo'<h3 class="text-xl font-semibold ">You have 4 ingredients</h3>';
            
          
          echo'</div>
        </div>
        <div class="flex justify-center items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
          </svg>
        </div>
      </div>
    </div>
  </a>';

  } 
}else {

    echo "No recipes found.";
  }
    
    ?>

  </div>
</div>
<!-- '<a href="'.$recipe['video_url'].'" class="recipe-card-container flex flex-row"></a> -->


<?php
include_once('includes/footer.php');
include_once('includes/html_z.php');
?>