<?php

class TurkishPluralizer
{
    /**
     * Kalın ünlüler
     */
    private static array $backVowels = ['a', 'ı', 'o', 'u'];

    /**
     * İnce ünlüler
     */
    private static array $frontVowels = ['e', 'i', 'ö', 'ü'];

    /**
     * Kelimeyi çoğul yap
     */
    public static function plural(string $word): string
    {
        if (self::isPlural($word)) {
            return $word;
        }

        $lastVowel = self::findLastVowel($word);

        if (in_array($lastVowel, self::$backVowels)) {
            return $word . 'lar';
        }

        return $word . 'ler';
    }

    /**
     * Kelimeyi tekil yap
     */
    public static function singular(string $word): string
    {
        if (preg_match('/(lar|ler)$/u', $word)) {
            return preg_replace('/(lar|ler)$/u', '', $word);
        }

        return $word;
    }

    /**
     * Kelime çoğul mu?
     */
    public static function isPlural(string $word): bool
    {
        return preg_match('/(lar|ler)$/u', $word) === 1;
    }

    /**
     * Son ünlüyü bul
     */
    private static function findLastVowel(string $word): ?string
    {
        preg_match_all('/[aeıioöuü]/u', mb_strtolower($word), $matches);

        if (empty($matches[0])) {
            return null;
        }

        return end($matches[0]);
    }
}


// Kullanım örnekleri

echo TurkishPluralizer::plural('kitap') . PHP_EOL;   // kitaplar
echo TurkishPluralizer::plural('ev') . PHP_EOL;      // evler

echo TurkishPluralizer::singular('arabalar') . PHP_EOL; // araba
echo TurkishPluralizer::singular('evler') . PHP_EOL;    // ev

echo TurkishPluralizer::isPlural('çocuklar') ? 'Çoğul' : 'Tekil';