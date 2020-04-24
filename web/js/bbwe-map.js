/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 *
 * For more information visit:
 * https://www.amcharts.com/
 *
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Create map instance
var chart = am4core.create("chartdiv", am4maps.MapChart);

// set map background

chart.background.fill = am4core.color("#06101e");
chart.background.fillOpacity = 1;

// Hide logo
chart.logo.height = -15;

// Set map definition
chart.geodata = am4geodata_worldHigh;

// Set projection
chart.projection = new am4maps.projections.Miller();

// Disable zoom
chart.maxZoomLevel = 1;


// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

// Make map load polygon (like country names) data from GeoJSON
polygonSeries.useGeodata = true;


function genCountriesBG(color, contries) {
  let data = [];
  for( x in contries ) {
    data.push({
     "id" : contries[x],
     "fill": color
    })
  }
  return data;
}

// Declare somes gradient
var gradientLeft = new am4core.LinearGradient();
gradientLeft.addColor(am4core.color("rgba(51, 26, 51, 1)"));

var gradientGL = new am4core.LinearGradient();
gradientGL.addColor(am4core.color("rgba(46, 34, 56, 0.8)"));
//gradientGL.addColor(am4core.color("rgba(47, 37, 57, 0.9)"));


var gradientRight = new am4core.LinearGradient();
gradientRight.addColor(am4core.color("#2b2b3d"));


var gradientCenter = new am4core.LinearGradient();
gradientCenter.addColor(am4core.color("rgba(45, 39, 59, 1)"));


var gradientCTR = new am4core.LinearGradient();
gradientCTR.addColor(am4core.color("rgba(48, 33, 56, 1)"));
gradientCTR.addColor(am4core.color("rgba(43, 42, 60, 1)"));
gradientCTR.addColor(am4core.color("#2b2b3d"));



// Define list with left gradient
let leftCountries = [
  'US',
  'CA',
  'MX',
  'CU',
  'JM',
  'GT',
  'NI',
  'HN',
  'DO',
  'HR',
  'PA',
  'CR',
  'BZ',
  'SV',
  'HT',
  'PR',
  'TT',
  'MQ',
  'GP',
  'BS',
  'DM',
  'BB',
  'CW'
];

let rightCountries = [
  'RU',
  'MN',
  'CN',
  'AU',
  'KZ',
  'IN',
  'NP',
  'VN',
  'TH',
  'LA',
  'MM',
  'BD',
  'BT',
  'KH',
  'KR',
  'JP',
  'KP',
  'PH',
  'ID',
  'TW',
  'MY',
  'PG',
  'LK',
  'UZ',
  'IQ',
  'KG',
  'TJ',
  'PK',
  'TM',
  'AF',
  'IR',
  'KW',
  'AE',
  'OM',
  'QA',
  'GE',
  'AZ',
  'AM',
  'TL',
  'SB',
  'BN',
  'SG',
  'VU',
  'FJ',
  'NC',
  'NZ',
 
];

let centerCountries = [
  'EH',
  'MR',
  'MA',
  'ES',
  'DZ',
  'PT',
  'SN',
  'GN',
  'LR',
  'SL',
  'IS',
  'NO',
  'SE',
  'SJ',
  'LY',
  'ML',
  'NE',
  'BF',
  'CI',
  'GH',
  'BJ',
  'TG',
  'TD',
  'NG',
  'CM',
  'CF',
  'SD',
  'EG',
  'GA',
  'GW',
  'GM',
  'ET',
  'SS',
  'ER',
  'CD',
  'UG',
  'SO',
  'KE',
  'TZ',
  'CG',
  'TN',
  'IL',
  'GB',
  'IE',
  'FR',
  'DE',
  'BE',
  'NL',
  'DK',
  'PL',
  'LT',
  'RO',
  'CH',
  'MD',
  'BG',
  'IT',
  'CZ',
  'AT',
  'HU',
  'SK',
  'SI',
  'HI',
  'HR',
  'BA',
  'RS',
  'GR',
  'MK',
  'AL',
  'AD',
  'ME',
  'XK',
  'LU',
  'DJ',
  'AO',
  'ZM',
  'GQ',
  'BI',
  'RW',
  'MZ',
  'MW',
  'MG',
  'ZW',
  'BW',
  'NA',
  'ZA',
  'LS',
  'SZ',
  'RE',
  'MU',
  'KM',
  'TF',
  'FK'
];

// List the country between center and right.
let CTRCountries = [
  'YE',
  'SA',
  'SY',
  'JO',
  'PS',
  'LB',
  'CY',
  'UA',
  'BY',
  'EE',
  'FI',
  'LV',
  'TR'
]

let dataGRDL = genCountriesBG(gradientLeft, leftCountries);
let dataGRDR = genCountriesBG(gradientRight, rightCountries);
let dataGRDC = genCountriesBG(gradientCenter, centerCountries);
let dataGRCTR = genCountriesBG(gradientCTR, CTRCountries);
let dataGreenLand = genCountriesBG(gradientGL, ['GL','CO', 'VE', 'BR', 'GY', 'SR', 'EC', 'PY', 'PE', 'BO', 'GF', 'AR', 'CL','UY']);


// we merger All Array
let polyData = dataGRDL.concat(dataGRDR).concat(dataGRDC).concat(dataGRCTR).concat(dataGreenLand);

polygonSeries.data = polyData;

// Configure series
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.fill = am4core.color("#999");
polygonTemplate.strokeWidth = 0;
polygonTemplate.shapeRendering = 'geometricPrecision';

// Style cursor pointer
polygonTemplate.cursorOverStyle = am4core.MouseCursorStyle.pointer;

// Fill Background
polygonTemplate.propertyFields.fill = "fill";


// Event Click 
polygonTemplate.events.on("hit", function(ev) {
  let currentPolygon = ev.target.dataItem.dataContext;
  document.getElementById("info").innerHTML = "Clicked ID: "+ currentPolygon.id + "(" + currentPolygon.id + ")";
  if(currentPolygon.id==="GB"){
    location.href = baseUrl + "frontend/default/" + currentPolygon.id.toLowerCase();
  }else{
    location.href= baseUrl + "site/home";
  }  
 }, this);

// Create hover state and set alternative fill color
var hs = polygonTemplate.states.create("hover");
hs.properties.strokeWidth = 1;
hs.properties.stroke = am4core.color('#909199');

// Remove Antarctica
polygonSeries.exclude = ["AQ"];

