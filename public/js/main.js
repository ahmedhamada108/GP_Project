// scroll to up 
    let span = document.querySelector(".up");
    window.onscroll = function () {
        this.scrollY >= 500 ? span.classList.add("show") : span.classList.remove("show");
    };
    span.onclick = function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    };
// scroll to up 

//faq toggle stuff 
$('.togglefaq').click(function(e) {
e.preventDefault();
var notthis = $('.active').not(this);
notthis.toggleClass('active').next('.faqanswer').slideToggle(150);
 $(this).toggleClass('active').next().slideToggle("fast");
$(this).children('i').toggleClass('fa-solid');
});
// faq toggle


// OTP
let digitValidate = function(ele){
    console.log(ele.value);
    ele.value = ele.value.replace(/[^0-9]/g,'');
  }
  
  let tabChange = function(val, event){
    let ele = document.querySelectorAll('input');
    if(ele[val-1].value != ''){
      ele[val].focus();
    } else if(ele[val-1].value == ''){
      ele[val-2].focus();
    }
    event.preventDefault(); // prevent form submission on hitting "Enter"
  }
  
  