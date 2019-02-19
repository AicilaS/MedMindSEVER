<?php
    $path = getenv('PATH');
    putenv("PATH=$path:/usr/local/bin");
    header('Content-Type: application/json;charset=utf-8');
    $target_dir = "/Users/jerdFloder/Desktop/SeverMedMind/data/";
    $target_file = $target_dir . basename($_FILES["dataUpload"]["name"]);
    
    $dir = "./data/";

    //Textrandom
    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $randomLength = rand(35,50);
    $randomToken = generateRandomString($randomLength);

    $myfile = fopen("./data/".$randomToken, "w");

    fwrite($myfile, $_POST["data"]);
    $PlainText = '{"data" : { "url" : "http://92f0cf3a.ngrok.io/data/' . $randomToken .'" }}';
    echo $PlainText;

    // $file1 = $_FILES['dataUpload'];
    // if (is_uploaded_file($file1['tmp_name'])) {
    //     if (move_uploaded_file($file1['tmp_name'], $target_file)) {
    //         $data = file_get_contents ("data/" . ($_FILES["dataUpload"]["name"]));
    //         $name = ($_FILES["dataUpload"]["name"]);
    //         $PlainText = "{data : { url : http://192.168.1.36/data/" . ($_FILES["dataUpload"]["name"])." }}";
    //         $JASON = json_encode($PlainText);
    //         echo $JASON;
    //     }
    // }
?>