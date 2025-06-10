<?php
	// Header and footer require that the following is defined
	// so that they don't get rendered as partial pages.
	if (!defined("BINARYOPS_INCLUDE")) {
		define("BINARYOPS_INCLUDE", 'true');
	}

	// *************************************************************************
	// Define all the Blog meta descriptions outside of the logic & layout below.
	// *************************************************************************
	$blogMetaDescriptions = [
		'index'=> "Blogging on specific technologies, general software development or project management as it related to information technology.",
		'tags' => "BinaryOps Software blog Tags listing. Articles on software development, project management and consulting may be related to one or more of the following Tags.",
		'tag' => [
			'javascript' => "Blog articles from BinaryOps Software about custom software development with JavaScript.",
			'devops' => "Blogs about continuous integration and DevOps.",
			'etc' => "<add more tag meta-descriptions...>",
			'default-description' => "Software development and related blog articles tagged %s."
		], 
		'categories' => "BinaryOps Software blog Category listing. Categories will include articles on all things software development.",
		'category' => [
			'apis' => "Building and consuming REST APIs, microservices and modern application design.",
			'general' => "Read articles about many things software development, technology or business processes.",
			'communication' => "Articles about project management, communication and customer engagement.",
			'default-description' => "BinaryOps Software blog articles in the %s category."
		]
	];
	// *************************************************************************

	function parseUri() {
		// E.g.  /blog/category/general?foo=123 ==> "Category"
		$req_uri = $_SERVER['REQUEST_URI'];
		$req_uri = explode('?', $req_uri);
		$req_uri = $req_uri[0];
		$req_uri = explode('/', $req_uri);
		$req_uri = $req_uri[count($req_uri)-1];

		return $req_uri;
	}	

	function parseBanner() {
		$req_uri = parseUri();

		return ucwords($req_uri);
	}


	$pageBanner = 'Blog - Software Development & Customer Success'; // The red banner (<h1/>, 20-70 chars!)
	$pageTitle = 'Blog - Software Development';  // the HTML <title> tag
	$breadcrumbs = '';

	switch ($global['route']) {
		case 'tag':
			$parsedBanner = parseBanner();
			$pageBanner = "Tagged {$parsedBanner}";
			$pageTitle = "Blog posts tagged {$parsedBanner}";
			$breadcrumbs = "<a href=\"/blog/\">Blog</a> / <a href=\"/blog/tag\">Tags</a> / {$parsedBanner}";
			// Dynamic description
			$description = sprintf($blogMetaDescriptions['tag']['default-description'], $parsedBanner);
			if (isset($blogMetaDescriptions['tag'][parseUri()])) {
				$description = $blogMetaDescriptions['tag'][parseUri()];
			}
			define("BINARYOPS_META_DESCRIPTION", $description);
			define("BINARYOPS_META_CANONICAL", "/blog/tag/" . parseUri());
			break;
		case 'tags':
			$pageBanner = 'Tags';
			$pageTitle = "Blog Tags";
			$breadcrumbs = "<a href=\"/blog/\">Blog</a> / {$pageBanner}";
			define("BINARYOPS_META_DESCRIPTION", $blogMetaDescriptions['tags']);
			define("BINARYOPS_META_CANONICAL", "/blog/tag");
			break;
		case 'category':
			$pageBanner = parseBanner();
			$pageTitle = 'Blog posts in ' . parseBanner();
			$breadcrumbs = "<a href=\"/blog/\">Blog</a> / <a href=\"/blog/category\">Categories</a> / {$pageBanner}";
			// Dynamic description
			$description = sprintf($blogMetaDescriptions['category']['default-description'], $pageBanner);
			if (isset($blogMetaDescriptions['category'][parseUri()])) {
				$description = $blogMetaDescriptions['category'][parseUri()];
			}
			define("BINARYOPS_META_DESCRIPTION", $description);
			define("BINARYOPS_META_CANONICAL", "/blog/category/" . parseUri());
			break;
		case 'categories':
			$pageBanner = 'Categories';
			$pageTitle = "Blog Categories";
			$breadcrumbs = "<a href=\"/blog/\">Blog</a> / {$pageBanner}";
			define("BINARYOPS_META_DESCRIPTION", $blogMetaDescriptions['categories']);
			define("BINARYOPS_META_CANONICAL", "/blog/category");
			break;
		case 'article':
			// If we're rendering a Blog Post, the article title is in $global['title']
			// and we should have it in the breadcrumbs as text.
			$pageBanner = $global['title'];
			$pageTitle = $global['title'];
			$breadcrumbs = "<a href=\"/blog/\">Blog</a> / {$pageBanner}";

			// pull the meta-description from the article json.
			if (isset($global['meta-description'])) {
				define("BINARYOPS_META_DESCRIPTION", $global['meta-description']);
			}
			define("BINARYOPS_META_IMAGE", $global['image']);
			define("BINARYOPS_META_CANONICAL", $global['path']);
			break;
		case '__root__':
			// This is the Blog Index, it should have it's own meta-description.
			define("BINARYOPS_META_DESCRIPTION", $blogMetaDescriptions['index']);
			define("BINARYOPS_META_CANONICAL", "/blog/");  // VSCode format is wierd...
		default:
			// Use the defaults!
			break;
	}

	define("BINARYOPS_TITLE", $pageTitle);

	require_once __DIR__ . '../../../../header.inc.php';
	require_once __DIR__ . '../../../../title.inc.php';

	$title = new TitleSection("Blog", $pageBanner, '', '', $breadcrumbs);
	$title->render();

?>

<div class="container">

  <!--============== Blog ==============-->

  <div class="row blog">
    <div class="col-md-9">
      <div class="blogpost">
        <p>
			<?php echo $content; ?>
		</p>
      </div>
    </div>
    <div class="col-md-3 sidebar">
		<aside class="categories"></aside>

		<aside class="categories">
			<h3>Have a Project?</h3>
			<div class="call-to-action">
				Let's build it together, call today!
				<div>
					<a href="<?=bosPageLink("/contact");?>" class="btn btn-primary learn-more">Get a Free Quote</a>
				</div>
			</div>
		</aside>

		<aside class="categories">
				<?php
				if ($global['categories']) {
					echo '<h4>Categories</h4>';
					echo '<ul class="list">';
					foreach ($global['categories'] as $slug => $category) {
						echo '<li><i class="fa fa-check">&nbsp;</i><a tabindex="-1" href="/blog/category/'.$slug.'">'. $category .'</a></li>';
					}
					echo '</ul>';
				}
				?>
		</aside>

		<aside class="tags">
				<?php
				if ($global['tags']) {
					echo "<h4>Tags</h4>";
					foreach ($global['tags'] as $slug => $tag) {
						echo '<a tabindex="-1" href="/blog/tag/'.$slug.'"><i class="fa fa-tag">&nbsp;</i>'. $tag->name .'</a> ';
					}
				}
				?>
		</aside>

		<aside class="hidden-xs hidden-sm">
			<h4>Twitter Feed</h4>
			<p>
<a class="twitter-timeline" data-height="600" data-link-color="#d21c2d" href="https://twitter.com/BinaryOpsCa?ref_src=twsrc%5Etfw">Tweets by BinaryOpsCa</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</p>
		</aside>
		<br />
    </div>
  </div>
  <!--Blog Closed-->
  <hr />
</div>
<!--Container End-->

<?php require __DIR__ . '../../../../footer.inc.php'; ?>

<!-- htmlmin:ignore -->
    </body>
</html>
<!-- htmlmin:ignore -->
