<?php
require_once(LIB_PATH_INC . DS . "config.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class MySqli_DB
{

  private $con;
  public $query_id;

  function __construct()
  {
    $this->db_connect();
  }

  /*--------------------------------------------------------------*/
  /* Function for Open database connection
/*--------------------------------------------------------------*/
  public function db_connect()
  {
    try {
      $this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $this->con->query("SET time_zone = '-04:00'");
    } catch (mysqli_sql_exception $e) {
      $this->serviceUnavailable();
    }
  }
  /*--------------------------------------------------------------*/
  /* Function to handle database service unavailability
/*--------------------------------------------------------------*/
  private function serviceUnavailable()
  {
    http_response_code(503);
    header("Location: /503");
    exit;
  }
  /*--------------------------------------------------------------*/
  /* Function for Close database connection
/*--------------------------------------------------------------*/

  public function db_disconnect()
  {
    if (isset($this->con)) {
      mysqli_close($this->con);
      unset($this->con);
    }
  }
  /*--------------------------------------------------------------*/
  /* Function for mysqli query
/*--------------------------------------------------------------*/
  public function query($sql)
  {

    if (trim($sql != "")) {
      $this->query_id = $this->con->query($sql);
    }
    if (!$this->query_id)
      // only for Develope mode
      die("Error en esta consulta :<pre> " . $sql . "</pre>");
    // For production mode
    //  die("Error on Query");

    return $this->query_id;
  }

  /*--------------------------------------------------------------*/
  /* Function for Query Helper
/*--------------------------------------------------------------*/
  public function fetch_array($statement)
  {
    return mysqli_fetch_array($statement);
  }
  public function fetch_object($statement)
  {
    return mysqli_fetch_object($statement);
  }
  public function fetch_assoc($statement)
  {
    return mysqli_fetch_assoc($statement);
  }
  public function num_rows($statement)
  {
    return mysqli_num_rows($statement);
  }
  public function insert_id()
  {
    return mysqli_insert_id($this->con);
  }
  public function affected_rows()
  {
    return mysqli_affected_rows($this->con);
  }
  /*--------------------------------------------------------------*/
  /* Function for Remove escapes special
 /* characters in a string for use in an SQL statement
 /*--------------------------------------------------------------*/
  public function escape($str)
  {
    return $this->con->real_escape_string($str ?? '');
  }
  /*--------------------------------------------------------------*/
  /* Function for while loop
/*--------------------------------------------------------------*/
  public function while_loop($loop)
  {
    global $db;
    $results = array();
    while ($result = $this->fetch_array($loop)) {
      $results[] = $result;
    }
    return $results;
  }
}

$db = new MySqli_DB();
