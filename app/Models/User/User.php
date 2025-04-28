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

namespace App\Models\User;

use App\Config\Database;
use App\Models\Network\Network;
use PDO;

class User
{
    /**
     * @var [type]
     */
    private static $db;
    /**
     * @var [type]
     */
    private $verifyTable;
    /**
     * @var [type]
     */
    private $className = 'users';
    /**
     * @var [type]
     */
    private $network;
    /**
     * @var string
     */
    private $path_login = '/log-in.php';

    public function __construct()
    {
        self::$db = Database::getConnection();
        $this->network = new Network();
        $this->verifyTable = Network::onTableCheck($this->className);
    }

    /**
     * @param string $type
     * @param int $index
     * 
     * @return [type]
     */
    public function getUser(string $type, int $index)
    {
        try {
            $this->verifyTable;//check table
            switch ($type) {
                case 'id':
                    $stmt = $this->network->QuaryRequest__User['getUser_id'];
                    $stmt->execute([$index]);
                    break;
                case 'username':
                    $stmt = $this->network->QuaryRequest__User['getUser_username'];
                    $stmt->execute([$index]);
            }
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * @param int $userId
     * @param int $newGroup
     * 
     * @return [type]
     */
    public function onUpdateGroup(int $userId, int $newGroup)
    {
        try {
            $this->verifyTable;//check table
            $stmt = $this->network->QuaryRequest__User['onUpdatePerformer_Customer'];
            return $stmt->execute([$newGroup, $userId]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * @param mixed $index
     * 
     * @return [type]
     */
    public function onSessionUser($index)
    {
        try {
            if ($index === null) {
                Network::onRedirect($this->path_login);
                return false;
            }

            $this->verifyTable; //check table
            $stmt = $this->network->QuaryRequest__User['onSessionUser_id'];
            $stmt->execute([$index]);

            if ($stmt->rowCount() === 1) {
                $found = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($found['session'] === 'off') {
                    session_destroy();
                    Network::onRedirect($this->path_login);
                    return false;
                }
                return true;
            }

            session_destroy();
            Network::onRedirect($this->path_login);
            return false;
        } catch (\PDOException $e) {
            error_log("Ошибка при проверке пользователя: " . $e->getMessage());
            session_destroy();
            Network::onRedirect($this->path_login);
            return false;
        }
    }

    /**
     * @param string $status
     * @param int $userId
     * 
     * @return [type]
     */
    public function updateSessionStatus(string $status, int $userId)
    {
        try {
            $this->verifyTable;
            $stmt = $this->network->QuaryRequest__User['onUpdateSession'];
            $stmt->execute([$status, $userId]);
            return true;
        } catch (\PDOException $e) {
            error_log("Ошибка при обновлении статуса сессии: " . $e->getMessage());
            return false;
        }
    }
}