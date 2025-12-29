<?php
$errors = array();

/*--------------------------------------------------------------*/
/* Function for Remove escapes special
 /* characters in a string for use in an SQL statement
 /*--------------------------------------------------------------*/
function real_escape($str)
{
  global $con;
  $escape = mysqli_real_escape_string($con, $str);
  return $escape;
}
/*--------------------------------------------------------------*/
/* Function for Remove html characters
/*--------------------------------------------------------------*/
function remove_junk($str)
{
  $str = nl2br($str ?? '');
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}
/*--------------------------------------------------------------*/
/* Function for Uppercase first character
/*--------------------------------------------------------------*/
function first_character($str)
{
  $val = str_replace('-', " ", $str);
  $val = ucfirst($val);
  return $val;
}
/*--------------------------------------------------------------*/
/* Function for Checking input fields not empty
/*--------------------------------------------------------------*/
function validate_fields($var)
{
  global $errors;
  foreach ($var as $field) {
    $val = remove_junk($_POST[$field]);
    if (isset($val) && $val == '') {
      $errors = $field . " No puede estar en blanco.";
      return $errors;
    }
  }
}
/*--------------------------------------------------------------*/
/* Function for Display Session Message
   Ex echo displayt_msg($message);
/*--------------------------------------------------------------*/
function display_msg($msg = array())
{
  $output = "";
  if (!empty($msg)) {
    foreach ($msg as $key => $value) {
      $output .= "<div class=\"px-4 pb-3 pt-4 sm:px-6 max-w-md w-full my-4 ml-4\">";
      $output .= "<div class=\"rounded-xl border border-{$key}-500 bg-{$key}-50 p-4 dark:border-{$key}-500/30 dark:bg-{$key}-500/15\">";
      $output .= "  <div class=\"flex items-start gap-3\">";
      $output .= "      <div class=\"-mt-0.5 text-{$key}-500\"></div>";
      $output .= "      <div>";
      $output .= "          <h4 class=\"mb-1 text-sm font-semibold text-gray-800 dark:text-white/90\">";
      $output .= remove_junk(first_character($value));
      $output .= "          </h4>";
      $output .= "      </div>";
      $output .= "  </div>";
      $output .= "</div>";
      $output .= "</div>";
    }
  }
  return $output;
}
/*--------------------------------------------------------------*/
/* Function for redirect
/*--------------------------------------------------------------*/
function redirect($url, $permanent = false)
{
  if (!headers_sent()) {
    header('Location: ' . $url, true, ($permanent ? 301 : 302));
    exit();
  } else {
    echo '<script type="text/javascript">';
    echo 'window.location.href="' . $url . '";';
    echo '</script>';
    exit();
  }
}
/*--------------------------------------------------------------*/
/* Function for Readable date time
/*--------------------------------------------------------------*/
function read_date($str)
{
  if ($str)
    return date('d/m/Y g:i:s a', strtotime($str));
  else
    return null;
}
/*--------------------------------------------------------------*/
/* Function for  Readable Make date time
/*--------------------------------------------------------------*/
function make_date()
{
  return (new DateTime())->format("Y-m-d H:i:s");
}
/*--------------------------------------------------------------*/
/* Function for  Readable date time
/*--------------------------------------------------------------*/
function count_id()
{
  static $count = 1;
  return $count++;
}
/*--------------------------------------------------------------*/
/* Format datetime for notifications (time ago)
/*--------------------------------------------------------------*/
function timeAgo($datetime)
{
  $time = strtotime($datetime);
  $now = time();
  $diff = $now - $time;

  if ($diff < 60) {
    return 'hace ' . $diff . ' segundos';
  } elseif ($diff < 3600) {
    return 'hace ' . floor($diff / 60) . ' minutos';
  } elseif ($diff < 86400) {
    return 'hace ' . floor($diff / 3600) . ' horas';
  } elseif ($diff < 604800) {
    return 'hace ' . floor($diff / 86400) . ' dias';
  } else {
    return date('M d, Y', $time);
  }
}
/*--------------------------------------------------------------*/
/* Generate a new receipt number
  /* Format: REC-YYYYMMDD-00
  /* The counter resets every day
  /* Checks the invoices table for the last receipt of the day
  /* Returns a unique, readable receipt number for insertion
/*--------------------------------------------------------------*/
function get_receipt_no()
{
  global $db;

  $date = date("Y-m-d");
  $dateNum = date("Ymd");

  $sql = "SELECT receipt_no FROM invoices WHERE invoice_date = '{$date}' ORDER BY id DESC LIMIT 1";
  $result = find_by_sql($sql);

  if ($result && count($result) > 0) {
    $last_no = $result[0]['receipt_no'];
    $counter = intval(explode("-", $last_no)[2]) + 1;
  } else {
    $counter = 1;
  }

  return "REC-{$dateNum}-" . str_pad($counter, 2, "0", STR_PAD_LEFT);
}
