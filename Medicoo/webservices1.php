<?php

$search_param = $_POST["search"];
$search_area = $_POST["area"];

if (isset($_POST["search"]) && isset($_POST["area"])) {
// echo $search_param;
// echo $search_area;

$host = "localhost";
$dbuser = "id20442177_doctorsearch";
$dbpass = "Truptimayee@1234";
$dbname = "id20442177_doctor";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT DoctorName, DoctorInformation, DoctorImage from doctors
where DoctorArea like '%".$search_area."%' and DoctorCategory
like '%".$search_param."%' ";

$result = $conn->query($sql);

$data = '<div class="easy-steps-and">3 Easy steps and get your solution</div>';

if($result->num_rows > 0){
    $data = '<div class="easy-steps-and">Doctors found in your area</div>';
    $doctor_data = "null";

    while($row = $result->fetch_assoc()){
        @$doctorid = $row["ID"];
        $doctorname = $row["DoctorName"];
        $doctorinfo = $row["DoctorInformation"];
        $doctorimage = $row["DoctorImage"]; 

        $doctor_data = $doctor_data.'<div class="services11">
        <div class="find-your-doctor-container">
          '.$doctorinfo.'
        </div>
        <div class="find-your-doctor2">'.$doctorname.'</div>
        <img class="search-fill0-wght400-grad0-ops-icon" alt="" src="'.$doctorimage.'" />
      </div>';
    }

    
}else {
    $data = '<div class="easy-steps-and">No Doctors found in your area</div>';
}

}else{
    $data = '<div class="easy-steps-and">Bad Query</div>';
}
$data = $data.$doctor_data;
echo $data;
?>