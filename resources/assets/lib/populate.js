/*! populate.js v1.0.2 by @dannyvankooten | MIT license */
; (function (root) {

	/**
	* Populate form fields from a JSON object.
	*
	* @param form object The form element containing your input fields.
	* @param data array JSON data to populate the fields with.
	* @param basename string Optional basename which is added to `name` attributes
	*/
	function populate(form, data, basename) {
		var that = {
			finished: function (callback) {
				callback();
			}
		};

		if (data === null) {
			form.reset();
			return that;
		}

		for (var key in data) {

			if (!data.hasOwnProperty(key)) {
				continue;
			}

			var name = key;
			var value = data[key];

			if ('undefined' === typeof value) {
				value = '';
			}

			if (null === value) {
				value = '';
			}

			// handle array name attributes
			if (typeof (basename) !== "undefined") {
				name = basename + "[" + key + "]";
			}

			if (value.constructor === Array) {
				name += '[]';
			} else if (typeof value == "object") {
				populate(form, value, name);
				continue;
			}

			// only proceed if element is set
			var element = form.elements.namedItem(name);
			if (!element) {
				continue;
			}

			var type = element.type || element[0].type;

			switch (type) {
				default:
					element.value = value;
					break;
				case 'radio':
				case 'checkbox':
					if (element.length) {
						for (var j = 0; j < element.length; j++) {
							element[j].checked = (value.constructor == Array) ? value.includes(element[j].value) : (value == element[j].value);
						}
					} else {
						element.checked = value == element.value;
					}
					break;

				case 'select-multiple':
					var values = (value.constructor == Array) ? value : [value];

					for (var k = 0; k < element.options.length; k++) {
						element.options[k].selected = (~values.indexOf(element.options[k].value));
					}
					break;

				case 'select':
				case 'select-one':
					element.value = value.toString() || value;
					break;
				case 'date':
					element.value = new Date(value).toISOString().split('T')[0];
					break;
			}

		}

		return that;
	};

	// Play nice with AMD, CommonJS or a plain global object.
	if (typeof define == 'function' && typeof define.amd == 'object' && define.amd) {
		define(function () {
			return populate;
		});
	} else if (typeof module !== 'undefined' && module.exports) {
		module.exports = populate;
	} else {
		root.populate = populate;
	}

}(this));
