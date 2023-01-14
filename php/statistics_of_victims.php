<?php

require("dbconnect.php");

// Для первого графика
$query = mysqli_query($connect, "SELECT * FROM statistics_of_victims");
$regions = array();

while ($string = mysqli_fetch_assoc($query)) {
   array_push($regions, $string["Subject"]);
}

$regions = array_unique($regions);

// Для второго графика
$query = mysqli_query($connect, "SELECT * FROM statistics_of_victims");
$raitings_of_regions = array();

while ($string = mysqli_fetch_assoc($query)) {
   $raitings_of_regions[$string["Subject"]] += (int) $row["Importance_of_the_statistical_factor"];
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/graph.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
    <link
      rel="shortcut icon"
      href="../images/road-accident-svgrepo-com.svg"
      type="image/x-icon"
    />
    <title>Статистика пострадавших</title>
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="header-inner">
          <ul class="header__list statistics-menu">
            <a href="../index.php" class="header__list-item statistics-item"
              >Вернуться назад
            </a>
            <img
              src="../images/robot-love-svgrepo-com.svg"
              alt="pdd-helper"
              height="30"
              width="30"
            />
          </ul>
        </div>
      </div>
    </header>

    <main class="graph">
      <div class="container">
        <div class="graph-inner">
          <p class="graph-regions__title">Выберите регион</p>
          <div class="graph-regions__menu">
            <?php 

            foreach ($regions as $value) {
              if (isset($_GET["region"]) && str_replace(' ', '', $value) == $_GET["region"]) {
                echo '<a href="?region='.str_replace(' ', '', $value).'" class="graph-regions__item active">'.$value.'</a>';
              } else {
                echo '<a href="?region='.str_replace(' ', '', $value).'" class="graph-regions__item">'.$value.'</a>';
              }
            }
            
            ?>
        
          </div>
          <div id="graph" class="graph__chart"></div>
          <div id="graph-raiting" class="graph__chart"></div>
        </div>
      </div>
    </main>
    <footer class="footer-graph">
      <div class="container">
        <div class="footer-inner">
          <p class="footer__title">Источники открытых данных:</p>
          <ul class="footer__list">
            <li class="footer__list-item">
              <a
                href="https://xn--b1aew.xn--p1ai/opendata/7727739372-MVD_GIAC_3.1"
              >
                1. Дорожно-транспортные происшествия
                <span class="keyword">[мвд.рф]</span>
              </a>
            </li>

            <li class="footer__list-item">
              <a
                href="https://xn--b1aew.xn--p1ai/opendata/7727739372-MVDGIAC32"
              >
                2. Безопасность дорожного движения
                <span class="keyword">[мвд.рф]</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>

  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script>

    // Первая диграмма (количество)
    anychart.onDocumentReady(function () {
      // create bar chart
      var chart = anychart.bar();

      chart.animation(true);

      chart.padding([10, 40, 5, 20]);

      chart.title(
        <?php 
        if (isset($_GET["region"])) {
          foreach ($regions  as $value) {
            if (str_replace(' ', '', $value) == $_GET["region"]) {
              echo json_encode($value);
            }
          }
        } else {
          echo json_encode("Выберите регион");
        }
          
          ?>
      );

      // create bar series with passed data
      var series = chart.bar(

        <?php 

        $data = array();

        if (isset($_GET["region"])) {
  
          if (isset($_GET["region"])) {
            foreach ($regions  as $value) {
              if (str_replace(' ', '', $value) == $_GET["region"]) {
                $query = mysqli_query($connect, "SELECT * FROM statistics_of_victims WHERE Subject='".$value."'");
              }
            }
          }

          
        
          while ($string = mysqli_fetch_assoc($query)) {
            $arr = array();
            array_push($arr, $string["Name_of_the_statistical_factor"]);
            array_push($arr, (int)$string ["Importance_of_the_statistical_factor"]);
            array_push($data, $arr);
          }
        } 


        echo json_encode($data);
          
        ?>

      );

      // set tooltip settings
      series
        .tooltip()
        .position('right')
        .anchor('left-center')
        .offsetX(5)
        .offsetY(0)
        .titleFormat('{%X}')
        .format('{%Value} человек(а)');

      // colors
      series.normal().fill("rgb(183, 0, 255)", 0.4);
      series.hovered().fill("rgb(183, 0, 255)", 0.1);
      series.selected().fill("rgb(183, 0, 255)", 0.5);

      series.normal().stroke("rgb(183, 0, 255)", 1);
      series.hovered().stroke("rgb(183, 0, 255)", 2);
      series.selected().stroke("rgb(183, 0, 255)", 4);

      // set yAxis labels formatter
      chart.yAxis().labels().format('{%Value}{groupsSeparator: }');

      // set titles for axises
      chart.xAxis().title('').labels().fontSize(12).width(120);
      chart.yAxis().title('Количество');
      chart.interactivity().hoverMode('by-x');
      chart.tooltip().positionMode('point');
      // set scale minimum
      chart.yScale().minimum(0);

      // set container id for the chart
      chart.container('graph');
      // initiate chart drawing
      chart.draw();
    });

// Вторая диграмма (рейтинг регионов)
anychart.onDocumentReady(function() {

// set the data
var data = {
  header: ['Name', 'Количество'],
  rows: [
    ['San-Francisco (1906)', 1500],
    ['Messina (1908)', 87000],
    ['Ashgabat (1948)', 175000],
    ['Chile (1960)', 10000],
    ['Tian Shan (1976)', 242000],
    ['Armenia (1988)', 25000],
    ['Iran (1990)', 50000]
  ]};

// create the chart
var chart = anychart.column();

// add data
chart.data(data);

// set the chart title
chart.title('Рейтинг регионов');

// draw
chart.container('graph-raiting');
chart.draw();
});
  
</script>
  </body>
</html>
