<?php
class content extends database
{
    private array $data;
    private array $datas;
    private String | int $key;
    private array $accepted_type = ["input", "textarea", "select", "countries"];
    private String $placeholder = "---placeholderforinput---";
    // Example code for create_form
    // $users_form = [
    //     "full_name"=>[
    //     "title"=>"Enter full name",
    //     "value"=>"",
    //     "id"=>"my_full_name_id",
    //     "class"=>"add this class",
    //      "atb"=>"data-info='data'",
    //      "global_class"=>"add gloabl class",
    //     "placeholder"=>"Enter your full name", 

    //     "description"=>"<a href='forgot.html'>Forgot Password ?</a>",
    //      or
    //     "description"=>"Enter both first name and last name", 
    
    //     "is_required"=>true, 
    //     "input_type"=>"text", 
    //     "type"=>"input",
    // ],
    // "upload_image"=>["input_type"=>"file", "path"=>"upload/", "file_name"=>"profile_".$userID, "formart"=>["pdf", "doc", "php"]]
    //     "gender"=>["placeholder"=>"Select your gender", "is_required"=>true, "options"=>["Male"=>"Male", "Female"=>"Female"], "type"=>"input"],
    //     "tell_us_more"=>["placeholder"=>"Tell us more about your self", "is_required"=>false, "type"=>"textarea",],
    //     "input_data"=>["full_name"=>"seriki gbenga"],
    // ];
    function create_form($datas)
    {
        if (!is_array($datas)) {
            return null;
        }
        $main_code = "";
        $this->datas = $datas;
        foreach ($datas as $key => $data) {
            if (!is_array($data)) {
                continue;
            }
            if ($key == "input_data") {
                continue;
            }
            $this->data = $data;
            $this->key = $key;
            $this->data['star'] = "";
            $this->data["value"] = $this->get_value($datas, $key);
            if (!isset($this->data['global_class'])) {
                $this->data['global_class'] = "";
            }
            if (!isset($this->data['atb'])) {
                $this->data['atb'] = "";
            }
            if (!isset($this->data['is_required']) || $this->data['is_required'] == true) {
                $this->data['is_required'] = true;
                $this->data['star'] = "*";
            }
            if (!isset($this->data['type'])) {
                $this->data['type'] = "input";
            }
            if (!isset($this->data['title'])) {
                $this->data['title'] = ucwords(str_replace("_", " ", $key));
            }
            if (!isset($this->data['id'])) {
                $this->data['id'] = $this->key;
            }
            if (!isset($this->data['class'])) {
                $this->data['class'] = $this->key;
            }
            if (!isset($this->data['placeholder'])) {
                $this->data['placeholder'] = "Enter " . ucwords(str_replace("_", " ", $key));
                if($this->data['type'] == "select"){
                    if(isset($data['title'])){
                        $this->data['placeholder'] = $data['title'];
                    }else{
                        $this->data['placeholder'] = "Select " . ucwords(str_replace("_", " ", $key));
                    }
                }
            }
            if ($this->data['type'] == "input" && !isset($this->data['input_type'])) {
                $this->data['input_type'] = "text";
            }
            if (!in_array($this->data['type'], $this->accepted_type)) {
                continue;
            }
            $type = $this->data['type'];
            if ($this->data['type'] == "input" && isset($this->data['input_type']) && $this->data['input_type'] == "hidden") {
                $main_code .=  $this->$type();
                continue;
            }
            // echo $key;
            // if ($key == "password") {
            //     $main_code .= $this->showpassword();
            // }

            $main_code .= str_replace($this->placeholder, $this->$type(), $this->get_header());
        }
        return $main_code;
    }

    function showpassword() {
        return  "<input type='checkbox' onclick='showPassword()'>Show Password";
    }

    function  get_header()
    {
        $info =  "<div class='mb-3 form-groupcol-12 col-md-6 " . $this->data['global_class'] . "'>
        <label>" . ucwords($this->data['title']) . " <span class='text-danger'>" . $this->data['star'] . "</span></label>
        <div class='controls'>" . $this->placeholder;
        if (isset($this->data['description'])) {
            $info .= "<div class='form-control-feedback " . $this->data['class'] . "'>
            <div class='help-block'></div>
            <small>" . $this->data['description'] . "</small>
          </div>";
        }

        $info .= "
        </div>
      </div>";
        return $info;
    }

    function input()
    {

        $info = "";
        $onchange = "";
        // var_dump($this->data);
        if (isset($this->data['path']) && $this->data['input_type'] == "file") {
            $path = "";
            if (isset($this->datas["input_data"][$this->key])) {
                $path = $this->data['path'] . $this->datas["input_data"][$this->key];
            }
            $onchange = "onchange=\"showPreview(event, 'image-preview-" . $this->key . "')\"";
            $info .= "<div id= 'image-preview-" . $this->key . "' class='card shadow-md w-30 h-20 bg-gray p-3'><img src='$path' style='width: 100px' alt=''></div>";
        }

        $required = "";
        if ($this->data['is_required']) {
            $required = "required";
        }
        $info .= "<input $onchange name='" . $this->key . "' value='" . $this->data['value'] . "' id='" . $this->data['id'] . "' type='" . $this->data['input_type'] . "' class='form-control " . $this->data['class'] . "' placeholder='" . $this->data['placeholder'] . "'" . $this->data['atb'];
        if (isset(Regex[$this->key]['value'])) {
            $info .= "data-validation-required-message='" . Regex[$this->key]['error_message'] . "' aria-invalid='false'";
        }
        $info .= " $required/>";
        return $info;
    }

    function get_value($datas, $key)
    {
        if (isset($_POST[$key])) {
            return htmlspecialchars($_POST[$key]);
        }
        if (isset($datas['input_data'][$key])) {
            return $datas['input_data'][$key];
        }
        return "";
    }
    function textarea()
    {
        return "<textarea id='" . $this->data['id'] . "' class='form-control' placeholder='" . $this->data['placeholder'] . "'  name='" . $this->key . "'>" . $this->data['value'] . "</textarea>";
    }
    function select()
    {
        if (isset($this->data['options'])) {
            $bracket = "";
            $placeholder = "";
            $word = "multiple='multiple'";
            if (strpos($this->data['atb'], $word) !== false) {
                $bracket = "[]";
                $placeholder = $this->data['placeholder'];
                unset($this->data['placeholder']);
            }

            $info = "<select data-placeholder='$placeholder' class='form-control " . $this->data['class'] . "' id='" . $this->data['class'] . "' " . $this->data['atb'] . " name='" . $this->key . $bracket . "'>";
            if (isset($this->data['placeholder'])) {
                $info .= "<option value=''>" . $this->data['placeholder'] . "</option>";
            }
            foreach ($this->data['options'] as $key => $value) {
                // if($key )
                $selected = "";
                if(is_array($this->data['value']) && in_array($key, $this->data['value'])) {
                    $selected = "selected";
                }
                if ($key == $this->data['value'] && !is_array($this->data['value'])) {
                    $selected = "selected";
                }
                $info .= "<option value='$key' $selected>$value</option>";
            }
            $info .= "</select>";
            return $info;
        }

        return null;
    }

    function countries()
    {
        if (isset($this->data['data'])) {
            $info = "<select name='" . $this->key . "' class='form-control select2 " . $this->data['class'] . "' id='template-with-flag-icons " . $this->data['class'] . "' " . $this->data['atb'] . ">";
            if ($this->data['placeholder']) {
                $info .= "<option value=''>" . $this->data['placeholder'] . "</option>";
            }
            foreach ($this->data['data'] as $value) {
                $selected = "";
                $key = $value['id'];
                if ($key == $this->data['value']) {
                    $selected = "selected";
                }
                $info .= "<option value='$key' data-flag='ad' $selected> " . $value['name'] . "</option>";
            }
            $info .= "</select>";
            return $info;
        }

        return null;
    }

    function get_users_option_data()
    {
        $info = [];
        $users = $this->getall("users", "status = ?", ["active"], "ID, first_name, last_name", "moredetails");
        if ($users->rowCount() == 0) {
            return $info;
        }
        foreach ($users as $row) {
            $info[$row['ID']] = $row['first_name'] . ' ' . $row['last_name'];
        }
        return $info;
    }
    function badge($data)
    {
        $data = ucfirst($data);
        $info = "<span class='badge bg-light-primary text-primary fw-semibold fs-2'>$data</span>";
        $info = match ($data) {
            'Active', 'Approved','Success'   => "<span class='badge bg-light-success text-success fw-semibold fs-2'>$data</span>",
            'Disable', 'Rejected' => "<span class='badge bg-light-danger text-danger fw-semibold fs-2'>$data</span>",
            'Pending' => "<span class='badge bg-light-warning text-warning fw-semibold fs-2'>$data</span>",
            "" => "<span class='badge bg-light-primary text-primary fw-semibold fs-2'>$data</span>"
        };
        return $info;
    }

    function empty_page($message, $btn= "", $h1 = "Nothing here!!", $icon = "<i class='ti ti-alert-square-rounded text-warning h1'></i>")
    {
        return "
        <div class='mt-3 col-12 text-center'>
    $icon
    <h4 class=''>$h1</h4>
    <p>$message</p>
    <div class='mt-3'>
        $btn
    </div>
</div>
        ";
    }
    

    function get_compound_profits_btn($investID, $data) {
        if($data == false) {
            echo "<a class='btn btn-success rounded-pill' href='index?p=compound_profits&action=new&investID=$investID'>Activate compound profits</a>";
            return null;
        }
        $id = $data['ID'];
        $status = $data['status'];
        $acheck = "";
        $dcheck = "";
        if($status == "active") {
            $acheck = "checked";
        }else{
            $dcheck = "checked";
        }

        echo '
        <div class="d-flex">
        <input type="radio" class="btn-check" name="options" id="option1"value="active" onclick="update_compound_profits(this.value, \''.$id.'\')" autocomplete="off" '.$acheck.'>
        <label class="btn btn-outline-success rounded-pill font-medium" for="option1">Active</label>
        
        <input type="radio" class="btn-check" name="options" value="deactive" id="option4" onclick="update_compound_profits(this.value, \''.$id.'\')" autocomplete="off" '.$dcheck.'>
        <label class="btn btn-outline-danger rounded-pill font-medium ms-2" for="option4">Deactive</label>
        </div>
        ';
    }


    function plan_list($data, $class = "")
    {
        $min = '';
        if ($data['plan_name'] != "") {
            $min = $data['plan_name'] . ": ";
        }
        $min .= currency . number_format((float)$data['min_amount'], 2,);
        $max = currency . number_format((float)$data['max_amount'], 2,);
        $retrun = $data['return_range_to'] . "%";
        $retrun_interval = $data['retrun_interval'];
        return "<a href='?p=investment&action=new&planid=" . $data['ID'] . "' class='card shadow-md p-3 col-12 col-md-5 m-1 zoom $class'>
                <h6 class='mr-auto p-2 m-0'>$min - $max</h6>
                <div class='ps-2 ml-auto text-right '>Retun up to <b class='text-success'>$retrun $retrun_interval</b></div>
            </a>";
    }

    function terms_message()
    {
        return "<b>By proceeding you agree to our <a href='https://proloomtrading.com/page.php?t=terms_and_conditions'>team and conditions</a> and <a href='https://proloomtrading.com/page.php?t=policy'> privacy policy</a>.</b>";
    }

    function arrow_percentage($percent, $word = "profit")
    {
        $percent = round($percent, 2);
        $arrow = "up";
        $color = "success";
        if ($percent < 0) {
            $arrow = "down";
            $color = "danger";
        }

        return "<div class='d-flex align-items-center pb-1'>
        <span class='me-2 rounded-circle bg-light-$color round-20 d-flex align-items-center justify-content-center'>
          <i class='ti ti-arrow-$arrow-right text-$color'></i>
        </span>
        <p class='text-dark me-1 fs-3 mb-0'> $percent%</p>
        <p class='fs-3 mb-0'>$word</p>
      </div>";
    }
}
