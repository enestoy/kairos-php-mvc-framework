<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;

class DateHelper
{
    /**
     * Türkiye saat diliminde şu anki zamanı belirtilen formatta verir.
     *
     * @param string $format İstenilen tarih/zaman formatı (varsayılan: 'Y-m-d H:i:s')
     * @return string Formatlanmış tarih/zaman string'i
     */
    public static function now($format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime('now', new DateTimeZone('Europe/Istanbul'));
        return $date->format($format);
    }

    /**
     * Verilen bir tarihten şu ana kadar geçen süreyi insan diline çevirir.
     * Örneğin: "3 gün önce", "2 saat önce" gibi.
     *
     * @param string $date Geçmiş bir tarih (örn: '2025-07-31 14:00:00')
     * @return string İnsan dilinde zaman farkı
     */
    public static function diffForHumans(string $date): string
    {
        $now = new DateTime('now', new DateTimeZone('Europe/Istanbul')); // Şu an
        $past = new DateTime($date, new DateTimeZone('Europe/Istanbul')); // Geçmiş tarih
        $interval = $now->diff($past); // Zaman farkını al

        // Yıla göre kontrol
        if ($interval->y > 0) return $interval->y . ' yıl önce';
        // Aya göre
        if ($interval->m > 0) return $interval->m . ' ay önce';
        // Güne göre
        if ($interval->d > 0) return $interval->d . ' gün önce';
        // Saate göre
        if ($interval->h > 0) return $interval->h . ' saat önce';
        // Dakikaya göre
        if ($interval->i > 0) return $interval->i . ' dakika önce';
        
        // Hiçbiri değilse, zaman "şimdi"
        return 'şimdi';
    }

    /**
     * Verilen tarihi istenilen biçime çevirir.
     *
     * @param string $date Formatlanacak tarih (örn: '2025-08-01 12:00:00')
     * @param string $format Yeni format (varsayılan: 'd.m.Y H:i')
     * @return string Formatlanmış tarih
     */
    public static function format(string $date, string $format = 'd.m.Y H:i'): string
    {
        $dt = new DateTime($date, new DateTimeZone('Europe/Istanbul'));
        return $dt->format($format);
    }
}
