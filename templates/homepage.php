<?php include "templates/include/header.php" ?>

        <?php

          $revenue_mtd = "1";
          $renewals_mtd = "2";
          $new_clients = "3";

          // Misc
          $cakes = "3";
        ?>

      <div class="row-fluid">

      <div class="span4 sidebar">
        <!--Sidebar content-->

        <div class="clients">
          <h2><?php echo getTotalNewClients(); ?></h2>
          Total<br />New Sales
        </div>

        <div class="revenue">
          <h2>$<?php echo number_format($renewals_mtd, 0); ?></h2>
          Daily Revenue<br /><br />
          <h2>$<?php echo number_format($revenue_mtd, 0); ?></h2>
          Revenue MTD
        </div>

        <div class="products">
          <h2><?php echo getTotalReports(); ?></h2>
          Product<br />of the day
        </div>

        <div class="countdown">
          <div id="defaultCountdown"></div>
          Time left
        </div>

      </div>

      <div class="span8 content">
      <!--Body content-->

      <div id="myCarousel" class="carousel slide">

         <!-- Carousel items -->
       <div class="carousel-inner">

      <?php 
        $r = 4; // results per page

        $i=0; foreach ( $team_results['teams'] as $team ) { 
        if ($i == 0) echo "<div class=\"item active\">";
        elseif ($i % $r == 0) echo "<div class=\"item\">";
        ?>

      <h2><?php echo htmlspecialchars( $team->name )?></h2><?php if ($team->renewals >= 100) echo "<span class=\"label label-success\">100% club</span>"; ?>
        <ul class="chartlist">
        <li>
          <span class="bar orange" style="width: 150px;"><?php echo $team->new_clients; ?></span>
          <span class="barlabel orange">Revenue</span>
        </li>
        <li>
          <span class="bar blue" style="width: <?php echo $team->renewals - 30; ?>%;"><?php echo $team->renewals; ?></span>
          <span class="barlabel blue">% to target</span>
        </li>
        <li>
          <span class="bar pink"><?php echo $team->reports ?></span>
          <span class="barlabel pink">Talk Time</span>
        </li>
      </ul>
        
      <?php 
      $i++;
      if ($i % $r == 0 || $i == $team_results['totalRows']) echo "</div>";
      } ?>

    </div>
  </div>
       

      </div>

      <div class="row-fluid">

        <div class="span12 newsfeed">
        <h3>Breaking News</h3><div class="arrow-right"></div>
           <marquee behavior="scroll" scrollamount="4" direction="left">
              <ul>
        <?php foreach ( $results['articles'] as $article ) { ?>
         <li><?php echo htmlspecialchars( $article->content )?></li>
        <?php } ?>
       </ul>
            </marquee>


        </div>

<?php include "templates/include/footer.php" ?>
