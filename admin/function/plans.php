<?php
    class plans extends database {
        function create_plan(){
            $d = new database;
            $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "createplan");
            if($verify){
                $_POST['ID'] = uniqid();
                $_POST['added_by'] = $d->userID();
                $data = $d->checkmessage(["ID", "added_by", "name", "price", "plan_type", "free_trial", "duration", "no_of_ads_null", "no_of_image_per_ads_null"]);
                if(is_array($data)){
                    if($d->multiplegetwhere("plans", "name = ? and plan_type = ?", [$data['name'], $data['plan_type']], "") == 0){
                        $insert = $d->quick_insert("plans", "", $data);
                        if($insert){
                            $return = [
                                "message" => ["Plan created successfully", "", "success"],
                                "function" => ["updatetable", "data"=>["plantable", htmlspecialchars($_POST['ID'])]],
                                "closemodal" => true
                            ];
                            return json_encode($return);
                        }
                    }else{
                        $d->message("This is a duplicate plan change the name and try again", "error");
                    }
                }
            }else{
                $d->message("sorry you can not perfrorm this action", "error");
            }
        }

        function edit_plan(){
            $d = new database;
            $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "editplan");
            if($verify){
                $_POST['added_by'] = $d->userID();
                $id = htmlspecialchars($_POST['ID']);
                $data = $d->checkmessage(["added_by", "name", "price", "plan_type", "free_trial", "duration", "no_of_ads_null", "no_of_image_per_ads_null"]);
                if(is_array($data)){
                    if($d->multiplegetwhere("plans", "ID != ? and name = ? and plan_type = ?", [htmlspecialchars($_POST['ID']), $data['name'], $data['plan_type']], "") == 0){
                        if(isset($_POST['status']) && $_POST['status'] == "1"){ 
                            $data['status'] = "1";
                        }else{
                            $data['status'] = '0';
                        }
                        $where = "ID ='$id'";
                        $update = $d->update("plans", "", $where, $data);
                        if($update){
                            $return = [
                                "message" => ["Plan Updated", "", "success"],
                                "function" => ["updatetable", "data"=>["plantable", htmlspecialchars($_POST['ID'])]],
                                "closemodal" => true
                            ];
                            return json_encode($return);
                        }
                    }else{
                        $d->message("This is a duplicate plan change the name and try again", "error");
                    }
                }
            }else{
                $d->message("sorry you can not perfrorm this action", "error");
            }
        }
    }

?>