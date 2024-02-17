// const hamburger = document.querySelector("#toggle-btn");

// hamburger.addEventListener("click", function (){
//     document.querySelector("#sidebar").classList.toggle("expand");
// });

let sidebar = document.querySelector('#sidebar');

sidebar.addEventListener('mouseover', function() {
    sidebar.classList.add('expand');
});

sidebar.addEventListener('mouseout', function() {
    sidebar.classList.remove('expand');
});

