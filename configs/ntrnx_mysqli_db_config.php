<?php

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_db_config */
class ntrnx_mysqli_db_config {

    const DB_HOST = "localhost";                /* server */
    const DB_USER = "ntrnx_mysqli_class_test";  /* user */
    const DB_PASS = "1234567890";               /* passwd */
    const DB_NAME = "ntrnx_mysqli_class_test";  /* db name */
    const DB_PORT = NULL;                       /* 3306 is used as standard */
    const DB_SOCKET = NULL;
    const DB_FLAGS = MYSQLI_CLIENT_SSL;         /* always use ssl */

    /* paths to ssl key set */
    const DB_KEY = "D:\Developer\Server\SAMP64\data\certs\server-key.pem";
    const DB_CERT = "D:\Developer\Server\SAMP64\data\certs\server-cert.pem";
    const DB_CA = "D:\Developer\Server\SAMP64\data\certs\ca.pem";
    const DB_CAPATH = "D:\Developer\Server\SAMP64\data\certs";
    const DB_CIPHER = NULL;

} /* end of class ntrnx_mysqli_db_config */

?>