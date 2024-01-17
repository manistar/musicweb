// Variable to hold request 
var request;
var closeOnClick = "Close on click";
var displayClose = "Display close button";
var position = "nfc-top-right";
var duration = "3000";
var theme = "warning";

// Bind to the submit event of our form
$("#foo").submit(function (event) {

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "ajax.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
        if(testJSON(response)){
            proceessjson(response);
        }else{
        // Log a message to the console
        // Log a message to the console
        var res = response.substring(0, 30);
        console.log(res);
        if (res === "<div class='card card-primary'") {
            document.getElementById("custommessage").innerHTML = "";
            // document.getElementById("accordion").innerHTML += response;
            $("#accordion").prepend(response);
            $inputs.prop("disabled", false);

        } else {
            document.getElementById("custommessage").innerHTML = response;
        }
        }
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
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});

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

 
  function removeimage(id) {
    var r = confirm("You are about to remove an image!");
    var what = "removeimage";
    if (r == true) {
        // document.getElementById('image'+id).style.display = "none";
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                removeimage: what,
                id: id,
            },
            success: function (response) {
                document.getElementById('image' + id).remove();
                notify('Removed', 'Image removed', 'success');
            }
        });
    }
}

function deletecat(id) {
    var r = confirm("You are about to remove a categocry!");
    var what = "removeimage";
    if (r == true) {
        // document.getElementById('image'+id).style.display = "none";
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                deletecat: what,
                id: id,
            },
            success: function (response) {
                document.getElementById('image' + id).remove();
                notify('Removed', 'Image removed', 'success');
            }
        });
    }
}

// Check ../ajax.php
function search(key, contentshow) {
    document.getElementById(contentshow).innerHTML = "Loading...";
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            searchkey: key,
        },
        success: function (response) {
            document.getElementById(contentshow).innerHTML = response;

        }
    });
}

// Multiple Data Check Box
function toggleCheckbox(box){
    var id = $(box).attr("value");

    if($(box).prop("checked") == true){
        var visible = 1;
    }else{
        var visible = 0;
    }

    var data = {
        "search_data" : 1,
        "ID": id,
        "visible": visible
    };

    $.ajax({
        type: "post",
        url: "ajax.php",
        data: data,
        success: function (response) {
            alert("Data Checked");
        }
    });
}

function updaterow(id, tname){
    key = "null";
    if(document.getElementById('search')){
        key = document.getElementById('search').value;
    }
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            updaterow: tname,
            id: id,
            key:key,
        },
        success: function (response) {
            document.getElementById(id).innerHTML = response;

        }
    });  
}

function searchfor(value){

}

function statusswitch(id, type){
    if(type === "danger"){
        document.getElementById('danger'+id).style.display = 'block';
        document.getElementById('success'+id).style.display = 'none';
    }else{
        document.getElementById('danger'+id).style.display = 'none';
        document.getElementById('success'+id).style.display = 'block';
    }
    
}

function replacerow(id, value){
    document.getElementById(id).innerHTML = value;       
}

function replacevalue(id, value){
    document.getElementById(id).value = value;       
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

function updatetable(tableid, id){
    value = document.getElementById(tableid);
    // element.querySelector("data-card-widget").value = "card-refresh";
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            updatetable: tableid,
            id: id,
        },
        success: function (response) {
         document.getElementById(tableid).innerHTML = response;
            $(function() {
                $("#example4").DataTable({
                  "responsive": true,
                  "lengthChange": false,
                  "autoWidth": false,
                  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
              });
        }
    });
}


function showcontent(title, link, id) {
    modaltitle = document.getElementById('modal-title').innerHTML = title;
    $.ajax({
        type: 'post',
        url: 'modaldisplay.php',
        data: {
            urlink: link,
            id: id,
        },
        success: function (response) {
            document.getElementById("modal-body").innerHTML = response;

        }
    });

}

function Searchdiv() {
    var input = document.getElementById("searchdiv");
    var filter = input.value.toLowerCase();
    var nodes = document.getElementsByClassName('user-block');
    var id = document.getElementsByClassName('targetname');
    for (i = 0; i < nodes.length; i++) {
         a = nodes[i].getElementsByClassName("targetname")[0];
         txtValue = a.textContent || a.innerText;
      if (txtValue.toLowerCase().includes(filter)) {
        nodes[i].style.display = "block";
      } else {
        nodes[i].style.display = "none";
      }
    }
  }

function modalcontent(id) {
    var value = document.getElementById(id);
    title = value.dataset.title;
    link = value.dataset.url;
    title += ' | <span class="btn btn-tool" id="'+id+'" data-url="'+link+'" data-id="'+id+'" data-title="'+title+'" onclick="modalcontent(\''+id+'\')"> <li class="nav-icon fas fa-sync"></li> Reload</span>';
    id = value.dataset.id;
    modaltitle = document.getElementById('modal-title').innerHTML = title;
    document.getElementById("modal-body").innerHTML = "Getting data...";
    $.ajax({
        type: 'post',
        url: 'modaldisplay.php',
        data: {
            secured:"yes",
            urlink: link,
            id: id,
        },
        success: function (response) {
            document.getElementById("modal-body").innerHTML = response;
            $(function() {
                $("#simpletable").DataTable({
                  "responsive": false,
                  "lengthChange": false,
                  "autoWidth": false,
                //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
              });
        }
    });
}


function updatestaus(id, where){
   value = document.getElementById(id).value;
    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            secured:"yes",
            updatestaus: where,
            id: id,
            value:value,
        },
        success: function (response) {
            if(testJSON(response)){
                proceessjson(response);
            }else{
                console.log("HELLO WORLD");
            }
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

function submitform() {
    var myform = document.getElementById("foo2");
    document.getElementById("custommessage").innerHTML = "Please wait...";
    var fd = new FormData(myform);
    $.ajax({
        url: "ajax.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (response) {
            document.getElementById("custommessage").innerHTML = response;
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

function saymyname() {
    document.getElementById('custommessage').innerHTML = "Please wait...";
    document.getElementsByTagName('submit-button').disabled;
    var name = document.getElementById('name').value;
    var id = document.getElementById('id').value;
    var amount = document.getElementById('amount').value;
    var date = document.getElementById('date').value;
    var payin_coopertaive = document.getElementById('payin_coopertaive').value;

    $.ajax({
        type: 'post',
        url: 'ajax.php',
        data: {
            id: id,
            date: date,
            payin_coopertaive: payin_coopertaive,
            amount: amount,
            name: name,
        },
        success: function (response) {
            document.getElementById('custommessage').innerHTML = response;

        }
    });
}