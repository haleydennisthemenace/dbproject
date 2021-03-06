/**
 * backbone model definitions for OPTOMETRY
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Appointment Backbone Model
 */
model.AppointmentModel = Backbone.Model.extend({
	urlRoot: 'api/appointment',
	idAttribute: 'locationid',
	locationid: '',
	employeeid: '',
	patientid: '',
	starttime: '',
	endtime: '',
	defaults: {
		'locationid': null,
		'employeeid': '',
		'patientid': '',
		'starttime': new Date(),
		'endtime': new Date()
	}
});

/**
 * Appointment Backbone Collection
 */
model.AppointmentCollection = model.AbstractCollection.extend({
	url: 'api/appointments',
	model: model.AppointmentModel
});

/**
 * Contactlens Backbone Model
 */
model.ContactlensModel = Backbone.Model.extend({
	urlRoot: 'api/contactlens',
	idAttribute: 'clensid',
	clensid: '',
	name: '',
	basecurve: '',
	diameter: '',
	sphere: '',
	manufacturerid: '',
	defaults: {
		'clensid': null,
		'name': '',
		'basecurve': '',
		'diameter': '',
		'sphere': '',
		'manufacturerid': ''
	}
});

/**
 * Contactlens Backbone Collection
 */
model.ContactlensCollection = model.AbstractCollection.extend({
	url: 'api/contactlenses',
	model: model.ContactlensModel
});

/**
 * Eye Backbone Model
 */
model.EyeModel = Backbone.Model.extend({
	urlRoot: 'api/eye',
	idAttribute: 'patientid',
	patientid: '',
	side: '',
	color: '',
	prescriptionid: '',
	defaults: {
		'patientid': null,
		'side': '',
		'color': '',
		'prescriptionid': ''
	}
});

/**
 * Eye Backbone Collection
 */
model.EyeCollection = model.AbstractCollection.extend({
	url: 'api/eyes',
	model: model.EyeModel
});

/**
 * Glasseslens Backbone Model
 */
model.GlasseslensModel = Backbone.Model.extend({
	urlRoot: 'api/glasseslens',
	idAttribute: 'glensid',
	glensid: '',
	sphere: '',
	basecurve: '',
	manufid: '',
	defaults: {
		'glensid': null,
		'sphere': '',
		'basecurve': '',
		'manufid': ''
	}
});

/**
 * Glasseslens Backbone Collection
 */
model.GlasseslensCollection = model.AbstractCollection.extend({
	url: 'api/glasseslenses',
	model: model.GlasseslensModel
});

/**
 * Manufacturer Backbone Model
 */
model.ManufacturerModel = Backbone.Model.extend({
	urlRoot: 'api/manufacturer',
	idAttribute: 'manufid',
	manufid: '',
	name: '',
	address: '',
	defaults: {
		'manufid': null,
		'name': '',
		'address': ''
	}
});

/**
 * Manufacturer Backbone Collection
 */
model.ManufacturerCollection = model.AbstractCollection.extend({
	url: 'api/manufacturers',
	model: model.ManufacturerModel
});

/**
 * Office Backbone Model
 */
model.OfficeModel = Backbone.Model.extend({
	urlRoot: 'api/office',
	idAttribute: 'officeid',
	officeid: '',
	name: '',
	address: '',
	phone: '',
	defaults: {
		'officeid': null,
		'name': '',
		'address': '',
		'phone': ''
	}
});

/**
 * Office Backbone Collection
 */
model.OfficeCollection = model.AbstractCollection.extend({
	url: 'api/offices',
	model: model.OfficeModel
});

/**
 * Optometrist Backbone Model
 */
model.OptometristModel = Backbone.Model.extend({
	urlRoot: 'api/optometrist',
	idAttribute: 'employeeid',
	employeeid: '',
	name: '',
	password: '',
	title: '',
	defaults: {
		'employeeid': null,
		'name': '',
		'password': '',
		'title': ''
	}
});

/**
 * Optometrist Backbone Collection
 */
model.OptometristCollection = model.AbstractCollection.extend({
	url: 'api/optometrists',
	model: model.OptometristModel
});

/**
 * Order Backbone Model
 */
model.OrderModel = Backbone.Model.extend({
	urlRoot: 'api/order',
	idAttribute: 'orderid',
	orderid: '',
	clensid: '',
	glensid: '',
	price: '',
	quantity: '',
	received: '',
	defaults: {
		'orderid': null,
		'clensid': '',
		'glensid': '',
		'price': '',
		'quantity': '',
		'received': ''
	}
});

/**
 * Order Backbone Collection
 */
model.OrderCollection = model.AbstractCollection.extend({
	url: 'api/orders',
	model: model.OrderModel
});

/**
 * Patient Backbone Model
 */
model.PatientModel = Backbone.Model.extend({
	urlRoot: 'api/patient',
	idAttribute: 'patientid',
	patientid: '',
	name: '',
	prescriptionid1: '',
	prescriptionid2: '',
	phone1: '',
	phone2: '',
	housenumber: '',
	street: '',
	city: '',
	state: '',
	zipcode: '',
	defaults: {
		'patientid': null,
		'name': '',
		'prescriptionid1': '',
		'prescriptionid2': '',
		'phone1': '',
		'phone2': '',
		'housenumber': '',
		'street': '',
		'city': '',
		'state': '',
		'zipcode': ''
	}
});

/**
 * Patient Backbone Collection
 */
model.PatientCollection = model.AbstractCollection.extend({
	url: 'api/patients',
	model: model.PatientModel
});

/**
 * Prescription Backbone Model
 */
model.PrescriptionModel = Backbone.Model.extend({
	urlRoot: 'api/prescription',
	idAttribute: 'prescriptionid',
	prescriptionid: '',
	optometristid: '',
	clensid: '',
	glensid: '',
	defaults: {
		'prescriptionid': null,
		'optometristid': '',
		'clensid': '',
		'glensid': ''
	}
});

/**
 * Prescription Backbone Collection
 */
model.PrescriptionCollection = model.AbstractCollection.extend({
	url: 'api/prescriptions',
	model: model.PrescriptionModel
});

