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
        Cache::forever('services', Service::all());
        $services = Cache::get('services');

        $totalPrice = (Cache::has('totalPriceCache') ? Cache::get('totalPriceCache') : 0);
        return view('services', ['services' => $services, 'selectedServices' => $this->selectedServicesArray, 'totalPrice' => $totalPrice]);
    }

    public function getService(Request $request) {
        $totalPrice = 0;
        $services = Cache::get('services');
        $selectedServicesArray = $request->input('serviceName');
        $cache = Cache::get('selectedServiceCache');

        $startTime = microtime(true);
        if ($cache == $selectedServicesArray) {
            foreach ($selectedServicesArray as $selectedService) {
                foreach ($services as $service) {
                    if ($selectedService == $service->name) {
                        $outputArray[$selectedService] = $service->price;
                    }
                }
            }
            $totalPrice = Cache::get('totalPriceCache', 0);
            $endTime = microtime(true);
            $runtime = $endTime - $startTime;
            echo "<script>console. log('With cache: " . $runtime . "' );</script>";
        } else {
            if(isset($selectedServicesArray)) {
                if (is_array($selectedServicesArray)) {
                    foreach ($selectedServicesArray as $selectedService) {
                        foreach ($services as $service) {
                            if ($selectedService == $service->name) {
                                $outputArray[$selectedService] = $service->price;
                                $totalPrice += $service->price;
                            }
                        }
                    }
                } else {
                    foreach ($services as $service) {
                        if ($selectedService == $service->name) {
                            $outputArray[$selectedService] = $service->price;
                            $totalPrice = $service->price;
                        }
                    }
                }
                Cache::put('selectedServiceCache', array_keys($outputArray), 300);
                Cache::put('totalPriceCache', $totalPrice, 300);
                $endTime = microtime(true);
                $runtime = $endTime - $startTime;
                echo "<script>console. log('Without cache: " . $runtime . "' );</script>";
            } else {
                $outputArray = array();
            }
        }

        echo "<script>console. log('Output: " . implode($outputArray) . "' );</script>";
        return view('services', ['services' => $services, 'selectedServices' => $outputArray, 'totalPrice' => $totalPrice]);
    }


}
