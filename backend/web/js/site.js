$(function () {
   $('#carFile').change(ev =>{
       $(ev.target).closest('form').trigger('submit');

   })
});

// Add active class to the current button (highlight it)
// let header = document.getElementById("chris");
// let btns = header.getElementsByClassName("van");
// for (let i = 0; i < btns.length; i++) {
//     btns[i].addEventListener("click", function() {
//         let current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         this.className += " active";
//     });
// }

if ($(".car-index")[0]){

    $(".vehicles-nav").addClass("active");
    $(".dashboard-nav").removeClass("active");

}
else if ($(".rent-index")[0]){
    $(".rent-nav").addClass("active");
    $(".dashboard-nav").removeClass("active");
}
else if ($(".user-index")[0]){
    $(".user-nav").addClass("active");
    $(".dashboard-nav").removeClass("active");
}
else if ($(".create-car")[0]){
    $(".post-nav").addClass("active");
    $(".dashboard-nav").removeClass("active");
}
else if ($(".update-profile")[0]){
    $(".update-nav").addClass("active");
    $(".dashboard-nav").removeClass("active");
}