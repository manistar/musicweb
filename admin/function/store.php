<?php
class input extends database
{
    public function upload_products($store_insert)
    {
        $data = $this->validate_form($store_insert);
        if (is_array($data)) {
            $data['userID'] = $_SESSION['adminSession']; 
            $data['ID'] = uniqid();  // Assuming you want to set the 'ID' field
            $insert = $this->quick_insert("products", $data, "Data uploaded Successfully");
        }
    }
}
?>