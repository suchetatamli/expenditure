<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- add new bar chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    
    loadChartLine();
    loadChartPie();
    $(window).resize(function(){ 
      setTimeout( function(){ 
        loadChartLine();
        loadChartPie();
      }  , 1000 );
      
    });
    
    function loadChartLine(){
      google.charts.load('current', {packages: ['corechart', 'line']});
      google.charts.setOnLoadCallback(drawBasic);  
    }
    

    function drawBasic() {

          var data = new google.visualization.DataTable();
            data.addColumn('date', 'Amount of Day');
            data.addColumn('number', 'Amount');
            var jsonData = '[<?php echo $election_expense_data ?>]';
            var jsonArr = JSON.parse(jsonData);
            var list = [];
            for (row of jsonArr) {
               list.push([new Date(row.date),row.value]);
             }
            data.addRows(list);


            var options = {
              //title: 'Rate the Day on a Scale of expense incurred',
              curveType: 'function',
              
              hAxis: {
                format: 'd/M/yy',
                gridlines: {count: 15}
              },
              vAxis: {
                gridlines: {color: 'none',count: 15},
                //minValue: 0,
                //maxValue: 7000000,
                //viewWindowMode:'explicit',
                viewWindow: {
                  max:7000000,
                  min:0
                }
              },
              backgroundColor: '#fefa75',
              fontSize: 11,
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart.draw(data, options);

        }


      
      function loadChartPie(){
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);  
      }
      
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total amount '],
          ['Available limit: '+'<?php echo "₹".formatCurrency($available_limit) ?>',<?php echo $available_limit ?>],
          ['Limit Exhausted: '+'<?php echo "₹".formatCurrency($limit_exhausted) ?>',<?php echo $limit_exhausted ?>]
        
        ]);

        var options = {
          chartArea:{width:'100%', bottom: 72},
         // title: 'Total Expense Limit: '+'<?php //echo "₹ ".formatCurrency($total_expense_limit); ?>',
          //is3D: true,
          backgroundColor: '#fefa75',
          fontSize: 13,
          maxLines: 2,
          legend: { 
                    position: 'bottom',
                    alignment: 'center',
                    textStyle: {
                      fontSize: 13
                    },
                  },
          sliceVisibilityThreshold: 0.001,        

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var container = document.getElementById('piechart');



        if($(window).width() <= 450 ){

          google.visualization.events.addListener(chart, 'ready', function () { 
          var circles = container.getElementsByTagName('circle');
          var labels = container.getElementsByTagName('text');
          var labelIndex = -1;
          var fontSize;
          var radius;
          var xCoordCircle;
          var xCoordLabel;
          var yCoordLabel;
          var yCoordCircle;
          Array.prototype.forEach.call(labels, function(label, indx) { 
            if ((label.getAttribute('text-anchor') === 'start') && (label.getAttribute('fill') !== '#ffffff')) {
                labelIndex++;
                //console.log(data.jc[labelIndex][0].gf);

                label.textContent= data.jc[labelIndex][0].gf;//('aaaa');
                //label.setAttribute('width', 250);
              if (labelIndex === 0) {
                radius = parseFloat(circles[labelIndex].getAttribute('r'));
                xCoordCircle = circles[labelIndex].getAttribute('cx');
                xCoordLabel = label.getAttribute('x');
              } else {              
                fontSize = parseFloat(label.getAttribute('font-size')) * labelIndex;
                yCoordLabel = parseFloat(label.getAttribute('y'));              
                label.setAttribute('x', xCoordLabel);
                label.setAttribute('y', (yCoordLabel - fontSize - (radius * labelIndex)));
                yCoordCircle = parseFloat(circles[labelIndex].getAttribute('cy'));
                circles[labelIndex].setAttribute('cx', xCoordCircle);
                circles[labelIndex].setAttribute('cy', yCoordCircle - fontSize - (radius * labelIndex));
              }
            }
          });
        });
        }
        







        chart.draw(data, options);
      }
    </script>

  <!--  end of bar chart -->
<!-- ###### OLD CHART ########## --------- -->
<!-- <script>
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";

// Let's cut a hole in our Pie chart the size of 30% the radius
chart.innerRadius = am4core.percent(60);

// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = true;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);

pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;

// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;

// Add a legend
chart.legend = new am4charts.Legend();
chart.legend.position = "right";
chart.legend.itemContainers.template.fontSize = "11px";
chart.legend.valueLabels.template.text = "INR"+"{value.value}";

chart.data = [{
  "country": "Total Expenses Limit",
  "litres": {{$total_expense_limit}}
},{
  "country": "Limit Exhausted",
  "litres": {{$limit_exhausted}}
}, {
  "country": "Available Limit",
  "litres": {{$available_limit}}
}];

/*Line Graph*/

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);

// Add data
chart.data = [@php echo $election_expense_data; @endphp];

// Set input format for the dates
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.dateX = "date";
series.tooltipText = "{value}"
series.strokeWidth = 2;
series.minBulletDistance = 15;

// Drop-shaped tooltips
series.tooltip.background.cornerRadius = 20;
series.tooltip.background.strokeOpacity = 0;
series.tooltip.pointerOrientation = "vertical";
series.tooltip.label.minWidth = 40;
series.tooltip.label.minHeight = 40;
series.tooltip.label.textAlign = "middle";
series.tooltip.label.textValign = "middle";

// Make bullets grow on hover
var bullet = series.bullets.push(new am4charts.CircleBullet());
bullet.circle.strokeWidth = 2;
bullet.circle.radius = 4;
bullet.circle.fill = am4core.color("#fff");

var bullethover = bullet.states.create("hover");
bullethover.properties.scale = 1.3;

// Make a panning cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "panXY";
chart.cursor.xAxis = dateAxis;
chart.cursor.snapToSeries = series;

// Create vertical scrollbar and place it before the value axis
chart.scrollbarY = new am4core.Scrollbar();
chart.scrollbarY.parent = chart.leftAxesContainer;
chart.scrollbarY.toBack();

// Create a horizontal scrollbar with previe and place it underneath the date axis
chart.scrollbarX = new am4charts.XYChartScrollbar();
chart.scrollbarX.series.push(series);
chart.scrollbarX.parent = chart.bottomAxesContainer;

chart.events.on("ready", function () {
  dateAxis.zoom({start:0.79, end:1});
});



</script> -->