<?php
defined('BASEPATH') or exit('No direct script access allowed');
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . @$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

define('adminurl', 'https://artechnity.in/kaped-new/');
define('CREDITSAFE_BASE_URL', 'https://connect.creditsafe.com');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('BASE_URL', $base_url);

// US state code to name map
define('ICONS', [
	'CREDIT_SCORE' => BASE_URL . 'assets/images/icons/personal-credit-score.svg',
	'PERSONAL_CREDIT_SCORE' => BASE_URL . 'assets/images/icons/personal-credit-score.svg',
	'BUSINESS_CREDIT_SCORE' => BASE_URL . 'assets/images/icons/business-credit-score.svg',
	'CREDIT_CARDS' => BASE_URL . 'assets/images/icons/credit-cards.svg',
	'MONEY_BAG' => BASE_URL . 'assets/images/icons/money-bag.svg',
	'LIST' => BASE_URL . 'assets/images/icons/list.svg',
	'BITCOIN' => BASE_URL . 'assets/images/icons/bitcoin.svg',
	'MERCHANT_ACCOUNT' => BASE_URL . 'assets/images/icons/merchant-account.svg',
	'HAND_SHAKE' => BASE_URL . 'assets/images/icons/hand-shake.svg'
]);

// name titles
define('NAME_TITLES', [
	'CEO', 'CFO', 'Chairman', 'Co-owner', 'Controller', 'Director', 'General Manager', 'Office Manager', 'Owner', 'Partner', 'President', 'Treasurer', 'Vice President'
]);

// Currency code to name map
define('CURRENCIES', [
	"AED" => "United Arab Emirates dirham",
	"AFN" => "Afghan afghani",
	"ALL" => "Albanian lek",
	"AMD" => "Armenian dram",
	"ANG" => "Netherlands Antillean guilder",
	"AOA" => "Angolan kwanza",
	"ARS" => "Argentine peso",
	"AUD" => "Australian dollar",
	"AWG" => "Aruban florin",
	"AZN" => "Azerbaijani manat",
	"BAM" => "Bosnia and Herzegovina convertible mark",
	"BBD" => "Barbados dollar",
	"BDT" => "Bangladeshi taka",
	"BGN" => "Bulgarian lev",
	"BHD" => "Bahraini dinar",
	"BIF" => "Burundian franc",
	"BMD" => "Bermudian dollar",
	"BND" => "Brunei dollar",
	"BOB" => "Boliviano",
	"BRL" => "Brazilian real",
	"BSD" => "Bahamian dollar",
	"BTN" => "Bhutanese ngultrum",
	"BWP" => "Botswana pula",
	"BYN" => "New Belarusian ruble",
	"BYR" => "Belarusian ruble",
	"BZD" => "Belize dollar",
	"CAD" => "Canadian dollar",
	"CDF" => "Congolese franc",
	"CHF" => "Swiss franc",
	"CLF" => "Unidad de Fomento",
	"CLP" => "Chilean peso",
	"CNY" => "Renminbi|Chinese yuan",
	"COP" => "Colombian peso",
	"CRC" => "Costa Rican colon",
	"CUC" => "Cuban convertible peso",
	"CUP" => "Cuban peso",
	"CVE" => "Cape Verde escudo",
	"CZK" => "Czech koruna",
	"DJF" => "Djiboutian franc",
	"DKK" => "Danish krone",
	"DOP" => "Dominican peso",
	"DZD" => "Algerian dinar",
	"EGP" => "Egyptian pound",
	"ERN" => "Eritrean nakfa",
	"ETB" => "Ethiopian birr",
	"EUR" => "Euro",
	"FJD" => "Fiji dollar",
	"FKP" => "Falkland Islands pound",
	"GBP" => "Pound sterling",
	"GEL" => "Georgian lari",
	"GHS" => "Ghanaian cedi",
	"GIP" => "Gibraltar pound",
	"GMD" => "Gambian dalasi",
	"GNF" => "Guinean franc",
	"GTQ" => "Guatemalan quetzal",
	"GYD" => "Guyanese dollar",
	"HKD" => "Hong Kong dollar",
	"HNL" => "Honduran lempira",
	"HRK" => "Croatian kuna",
	"HTG" => "Haitian gourde",
	"HUF" => "Hungarian forint",
	"IDR" => "Indonesian rupiah",
	"ILS" => "Israeli new shekel",
	"INR" => "Indian rupee",
	"IQD" => "Iraqi dinar",
	"IRR" => "Iranian rial",
	"ISK" => "Icelandic króna",
	"JMD" => "Jamaican dollar",
	"JOD" => "Jordanian dinar",
	"JPY" => "Japanese yen",
	"KES" => "Kenyan shilling",
	"KGS" => "Kyrgyzstani som",
	"KHR" => "Cambodian riel",
	"KMF" => "Comoro franc",
	"KPW" => "North Korean won",
	"KRW" => "South Korean won",
	"KWD" => "Kuwaiti dinar",
	"KYD" => "Cayman Islands dollar",
	"KZT" => "Kazakhstani tenge",
	"LAK" => "Lao kip",
	"LBP" => "Lebanese pound",
	"LKR" => "Sri Lankan rupee",
	"LRD" => "Liberian dollar",
	"LSL" => "Lesotho loti",
	"LYD" => "Libyan dinar",
	"MAD" => "Moroccan dirham",
	"MDL" => "Moldovan leu",
	"MGA" => "Malagasy ariary",
	"MKD" => "Macedonian denar",
	"MMK" => "Myanmar kyat",
	"MNT" => "Mongolian tögrög",
	"MOP" => "Macanese pataca",
	"MRO" => "Mauritanian ouguiya",
	"MUR" => "Mauritian rupee",
	"MVR" => "Maldivian rufiyaa",
	"MWK" => "Malawian kwacha",
	"MXN" => "Mexican peso",
	"MXV" => "Mexican Unidad de Inversion",
	"MYR" => "Malaysian ringgit",
	"MZN" => "Mozambican metical",
	"NAD" => "Namibian dollar",
	"NGN" => "Nigerian naira",
	"NIO" => "Nicaraguan córdoba",
	"NOK" => "Norwegian krone",
	"NPR" => "Nepalese rupee",
	"NZD" => "New Zealand dollar",
	"OMR" => "Omani rial",
	"PAB" => "Panamanian balboa",
	"PEN" => "Peruvian Sol",
	"PGK" => "Papua New Guinean kina",
	"PHP" => "Philippine peso",
	"PKR" => "Pakistani rupee",
	"PLN" => "Polish złoty",
	"PYG" => "Paraguayan guaraní",
	"QAR" => "Qatari riyal",
	"RON" => "Romanian leu",
	"RSD" => "Serbian dinar",
	"RUB" => "Russian ruble",
	"RWF" => "Rwandan franc",
	"SAR" => "Saudi riyal",
	"SBD" => "Solomon Islands dollar",
	"SCR" => "Seychelles rupee",
	"SDG" => "Sudanese pound",
	"SEK" => "Swedish krona",
	"SGD" => "Singapore dollar",
	"SHP" => "Saint Helena pound",
	"SLL" => "Sierra Leonean leone",
	"SOS" => "Somali shilling",
	"SRD" => "Surinamese dollar",
	"SSP" => "South Sudanese pound",
	"STD" => "São Tomé and Príncipe dobra",
	"SVC" => "Salvadoran colón",
	"SYP" => "Syrian pound",
	"SZL" => "Swazi lilangeni",
	"THB" => "Thai baht",
	"TJS" => "Tajikistani somoni",
	"TMT" => "Turkmenistani manat",
	"TND" => "Tunisian dinar",
	"TOP" => "Tongan paʻanga",
	"TRY" => "Turkish lira",
	"TTD" => "Trinidad and Tobago dollar",
	"TWD" => "New Taiwan dollar",
	"TZS" => "Tanzanian shilling",
	"UAH" => "Ukrainian hryvnia",
	"UGX" => "Ugandan shilling",
	"USD" => "United States dollar",
	"UYI" => "Uruguay Peso en Unidades Indexadas",
	"UYU" => "Uruguayan peso",
	"UZS" => "Uzbekistan som",
	"VEF" => "Venezuelan bolívar",
	"VND" => "Vietnamese đồng",
	"VUV" => "Vanuatu vatu",
	"WST" => "Samoan tala",
	"XAF" => "Central African CFA franc",
	"XCD" => "East Caribbean dollar",
	"XOF" => "West African CFA franc",
	"XPF" => "CFP franc",
	"XXX" => "No currency",
	"YER" => "Yemeni rial",
	"ZAR" => "South African rand",
	"ZMW" => "Zambian kwacha",
	"ZWL" => "Zimbabwean dollar"
]);

// US state code to name map
define('US_STATE_CODE_TO_NAMES', [
	'AL' => 'ALABAMA',
	'AK' => 'ALASKA',
	'AZ' => 'ARIZONA',
	'AR' => 'ARKANSAS',
	'CA' => 'CALIFORNIA',
	'CO' => 'COLORADO',
	'CT' => 'CONNECTICUT',
	'DE' => 'DELAWARE',
	'DC' => 'DISTRICT OF COLUMBIA',
	'FL' => 'FLORIDA',
	'GA' => 'GEORGIA',
	'HI' => 'HAWAII',
	'ID' => 'IDAHO',
	'IL' => 'ILLINOIS',
	'IN' => 'INDIANA',
	'IA' => 'IOWA',
	'KS' => 'KANSAS',
	'KY' => 'KENTUCKY',
	'LA' => 'LOUISIANA',
	'ME' => 'MAINE',
	'MD' => 'MARYLAND',
	'MA' => 'MASSACHUSETTS',
	'MI' => 'MICHIGAN',
	'MN' => 'MINNESOTA',
	'MS' => 'MISSISSIPPI',
	'MO' => 'MISSOURI',
	'MT' => 'MONTANA',
	'NE' => 'NEBRASKA',
	'NV' => 'NEVADA',
	'NH' => 'NEW HAMPSHIRE',
	'NJ' => 'NEW JERSEY',
	'NM' => 'NEW MEXICO',
	'NY' => 'NEW YORK',
	'NC' => 'NORTH CAROLINA',
	'ND' => 'NORTH DAKOTA',
	'OH' => 'OHIO',
	'OK' => 'OKLAHOMA',
	'OR' => 'OREGON',
	'PA' => 'PENNSYLVANIA',
	'RI' => 'RHODE ISLAND',
	'SC' => 'SOUTH CAROLINA',
	'SD' => 'SOUTH DAKOTA',
	'TN' => 'TENNESSEE',
	'TX' => 'TEXAS',
	'UT' => 'UTAH',
	'VT' => 'VERMONT',
	'VA' => 'VIRGINIA',
	'WA' => 'WASHINGTON',
	'WV' => 'WEST VIRGINIA',
	'WI' => 'WISCONSIN',
	'WY' => 'WYOMING',
	'PR' => 'PUERTO RICO',
	'VI' => 'VIRGIN ISLANDS',
	'AE' => 'ARMED FORCES EUROPE/AFRICA/CANADA',
	'AA' => 'ARMED FORCES AMERICAS',
	'AP' => 'ARMED FORCES PACIFIC',
	'AS' => 'AMERICAN SAMOA',
	'GU' => 'GUAM',
	'PW' => 'PALAU',
	'FM' => 'FEDERATED STATES OF MICRONESIA',
	'MP' => 'NORTHERN MARIANA ISLANDS',
	'MH' => 'MARSHALL ISLANDS',

]);

// Country code to name map
define('COUNTRY_CODE_TO_NAMES', [
	"AF" => "Afghanistan",
	"AL" => "Albania",
	"DZ" => "Algeria",
	"AS" => "American Samoa",
	"AD" => "Andorra",
	"AO" => "Angola",
	"AI" => "Anguilla",
	"AQ" => "Antarctica",
	"AG" => "Antigua and Barbuda",
	"AR" => "Argentina",
	"AM" => "Armenia",
	"AW" => "Aruba",
	"AU" => "Australia",
	"AT" => "Austria",
	"AZ" => "Azerbaijan",
	"BS" => "Bahamas",
	"BH" => "Bahrain",
	"BD" => "Bangladesh",
	"BB" => "Barbados",
	"BY" => "Belarus",
	"BE" => "Belgium",
	"BZ" => "Belize",
	"BJ" => "Benin",
	"BM" => "Bermuda",
	"BT" => "Bhutan",
	"BO" => "Bolivia",
	"BA" => "Bosnia and Herzegovina",
	"BW" => "Botswana",
	"BV" => "Bouvet Island",
	"BR" => "Brazil",
	"BQ" => "British Antarctic Territory",
	"IO" => "British Indian Ocean Territory",
	"VG" => "British Virgin Islands",
	"BN" => "Brunei",
	"BG" => "Bulgaria",
	"BF" => "Burkina Faso",
	"BI" => "Burundi",
	"KH" => "Cambodia",
	"CM" => "Cameroon",
	"CA" => "Canada",
	"CT" => "Canton and Enderbury Islands",
	"CV" => "Cape Verde",
	"KY" => "Cayman Islands",
	"CF" => "Central African Republic",
	"TD" => "Chad",
	"CL" => "Chile",
	"CN" => "China",
	"CX" => "Christmas Island",
	"CC" => "Cocos [Keeling] Islands",
	"CO" => "Colombia",
	"KM" => "Comoros",
	"CG" => "Congo - Brazzaville",
	"CD" => "Congo - Kinshasa",
	"CK" => "Cook Islands",
	"CR" => "Costa Rica",
	"HR" => "Croatia",
	"CU" => "Cuba",
	"CY" => "Cyprus",
	"CZ" => "Czech Republic",
	"CI" => "Côte d’Ivoire",
	"DK" => "Denmark",
	"DJ" => "Djibouti",
	"DM" => "Dominica",
	"DO" => "Dominican Republic",
	"NQ" => "Dronning Maud Land",
	"DD" => "East Germany",
	"EC" => "Ecuador",
	"EG" => "Egypt",
	"SV" => "El Salvador",
	"GQ" => "Equatorial Guinea",
	"ER" => "Eritrea",
	"EE" => "Estonia",
	"ET" => "Ethiopia",
	"FK" => "Falkland Islands",
	"FO" => "Faroe Islands",
	"FJ" => "Fiji",
	"FI" => "Finland",
	"FR" => "France",
	"GF" => "French Guiana",
	"PF" => "French Polynesia",
	"TF" => "French Southern Territories",
	"FQ" => "French Southern and Antarctic Territories",
	"GA" => "Gabon",
	"GM" => "Gambia",
	"GE" => "Georgia",
	"DE" => "Germany",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GR" => "Greece",
	"GL" => "Greenland",
	"GD" => "Grenada",
	"GP" => "Guadeloupe",
	"GU" => "Guam",
	"GT" => "Guatemala",
	"GG" => "Guernsey",
	"GN" => "Guinea",
	"GW" => "Guinea-Bissau",
	"GY" => "Guyana",
	"HT" => "Haiti",
	"HM" => "Heard Island and McDonald Islands",
	"HN" => "Honduras",
	"HK" => "Hong Kong SAR China",
	"HU" => "Hungary",
	"IS" => "Iceland",
	"IN" => "India",
	"ID" => "Indonesia",
	"IR" => "Iran",
	"IQ" => "Iraq",
	"IE" => "Ireland",
	"IM" => "Isle of Man",
	"IL" => "Israel",
	"IT" => "Italy",
	"JM" => "Jamaica",
	"JP" => "Japan",
	"JE" => "Jersey",
	"JT" => "Johnston Island",
	"JO" => "Jordan",
	"KZ" => "Kazakhstan",
	"KE" => "Kenya",
	"KI" => "Kiribati",
	"KW" => "Kuwait",
	"KG" => "Kyrgyzstan",
	"LA" => "Laos",
	"LV" => "Latvia",
	"LB" => "Lebanon",
	"LS" => "Lesotho",
	"LR" => "Liberia",
	"LY" => "Libya",
	"LI" => "Liechtenstein",
	"LT" => "Lithuania",
	"LU" => "Luxembourg",
	"MO" => "Macau SAR China",
	"MK" => "Macedonia",
	"MG" => "Madagascar",
	"MW" => "Malawi",
	"MY" => "Malaysia",
	"MV" => "Maldives",
	"ML" => "Mali",
	"MT" => "Malta",
	"MH" => "Marshall Islands",
	"MQ" => "Martinique",
	"MR" => "Mauritania",
	"MU" => "Mauritius",
	"YT" => "Mayotte",
	"FX" => "Metropolitan France",
	"MX" => "Mexico",
	"FM" => "Micronesia",
	"MI" => "Midway Islands",
	"MD" => "Moldova",
	"MC" => "Monaco",
	"MN" => "Mongolia",
	"ME" => "Montenegro",
	"MS" => "Montserrat",
	"MA" => "Morocco",
	"MZ" => "Mozambique",
	"MM" => "Myanmar [Burma]",
	"NA" => "Namibia",
	"NR" => "Nauru",
	"NP" => "Nepal",
	"NL" => "Netherlands",
	"AN" => "Netherlands Antilles",
	"NT" => "Neutral Zone",
	"NC" => "New Caledonia",
	"NZ" => "New Zealand",
	"NI" => "Nicaragua",
	"NE" => "Niger",
	"NG" => "Nigeria",
	"NU" => "Niue",
	"NF" => "Norfolk Island",
	"KP" => "North Korea",
	"VD" => "North Vietnam",
	"MP" => "Northern Mariana Islands",
	"NO" => "Norway",
	"OM" => "Oman",
	"PC" => "Pacific Islands Trust Territory",
	"PK" => "Pakistan",
	"PW" => "Palau",
	"PS" => "Palestinian Territories",
	"PA" => "Panama",
	"PZ" => "Panama Canal Zone",
	"PG" => "Papua New Guinea",
	"PY" => "Paraguay",
	"YD" => "People's Democratic Republic of Yemen",
	"PE" => "Peru",
	"PH" => "Philippines",
	"PN" => "Pitcairn Islands",
	"PL" => "Poland",
	"PT" => "Portugal",
	"PR" => "Puerto Rico",
	"QA" => "Qatar",
	"RO" => "Romania",
	"RU" => "Russia",
	"RW" => "Rwanda",
	"RE" => "Réunion",
	"BL" => "Saint Barthélemy",
	"SH" => "Saint Helena",
	"KN" => "Saint Kitts and Nevis",
	"LC" => "Saint Lucia",
	"MF" => "Saint Martin",
	"PM" => "Saint Pierre and Miquelon",
	"VC" => "Saint Vincent and the Grenadines",
	"WS" => "Samoa",
	"SM" => "San Marino",
	"SA" => "Saudi Arabia",
	"SN" => "Senegal",
	"RS" => "Serbia",
	"CS" => "Serbia and Montenegro",
	"SC" => "Seychelles",
	"SL" => "Sierra Leone",
	"SG" => "Singapore",
	"SK" => "Slovakia",
	"SI" => "Slovenia",
	"SB" => "Solomon Islands",
	"SO" => "Somalia",
	"ZA" => "South Africa",
	"GS" => "South Georgia and the South Sandwich Islands",
	"KR" => "South Korea",
	"ES" => "Spain",
	"LK" => "Sri Lanka",
	"SD" => "Sudan",
	"SR" => "Suriname",
	"SJ" => "Svalbard and Jan Mayen",
	"SZ" => "Swaziland",
	"SE" => "Sweden",
	"CH" => "Switzerland",
	"SY" => "Syria",
	"ST" => "São Tomé and Príncipe",
	"TW" => "Taiwan",
	"TJ" => "Tajikistan",
	"TZ" => "Tanzania",
	"TH" => "Thailand",
	"TL" => "Timor-Leste",
	"TG" => "Togo",
	"TK" => "Tokelau",
	"TO" => "Tonga",
	"TT" => "Trinidad and Tobago",
	"TN" => "Tunisia",
	"TR" => "Turkey",
	"TM" => "Turkmenistan",
	"TC" => "Turks and Caicos Islands",
	"TV" => "Tuvalu",
	"UM" => "U.S. Minor Outlying Islands",
	"PU" => "U.S. Miscellaneous Pacific Islands",
	"VI" => "U.S. Virgin Islands",
	"UG" => "Uganda",
	"UA" => "Ukraine",
	"SU" => "Union of Soviet Socialist Republics",
	"AE" => "United Arab Emirates",
	"GB" => "United Kingdom",
	"US" => "United States",
	"ZZ" => "Unknown or Invalid Region",
	"UY" => "Uruguay",
	"UZ" => "Uzbekistan",
	"VU" => "Vanuatu",
	"VA" => "Vatican City",
	"VE" => "Venezuela",
	"VN" => "Vietnam",
	"WK" => "Wake Island",
	"WF" => "Wallis and Futuna",
	"EH" => "Western Sahara",
	"YE" => "Yemen",
	"ZM" => "Zambia",
	"ZW" => "Zimbabwe",
	"AX" => "Åland Islands",
]);

define('ROUTES', [
	'dashboard' => [
		'key' => 'dashboard',
		'label' => 'Dashboard',
		'url' => BASE_URL . 'dashboard'
	],
	'users' => [
		'key' => 'users',
		'label' => 'All Users',
		'url' => BASE_URL . 'users'
	],

	'partner' => [
		'key' => 'partner',
		'label' => 'Partners',
		'url' => BASE_URL . 'partner',
		'sub_menu' => [
			'add' => [
				'key' => 'Add Partner',
				'label' => 'Add Partner',
				'url' => BASE_URL . 'partner/createPartner',
			],
			'list' => [
				'key' => 'All Partner',
				'label' => 'All Partner',
				'url' => BASE_URL . 'partner',
			],
			'profile' => [
				'key' => 'Partner Profile',
				'label' => 'Partner Profile',
				'url' => BASE_URL . 'partner/profile',
			],
		]
	],

	'onboarding' => [
		'key' => 'onboarding',
		'label' => 'Onboarding',
		'url' => BASE_URL . 'Onboarding',
		'sub_menu' => [
			'merchant_account' => [
				'key' => 'merchant accounts',
				'label' => 'Merchant Accounts',
				'url' => BASE_URL . 'onboarding/merchantAccounts',
			],
			'banking' => [
				'key' => 'banking',
				'label' => 'Banking',
				'url' => BASE_URL . 'onboarding/banking',
			],
			'credit_card_application' => [
				'key' => 'credit card application',
				'label' => 'Credit Card Application',
				'url' => BASE_URL . 'onboarding/creditCard',
			],
		]
	],
	'tracking' => [
		'key' => 'tracking',
		'label' => 'tracking',
		'url' => BASE_URL . 'tracking',
		'sub_menu' => [
			'credit_monitoring' => [
				'key' => 'credit monitoring',
				'label' => "Credit Monitoring<br>Subscription",
				'url' => BASE_URL . 'tracking/creditMonitoring',
			],
			'credit_safe_report' => [
				'key' => 'credit safe report',
				'label' => "Credit Safe Reports",
				'url' => BASE_URL . 'tracking/CreditSafeReports',
			],
			'business_credit_score' => [
				'key' => 'business credit score',
				'label' => "Business Credit Scores",
				'url' => BASE_URL . 'tracking/businessCreditScores',
			],
			'personal_credit_score' => [
				'key' => 'personal credit score',
				'label' => "Personal Credit Scores",
				'url' => BASE_URL . 'tracking/personalCreditScores',
			],
		]
	]
]);

define('Salt', 'N@a@C@l');
