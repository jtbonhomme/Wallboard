DROP TABLE IF EXISTS teams;
CREATE TABLE teams
(
  id              smallint unsigned NOT NULL auto_increment,
  name            varchar(255) NOT NULL,                      # Team Name
  total_clients	  smallint unsigned NOT NULL,				  # Total Number of clients
  new_clients	  smallint unsigned NOT NULL,				  # Total Number of clients
  renewals		  smallint unsigned NOT NULL,				  # Total Number of clients
  reports		  smallint unsigned NOT NULL,				  # Total Number of clients
  lastupdated 	  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY     (id)
);
