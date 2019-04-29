var showCommentsSection = false;
var post_num;
var post_id;

function showHint(str) {
  if (str.length == 0) { 
      document.getElementById("txtHint").innerHTML = "";
      return;
  } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET", "controllers/AjaxController.php?q=" + str, true);
      xmlhttp.send();
  }
}


function displayComments(postNum, postId) {
        post_num = postNum;
        post_id = postId;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".main-post__details__show-comments--"+postNum).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxShowComments?postId="+postId, true);
        xmlhttp.send();
}

function storeComment() {
    console.log(post_num, post_id);
    $("#storeComment").submit(function(event) {
        var ajaxRequest;
   
       /* Stop form from submitting normally */
       event.preventDefault();

       /* Get from elements values */
       var values = $(this).serialize();
       console.log(values); 
       /* Send the data using post and put the results in a div */
       /* I am not aborting previous request because It's an asynchronous request, meaning 
          Once it's sent it's out there. but in case you want to abort it  you can do it by  
          abort(). jQuery Ajax methods return an XMLHttpRequest object, so you can just use abort(). */
          ajaxRequest= $.ajax({
               url: "comment",
               type: "POST",
               data: values
           });
   
         /*  request cab be abort by ajaxRequest.abort() */
   
        ajaxRequest.done(function (response, textStatus, jqXHR){
             // show successfully for submit message
             displayComments(post_num, post_id);
        });
   
        /* On failure of request this function will be called  */
        ajaxRequest.fail(function (){
   
          // show error
          console.log('Error');
        });
});
}


// function toggleCommentsSection(postNum, postId) {
//   console.log(showCommentsSection);
//   if (showCommentsSection){
//     document.querySelector('.main-post__details__comments-section').getElementsByClassName.display = 'none';
//     showCommentsSection = false;
//   } else {
//     showCommentsSection = true;
//     displayComments(postNum, postId);
//     document.querySelector('.main-post__details__comments-section').getElementsByClassName.display = 'flex';
//   }  

// }
