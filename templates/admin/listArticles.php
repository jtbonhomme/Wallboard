<?php include "templates/include/header.php" ?>
      <div class="row-fluid admin">

      <div class="span3" style="text-align: right;">

        <a href="index.php"><h1>Wallboard Admin</h1></a>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout" style="margin-left: 8px;">Log out</a></p>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage alert alert-error"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage alert alert-success" style="float: right; margin-top: 8px;"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

        <img src="img/admin.png" style="width: 140px; padding: 20px 10px; display: block; float: right; clear: both;">
        
      </div>

      <div class="span8">

      <h2>Consultants</h2>
      
      <table class="table table-striped">
        <thead>
        <tr style="color: #ccc;">
          <th>Consultant Name</th>
          <th>New Clients</th>
          <th>Renewals</th>
          <th>Reports</th>
          <th>Last Updated</th>
        </tr>
      </thead>
      <tbody>

<?php foreach ( $team_results['teams'] as $team ) { ?>

        <tr onclick="location='admin.php?action=editTeam&amp;teamId=<?php echo $team->id?>'">

          <td><?php echo $team->name?></td>
          <td><?php echo $team->new_clients?></td>
          <td><?php echo $team->renewals?></td>
          <td style="color: #fff;"><?php echo $team->reports?> <span style="color: #545553">/</span> <span style="color: #63c0ff"><?php echo $team->total_clients?></span></td>
          <td><?php echo $team->lastupdated?></td>
        </tr>

<?php } ?>

      </tbody>
      </table>

      <!-- <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p> -->

      <p><a href="admin.php?action=newTeam">Add a New Team</a></p>
      
      <br />
      <h2>Newsfeed</h2>

      <table class="table table-striped">
        <thead>
        <tr style="color: #ccc;">
          <th width="10%">Date</th>
          <th>Article</th>
        </tr>
      </thead>
      <tbody>

<?php foreach ( $results['articles'] as $article ) { ?>

        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
            <?php echo $article->content?>
          </td>
        </tr>

<?php } ?>
      
      </tbody>
      </table>

      <!-- <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p> -->

      <p><a href="admin.php?action=newArticle">Add a New Article</a></p>

  </div>

<?php include "templates/include/footer.php" ?>

