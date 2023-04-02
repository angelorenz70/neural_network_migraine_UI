<?php
// Get the inputs from the form
						
						
						
$Name = $_POST['name'];

$Age = $_POST['age'];
$Duration = $_POST['duration'];
$Frequency = $_POST['frequency'];
$Location = $_POST['location'];
$Character = $_POST['character'];

$Intensity = $_POST['intensity'];
$Nausea = $_POST['nausea'];
$Vomit = $_POST['vomit'];
$Phonophobia = $_POST['phonophobia'];
$Photophobia = $_POST['photophobia'];

$Visual = $_POST['visual'];
$Sensory	 = $_POST['sensory'];
$Dysphasia = $_POST['dysphasia'];
$Dysarthria = $_POST['dysarthria'];
$Vertigo = $_POST['vertigo'];

$Tinnitus = $_POST['tinnitus'];
$Hypoacusis = $_POST['hypoacusis'];
$Diplopia = $_POST['diplopia'];
$Defect = $_POST['defect'];
$Ataxia = $_POST['ataxia'];

$Conscience = $_POST['conscience'];
$Paresthesia = $_POST['paresthesia'];
$DPF = $_POST['dpf'];


// Send a POST request to the Flask server
$url = 'http://localhost:5000/predict';
$data = array(		
            'Age' => $Age,
            'Duration' => $Duration,
            'Frequency' => $Frequency,	
            'Location' => $Location,
            'Character' => $Character,
            'Intensity' => $Intensity,
            'Nausea' => $Nausea,
            'Vomit' => $Vomit,
            'Phonophobia' => $Phonophobia,
            'Photophobia' => $Photophobia,
            'Visual' => $Visual,
            'Sensory' => $Sensory,
            'Dysphasia' => $Dysphasia,
            'Dysarthria' => $Dysarthria,
            'Vertigo' => $Vertigo,
            'Tinnitus' => $Tinnitus,
            'Hypoacusis' => $Hypoacusis,
            'Diplopia' => $Diplopia,
            'Defect' => $Defect,
            'Ataxia' => $Ataxia,
            'Conscience' => $Conscience,
            'Paresthesia' => $Paresthesia ,
            'DPF' => $DPF,
            );

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$result = json_decode($response);
$alert_warning = null;
$str_prediction = null;

if($result->prediction != null){
    $alert_warning = "Sorry, We can't process for now. Try again later.";
}

if($result->prediction == 1){
    $str_prediction = "The person has a chance of Heart Disease";
}else{
    $str_prediction = "The person is healthy";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Migraine Categories</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-20 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading" style="background-image: url('images/bg-m.jpg');"></div>
                <div class="card-body">
                    <h2 class="title">What's your Migraine?</h2>
                    <h2><?php echo "Name: " . $Name . ", " . $Age . " Years Old"?></h2>
                    <h2><?php echo "Prediction: " . $result->prediction ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->