��    b      ,  �   <      H     I     N  
   d  q   o  �   �     �	  $   �	     �	     
  "   
  '   B
     j
     �
     �
     �
     �
     �
     �
       &     /   ;     k  *   �  $   �  /   �  H        T     b  Z   �     �  .   �  n        �      �     �  |   �     ;     M     \    k  #   m     �     �     �  9   �  m        v     �     �     �  *   �     �     �            w   $  3   �  9   �  �  
  t   �  p     `   ~  �   �    x  v   �  �   	  �   �     �     �    �  %   �     �     �  �     }   �  �   s  5  H  (   ~  D   �     �     �     �          +     =     D     T     ]  !   f  "   �     �     �     �     �                %  v  *     �!     �!  
   �!  ~   �!  �   E"  %   #  1   D#     v#     �#  2   �#  6   �#  '   $  
   C$     N$     \$  #   w$  &   �$     �$     �$  8   �$  1   5%  :   g%  4   �%     �%  L   �%  X   D&     �&  1   �&  Z   �&  
   <'     G'  e   ^'     �'     �'     �'  �   �'     |(     �(     �(  
  �(  >   �)     *     -*     C*  8   a*     �*     +     1+     E+  $   T+  1   y+  %   �+  *   �+     �+     ,  �   ,  :   �,  F   �,  0  .-  h   _.  L   �.  z   /  �   �/  %  S0  �   y1  �   �1  �   �2     �3     �3    �3  A   �4     �4     5  �   05  ]   6  �   s6  ^  ;7     �8  G   �8  
   �8     9     9     ,9     C9     [9     c9  
   w9  	   �9  #   �9  &   �9  %   �9  '   �9     %:     ):     <:     X:     d:         #   E       <   :      N   D   &   L   %   T   /   	   ;   b   !   )   ,           [   `       J   F           _         Y       Z            \   ?      ^      I          U             B      =   X   Q   M   2      "   5   V           W          (   0   O              $          
   6                                  9       +   .   ]   >   -   K   7       3   a          R   '       *       8               @          A       S   P          1   G       C   4         H                   or  "Relatedness" options "The Pool" "The Pool" refers to the pool of posts and pages that are candidates for display as related to the current entry. %f is the YARPP match score between the current entry and this related entry. You are seeing this value because you are logged in to WordPress as an administrator. It is not shown to regular visitors. (Update options to reload.) Automatically display related posts? Before / after (Excerpt): Before / after (excerpt): Before / after each related entry: Before / after related entries display: Before / after related entries: Bodies:  Categories:  Click to toggle Cross-relate posts and pages? Default display if no results: Disallow by category: Disallow by tag: Display options <small>for RSS</small> Display options <small>for your website</small> Display related posts in feeds? Display related posts in the descriptions? Display using a custom template file Do you really want to reset your configuration? Donate to mitcho (Michael Yoshitaka Erlewine) for this plugin via PayPal Example post  Excerpt length (No. of words): Follow <a href="http://twitter.com/yarpp/">Yet Another Related Posts Plugin on Twitter</a> For example: Help promote Yet Another Related Posts Plugin? If, despite this check, you are sure that <code>%s</code> is using the MyISAM engine, press this magic button: Match threshold: Maximum number of related posts: NEW! No YARPP template files were found in your theme (<code>TEMPLATEPATH</code>)  so the templating feature has been turned off. No related posts. Options saved! Order results: Please move the YARPP template files into your theme to complete installation. Simply move the sample template files (currently in <code>wp-content/plugins/yet-another-related-posts-plugin/yarpp-templates/</code>) to the <code>TEMPLATEPATH</code> directory. Please try <A>manual SQL setup</a>. RSS display code example Related Posts Related Posts (YARPP) Related entries may be displayed once you save your entry Related posts brought to you by <a href='http://mitcho.com/code/yarpp/'>Yet Another Related Posts Plugin</a>. Related posts: Reset options Settings Show excerpt? Show only posts from the past NUMBER UNITS Show only previous posts? Show password protected posts? Tags:  Template file: The MyISAM check has been overridden. You may now use the "consider titles" and "consider bodies" relatedness criteria. The YARPP database had an error but has been fixed. The YARPP database has an error which could not be fixed. The higher the match threshold, the more restrictive, and you get less related posts overall. The default match threshold is 5. If you want to find an appropriate match threshhold, take a look at some post's related posts display and their scores. You can see what kinds of related posts are being picked up and with what kind of match scores, and determine an appropriate threshold for your site. There is a new beta (VERSION) of Yet Another Related Posts Plugin. You can <A>download it here</a> at your own risk. There is a new version (VERSION) of Yet Another Related Posts Plugin available! You can <A>download it here</a>. These are the related entries for this entry. Updating this post may change these related posts. This advanced option gives you full power to customize how your related posts are displayed. Templates (stored in your theme folder) are written in PHP. This option automatically displays related posts right after the content on single entry pages. If this option is off, you will need to manually insert <code>related_posts()</code> or variants (<code>related_pages()</code> and <code>related_entries()</code>) into your theme files. This option displays related posts at the end of each item in your RSS and Atom feeds. No template changes are needed. This option displays the related posts in the RSS description fields, not just the content. If your feeds are set up to only display excerpts, however, only the description field is used, so this option is required for any display at all. This option will add the code %s. Try turning it on, updating your options, and see the code in the code example to the right. These links and donations are greatly appreciated. Title: Titles:  To restore these features, please update your <code>%s</code> table by executing the following SQL directive: <code>ALTER TABLE `%s` ENGINE = MyISAM;</code> . No data will be erased by altering the table's engine, although there are performance implications. Trust me. Let me use MyISAM features. Update options Website display code example When the "Cross-relate posts and pages" option is selected, the <code>related_posts()</code>, <code>related_pages()</code>, and <code>related_entries()</code> all will give the same output, returning both related pages and posts. Whether all of these related entries are actually displayed and how they are displayed depends on your YARPP display options. YARPP is different than the <a href="http://wasabi.pbwiki.com/Related%20Entries">previous plugins it is based on</a> as it limits the related posts list by (1) a maximum number and (2) a <em>match threshold</em>. YARPP's "consider titles" and "consider bodies" relatedness criteria require your <code>%s</code> table to use the <a href='http://dev.mysql.com/doc/refman/5.0/en/storage-engines.html'>MyISAM storage engine</a>, but the table seems to be using the <code>%s</code> engine. These two options have been disabled. Yet Another Related Posts Plugin Options by <a href="http://mitcho.com/">mitcho (Michael 芳貴 Erlewine)</a> category consider consider with extra weight date (new to old) date (old to new) day(s) do not consider month(s) more&gt; require at least one %s in common require more than one %s in common score (high relevance to low) score (low relevance to high) tag title (alphabetical) title (reverse alphabetical) week(s) word Project-Id-Version: YARPP_DE
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2008-11-17 14:23+0100
PO-Revision-Date: 
Last-Translator: dassad <dassad@dassad.net>
Language-Team: Michael Kalina <m.kalina@3th.be>
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Poedit-Language: German
X-Poedit-Country: GERMANY
X-Poedit-SourceCharset: utf-8
X-Poedit-KeywordsList: __;_e;__ngettext:1,2;_n:1,2;__ngettext_noop:1,2;_n_noop:1,2;_c,_nc:4c,1,2;_x:1,2c;_ex:1,2c;_nx:4c,1,2;_nx_noop:4c,1,2
X-Poedit-Basepath: .
X-Textdomain-Support: yes
X-Poedit-SearchPath-0: .
 vagy Hasonlóság opciók Adatbázis Az adatbázis a megjelenítendő bejegyzések és oldalak közös halmazát jelenti melyek az adott bejegyzésben jelennek meg Az %f a YARPP hasonlósági eredményt jelképezi az adott és a hasonló bejegyzés közt- Azért látod ezt mert adminisztrátorként vagy bejelentkezve Wordpress oldaladra. Normál látogatók ezt nem láthatják. Frissités az újrabetöltés előtt. Hasonló bejegyzések autómatikus megjelentése? Előtte / Utánna  (Excerpt): Előtte / Utánna (excerpt): Hasonló bejegyzések találatai előtt és utánn Megjelentés a hasonló bejegyzések Előtt és Utánn Hasonló bejegyzések előtt és utánn tartalmak: Kategóriák: Kattints az átváltáshoz Bejegyzések és oldalak közösen_ Alap megjelenítés ha nincs találat: Letiltás Kategória alapján: Letiltás TAG-ok alapján: Megjelenítési beállítások az <small>RSS</small>-nek <small>(weboldal)</small> megjelenítési opciók Hasonló bejegyzések megjelenítése a RSS/XML Feedekben? Hasonló bejegyzések megjelenítése a leírásban? Tetszőleges Sablon használata Biztosan vissza szeretnéd állítani minden beállításodat alap hejzetbe: Adományozz (Michael Yoshitaka Erlewine) -nek ezért a pluginétt Paypal segítségével Példa bejegyzés Szövegrészlet (Excerpt) hossza (szavak száma): Folge <a href="http://twitter.com/yarpp/">Yet Another Related Posts Plugin auf Twitter</a> Például: A YARPP reklámozása? Ha biztos vagy benne, hogy <code>%s</code> használja a  MyISAMmodult, nyomd meg ezt a varázsgombot: Hasonlóság: Maximum hasonló bejegyzés: ÚJ! Nincs talált YARPP sablon a jelenleggi Wordpress sablonod mappájában (<code>TEMPLATEPATH</code>)  tehát ezt az opciót letiltottuk. Nincs hasonló bejegyzés Beállítások elmentve! Bejegyzések rendezése: Kérlek helyezd at a YARPP sablonokat a jelenlegi Wordpress sablonod mappájábqa. Egyszerüen helyezd át az alap YARPP sablonokat (currently in <code>wp-content/plugins/yet-another-related-posts-plugin/yarpp-templates/</code>) a <code>TEMPLATEPATH</code> mappába. Kérlek próbálozz a  <A>manuális SQL beállításokkal</a>. RSS-megjelenítési példa Hasonló bejegyzések Hasonló bejegyzések (YARPP) Hasonló bejegyzések csak mentés után jelenhetnek meg Hasonló Bejegyzések bitosítva a  <a href='http://mitcho.com/code/yarpp/'>Yet Another Related Posts Plugin</a> segtségével. hasonló bejegyzések: Alap beállítások Beállítások Szövegrészlet (excerpt) mutatása? Csak az előbbi számhalmazokból jelenítsen meg Csak korábbi bejegyzések mutatása? Jelszóval védett bejegyzések mutatása? Tagok: Sablon file: A MyISAM beállításai felüllíródtak. Most már használhatod a "címek figyelembe vevése" és "tartalmak figyelembe vevése" hasonlósági opciókat. A YARPP adatbázis hibát tartalmazott de ki lett javítva A ZARPP adatbázis hibát tartalmaz melyet nem sikerült kijavítanunk Minél pontossabb a hasonlósági beállításod annál kevesebb hasonló bejegyzés jelenik meg. Az alap megjelentés 5. Ha több hasonló bejegyzést szeretnél megjeleníteni adj meg kevesebb szűrési opciót illetve ha kevesebb de pontosabb találatokat szeretnél, adj meg minden szűrési opciót. Új BETA verzója van a YARPP pluginak. Az új verziót <A>itt letöltheted</a> saját felelősségedre. Új verzója van a YARPP pluginak. Az új verziót <A>itt letöltheted</a> . Ezek a hasonló bejegyzések ennek a bejegyzésnek. A bejegyzés frissítése más hasonló bejegyzéseket eredményezhet. Ez az opció lehetőséget ad neked a hasonló bejegyzések megjelensének módostására. A sablonok (melyek a jelenlegi Wordpress sablonod mappájában találhatóak) PHP nyelven vannak írva. Ez az opció automatikusan megjeleníti a hasonló bejegyzéseket minden bejegyzése utánn. Ha ez az opció nincs engedélyezve, manuálisan kell beillesztened a <code>related_posts()</code> vagy (<code>related_pages()</code> és <code>related_entries()</code>) kódot a Wordpress sablonodba. Ez az opció minden RSS iletve XML feed bejegyzés után megjeleníti a hasonló bejegyzéseket. Nincs szükség kód módosításra. Ez az opció a hasonló bejegyzéseket is megjelenti az RSS-ben nem csak azok tartalmát. Abban az esetben ha csak szövegrészleteket jelenítesz meg az RSS-ben akkoris megjelennek a hasonló bejegyzések. Ez az opció a %s kódot hozzáadja. Engedélyezd, és mentsd el a beállításaidat majd ellenőrizd a példa kódot a jobb oldalon. Ezeket a linkeket és az adományokat megköszönjök. Cím: Címek: Hogy visszaállítsd ezeket a lehetőségeket, kérlek frissítsd a <code>%s</code> adatbázis táblázatot a következő SQL parancs segítségével: <code>ALTER TABLE `%s` ENGINE = MyISAM;</code> . Egyetlen tábla sem lesz törölve, csak a telyesítmény beállításai módusulnak Bizz meg bennem. Engedd hogy használjam a MyISAM lehetőségét. Beállítások frissítése Megjelenítési kód példa Ha ez az opció aktv akkor a  <code>related_posts()</code>, <code>related_pages()</code>, és <code>related_entries()</code> kódok ugyanazokat a találatokat jelentik meg, melyek tartalmazzák a bejegyzéseket és oldalakat is. A hasonló bejegyzések megjelenítési stílus aés módja a YARPP beállításaitól függ. A YARPP más mint az <a href="http://wasabi.pbwiki.com/Related%20Entries">előző plugin melyre alapoztuk</a> mivel csak egy hasonló bejegyzések listát engedély és <em>pontosabb találatok</em>. Hibát észleltünk. Több információ: YARPP's "consider titles" and "consider bodies" relatedness criteria require your <code>%s</code> table to use the <a href='http://dev.mysql.com/doc/refman/5.0/en/storage-engines.html'>MyISAM storage engine</a>, but the table seems to be using the <code>%s</code> engine. These two options have been disabled. YARPP beállítások <a href="http://mitcho.com/">mitcho (Michael 芳貴 Erlewine)</a> -től kategória vegye figyelembe különlegesként kezeld dátum (áj a régire) dátum (régi az újra) nap(ok) ne vegye figyelembe hónap(ok) több&gt; leglább egy közös %s kell legyen több mint egy közös %s kell legyen  hasonlóság (erőstőll a gyengéig) hasonlóság (gyengétőll az erőssig) tag Cím (ABC sorrend) Cím (fordtott ABC sorrend) hét(hetek) szó 