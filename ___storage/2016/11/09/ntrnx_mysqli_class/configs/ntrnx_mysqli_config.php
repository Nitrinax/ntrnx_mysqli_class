<?php

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_config */
class ntrnx_mysqli_config {

    const DB_HOST = 'localhost';
    const DB_USER = 'ntrnx_mysqli';
    const DB_PASS = 'ntrnx_mysqli';
    const DB_NAME = 'ntrnx_mysqli';
    const DB_PORT = NULL;                   /* 3306 is used as standard */
    const DB_SOCKET = NULL;
    const DB_FLAGS = MYSQLI_CLIENT_SSL;

    const DB_KEY = 'D:\SAMP64\data\certs\server-key.pem';
    const DB_CERT = 'D:\SAMP64\data\certs\server-cert.pem';
    const DB_CA = 'D:\SAMP64\data\certs\ca.pem';

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */

	/* class destructor */
	function __destruct () {
	} /* end of class destructor */

} /* end of class ntrnx_mysqli_config */

?>