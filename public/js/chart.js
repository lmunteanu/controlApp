      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Chrome', 72.5],
          ['IE', 5.3],
          ['Firefox', 16.3],
          ['Safari', 3.5],
          ['Opera', 1]
        ]);

        var options = {
          'title': 'The Most Popular Browsers',
          'pieHole': 0.4,
        };

        function resize() {
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
        window.onload = resize();
        window.onresize = resize;

      }
      