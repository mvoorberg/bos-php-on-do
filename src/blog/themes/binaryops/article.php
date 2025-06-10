<?php
	if (!defined("BINARYOPS_INCLUDE")) {
		define("BINARYOPS_INCLUDE", 'true');
	}

	require_once __DIR__ . '/clickTweet.inc.php';
	require_once __DIR__ . '/authors.inc.php';
	$author = getAuthorMeta($article->getAuthor(), $global['author.name']);
?>

	<div class="row blog">
		<div class="col-md-9">

			<!-- Item Post -->
			<article class="post">
				<!-- Info post -->
				<div class="info-post">
					<h2><?php echo $article->getTitle(); ?></h2>
				</div>
				<!--End Info post -->

				<!-- Image Post  -->
				<?php
				if ($article->getMeta('image')) {
					echo '<div class="post-image"><img src="/blog/articles/' . $article->getMeta('image') . '" alt="' . addslashes($article->getTitle()) . '" /></div>';
				}
				?>
					<!-- End Image Post  -->

					<div class="clearfix"></div>

					<!-- Post Meta -->
					<div class="post-meta">
						<span><i class="fa fa-calendar">&nbsp;</i> <?php echo $article->getUpdatedDate($global['date.format']); ?></span>
						<span><i class="fa fa-user">&nbsp;</i> By <span><?php echo $author['name']; ?></span></span>
						<span><i class="fa fa-tag">&nbsp;</i>
							<?php
							foreach ($article->getTags() as $slug => $tag) {
								echo '&nbsp;<a href="/blog/tag/' . $slug .'">' . $tag->name . "</a> ";
								// Used later in layout.php for the 'aside' column.
								$global['tags'][$slug] = $tag;
							}
							?>
						</span>
					</div>
					<!-- End Post Meta -->

					<!-- Info post -->
					<div class="info-post">
						<p>
							<?php
								// echo $article->getContent();
								$processedContent = click2Tweet($article);
								echo $processedContent;
							?>
						</p>
					</div>
					<!--End Info post -->

					<!-- Content Author -->
					<div class="row autor">
						<h3><i class="fa fa-user"></i><?php echo $author['name']; ?></h3>
						<!-- Image Team  -->
						<div class="col-sm-3">
							<div class="image-autor">
								<img src="<?php echo $author['image']; ?>" alt="" />
							</div>
							<h4 class="title-subtitle text-center">
								<span><?php echo $author['title']; ?></span>
							</h4>
						</div>
						<!-- Info  Team  -->
						<div class="col-sm-9">
							<p><?php echo $author['bio']; ?></p>
							<ul class="social">
								<?php if ($author['twitter']) { ?>
									<li data-toggle="tooltip" title data-original-title="Twitter">
										<a href="<?php echo $author['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									</li>
								<?php } ?>
								<?php if ($author['linkedin']) { ?>
									<li data-toggle="tooltip" title data-original-title="LinkedIn">
										<a href="<?php echo $author['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
									</li>
								<?php } ?>
								<li style="background-color:#fff;width:160px;margin-top:-3px;">
									<a href="mailto:<?php echo $author['email']; ?>" class="btn btn-primary">SEND ME AN EMAIL</a>
								</li>
							</ul>
						</div>
						<!-- End Info  Team  -->
					</div>
					<!--End Content Author -->
			</article>
			<!-- End Item Post -->
		</div>
	</div>
