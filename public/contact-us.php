<?php

require_once '../includes/models.php';

if (isRequestType('POST'))
{
    print json_encode(contact_us());
    exit;
}
