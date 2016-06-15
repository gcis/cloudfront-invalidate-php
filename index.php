<?php 

	require 'aws-autoloader.php';

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	};

	$caller = generateRandomString(16);

	$cloudFront = new Aws\CloudFront\CloudFrontClient([
	    'version'     => 'latest',
	    'region'      => 'us-east-1',
	    'credentials' => [
	        'key'    => '***ACCESS KEY***',
	        'secret' => '***SECRET KEY***'
	    ]
	]);

	$result = $cloudFront->createInvalidation([
	    'DistributionId' => 'distribution_id', // REQUIRED
	    'InvalidationBatch' => [ // REQUIRED
	        'CallerReference' => $caller, // REQUIRED
	        'Paths' => [ // REQUIRED
	            'Items' => ['/some-path', '/img/some-resource.jpg'], // items or paths to invalidate
	            'Quantity' => 2 // REQUIRED (must be equal to the number of 'Items' in the previus line)
	        ]
	    ]
	]);

	//echo $result; if you want to print the output of the request
?>