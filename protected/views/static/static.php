<div class="frontpage-section">
	<div class="section-header">
		<h1 style='width: 100%;'>
			<?php 
				echo $title; 
				
				if ($edit){
					/* Moderator function, requires role "static" */
					print "<a href='".$this->createURL("/static/edit/".$tag,array())."' style='float:right;'>Edit</a>";
				}
			?>
		</h1>
	</div>
	<div class="section-content">
    	<?php
    	   
    	   echo $body;
		   echo "<p style='font-size: 8pt; color: #414141; text-align:right;font-style:italic;'>Last Modified On: ".date("F j, Y, g:i a",$last_modified)."</p>";
		?>
	</div>
</div>
