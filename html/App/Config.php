<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 8.1
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'library';
    //const DB_NAME = 'blog';
    /**
     * Database user
     * @var string
     */
    const DB_USER = 'innoraft';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'Innoraft@123';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = True;

        /**
     * The SMTP host for sending emails.
     *
     * @var string
     */
    const SMTP_HOST = 'smtp.gmail.com';
    /**
     * The SMTP port for sending emails.
     *
     * @var int
     */
    const SMTP_PORT = 465;
    /**
     * The SMTP username for authentication.
     *
     * @var string
     */
    const SMTP_USERNAME = 'Your-Mail';
    /**
     * The SMTP password for authentication.
     *
     * @var string
     */
    const SMTP_PASSWORD = 'Your-SMTP-Password';
    /**
     * The SMTP encryption method.
     *
     * @var string
     */
    const SMTP_ENCRYPTION = 'ssl';
    /**
     * The SMTP  method.
     *
     * @var string
     */
    const SMTP_FROM_EMAIL = 'your-sender@your-domain.com';
}
?>
