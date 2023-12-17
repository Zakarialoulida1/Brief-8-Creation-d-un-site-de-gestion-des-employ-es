
const Assigntohimaproject = document.querySelectorAll('.Assigntohimaproject');
const popup = document.querySelector('.popup');
const selectedUserIdInput = document.getElementById('selectedUserId');

Assigntohimaproject.forEach(button => {
  button.addEventListener("click", (event) => {
    popup.classList.toggle("hidden");
    const userId = event.target.dataset.id;
    selectedUserIdInput.value = userId;
    console.log("User ID:", userId);
  });
});
const all = document.getElementById("all")
const myproject = document.querySelector(".myproject");
const btnproject = document.getElementById("btnproject");
const users = document.querySelector(".users")
btnproject.addEventListener("click", (event) => {
  event.preventDefault();

  myproject.classList.remove("hidden");
  users.classList.add("hidden");
})
all.addEventListener("click", (event) => {
  event.preventDefault();

  myproject.classList.remove("hidden")
  users.classList.remove("hidden");
})

