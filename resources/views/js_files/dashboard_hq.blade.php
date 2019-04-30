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
                  //max:{{$total_expense_limit}},
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
          ['Limit Exhausted: '+'<?php echo "₹".formatCurrency($limit_exhausted) ?>',<?php echo $limit_exhausted ?>],
          ['Available limit: '+'<?php echo "₹".formatCurrency($available_limit) ?>',<?php echo $available_limit ?>]
          
        
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
          sliceVisibilityThreshold: 0.000001,        
          colors: ['#dc3912', '#3366cc']

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
