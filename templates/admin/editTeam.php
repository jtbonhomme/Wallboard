<?php include "templates/include/header.php" ?>
      <div class="row-fluid admin">

      <div class="span3" style="text-align: right;">

        <h1>Wallboard Admin</h1>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
        <img src="img/admin.png" style="width: 140px; padding: 20px 10px;">

      </div>

      <div class="span8">

      <h2><?php echo $team_results['pageTitle']?></h2>

      <form action="admin.php?action=<?php echo $team_results['formAction']?>" method="post">
        <input type="hidden" name="teamId" value="<?php echo $team_results['team']->id ?>"/>

<?php if ( isset( $team_results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $team_results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="name">Team Name</label>
            <input type="text" name="name" id="name" placeholder="Name of the team" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $team_results['team']->name )?>" />
          </li>

          <li>
            <label for="total_clients">Total Clients</label>
            <input type="text" name="total_clients" id="total_clients" placeholder="Total number of Clients" required autofocus maxlength="7" value="<?php echo htmlspecialchars( $team_results['team']->total_clients )?>" />
          </li>

          <li>
            <label for="new_clients">New Clients</label>
            <input type="text" name="new_clients" id="new_clients" placeholder="Total number of New Clients" required autofocus maxlength="7" value="<?php echo htmlspecialchars( $team_results['team']->new_clients )?>" />
          </li>

          <li>
            <label for="renewals">Renewals</label>
            <input type="text" name="renewals" id="renewals" placeholder="Total number of Renewals" required autofocus maxlength="7" value="<?php echo htmlspecialchars( $team_results['team']->renewals )?>" />
          </li>

          <li>
            <label for="reports">Reports</label>
            <input type="text" name="reports" id="reports" placeholder="Total number of Reports" required autofocus maxlength="7" value="<?php echo htmlspecialchars( $team_results['team']->reports )?>" />
          </li>

        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $team_results['team']->id ) { ?>
      <p><a href="admin.php?action=deleteTeam&amp;teamId=<?php echo $team_results['team']->id ?>" onclick="return confirm('Delete This Team?')">Delete This Team</a></p>
<?php } ?>

  </div>

<?php include "templates/include/footer.php" ?>

