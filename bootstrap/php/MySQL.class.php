<?php
//------------------------------------------------------------------------------------//
//------------------------------TODO: CHANGE TO PDB-----------------------------------//
//------------------------------------------------------------------------------------//
class MySQL
{
  protected $dbLink;

  /*********************************
  * Method to connect to database *
  *********************************/
  function __construct($dbHost, $dbUsername, $dbPassword, $dbName) {
    $this->dbLink = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_error()) {
      user_error("MySQL Error: ".mysqli_connect_errno() . '. ' . mysqli_connect_error());
      die();
    }
  }

  /******************************
  * Method to close connection *
  ******************************/
  function __destruct() {
    @$this->dbLink->close();
  }

  /*****************************
  * Method to run SQL queries *
  *****************************/
  function query($sql, $arr=array()) {
    $result = $this->dbLink->query($sql);
    if (mysqli_error($this->dbLink)){
      user_error("MySQL Error: ".mysqli_errno($this->dbLink) . '. ' . mysqli_error($this->dbLink));
      return false;
    }
    return $result;
  }

  /*****************************
  **** Method to fetch rows ***
  *****************************/
  function fetch($sql, $arr=array()) {
    $result = $this->dbLink->query($sql);
    if (mysqli_error($this->dbLink)){
      user_error("MySQL Error: ".mysqli_errno($this->dbLink) . '. ' . mysqli_error($this->dbLink));
      return false;
    }
    $data = array();
    while($obj=$result->fetch_assoc()) {
      $data[] = $obj;
    }
    return $data;
  }

  function real_escape_string($str) {
    return $this->dbLink->real_escape_string($str);
  }
}
?>
