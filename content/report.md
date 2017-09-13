---
title: "Redovisningar"
...
Mina redovisningar
=========================

##Kmom 01

*Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.*

Har inhämtat en del kunskaper i PHP under året, och tycker jag har en solid bas. Sedan är det naturligtvis alltid mer att lära sig. Dependency Injection behöver jag ha bättre koll på. Testdriven utveckling likaså. Jag har nog en bra bredd på mina kunskaper, så nästa steg bör bli att fördjupa dessa. Sådant som känns matnyttigt är också att till exempel ha fler array- och string-funktioner i huvudet, för att kunna skriva bättre kod. Även templates och att testa olika ramverk och se hur de fungerar vore bra att ha med sig.

Något annat jag eftersträvar är att hitta arbetsmetoder som jag trivs med. Hittills har jag jobbat med egna projekt ganska mycket från scratch, men naturligtvis, när projekten blir större blir det allt mer nödvändigt att använda ramverk och sånt som scaffolding som vi nu fått pröva på – att skapa en skelettstruktur som man återanvänder, för att undvika att 'uppfinna hjulet' vid varje nytt arbete.

*Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?*

Några ramverk som kommer igen är följande fem:
Laravel, Symfony, Phalcon, Codeigniter och Zend.
Även om några fler nämns.

Laravel verkar vara klart störst.

Kikade på bland annat följande sidor:

[https://medium.com/@elitechsystems/the-most-popular-php-frameworks-in-2017-a90a1189405e](https://medium.com/@elitechsystems/the-most-popular-php-frameworks-in-2017-a90a1189405e)

[https://www.quora.com/What-is-the-best-PHP-framework-2017](https://medium.com/@elitechsystems/the-most-popular-php-frameworks-in-2017-a90a1189405e)

Jag gjorde en egen jämförelse på Google Trends, med sökorden: Laravel, Symfony, Zend, Codeigniter och Cakephp (Phalcon hade väldigt låg sökfrekvens, så utelämnade det):

![Frameworktrender enligt Google Trends](image/framework_trends.png)

Den visar att Laravel är överlägset störst bland vad folk söker på.

*Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.*

Jag har en positiv bild av communities generellt, även om mina interaktioner varit mer passiva än aktiva. Exempelvis Stackoverflow är en sida som ofta dyker upp i sökresultat för olika kodproblem. Jag upplever att folk försöker svara så gott de kan. Dbwebb-communitiet känns annars väldigt generöst när man behöver få hjälp, men där är vi ju inkluderade redan från början som studenter.

Jag antar att det skiljer sig åt hur god ton ett community upprätthåller, och att det behövs moderatorer med ett uttalat syfte beskydda detta och motverka missbruk.

*Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?*

Det verkar vettigt att plocka ihop sin kod utifrån olika delar, som sinsemellan är oberoende av varandra. Blir intressant att lära mer om detta.

*Hur gick dina förberedelser inför kommentarssystemet?*

Jag har tidigare skapat kommentarsystem med PHP och databastabeller i MySQL. Den här gången tänker jag mig att göra det med hjälp av klasser. I grunden tror jag inte det är så svårt, men jag anar att vi här ska lägga ribban lite högre och göra funktionaliteten mer avancerad. Blir intressant att se olika sätt att göra det på, och att finna ut ett lämpligt sätt. Att abstrahera sin kod – men inom vissa gränser, där faran är att det blir oöversiktligt, ser jag just nu som en möjlig riktlinje. Vi får se hur det blir i slutändan.


##Kmom 02

Jag integrerade REM-servern i min me-sida, skapade en länk i navbaren till den och en liten framsida. Det var inte några särskilda svårigheter.

Jag ville göra något med min navbar, och flyttade den därför ifrån view/navbar.
Jag lade arrayen med navigationslänkar i en config-fil. Skapade en navbarklass i min src-mapp, där jag lade koden som skapar html för navbaren, i metoden getHtml. Så lade jag koden som injicerar navbar-klassen i service.php, bland de andra tjänsterna.

Då utgör både klassen med navbarkod och datan som innehåller navbararrayen en modell. Det finns däremot ingen kontroller, men detta kändes överflödigt för en navbar.
Men kanske ändå lite bättre struktur nu, mindre kod i min vy, där metoden navbar->getHtml anropas.

###Kommentarsystem

Jag flyttade session->start från remserverklassen till index.php, för att jag vill starta sessionen redan från början och inte ha några konflikter.

Steg 2 blev att spara kommentarer som key-value i sessionen.
Med en saveComment()-metod.

Jag skapade en array för varje kommmentar, där jag använde mig av namnet på den aktuella routen. Denna array lagras i sessionen. Då blev det enkelt att lägga till nya kommentarer med key-value-par: id, text, email och gravatar.

Jag lade till en metod i session-klassen: setArray(), för att kunna spara en array i session.

Jag blev inte helt klar med en fungerande prototyp där kommentarerna lagras i sessionen, och bestämde mig för att lämna det till kommande kursmoment. Det går dock att lägga till och att ta bort kommentarer för de olika sidorna. Det trilskades lite med redigera-funktionen och efter lite hjälp från kurskamrater stod det klart att det hade varit bättre att använda routes och anax request-modul. Har heller inte kopplat kommentarer till markdown och textfilter-klassen. Jag kikade på det, men lämnar det som det är så länge, eftersom Mikael sagt att det är okej och att vi kommer tillbaka till kommentarsystemet och omstrukturerar det genom hela kursen.

###Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC? Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?

Jag har inte jobbat med MVC på det sättet som jag gjort nu. Det nya för mig är att använda kontrollerklasser i tillägg till modellklasser.

Jag har nog inte blivit varm i kläderna än med att använda MVC. Jag tror jag behöver skriva mer kod, och utforska MVC för olika typer av lösningar, för att bättre kunna se och argumentera för om MVC är bättre eller sämre. Kanske det lämpar sig bättre för vissa program och så vidare. När det gäller till exempel navbar-klassen kom vi väl gemensamt fram till på chatten att det kändes överflödigt med en kontrollerklass, och det kan jag hålla med om.

Men något jag tänker på som en fördel är när det handlar om större projekt där det finns en uppdelning mellan personer som kodar i front-end och back-end, kan det vara en bra uppdelning. Front-endare och designers behöver inte ha tillgång till klasser i back-end, det är inte nödvändigt. Det kan ju också leda till onödiga fel och buggar, till exempel om man låter vyer ha tillgång till ett '$app'-objekt som innehåller alla applikationens tjänster.

För kursen individuellt programvaruprojekt har jag börjat jobba med ramverket Squarespace, som åtminstone har en tydlig uppdelning mellan template och back-end. Så som jag förstår det så existerar allt innehåll – text och bilder med mera – som ett json-objekt på servern. Utvecklaren laddar ner ett template / mall och jobbar utifrån denna. Intressant att kika på hur det fungerar och jämföra olika system.

Jag kikade på dbwebb-artikeln [https://dbwebb.se/kunskap/php-baserade-och-mvc-inspirerade-ramverk-vad-betyder-det](https://dbwebb.se/kunskap/php-baserade-och-mvc-inspirerade-ramverk-vad-betyder-det), och på wikipedias artiklar som länkades till i kursmomentet.

###Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?

Mina källor:

[http://williamdurand.fr/2013/07/30/from-stupid-to-solid-code/](http://williamdurand.fr/2013/07/30/from-stupid-to-solid-code/)

[https://scotch.io/bar-talk/s-o-l-i-d-the-first-five-principles-of-object-oriented-design](https://scotch.io/bar-talk/s-o-l-i-d-the-first-five-principles-of-object-oriented-design)

1. Single responsibility principle:

*En klass ska bara göra en sak. Det ska aldrig finnas mer än en anledning att ändra en klass.*

2. Open - closed principle:

*En klass ska vara öppen för att kunna förlängas / utökas, men stängd för att kunna ändras / ska inte kunna förändras*

3. Liskov substitution principle:

*Varje subklass ska kunna ersättas av sin parent / base-klass*

4. Interface segregation principle:

*En klient / ett program ska bara behöva implementera interface som den / det behöver.*

5. Dependency Inversion Principle:

*Koden ska vara beroende av abstraktioner och inte av konkretioner.*


Solid-principerna verkar handla mycket om att abstrahera – för att skapa kod som oberoende delar, något som gör den möjlig att lättare kunna förlänga / extend och för att lättare kunna underhålla den. Att skriva solid kod gör den också mer testbar.



##Kmom 03
##Kmom 04
##Kmom 05
##Kmom 06
##Kmom 07-10
