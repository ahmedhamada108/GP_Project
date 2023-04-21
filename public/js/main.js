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


  /// file upload 
// Display image 

document.getElementById('file_input').addEventListener('change', function(e) {
  var file = e.target.files[0];
  var reader = new FileReader();
  reader.onload = function() {
    document.getElementById('image_chosen').src = reader.result;
    document.getElementById('image_chosen').style.borderRadius = "46px";
    var fileInfo = document.getElementById('fileinfo');
    fileInfo.innerHTML = file.name + " (" + formatBytes(file.size) + ")";
  }
  reader.readAsDataURL(file);
});

function formatBytes(bytes, decimals = 2) {
  if (bytes === 0) return '0 Bytes';
  const k = 1024;
  const dm = decimals < 0 ? 0 : decimals;
  const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

// Drop Down list 
    var icon = document.getElementById("user-icon");
    var list = document.getElementById("dropdown-list");

    icon.addEventListener("click", function() {
        if (list.style.display === "none") {
            list.style.display = "block";
        } else {
            list.style.display = "none";
        }
    });


    $(document).ready(function(){
      $('.dropdown').click(function(){
          $(this).children('.dropdown-menu').toggle();
      });
  });

// Toggle button edit to save in account page 
function toggle() {
  var btn = document.getElementById("btn_submit");
  var input_name = document.getElementById('name');
  var input_email = document.getElementById('email');
  var input_password = document.getElementById('password');
  var input_password_confirmation = document.getElementById('password_confirmation');
  var input_image = document.getElementById('image');
  var image_label = document.getElementById('arrow_image');

  var password_label = document.getElementById('arrow_password');
  var password_confirmation_label = document.getElementById('arrow_confirmation');
  if (btn.innerHTML === "Edit") {
    btn.innerHTML = "Save";
    input_name.disabled = false;
    input_email.disabled = false;
    input_password.style.display= "block";
    input_password_confirmation.style.display= "block";
    password_label.style.display ="block";
    password_confirmation_label.style.display ="block";
    input_image.style.display = "block";
    image_label.style.display = "block";
    input_password.addEventListener('input', () => {
      // Check if the password input field is not empty
      if (input_password.value.trim() !== '') {
        // Add the required attribute to the confirmation password input field
        input_password_confirmation.setAttribute('required', '');
        input_password.setAttribute('name','password')
        input_password_confirmation.setAttribute('name','password_confirmation')

      } else {
        // Remove the required attribute from the confirmation password input field
        input_password_confirmation.removeAttribute('name');
        input_password.removeAttribute('name');
        input_password_confirmation.removeAttribute('required');
      }
    });
  } else {
    btn.innerHTML = "Edit";
    document.getElementById('submit').click();
  }
}  
  