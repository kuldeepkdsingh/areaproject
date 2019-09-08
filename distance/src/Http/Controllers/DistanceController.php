<?php
    
    namespace ann\distance\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    

    class DistanceController extends Controller {

        public function index($userData = [], $distance = 100, $lat1 = '', $lon1 = '', $unit = 'km')
        {
            //Dublin lat lon
            $lon1 = -6.257664;
            $lat1 = 53.339428;
            
            // path of folder
            $path = storage_path() . '/json/Customers _Assignment_Coding Challenge.txt';

            $fileData = file_get_contents($path);
            
            $fileData = str_replace("\r\n", ',', $fileData);
            $fileData = '['. $fileData .']';
            $userData = json_decode($fileData, true);
            
            if(!empty($userData)){
                foreach($userData as $key=>$userDetails){

                    $distanceValueinKM = $this->distance($lat1, $lon1, $userDetails['latitude'], $userDetails['longitude'],'K');

                    if($distanceValueinKM > $distance){
                        unset($userData[$key]);
                    }else{
                        $userData[$key]['distance'] = round($distanceValueinKM, 2);
                    }
                }

                $userID = array_column($userData, 'user_id');

                array_multisort($userID, SORT_ASC, $userData);
            }
            return view('nearestUser::nearestUser', compact('userData','unit'));
        }

        function distance($lat1, $lon1, $lat2, $lon2, $unit) {
            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
              return 0;
            }
            else {
              $theta = $lon1 - $lon2;
              $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
              $dist = acos($dist);
              $dist = rad2deg($dist);
              $miles = $dist * 60 * 1.1515;
              $unit = strtoupper($unit);
          
              if (strtolower($unit) == "km") {
                return ($miles * 1.609344);
              } else {
                return $miles;
              }
            }
        }

        
    }