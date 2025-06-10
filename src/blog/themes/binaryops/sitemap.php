<?php
// *** DON'T minify this file **
// <!-- htmlmin:ignore -->
	header("Content-Type:text/xml");
	echo '<?xml version="1.0" encoding="UTF-8"?>';

	function bosPageLink($pageUrl) {
		// If we're running locally, include the file extension.
		if ("~ENVIRONMENT~" != "LIVE_SITE") {
			$pageUrl .= ".php";
		}
		return $pageUrl;
	}

?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo $baseUrl;?></loc>
		<lastmod><?php echo date('c', strtotime('-1 days'));?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>1</priority>
	</url>
<?php
// PAGES *****************************************
	$pages = array("about-us",
					"contact",
					"services",
					"service/javascript-frameworks",
					"service/co-development",
					"service/business-software",
					"service/nodejs-consulting",
					"service/software-design",
					"service/web-and-mobile-apps",
					"lp/business-software",
					"lp/the-right-partner",
					"lp/team-augmentation");
	foreach ($pages as $page) {
?>
	<url>
		<loc><?php echo bosPageLink("{$baseUrl}{$page}");?></loc>
		<lastmod><?php echo date('c', strtotime('-1 days'));?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.9</priority>
	</url>
<?php }
// BLOG INDEX *****************************************
?>
	<url>
		<loc><?php echo "{$baseUrl}blog/";?></loc>
		<lastmod><?php echo date('c', strtotime('-1 days'));?></lastmod>
		<changefreq>daily</changefreq>
		<priority>0.7</priority>
	</url>
<?php
	// BLOG POSTS *****************************************
	if (!empty($sitemapData)) {
			foreach ($sitemapData as $data) {
				// Darn doubled up slashes...
				$article = str_replace('//blog/', '/blog/', $data['loc']);
				// Sample date string: 14-7-2015
				$mod = DateTime::createFromFormat('d-m-Y', $data['lastmod']);
				$lastmod = $mod->format('c');

				// These are hardcoded to "0.9" in the blog code.
				// $data['priority']
				$data['priority'] = '0.7';
?>
	<url>
		<loc><?php echo $article; ?></loc>
		<lastmod><?php echo $lastmod; ?></lastmod>
		<changefreq><?php echo $data['changefreq']; ?></changefreq>
		<priority><?php echo $data['priority']; ?></priority>
	</url>
<?php
			}
		}
	// CATEGORIES *****************************************
	if ($global['categories']) {
		foreach ($global['categories'] as $slug => $category) {
			$url = "{$baseUrl}blog/category/{$slug}";
?>
	<url>
		<loc><?php echo $url; ?></loc>
		<lastmod><?php echo date('c', strtotime('-1 days'));?></lastmod>
		<changefreq>daily</changefreq>
		<priority>0.5</priority>
	</url>
<?php
		}
	}
	// TAGS *****************************************
	if ($global['tags']) {
		foreach ($global['tags'] as $slug => $tag) {
			$url = "{$baseUrl}blog/tag/{$slug}";
?>
	<url>
		<loc><?php echo $url; ?></loc>
		<lastmod><?php echo date('c', strtotime('-1 days'));?></lastmod>
		<changefreq>daily</changefreq>
		<priority>0.5</priority>
	</url>
<?php
		}
	}
	?>
</urlset>
<?php
// <!-- htmlmin:ignore -->	
?>