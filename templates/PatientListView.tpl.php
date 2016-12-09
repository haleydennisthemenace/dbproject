<?php
	$this->assign('title','OPTOMETRY | Patients');
	$this->assign('nav','patients');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/patients.js").wait(function(){
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
	<i class="icon-th-list"></i> Patients
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="patientCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Patientid">Patientid<% if (page.orderBy == 'Patientid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Name">Name<% if (page.orderBy == 'Name') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Prescriptionid1">Prescriptionid1<% if (page.orderBy == 'Prescriptionid1') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Prescriptionid2">Prescriptionid2<% if (page.orderBy == 'Prescriptionid2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Phone1">Phone1<% if (page.orderBy == 'Phone1') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Phone2">Phone2<% if (page.orderBy == 'Phone2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Housenumber">Housenumber<% if (page.orderBy == 'Housenumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Street">Street<% if (page.orderBy == 'Street') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_City">City<% if (page.orderBy == 'City') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_State">State<% if (page.orderBy == 'State') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Zipcode">Zipcode<% if (page.orderBy == 'Zipcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('patientid')) %>">
				<td><%= _.escape(item.get('patientid') || '') %></td>
				<td><%= _.escape(item.get('name') || '') %></td>
				<td><%= _.escape(item.get('prescriptionid1') || '') %></td>
				<td><%= _.escape(item.get('prescriptionid2') || '') %></td>
				<td><%= _.escape(item.get('phone1') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('phone2') || '') %></td>
				<td><%= _.escape(item.get('housenumber') || '') %></td>
				<td><%= _.escape(item.get('street') || '') %></td>
				<td><%= _.escape(item.get('city') || '') %></td>
				<td><%= _.escape(item.get('state') || '') %></td>
				<td><%= _.escape(item.get('zipcode') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="patientModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="patientidInputContainer" class="control-group">
					<label class="control-label" for="patientid">Patientid</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="patientid"><%= _.escape(item.get('patientid') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nameInputContainer" class="control-group">
					<label class="control-label" for="name">Name</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="name" placeholder="Name" value="<%= _.escape(item.get('name') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="prescriptionid1InputContainer" class="control-group">
					<label class="control-label" for="prescriptionid1">Prescriptionid1</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="prescriptionid1" placeholder="Prescriptionid1" value="<%= _.escape(item.get('prescriptionid1') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="prescriptionid2InputContainer" class="control-group">
					<label class="control-label" for="prescriptionid2">Prescriptionid2</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="prescriptionid2" placeholder="Prescriptionid2" value="<%= _.escape(item.get('prescriptionid2') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="phone1InputContainer" class="control-group">
					<label class="control-label" for="phone1">Phone1</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="phone1" placeholder="Phone1" value="<%= _.escape(item.get('phone1') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="phone2InputContainer" class="control-group">
					<label class="control-label" for="phone2">Phone2</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="phone2" placeholder="Phone2" value="<%= _.escape(item.get('phone2') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="housenumberInputContainer" class="control-group">
					<label class="control-label" for="housenumber">Housenumber</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="housenumber" placeholder="Housenumber" value="<%= _.escape(item.get('housenumber') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="streetInputContainer" class="control-group">
					<label class="control-label" for="street">Street</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="street" placeholder="Street" value="<%= _.escape(item.get('street') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cityInputContainer" class="control-group">
					<label class="control-label" for="city">City</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="city" placeholder="City" value="<%= _.escape(item.get('city') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="stateInputContainer" class="control-group">
					<label class="control-label" for="state">State</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="state" placeholder="State" value="<%= _.escape(item.get('state') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="zipcodeInputContainer" class="control-group">
					<label class="control-label" for="zipcode">Zipcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="zipcode" placeholder="Zipcode" value="<%= _.escape(item.get('zipcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePatientButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePatientButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Patient</button>
						<span id="confirmDeletePatientContainer" class="hide">
							<button id="cancelDeletePatientButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePatientButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="patientDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Patient
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="patientModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePatientButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="patientCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPatientButton" class="btn btn-primary">Add Patient</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
