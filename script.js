bulmaCarousel.attach("#slider", {
  slidesToScroll: 1,
  slidesToShow: 3,
  infinite: true
});

var $loginMsg = $('.loginMsg'),
$login = $('.login'),
$signupMsg = $('.signupMsg'),
$signup = $('.signup'),
$frontbox = $('.frontbox');

$('#switch1').on('click', function() {
$loginMsg.toggleClass("visibility");
$frontbox.addClass("moving");
$signupMsg.toggleClass("visibility");

$signup.toggleClass('hide');
$login.toggleClass('hide');
})

$('#switch2').on('click', function() {
$loginMsg.toggleClass("visibility");
$frontbox.removeClass("moving");
$signupMsg.toggleClass("visibility");

$signup.toggleClass('hide');
$login.toggleClass('hide');
})

setTimeout(function(){
$('#switch1').click()
},1000)

setTimeout(function(){
$('#switch2').click()
},3000)






FB.getLoginStatus(function(response) {
  statusChangeCallback(response);
});

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}