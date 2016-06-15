#Simple cache invalidator for AWS cloudfront in php
####Requires php SDK
Download and unzip (in the same forlder) the AWS sdk at the URL http://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.zip. If the **aws-autoloader.php** is in another folder you must specify the complete path at line 3.

To test the script follow the next simple steps:

- insert your AWS credentials at lines 21 and 22
- insert you cloudfront distribution ID at line 27
- modify items and quantity at the lines 31 and 32

###WARNING: hard-coding credentials is not a good practice.
####In this case I used hard-coded credentials just to semplify the exaple
You can find further documentation at http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/credentials.html



