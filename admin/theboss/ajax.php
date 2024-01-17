<?php
require_once 'include/ini.php';
// website content

if (isset($_POST['edit_content'])) {
     echo  $content->edit_content();
}

// categories
if(isset($_POST['new_cat'])){
     $a->newcategory();
}

if(isset($_POST['new_sub_cat'])){
     $a->newsubcategory();
} 

// users or customers area
if (isset($_POST['create_account'])) {
     $u->createuser();
}

if (isset($_POST['deactivate'])) {
     echo $u->deactivateuser();
}

if (isset($_POST['activate'])) {
     echo $u->activateuser();
}
if (isset($_POST['updatecustomer'])) {
     $cu->updatecustomer();
}

// ads area
 
// post new ads
if (isset($_POST['postads'])) {
     $a->postads();
}


if (isset($_POST['editads'])) {
     echo $a->editads();
}

if (isset($_POST['updateadsstatus'])) {
     echo $a->updateadsstatus();
}

// remove ads image
if (isset($_POST['removeimage'])) {
     if ($data = $a->removeimage(htmlspecialchars($_POST['id']))) {
     }
}

// Remove categories
// if (isset($_POST['removecat'])) {
//      if ($data = $a->categs(htmlspecialchars($_POST['id']))) {
//      }
// }

// plans area
if (isset($_POST['create_plan'])) {
     echo $plan->create_plan();
}

if (isset($_POST['edit_plan'])) {
     echo $plan->edit_plan();
}

// staffs, role & assignment
if (isset($_POST['add_staff'])) {
     $staff->newstaff();
} 

if (isset($_POST['saverole'])) {
     $staff->assignrole();
}

if (isset($_POST['assigncustomer'])) {
     $staff->assigncustomer();
}

if (isset($_POST['withdraw'])) {
     $cu->withdraw();
}

if (isset($_POST['updaterow']) && $_POST['updaterow'] != "") {
     $id = htmlspecialchars($_POST['id']);
     $key = htmlspecialchars($_POST['key']);
     switch (htmlspecialchars($_POST['updaterow'])) {
          case 'users':
               # code...
               $data = $d->fastgetwhere("users", "ID = ?", $id, "details");
               if (is_array($data)) {
                    $c->userrow($data);
               }
               break;

          case 'searchuser':
               $data = $d->fastget("users where ID like '%$key%' or first_name like '%$key%' or last_name like '%$key%'", 'first_name', ';');
               if ($data != "") {
                    foreach ($data as $row) {
                         $userid = $row['ID'];
                         echo "<a href='users.php?a=post&id=$userid'>";
                         $c->getfollowdetails($row['ID']);
                         echo "</a>";
                    }
               } else {
                    echo "<p>Nothing Found</p>";
               }
               break;

          default:
               # code...
               break;
     }
}

// content updater 

if (isset($_POST['updatetable'])) {
     $variable = htmlspecialchars($_POST['updatetable']);
     $_GET['inner'] = "yes";
     switch ($variable) {
          case 'adstable':
               if ($_POST['id'] != "") {
                    $_GET['id'] = htmlspecialchars($_POST['id']);
                    $_GET['userads'] = "show";
               }
               require_once "content/ads/list.php";
               break;

          case 'plantable':
               if ($_POST['id'] != "") {
                    $_GET['tablename'] = "example4";
               }
               require_once "content/plans/list.php";
               break;

          default:
               # code...
               break;
     }
}

if (isset($_POST['updatestaus'])) {
     $variable = htmlspecialchars($_POST['updatestaus']);
     $id = htmlspecialchars($_POST['id']);
     $value = htmlspecialchars($_POST['value']);
     switch ($variable) {
          case 'subscriptions':
               $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "edituser");
               if ($verify) {
                    $data = $d->fastgetwhere("subscriptions", "ID = ?", $id, "details");
                    if (is_array($data)) {
                         $status = 1;
                         if ($data['status'] == 1) {
                              $status = 0;
                         }
                         $where = "ID ='$id'";
                         $update = $d->update("subscriptions", "", $where, ["status" => $status]);
                         if ($update) {
                              $return = [
                                   "message" => ["Subscriptions Updated", "", "success"],
                              ];
                         }
                    }
               }
               break;
          case 'settings':
               $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "changesettings");
               if ($verify) {
                    $data = $d->fastgetwhere("settings", "meta_name = ?", $id, "details");
                    if (is_array($data)) {
                         $settingid = $data['ID'];
                         if ($id == "free_for_all") {
                              if ($data['meta_value'] == 1) {
                                   $value = 0;
                              } else {
                                   $value = 1;
                              }
                         }
                         //    echo $value;
                         $where = "ID ='$settingid'";
                         $update = $d->update("settings", "", $where, ["meta_value" => $value]);
                         if ($update) {
                              switch ($id) {
                                   case 'free_for_all':
                                        if ($value == 1) {
                                             $value = 0;
                                        } else {
                                             $value = 1;
                                        }
                                        $return = [
                                             "message" => ["Settings Updated", "", "success"],
                                             "function" => ["replacevalue", "data" => ["$id", "$value"]],
                                        ];
                                        break;

                                   default:
                                        $return = [
                                             "message" => ["Settings Updated", "", "success"],
                                        ];
                                        break;
                              }
                         } else {
                              $return = [
                                   "message" => ["Error updating Settings", "", "error"],
                              ];
                         }
                    } else {
                         $return = [
                              "message" => ["Can not identify what's passed", "You can reload page and try again", "error"],
                         ];
                    }
               }
               break;
          case 'categories':
          case 'sub_categories': {
                    $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "managecategories");
                    if ($verify) {
                         $data = $d->fastgetwhere("$variable", "ID = ?", $id, "details");
                         if (is_array($data)) {
                              $info = ["name" => $value];
                              if ($value == "switchcat") {
                                   if ($data['status'] == 1) {
                                        $value = 0;
                                        $info = ["status" => $value];
                                   } else {
                                        $value = 1;
                                        $info = ["status" => $value];
                                   }
                              }
                              $where = "ID ='$id'";
                              $update = $d->update("$variable", "", $where, $info);
                              if ($update) {
                                   $return = [
                                        "message" => ["Updated", "", "success"],
                                   ];
                              }
                         }
                    }
                    break;
               }

          default:
               $return = [
                    "message" => ["Error: Reload page and try again", "", "error"],
               ];
               break;
     }
     echo json_encode($return);
}
