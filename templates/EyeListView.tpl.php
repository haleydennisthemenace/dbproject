<?php
	$this->assign('title','OPTOMETRY | Eyes');
	$this->assign('nav','eyes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/eyes.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Eyes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="eyeCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Patientid">Patientid<% if (page.orderBy == 'Patientid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Side">Side<% if (page.orderBy == 'Side') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Color">Color<% if (page.orderBy == 'Color') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Prescriptionid">Prescriptionid<% if (page.orderBy == 'Prescriptionid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('patientid')) %>">
				<td><%= _.escape(item.get('patientid') || '') %></td>
				<td><%= _.escape(item.get('side') || '') %></td>
				<td><%= _.escape(item.get('color') || '') %></td>
				<td><%= _.escape(item.get('prescriptionid') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="eyeModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="patientidInputContainer" class="control-group">
					<label class="control-label" for="patientid">Patientid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="patientid" placeholder="Patientid" value="<%= _.escape(item.get('patientid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="sideInputContainer" class="control-group">
					<label class="control-label" for="side">Side</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="side" placeholder="Side" value="<%= _.escape(item.get('side') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="colorInputContainer" class="control-group">
					<label class="control-label" for="color">Color</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="color" placeholder="Color" value="<%= _.escape(item.get('color') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="prescriptionidInputContainer" class="control-group">
					<label class="control-label" for="prescriptionid">Prescriptionid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="prescriptionid" placeholder="Prescriptionid" value="<%= _.escape(item.get('prescriptionid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEyeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEyeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Eye</button>
						<span id="confirmDeleteEyeContainer" class="hide">
							<button id="cancelDeleteEyeButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteEyeButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="eyeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Eye
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="eyeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEyeButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="eyeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEyeButton" class="btn btn-primary">Add Eye</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
