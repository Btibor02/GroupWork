<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;


class ServiceController extends Controller
{
    public $selectedServicesArray = array();

    public function get() {
        $selectedServicesArray = [];
        $services = Service::all();
        return view('services', ['services' => $services, 'selectedServices' => $selectedServicesArray]);
    }

    public function getService(Request $request) {
        $services = Service::all();
        $selectedServicesArray = array();

        foreach ($services as $service) {
            if ($request->name == $service->name) {
                $servicePrice = $service->price;
            }
        }

        //$selectedServicesArray = Arr::add([$request->name => $servicePrice], 'price', );
        Cache::put('selectedServiceCache', $request->name, 300);

        $cachedServices = Cache::get('selectedServiceCache');

        if (is_array($cachedServices->getallheaders)) {
            foreach ($cachedServices as $key) {
                array_push($selectedServicesArray, $key);
                echo "<script>console. log('this is a Variable: " . $key . "' );</script>";
            }
        } else {
            array_push($selectedServicesArray, $cachedServices);
            echo "<script>console. log('this is a Variable: " . $cachedServices . "' );</script>";
        }



        return view('services', ['services' => $services, 'selectedServices' => $selectedServicesArray]);
        //return back()->with('services', ['services' => $services, 'selectedServices' => $selectedServicesArray]);
    }

    public function postSelectedServices() {
        $name = $_POST['name'];
        $price = $_POST['price'];

        return back();
    }
}
