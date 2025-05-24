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
 *  |   |    \ \  \\\  \ \  \  __\极  \ \  \_|/_\ \  \_|/_\ \_____  \                    |   |
 *  |   |     \ \  \\\  \ \  \|\__\_\  \ \  \_|\ \ \  \_|\ \|____|\  \                   |   |
 *  |   |      \ \_____  \ \____________\ \_______\ \_______\____\_\  \                  |   |
 *  |   |       \|___| \__\|____________|\|_______|\|_______|\_________\                 |   |
 *  |   |             \|__|                                 \|_________|                 |   |
 *  |   |    ________  ________  ________  _______   ________  ________  ________        |   |
 *  |   |   |\   ____\|\   __  \|\   __  \|\  ___ \ |极   __  \|\   __  \|\   __  \       |   |
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

use App\Controllers\AuthController;
use App\Models\Network\Network;
use App\Models\User\User;
$auth = new AuthController();//connection
$network = new Network();//conntection

session_start();

if (isset($_SESSION['user'])) {
  Network::onRedirect('/contractorPA.php');
  exit;
}

// Initialize all required session variables with default values
$_SESSION['show_verification_form'] = $_SESSION['show_verification_form'] ?? false;
$_SESSION['success'] = $_SESSION['success'] ?? null;
$_SESSION['error'] = $_SESSION['error'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mail'])) {

  $_SESSION['registration_data'] = [
    'mail' => $_POST['mail'],
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'role' => $_POST['performer-customer']
  ];

  //send to check
  $result = $auth->onRegist(
    $_SESSION['registration_data']['username'],
    $_SESSION['registration_data']['mail'],
    $_SESSION['registration_data']['password'],
    $_SESSION['registration_data']['role'],
    "not"
  );

  //generation code
  $_SESSION['verification_code'] = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

  $mailResult = $network->onMail(
    $_SESSION['registration_data']['mail'],
    'Код подтверждения',
    'Ваш код подтверждения: ' . $_SESSION['verification_code']
  );
  if ($mailResult) {
    unset($_SESSION['error']);
    $_SESSION['show_verification_form'] = true;
    Network::onRedirect('/regist.php');
    exit;
  } else {
    $_SESSION['error'] = 'Ошибка при отправке кода подтверждения. Пожалуйста, попробуйте позже.';
    unset($_SESSION['success']);
    unset($_SESSION['success']);
    $_SESSION['show_verification_form'] = false;
    Network::onRedirect('/regist.php');
    exit;
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code_one'])) {
  $enteredCode = $_POST['code_one'] . $_POST['code_two'] . $_POST['code_three'] . $_POST['code_four'];//full code

  if (isset($_SESSION['verification_code']) && $enteredCode == $_SESSION['verification_code']) {
    if (isset($_SESSION['registration_data'])) {
      $result = $auth->onRegist(
        $_SESSION['registration_data']['username'],
        $_SESSION['registration_data']['mail'],
        $_SESSION['registration_data']['password'],
        $_SESSION['registration_data']['role'],
        null
      );

      if ($result) {
        unset($_SESSION['error']);
        unset($_SESSION['verification_code']);
        unset($_SESSION['registration_data']);
        $_SESSION['show_verification_form'] = false;
        Network::onRedirect('/regist.php');
        exit;
      } else {
        $_SESSION['error'] = 'Ошибка при регистрации. Пожалуйста, попробуйте позже.';
        unset($_SESSION['success']);
        $_SESSION['show_verification_form'] = true;
        Network::onRedirect('/regist.php');
        exit;
      }
    }
  } else {
    $_SESSION['error'] = 'Неверный код подтверждения. Пожалуйста, попробуйте снова.';
    unset($_SESSION['success']);
    $_SESSION['show_verification_form'] = true;
    Network::onRedirect('/regist.php');
    exit;
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {//reset
  // Очистка сессионных данных
  $sessionKeys = [
    'verification_code',
    'registration_data',
    'success',
    'error'
  ];

  foreach ($sessionKeys as $key) {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }
  $_SESSION['success'] = 'Даннные успешно очищены!';
  unset($_SESSION['error']);
  $_SESSION['show_verification_form'] = false;
  Network::onRedirect('/regist.php');
  exit;
}

//HTML
include __DIR__ . '/viewHTML/regist.html';
?>