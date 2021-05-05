<?php

function getTable($table_name='') : string
{
    return (!empty($table_name)) ? $table_name : 'users';
}

function count_all($table_name='')
{
    global $connection, $last_query;

    $table_name = getTable($table_name);
    $query      = $last_query ="SELECT COUNT(*) AS count FROM ".escape_value($table_name);
    $result     = mysqli_query($connection, $query);

    confirm_query($result);
    return (int) fetch_result($result)[1]['count'];
}

function count_where($table_name='', $column='', $value='')
{
    global $connection, $last_query;

    $table_name = getTable($table_name);
    $query      = $last_query ="SELECT COUNT(*) AS count FROM ".escape_value($table_name)." WHERE {$column}='{$value}'";
    $result     = mysqli_query($connection, $query);

    confirm_query($result);
    return (int) fetch_result($result)[1]['count'];
}

function find_by_id($table_name='', $id="")
{
    global $connection, $last_query;

    $table_name = getTable($table_name);
    $query      = "SELECT * ";
    $query      .= "FROM ".escape_value($table_name);
    $query      .= " WHERE id=".escape_value($id);
    $query      .= " LIMIT 1";
    $last_query = $query;
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    $result_array = fetch_result($result);
    return $result_array[1];
}

function find_all($table_name='', $order="DESC")
{
    global $connection, $last_query;

    $table_name = getTable($table_name);
    $query      = $last_query ="SELECT * FROM ".escape_value($table_name)." ORDER BY id {$order}";
    $result     = mysqli_query($connection, $query);

    confirm_query($result);
    return fetch_result($result);
}

function find_where($table_name='', $column="", $value="")
{
    global $connection, $last_query;

    $table_name = getTable($table_name);
    $query      = "SELECT * FROM {$table_name} WHERE ";
    $query      .= escape_value($column)." = ";
    $query      .= "'".escape_value($value)."'";
    $last_query = $query;
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    return fetch_result($result);
}

function find_by_column($table_name='', $column="", $value="")
{
    global $connection, $last_query;

    $table_name = getTable($table_name);
    $query      = "SELECT * FROM {$table_name} WHERE ";
    $query      .= escape_value($column)." = ";
    $query      .= "'".escape_value($value)."' LIMIT 1";
    $last_query = $query;
    $result     = mysqli_query($connection, $query);
    confirm_query($result);
    return fetch_result($result);
}

function check_email($table_name='', $email="")
{
    $found_user = find_by_column($table_name, "email", $email);

    if (empty($found_user)) return FALSE;

    // FOUND USER, NOW PERFORM A CASE SENSITIVE CHECK
    $found_user = array_shift($found_user);
    if ($found_user['email'] !== $email) return FALSE;

    // FOUND USER
    return $found_user;
}

function user_auth($table_name='', $email='', $password='')
{
    $found_user = check_email($table_name, $email);

    if (empty($found_user)) return FALSE;

    // FOUND USER, NOW PERFORM A CASE SENSITIVE CHECK
    if ($found_user['password'] !== $password) return FALSE;

    // FOUND USER
    return $found_user;
}

function startSession()
{
    if (session_status() == PHP_SESSION_NONE):
        set_session();
    endif;
}

function set_session()
{
    // SETTING THE SESSION...
    $expire   = time() + 60*60*24*7; // 1 WEEK FROM NOW
    $path     = "/"; // '/path or dir that is using cookies';
    $domain   = null; // 'www.mysite.com';
    $secure   = null; //isset($_SERVER['HTTPS']);
    $httponly = true; // JavaScript can't access cookie
    session_set_cookie_params($expire, $path, $domain, $secure, $httponly);
    session_start();
}

function end_session()
{
    // FUNCTION TO FORCIBLY END THE SESSION
    // USE BOTH FOR COMPATIBILITY WITH ALL BROWSERS AND ALL VERSIONS OF PHP.
    session_unset(); session_destroy();
}

function login($user_id)
{
    if ($user_id) {
        session_regenerate_id();
        $_SESSION['user_id'] = $user_id;
    }
}

function auth()
{
    protected_page('login.php');

    $user = (object) find_by_id('admin', $_SESSION['user_id']);

    if (empty($user->name ?? ""))
    {
        logout();
        auth();
    }

    return $user;
}

function isUserLoggedIn()
{
    return isset($_SESSION['user_id']) ? TRUE : FALSE;
}

function protected_page($location="")
{
    // ACTION TO PREFORM BEFORE GIVING ACCESS TO ANY ACCESS-RESTRICTED PAGE.
    if (!isUserLoggedIn()) redirectTo($location);
}

function guest($location="")
{
    // ACTION TO PREFORM BEFORE GIVING ACCESS TO ANY NON-RESTRICTED PAGE.
    if (isUserLoggedIn()) redirectTo($location);
}

function logout()
{
    unset($_SESSION['user_id']);
    end_session();
}

function redirectTo($location)
{
    header("Location: {$location}");
    exit;
}

function format_price($price, $currency="&#8358;")
{
    $formated_price = $currency.number_format($price, 2, '.', ',');
    return strip_money($formated_price);
    // return $formated_price;
}

function strip_money($money)
{
    $length = strlen(trim($money));
    $money = substr($money,0,$length-3);
    return $money;
}

function public_path() : string
{
    return __DIR__."/../public";
}

function preventFileCaching($file='') : string
{
    $file       = "/".ltrim($file, "/");
    $filePath   = public_path().$file;
    if (!file_exists($filePath))
        return $file;

    $lastTimeModified = filemtime($filePath);
    return "{$file}?mod={$lastTimeModified}";
}

function asset($asset=NULL) : string
{
    // return ".".preventFileCaching($asset);
    return preventFileCaching($asset);
}

function isRequestType(string $requestType) : bool
{
    return ($_SERVER['REQUEST_METHOD'] ?? '') === strtoupper($requestType);
}

function getMessage(stdClass $result) : stdClass
{
    return (object) [
        "message"   => $result->message,
        "style"     => "{$result->status}_message"
    ];
}

function message(stdClass $message)
{
    if (isset($message->message) || !empty($message->message))
        echo "<p class='{$message->style}'>{$message->message}</p>";
}

function respond(string $message, $data, string $status="error")
{
    return (object) [
        'status'    => $status,
        'message'   => $message,
        'data'      => (object) $data
    ];
}

function datetimeToText(string $datetime, string $format="fulldate") : string
{
    $unixdatetime   = strtotime($datetime);
    $dateFormat     = "";
    switch (strtolower($format))
    {
        case 'fulldate':
            $dateFormat = "%d %B, %Y at %I:%M %p";
            break;
        case 'fulldates':
            $dateFormat = "%B %d, %Y at %I:%M %p";
            break;
        case 'fulldatesz':
            $dateFormat = "%d %B, %I:%M %p";
            break;
        case 'date':
            $dateFormat = "%m/%d/%Y";
            break;
        case 'mysql-date':
            $dateFormat = "%m-%d-%Y";
            break;
        case 'customd':
            $dateFormat = "%d %B. %Y";
            break;
        case 'customdate':
            $dateFormat = "%d %b. %Y";
            break;
        case 'customdated':
            $dateFormat = "%d %b %Y";
            break;
        case 'monthyear':
            $dateFormat = "%b. %Y";
            break;
        case 'time':
            $dateFormat = "%I:%M %p";
            break;
        case 'datetime':
            $dateFormat = "%m/%d/%Y %H:%M:%S %p";
            break;
        case 'datefm':
            $dateFormat = "%d/%m/%Y";
            break;
        case 'datefms':
            $dateFormat = "%d-%m-%Y";
            break;
        case 'datef':
            $dateFormat = "%d/%m/%Y %H:%M:%S %p";
            break;
        case 'mysql-datetime':
            $dateFormat = "%m-%d-%Y %H:%M:%S";
            break;
        case 'word-datetime':
            $dateFormat = "%a %d %b %I:%M %p";
            break;
        case 'word-date':
            $dateFormat = "%d %b %Y";
            break;
        case 'fullday':
            $dateFormat = "%A";
            break;
        case 'day':
            $dateFormat = "%a";
            break;
        default:
            $dateFormat = $format;
            break;
    }
    return strftime($dateFormat, $unixdatetime);
}

function getUserName(stdClass $user)
{
    return str_replace(' ', '', strtolower($user->name));
}

function getDateTime(stdClass $user, string $format="fulldate", string $field='created')
{
    return datetimeToText($user->{$field}, $format);
}

function getUsedDonation(stdClass $donation)
{
    return ($donation->used_by > 0) ? "Yes" : "No";
}

function getUsedDonationBy(stdClass $donation)
{
    if ($donation->used_by > 0):
        if (!$patient = find_by_column('patients', "id", $donation->used_by))
            return "...";
        return $patient[1]['name'];
    else:
        return "...";
    endif;
}

function generateSelect(array $array=[], string $select=NULL) : string
{
    $HTMLOutput = '';
    if (empty($array)) return '';
    array_walk($array, function($value, $key) use (&$HTMLOutput, $select)
    {
        $selected    = (strtoupper($select) == $key) ? " selected" : "";
        $HTMLOutput .= "<option value='{$key}'$selected>".ucwords($value)."</option>";
    });
    return $HTMLOutput;
}

function generateObjSelect(array $array=[], array $properties=[], array $selecteds=[], string $textStyle=NULL) : string
{
    $HTMLOutput = '';
    if (empty($array) || empty($properties)) return '';
    array_walk($array, function ($object, $key) use (&$HTMLOutput, $properties, $selecteds, $textStyle)
    {
        $selectValue    = $properties[0];
        $object         = (object) $object;
        $selectValue    = $object->$selectValue ?? "";
        $selected       = (in_array($selectValue, $selecteds)) ? " selected" : '';
        $selectText     = "";
        // Unset the select value so you can use the properties array dynamically to get the select text
        unset($properties[0]);
        foreach ($properties as $property):
            if (empty($selectText)):
                $selectText .= !empty($object->$property ?? "") ? "{$object->$property} " : "";
            endif;
        endforeach;
        $selectText = trim((empty($selectText)) ? "" : $selectText);
        $selectText = !empty($textStyle) ? $textStyle($selectText) : $selectText;
        $HTMLOutput .= "<option value='{$selectValue}'{$selected}>{$selectText}</option>";
    });
    return $HTMLOutput;
}
