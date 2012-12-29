<div class="frontpage-section">
	<div class="section-header">
		<h1 style='width: 100%;'>
			All Static Pages
		</h1>
	</div>
	<div class="section-content">
		<ul style='list-style: disc inside none; line-height: 16px;'>
    	<?php
			foreach ($pages as $page){
				print "<li><a href='".$this->createURL("/static/view",array($page->tag=>""))."'>".$page->title."</a></li>";
			}
		?>
		</ul>
	</div>
</div>
