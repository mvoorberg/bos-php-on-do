<div class="tags">
<p>
<?php // print_r($global); ?>
  <table class="table table-hover">
	<thead>
		<th>Tag</th>
		<th>Frequency</th>
	</thead>
	<tbody>
<?php

$baseUrl = $global['base.url'];
	// TAGS *****************************************
	if ($global['tags']) {
		$most = 1;
		foreach ($global['tags'] as $slug => $tag) {
			if ($most < $tag->count) {
				$most = $tag->count;
			}
		}
		foreach ($global['tags'] as $slug => $tag) {
			$url = "{$baseUrl}blog/tag/{$slug}";
			$width = (($tag->count / $most) * 100) . '%';
?>
		<tr>
		  <td>
			<a href="<?php echo $url; ?>"><?php echo $tag->name; ?></a>
		  </td>
		  <td>
<div class="btn btn-primary" style="width: <?php echo $width; ?>;">
<span class="progress-bar-tooltip" style="opacity: 1;">&nbsp;</span></div>

		  </td>
		</tr>
<?php
		}
	}
?>
	</tbody>
  </table>
</p>
</div>
