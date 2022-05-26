# PROJEKT - WEBBADMINPLATS
Syftet med webbadminplatsen är att:
* skapa en REST-baserads webbtjänst
* bekanta sig med relevanta begrepp & förstå hur att använda dessa
* skapa dynamisk och interaktiv funktionalitet
* skapa en webbplats för databasadministration för icke-tekniska personer

## WEBBADMINPLATS
Även om webbadminplatser i regel inte har ett fokus på fin front-end grafisk design så delar den samma grafiska design som webbplatsen. Tanken är att göra det mer bekvämt för personalen som använder admingränssnittet vilket är en målgrupp. 

Admin och personal skapa och ändra order och menyobjekt samt skapa nya användare och han-tera kundfrågor – det utgör en omfattande CRUD-kommunikation med API:et vilket medfört att webbtjänsten är också omfattande i kodning.

Den har en huvudsida med fem stycken webbsidor vilket inkluderar inloggningssidan vilket kan ses i bilaga C. Däremot är landningsidan efter inloggning ”order” istället för start eftersom det är troligen den sidan som personalen kommer att använda mest därmed är det mer bekvämt ur an-vändbarhet och användarupplevelse att minska antal tryck till efterfrågad webbsida. I bilaga G finns en skärmdump av webbadminplatsen i ”MENYER”-sidan där alla delar av formulär och knappar med design illustreras. Uppenbarligen används en CSS-fil för det estetiska även om det inte är ett krav.

Alla metoder för GET, POST, UPDATE och DELETE hanteras med JavaScript. Såhär är JavaScript-koden skapad:
* Funktioner chkDelOrder, chkDelMenu och chkDelUser – alla dessa använder DE-LETE-metoden i kombination med GET för att ta bort respektive objekt från databasen. Alla dessa lyssna genom en EventListener (händelselyssnare) i en FOR-loop i utskrivna objekt efter tryck på knappar som identifieras med klassnamn i HTML-element. När tyck på knapp sker anropas respektive funktion som skickar en FETCH-anrop med fångad ID i ”event.target” till webbtjänsten samt laddar om webbsidan. Dessa funktioner är självklara för ändamålet med FETCH för att kommunicera med API:et.

* För POST-anropen finns det en för att skapa användare, order och menyobjekt. Dessa är identiskt uppbyggnad. Innan en anrop skickas kollas vilken webbsida besökaren är på via en IF-sats för att matcha sidnamn med sidnamn som hittas med .subString()-metoden. Efter det identifieras ett element-ID som lyssnas för en .onsubmit-aktion so kör igång funktion för händelsen där nya objekt för XMLHttpRequest() och formData() skapas. Ett anrop öppnas med länken som har en GET-syntax och som begär att header består av ”Content-Type” och ”application/json” så att data skickas som JSON vilket omvandlar data genom stringify()-metoder. När det är klar med positiv respons rensas formulärdata och webbsidan alddas om genom respektive metod .reset() och reload(). XHR och formData är självklara val för hantering av formulärdata utan att be-höve specificera en mängd variabler med värden specifikt till API:et men att dessa värden är redan specificerade i HTML-attributen ”id” och ”name” som skickas direkt till API:et. Alternativet är FETCH-metowden vilket blir mer kod och därmed mer arbete.

* PUT-anrop finns för att uppdatera ID-specifika order och menyobjekten. PUT-metoden fungerar exakt likadant som POST-metoden i JavaScript-filen fast med PUT-anrop mot en specifik länk med GET-syntax.
Istället för att använda CURL i PHP för att skicka anrop till API:et valdes JavaScript av den anledning av snabbhet eftersom JavaScript-programmering är att föredra i syfte att öva i det språket.

PHP-programmering fungerar mot webbtjänsten genom att begära data med GET-metoden via files_get_contents()-metoden som omvandlar data till JavaScript-objekt från JSON-objekt via json_decode(). Sedan skrivs data ut genom en FOREACH-metod via en sparad variabel.

## LÄNKAR
Public länk till webbadminplatsen:http://studenter.miun.se/~dato1700/writeable/dt173g/project/projekt_admin_vt22-DamjanT1988/login.php 