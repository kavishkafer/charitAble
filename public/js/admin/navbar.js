//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

// var header = document.getElementById("navigation");
// var btns = header.getElementsByClassName("nav");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace(" active", "");
//   this.className += " active";
//   });
// }

// const dropdownBtns = document.querySelectorAll(".dropdown-btn");

// // Add click event listener to all dropdown buttons
// dropdownBtns.forEach(btn => {
//   btn.addEventListener("click", () => {
//     // Toggle the active class on the parent element of the dropdown button
//     btn.parentElement.classList.toggle("active");
    
//     // Toggle the dropdown-container class on the next sibling of the dropdown button
//     const dropdownContent = btn.nextElementSibling;
//     dropdownContent.classList.toggle("dropdown-container-active");
//   });
// });

// // Close the dropdown menu if the user clicks outside of it
// window.addEventListener("click", (e) => {
//   if (!e.target.matches(".dropdown-btn") && !e.target.matches(".dropdown-container a")) {
//     const dropdowns = document.querySelectorAll(".dropdown-container");
//     dropdowns.forEach((dropdown) => {
//       if (dropdown.classList.contains("dropdown-container-active")) {
//         dropdown.classList.remove("dropdown-container-active");
//         dropdown.previousElementSibling.parentElement.classList.remove("active");
//       }
//     });
//   }
// });
