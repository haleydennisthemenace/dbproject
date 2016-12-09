<?php
	$this->assign('title','OPTOMETRY | Orders');
	$this->assign('nav','orders');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/orders.js").wait(function(){
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
	<i class="icon-th-list"></i> Orders
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="orderCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Orderid">Orderid<% if (page.orderBy == 'Orderid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Clensid">Clensid<% if (page.orderBy == 'Clensid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Glensid">Glensid<% if (page.orderBy == 'Glensid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Price">Price<% if (page.orderBy == 'Price') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Quantity">Quantity<% if (page.orderBy == 'Quantity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Received">Received<% if (page.orderBy == 'Received') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('orderid')) %>">
				<td><%= _.escape(item.get('orderid') || '') %></td>
				<td><%= _.escape(item.get('clensid') || '') %></td>
				<td><%= _.escape(item.get('glensid') || '') %></td>
				<td><%= _.escape(item.get('price') || '') %></td>
				<td><%= _.escape(item.get('quantity') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('received') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="orderModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="orderidInputContainer" class="control-group">
					<label class="control-label" for="orderid">Orderid</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="orderid"><%= _.escape(item.get('orderid') || '') %></span>
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
				<div id="priceInputContainer" class="control-group">
					<label class="control-label" for="price">Price</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="price" placeholder="Price" value="<%= _.escape(item.get('price') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="quantityInputContainer" class="control-group">
					<label class="control-label" for="quantity">Quantity</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="quantity" placeholder="Quantity" value="<%= _.escape(item.get('quantity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="receivedInputContainer" class="control-group">
					<label class="control-label" for="received">Received</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="received" placeholder="Received" value="<%= _.escape(item.get('received') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteOrderButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteOrderButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Order</button>
						<span id="confirmDeleteOrderContainer" class="hide">
							<button id="cancelDeleteOrderButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteOrderButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="orderDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Order
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="orderModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveOrderButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="orderCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newOrderButton" class="btn btn-primary">Add Order</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
