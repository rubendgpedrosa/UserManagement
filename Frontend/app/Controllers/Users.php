<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Users extends Controller {
    /**
     * Index Page for this controller.
     *
     */

     
    public function index()
	{
        // Define the url endpoint
		$api_url = "http://localhost:8000/api/users";

		// Initialize the cURL session with the defined url
		$client = curl_init($api_url);

        // Set the url and the client
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        // Make the get request and save the response.
        $response = curl_exec($client);
        
        // Close the cURL session
        curl_close($client);

        $data['users'] = json_decode($response);

		return view('landing_page', $data);	
	}

    public function user_profile( $user_id = NULL ){
        // Define the url endpoint
        $api_url = "http://localhost:8000/api/user/".$user_id;

        // Initialize the cURL session with the defined url
		$client = curl_init($api_url);

        // Set the url and the client
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        // Make the get request and save the response.
		$response = curl_exec($client);
        
        // Close the cURL session
        curl_close($client);
        
        // Convert data from JSON to an Array
        $data = json_decode($response, true);

        // We use the user id as the key value in the Array
        $newData['user'] = $data[$user_id];

        return view('user_profile', $newData);
    }
    
    public function add_user(){
		return view('add_user');
    }
    
    public function create_user(){
        // Define the url endpoint and data
        $url = 'http://localhost:8000/api/users';
        $postdata = json_encode($_POST);

        // Initialize the cURL client with the options needed
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // Get the result (row inserted)
        $result = curl_exec($ch);

        // Close the client
        curl_close($ch);

        return redirect()->to('/users');
    }
    
    public function update_user( $user_id = NULL ){
        // Define the url endpoint and data
        $url = 'http://localhost:8000/api/user/'.$user_id;

        $newData = $_POST;
        $newData['id'] = $user_id;

        $patchdata = json_encode($newData);

        // Initialize the cURL client with the options needed
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT" ); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $patchdata);
        $response = curl_exec($ch);

        // Get the result (row inserted)
        $result = curl_exec($ch);

        // Close the client
        curl_close($ch);
        //return view('user_profile', $result);
        return redirect()->to('/users/'.$user_id);
    }
    
    public function delete_user( $user_id = NULL){

        // Set the endpoint with the user id to be deleted
        $url = "http://localhost:8000/api/user/".$user_id;

        // Start cURL client
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        $result = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

		return redirect()->to('/'); 
	}
}