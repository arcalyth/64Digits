<?php
	Yii::import('ext.Time');
?>
<div id="activity-box" class="section">
	<div class="section-header">
		<h1>Latest activity <span class="inline-badge">3*</span></h1>
		<a class="options" href="#">all &#9660;</a>
	</div>
	<div class="section-content">
		<ul id="activity-list" class="section-list">
			<?php
				foreach ($this->data as $entry){					
					$final = $this->formatDescription($entry['format'],$entry);
					
					print '<li class="activity-'.$entry['type'].'"><h2><a href="#">'.$entry['title'].'</a></h2>
								<div class="meta">'.$final.'</div>
							</li>';
				}
			?>
		</ul>
	</div>
</div>