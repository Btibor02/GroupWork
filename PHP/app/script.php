<php?
    $serviceArray = $_POST["selectedServicesArray"];
    $selectedService = $_POST["selectedService"];

    $servicesArray[] = $selectedService;
    echo $servicesArray;

?>
