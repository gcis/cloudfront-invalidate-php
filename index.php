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
	    'DistributionId' => 'E18R9WQP57CVQ6', // REQUIRED
	    'InvalidationBatch' => [ // REQUIRED
	        'CallerReference' => $caller, // REQUIRED
	        'Paths' => [ // REQUIRED
	            'Items' => ['/'],
	            'Quantity' => 1 // REQUIRED
	        ]
	    ]
	]);

	echo $result;
?>