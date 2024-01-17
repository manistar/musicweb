<?php
class web_content extends database
{
    function edit_content()
    {
        $d = new database;
        $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "editcontent");
        if ($verify) {
            // echo $_FILES["logo"]["name"];
            $data = $d->checkmessage(["website name", "slogan_null", "about", "meta title", "meta description_null", "meta key words_null", "phone number_null", "email_null", "address_null", "instagram_null", "facebook_null", "twitter_null", "youtube_null", "whatsapp_null", "tiktok_null"]);
            if (is_array($data)) {
                $id = "1";
                $where = "ID = '$id'";
                $update = $d->update("content", "", $where, $data);
                if ($update) {
                    $return = [
                        "message" => ["Success", "Content Saved", "success"],
                    ];
                    return json_encode($return);
                }
            }
        }
    }

    function logoupload()
    {
        $d = new database;
        $verify = $d->verifyrole(htmlspecialchars($_SESSION['adminSession']), "editcontent");
        if ($verify) {
           echo $logo = $d->process_image("logo", "../img/", "logo");
            $logo_icon = $d->process_image("logo_icon", "../img/", "logo_icon");

            $data = $d->fastgetwhere("content", "ID = ?", "1", "details");
            if ($logo == null) {
                $logo = $data['logo'];
            }

            if ($logo_icon == null) {
                $logo_icon = $data['logo_icon'];
            }
            $id = "1";
                $where = "ID = '$id'";
                $update = $d->update("content", "", $where, ["logo"=>$logo, "logo_icon"=>$logo_icon], "Logo Updated");
        }
    }
}
