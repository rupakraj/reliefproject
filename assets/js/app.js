var defaultPageSize = 100,
	pagesizeoptions = ['25', '50', '100', '500'],
	formatString_yyyy_MM_dd = 'yyyy-MM-dd',
	formatString_yyyy_MM_dd_HH_mm = 'yyyy-MM-dd HH:mm',
	formatString_yyyy_MM_dd_HH_mm_ss = 'yyyy-MM-dd HH:mm:ss',
	theme_datatable  = 'bootstrap',
	theme_dock  = 'bootstrap',
	theme_grid  = 'bootstrap',
	theme_button = 'bootstrap',
	theme_window = 'bootstrap',
	theme_combo = 'bootstrap',
	theme_input = 'bootstrap',
	theme_expander = 'bootstrap',
	theme_tab = 'bootstrap',
	array_period_in_days = new Array('','30', '90', '120', '180', '360', '720'),
	pattern_url = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/,
	pattern_phone_mobile_fax = /([0-9\s\-]{7,})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/,
	gridHeight = (window.innerHeight - 200),
	array_countries = new Array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Island", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czeck Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia, The", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Ireland, Northern", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Man, Isle of", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcaim Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romainia", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Scotland", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tobago", "Toga", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "USA", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wales", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
	array_hierarchy_names = new Array('','COUNTRY','DISTRICT','REGION','ZONE'),
	array_location_types = new Array('','C','D','M','R','V','Z'),
	rownumberRenderer = function (row, column, value) {
		return '<div style="text-align: center; margin-top: 8px;">' + (1 + value) + '</div>';
	},
	gridColumnsRenderer = function (value) {
		return '<div style="text-align: center; margin-top: 8px;">' + value + '</div>';
	};
	



// For todays date;
Date.prototype.now = function () { 
    return  this.getFullYear() +"-"+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +"-"+ ((this.getDate() < 10)?"0":"") + this.getDate() + ' ' + ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();;
}

 Date.prototype.formatDate = function() {
   var yyyy = this.getFullYear().toString();
   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
   var dd  = this.getDate().toString();
   return yyyy + (mm[1]?mm:"0"+mm[0]) + (dd[1]?dd:"0"+dd[0]); // padding
};

$(document).ready(function () {
	

	if ($(".jqxExpander")[0]){
		$(".jqxExpander").jqxExpander({ width: 'auto', theme: theme_expander });
	}
	if ($(".jqxExpander")[0]){
		$(".jqxExpander").jqxExpander({ width: 'auto', theme: theme_expander });
	}
	if ($(".jqxExpander-collasped")[0]){
		$(".jqxExpander-collasped").jqxExpander({ width: 'auto', expanded: false , theme: theme_expander });
	}
	if ($(".text_input")[0]){
		$(".text_input").jqxInput({ width: 195,height: 25, theme: theme_input });
	}
	if ($(".text_area")[0]){
		$(".text_area").jqxInput({ width: 525,height: 125, theme: theme_input });
	}
	if ($(".combo_box")[0]){
		$(".combo_box").jqxComboBox({ width: 195, height: 25, selectionMode: 'dropDownList', autoComplete: true, searchMode: 'containsignorecase', theme: theme_combo });
	}
	if ($(".date_box")[0]){
		$(".date_box").jqxDateTimeInput({ width: 195, height: 25, formatString: formatString_yyyy_MM_dd, theme: theme_combo });
	}
	if ($(".number_general")[0]){
		$(".number_general").jqxNumberInput({ width: 195,height: 25, inputMode: 'simple', spinButtons: true, min: 0, digits:10, max: 9999999999, decimalDigits: 0, spinButtonsStep: 1, theme: theme_input });
	}
	if ($(".number_percentage")[0]){
		$(".number_percentage").jqxNumberInput({ width: 195,height: 25, inputMode: 'simple', spinButtons: true, min: 0, digits:2, decimalDigits: 1, spinButtonsStep: 1, theme: theme_input });
	}
	if ($(".number_currency")[0]){
		$(".number_currency").jqxNumberInput({ width: 195,height: 25, inputMode: 'simple', spinButtons: true, min: -9999999999, decimalDigits: 2, theme: theme_input });
	}
	if ($(".jqxTabs")[0]){
		$('.jqxTabs').jqxTabs({ width: '100%', height: 235, position: 'top', theme: theme_tab});
	}
});

function openPopupWindow() {
    var x = ($(window).width() - $("#jqxPopupWindow").jqxWindow('width')) / 2 + $(window).scrollLeft(),
        y = ($(window).height() - $("#jqxPopupWindow").jqxWindow('height')) / 2 + $(window).scrollTop();
    
    title = arguments[0];

    $('#window_poptup_title').html(title);

    $("#jqxPopupWindow").jqxWindow({ position: { x: x, y: y} });
    $("#jqxPopupWindow").jqxWindow('open');

}
