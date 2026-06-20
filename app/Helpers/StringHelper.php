<?php
namespace App\Helpers;

class StringHelper
{
    /**
     * Bir metni URL dostu (slug) formata çevirir.
     *
     * Örnek:
     * "Merhaba Dünya!" → "merhaba-dunya"
     *
     * @param string $text Dönüştürülecek metin
     * @return string Slug formatındaki metin
     */
    public static function slugify($text)
    {
        // Harf ve rakam olmayan karakterleri tire (-) ile değiştir
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // UTF-8 karakterleri ASCII’ye dönüştür (örneğin: ü → u)
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // Alfanümerik olmayan karakterleri kaldır (tire ve kelime karakterleri hariç)
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Başta ve sonda kalan tireleri sil
        $text = trim($text, '-');

        // Birden fazla tireyi tek tireye indir
        $text = preg_replace('~-+~', '-', $text);

        // Hepsini küçük harfe çevir
        return strtolower($text);
    }
}
