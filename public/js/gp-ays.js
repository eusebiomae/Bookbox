// doT
!function(){"use strict";var u,d={name:"doT",version:"1.1.1",templateSettings:{evaluate:/\{\{([\s\S]+?(\}?)+)\}\}/g,interpolate:/\{\{=([\s\S]+?)\}\}/g,encode:/\{\{!([\s\S]+?)\}\}/g,use:/\{\{#([\s\S]+?)\}\}/g,useParams:/(^|[^\w$])def(?:\.|\[[\'\"])([\w$\.]+)(?:[\'\"]\])?\s*\:\s*([\w$\.]+|\"[^\"]+\"|\'[^\']+\'|\{[^\}]+\})/g,define:/\{\{##\s*([\w\.$]+)\s*(\:|=)([\s\S]+?)#\}\}/g,defineParams:/^\s*([\w$]+):([\s\S]+)/,conditional:/\{\{\?(\?)?\s*([\s\S]*?)\s*\}\}/g,iterate:/\{\{~\s*(?:\}\}|([\s\S]+?)\s*\:\s*([\w$]+)\s*(?:\:\s*([\w$]+))?\s*\}\})/g,varname:"it",strip:!0,append:!0,selfcontained:!1,doNotSkipEncoded:!1},template:void 0,compile:void 0,log:!0};d.encodeHTMLSource=function(e){var n={"&":"&#38;","<":"&#60;",">":"&#62;",'"':"&#34;","'":"&#39;","/":"&#47;"},t=e?/[&<>"'\/]/g:/&(?!#?\w+;)|<|>|"|'|\//g;return function(e){return e?e.toString().replace(t,function(e){return n[e]||e}):""}},u=function(){return this||(0,eval)("this")}(),"undefined"!=typeof module&&module.exports?module.exports=d:"function"==typeof define&&define.amd?define(function(){return d}):u.doT=d;var s={append:{start:"'+(",end:")+'",startencode:"'+encodeHTML("},split:{start:"';out+=(",end:");out+='",startencode:"';out+=encodeHTML("}},p=/$^/;function l(e){return e.replace(/\\('|\\)/g,"$1").replace(/[\r\t\n]/g," ")}d.template=function(e,n,t){var r,o,a=(n=n||d.templateSettings).append?s.append:s.split,c=0,i=n.use||n.define?function r(o,e,a){return("string"==typeof e?e:e.toString()).replace(o.define||p,function(e,r,n,t){return 0===r.indexOf("def.")&&(r=r.substring(4)),r in a||(":"===n?(o.defineParams&&t.replace(o.defineParams,function(e,n,t){a[r]={arg:n,text:t}}),r in a||(a[r]=t)):new Function("def","def['"+r+"']="+t)(a)),""}).replace(o.use||p,function(e,n){o.useParams&&(n=n.replace(o.useParams,function(e,n,t,r){if(a[t]&&a[t].arg&&r){var o=(t+":"+r).replace(/'|\\/g,"_");return a.__exp=a.__exp||{},a.__exp[o]=a[t].text.replace(new RegExp("(^|[^\\w$])"+a[t].arg+"([^\\w$])","g"),"$1"+r+"$2"),n+"def.__exp['"+o+"']"}}));var t=new Function("def","return "+n)(a);return t?r(o,t,a):t})}(n,e,t||{}):e;i=("var out='"+(n.strip?i.replace(/(^|\r|\n)\t* +| +\t*(\r|\n|$)/g," ").replace(/\r|\n|\t|\/\*[\s\S]*?\*\//g,""):i).replace(/'|\\/g,"\\$&").replace(n.interpolate||p,function(e,n){return a.start+l(n)+a.end}).replace(n.encode||p,function(e,n){return r=!0,a.startencode+l(n)+a.end}).replace(n.conditional||p,function(e,n,t){return n?t?"';}else if("+l(t)+"){out+='":"';}else{out+='":t?"';if("+l(t)+"){out+='":"';}out+='"}).replace(n.iterate||p,function(e,n,t,r){return n?(c+=1,o=r||"i"+c,n=l(n),"';var arr"+c+"="+n+";if(arr"+c+"){var "+t+","+o+"=-1,l"+c+"=arr"+c+".length-1;while("+o+"<l"+c+"){"+t+"=arr"+c+"["+o+"+=1];out+='"):"';} } out+='"}).replace(n.evaluate||p,function(e,n){return"';"+l(n)+"out+='"})+"';return out;").replace(/\n/g,"\\n").replace(/\t/g,"\\t").replace(/\r/g,"\\r").replace(/(\s|;|\}|^|\{)out\+='';/g,"$1").replace(/\+''/g,""),r&&(n.selfcontained||!u||u._encodeHTML||(u._encodeHTML=d.encodeHTMLSource(n.doNotSkipEncoded)),i="var encodeHTML = typeof _encodeHTML !== 'undefined' ? _encodeHTML : ("+d.encodeHTMLSource.toString()+"("+(n.doNotSkipEncoded||"")+"));"+i);try{return new Function(n.varname,i)}catch(e){throw"undefined"!=typeof console&&console.log("Could not create a template function: "+i),e}},d.compile=function(e,n){return d.template(e,null,n)}}();

!function(e,i){if("function"==typeof define&&define.amd)define(["exports","jquery"],function(e,r){return i(e,r)});else if("undefined"!=typeof exports){var r=require("jquery");i(exports,r)}else i(e,e.jQuery||e.Zepto||e.ender||e.$)}(this,function(e,i){function r(e,r){function n(e,i,r){return e[i]=r,e}function a(e,i){for(var r,a=e.match(t.key);void 0!==(r=a.pop());)if(t.push.test(r)){var u=s(e.replace(/\[\]$/,""));i=n([],u,i)}else t.fixed.test(r)?i=n([],r,i):t.named.test(r)&&(i=n({},r,i));return i}function s(e){return void 0===h[e]&&(h[e]=0),h[e]++}function u(e){switch(i('[name="'+e.name+'"]',r).attr("type")){case"checkbox":return"on"===e.value?!0:e.value;default:return e.value}}function f(i){if(!t.validate.test(i.name))return this;var r=a(i.name,u(i));return l=e.extend(!0,l,r),this}function d(i){if(!e.isArray(i))throw new Error("formSerializer.addPairs expects an Array");for(var r=0,t=i.length;t>r;r++)this.addPair(i[r]);return this}function o(){return l}function c(){return JSON.stringify(o())}var l={},h={};this.addPair=f,this.addPairs=d,this.serialize=o,this.serializeJSON=c}var t={validate:/^[a-z_][a-z0-9_]*(?:\[(?:\d*|[a-z0-9_]+)\])*$/i,key:/[a-z0-9_]+|(?=\[\])/gi,push:/^$/,fixed:/^\d+$/,named:/^[a-z0-9_]+$/i};return r.patterns=t,r.serializeObject=function(){return new r(i,this).addPairs(this.serializeArray()).serialize()},r.serializeJSON=function(){return new r(i,this).addPairs(this.serializeArray()).serializeJSON()},"undefined"!=typeof i.fn&&(i.fn.serializeObject=r.serializeObject,i.fn.serializeJSON=r.serializeJSON),e.FormSerializer=r,r});

function populateSelectBox(params) {
	var options = [];

	if (params.emptyOption) {
		var option = document.createElement('option');

		option.value = params.emptyOption.value || '';
		option.innerText = params.emptyOption.label || '';

		options.push(option);
	}

	params.list.forEach(function (item) {
		var option = document.createElement('option');

		option.value = item[params.columnValue];
		option.innerHTML = item[params.columnLabel];
		option.dataJson = item;

		if (params.selectBy && params.selectBy.length) {
			option.selected = params.selectBy.some(function (item) {
				return item == option.value;
			});
		}

		options.push(option);
	});

	if (params.target) {

		if (params.target.length && !params.target.tagName == 'SELECT') {
			for (var i = params.target.length - 1; i > -1; i--) {
				params.target[i].innerHTML = '';

				for (var j = 0; j < options.length; j++) {
					var option = options[j].cloneNode();
					option.value = options[j].value;
					option.innerHTML = options[j].innerHTML;
					option.dataJson = options[j].dataJson;
					option.selected = options[j].selected;

					params.target[i].options.add(option);
				}
			}
		} else {
			params.target.innerHTML = '';
			for (var j = 0; j < options.length; j++) {
				params.target.options.add(options[j]);
			}
		}
	}
}

function setTmplInsertAdjacentHTML(params) {
	var tmpl = params.tmpl;
	var toTmpl = params.toTmpl;
	var data = params.data;

	var tmplElem = doT.template(document.getElementById(tmpl).innerText, null, null);

	document.getElementById(toTmpl).insertAdjacentHTML('beforeend', tmplElem(data));

	return document.getElementById(toTmpl).lastChild;
};

function setTmpl(params) {
	var data = params.data;
	var tmpl = params.tmplId;
	var toTmpl = params.toTmplId;

	var tmplElem = doT.template(document.getElementById(tmpl).innerText, null, null);

	document.getElementById(toTmpl).innerHTML = tmplElem(data);
};

function numberWithCommas(x, d) {
	if (x) {
		var parts = parseFloat(x).toFixed(d).split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");

		return parts.join(",");
	}

	return x;
};

function strToNumber(v) {
	return parseFloat(v == parseFloat(v) ? v : v.toString().replace('.', '').replace(',', '.'));
}

function setDatePicker(selector, params) {
	var opts = {
		// todayBtn: "linked",
		keyboardNavigation: true,
		forceParse: false,
		calendarWeeks: true,
		autoclose: true,
		format: "dd/mm/yyyy",
		container: "body",
		language: 'pt-BR',
	}

	if (params) {
		Object.assign(opts, params)
	}

	$(selector).datepicker(opts);
}

function showDatePicker(selector) {
	$(selector).datepicker('show');
}

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
				element.options[k].selected = values.some(function(val) { return val == element.options[k].value });
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
}

function searchToObj(search) {
	return decodeURI(search || window.location.search).substr(1).split('&').reduce(function(carry, item) {
		var keyVal = item.split('=')

		if (keyVal.length == 2) {
			carry[keyVal[0]] = keyVal[1]
		}

		return carry
	}, {})
}

function setClockpicker(selector, params) {
	var opts = {
		autoclose: true,
	}

	if (params) {
		Object.assign(opts, params)
	}

	$(selector).clockpicker(opts);
}

$(function() {
	if ($.fn.datepicker) {
		$.fn.datepicker.dates['pt-BR'] = {
			days: ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
			daysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
			daysMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
			months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			today: "Hoje",
			clear: "Limpar",
			format: "mm/dd/yyyy",
			titleFormat: "MM yyyy",
			weekStart: 0,
		};
	}

	try {
		if ($.fn.dataTable && $.fn.dataTable.ext) {
			$.fn.dataTable.ext.errMode = 'none'
			$.extend( true, $.fn.dataTable.defaults, {
				pageLength: 50,
				processing: true,
				responsive: true,
				searching: true,
				dom: '<"text-left"l><"html5buttons"<"inline-block"f"><"inline-block"B>>t<"bottom"ip>gTr<"clear">',
				buttons: [
					{
						extend: 'copy'
					},
					{
						extend: 'csv',
					},
					{
						extend: 'excel',
					},
					{
						extend: 'pdf',
					},
					{
						extend: 'print',
						customize: function(win) {
							$(win.document.body).addClass('white-bg');
							$(win.document.body).css('font-size', '10px');

							$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
						}
					}
				],
				language: {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					},
					"select": {
						"rows": {
							"_": "Selecionado %d linhas",
							"0": "Nenhuma linha selecionada",
							"1": "Selecionado 1 linha"
						}
					},
					"buttons": {
						"copy": "Copiar",
						"copyTitle": "Cópia bem sucedida",
						"copySuccess": {
							"1": "Uma linha copiada com sucesso",
							"_": "%d linhas copiadas com sucesso"
						}
					}
				}
			});
		}
	} catch (error) {
		console.warn(error);
	}
})

