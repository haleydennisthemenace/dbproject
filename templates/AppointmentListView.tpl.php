<?php
	$this->assign('title','OPTOMETRY | Appointments');
	$this->assign('nav','appointments');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/appointments.js").wait(function(){
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
	<i class="icon-th-list"></i> Appointments
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="appointmentCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Locationid">Locationid<% if (page.orderBy == 'Locationid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Employeeid">Employeeid<% if (page.orderBy == 'Employeeid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Patientid">Patientid<% if (page.orderBy == 'Patientid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Starttime">Starttime<% if (page.orderBy == 'Starttime') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Endtime">Endtime<% if (page.orderBy == 'Endtime') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('locationid')) %>">
				<td><%= _.escape(item.get('locationid') || '') %></td>
				<td><%= _.escape(item.get('employeeid') || '') %></td>
				<td><%= _.escape(item.get('patientid') || '') %></td>
				<td><%if (item.get('starttime')) { %><%= _date(app.parseDate(item.get('starttime'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%if (item.get('endtime')) { %><%= _date(app.parseDate(item.get('endtime'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="appointmentModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="locationidInputContainer" class="control-group">
					<label class="control-label" for="locationid">Locationid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="locationid" placeholder="Locationid" value="<%= _.escape(item.get('locationid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="employeeidInputContainer" class="control-group">
					<label class="control-label" for="employeeid">Employeeid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="employeeid" placeholder="Employeeid" value="<%= _.escape(item.get('employeeid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="patientidInputContainer" class="control-group">
					<label class="control-label" for="patientid">Patientid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="patientid" placeholder="Patientid" value="<%= _.escape(item.get('patientid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="starttimeInputContainer" class="control-group">
					<label class="control-label" for="starttime">Starttime</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="starttime" type="text" value="<%= _date(app.parseDate(item.get('starttime'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="starttime-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('starttime'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="endtimeInputContainer" class="control-group">
					<label class="control-label" for="endtime">Endtime</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="endtime" type="text" value="<%= _date(app.parseDate(item.get('endtime'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="endtime-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('endtime'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteAppointmentButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteAppointmentButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Appointment</button>
						<span id="confirmDeleteAppointmentContainer" class="hide">
							<button id="cancelDeleteAppointmentButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteAppointmentButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="appointmentDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Appointment
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="appointmentModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveAppointmentButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="appointmentCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newAppointmentButton" class="btn btn-primary">Add Appointment</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
