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
					//Splits it intelligibly with the % format specifier. \% gets escaped
					
					$entry['format'] = str_replace("%%","\%",$entry['format']);
					$splits = preg_split('~(?<!\\\)' . preg_quote("%", '~') . '~', $entry['format']);
					//Start gluing it back together.
					$final = "";
					$pos['u']=0;
					$pos['g']=0;
					foreach ($splits as $piece){
						$type = substr($piece, 0, 1);
						
						switch ($type){
							case "u":
								$users = $entry['users'][$pos['u']]; //Eventually will need to lookup ID's
								
								switch (count($users)){
									case 0:
										$final .= "A ghost";
									break;
									case 1:
										$final .= $users[0];
									break;
									case 2:
										$final .= $users[0]." and ". $users[1];
									break;
									default:
										$final .= count($users)." users";
									break;
									
								}
								
								$pos['u']++;
							break;
							
							case "t":
								$final .= (new Time())->timeAgoInWords($entry['time']);
							break;
							case "%":
								$final .= "%%";
							break;
							
							default:
							break;
						}
						
						$final .= substr($piece, 1, -1)." ";
					}
					
					$final = str_replace("\%","%",$final);
					
					print '<li class="activity-'.$entry['type'].'"><h2><a href="#">'.$entry['title'].'</a></h2>
								<div class="meta">'.$final.'</div>
							</li>';
				}
			?>
		</ul>
	</div>
</div>