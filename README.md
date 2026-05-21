# TurkceTekilCogul
Türkçedeki Kelimeleri Tekil Çoğul Yapma PHP Snıfı



// Kullanım örnekleri
<code>
echo TurkishPluralizer::plural('kitap') ;   // kitaplar
echo TurkishPluralizer::plural('ev') ;      // evler

echo TurkishPluralizer::singular('arabalar') ; // araba
echo TurkishPluralizer::singular('evler') ;    // ev

echo TurkishPluralizer::isPlural('çocuklar') ? 'Çoğul' : 'Tekil';
</code>
