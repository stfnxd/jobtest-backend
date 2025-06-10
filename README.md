## Jobtest som Backendudvikler hos Side-Walk
Først vil jeg sige tak, fordi du vil deltage i vores rekruterings process. Du har nu forket vores git repo, og skal i gang med testen.

### Tidsforbrug
Du må maks bruge 3,5 time på løsning af testen.

### Aflevering af test
Du skal fremsende et link til din public fork, hvor din opgaveløsning ligger på senest d. 22/6-25.

### Regler
Der må ikke bruges chatGPT eller anden AI til besvarelse og løsning af opgaven!!

## Opsætning af testmiljø
Vi har sat projektet i docker så det første du skal gøre:
kopier .env.docker.exemple til .env

sæt http://jobtest.test ind i din hosts fil, så du kan fange applikationen.

Kørfølgende kommendoer:
- docker compose up
log derefter ind i php containeren (docker exec -it jobtest_php bash) og kør
- composer install
- npm install
- npm run dev
log derefer ind i en ny termianl i php contaioneren
php artisan migrate
php artisan db:seed
log derefter ind i php containeren (docker exec -it jobtest_php bash) og kør
chmod -R 777 storage/

browserurl:http://jobtest.test/

herefter kan du logge ind med brugeren
brugernavn: test@test.test
kode: Test123

Ønsker du at bruge andet end docker f.eks Laravel Herd eller andet dev miljø er du velkommen til at sætte dette op inden testen begynder.


 ## Test/Opgave
 De 4 opgaver du skal løse er beskrevet nedenfor, og rækkefølgende er op til dig.

1) Der skal sættes relationer op mellem: 

- User hasmany Project
- Project hasmany Comment

2) Optimer projectcontrolleren

3) Der er lagt to fejl ind som er relateret til hinanden, denne skal findes og rettes.

4) Besvar spørgsmålene i denne README FIL, under hver spørgsmål.

``` Spørgsmål 1 ```

``` Relation morph ```

Relation morph (polymorphic) er en Relationship man kan bruge i Laravel, hvis man ønsker en model skal tilhøre mange andre modeller, men kun med en association.
Fordelen ved det er, at det er meget fleksibelt, altså lad os sige, vi har billeder, men billeder kan høre til både en user, et product, eller noget tredje.
Her ville man kunne oprette en morph relation, med "MorphMany" og "MorphTo", hvor billeder bliver gemt i databasen i en tabel, med et ID og en type, der viser hvilken slags indhold billedet tilhører.
På den måde undgår man at skulle lave separate user_images eller product_images og kan i stedet håndtere det hele med en tabel og en relationstype.

``` Spørgsmål 2 ```

``` Du har en database med mange relationer hvor company er den model hvor alle relationer til et given virksomhed har relationer til. Hvordan sikre du dig, at data slettes i relationsmodellerne, når du sletter en givent virksomhed? ```

Det kommer lidt an på, hvordan relationerne er sat op.

Hvis det er almindelige HasMany eller HasOne relationer, kan man bruge onDelete('cascade') i sine migrationer. Det sørger for, at alt data, der tilhører en Company, automatisk bliver slettet af databasen, når virksomheden slettes. Det kræver dog, at foreign keys er korrekt defineret med constrained().

Dog hvis relationerne derimod er sat op som morph relationer (morphOne, morphMany), så virker onDelete('cascade') ikke, fordi der ikke er en klassisk foreign key constraint at arbejde med. I det tilfælde bliver man nødt til selv at håndtere sletningen, typisk ved at tilføje en deleting-event på Company-modellen, hvor man manuelt sletter de relaterede modeller.


``` Spørgsmål 3```

``` Når du skal lave funktionskode, f.eks. du behandler model data inden du skal sende det til et view, hvor placere du funktionskoden? ```

Det kommer an på hvor ansvaret ligger - så alt efter hvilken slags logik ville jeg ligge det i en af følgende: Model, viewmodel, Service eller Resource.
I dette tilfælde med model data der skal behandles, ville jeg nok gå efter at placere det i en viewmodel.



``` Spørgsmål 4 ```

``` Du sidder og skal arbejde for en kunde, hvis applikation køre uden PHP framework. Du skal lave et input felt og gemme det i databasen. Hvilke overvejelser gør du?  ```

Der er mange overvejelser at tage - Dog mest af alt sikkerhedsmæssige ting, da vi ikke har den samme sikkerhed, som kommer automatisk i mange frameworks.
Jeg ville nok derfor dobbelttjekke OWASP Top 10, for at sikre mig der ikke er noget jeg har misset, hvorefter jeg nok ville gøre følgende:

1. Jeg skal sikre mig at det input felt jeg laver bliver valideret, både på frontend samt backend.
2. Brug prepared statements, for at undgå SQL injections
3. Tænk på XSS, og hvordan vi outputter
4. CSRF Tokens
5. Tilbage melding til brugeren (Fejl, succes etc.)

Derudover skal der også tænkes på hvodan det bliver gemt i databasen, og omkring hvilke relationer der er i databasen


## Efter testen
Vi reviewer din løsning i ugen efter d. 22/6-25, hvorefter du vil få feedback på testudførslen. 
Herefter vil du enten få et begrundet afslag eller blive indkaldt til samtale, som er sidste forløb i rekrutteringsprocessen. 
