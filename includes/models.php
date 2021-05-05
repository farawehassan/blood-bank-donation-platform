<?php

require_once 'database.php';
require_once 'functions.php';

startSession();

function save_donor()
{
    global $connection, $last_query;

    $name           = escape_value($_POST['name']            ?? "");
    $email          = escape_value($_POST['email']           ?? "");
    $phone_number   = escape_value($_POST['phone_number']    ?? "");
    $address        = escape_value($_POST['address']         ?? "");
    $patient_wish   = escape_value($_POST['patient_wish']    ?? "");
    $validated      = "no";
    $created        = date("Y-m-d H:i:s");

    if (
        empty($name) ||
        empty($email) ||
        empty($phone_number) ||
        empty($address) ||
        empty($patient_wish)
    )
        return respond("All fields are required!", []);

    $query      = $last_query = "INSERT INTO donors (
                    name, email, phone_number, address, patient_wish, validated, created
                ) VALUES (
                    '$name', '$email', '$phone_number', '$address', '$patient_wish', '$validated', '$created'
                )";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $data = [
        'name'          => $name,
        'email'         => $email,
        'phone_number'  => $phone_number,
        'address'       => $address,
        'patient_wish'  => $patient_wish,
        'validated'     => $validated,
        'created'       => $created
    ];
    return respond("Your request has been sent successfully. Thank you!", $data, "success");
}

function contact_us()
{
    global $connection, $last_query;

    $name       = escape_value($_POST['name']       ?? "");
    $email      = escape_value($_POST['email']      ?? "");
    $subject    = escape_value($_POST['subject']    ?? "");
    $message    = escape_value($_POST['message']    ?? "");
    $created    = date("Y-m-d H:i:s");

    if (
        empty($name) ||
        empty($email) ||
        empty($subject) ||
        empty($message)
    )
        return respond("All fields are required!", []);

    $query      = $last_query = "INSERT INTO messages (
                    name, email, subject, message, created
                ) VALUES (
                    '$name', '$email', '$subject', '$message', '$created'
                )";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $data = [
        'name'      => $name,
        'email'     => $email,
        'subject'   => $subject,
        'message'   => $message,
        'created'   => $created
    ];
    return respond("Your message has been sent successfully. Thank you!", $data, "success");
}

function register_user()
{
    global $connection, $last_query;

    $name           = escape_value($_POST['name']       ?? "");
    $email          = escape_value($_POST['email']      ?? "");
    $password       = escape_value($_POST['password']   ?? "");
    $last_updated   = date("Y-m-d H:i:s");
    $last_login     = date("Y-m-d H:i:s");
    $created        = date("Y-m-d H:i:s");

    if (
        empty($name) ||
        empty($email) ||
        empty($password)
    )
        return respond("All fields are required!", []);

    if ($result = check_email("admin", $email))
        return respond("Email exists: {$email}", []);

    $query      = $last_query = "INSERT INTO admin (
                    name, email, password, last_updated, last_login, created
                ) VALUES (
                    '$name', '$email', '$password', '$last_updated', '$last_login', '$created'
                )";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $data = [
        'name'          => $name,
        'email'         => $email,
        'password'      => $password,
        'last_updated'  => $last_updated,
        'last_login'    => $last_login,
        'created'       => $created
    ];
    return respond("{$name} your account has been created successfully. Thank you!", $data, "success");
}

function authenticate_user()
{
    global $connection, $last_query;

    $email          = escape_value($_POST['email']      ?? "");
    $password       = escape_value($_POST['password']   ?? "");
    $last_login     = date("Y-m-d H:i:s");

    if (
        empty($email) ||
        empty($password)
    )
        return respond("All fields are required!", []);

    if (!$result = check_email("admin", $email))
        return respond("Email does not exist: {$email}", []);

    if ($result['password'] != $password)
        return respond("Incorrect password!", []);

    login($result['id']);
    return respond("{$result['name']} Logged in successfully!", $result, 'success');
}

function change_donor_status()
{
    global $connection, $last_query;

    $id     = (int) escape_value($_GET['id']    ?? "");
    $status = escape_value($_GET['status']      ?? "");

    if (
        empty($id) ||
        empty($status)
    )
        return respond("All fields are required!", []);

    if (!$donor = find_by_id("donors", $id))
        return respond("Invalid donor!", []);

    $status     = ($status == "no") ? "no" : "yes";
    $query      = $last_query = "UPDATE donors SET validated = '{$status}' WHERE id ={$id}";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    return respond("Donor's status has been updated!", $donor, "success");
}

function save_patient()
{
    global $connection, $last_query;

    $name           = escape_value($_POST['name']           ?? "");
    $email          = escape_value($_POST['email']          ?? "");
    $phone_number   = escape_value($_POST['phone_number']   ?? "");
    $blood_group    = escape_value($_POST['blood_group']    ?? "");
    $blood_type     = escape_value($_POST['blood_type']     ?? "");
    $genotype       = escape_value($_POST['genotype']       ?? "");
    $created        = date("Y-m-d H:i:s");

    if (
        empty($name) ||
        empty($email) ||
        empty($phone_number) ||
        empty($blood_group) ||
        empty($blood_type) ||
        empty($genotype)
    )
        return respond("All fields are required!", []);

    $genotypes      = ['AA', 'AO', 'BB', 'BO', 'AB', 'OO'];
    $blood_groups   = ['A', 'B', 'AB', 'O'];
    $blood_types    = ['positive', 'negative'];
    if (!in_array($genotype, $genotypes))
        return respond("Invalid genotype!", []);
    if (!in_array($blood_group, $blood_groups))
        return respond("Invalid blood group!", []);
    if (!in_array($blood_type, $blood_types))
        return respond("Invalid blood type!", []);

    if ($result = check_email("patients", $email))
        return respond("Email exists: {$email}", []);

    $query      = $last_query = "INSERT INTO patients (
                    name, email, phone_number, blood_group, blood_type, genotype, created
                ) VALUES (
                    '$name', '$email', '$phone_number', '$blood_group', '$blood_type', '$genotype', '$created'
                )";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $data = [
        'name'          => $name,
        'email'         => $email,
        'phone_number'  => $phone_number,
        'blood_group'   => $blood_group,
        'blood_type'    => $blood_type,
        'genotype'      => $genotype,
        'created'       => $created
    ];
    return respond("{$name} has been added successfully as a new patient.", $data, "success");
}

function donate_blood()
{
    global $connection, $last_query;

    $donor_id       = (int) escape_value($_POST['donor_id'] ?? "");
    $volume         = escape_value($_POST['volume']         ?? "");
    $blood_group    = escape_value($_POST['blood_group']    ?? "");
    $blood_type     = escape_value($_POST['blood_type']     ?? "");
    $genotype       = escape_value($_POST['genotype']       ?? "");
    $used           = 0;
    $created        = date("Y-m-d H:i:s");

    if (
        empty($donor_id) ||
        empty($volume) ||
        empty($blood_group) ||
        empty($blood_type) ||
        empty($genotype)
    )
        return respond("All fields are required!", []);

    $genotypes      = ['AA', 'AO', 'BB', 'BO', 'AB', 'OO'];
    $blood_groups   = ['A', 'B', 'AB', 'O'];
    $blood_types    = ['positive', 'negative'];
    if (!in_array($genotype, $genotypes))
        return respond("Invalid genotype!", []);
    if (!in_array($blood_group, $blood_groups))
        return respond("Invalid blood group!", []);
    if (!in_array($blood_type, $blood_types))
        return respond("Invalid blood type!", []);
    if (!$donor = find_by_column('donors', "id", $donor_id))
        return respond("Invalid donor!", []);

    $query      = $last_query = "INSERT INTO donations (
                    donor_id, volume, blood_group, blood_type, genotype, used_by, created
                ) VALUES (
                    '$donor_id', '$volume', '$blood_group', '$blood_type', '$genotype', '$used', '$created'
                )";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $data = [
        'donor_id'      => $donor_id,
        'volume'        => $volume,
        'used'          => $used,
        'blood_group'   => $blood_group,
        'blood_type'    => $blood_type,
        'genotype'      => $genotype,
        'created'       => $created
    ];
    return respond("Donation has been added successfully.", $data, "success");
}

function find_match()
{
    global $connection, $last_query;

    $patient_id = (int) escape_value($_GET['id'] ?? "");
    if (!$patient = find_by_column('patients', "id", $patient_id))
        return respond("Invalid patient!", []);

    $patient    = (object) $patient[1];
    $query      = $last_query = "SELECT * FROM donations WHERE blood_group='{$patient->blood_group}' AND blood_type='{$patient->blood_type}' AND genotype='{$patient->genotype}' AND used_by < 1 LIMIT 1";
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $matches    = fetch_result($result);

    if (empty($matches))
        return respond("No match found, try later!", []);

    $match = (object) $matches[1];
    redirectTo("found_match.php?donation={$match->id}&patient={$patient_id}");
}
