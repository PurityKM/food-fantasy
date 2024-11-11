   <?php
   require_once('html_a.php');
   ?>
   
   <nav class="w-full bg-blue-500 p-4 sticky top-0 left-0">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-white text-2xl font-bold">Food Fantasy</h1>
        <div class="space-x-4">
        <a href="#home" class="text-white hover:underline">
        Home
      </a>
      <a href="#howto" class="text-white hover:underline">
        How to
      </a>
       <a href="#" class="dropdown-toggle text-white hover:underline">Meals</a>
      <a href="#" class="text-white hover:underline" onclick="openModal()">Add Recipes</a>

      <a href="#language" class="text-white hover:underline">
        Language
      </a>
      <a href="#register" class="text-white hover:underline">
       Register
      </a>
      <a href="#login" class="text-white hover:underline">
        Login
      </a>
      <a href="<?php echo ARL; ?>/forms/add_category.php" class="text-white hover:underline">
        add cat
      </a>          
        </div>
      </div>
    </nav>
<!-- Modal Structure -->
<div id="recipeModal" class="modal-hidden fixed inset-0 bg-black bg-opacity-50 justify-center items-center">
  <div class="bg-white p-6 rounded-md shadow-md max-w-lg w-full relative">
    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
    <!-- Load the form content here -->
    <iframe src="forms/add_recipe.php" class="w-full h-96 border-0"></iframe>
  </div>
</div>
 

