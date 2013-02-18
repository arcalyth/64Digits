<div class="frontpage-section">
	<div class="section-header">
		<h1 style='width: 100%;'>
			All Static Pages
		</h1>
	</div>
	<div class="section-content">
		<ul style='list-style: disc inside none; line-height: 16px;'>
    	<?php
		
			$categorySorted = array();
			foreach ($pages as $page){
				if (!isset($categorySorted[$page->category])){
					$categorySorted[$page->category] = array();
				}
				
				$categorySorted[$page->category] = array_merge(array($page), $categorySorted[$page->category]);
			}
			foreach ($categorySorted as $category=>$pages){
				$category = StaticPageCategories::model()->findByPK($category);
				print "<li>".$category->name."</li>";
				print "<ul style=' padding-left: 8px; list-style: disc inside none; line-height: 16px;'>";
				foreach ($pages as $page){
					print "<li><a href='".$this->createURL("/static/view",array($page->tag=>""))."'>".$page->title."</a></li>";
				}
				print "</ul>";
			}
		?>
		</ul>
	</div>
</div>
