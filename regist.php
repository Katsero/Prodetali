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
  <link rel="stylesheet" href="./src/css/parts/modal.css" />
  <link href="https://myfonts.ru/myfonts?fonts=bookman-old-style" rel="stylesheet" type="text/css" />
  <script src="js/modalEntryRegist.js" defer></script>
</head>

<body>
  <header>
    <div class="header__container">
      <a class="header__content-left" href="index.php">
        <img class="header__logo" src="public/logo_and_text.svg" alt="Main logo here" />
      </a>
    </div>
    </header>
    <main>
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
    <a href="log-in.php" class="registration__authorization">Я уже зарегистрирован</a>
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
</body>

</html>