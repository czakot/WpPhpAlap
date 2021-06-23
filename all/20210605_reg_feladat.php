
reg
	feladat: 
	email regisztárciós form: név email jelszó jelszó-megerősítése
	ellenőrzés hogy minden adatot megadott-e, hiányos adatok eseten jelzés
	
	név ellenőrzés: maximum 10 karaker, ne legyen benne speciális karakter vagy space, ne szerepeljen az eddigiek között
	jelszó: 8 karakter minimum és legyen benne nagy betű
	jelszó és jelszó 2 egyezzen
	email cím: filter_Var email valid, ne szerepeljen az eddigek között
	
	hiba esetén írjuk ki, az eddig kitöltött adatok maradjanak meg a hiányó legyen piros
	siker esetén a sikeres regisztráció és belépő felület jelenjen meg
	
	bejelentkezés esetén
	
	//függvények nélküli megvalósítás
	
	//függvények a belépés és reg ellenőrzésekhez
	
	//megoldás:
	1. html összerakása
		/*
		 <form action='' method='post'>
		Name: <input type='text' name='name'><br>
		E-mail: <input type='text' name='email'><br>
		Jelszó: <input type='password' name='jelszo'><br>
		Jelszó megerősítése: <input type='password' name='jelszo2'><br>
		<input type='submit' value='Regisztrálok'>
		</form>
		
		*/
	2. php ami fogadja
	    //ellenőrzések pseudo kód
			//minden adatot megkaptunk-e
			if (!isset() || ...) {
				
			} else {
				//név
				//email
				//jelszó egyezőség
				//jelszó
			}
		
	3. "adatbázis tömb" létrehozása
		$adatbazis[0]['name']='Dávid';
		$adatbazis[0]['email']='david@gmail.com';
		$adatbazis[0]['jelszo']='1234';
		$adatbazis[0]['name']='Ádám';
		$adatbazis[0]['email']='adom@gmail.com';
		$adatbazis[0]['jelszo']='1234';
		
	4. php ellenőrzések megírása
			
	5. html módosítása hogy hibákat kitudjuk írni
	
	6. html módosítása hiba esetén réték megtartására és háttér pirosra váltáshoz
	
	6. html módosítása ha sikerült belépni
	
	7. tartalom teljesen php-ban létrheozása
		
		
	

