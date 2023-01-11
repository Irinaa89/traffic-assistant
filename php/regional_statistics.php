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
    <link
      rel="shortcut icon"
      href="../images/road-accident-svgrepo-com.svg"
      type="image/x-icon"
    />
    <title>Общая статистика</title>
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
          <div class="graph__title">Название графика</div>
          <div class="graph__chart">График</div>
        </div>
      </div>
    </main>
    <footer class="footer">
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
              <a href="https://data.mos.ru/datasets/759">
                2. Нарушения ПДД, выявляемые с использованием автоматизированной
                системы фотовидеофиксации нарушений правил дорожного движения
                интеллектуальной транспортной системы города Москвы
                <span class="keyword">[data.mos.ru]</span>
              </a>
            </li>

            <li class="footer__list-item">
              <a
                href="https://xn--b1aew.xn--p1ai/opendata/7727739372-MVDGIAC32"
              >
                3. Безопасность дорожного движения
                <span class="keyword">[мвд.рф]</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>
