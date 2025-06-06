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

*Indsæt svar 1*

``` Spørgsmål 2 ```

``` Du har en database med mange relationer hvor company er den model hvor alle relationer til et given virksomhed har relationer til. Hvordan sikre du dig, at data slettes i relationsmodellerne, når du sletter en givent virksomhed? ```

*Indsæt Svar 2*


``` Spørgsmål 3```

``` Når du skal lave funktionskode, f.eks. du behandler model data inden du skal sende det til et view, hvor placere du funktionskoden? ```

*Indsæt Svar 3*


``` Spørgsmål 4 ```

``` Du sidder og skal arbejde for en kunde, hvis applikation køre uden PHP framework. Du skal lave et input felt og gemme det i databasen. Hvilke overvejelser gør du?  ```

*Indsæt Svar 4*


## Efter testen
Vi reviewer din løsning i ugen efter d. 22/6-25, hvorefter du vil få feedback på testudførslen. 
Herefter vil du enten få et begrundet afslag eller blive indkaldt til samtale, som er sidste forløb i rekrutteringsprocessen. 
