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

Jag integrerade REM-servern i min me-sida, skapade en länk i navbaren till den och en liten framsida.

Jag ville göra något med min navbar, och flyttade den därför ifrån view/navbar.
Jag lade arrayen med navigationslänkar i en config-fil. Skapade en navbarklass i min src-mapp, där jag lade koden som skapar html för navbaren, i metoden getHtml. Så lade jag koden som injicerar navbar-klassen i service.php, bland de andra tjänsterna.

Då utgör både klassen med navbarkod och datan som innehåller navbararrayen en modell. Det finns däremot ingen kontroller, men detta kändes överflödigt för en navbar.
Men kanske ändå lite bättre struktur nu, mindre kod i min vy, där metoden navbar->getHtml anropas.

#Kommentarsystem

Flyttade session->start från remserverklassen till index.php, för att jag vill starta sessionen redan från början och inte ha några konflikter.

Steg 2 blir att spara kommentarer som key-value i sessionen.
Med en saveComment()-metod.

Jag skapade en array för varje kommmentar, där jag använde mig av namnet på den aktuella routen. Denna array lagras i sessionen. Då blev den enkelt att lägga till nya kommentarer med key-value-par: text, email och gravatar.

Jag lade till en metod i session-klassen: setArray(). För att kunna spara en array i session.

##Kmom 03
##Kmom 04
##Kmom 05
##Kmom 06
##Kmom 07-10
