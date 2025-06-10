<h1>Archives</h1>
<div class="archives">
<p>
  <table class="table table-hover">
	<thead>
		<th>Date</th><th>Title</th>
	</thead>
	<tbody>
  <?php
	if($archives){
	  $years = array();
	  foreach($archives as $archive){
	  ?>
		<tr>
		  <td>
			<span class="archives-date"><?php echo $archive->getDate($global['date.format']); ?></span>
		  </td><td>
			<a href="<?php echo $archive->getPath(); ?>"><?php echo $archive->getTitle(); ?></a>
		  </td>
		</tr>
	<?php 
	  }
	} ?>
	</tbody>
  </table>
</p>
</div>
