<?php

namespace App\Config;

class AuthCheck
{
 /**
  * Check if user is authenticated
  * @return bool
  */
 public static function isAuthenticated(): bool
 {
  if (session_status() === PHP_SESSION_NONE) {
   session_start();
  }
  return isset($_SESSION['user']) && isset($_SESSION['user']['id']);
 }

 /**
  * Get current user ID
  * @return int|null
  */
 public static function getCurrentUserId(): ?int
 {
  if (self::isAuthenticated()) {
   return $_SESSION['user']['id'];
  }
  return null;
 }
}