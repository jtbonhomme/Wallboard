<?php include "templates/include/header.php" ?>
      <div class="row-fluid admin">

       <div class="span3" style="text-align: right;">

        <h1>Wallboard Admin</h1>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
        <img src="img/admin.png" style="width: 140px; padding: 20px 10px;">

      </div>

      <div class="span8">

      <h2><?php echo $results['pageTitle']?></h2>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <input type="hidden" name="title" value=""/>
          <input type="hidden" name="summary" value=""/>


          <li>
            <label for="content">Article Content</label>
            <textarea name="content" id="content" placeholder="The HTML content of the article" required maxlength="100000" style="width: 60em;"><?php echo htmlspecialchars( $results['article']->content )?></textarea>
          </li>

          <li>
            <label for="publicationDate">Publication Date</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $results['article']->id ) { ?>
      <p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>
<?php } ?>

  </div>

<?php include "templates/include/footer.php" ?>

