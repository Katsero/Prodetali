<?php
/**
 *
 *  _____                                                                                _____
 * ( ___ )                                                                              ( ___ )
 *  |   |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~|   |
 *  |   |                                                                                |   |
 *  |   |                                                                                |   |
 *  |   |    ________  ___       __   _______   _______   ________                       |   |
 *  |   |   |\   __  \|\  \     |\  \|\  ___ \ |\  ___ \ |\   ____\                      |   |
 *  |   |   \ \  \|\  \ \  \    \ \  \ \   __/|\ \   __/|\ \  \___|_                     |   |
 *  |   |    \ \  \\\  \ \  \  __\ \  \ \  \_|/_\ \  \_|/_\ \_____  \                    |   |
 *  |   |     \ \  \\\  \ \  \|\__\_\  \ \  \_|\ \ \  \_|\ \|____|\  \                   |   |
 *  |   |      \ \_____  \ \____________\ \_______\ \_______\____\_\  \                  |   |
 *  |   |       \|___| \__\|____________|\|_______|\|_______|\_________\                 |   |
 *  |   |             \|__|                                 \|_________|                 |   |
 *  |   |    ________  ________  ________  _______   ________  ________  ________        |   |
 *  |   |   |\   ____\|\   __  \|\   __  \|\  ___ \ |\   __  \|\   __  \|\   __  \       |   |
 *  |   |   \ \  \___|\ \  \|\  \ \  \|\  \ \   __/|\ \  \|\  \ \  \|\  \ \  \|\  \      |   |
 *  |   |    \ \  \    \ \  \\\  \ \   _  _\ \  \_|/_\ \   ____\ \   _  _\ \  \\\  \     |   |
 *  |   |     \ \  \____\ \  \\\  \ \  \\  \\ \  \_|\ \ \  \___|\ \  \\  \\ \  \\\  \    |   |
 *  |   |      \ \_______\ \_______\ \__\\ _\\ \_______\ \__\    \ \__\\ _\\ \_______\   |   |
 *  |   |       \|_______|\|_______|\|__|\|__|\|_______|\|__|     \|__|\|__|\|_______|   |   |
 *  |   |                                                                                |   |
 *  |   |                                                                                |   |
 *  |___|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~|___|
 * (_____)                                                                              (_____)
 *
 * Эта программа является свободным программным обеспечением: вы можете распространять ее и/или модифицировать
 * в соответствии с условиями GNU General Public License, опубликованными
 * Фондом свободного программного обеспечения (Free Software Foundation), либо в версии 3 Лицензии, либо (по вашему выбору) в любой более поздней версии.
 *
 * @author TimQwees
 * @link https://github.com/TimQwees/Qwees_CorePro
 *
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\User\User;
use App\Models\Article\Article;
use App\Models\Network\Network;

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$userModel = new User();
$userModel->onSessionUser($_SESSION['user']['id'] ?? 0);
//check session user
//проверка на авторизацию

if (isset($_SESSION['user']['id'])) {
  $currentUser = $userModel->getUser('id', $_SESSION['user']['id']);
  if (!$currentUser) {
    session_destroy();
    Network::onRedirect('/login.php');
    exit;
  }
} else {
  // Handle the case where the user is not logged in
  session_destroy();
  Network::onRedirect('/login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PROДетали</title>
  <link rel="stylesheet" href="./src/css/normalize.css" />
  <link rel="stylesheet" href=".//src/css/style.css" />
  <link rel="stylesheet" href=".//src/css/parts/header.css" />
  <link rel="stylesheet" href=".//src/css/parts/footer.css" />
  <link rel="stylesheet" href=".//src/css/parts/history.css" />
  <link rel="stylesheet" href="./src/css/pages/index_tablet.css" />
  <link rel="stylesheet" href=".//src/css/pages/constractorPA.css" />
  <link rel="stylesheet" href=".//src/css/pages/constractorPA_tablet.css" />
  <link rel="stylesheet" href=".//src/css/parts/services_container.css" />
  <link rel="stylesheet" href="./src/css/pages/chat.css" />
  <link rel="stylesheet" href="./src/css/media/media.css" />
  <link href="https://myfonts.ru/myfonts?fonts=bookman-old-style" rel="stylesheet" type="text/css" />
  <script src="js/contractorAP.js" defer></script>
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
              <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])): ?>
                <a class="navigation__link navigation__authenticate" href="contractorPA.php">В кабинет</a>
              <?php else: ?>
                <a class="navigation__link navigation__authenticate" href="login.php">Войти</a>
              <?php endif; ?>
            </li>
          </ul>
        </nav>
        <?php
        if (isset($user['id'])) {
          echo '<a href="contractorPA.php" class="link_to_profile">
          <img class="header__icon" src="' . $user['icon'] . '" alt="' . $user['nickname'] . '" />
        </a>';
        } else {
          echo '<a href="login.php" class="link_to_profile">
          <img class="header__icon" src="./public/icon_profile.svg" alt="Profile" />
        </a>';
        }
        ?>
      </div>
    </div>
  </header>
  <section class="history">
    <p class="history__text history__links"><a href="index.php">Главная</a> >> Чат</p>
    <p class="history__text history__location">Местоположение: Москва</p>
  </section>
  <main>
    <div class="chats__wrapper">
      <div class="search_container">
        <input class="search" value="" type="text" placeholder="Поиск">
        <img class="search_img" src="public/search_chat.svg" alt="">
      </div>
      <div class="chats__container">
        <a href="currentChat.php" class="message__wrapper">
          <img src="./public/chat_default_logo.png" alt="logo" class="message__logo">
          <div class="message">
            <p class="message__title">ООО "Металлюга"</p>
            <p class="message__desc">Сообщение</p>
          </div>
          <p class="message__time">8ч</p>
        </a>
        <a href="currentChat.php" class="message__wrapper">
          <img src="./public/chat_default_logo.png" alt="logo" class="message__logo">
          <div class="message">
            <p class="message__title">ООО "ТитанМет"</p>
            <p class="message__desc">Сообщение</p>
          </div>
          <p class="message__time">1д</p>
        </a>
        <a href="currentChat.php" class="message__wrapper">
          <img src="./public/chat_default_logo.png" alt="logo" class="message__logo">
          <div class="message">
            <p class="message__title">ООО "ПрокатСервис"</p>
            <p class="message__desc">Сообщение</p>
          </div>
          <p class="message__time">1д</p>
        </a>
        <a href="currentChat.php" class="message__wrapper">
          <img src="./public/chat_default_logo.png" alt="logo" class="message__logo">
          <div class="message">
            <p class="message__title">ООО "ПерфектСталь"</p>
            <p class="message__desc">Сообщение</p>
          </div>
          <p class="message__time">1д</p>
        </a>
      </div>
    </div>
    <div class="messages__filter">
      <button autofocus type="button" class="messages__all messeges__current_filter">Все</button>
      <button type="button" class="messages__unread messeges__current_filter">Непрочитанные</button>
      <button type="button" class="messages__archive messeges__current_filter">Архив</button>
    </div>
  </main>
  <footer>
    <div class="footer__wrapper">
      <a class="footer__block" href="index.php" style="margin: 0;">
        <img src="./public/logo_and_text__footer.svg" alt="" class="footer__logo" />
      </a>
      <div class="footer__block">
        <h3 class="footer__block-title">Компания</h3>
        <ul class="footer__block-list">
          <li class="footer__block-item">
            <a class="footer__block-text" href="aboutUs.php">О нас</a>
          </li>
          <li class="footer__block-item">
            <a class="footer__block-text" href="#">Отзывы</a>
          </li>
          <li class="footer__block-item">
            <a class="footer__block-text" href="#">Контакты</a>
          </li>
        </ul>
      </div>
      <div class="footer__block">
        <h3 class="footer__block-title" href="#">Документы</h3>

        <ul class="footer__block-list">
          <li class="footer__block-item">
            <a class="footer__block-text" href="#">Пользовательское соглашение</a>
          </li>
          <li class="footer__block-item">
            <a class="footer__block-text" href="#">Политика конфиденциальности</a>
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