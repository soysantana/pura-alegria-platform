<?php
require_once('load.php');

/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
  return $result_set;
}
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table)
{
  global $db;
  if (tableExists($table)) {
    return find_by_sql("SELECT * FROM " . $db->escape($table));
  }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id and join
/*--------------------------------------------------------------*/
function find_by_id_join($table, $id, $joins = '', $fields = '*', $id_field = 'id')
{
  global $db;
  if (!tableExists($table)) {
    return null;
  }
  $table_escaped = $db->escape($table);
  $id_escaped = $db->escape($id);
  $id_field_escaped = $db->escape($id_field);
  $sql_str = "SELECT {$fields} FROM {$table_escaped} {$joins} WHERE {$table_escaped}.{$id_field_escaped} = '{$id_escaped}' LIMIT 1";
  $result = $db->query($sql_str);
  if ($result) {
    return $db->fetch_assoc($result);
  }
  return null;
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $table = $db->escape($table);
    $id = $db->escape($id);
    $sql = "DELETE FROM {$table} WHERE id = '{$id}' LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
  return false;
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id_v2($table, $id, $column)
{
  global $db;
  if (tableExists($table)) {
    $table = $db->escape($table);
    $id = $db->escape($id);
    $column = $db->escape($column);
    $sql = "DELETE FROM {$table} WHERE {$column} = '{$id}'";
    $db->query($sql);
    return ($db->affected_rows() > 0) ? true : false;
  }
  return false;
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(id) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table)
{
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE "' . $db->escape($table) . '"');
  if ($table_exit) {
    if ($db->num_rows($table_exit) > 0)
      return true;
    else
      return false;
  }
}
/*--------------------------------------------------------------*/
/* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
function authenticate($username = '', $password = '')
{
  global $db;
  $username = $db->escape($username);
  $sql  = sprintf("SELECT id, username, password, user_level FROM users WHERE username = '%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
      return (int)$user['id'];
    }
  }
  return false;
}
/*--------------------------------------------------------------*/
/* Find current log in user by session id
  /*--------------------------------------------------------------*/
function current_user()
{
  static $current_user;
  global $db;
  if (!$current_user) {
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      $joins = "LEFT JOIN user_groups ug ON users.user_level = ug.group_level";
      $fields = "users.*, ug.group_name";
      $current_user = find_by_id_join('users', $user_id, $joins, $fields);
    }
  }
  return $current_user;
}
/*--------------------------------------------------------------*/
/* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
function find_all_user()
{
  global $db;
  $results = array();
  $sql = "SELECT u.id,u.first_name,u.username,u.picture,u.user_level,u.status,u.last_login,";
  $sql .= "g.group_name ";
  $sql .= "FROM users u ";
  $sql .= "LEFT JOIN user_groups g ";
  $sql .= "ON g.group_level=u.user_level ORDER BY u.first_name ASC";
  $result = find_by_sql($sql);
  return $result;
}
/*--------------------------------------------------------------*/
/* Find all tutors by
 /* joining users table and user groups table
 /*--------------------------------------------------------------*/
function find_all_tutor()
{
  global $db;
  $sql  = "SELECT u.id, u.first_name, u.last_name, u.user_level,";
  $sql .= "g.group_name ";
  $sql .= "FROM users u ";
  $sql .= "LEFT JOIN user_groups g ON g.group_level = u.user_level ";
  $sql .= "WHERE g.group_name = 'Tutor' ";
  $sql .= "ORDER BY u.first_name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_infants()
{
  global $db;
  $sql = "SELECT id, first_name, last_name, tutor_id ";
  $sql .= "FROM infants ";
  $sql .= "ORDER BY first_name ASC";
  $result = find_by_sql($sql);
  return $result;
}

/*--------------------------------------------------------------*/
/* Find all caregivers by
 /* joining users table and user groups table
 /*--------------------------------------------------------------*/
function find_all_caregiver()
{
  global $db;
  $sql  = "SELECT u.id, u.first_name, u.user_level,";
  $sql .= "g.group_name ";
  $sql .= "FROM users u ";
  $sql .= "LEFT JOIN user_groups g ON g.group_level = u.user_level ";
  $sql .= "WHERE g.group_name = 'Cuidadora' ";
  $sql .= "ORDER BY u.first_name ASC";
  $result = find_by_sql($sql);
  return $result;
}
/*------------------------------------------------------------------*/
/* Find all caregivers by
 /* joining users table and user groups table and infant caregivers
 /*------------------------------------------------------------------*/
function find_all_assigned_caregivers()
{
  global $db;
  $sql  = "SELECT ";
  $sql .= "ic.id AS assign_id, ";
  $sql .= "i.first_name AS infant_name, ";
  $sql .= "u.first_name AS caregiver_name, ";
  $sql .= "u.picture AS caregiver_picture ";
  $sql .= "FROM infant_caregivers ic ";
  $sql .= "INNER JOIN users u ON ic.caregiver_id = u.id ";
  $sql .= "INNER JOIN user_groups g ON u.user_level = g.group_level ";
  $sql .= "INNER JOIN infants i ON ic.infant_id = i.id ";
  $sql .= "WHERE g.group_name = 'Cuidadora' ";
  $sql .= "ORDER BY caregiver_name ASC, infant_name ASC";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Get all infants assigned 
 /* to the currently logged-in caregiver
 /*--------------------------------------------------------------*/
function find_my_infants()
{
  global $db;
  $caregiver_id = (int)$_SESSION['user_id'];
  $sql  = "SELECT ";
  $sql .= "i.id AS infant_id, ";
  $sql .= "i.first_name AS infant_name ";
  $sql .= "FROM infant_caregivers ic ";
  $sql .= "INNER JOIN infants i ON ic.infant_id = i.id ";
  $sql .= "WHERE ic.caregiver_id = {$caregiver_id} ";
  $sql .= "ORDER BY i.first_name ASC";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Get all infants logs assigned 
 /* to the currently logged-in tutor
 /*--------------------------------------------------------------*/
function find_infant_logs_by_tutor($infant_id)
{
  global $db;
  $infant_id = (int)$infant_id;
  $sql  = "SELECT ";
  $sql .= "u.first_name AS caregiver_name, ";
  $sql .= "a.name AS activity_name, ";
  $sql .= "l.notes, ";
  $sql .= "l.created_at ";
  $sql .= "FROM infant_activity_logs l ";
  $sql .= "INNER JOIN users u ON l.caregiver_id = u.id ";
  $sql .= "INNER JOIN activities a ON l.activity_id = a.id ";
  $sql .= "WHERE l.infant_id = {$infant_id} ";
  $sql .= "ORDER BY l.created_at DESC";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Get infant assigned for tutor
 /* to the currently logged-in tutor
 /*--------------------------------------------------------------*/
function find_my_infants_by_tutors()
{
  global $db;
  $tutor_id = (int)$_SESSION['user_id'];
  $sql  = "SELECT ";
  $sql .= "i.id AS infant_id, i.first_name AS infant_name, ";
  $sql .= "i.picture AS infant_picture ";
  $sql .= "FROM infants i ";
  $sql .= "WHERE i.tutor_id = {$tutor_id} ";
  $sql .= "ORDER BY i.first_name ASC";
  return find_by_sql($sql);
}
/*------------------------------------------------------------------*/
/* Find all activity logs by
 /* joining activities table and infants table and users table
 /*------------------------------------------------------------------*/
function find_all_activity_logs()
{
  global $db;
  $sql  = "SELECT ";
  $sql .= "l.id AS activity_id, ";
  $sql .= "i.first_name AS infant_name, i.picture AS infant_picture, ";
  $sql .= "u.first_name AS caregiver_name, ";
  $sql .= "a.name AS activity_name, ";
  $sql .= "l.notes, ";
  $sql .= "l.created_at ";
  $sql .= "FROM infant_activity_logs l ";
  $sql .= "INNER JOIN infants i ON l.infant_id = i.id ";
  $sql .= "INNER JOIN users u ON l.caregiver_id = u.id ";
  $sql .= "INNER JOIN activities a ON l.activity_id = a.id ";
  $sql .= "ORDER BY l.created_at DESC";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function to update the last log in of a user
  /*--------------------------------------------------------------*/
function updateLastLogIn($user_id)
{
  global $db;
  $date = make_date();
  $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
}

/*--------------------------------------------------------------*/
/* Find all Group name
  /*--------------------------------------------------------------*/
function find_by_groupName($val)
{
  global $db;
  $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
  $result = $db->query($sql);
  return ($db->num_rows($result) === 0 ? true : false);
}
/*--------------------------------------------------------------*/
/* Find group level
  /*--------------------------------------------------------------*/
function find_by_groupLevel($level)
{
  global $db;
  $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
  $result = $db->query($sql);
  return ($db->num_rows($result) === 0 ? true : false);
}
/*--------------------------------------------------------------*/
/* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
function page_require_level($require_level)
{
  global $session;
  $current_user = current_user();
  // Validación de sesión
  if (!$session->isUserLoggedIn()) {
    $session->msg('d', 'Por favor Iniciar sesión...');
    redirect('/index.php', false);
  }
  // Validación de usuario
  if (!$current_user || !isset($current_user['user_level'])) {
    $session->msg('d', 'Usuario no válido.');
    redirect('/index.php', false);
  }
  // Obtener información del grupo
  $login_level = find_by_groupLevel($current_user['user_level']);
  // Validar que el grupo esté activo
  if (is_array($login_level) && isset($login_level['group_status']) && (int)$login_level['group_status'] === 0) {
    $session->msg('d', 'Este nivel de usuario está inactivo!');
    redirect('/index.php', false);
  }
  // Verificar nivel requerido (ajusta el comparador según tu jerarquía)
  if ((int)$current_user['user_level'] <= (int)$require_level) {
    return true;
  } else {
    $session->msg("d", "¡Lo siento! No tienes permiso para ver la página.");
    redirect('/home', false);
  }
}
