<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link
      rel="shortcut icon"
      href="./images/road-accident-svgrepo-com.svg"
      type="image/x-icon"
    />

    <title>Помощник ПДД</title>
  </head>

  <body>
    <header class="header">
      <div class="container">
        <div class="header-inner">
          <ul class="header__list">
            <a href="./php/regional_statistics.php" class="header__list-item">Стастистика регионов</a>
            <a href="./php/statistics_of_victims.php" class="header__list-item">Статистика пострадавших</a>
            <a href="./php/tips_and_recommendations.php" class="header__list-item">Советы и рекомендации</a>
          </ul>
        </div>
      </div>
    </header>

    <main class="main">
      <div class="container">
        <div class="main-inner">
          <img
            src="./images/robot-love-svgrepo-com.svg"
            alt="pdd-helper"
            width="200"
            height="200"
          />
          <h1 class="main__title">Помощник ПДД</h1>
          <p class="main__info">
            Приложение использует <span class="keyword">открытые данные</span>,
            связанные с дорожно-транспортными происшествиями, чтобы
            проанализировать их, отобразить пользователю и дать рекомендации как
            избежать те или иные виды ДТП и сохранить свое здоровье.
          </p>
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
      <p class="footer__title">Источники открытых данных:</p>
        <div class="footer-inner">
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
          <ul class="footer__contacts">
            <li class="footer__contacts-item">Автор: <span>Меркель Ирина</span></li>
            <li class="footer__contacts-item">irinamerkel979@gmail.com</li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>
