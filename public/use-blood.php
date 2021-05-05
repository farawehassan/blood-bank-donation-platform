<?php

require_once '../includes/models.php';

if (isRequestType('GET'))
{
    $donation_id = ($_GET['donation'] ?? 0);
    if (empty($donation_id) || $donation_id < 1)
        redirectTo("patients.php");

    $patient_id = ($_GET['patient'] ?? 0);
    if (empty($patient_id) || $patient_id < 1)
        redirectTo("patients.php");

    if (!$patient = find_by_column('patients', "id", $patient_id))
        redirectTo("patients.php?message=Invalid Patient!");

    if (!$donation = find_by_column('donations', "id", $donation_id))
        redirectTo("patients.php?message=Invalid donation!");

    $query      = $last_query = "UPDATE donations SET used_by = '{$patient_id}' WHERE id ={$donation_id}";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    redirectTo("patients.php?message=Blood donation has now been used!");
}
