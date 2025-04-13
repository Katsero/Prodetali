<!-- TODO h2 sections titles-->
<!-- TODO 'add' and 'change' services card functions-->

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PROДетали</title>
  <link rel="stylesheet" href="../../src/css/normalize.css" />
  <link rel="stylesheet" href="../../src/css/style.css" />
  <link rel="stylesheet" href="../../src/css/constractorPA.css" />
  <link rel="stylesheet" href="../../src/css/constractorPA_tablet.css" />
  <link rel="stylesheet" href=".//src/css/style_tablet.css" />
  <link href="https://myfonts.ru/myfonts?fonts=bookman-old-style" rel="stylesheet" type="text/css" />
  <script src="../../src/js/contractorAP.js" defer></script>
</head>

<body>
  <header>
    <div class="header__container">
      <div class="header__content-left">
        <img class="header__logo" src="../../public/logo_and_text.svg" alt="Main logo here" />
      </div>
      <div class="header__content-right">
        <nav class="header__navigation navigation">
          <ul class="navigation__list">
            <li class="navigation__item">
              <a class="navigation__link" href="">Объявления</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="../../contranctors.html">Исполнители</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="../../services.html">Услуги</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="">О нас</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="">Чат</a>
            </li>
            <li class="navigation__item">
              <?php
              echo '<a class="navigation__link" href="../../index.php">На главную</a>';
              ?>
            </li>
          </ul>
        </nav>
        <?php
        if (isset($user['id']) || isset($_SESSION['user']['id'])) {
          echo '<a href="/Prodetali/_next/regist/account.php" class="link_to_profile">
          <img class="header__icon" src="' . $user['icon'] . '" alt="' . $user['nickname'] . '" />
        </a>';
        } else {
          echo '<a href="/Prodetali/_next/regist/contractorPA.php" class="link_to_profile">
          <img class="header__icon" src="../../public/icon_profile.svg" alt="Profile" />
        </a>';
          // во время разработки href="/_next/regist/log-in.php" в else будет href="/_next/regist/contractorPA.html"
        }
        ?>
      </div>
  </header>
  <main>
    <!-- TODO change on selected -->
    <p class="header__source">Главная >> Личный кабинет >> Профиль</p>
    <div class="main__wrapper">
      <aside class="main__navigation">
        <ul class="main__navigation-list">
          <li class="main__navigation-item">
            <button class="main__navigation-button button-profile">
              Профиль
            </button>
          </li>
          <li class="main__navigation-item">
            <button class="main__navigation-button button-services">
              Услуги
            </button>
          </li>
          <li class="main__navigation-item">
            <button class="main__navigation-button button-requests">
              Заказы
            </button>
          </li>
          <li class="main__navigation-item main__navigation-item-exit">
            <a href="../../index.php" class="main__navigation-button button-exit">Выйти</a>
          </li>
        </ul>
      </aside>

      <section class="profile">
        <div class="profile__wrapper">
          <div class="profile__container">
            <div class="profile__content-left">
              <img src="../../public/default_logo.png" alt="" class="profile__image" />
              <button class="profile__image-upload">
                <img src="../../public/logo_add_clip-button.svg" alt="logo_upload" class="profile__image-upload-clip">
              </button>
            </div>
            <div class="profile__content-right">
              <form action="" class="profile__form">
                <input placeholder="Иванов" type="text" class="profile__input" />
                <input placeholder="Иван" type="text" class="profile__input" /><input placeholder="Иванович" type="text"
                  class="profile__input profile__input-patronymic" />
                <input placeholder="+7 (999) 999-99-99" type="tel" class="profile__input" /><input
                  placeholder="name@gmail.com" type="email" class="profile__input" />
                <input placeholder='ООО "Металлюга"' type="text" class="profile__input" />
                <p class="profile__text">
                  — поле для обязательного заполнения
                </p>
              </form>
            </div>
          </div>
          <button class="profile__button">Сохранить изменения</button>
        </div>
      </section>
      <!-- <section class="services">
        <div class="services__wrapper">
          <button class="services__button">Добавить услугу</button>
          <div class="services__grid">
            <div class="services__container">
              <div class="services__content-left">
                <img src="../../public/example2_order.png" alt="image_service" class="services__block-image" />
              </div>
              <div class="services__content-right">
                <h3 class="services__title">Лазерная резка металла</h3>
                <p class="services__description">
                  В нашем парке оборудования 3 станка лазерной резки листового
                  металла и станок лазерной резки труб
                </p>
              </div>
            </div>
            <div class="services__container">
              <div class="services__content-left">
                <img src="../../public/example_order.png" alt="image_service" class="services__block-image" />
              </div>
              <div class="services__content-right">
                <h3 class="services__title">Лазерная резка металла</h3>
                <p class="services__description">
                  В нашем парке оборудования 3 станка лазерной резки листового
                  металла и станок лазерной резки труб
                </p>
              </div>
            </div>
            <div class="services__container">
              <div class="services__content-left">
                <img src="../../public/example2_order.png" alt="image_service" class="services__block-image" />
              </div>
              <div class="services__content-right">
                <h3 class="services__title">Сварка металла</h3>
                <p class="services__description">
                  Ручная электродуговая, полуавтоматом и сварка аргоном
                </p>
              </div>
            </div>
            <div class="services__container">
              <div class="services__content-left">
                <img src="../../public/example_order.png" alt="image_service" class="services__block-image" />
              </div>
              <div class="services__content-right">
                <h3 class="services__title">Сварка металла</h3>
                <p class="services__description">
                  Ручная электродуговая, полуавтоматом и сварка аргоном
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="requests">
        <div class="requests__container">
          <div class="requests__content-upper">
            <button class="requests__button">Актуальные</button><button class="requests__button">Архив</button>
          </div>
          <div class="requests__content-bottom">
            <div class="requests__block">
              <h3 class="requests__title-block">Лазерная резка металла</h3>
              <p class="requests__description">
                Необходимо изготовить 4 детали по чертежам в соответствии с
                тз......
              </p>
            </div>
            <div class="requests__block">
              <h3 class="requests__title-block">Сварка металла</h3>
              <p class="requests__description">Описание...</p>
            </div>
            <div class="requests__block">
              <h3 class="requests__title-block">Лазерная резка металла</h3>
              <p class="requests__description">Описание...</p>
            </div>
          </div>
        </div>
      </section> -->
    </div>
  </main>
  <footer>
    <div class="footer__wrapper">
      <div class="footer__block">
        <img src="../../public/logo_and_text__footer.svg" alt="" class="footer__logo" />
      </div>
      <div class="footer__block">
        <h3 class="footer__block-title">Компания</h3>
        <ul class="footer__block-list">
          <li class="footer__block-item">
            <p class="footer__block-text">О нас</p>
          </li>
          <li class="footer__block-item">
            <p class="footer__block-text">Отзывы</p>
          </li>
          <li class="footer__block-item">
            <p class="footer__block-text">Контакты</p>
          </li>
        </ul>
      </div>
      <div class="footer__block">
        <h3 class="footer__block-title">Документы</h3>

        <ul class="footer__block-list">
          <li class="footer__block-item">
            <p class="footer__block-text">Пользовательское соглашение</p>
          </li>
          <li class="footer__block-item">
            <p class="footer__block-text">Политика конфиденциальности</p>
          </li>
        </ul>
      </div>
      <div class="footer__block">
        <a href="tel:+79999999999" class="footer__link_tel">+7 999 999 99 99</a>
        <a href="mailto:name@gmail.com" class="footer__link_email">name@gmail.com</a>
      </div>
    </div>
    <div class="footer__line"></div>
    <p class="footer__extra">
      Сервис "PRO Детали" - Металлообработка - это важный процесс, который
      играет ключевую роль в промышленности. Она включает в себя различные
      методы обработки металла, такие как резка, сварка, шлифовка и гибка.
      Металлообработка необходима для создания разнообразных изделий - от
      мелких деталей до крупных конструкций.Этот процесс требует высокой
      точности и технического мастерства, чтобы обеспечить качество и
      надежность конечного продукта. В статье мы рассмотрим основные методы
      металлообработки, их применение в различных отраслях промышленности, а
      также новейшие технологии и тенденции в этой области.
    </p>
  </footer>
</body>

</html>