<?php
 
$curl = curl_init();
$img_file = ("img.png");
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
 
if ($err) {
  echo "cURL Error #:" . $err;
} else {
    //echo $response;

    $object = json_decode($response);

     echo $object->Original; 

}
?>