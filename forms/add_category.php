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
    <link rel="stylesheet" href="<?php echo ARL; ?>../public/css/tailwind.css"> 
    <link rel="stylesheet" href="<?php echo ARL; ?>/style.css">
</head>
<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg  max-w-md">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Add New Category</h2>
        <?php
        echo '<form action="'.addCategory($conn).'" method="POST" class="space-y-4">
           
            <div>
                <label for="category_name" class="block text-gray-700 font-medium">Category Name</label>
                <input type="text" id="category_name" name="category_name" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="Enter category name">
            </div>

            <input type="submit" name="addCategory" value="Add Category"
                    class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </input>
        </form>';?>
    </div>
</div>
</html>
