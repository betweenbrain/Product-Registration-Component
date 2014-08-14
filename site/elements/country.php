<?php defined('_JEXEC') or die;

/**
 * File       recipients.php
 * Created    8/1/14 11:38 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

JFormHelper::loadFieldClass('list');

class JFormFieldCountry extends JFormFieldList
{

	protected $type = 'Country';

	/**
	 * Get select options
	 *
	 * @return array
	 */
	public function getOptions()
	{

		$countries = array(
			"Select the Country"                           => "Select the Country",
			"United States"                                => "United States",
			"Afghanistan"                                  => "Afghanistan",
			"Aland Islands"                                => "Aland Islands",
			"Albania"                                      => "Albania",
			"Algeria"                                      => "Algeria",
			"American Samoa"                               => "American Samoa",
			"Andorra"                                      => "Andorra",
			"Angola"                                       => "Angola",
			"Anguilla"                                     => "Anguilla",
			"Antigua And Barbuda"                          => "Antigua And Barbuda",
			"Argentina"                                    => "Argentina",
			"Armenia"                                      => "Armenia",
			"Aruba"                                        => "Aruba",
			"Australia"                                    => "Australia",
			"Austria"                                      => "Austria",
			"Azerbaijan"                                   => "Azerbaijan",
			"Bahamas"                                      => "Bahamas",
			"Bahrain"                                      => "Bahrain",
			"Bangladesh"                                   => "Bangladesh",
			"Barbados"                                     => "Barbados",
			"Belarus"                                      => "Belarus",
			"Belgium"                                      => "Belgium",
			"Belize"                                       => "Belize",
			"Benin"                                        => "Benin",
			"Bermuda"                                      => "Bermuda",
			"Bhutan"                                       => "Bhutan",
			"Bolivia"                                      => "Bolivia",
			"Bosnia and Herzegowina"                       => "Bosnia and Herzegowina",
			"Botswana"                                     => "Botswana",
			"Bouvet Island"                                => "Bouvet Island",
			"Brazil"                                       => "Brazil",
			"British Antarctic Territory"                  => "British Antarctic Territory",
			"British Indian Ocean Territory"               => "British Indian Ocean Territory",
			"Brunei Darussalam"                            => "Brunei Darussalam",
			"Bulgaria"                                     => "Bulgaria",
			"Burkina Faso"                                 => "Burkina Faso",
			"Burundi"                                      => "Burundi",
			"Cambodia"                                     => "Cambodia",
			"Cameroon"                                     => "Cameroon",
			"Canada"                                       => "Canada",
			"Canton &amp; Enderbury I"                     => "Canton &amp; Enderbury I",
			"Cape Verde"                                   => "Cape Verde",
			"Cayman Islands"                               => "Cayman Islands",
			"Central African Republic"                     => "Central African Republic",
			"Chad"                                         => "Chad",
			"Chile"                                        => "Chile",
			"China"                                        => "China",
			"Christmas Island"                             => "Christmas Island",
			"Cocos (Keeling) Islands"                      => "Cocos (Keeling) Islands",
			"Colombia"                                     => "Colombia",
			"Comoros"                                      => "Comoros",
			"Congo, The Democratic Republic Of The"        => "Congo, The Democratic Republic Of The",
			"Cook Islands"                                 => "Cook Islands",
			"Costa Rica"                                   => "Costa Rica",
			"Cote D'ivoire"                                => "Cote D'ivoire",
			"Croatia"                                      => "Croatia",
			"Cyprus"                                       => "Cyprus",
			"Czech Republic"                               => "Czech Republic",
			"Denmark"                                      => "Denmark",
			"Djibouti"                                     => "Djibouti",
			"Dominica"                                     => "Dominica",
			"Dominican Republic"                           => "Dominican Republic",
			"Dronning Maud Land"                           => "Dronning Maud Land",
			"Ecuador"                                      => "Ecuador",
			"Egypt"                                        => "Egypt",
			"El Salvador"                                  => "El Salvador",
			"Equatorial Guinea"                            => "Equatorial Guinea",
			"Eritrea"                                      => "Eritrea",
			"Estonia"                                      => "Estonia",
			"Ethiopia"                                     => "Ethiopia",
			"Falkland Islands (Malvinas)"                  => "Falkland Islands (Malvinas)",
			"Faroe Islands"                                => "Faroe Islands",
			"Fiji"                                         => "Fiji",
			"Finland"                                      => "Finland",
			"France"                                       => "France",
			"French Guiana"                                => "French Guiana",
			"French Polynesia"                             => "French Polynesia",
			"French Southern Territories"                  => "French Southern Territories",
			"Gabon"                                        => "Gabon",
			"Gambia"                                       => "Gambia",
			"Georgia"                                      => "Georgia",
			"Germany"                                      => "Germany",
			"Ghana"                                        => "Ghana",
			"Gibraltar"                                    => "Gibraltar",
			"Gilbert Islands"                              => "Gilbert Islands",
			"Greece"                                       => "Greece",
			"Greenland"                                    => "Greenland",
			"Grenada"                                      => "Grenada",
			"Guadeloupe"                                   => "Guadeloupe",
			"Guam"                                         => "Guam",
			"Guatemala"                                    => "Guatemala",
			"Guernsey"                                     => "Guernsey",
			"Guinea"                                       => "Guinea",
			"Guinea-Bissau"                                => "Guinea-Bissau",
			"Guyana"                                       => "Guyana",
			"Haiti"                                        => "Haiti",
			"Heard And McDonald Islands"                   => "Heard And McDonald Islands",
			"Honduras"                                     => "Honduras",
			"Hong Kong"                                    => "Hong Kong",
			"Hungary"                                      => "Hungary",
			"Iceland"                                      => "Iceland",
			"India"                                        => "India",
			"Indonesia"                                    => "Indonesia",
			"Iraq"                                         => "Iraq",
			"Ireland"                                      => "Ireland",
			"Isle Of Man"                                  => "Isle Of Man",
			"Israel"                                       => "Israel",
			"Italy"                                        => "Italy",
			"Jamaica"                                      => "Jamaica",
			"Japan"                                        => "Japan",
			"Jersey"                                       => "Jersey",
			"Johnston Island"                              => "Johnston Island",
			"Jordan"                                       => "Jordan",
			"Kazakhstan"                                   => "Kazakhstan",
			"Kenya"                                        => "Kenya",
			"Kiribati"                                     => "Kiribati",
			"Kuwait"                                       => "Kuwait",
			"Kyrgyzstan"                                   => "Kyrgyzstan",
			"Lao People's Democratic Republic"             => "Lao People's Democratic Republic",
			"Latvia"                                       => "Latvia",
			"Lebanon"                                      => "Lebanon",
			"Lesotho"                                      => "Lesotho",
			"Liberia"                                      => "Liberia",
			"Libyan Arab Jamahiriya"                       => "Libyan Arab Jamahiriya",
			"Liechtenstein"                                => "Liechtenstein",
			"Lithuania"                                    => "Lithuania",
			"Luxembourg"                                   => "Luxembourg",
			"Macau"                                        => "Macau",
			"Macedonia"                                    => "Macedonia",
			"Madagascar"                                   => "Madagascar",
			"Malawi"                                       => "Malawi",
			"Malaysia"                                     => "Malaysia",
			"Maldives"                                     => "Maldives",
			"Mali"                                         => "Mali",
			"Malta"                                        => "Malta",
			"Marshall Islands"                             => "Marshall Islands",
			"Martinique"                                   => "Martinique",
			"Mauritania"                                   => "Mauritania",
			"Mauritius"                                    => "Mauritius",
			"Mexico"                                       => "Mexico",
			"Micronesia"                                   => "Micronesia",
			"Midway Islands"                               => "Midway Islands",
			"Moldova"                                      => "Moldova",
			"Monaco"                                       => "Monaco",
			"Mongolia"                                     => "Mongolia",
			"Montenegro"                                   => "Montenegro",
			"Montserrat"                                   => "Montserrat",
			"Morocco"                                      => "Morocco",
			"Mozambique"                                   => "Mozambique",
			"Namibia"                                      => "Namibia",
			"Nauru"                                        => "Nauru",
			"Nepal"                                        => "Nepal",
			"Netherlands"                                  => "Netherlands",
			"Netherlands Antilles"                         => "Netherlands Antilles",
			"New Caledonia"                                => "New Caledonia",
			"New Hebrides"                                 => "New Hebrides",
			"New Zealand"                                  => "New Zealand",
			"Nicaragua"                                    => "Nicaragua",
			"Niger"                                        => "Niger",
			"Nigeria"                                      => "Nigeria",
			"Norfolk Island"                               => "Norfolk Island",
			"Northern Mariana Islands"                     => "Northern Mariana Islands",
			"Norway"                                       => "Norway",
			"Oman"                                         => "Oman",
			"Pacific Islands"                              => "Pacific Islands",
			"Pakistan"                                     => "Pakistan",
			"Palau"                                        => "Palau",
			"Palestinian Territory, Occupied"              => "Palestinian Territory, Occupied",
			"Panama"                                       => "Panama",
			"Papua New Guinea"                             => "Papua New Guinea",
			"Paraguay"                                     => "Paraguay",
			"Peru"                                         => "Peru",
			"Philippines"                                  => "Philippines",
			"Pitcairn"                                     => "Pitcairn",
			"Poland"                                       => "Poland",
			"Portugal"                                     => "Portugal",
			"Puerto Rico"                                  => "Puerto Rico",
			"Qatar"                                        => "Qatar",
			"Reunion"                                      => "Reunion",
			"Romania"                                      => "Romania",
			"Russia"                                       => "Russia",
			"Rwanda"                                       => "Rwanda",
			"Saint Barthelemy"                             => "Saint Barthelemy",
			"Saint Kitts And Nevis"                        => "Saint Kitts And Nevis",
			"Saint Lucia"                                  => "Saint Lucia",
			"Saint Martin (French Portion)"                => "Saint Martin (French Portion)",
			"Saint Vincent And The Grenadines"             => "Saint Vincent And The Grenadines",
			"Saipan"                                       => "Saipan",
			"Samoa"                                        => "Samoa",
			"San Marino"                                   => "San Marino",
			"Sao Tome And Principe"                        => "Sao Tome And Principe",
			"Saudi Arabia"                                 => "Saudi Arabia",
			"Scotland"                                     => "Scotland",
			"Senegal"                                      => "Senegal",
			"Serbia (Republic Of Serbia)"                  => "Serbia (Republic Of Serbia)",
			"Seychelles"                                   => "Seychelles",
			"Sierra Leone"                                 => "Sierra Leone",
			"Singapore"                                    => "Singapore",
			"Slovakia"                                     => "Slovakia",
			"Slovenia"                                     => "Slovenia",
			"Solomon Islands"                              => "Solomon Islands",
			"Somalia"                                      => "Somalia",
			"Sou"                                          => "Sou",
			"South Africa"                                 => "South Africa",
			"South Georgia And The South Sandwich Islands" => "South Georgia And The South Sandwich Islands",
			"South Korea"                                  => "South Korea",
			"Southern Rhodesia"                            => "Southern Rhodesia",
			"Spain"                                        => "Spain",
			"Sri Lanka"                                    => "Sri Lanka",
			"St. Helena"                                   => "St. Helena",
			"St. Pierre And Miquelon"                      => "St. Pierre And Miquelon",
			"Suriname"                                     => "Suriname",
			"Svalbard And Jan Mayen Islands"               => "Svalbard And Jan Mayen Islands",
			"Swaziland"                                    => "Swaziland",
			"Switzerland"                                  => "Switzerland",
			"Taiwan"                                       => "Taiwan",
			"Tajikistan"                                   => "Tajikistan",
			"Tanzania, United Republic"                    => "Tanzania, United Republic",
			"Thailand"                                     => "Thailand",
			"Timor-Leste"                                  => "Timor-Leste",
			"Togo"                                         => "Togo",
			"Tokelau"                                      => "Tokelau",
			"Tonga"                                        => "Tonga",
			"Trinidad and Tobago"                          => "Trinidad and Tobago",
			"Tunisia"                                      => "Tunisia",
			"Turkey"                                       => "Turkey",
			"Turkmenistan"                                 => "Turkmenistan",
			"Turks And Caicos Islands"                     => "Turks And Caicos Islands",
			"Tuvalu"                                       => "Tuvalu",
			"Uganda"                                       => "Uganda",
			"Ukraine"                                      => "Ukraine",
			"United Arab Emirates"                         => "United Arab Emirates",
			"United Kingdom"                               => "United Kingdom",
			"Uruguay"                                      => "Uruguay",
			"Uzbekistan"                                   => "Uzbekistan",
			"Vanuatu"                                      => "Vanuatu",
			"Venezuela"                                    => "Venezuela",
			"Vietnam"                                      => "Vietnam",
			"Virgin Islands (British)"                     => "Virgin Islands (British)",
			"Wake Island"                                  => "Wake Island",
			"Wallis And Futuna Islands"                    => "Wallis And Futuna Islands",
			"West Indies"                                  => "West Indies",
			"Western Sahara"                               => "Western Sahara",
			"Yemen"                                        => "Yemen",
			"Yugoslavia"                                   => "Yugoslavia",
			"Zaire"                                        => "Zaire",
			"Zambia"                                       => "Zambia",
			"Zimbabwe"                                     => "Zimbabwe"
		);

		foreach ($countries as $key => $value) :
			$options[] = JHTML::_('select.option', $value, $key);
		endforeach;

		return $options;
	}
}
