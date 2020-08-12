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

var gradient = new am4core.LinearGradient();

gradient.addColor(am4core.color("#D91D7A", 1, 1));
gradient.addColor(am4core.color("#68B0BD", 1, 1));
gradient.cx = am4core.percent(100);
gradient.cy = am4core.percent(100);
gradient.gradientUnits = "userSpaceOnUse";

// Create map instance
var chart = am4core.create("chartdiv", am4maps.MapChart);

// Set map definition
chart.geodata = am4geodata_worldLow;

// Set projection
chart.projection = new am4maps.projections.Miller();

// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
chart.fill = gradient;

// Make map load polygon (like country names) data from GeoJSON
polygonSeries.useGeodata = true;

polygonSeries.exclude = ["AQ"];

polygonSeries.cursorOverStyle = am4core.MouseCursorStyle.pointer;

// Configure series
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.strokeWidth = 0;
polygonTemplate.fill = gradient;

// Create hover state and set alternative fill color
var hs = polygonTemplate.states.create("hover");
hs.properties.fill = am4core.color("#6887AA");

polygonTemplate.events.on("hit", function (ev) {
  // zoom to an object
  // ev.target.series.chart.zoomToMapObject(ev.target);
  // get object info
  // console.log(ev.target.dataItem.dataContext.name);
  console.log(ev.target.dataItem.dataContext.id);
});

$('g[aria-labelledby="id-73-title"]').css('display','none');