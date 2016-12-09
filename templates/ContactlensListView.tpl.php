<?php
	$this->assign('title','OPTOMETRY | Contactlenses');
	$this->assign('nav','contactlenses');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/contactlenses.js").wait(function(){
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
	<i class="icon-th-list"></i> Contactlenses
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="contactlensCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Clensid">Clensid<% if (page.orderBy == 'Clensid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Name">Name<% if (page.orderBy == 'Name') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Basecurve">Basecurve<% if (page.orderBy == 'Basecurve') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Diameter">Diameter<% if (page.orderBy == 'Diameter') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Sphere">Sphere<% if (page.orderBy == 'Sphere') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Manufacturerid">Manufacturerid<% if (page.orderBy == 'Manufacturerid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('clensid')) %>">
				<td><%= _.escape(item.get('clensid') || '') %></td>
				<td><%= _.escape(item.get('name') || '') %></td>
				<td><%= _.escape(item.get('basecurve') || '') %></td>
				<td><%= _.escape(item.get('diameter') || '') %></td>
				<td><%= _.escape(item.get('sphere') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('manufacturerid') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="contactlensModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="clensidInputContainer" class="control-group">
					<label class="control-label" for="clensid">Clensid</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="clensid"><%= _.escape(item.get('clensid') || '') %></span>
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
				<div id="basecurveInputContainer" class="control-group">
					<label class="control-label" for="basecurve">Basecurve</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="basecurve" placeholder="Basecurve" value="<%= _.escape(item.get('basecurve') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="diameterInputContainer" class="control-group">
					<label class="control-label" for="diameter">Diameter</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="diameter" placeholder="Diameter" value="<%= _.escape(item.get('diameter') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="sphereInputContainer" class="control-group">
					<label class="control-label" for="sphere">Sphere</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="sphere" placeholder="Sphere" value="<%= _.escape(item.get('sphere') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="manufactureridInputContainer" class="control-group">
					<label class="control-label" for="manufacturerid">Manufacturerid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="manufacturerid" placeholder="Manufacturerid" value="<%= _.escape(item.get('manufacturerid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteContactlensButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteContactlensButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Contactlens</button>
						<span id="confirmDeleteContactlensContainer" class="hide">
							<button id="cancelDeleteContactlensButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteContactlensButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="contactlensDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Contactlens
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="contactlensModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveContactlensButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="contactlensCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newContactlensButton" class="btn btn-primary">Add Contactlens</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
