<?php

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_db_config */
class ntrnx_mysqli_db_config {

    const DB_HOST = "";                     /* server */
    const DB_USER = "";                     /* user */
    const DB_PASS = "";                     /* passwd */
    const DB_NAME = "";                     /* db name */
    const DB_PORT = NULL;                   /* 3306 is used as standard */
    const DB_SOCKET = NULL;
    const DB_FLAGS = MYSQLI_CLIENT_SSL;     /* always use ssl */

    /* paths to ssl key set */
    const DB_KEY = "";
    const DB_CERT = "";
    const DB_CA = "";
    const DB_CAPATH = NULL;
    const DB_CIPHER = NULL;    

} /* end of class ntrnx_mysqli_db_config */

?>