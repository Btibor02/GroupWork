<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;



class ServiceController extends Controller
{
    public function get() {
        Cache::forever('services', Service::all());
        $services = Cache::get('services');
        $selectedServicesArray = array();

        $totalPrice = (Cache::has('totalPriceCache') ? Cache::get('totalPriceCache') : 0);
        return view('services', ['services' => $services, 'selectedServices' => $selectedServicesArray, 'totalPrice' => $totalPrice]);
    }

    public function getService(Request $request) {
        $totalPrice = 0;
        $outputArray = array();
        $services = Cache::get('services');
        $selectedServicesArray = $request->input('serviceName');
        $cache = Cache::get('selectedServiceCache');

        $startTime = microtime(true);
        if ($cache == $selectedServicesArray) {
            foreach ($selectedServicesArray as $selectedService) {
                array_push($outputArray, $selectedService); 
            }
            $totalPrice = Cache::get('totalPriceCache', 0);
            $endTime = microtime(true);
            $runtime = $endTime - $startTime;
            echo "<script>console. log('With cache: " . $runtime . "' );</script>";
        } else {

            if (isset($_POST['slowVersion'])) {
                sleep(5);
            }

            if(isset($selectedServicesArray)) {
                if (is_array($selectedServicesArray)) {
                    foreach ($selectedServicesArray as $selectedService) {
                        foreach ($services as $service) {
                            if ($selectedService == $service->name) {
                                array_push($outputArray, $selectedService); 
                                $totalPrice += $service->price;
                            }
                        }
                    }
                } else {
                    foreach ($services as $service) {
                        if ($selectedService == $service->name) {
                            array_push($outputArray, $selectedService); 
                            $totalPrice = $service->price;
                        }
                    }
                }
                Cache::put('selectedServiceCache', $outputArray, 300);
                Cache::put('totalPriceCache', $totalPrice, 300);
                $endTime = microtime(true);
                $runtime = $endTime - $startTime;
                echo "<script>console. log('Without cache: " . $runtime . "' );</script>";
            }
        }

        return view('services', ['services' => $services, 'selectedServices' => $outputArray, 'totalPrice' => $totalPrice]);
    }


}
