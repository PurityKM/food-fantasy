function openModal() {
    const modal = document.getElementById("recipeModal");
    modal.classList.remove("modal-hidden");
    modal.classList.add("modal-visible");
  }
  
  function closeModal() {
    const modal = document.getElementById("recipeModal");
    modal.classList.remove("modal-visible");
    modal.classList.add("modal-hidden");
  }
  