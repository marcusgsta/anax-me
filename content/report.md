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

###Hur känns det att jobba med begreppen kring dependency injection, service locator och lazy loading?

När man väl får det att funka så är det en fördel att separera olika delar av kodbasen ifrån varandra. Det känns fortfarande ovant. Jag tror jag behöver jobba lite mer med det, bara vänja mig vid hur koden är strukturerad numera. Framför allt känns dependency injection som något man bör ha koll på, eftersom det är ett vanligt designmönster.

Lazy Loading – att bara aktivera de delar / moduler som behövs, känns ju som en bra idé, och är nu möjligt tack vare dependency injection.

Service Locator – Vet inte om jag förstått perfekt, men jag tolkar det som att filen di.php är denna service locator. En fil som kopplar ihop alltsammans. Här skapas en array kallad 'services', och där varje service innebär att en klass initieras med 'new', och att en viss metod i klassen anropas. På liknande sätt använde vi förut filen service.php, där vi byggde upp vårt $app-objekt. I samband här kan man också injecta ytterligare beroenden, så som databasen. Här injectas också $di in i några av klasserna. Det har fungerat fint tycker jag. Så länge man själv har koll på strukturen så är det bra. Denna fil blir ju själva limmet i applikationen.

###Hur känns det att göra dig av med beroendet till $app, blir $di bättre?

Som sagt så vet jag inte om jag märker någon uppenbar skillnad. Men, det visar sig nog med större projekt. Här är ju funktionaliteten densamma.


###Hur känns det att återigen göra refaktoring på din me-sida, blir det förbättringar på kodstrukturen, eller bara annorlunda?

Jag tycker det stora jag har lärt mig under kmom03, och fördelen jag ser med omstruktureringen av koden är det som gäller routerna, och att sköta om dem med hjälp av modulerna anax/request och response. Jag tänker på kommentarsystemet och att använda routes som 'comment/post'. Man låter request-modulen ta emot POST-requests, och hanterar det sedan i klasser och metoder. Känns som ett bättre sätt att hantera POST och GET via moduler, istället för att skriva kod i renderPage för att hämta POST-innehållet.


###Lyckades du införa begreppen kring DI när du vidareutvecklade ditt kommentarssystem?

Jag har ett kommentarsystem som jag har börjat föra över från session till databas. Bit för bit börjar jag också införliva DI. Jag har satt in två klasser Comment och CommentController som services i min service locator, där de blir en del av DI-kontainern.


###Påbörjade du arbetet (hur gick det) med databasmodellen eller avvaktar du till kommande kmom?

Jag har skapat några tabeller för användare och kommentarer, och också lagt in databasen som modul för att se att den fungerar. Jag startar en instans av databasklassen i min di.php. Det går också att lägga in kommentarer i en tabell, ifrån varje sida. Jag avvaktar med resten av arbetet, då kmom04 verkar fokusera mer på hantering av databasen.

###Allmänna kommentarer kring din me-sida och dess kodstruktur?
Jag använder Bootstrap den här gången, för att jag ville få koll på hur. Med hjälp av detta skapade jag en responsiv navbar med 'hamburgerknapp' och slide-down för små skärmar.
För att få Bootstraps javascript på plats lade jag in dem i en array i min redigerade version av anax/page och pageRender-metoden. Så skapade jag en egen version av default1/layout-mallen, där jag i tillägg till att hämta stylesheets också hämtade javascripten. Det funkade bra.

Jag fick varningar för exit expressions i några klasser, bland annat PageRender. Efter vad jag förstått var det okej att ta bort de varningarna, så det gjorde jag med 'suppress warnings'.


##Kmom 04

###Hur gick det att integrera formulärhantering och databashantering i ditt kommentarssystem?

Jag använde mig av HTMLForm och Active Record för att lägga in bok-exemplet, och jag fortsatte med att införliva för User och Comment. Det gick relativt smärtfritt. Skönt också att inte behöva skriva all CRUD-kod igen. Det känns typiskt som sådan kod som är lämplig att scaffolda fram. HTMLForm känns också praktiskt. Här finns alla formulär, och funktioner för att fånga upp POST och GET-variabler. Väldigt bra grej att ha i bagaget för kommande projekt.

Jag behövde ändra i REM-servern så att session inte startades där utan istället i config/di.php, eftersom jag nu använder session på flera ställen, bland annat används session i databashanteringen.

###Berätta om din syn på Active record och liknande upplägg, ser du fördelar och nackdelar?

Active Record verkar också praktiskt. Jag gillar idén att automatisera databashanteringen och slippa skriva sql-kommandon, och sköta allt via objekt istället. Nackdelar kan vara att man inte har full koll på det som sker under huven. Det är möjligt att det också inte är lika lätt att införliva mer avancerade databasfrågor, och som när man behöver programmera databasen och använda triggers och lagrade procedurer. Där kan Active Record vara begränsat. Å andra sidan kan man ju skriva fler Active Record-metoder, utöver de vanliga CRUD-varianterna, och kombinera med att programmera databasen. När man har gjort det arbetet en gång kan det också återanvändas.

###Utveckla din syn på koden du nu har i ramverket och din kommentars- och användarkod. Hur känns det?

Det tog lite tid att vänja sig vid den nya strukturen, men efterhand blev det klarare hur jag skulle lägga till nya sidor och formulär. Jag använder DI, routes, pageRender-metoden, och kallar på funktioner i kontrollerklasser från routerna. Formulären laddas med hjälp av Active Record inifrån klasserna och med hjälp av HTMLForm. Jag gjorde alltså om tidigare kod för kommentarsystemet och skrev nya klasser. Jag skulle med fördel kunna gå igenom och snygga till. På en del ställen vet jag att jag kunde ha städat upp sånt som man när man är lite tidspressad inte ägnar tid åt för stunden. Men jag flyttade ut en del kod till egna funktioner och tänkte igenom innan jag skrev ny kod, vilket var bra för strukturen.

Jag har lagt in felhantering men på den punkten vet jag att det kan bli bättre. På flera ställen behöver jag skydda sidor för andra än administratören (som har roll = 10), exempelvis.

###Om du vill, och har kunskap om, kan du även berätta om din syn på ORM och designmönstret Data Mapper som är närbesläktade med Active Record. Du kanske har erfarenhet av liknande upplägg i andra sammanhang?

Jag minns jag använde ORM i Python med SQLAlchemy, som också kopplade databas till klasser i koden. Det är ett smart sätt, menar jag, att sköta databaskopplingar med. Det fungerade bra med Python också. Utan att ha alltför mycket annat att jämföra med så är jag positiv.

###Vad tror du om begreppet scaffolding, kan det vara något att kika mer på?
Jag gillar det, det verkar såklart behändigt att scaffolda fram en grund, ett boilerplate för olika projekt. Det kan gälla för sådant som CRUD till exempel. Eller för vilken som helst webbsida, att med ett kommando skapa ett skal som man sedan bygger vidare på. Jag ser för mig att ha diverse olika scaffolds vilka skapar kodgrunder för olika typer av webbprojekt.

Det skulle vara kul att lära lite mer om hur man skapar scaffolding-script som bygger upp en större eller mindre färdig filstruktur, men jag antar det är bash-script och kanske något vi egentligen redan kan. Jag har använt liknande, i form av Makefiler  där jag laddar upp filer till en server, för ett visst projekt. Allt som automatiserar arbetsprocessen känns bra att kunna.

##Kmom 05

###Hur gick arbetet med att lyfta ut koden ur me-sidan och placera i en egen modul?

Det gick riktigt bra den här gången. Jag följde instruktionerna och hade inga större problem.

Jag har valt att skapa kommentarsmodulen med inloggning, och också med en koppling till bootstrap och en responsiv navigationsmeny. I navigationen ingår också en route 'Min profil', med användarens profil när hon är inloggad. Det kändes lämpligt att ha med detta. På så sätt är kommentarsmodulen även något stylad så att man lätt kan börja jobba vidare med den.

###Flöt det på bra med GitHub och kopplingen till Packagist?

Ja, det erbjöd inga större problem. Lätt att följa anvisningarna, registrera konto och skapa en hook från Github för automatisk uppdatering när man pushar till repot.

###Hur gick det att åter installera modulen i din me-sida med composer, kunde du följa du din installationsmanual?

Ja, det gick helt fint. Så som den är skriven så funkar manualen för en helt ren anax-installation. För min me-sida behövde jag göra lite annorlunda på några ställen för att införliva koden. Det gällde navigationsmenyn, där jag valde att inte byta ut min förra eftersom jag hade routes där som jag behövde. I övrigt raderade jag de flesta av filerna och laddade in igen med hjälp av de kommandon jag noterat i manualen.

I manualen sätter man även permissions på databasmappen och databasfilen för att det ska fungera. Jag fixade till mina routes som visat på föreläsningen med "mount" => "comment"/"user", för att minska fel som kan uppstå när användaren ändrar i filer. Nu kan man istället bara kopiera in routsen i route-mappen, så hämtar anax dem automatiskt. Behändigt.

Jag skrev i manualen att man behöver hämta de nya services från config/di.php och lägga in i sin egen DI, samt uppdatera några av de gamla med den nya koden, som exempelvis PageRender.

Nu ska det fungera perfekt när man följer anvisningarna.

###Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?

Jag begränsade mig till några få enhetstester eftersom det inte var ett krav att ha hög täckning, och eftersom jag behöver komma vidare.
Testerna jag har fungerar bra, men det strulade med att visa kodtäckning för enhetstester. Det var någonting med min dator, eftersom det fungerade på Mikaels dator med samma kod. Det har möjligen att göra med PHP7, men är inte säker. Jag prövade också att uppdatera XDebug men till ingen nytta.

###Några reflektioner över skillnaden med och utan modul?
Jag tycker det var kul att se hur det fungerar att skapa modul och lägga upp på Packagist, för att sedan dra ned den till godtycklig anax-bas. Otroligt smidigt sätt, composer känns genialt för att inkludera moduler. Kodbasen är i stort sett detsamma, men jag fick tillfälle att rensa upp gamla klasser och annat som inte längre behövdes.

Andra reflektioner är att jag antar att jag har för mycket kod i kontrollerna. Jag följde något exempel, och så rullade det på. I efterhand känns det som om det inte var så det var tänkt, utan att jag istället skulle göra det största arbetet i modellerna. Jag låter det vara så nu, så ska jag satsa på att fixa detta bättre i projektet.

Roligt kursmoment, och skönt att det inte var så omfattande den här gången, särskilt eftersom jag behöver komma i kapp lite grann och tänka på projektet.


##Kmom 06

###Har du någon erfarenhet av automatiserade testar och CI sedan tidigare?

Vi var inne och nosade på området enhetstester i oophp-kursen i våras. Jag gjorde först några få tester mest för att checka att det fungerade som det skulle med phpunit. Så gav jag mig in lite mer i det. Det kändes lite överväldigande och jag hade dålig koll på det, men jag fick upp min kodtäckning efterhand efter googlande och lite tjuvkikande på kurskamraters lösningar och på forum. Behövde förstå hur jag skulle införliva en mockad DI i mina testmetoder. Något annat jag lärde mig var setup och teardown-metoder, samt setUpBeforeClass som jag såg behövdes för att testa HTMLForm-klasser. Här var phpunits dokumentation till hjälp också.

Automatiserade tester hade jag ingen erfarenhet av tidigare.

###Hur ser du på begreppen, bra, onödigt, nödvändigt, tidskrävande?

Jag är väldigt nöjd med att kunna lite mer om detta område. Jag föreställer mig att när man jobbar ute på företaget så är det vanligt med CI. Jag tycker det är otroligt smidigt, för att skriva bättre kod.

Det som har varit tidskrävande är själva enhetstesterna, att mocka DI, databas och sessioner och lära sig hur detta fungerar. Här har jag mer kunskap att inhämta. När man väl satt sig in i det så kan det säkert bli en mer naturlig del av kodningen. Som någon föreslog att till exempel först skriva tester och sedan skriva kod för att klara testerna. Det är ett annat sätt att tänka på programmering. Med tanke på alla issues ens kod har, oavsett hur duktig man är får man säkert buggar, så menar jag att det är nödvändigt med automatiserade tester.

###Hur stor kodtäckning lyckades du uppnå i din modul?

Det står nu på 35 % på scrutinizer, vilket känns bra med tanke på att jag har en ganska stor modul, där jag även drog in klasser ifrån Anax/Page, och där jag även har en navbarklass. Jag skulle nog ha kunnat renodla modulen. Samtidigt känns det praktiskt att ha en modul som fixar även navigation och koppling till bootstrap för styling. I samband med att jag lyfte över PageRender-klassen så tog jag också med de andra klasserna i Page (debug/error etc.), på grund av att det kraschade annars. Men de klasserna borde gå att lyfta ut, antar jag, så att programmet letar upp dem i anax istället.

Angående testandet av HTMLForm-klasserna så fick jag en hel del fel, och nöjde mig med att testa konstruktionen av objekten, och inte callback-metoderna, för det mesta. Även med tanke på metoder i kontrollerna som anropar anax/view stötte jag på motstånd. Jag får ändå vara nöjd med de tester jag har skrivit och som nu fungerar.

###Berätta hur det gick att integrera mot de olika externa tjänsterna?

Det var inga större problem. Det var bara att logga in och koppla upp sin github mot dem. Något som skedde när jag trodde jag var färdig med allt var att Scrutinizer inte hittade en klass jag kallat UserLogInTest. På Gitter föreslog Mikael att det handlade om Windows och Unix olika känslighet för små och stora bokstäver. Jag ändrade alla "userLogIn" till "userLogin", och så funkade det igen.

Det var också lite strul med versioner och jag uppdaterade lite fram och tillbaka med phpunit 5.7 - 6.4. Jag kör PHP 7.1 och försökte tyda felmeddelandena, men det slutade med att jag körde phpunit 5.7, för att inte behöva ändra i konfigurationsfilerna. Jag ville göra det så enkelt som möjligt för att komma vidare.

###Vilken extern tjänst uppskattade du mest, eller har du förslag på ytterligare externa tjänster att använda?

Scrutinizier verkar bra. Är överraskad att jag får 9.5 i "kodbetyg", vet inte om min kod förtjänar det, men det ger lite självförtroendeboost i alla fall. Har inte fixat så mycket på de olika issues koden har fått.

CodeClimate tycker att min kod luktar, jag fick "6 code smells". Det handlade om antal tillåtna rader i funktioner, vilket såklart är en poäng att korta ner. Även duplicerad kod går ofta att förbättra. Men Scrutinizer hade mer specifika varningar, och delade också upp i major och minor och bugs. Mycket att ta tag i och förbättre, jättebra verktyg.

SensioLabs gav också besked om att jag har bortkommenterad kod som borde avlägsnas.

Eftersom de olika tjänsterna bidrar med olika information om hur jag kan förbättra min kod och struktur så känns det som en bra idé att använda dem allihop. På så sätt kan man ju få ut mest av testningen.

##Kmom 07-10 – Projektet

###Krav 1 - 3
Det var en klar fördel att kunna använda min kommentarsmodul som utgångspunkt för projektet, något som med en gång gav det en struktur som var lätt att bygga vidare på. Jag installerade ett anax-skelett, och använde composer för att ladda ner mitt repo marcusgsta/comment från Packagist.

Samtidigt visade det sig ändå snart att jag behövde förändra mycket. Jag tog bort mitt förra kommentarssystem där det var möjligt att kommentera varje sida på webbplatsen. Istället skapade jag nya router, klasser och formulär. Det som framför allt är kvar av det ursprungliga är koden som har med inloggning och användarprofiler att göra.

Man kan registrera en ny användare, med gravatar som profilbild, och även redigera sin profil. När man är inloggad kan man ställa frågor, besvara frågor, samt kommentera frågor eller svar. Jag kikade på StackOverflows webbplats, som jag har haft som modell för utförandet. Särskilt strukturen för frågesidan behövde jag titta extra på. Frågesidan inleds med en fråga, vilken består av både titel och text, så som på SO, där man också kan lägga in bilder, länkar och formatera med hjälp av markdown som filter. De har också ett grundläggande skydd mot script-injektioner; specialtecken skrivs ut som de är istället för att tolkas till kod.

Varje fråga följs av sina eventuella kommentar, och ett formulär för att kommentera. Varje frågesvar följs också av först svarets kommentarer, sedan följer ett formulär för att kommentera det svaret. Längst ner på sidan finner man formuläret för att besvara frågan, uppdelat så som frågeformuläret med titel och text (textarea). För kommentarformulären fick det räcka med ett textfält utan titel.

Jag visste inte helt hur jag skulle lösa det med många formulär på samma sida. I huvudsak fick jag det att fungera genom att ge ett unikt id till varje formulär, där jag konkatenerade id:t för frågan eller svaret till en textsträng.

Formulären hanteras av Anax modul HTMLForm. Jag använder olika formulär till frågor och svar, men skapade en enda formulärmall som sköter både kommentarerna till frågor och till svar. Det ordnade sig genom att sända in variabler och fråge- eller svarsid i klassanropen.

Vidare finns en sida där alla taggar visas upp, tillsammans med de frågor som är kopplade till dessa. Man kommer till frågans sida genom att klicka på den.

### Krav 4: Frågor

Frågeställaren kan märka ett svar som accepterat. Bara ett av svaren till en fråga kan vara accepterat. Detta kontrolleras med en metod som kontrollerar om en fråga har ett accepterat svar.

Alla kan rösta en gång på varje fråga, svar och kommentar, antingen upp eller ner, sedan blir röstningsknappen inaktiv. Det går också att sortera svaren enligt popularitet/röster eller datum – äldst eller nyast främst. I översikten av frågorna visas frågans rank och hur många svar den har fått.

Jag har delat upp vyn för en fråga, och lyft ut delar av koden som går att återanvända, som knapparna för röstning, vilka används flera gånger och även behöver olika tillstånd (inaktiv/aktiv).

För att samla funkionaliteten kring röstande skapade jag en voteController, och dessutom tabeller för röstningar på fråga, svar och kommentarer, för att bättre kunna räkna och hantera användarnas röstningar.

Med hjälp av Bootstrap finns ett enhetligt användargränssnitt där jag använder 'badges' i olika färger för att visa antal svar och ranking.

Något som har hjälpt mig är att minimera koden i vyerna och nästan bara sända in objekt med all information vyn behöver, som till exempel att ha ett attribut question->hasAccepted, för frågor som har ett accepterat svar. Det är också något som har gjort det enklare att felsöka när något inte fungerar.

### Krav 5 : Användare

Detta krav införlivade jag också. Jag skapade ett system för röster: Att skriva en fråga ger 10 poäng, ett svar ger 20 poäng och en kommentar ger 5 poäng. Utöver det får en användare 1 poäng för varje upp-röst, för fråga, svar eller kommentar, och på samma sätt minuspoäng för minusröster. På användarens offentliga profil kan man se vilken rank användaren har, och även annan statistik: frågor ställda och besvarade, kommentarer och svar givna.

Om en användare raderas av administratören sätts hennes ranking till 0. Användaren ligger ändå kvar i systemet som 'Raderad användare'. Den raderade användarens inlägg och svar tas inte bort, bara kopplingarna i tabellerna voteQuestion, -Answer och -Comment, eftersom de inte behövs längre.

En ytterligare funktion skulle kunna vara att ha ett sätt att ta bort allt som har med användaren att göra, frågor, svar och kommentarer – en 'Destroy user'. Jag läste att det ska finnas en sån funktion på StackOverflow.

### Krav 6 – Extra

Här vill jag trycka på att jag har jobbat för att göra webbplatsen smidig att använda. Jag har använt Bootstrap för designen och jag tycker det har hjälpt till att skapa ett lättanvänt användargränssnitt. Det är ofta små saker som lyfter användarvänligheten. Färger, knappar, badges. Knappar som går i synligt inaktivt läge när de inte kan användas mer, som röstningsknappar, och tabbarna för sortering av svaren.

Jag har införlivat säkerhet och sett till att escapa allt som skrivs ut, som en användare har skrivits in.

Sidorna fungerar också relativt bra responsivt, man kan visa i mobil och det ser bra ut, från navigationsmeny till frågeformulär och annat.

Jag vet inte om jag kan lägga till det som krav 6 men min kod ser bättre ut nu än i tidigare projekt. Jag har delat upp, abstraherat i mindre metoder i mina klasser, vilket har gjort det lättare att återanvända och felsöka. Jag är hur som helst stolt över detta, i jämförelse med vad jag har presterat tidigare.

### Allmänt om projektet

I sin helhet har det gått fint med projektet. Det kändes som om saker och ting föll på plats till slut, efter en del frustration under kursmomenten. Något som är kul är att jag märker att jag börjar skriva bättre kod, att dela upp i mer generella funktioner, redan under kodandet, istället för att låta det vänta. Det känns som om vi har byggt på våra kunskaper, och nu fått bättre helhetsförståelse för att bygga webbplatser och ramverk.

Något jag har lärt mig, tror jag, är att vara medveten om vad jag lägger min tid på. Det är viktigt att ta aktiva val och avgöra när man ska släppa något och gå vidare, och inte förlora sig i koden. Det kan ju vara frustrerande att veta att koden borde se bättre ut, att kod borde lyftas ut i egna funktioner, att namespace borde ordnas upp i. Med mer koderfarenhet kommer, tycker jag, en bättre känsla för vad som kommer att ge en "teknisk skuld", och hur stor denna skuld kommer att bli i framtiden. Något som man får ha i bakhuvudet under kodarbetet, och varje litet avgörande som man tar. Samtidigt som det i slutändan är det resultatet som är det viktiga, att kunna leverera produkten innan en deadline och att det fungerar för användaren.

För det här projektet har jag utvecklat min arbetsmetod. Eftersom det var så mycket funktionalitet som skulle utvecklas så har det fallit sig naturligt att på förhand skriva ner de olika stegen som behövde genomföras för varje uppgift. Detta gav mig en bättre översikt, och hjälpte mig också att inte förlora mig för länge i detaljer.

När jag på förhand tänkte igenom vilka steg jag skulle ta, så fick jag också bättre möjlighet att komma fram till mer hållbara lösningar. Det finns för det mesta många sätt att göra någonting på.  Det kan till exempel gälla att välja att göra en kopplingstabell för röstningar, eller att välja sqlite framför mySQL. Vad man väljer är inte självklart, det beror ju också på vad applikationen ska användas till och hur den kommer att fortsätta att utvecklas‚ vilka framtida funktioner som ska införlivas. Sqlite är begränsat, som när det gäller att programmera i databasen, men det är ändå ett dugligt och kraftfullt alternativ som jag tycker klarar att hantera ett sånt här frågeforum. En annan fråga är storleken på den färdiga applikationen, hur många användare som kommer att använda, något som också påverkar valet av tekniska lösning.

Projektet kan givetvis förbättras: Jag har inte lagt krut på administrationsdelen eftersom det inte var specificerat som krav. Jag nöjde mig med att administratören kan ta bort användare och redigera alla frågor. I en utvecklad version borde administratören kunna ta bort frågor, redigera och ta bort svar och kommentarer.

Som det är nu kan en användare redigera en egen fråga, men inte egna svar och kommentarer. Detta är funktioner som inte heller var specificerade som krav, och jag har därför inte fokuserat på detta. Det nya den här gången handlade ju om taggar och röstning, och att få det att fungera med många kommentarfält på samma sida, så jag har satsat på att införliva detta.

Med hjälp av ett javascript dolde jag kommentarfältet för en fråga, när det inte används. Man klickar fram det med en 'kommentera'-länk. Denna funktionaliteten skulle kunna införlivas även för svarskommentarer, men det får också hamna på förbättringslistan.


### Allmänt om kursen

Det har varit en lite annorlunda kurs, med tanke på att det har handlat mycket om att omstrukturera sin kod och att prova nya och förhoppningsvis bättre strukturer.

Jag tycker att i sin helhet har det känns balanserat. Det fjärde kursmomentet var mer omfattande, men 5:an och 6:an gick snabbt och lätt. Det kan vara okej att det varierar tycker jag, och naturligt med tanke på kursmomentens olika typ av innehåll.

Det har varit kul att lära sig särskilt hur man skapar sin egen modul och lägger upp på en moduldelningssajt. Detta har gett insikter i nya områden av programmeringsvärlden och känns väldigt användbart och som ett måste att kunna som programmerare.

Som vanligt har det varit lätt att få hjälp när man undrar över något, något som höjer betyget för kursen. Jag ställer ofta frågor, när jag kör fast. Kan känna mig lite dum, men det är ju viktigt att svälja sin stolthet eftersom det ofta är så man kommer vidare och lär sig nya saker som man inte förstått helt.

Jag har uppskattat artiklarna, vilka har varit pedagogiska och känts centrala för kursen.

Jag ger kursen 9/10. Det kan alltid bli bättre, men det är också så att vi vid det här laget delvis skapar lärandet på egen hand när vi själva söker upp informationen vi behöver. Allt behöver inte vara  tillrättalagt och ordnat och det kan finnas många svar på samma frågor.

---
*Validering:* Jag fick valideringsfel för några kursmoment, angående några övningsfiler, en HTMLForm som har en för lång metod där ett formulär skapas. Eftersom det är en mall så lät jag det vara.


[Projektet](http://www.student.bth.se/~magi16/dbwebb-kurser/ramverk1/me/kmom10/questionforum/htdocs/)
