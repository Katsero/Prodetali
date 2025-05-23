<?
include_once __DIR__ . '/_next/php/src/helpers.php';
$user = currentUser();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PROДетали</title>
  <link rel="stylesheet" href="./src/css/normalize.css" />
  <link rel="stylesheet" href="./src/css/style.css" />
  <link rel="stylesheet" href="./src/css/pages/index.css" />
  <link rel="stylesheet" href="./src/css/pages/index_tablet.css" />
  <link rel="stylesheet" href="./src/css/parts/header.css" />
  <link rel="stylesheet" href="./src/css/parts/footer.css" />
  <link href="https://myfonts.ru/myfonts?fonts=bookman-old-style" rel="stylesheet" type="text/css" />
  <script src="js/modalEntryRegist.js" defer></script>
</head>

<body>
  <header>
    <div class="header__container">
      <a class="header__content-left" href="index.php">
        <img class="header__logo" src="public/logo_and_text.svg" alt="Main logo here" />
      </a>
      <div class="header__content-right">
        <nav class="header__navigation navigation">
          <ul class="navigation__list">
            <li class="navigation__item">
              <a class="navigation__link" href="ads.php">Объявления</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="contractors.php">Исполнители</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="services.php">Услуги</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="aboutUs.php">О нас</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="chat.php">Чат</a>
            </li>
            <li class="navigation__item">
              <a class="navigation__link" href="log-in.php">Войти</a>
            </li>
          </ul>
        </nav>
        <?php
        if (isset($user['id'])) {
          echo '<a href="contractorPA.php" class="link_to_profile">
          <img class="header__icon" src="' . $user['icon'] . '" alt="' . $user['nickname'] . '" />
        </a>';
        } else {
          echo '<a href="contractorPA.php" class="link_to_profile">
          <img class="header__icon" src="./public/icon_profile.svg" alt="Profile" />
        </a>';
          // во время разработки href="/_next/regist/log-in.php" в else будет href="/_next/regist/contractorPA.php"
        }
        ?>
      </div>
    </div>
  </header>
  <main>
    <section class="hero">
      <img src="./public/logoNameText.svg" alt="PRO Детали" class="hero__title" />
      <p class="hero__text">
        Платформа, где заказчики находят исполнителей, а исполнители – новые
        возможности!
      </p>
      <a class="hero__link button--orange" href="log-in.php">Присоединяйтесь сейчас</a>
      <!-- <?php
        if (isset($user['id'])) {
          echo '<a href="/Prodetali/_next/regist/contractorPA.php" class="hero__link button--orange">
          Присоединяйтесь сейчас
        </a>';
        } else {
          echo '<a href="/Prodetali/_next/regist/contractorPA.php" class="hero__link button--orange">
          Присоединяйтесь сейчас
        </a>';
          // во время разработки href="/_next/regist/log-in.php" в else будет href="/_next/regist/contractorPA.php"
        }
        ?> -->
      <img class="hero__backgroung-img" alt="background" src="./public/hero_background.png" />
    </section>

    <section class="activities">
      <h2 class="activities__title">Чем занимаемся ?</h2>
      <div class="activities__wrapper">
        <div class="activities__block">
          <h3 class="activities__block-title">
            Публикуем заказы от клиентов
          </h3>
          <p class="activities__text">
            Мы собираем и размещаем актуальные заказы, которые могут
            заинтересовать исполнителей.
          </p>
        </div>
        <div class="activities__block">
          <h3 class="activities__block-title">
            Предоставляем услуги исполнителей
          </h3>
          <p class="activities__text">
            Профессионалы разных областей могут предложить свои услуги и найти
            заказы.
          </p>
        </div>
        <div class="activities__block">
          <h3 class="activities__block-title">
            Обеспечиваем удобную платформу для общения
          </h3>
          <p class="activities__text">
            Заказчики и исполнители могут напрямую общаться для согласования
            условий работы.
          </p>
        </div>
      </div>
    </section>

    <section class="advantages">
      <h2 class="advantages__title">Преимущество сервиса</h2>
      <div class="advantages__container">
        <div class="advantages__content-left">
          <h3 class="advantages__block-title">Для клиентов</h3>
          <ul class="advantages__list">
            <li class="advantages__item">
              <h4 class="advantages__item-title">
                Быстрый поиск исполнителей
              </h4>
              <p class="advantages__text">
                Находите профессионалов для любых задач без долгих ожиданий
              </p>
            </li>
            <li class="advantages__item">
              <h4 class="advantages__item-title">Конкурентные цены</h4>
              <p class="advantages__text">
                Сравнивайте предложения и выбирайте лучшее по цене и качеству
              </p>
            </li>
            <li class="advantages__item">
              <h4 class="advantages__item-title">
                Безопасность и надежность
              </h4>
              <p class="advantages__text">
                Работайте с проверенными специалистами и оставляйте отзывы
              </p>
            </li>
          </ul>
        </div>
        <div class="advantages__content-right">
          <h3 class="advantages__block-title">Для исполнителей</h3>
          <ul class="advantages__list">
            <li class="advantages__item">
              <h4 class="advantages__item-title">Постоянный поток заказов</h4>
              <p class="advantages__text">
                Получайте новые проекты и развивайте свою деятельность
              </p>
            </li>
            <li class="advantages__item">
              <h4 class="advantages__item-title">Гибкий график</h4>
              <p class="advantages__text">
                Удобный процесс отклика на заказы без лишних сложностей
              </p>
            </li>
            <li class="advantages__item">
              <h4 class="advantages__item-title">Прозрачные условия</h4>
              <p class="advantages__text">
                Работайте напрямую с клиентами, без скрытых комиссий и
                посредников
              </p>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="rating">
      <h2 class="rating__title">Рейтинг исполнителей</h2>
      <div class="rating__wrapper">
        <!--  repeatable -->
        <div class="rating__container">
          <div class="rating__content-left">
            <img class="rating__img-profile" alt="" src="./public/icon_profile.svg" />
            <div class="rating__description">
              <p class="rating__name">MetalCraft Pro</p>
              <p class="rating__text">
                (лазерная обработка, изготовление деталей)
              </p>
            </div>
          </div>
          <div class="rating__content-right">
            <img src="./public/five_stars_rating.svg" alt="" class="rating__stars" />
            <p class="rating__text">(500 отзывов)</p>
          </div>
        </div>
        <div class="rating__container">
          <div class="rating__content-left">
            <img class="rating__img-profile" alt="" src="./public/icon_profile.svg" />
            <div class="rating__description">
              <p class="rating__name">MetalCraft Pro</p>
              <p class="rating__text">
                (лазерная обработка, изготовление деталей)
              </p>
            </div>
          </div>
          <div class="rating__content-right">
            <img src="./public/four_stars_rating.svg" alt="" class="rating__stars" />
            <p class="rating__text">(500 отзывов)</p>
          </div>
        </div>
        <div class="rating__container">
          <div class="rating__content-left">
            <img class="rating__img-profile" alt="" src="./public/icon_profile.svg" />
            <div class="rating__description">
              <p class="rating__name">MetalCraft Pro</p>
              <p class="rating__text">
                (лазерная обработка, изготовление деталей)
              </p>
            </div>
          </div>
          <div class="rating__content-right">
            <img src="./public/three_stars_rating.svg" alt="" class="rating__stars" />
            <p class="rating__text">(500 отзывов)</p>
          </div>
        </div>
        <div class="rating__container">
          <div class="rating__content-left">
            <img class="rating__img-profile" alt="" src="./public/icon_profile.svg" />
            <div class="rating__description">
              <p class="rating__name">MetalCraft Pro</p>
              <p class="rating__text">
                (лазерная обработка, изготовление деталей)
              </p>
            </div>
          </div>
          <div class="rating__content-right">
            <img src="./public/two_stars_rating.svg" alt="" class="rating__stars" />
            <p class="rating__text">(500 отзывов)</p>
          </div>
        </div>
        <div class="rating__container">
          <div class="rating__content-left">
            <img class="rating__img-profile" alt="" src="./public/icon_profile.svg" />
            <div class="rating__description">
              <p class="rating__name">MetalCraft Pro</p>
              <p class="rating__text">
                (лазерная обработка, изготовление деталей)
              </p>
            </div>
          </div>
          <div class="rating__content-right">
            <img src="./public/one_star_rating.svg" alt="" class="rating__stars" />
            <p class="rating__text">(500 отзывов)</p>
          </div>
        </div>
      </div>
      <a href="contractors.php" class="rating__link button--orange">Смотреть всех исполнителей</a>
    </section>

    <section class="requests">
      <h2 class="requests__title">Актуальные объявления</h2>
      <div class="requests__grid">
        <!-- repeatable -->
        <div class="requests__container">
          <div class="requests__content-left">
            <img src="./public/actual_img_profile.png" alt="" class="requests__image" /><a href=""
              class="requests__order-link button--blue">Подробнее</a>
          </div>
          <div class="requests__content-right">
            <p class="requests__customer">Василий Л.</p>
            <p class="requests__detail">
              Деталь Lego 64567 Light Bluish Gray Weapon Lightsaber Hilt
              Straight
            </p>
            <p class="requests__description">
              Номер Lego: 4212074, 4539481, 4581155 Категория: Minifigure,
              Weapon Цвет: Light Bluish Gray Тип цвета: Solid
            </p>
          </div>
        </div>
        <div class="requests__container">
          <div class="requests__content-left">
            <img src="./public/actual_img_profile.png" alt="" class="requests__image" /><a href=""
              class="requests__order-link button--blue">Подробнее</a>
          </div>
          <div class="requests__content-right">
            <p class="requests__customer">Василий Л.</p>
            <p class="requests__detail">
              Деталь Lego 64567 Light Bluish Gray Weapon Lightsaber Hilt
              Straight
            </p>
            <p class="requests__description">
              Номер Lego: 4212074, 4539481, 4581155 Категория: Minifigure,
              Weapon Цвет: Light Bluish Gray Тип цвета: Solid
            </p>
          </div>
        </div>
        <div class="requests__container">
          <div class="requests__content-left">
            <img src="./public/actual_img_profile.png" alt="" class="requests__image" /><a href=""
              class="requests__order-link button--blue">Подробнее</a>
          </div>
          <div class="requests__content-right">
            <p class="requests__customer">Василий Л.</p>
            <p class="requests__detail">
              Деталь Lego 64567 Light Bluish Gray Weapon Lightsaber Hilt
              Straight
            </p>
            <p class="requests__description">
              Номер Lego: 4212074, 4539481, 4581155 Категория: Minifigure,
              Weapon Цвет: Light Bluish Gray Тип цвета: Solid
            </p>
          </div>
        </div>
        <div class="requests__container">
          <div class="requests__content-left">
            <img src="./public/actual_img_profile.png" alt="" class="requests__image" /><a href=""
              class="requests__order-link button--blue">Подробнее</a>
          </div>
          <div class="requests__content-right">
            <p class="requests__customer">Василий Л.</p>
            <p class="requests__detail">
              Деталь Lego 64567 Light Bluish Gray Weapon Lightsaber Hilt
              Straight
            </p>
            <p class="requests__description">
              Номер Lego: 4212074, 4539481, 4581155 Категория: Minifigure,
              Weapon Цвет: Light Bluish Gray Тип цвета: Solid
            </p>
          </div>
        </div>
      </div>
      <a href="ads.php" class="requests__gallery-link button--orange">Смотреть все объявления</a>
    </section>

    <section class="faq">
      <h2 class="faq__title">Ответы на часто задаваемые вопросы</h2>
      <div class="faq__wrapper">
        <!-- repeatable -->
        <details class="faq__details">
          <summary class="faq__summary">
            Металлообработка - это важный процесс, который играет ключевую
            роль в промышленности.
          </summary>
          <p class="faq__text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
            quasi laborum ipsum excepturi vero expedita repellendus debitis
            nostrum illo voluptatum ullam veniam, nobis eligendi voluptas
            inventore quod nesciunt eaque quas.
          </p>
        </details>
        <div class="faq__line"></div>
        <details class="faq__details">
          <summary class="faq__summary">
            Металлообработка - это важный процесс, который играет ключевую
            роль в промышленности.
          </summary>
          <p class="faq__text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
            quasi laborum ipsum excepturi vero expedita repellendus debitis
            nostrum illo voluptatum ullam veniam, nobis eligendi voluptas
            inventore quod nesciunt eaque quas.
          </p>
        </details>
        <div class="faq__line"></div>
        <details class="faq__details">
          <summary class="faq__summary">
            Металлообработка - это важный процесс, который играет ключевую
            роль в промышленности.
          </summary>
          <p class="faq__text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
            quasi laborum ipsum excepturi vero expedita repellendus debitis
            nostrum illo voluptatum ullam veniam, nobis eligendi voluptas
            inventore quod nesciunt eaque quas.
          </p>
        </details>
        <div class="faq__line"></div>
        <details class="faq__details">
          <summary class="faq__summary">
            Металлообработка - это важный процесс, который играет ключевую
            роль в промышленности.
          </summary>
          <p class="faq__text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
            quasi laborum ipsum excepturi vero expedita repellendus debitis
            nostrum illo voluptatum ullam veniam, nobis eligendi voluptas
            inventore quod nesciunt eaque quas.
          </p>
        </details>
        <div class="faq__line"></div>
        <details class="faq__details">
          <summary class="faq__summary">
            Металлообработка - это важный процесс, который играет ключевую
            роль в промышленности.
          </summary>
          <p class="faq__text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
            quasi laborum ipsum excepturi vero expedita repellendus debitis
            nostrum illo voluptatum ullam veniam, nobis eligendi voluptas
            inventore quod nesciunt eaque quas.
          </p>
        </details>
        <div class="faq__line"></div>
      </div>
    </section>
  </main>
  <footer>
    <div class="footer__wrapper">
      <div class="footer__block">
        <img src="./public/logo_and_text__footer.svg" alt="" class="footer__logo" />
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

  <!-- <dialog class="authorization">
    <h2>Вход</h2>
    <form class="authorization__form" method="dialog">
      <input placeholder="E-mail" class="authorization__form-input" type="email" name="email" required>
      <input placeholder="Пароль" class="authorization__form-input" type="password" id="password" name="password"
        required minlength="6">
      <div class="authorization__remember-password">
        <input type="checkbox" name="email">
        Запомнить пароль
      </div>
      <button class="authorization__authorizate" type="submit">Войти</button>
    </form>
    <div class="authorization__buttons">
      <button>Забыли пароль?</button>
      <button class="authorization__registration">Регистрация</button>
    </div>
  </dialog>

  <dialog class="registration">
    <h2>Регистрация</h2>
    <form class="registration__form" method="dialog">
      <input placeholder="Введите имя" class="registration__form-input" type="text" name="name" required>
      <input placeholder="Введите E-mail" class="registration__form-input" type="email" name="email" required>
      <input placeholder="Введите пароль" class="registration__form-input" type="password" id="password" name="password"
        required minlength="6">
      <input placeholder="Повторите пароль" class="registration__form-input" type="password" id="password-repeat"
        name="password" required minlength="6">
      </div>
      <div class="registration__choose_role">
        <div class="role__performer">
          <input type="radio" name="performer-customer">
          Хочу стать исполнителем
        </div>
        <div class="role__customer">
          <input type="radio" name="performer-customer">
          Хочу стать заказчиком
        </div>
      </div>
      <p class="registration__text">Нажимая на кнопку "Зарегистрироваться" вы принимаете условия
        <a href="#" class="registration__text_link">Пользовательского соглашения</a>
      </p>
      <button class="registration__registrate" type="submit">Зарегистрироваться</button>
    </form>
    <button class="registration__authorization">Я уже зарегистрирован</button>
  </dialog>

  <dialog class="code">
    <form class="code__form">
      <button class="code__back-btn">←</button>
      <h2>Введите код</h2>
      <p class="code__desc">Мы отправили код вам на указанную почту. Введите его, чтобы войти</p>
      <div class="code-inputs">
        <input type="text" maxlength="1" class="code__code" />
        <input type="text" maxlength="1" class="code__code" />
        <input type="text" maxlength="1" class="code__code" />
        <input type="text" maxlength="1" class="code__code" />
      </div>
      <div class="code__buttons">
        <button class="code__cancel">Отмена</button>
        <button class="code__confirm">Подтвердить</button>
      </div>
    </form>
  </dialog> -->
</body>

</html>