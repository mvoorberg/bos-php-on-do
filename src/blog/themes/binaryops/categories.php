<div class="categories">
<p>
	<?php // print_r($global); ?>
	<table class="table table-hover">
		<thead>
			<th>Category</th>
		</thead>
		<tbody>
	
	<?php
	
		$baseUrl = $global['base.url'];
		// CATEGORIES *****************************************
		if ($global['categories']) {
			foreach ($global['categories'] as $slug => $cat) {
				$url = "{$baseUrl}blog/category/{$slug}";
	?>
			<tr>
			  <td>
				<a href="<?php echo $url; ?>"><?php echo $cat; ?></a>
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
