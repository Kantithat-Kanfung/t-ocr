<?php
    header('Content-Type: application/json');

    $aResult = array();

    if(!isset($_POST['filepath']) ) 
    { 
        $aResult['error'] = 'No file path!'; 
    }
    else
    {
        $curl = curl_init();
        $img_file = sprintf("C:\Users\kanti\OneDrive\Desktop\%s", $_POST['filepath']);
        $data = array("uploadfile" => new CURLFile($img_file, mime_content_type($img_file), basename($img_file)));

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.aiforthai.in.th/ocr",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            "Content-Type: multipart/form-data",
            "apikey: KunPfm0IAA5AoEyLtTsQxiUIod08wusU"
          )
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) 
        {
            $aResult['error'] = $err;
        } 
        else 
        {
            $object = json_decode($response);
            $aResult['result'] =$object->Original;
        }
    }

    echo json_encode($aResult);

?>