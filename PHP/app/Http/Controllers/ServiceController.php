<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;



class ServiceController extends Controller
{
    public $selectedServicesArray = array();

    public function postSelectedServices($name, $price) {
        global $selectedServicesArray;

        echo "<script>console. log('Array: " . $selectedServicesArray . "' );</script>";
        $selectedServicesArray[$name] = $price;
        echo "<script>console. log('Array2: " . implode($selectedServicesArray) . "' );</script>";
        return $selectedServicesArray;
    }

    public function get() {
        $services = Service::all();
        return view('services', ['services' => $services, 'selectedServices' => $this->selectedServicesArray]);
    }

    public function getService(Request $request) {
        $services = Service::all();
        $selectedServicesArray = $request->input('serviceName');

        if(isset($selectedServicesArray)) {
            if (is_array($selectedServicesArray)) {
                foreach ($request->input('serviceName') as $requests) {
                    echo "<script>console. log('Request: " . $requests . "' );</script>";
                }
            } else {
                echo "<script>console. log('Request: " . $selectedServicesArray . "' );</script>";
            }
        }









        //foreach ($services as $service) {
            //if ($request->name == $service->name) {
                //$servicePrice = $service->price;
            //}
        //}

        //$this->postSelectedServices($request->name, $servicePrice);
        //echo "<script>console. log('Request: " . $request->name . "' );</script>";
        //foreach (array_keys($this->selectedServicesArray) as $key) {
            //echo "<script>console. log('Array: " . $key . "' );</script>";

        //}


        //Cache::put('selectedServiceCache', $this->selectedServicesArray, 300);

        // $cachedServices = Cache::get('selectedServiceCache');
        // $typeOfCache = gettype(Cache::has('selectedServiceCache')) ;

        // if (is_array($typeOfCache)) {
        //     foreach ($cachedServices as $key) {
        //         array_push($selectedServicesArray, $key);
        //         echo "<script>console. log('this is a Variable: " . $key . "' );</script>";
        //     }
        // } else {
        //     array_push($selectedServicesArray, $cachedServices);
        //     echo "<script>console. log('Az else fut le: " . $cachedServices . "' );</script>";
        // }



        return view('services', ['services' => $services, 'selectedServices' => $this->selectedServicesArray]);
        //return back()->with('services', ['services' => $services, 'selectedServices' => $selectedServicesArray]);
    }


}
