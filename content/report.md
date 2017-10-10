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

###Flöt det på bra med GitHub och kopplingen till Packagist?

###Hur gick det att åter installera modulen i din me-sida med composer, kunde du följa du din installationsmanual?

###Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?

###Några reflektioner över skillnaden med och utan modul?



##Kmom 06
##Kmom 07-10
