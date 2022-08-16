<?php declare(strict_types=1);

namespace Y0x54a\Base64url;

use InvalidArgumentException;

/**
 * https://datatracker.ietf.org/doc/html/rfc7515#appendix-C
 */
abstract class Base64url
{
  /**
   * @var string
   */
  protected const REGEXP = '/^[A-Za-z0-9\-\_]*\={0,2}$/';

  /**
   * @param string $value
   * @return string
   */
  public static function encode(string $value): string{
    return static::convertBase64ToBase64url(base64_encode($value));
  }

  /**
   * @param string $base64url
   * @return string
   */
  public static function decode(string $base64url): string{
    return base64_decode(static::convertBase64urlToBase64($base64url));
  }

  /**
   * @param string $base64url
   * @return bool
   */
  public static function validate(string $base64url): bool{
    return strlen($base64url) % 4 !== 1 && (bool)preg_match(static::REGEXP, $base64url);
  }

  /**
   * @param string $base64
   * @return string
   */
  public static function convertBase64ToBase64url(string $base64): string{
    return strtr(explode('=', $base64, 2)[0], '+/', '-_');
  }

  /**
   * @param string $base64url
   * @throws InvalidArgumentException
   * @return string
   */
  public static function convertBase64urlToBase64(string $base64url): string{
    $padding = strlen($base64url) % 4;
    if ($padding === 1 || !preg_match(static::REGEXP, $base64url)) {
      throw new InvalidArgumentException('Illegal base64url string');
    } else if ($padding === 2) {
      $base64url .= '==';
    } else if ($padding === 3) {
      $base64url .= '=';
    }
    return strtr($base64url, '-_', '+/');
  }
}