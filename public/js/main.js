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


  