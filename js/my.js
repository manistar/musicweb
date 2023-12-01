// Variable to hold request
var request;
var closeOnClick = "Close on click";
var displayClose = "Display close button";
var position = "nfc-top-right";
var duration = "3000";
var theme = "warning";

// get browser theme and set it as a cookie for gobal use in the project
if(getCookieValue('browser_theme') == null){
    getBrowserTheme();
}
    // console.log(getBrowserTheme());
function getBrowserTheme() {
  if (
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches
  ) {
    browserTheme = "dark";
  } else {
    browserTheme = "light";
  }


  // Set a cookie that expires in 12 hours
  let expirationDate = new Date();
  expirationDate.setTime(expirationDate.getTime() + 12 * 60 * 60 * 1000);
  document.cookie =
    "browser_theme=" +
    browserTheme +
    "; expires=" +
    expirationDate.toUTCString();
}

// copy to clipboard
function copytext(text) {
    // console.log("copied");
    var textarea = document.createElement("textarea");
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    copy = document.execCommand("copy");
    document.body.removeChild(textarea);
    if(copy) {
        alert("Copied");
    }
  }

 

// Function to get the value of a cookie by name
function getCookieValue(cookieName) {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith(cookieName + '=')) {
        return cookie.substring(cookieName.length + 1);
      }
    }
    return null;
  }
  
  // Usage example
  const myCookieValue = getCookieValue('browser_theme');
  console.log(myCookieValue);
  

const elements = document.querySelectorAll('#foo');
$i = 0;
elements.forEach(element => {
  element.addEventListener("submit", event => {
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();
 
    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(event.target);
    var fd = new FormData(element);
    var action = 'passer';
    if(window.location.href != $form[0].action) {
        action = $form[0].action;
    }
    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);
    const params = new URLSearchParams(serializedData);
  
    // Fire off the request to /form.php
  

    if (params.has("confirm")) {
        swal({
            title: "Attention!",
            text: params.get("confirm"),
            icon: "warning",
            
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
              runjax(request, event,  $inputs, fd, action);
            } else {
            //   close form
            }
          });
    } else {
        runjax(request, event, $inputs, fd, action);
    }
    
    // Callback handler that will be called on success
   
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});
$i++;
});
// Bind to the submit event of our form

function runjax(request, event, $inputs, fd, action = "passer") {
    request = $.ajax({
        url: action,
        type: "post",
        cache: false,
        processData: false,
        contentType: false,
        data: fd,
    });

    request.done(function (response, textStatus, jqXHR) {
        $inputs.prop("disabled", false);
        if(testJSON(response)){
            proceessjson(response);
        }else{
        // Log a message to the console
        // Log a message to the console
        var res = response.substring(0, 30);
        console.log(res);
        if (res === "<div class='card card-primary'") {
            event.srcElement.children.custommessage.innerHTML = "";
            // document.getElementById("accordion").innerHTML += response;
            $("#accordion").prepend(response);

        } else {
            event.srcElement.children.custommessage.innerHTML = response;
        }
        }
        // document.getElementById("message").innerHTML = "";
        // chatBox =  document.getElementById("chatdiv").innerHTML
        // if(chatbox){
        //     chatBox.scrollTop = chatBox.scrollHeight;
        // }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    
}
// $("#foo").submit(function (event) {
//     console.log(this);

//     // Prevent default posting of form - put here to work in case of errors
//     event.preventDefault();

//     // Abort any pending request
//     if (request) {
//         request.abort();
//     }
//     // setup some local variables
//     var $form = $(this);

//     // Let's select and cache all the fields
//     var $inputs = $form.find("input, select, button, textarea");

//     // Serialize the data in the form
//     var serializedData = $form.serialize();

//     // Let's disable the inputs for the duration of the Ajax request.
//     // Note: we disable elements AFTER the form data has been serialized.
//     // Disabled form elements will not be serialized.
//     $inputs.prop("disabled", true);

//     // Fire off the request to /form.php
//     request = $.ajax({
//         url: "passer",
//         type: "post",
//         data: serializedData
//     });

//     // Callback handler that will be called on success
//     request.done(function (response, textStatus, jqXHR) {
//         $inputs.prop("disabled", false);
//         if(testJSON(response)){
//             proceessjson(response);
//         }else{
//         // Log a message to the console
//         // Log a message to the console
//         var res = response.substring(0, 30);
//         console.log(res);
//         if (res === "<div class='card card-primary'") {
//             document.getElementById("custommessage").innerHTML = "";
//             // document.getElementById("accordion").innerHTML += response;
//             $("#accordion").prepend(response);

//         } else {
//             document.getElementById("custommessage").innerHTML = response;
//         }
//         }
//         // document.getElementById("message").innerHTML = "";
//         // chatBox =  document.getElementById("chatdiv").innerHTML
//         // if(chatbox){
//         //     chatBox.scrollTop = chatBox.scrollHeight;
//         // }
//     });

//     // Callback handler that will be called on failure
//     request.fail(function (jqXHR, textStatus, errorThrown) {
//         // Log the error to the console
//         console.error(
//             "The following error occurred: " +
//             textStatus, errorThrown
//         );
//     });
//     // Callback handler that will be called regardless
//     // if the request failed or succeeded
//     request.always(function () {
//         // Reenable the inputs
//         $inputs.prop("disabled", false);
//     });

// });

// Bind to the submit event of our form


function loadpage(url, holder){
    window.location.replace(url); 
}
function removediv(id, type="id"){
    divElement = document.querySelector(id);
    divElement.parentNode.removeChild(divElement);
}
function followuser(id, userid){
    document.getElementById(id).innerHTML = '<img src="img/loading.gif" alt="please wait..." style="width:48px;">';
    $.ajax({
        type: 'post',
        url: 'passer.php',
        data: {
            userid: userid,
            follow: "follow",
        },
        success: function (response) {
            if (testJSON(response)) {
                proceessjson(response);
            } else {
                document.getElementById(id).innerHTML = response;
            }
        }
    });
}

function removethis(id, what){
    if(confirm("Are you sure you want to delete this "+what)){
        document.getElementById("message"+id).innerHTML = '<img src="img/loading.gif" alt="please wait..." style="width:48px;">';
        $.ajax({
            type: 'post',
            url: 'passer.php',
            data: {
                removethis:id,
                whatto:what,
            },
            success: function (response) {
                if (testJSON(response)) {
                    proceessjson(response);
                } else {
                    document.getElementById(id).innerHTML = response;
                }
                document.getElementById("message"+id).innerHTML = "";
            }
        });
    }
}
function bookmark(id) {
    save = document.getElementById(id).innerHTML;
    $.ajax({
        type: 'post',
        url: 'passer.php',
        data: {
            saveproduct: save,
            id: id,
        },
        success: function (response) {
            if (testJSON(response)) {
                proceessjson(response);
            } else {
                document.getElementById(id).innerHTML = response;
                console.log(response);
            }
        }
    });


}

function testJSON(text) {
    if (typeof text !== "string") {
        return false;
    }
    try {
        JSON.parse(text);
        return true;
    } catch (error) {
        return false;
    }
}


function proceessjson(response) {
    obj = JSON.parse(response);

    if (obj.hasOwnProperty("function")){
        window.settings = { functionName: `${obj.function[0]}` };
        var fn = window[settings.functionName];
        if (typeof fn === 'function') {
            fn(obj.function['data'][0], obj.function['data'][1]);
        }
    }

    if (obj.hasOwnProperty("message")) {
        notify(obj.message[0], obj.message[1], obj.message[2]);
    }

    if (obj.closemodal && obj.closemodal === true) {
        $('#modal-lg').modal('hide');
    }
}

function restcomment(data1, data2){
    document.getElementById("makecomment").innerHTML = "";
    document.getElementById("replyID").value = "";
    document.getElementById("message").value = "";
    productcomments(data1);
}

function notify(title, message, type) {
    window.createNotification({
      // closeOnClick: closeOnClick,
      displayCloseButton: displayClose,
      positionClass: position,
      showDuration: duration,
      theme: type
    })({
      title: title,
      message: message
    });
  }

  function showPreview(event, id = "file-ip-1-preview"){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById(id);
      preview.innerHTML = "<img src='"+src+"' style='width: 100px' />";
    //   preview.style.display = "block";
    }
  }

  function checkusername(id) {
    //   alert('true woeking');
     id =  document.getElementById(id);
        $.ajax({
            type: 'post',
            url: 'passer.php',
            data: {
                checkusername: id.value,
            },
            success: function (response) {
                if(response == "wrong"){
                    id.style.border = "2px solid red";
                    document.getElementById("errormessagedisplay").innerHTML = "Username taken or can not be use.";
                    document.getElementById("errormessagedisplay").className = "text-danger"
                    document.getElementById('displaystorename').innerHTML = '';
                }else{
                    document.getElementById('displaystorename').innerHTML = response;
                    id.style.border = "2px solid green";
                    id.value = response;
                    document.getElementById("errormessagedisplay").innerHTML = "";
                }
            }
        });
    
}

function showcontent(id) {
    var value = document.getElementById(id);
    title = value.dataset.title;
    link = value.dataset.url;
    modaltitle = document.getElementById('modal-title').innerHTML = title;
    $.ajax({
        type: 'post',
        url: 'modaldisplay.php',
        data: {
            urlink: link,
            secured:"yes",
            id: id,
        },
        success: function (response) {
            document.getElementById("modal-body").innerHTML = response;
        }
    });
}

function deletecat(id) {
    var r = confirm("You are about to delete an item!");
    if (r == true) {
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                deletecat: id,
                subid: id,
            },
            success: function (response) {
                console.log("yes");
                document.getElementById("group" + id).innerHTML = "";

            }
        });
    }
}

function deletemaincat(id) {
    var r = confirm("You are about to delete an item!");
    if (r == true) {
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                deletemaincat: id,
                catid: id,
            },
            success: function (response) {
                document.getElementById("mcat" + id).innerHTML = "";
                console.log("mcat" + id);
            }
        });
    }
}

function editcat(id) {
    catvalue = document.getElementById("input" + id).value;
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            editcat: id,
            catvalue: catvalue,
        },
        success: function (response) {
            document.getElementById("custommessage").innerHTML = response;
        }
    });
}

function addinput(id) {
    document.getElementById("catid").value = id;
}

function addnewinput() {
    randvalue2 = Math.floor(Math.random() * 100);
    randvalue3 = Math.floor(Math.random() * 100);
    $('#upload-area').append('<div id="' + randvalue2 + '" class="preview-image readme"> <div class="remove-image bg-danger" onclick="removeinput(\'' + randvalue2 + '\')"><span class="fa fa-times"></span></div><label for="' + randvalue3 + '"><li class="fa fa-upload"></li> <br><span>Click here to select image</span></label><input type="file" id="' + randvalue3 + '" onchange="showPreview(event, \'' + randvalue2 + '\')" name="uploaded_file[]" class=""></div>');

    //  '<div class="input-group mb-2" id="' + randvalue2 + '"><input type="file" name="uploaded_file[]" class="form-control"> <span onclick="removeinput(\'' + randvalue2 + '\')" class="input-group-prepend btn btn-danger">x</span></div><div id="file' + randvalue + '"></div>';

}

function addsubcat() {
    document.getElementById("subcustommessage").innerHTML = "Please Wait...";
    catid = document.getElementById("catid").value;
    subcatname = document.getElementById("subcatname").value;
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            catid: catid,
            subcatname: subcatname,
        },
        success: function (response) {
            var res = response.substring(0, 30);
            if (res === "<div class='card card-primary'") {
                document.getElementById("subcustommessage").innerHTML = response;
            } else {
                $("#value" + catid).prepend(response);
                document.getElementById("subcustommessage").innerHTML = "Item Added";
                document.getElementById("subcatname").value = "";
                console.log("value" + catid);
                // document.getElementById("value"+id).innerHTML = response;
            }
        }
    });
}



// check task
function checktask(id) {
    var r = confirm("You are about to confirm a task. Please note that you might not be able to undo this action");
    if (r == true) {
        document.getElementById('button-' + id).disabled = true;
        paid_amount = document.getElementById('pay-' + id).value;
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                comfirmtask: id,
                paid_amount: paid_amount,
            },
            success: function (response) {
                if (response === 1) {
                    document.getElementById('tr-' + id).innerHTML = "";
                } else {
                    var res = response.substring(0, 5);
                    console.log(res);
                    if (res === "Error") {
                        alert(response);
                    }
                }
            }
        });
    }
}


// check task
function cooperative_payin_form(id, name, amount) {
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            cooperative_payin_form: id,
            amount: amount,
            name: name,
        },
        success: function (response) {
            document.getElementById('modal-body').innerHTML = response;

        }
    });
}

// onclick(updateinfo())
function updateinfo(what, id) {
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            what: what,
            id: id,
        },
        success: function (response) {
            document.getElementById('modal-body').innerHTML = response;

        }
    });
}

function removeimage(id) {
    var r = confirm("You are about to remove an image!");
    var what = "removeimage";
    if (r == true) {
        // document.getElementById('image'+id).style.display = "none";
        $.ajax({
            type: 'post',
            url: 'passer.php',
            data: {
                removeimage: what,
                id: id,
            },
            success: function (response) {
                document.getElementById('image' + id).remove();
            }
        });
    }
}



function moreproducts(id){
    $.ajax({
        type: 'post',
        url: 'passer.php',
        data: {
            moreproducts: id,
        },
        success: function (response) {
            document.getElementById('moreproducts').innerHTML = response;
        }
    });
}

function productcomments(id, value = ""){
    // alert(id);
    $.ajax({
        type: 'post',
        url: 'passer.php',
        data: {
            productcomments: id,
        },
        success: function (response) {
            document.getElementById('productcomments').innerHTML = response;
        }
    });
}

function removecomment(id){
    if(confirm("You are about to remove a comment")){
        $.ajax({
            type: 'post',
            url: 'passer.php',
            data: {
                removecomment: id,
            },
            success: function (response) {
                if(testJSON(response)){
                    proceessjson(response);
                }
            }
        });
    }
}

function removecommentcontent(id, value = ""){
    document.getElementById("c"+id).remove();
}

function allusers(id){
    // confirm(id);
    $.ajax({
        type: 'post',
        url: 'passer.php',
        data: {
            allusers: "all",
        },
        success: function (response) {
            // confirm(response);
            document.getElementById(id).innerHTML = response;
        }
    });
}

function changetext(id, text){
    document.getElementById(id).disabled = true;
    document.getElementById(id).innerHTML = text;

}

function submitform(id = "foo2", messageid = "custommessage") {
    var myform = document.getElementById(id);
    document.getElementById("Button").disabled = true;
    document.getElementById(messageid).innerHTML = "Please wait...";
    var fd = new FormData(myform);
    $.ajax({
        url: "passer",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (response) {
            if(testJSON(response)){
                proceessjson(response);
                document.getElementById(messageid).innerHTML = "";
            }else{
            document.getElementById(messageid).innerHTML = response;
            }
            document.getElementById("Button").disabled = false;
        }
    });
}


// update rollover 
function update_rollover(value, id) {
    $.ajax({
        url: "passer",
        data: {
            status: value,
            page: "investment",
            update_rollover: id,
        },
        type: 'POST',
        success: function (response) {
            console.log(response);
        }
    });
}

// change profile picture
function change_profile(id) {
    var form =  document.getElementById(id);
    var fd = new FormData(form);
    $.ajax({
        url: "passer",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (response) {
            proceessjson(response);
        }
    });
}

// Check ../passer.php
function search(key, contentshow) {
    document.getElementById(contentshow).innerHTML = "Loading...";
    $.ajax({
        type: 'post',
        url: 'passer',
        data: {
            searchkey: key,
        },
        success: function (response) {
            document.getElementById(contentshow).innerHTML = response;

        }
    });
}

//Below is the code for Cart function process


