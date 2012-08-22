<?php 

/**
 * Calculate totals
 */

function getTotalReports() {
  $team_results = array();
  $data = Team::getList();
  $team_results['teams'] = $data['results'];
  $total_reports = null;

  foreach ( $team_results['teams'] as $team ) { 
    $total_reports += $team->reports;
  }
  return($total_reports);
}

function getTotalClients() {
  $team_results = array();
  $data = Team::getList();
  $team_results['teams'] = $data['results'];
  $total_clients = null;

  foreach ( $team_results['teams'] as $team ) { 
    $total_clients += $team->total_clients;
  }
  return($total_clients);
}

function getTotalNewClients() {
  $team_results = array();
  $data = Team::getList();
  $team_results['teams'] = $data['results'];
  $new_clients = null;

  foreach ( $team_results['teams'] as $team ) { 
    $new_clients += $team->new_clients;
  }
  return($new_clients);
}

/**
 * Calculate bar sizes
 */

function calculatebar($value) {

  $minimum_width = 5; // minimum width
  $width = 5; // increment width

  $bar = $width * $value; // calculate size

  if ($bar > 0 && $bar < $minimum_width) $bar = $minimum_width;

  return $bar;
}

function calculatelabel($value) {

  $minimum_distance = 5; // default label distance

  $bar = calculatebar($value);

  if ($bar < $minimum_distance) return $minimum_distance;
  else return $bar;
}

?>
