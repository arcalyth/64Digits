<div class="frontpage-section">
	<div class="section-header">
		<h1>

		Tag			<?php if ($new) { echo "*"; }?>: <input id="staticTag" value='<?php echo $pagetag; ?>' />
		Title: 		<input id="staticTitle" value='<?php echo $pagetitle; ?>' />
		Category: 	<select id="staticCategory">
						<?php
							$categories = StaticPageCategories::model()->findAll();
							foreach ($categories as $category){
								
								$checked = ($category->id == $pagecategory) ? "selected" : "";
								print "<option value='".$category->id."' ".$checked.">".$category->name."</option>";
							}
						?>
					</select>
		Group: 		<select id="staticGroup">
						<option value='0'>(none)</option>
						<?php
							$groups = Groups::model()->findAllByAttributes(array("is_default"=>false));
							foreach ($groups as $group){
								$checked = ($group->id == $pagegroup) ? "selected" : "";
								print "<option value='".$group->id."' ".$checked.">".$group->name."</option>";
							}
						?>
					</select>
		Visible: 	<input type="checkbox" id="staticVisble" value="1" <?php echo $pagevisible ? "checked" : "";?>/>
		</h1>
	</div>
	<div class="section-content">
	
	   <textarea id = "editor" rows="30"  style=' display: block; width: 100%'>
	       <?php
	           echo $pagecontent;
	       ?>
	   </textarea>
    	<input type="button" value="Save" id="saveStatic" style='float: left;'/><div id="saveSpinner" style="padding: 2px; padding-left: 10px; display: block;"></div>
	</div>
</div>

<script>
$(document).ready(function() {
    $("#editor").sceditor(
    {
        style: "<?php print Yii::app()->request->baseUrl; ?>/css/jquery.sceditor.default.min.css",
		emoticonsRoot  : "<?php print Yii::app()->request->baseUrl; ?>/images/"
    }
    );
	
	$("#saveStatic").click(function (){
		$("#saveSpinner").html("<img src='<?php print Yii::app()->request->baseUrl; ?>/images/spinner.gif' width='18px' height='18px' />");
		$.ajax({
			type: "post",
			url: "<?php print Yii::app()->request->baseUrl; ?>/ajax/static/save",
			data: {
					id: "<?php echo $pageid; ?>",
					tag: $("#staticTag").val(),
					title: $("#staticTitle").val(),
					category: $("#staticCategory").val(),
					group: $("#staticGroup").val(),
					visible: ($("#staticVisble").attr('checked')=="checked") ? "1":"0",
					content: $("#editor").data("sceditor").val()
				},
			success: function(data){
				data = jQuery.parseJSON(data);
				$("#saveSpinner").html("");
				
				if (!data.success){
					alert("There was an issue saving the document.");
				}
				
			},
			error: function(data) {
				alert("Looks like the login failed because of an HTTP error.");
			}
		});
		
	});
	
});
</script>