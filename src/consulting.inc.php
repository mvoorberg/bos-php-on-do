<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php
	function consultingHours() {
		$date1 = '8/3/1997';
		$date2 = date('m/d/Y'); // now
		$first = DateTime::createFromFormat('m/d/Y', $date1);
		$second = DateTime::createFromFormat('m/d/Y', $date2);
		$days = $first->diff($second)->days;
		$weeks = round($days/7);
		$years = round($days/365);
		$workdays = $days - (2*$weeks); // exclude Sat & Sun
		$workdays = $workdays - (20*$years); // exclude ~20 days/year for holidays
		$workdays = ($workdays*2); // two people
		return number_format($workdays * 8); // 8 hours/workday
	}
?>

        <!-- Sponsors -->
        <section class="content_info">

            <!-- Content Parallax-->
            <section class="opacy_bg_02 paddings sponsors">
                <div class="container wow fadeInUp">

                    <h2 class="title-resalt">We have logged over <span><?php echo consultingHours(); ?></span> hours of professional consulting.</h2>
                    <ul id="sponsors">
                        <?php for ($sponsorsLoop = 0; $sponsorsLoop < 2; $sponsorsLoop++) { ?>
                            <li><img src="img/sponsors/logos/angularx50.png" alt="Angular"></li>
                            <li><img src="img/sponsors/logos/mongodbx50.png" alt="MongoDB"></li>
                            <li><img src="img/sponsors/logos/jsx50.png" alt="JavaScript"></li>
                            <li><img src="img/sponsors/logos/Ionicx50.png" alt="Ionic"></li>
                            <li><img src="img/sponsors/logos/nodejsx50.png" alt="Node.js"></li>
                            <li><img src="img/sponsors/logos/MySQLx50.png" alt="MySQL"></li>
                            <li><img src="img/sponsors/logos/net-core-x50.png" alt=".NET Core"></li>
                            <li><img src="img/sponsors/logos/knockoutx50.png" alt="Knockout"></li>
                            <li><img src="img/sponsors/logos/css3x50.png" alt="CSS3"></li>
                            <li><img src="img/sponsors/logos/jqueryx50.png" alt="jQuery"></li>
                            <li><img src="img/sponsors/logos/html5x50.png" alt="HTML5"></li>
                            <li><img src="img/sponsors/logos/Oraclex50.png" alt="Oracle"></li>
                            <li><img src="img/sponsors/logos/javax50.png" alt="Java"></li>
                            <li><img src="img/sponsors/logos/dotNETx50.png" alt=".NET"></li>
                        <?php } ?>
                    </ul>

                </div>
            </section>
            <!-- End Content Parallax-->

        </section>
        <!-- End Sponsors -->
