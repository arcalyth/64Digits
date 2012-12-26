
<div id="activity-box" class="section">
	<div class="section-header">
		<h1>Latest activity <span class="inline-badge">3*</span></h1>
		<a class="options" href="#">all &#9660;</a>
	</div>
	<div class="section-content">
		<ul id="activity-list" class="section-list">
		</ul>
	</div>
</div>

<!-- Define the template for our activity feed -->
<script id="activity-feed-template" type="text/x-handlebars-template">
	<li class="activity-{{type}}">
		<h2>
			<a href="/media/{{type}}/{{id}}">{{title}}</a>
		</h2>
		<div class="meta">{{{desc}}}</div>
	</li>
</script>

<!-- Compile it (TODO: Pre compile and include) -->
<script>
	var source   = $("#activity-feed-template").html();
	var activity_log_template = Handlebars.compile(source);

<?php
	//Temporary code until we have a database pull.
	$al = array(); 
	foreach ($this->data as $entry){					
		$final = $this->formatDescription($entry['format'],$entry);
		$printer = array();
		$printer["id"] = $entry['id'];
		$printer["type"] = $entry['type'];
		$printer["title"] = $entry['title'];
		$printer["desc"] = $this->formatDescription($entry['format'],$entry);
		$al[] = $printer;
	}
	//This shouldn't be here, only printed here for testing reasons.
	echo "var al = ",json_encode($al, JSON_PRETTY_PRINT);
?>
	<!-- Temporary code until activity feed can be implemented -->
	$.each(al, function(index, obj){
		var html = activity_log_template(obj);
		$("#activity-list").prepend(html);
	});
</script>
