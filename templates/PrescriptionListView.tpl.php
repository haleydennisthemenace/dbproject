<?php
	$this->assign('title','OPTOMETRY | Prescriptions');
	$this->assign('nav','prescriptions');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/prescriptions.js").wait(function(){
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
	<i class="icon-th-list"></i> Prescriptions
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="prescriptionCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Prescriptionid">Prescriptionid<% if (page.orderBy == 'Prescriptionid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Optometristid">Optometristid<% if (page.orderBy == 'Optometristid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Clensid">Clensid<% if (page.orderBy == 'Clensid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Glensid">Glensid<% if (page.orderBy == 'Glensid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('prescriptionid')) %>">
				<td><%= _.escape(item.get('prescriptionid') || '') %></td>
				<td><%= _.escape(item.get('optometristid') || '') %></td>
				<td><%= _.escape(item.get('clensid') || '') %></td>
				<td><%= _.escape(item.get('glensid') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="prescriptionModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="prescriptionidInputContainer" class="control-group">
					<label class="control-label" for="prescriptionid">Prescriptionid</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="prescriptionid"><%= _.escape(item.get('prescriptionid') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="optometristidInputContainer" class="control-group">
					<label class="control-label" for="optometristid">Optometristid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="optometristid" placeholder="Optometristid" value="<%= _.escape(item.get('optometristid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="clensidInputContainer" class="control-group">
					<label class="control-label" for="clensid">Clensid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="clensid" placeholder="Clensid" value="<%= _.escape(item.get('clensid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="glensidInputContainer" class="control-group">
					<label class="control-label" for="glensid">Glensid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="glensid" placeholder="Glensid" value="<%= _.escape(item.get('glensid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePrescriptionButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePrescriptionButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Prescription</button>
						<span id="confirmDeletePrescriptionContainer" class="hide">
							<button id="cancelDeletePrescriptionButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePrescriptionButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="prescriptionDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Prescription
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="prescriptionModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePrescriptionButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="prescriptionCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPrescriptionButton" class="btn btn-primary">Add Prescription</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
