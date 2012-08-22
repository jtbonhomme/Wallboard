 <?php

/**
 * Class to handle teams
 */

class Team
{
  // Properties

  /**
  * @var int The Team ID from the database
  */
  public $id = null;

  /**
  * @var string Full title of the Team
  */
  public $name = null;

  /**
  * @var string A short summary of the Team
  */
  public $total_clients = null;

  /**
  * @var string The HTML content of the Team
  */
  public $new_clients = null;

    /**
  * @var string The HTML content of the Team
  */
  public $renewals = null;

  /**
  * @var string The HTML content of the Team
  */
  public $reports = null;

    /**
  * @var string Full title of the Team
  */
  public $lastupdated = null;

  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['lastupdated'] ) ) $this->lastupdated = $data['lastupdated'];
    if ( isset( $data['name'] ) ) $this->name = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name'] );
    if ( isset( $data['total_clients'] ) ) $this->total_clients = (int) $data['total_clients'];
    if ( isset( $data['new_clients'] ) ) $this->new_clients = (int) $data['new_clients'];
    if ( isset( $data['renewals'] ) ) $this->renewals = (int) $data['renewals'];
    if ( isset( $data['reports'] ) ) $this->reports = (int) $data['reports'];
  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );

  }


  /**
  * Returns an Team object matching the given Team ID
  *
  * @param int The Team ID
  * @return Team|false The Team object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(lastupdated) FROM teams WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Team( $row );
  }


  /**
  * Returns all (or a range of) Team objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @param string Optional column by which to order the Teams (default="publicationDate DESC")
  * @return Array|false A two-element array : results => array, a list of Team objects; totalRows => Total number of Teams
  */

  public static function getList( $numRows=1000000, $order="id ASC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM teams
            ORDER BY " . $order . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $team = new Team( $row );
      $list[] = $team;
    }

    // Now get the total number of Teams that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current Team object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the Team object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Team::insert(): Attempt to insert an Team object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the Team
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO teams ( name, total_clients, new_clients, renewals, reports ) VALUES ( :name, :total_clients, :new_clients, :renewals, :reports )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
    $st->bindValue( ":total_clients", $this->total_clients, PDO::PARAM_INT );
    $st->bindValue( ":new_clients", $this->new_clients, PDO::PARAM_INT );
    $st->bindValue( ":renewals", $this->renewals, PDO::PARAM_INT );
    $st->bindValue( ":reports", $this->reports, PDO::PARAM_INT );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current Team object in the database.
  */

  public function update() {

    // Does the Team object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Team::update(): Attempt to update a Team object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the Team
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE teams SET name=:name, total_clients=:total_clients, new_clients=:new_clients, renewals=:renewals, reports=:reports WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
    $st->bindValue( ":total_clients", $this->total_clients, PDO::PARAM_INT );
    $st->bindValue( ":new_clients", $this->new_clients, PDO::PARAM_INT );
    $st->bindValue( ":renewals", $this->renewals, PDO::PARAM_INT );
    $st->bindValue( ":reports", $this->reports, PDO::PARAM_INT );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current Team object from the database.
  */

  public function delete() {

    // Does the Team object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Team::delete(): Attempt to delete an Team object that does not have its ID property set.", E_USER_ERROR );

    // Delete the Team
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM teams WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
