$(document).ready(function() {
    $("#phone1").mask("+7(999)999-99-99");
  });
$(document).ready(function()
{
$(".task_subject").change(function()
{
var id_of_subject=$(this).val();
var post_id = 'id='+ id_of_subject;
$.ajax
({
type: "POST",
url: "http://localhost/assets/php/process-request.php",
data: post_id,
cache: false,
success: function(class_id)
{
$("#class").html(class_id);
} 
});
});
});

function showAnswer(){
    let task_solution = document.getElementById("solution");
    if (task_solution.style.display === "none"){
        task_solution.style.display = "block";
    }else{
        task_solution.style.display = "none";
    }
}
function checkCookies(){
    let cookieDate = localStorage.getItem('cookieDate');
    let cookieNotification = document.getElementById("cookie_notification");
    let cookieBtn = cookieNotification.querySelector('.cookie_accept');

 
    if( !cookieDate || (+cookieDate + 31536000000) < Date.now() ){
        cookieNotification.classList.add('show');
    }

    cookieBtn.addEventListener('click', function(){
        localStorage.setItem( 'cookieDate', Date.now() );
        cookieNotification.classList.remove('show');
    })
}
checkCookies();
