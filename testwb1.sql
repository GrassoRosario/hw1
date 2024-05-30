 CREATE DATABASE testwb1;
 USE testwb1;
 
create table users(
id integer primary key auto_increment,
email varchar(30) unique not null,
nome varchar(15) not null,
cognome varchar(15) not null,
ntelefono varchar(12) not null,
datanascita date not null,
codicefiscale varchar(16),
username varchar(30) unique not null,
password varchar(250) not null
);

create table pets_adoption(
id integer primary key auto_increment,
pet varchar(30) unique not null,
sfondo varchar(255) not null,
introduzione text not null,  
Welcome_Kit_con_Peluche varchar(255) not null,
Welcome_Kit_digitale varchar(255) not null,
Kit_Peluche_Junior varchar(255) not null,
Kit_Digitale_Junior varchar(255) not null,
minacce_introduzione text not null,
minacce_1_titolo varchar(255) not null,
minacce_1_immagine varchar(255) not null,
minacce_1_contenuto text not null,
minacce_2_titolo varchar(255) not null,
minacce_2_immagine varchar(255) not null,
minacce_2_contenuto text not null,
grazie_alla_donazione_img varchar(255) not null,
grazie_alla_donazione text not null,
regalo_adozione_img varchar(255) not null,
regalo_adozione text not null
);


create table adoptions(
id integer primary key auto_increment,
id_user integer not null,
id_pet integer not null,
pet varchar(30) not null,
pet_sfondo varchar(255) not null,
tipo_adozione varchar(30),
quantita_adozione varchar(30),
tipo_kit varchar(30),
adozione_regalo varchar(30),
data datetime,
index idx_id_user (id_user),
foreign key (id_user) references users(id),
index idx_id_pet (id_pet),
foreign key (id_pet) references pets_adoption(id)
);


create table basket(
id integer primary key auto_increment,
id_user integer not null,
id_pet integer not null,
pet varchar(30) not null,
pet_sfondo varchar(255) not null,
tipo_adozione varchar(30),
quantita_adozione varchar(30),
tipo_kit varchar(30),
adozione_regalo bool,
index idx_id_user (id_user),
foreign key (id_user) references users(id),
index idx_id_pet (id_pet),
foreign key (id_pet) references pets_adoption(id)
);

create table preferences(
id integer primary key auto_increment,
id_user integer not null,
id_pet integer not null,
index idx_id_user (id_user),
foreign key (id_user) references users(id),
index idx_id_pet (id_pet),
foreign key (id_pet) references pets_adoption(id)
);

INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('panda' , 
'immagini/masthead-1-1-scaled.jpg' , 
'Simbolo degli animali in via di estinzione e di oltre 50 anni di impegno globale del WWF per la conservazione delle specie, il panda è ancora minacciato a causa di un habitat sempre più frammentato e ridotto dalle attività umane.', 
 'immagini2/WelcomeKitconPeluchePanda.png',
 'immagini2/WelcomeKitdigitalePanda.png',
 'immagini2/KitPelucheJuniorPanda.png',
 'immagini2/KitDigitaleJuniorPanda2.png',
 'Per molti anni il panda è stato specie a rischio, ma negli ultimi tempi si sono registrati segnali incoraggianti, con una stabilizzazione della popolazione e un incremento in alcune aree. Nonostante ciò le minacce che la specie deve affrontare quotidianamente sono ancora molte.',
 'Perdita di habitat',
 'immagini2/perdita-habitat-Pandajpg.webp',
 'La deforestazione, la costruzione di nuove strade, e di insediamenti urbani causano la riduzione e la frammentazione dell’habitat del panda, che oggi è relegato a una ventina di aree residue. Questo provoca difficoltà di riproduzione e di nutrimento.',
 'Aumento delle temperature',
 'immagini2/aumento-delle-temperature-Panda.webp',
 '25°C è la temperatura limite per i panda, al di sopra della quale le condizioni ambientali diventano ostili per la specie.',
 'immagini2/cosafaremoconlatuaadozionePanda.jpg',
 'Grazie a te continueremo a impegnarci per salvare il panda attraverso progetti come “Green Heart of China”, che mira ad aumentare le misure di protezione dell’habitat del panda, promuovendo un piano di sviluppo sostenibile per l’alto bacino dello Yangtze. I nostri sforzi sembrano ripagati dai risultati: anche se la strada è ancora lunga possiamo dire che il panda è la prova vivente che gli sforzi di conservazione funzionano.',
 'immagini2/regalaadopanda.jpg',
 'Per fare un regalo unico regala a una persona speciale l’adozione WWF di un panda, per dimostrare che il vostro è un amore NON in via di estinzione.'
 );
 
 
 INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('koala' , -- pet 
'immagini/Masthead-koala-1-1-scaled.jpg' ,  -- sfondo
'Deforestazione e cambiamento climatico minacciano la sopravvivenza dei koala. Dopo gli incendi del 2019-2020, in cui sono bruciati quasi 19milioni di ettari di foreste, il numero di koala in sei località dell’Australia è calato del 72%.',  -- introduzione
 'immagini2/Welcome_Kit_con_Peluche_Koala.png', -- ,Welcome_Kit_con_Peluche
 'immagini2/Welcome_kit_Digitale.png', -- Welcome_Kit_digitale
 'immagini2/kit_peluche_junior_koala.png', -- Kit_Peluche_Junior
 'immagini2/kit_digitale_junior_panda.png', -- Kit_Digitale_Junior
 'Gli incendi in Australia del 2019-2020 hanno messo in forte pericolo il futuro della specie. 8400 koala sono rimasti uccisi dalle fiamme. Ad oggi, la popolazione di questo docile animale è ancora ridotta e deve affrontare gravi minacce.', -- minacce_introduzione
 'Le infezioni', -- minacce_1_titolo
 'immagini2/minacce1Koala.png', -- minacce_1_immagine
 'Tristemente nota tra i koala è la Chlamydia, che compromette la diffusione della specie: questa infezione sessualmente trasmissibile riduce la fertilità degli animali, diminuendone le possibilità di riproduzione.', -- minacce_1_contenuto
 'La caccia', -- minacce_2_titolo
 'immagini2/minacce2Koala.png', -- minacce_2_immagine
 'Il pelo morbido e spesso dei Koala è stato molto ricercato dai cacciatori nel corso del XX secolo, contribuendo alla drastica riduzione del numero di esemplari.', -- minacce_2_contenuto
 'immagini2/Cosa-faremo-grazie-alla-tua-adozione-Koala.webp', -- grazie_alla_donazione_img
 'Grazie al tuo contributo al WWF riusciremo a portare avanti il progetto “Regenerate Australia”, un programma quinquennale da 300 milioni di dollari che ha molteplici obiettivi: ripristinare gli habitat attraverso nuove piantumazioni di alberi e semina con i droni; aiutare la fauna selvatica anche attraverso la costruzione di nuove cliniche veterinarie; promuovere l’agricoltura sostenibile e rendere l’Australia un Paese “a prova di futuro”.', -- grazie_alla_donazione
 'immagini2/Regala-ladozione-koala.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un koala e fai un gesto d’amore per chi ami e per tutti i dolcissimi koala che stanno lottando per il loro futuro.' -- regalo_adozione
 );
 

 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('tigre' , -- pet 
'immagini/masthead-tiger-1-1-scaled.jpg' ,  -- sfondo
'Il più grande felino vivente è vittima di bracconaggio, commercio illegale, perdita di habitat. Le popolazioni di tigri sono diminuite di circa il 95% dallinizio del XX secolo. Oggi ne rimangono meno di 5mila in natura.',  -- introduzione
 'immagini2/Welcome_kit_con_Peluche_Tigre.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/Welcome_Kit_Digitale_Tigre.webp', -- Welcome_Kit_digitale
 'immagini2/Kit_Peluche_Junior_Tigre.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJunior_Tigre.webp', -- Kit_Digitale_Junior
 'Da secoli la tigre, il felino più grande del mondo, viene costantemente minacciato dall’uomo. Questa specie subisce una persecuzione spietata tanto che oggi ci sono più tigri in cattività che in Natura. Le cause di questo declino sono principalmente quattro:', -- minacce_introduzione
 'Trappole', -- minacce_1_titolo
 'immagini2/minacce1Tigre.webp', -- minacce_1_immagine
 'Posizionate ovunque nei territori della tigre, sono invisibili e consentono ai bracconieri di catturarle per poi rivendere le parti del corpo nei mercati asiatici.', -- minacce_1_contenuto
 'Conflitto con le popolazioni', -- minacce_2_titolo
 'immagini2/minacce2Tigre.webp', -- minacce_2_immagine
 'Se la tigre, come sta succedendo, perde il suo habitat, si avvicina inevitabilmente agli insediamenti umani, entrando così in conflitto con le comunità locali.', -- minacce_2_contenuto
 'immagini2/grazie_adozione_tigre.webp', -- grazie_alla_donazione_img
 'Il tuo regalo aiuterà a finanziare le squadre antibracconaggio in Russia e Cina, che stanno collaborando per proteggere al meglio le tigri. Con il tuo supporto sosterremo gli allevatori sia con strumentazione per la messa in sicurezza degli allevamenti sia con risarcimenti in caso di danni subiti dalle tigri: a causa della riduzione del loro habitat, infatti, questi animali si spostano alla ricerca di cibo e spesso trovano allevamenti di facile accesso.', -- grazie_alla_donazione
 'immagini2/regaladotigre.jpg.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di una Tigre: un piccolo gesto che ci aiuterà a dare un futuro alla Regina della Giungla.' -- regalo_adozione
 );
 
 
 
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('pinguino' , -- pet 
'immagini/masthead-penguin-1-1.jpg' ,  -- sfondo
'I cambiamenti climatici e la riduzione del ghiaccio riducono drasticamente l habitat dei pinguini, costringendo i giovani esemplari ad affrontare le acque gelide e i predatori quando ancora non sono pronti.
Negli ultimi 50 anni la popolazione di pinguino imperatore è diminuita del 50%',  -- introduzione
 'immagini2/WelcomeKitconPeluche_Pinguino.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitale_Pinguino.webp', -- Welcome_Kit_digitale
 'immagini2/kitpeluchejunior_pinguino.webp', -- Kit_Peluche_Junior
 'immagini2/kitdigitalejunior.webp', -- Kit_Digitale_Junior
 'Animale simbolo dell’Antartide, il pinguino imperatore è noto a tutti per la sua peculiare fisionomia e il suo incedere un po’ buffo. Eppure questo animale ha caratteristiche fisiche eccezionali, che gli permettono di sopravvivere, riprodursi e prosperare nel gelido inverno antartico. Un piccolo supereroe che purtroppo deve affrontare un grande nemico: l’uomo', -- minacce_introduzione
 'Cambiamento climatico', -- minacce_1_titolo
 'immagini2/minavve1_pinguino.webp', -- minacce_1_immagine
 'I pinguini imperatori hanno come unico habitat e ambiente riproduttivo i ghiacci antartici e sono animali particolarmente vulnerabili ai cambiamenti climatici. Lo scioglimento dei ghiacci mette a rischio anche la presenza di krill, una delle principali fonti di nutrimento per i pinguini imperatore', -- minacce_1_contenuto
 'Pesca non sostenibile', -- minacce_2_titolo
 'immagini2/minacce2_pinguino.webp', -- minacce_2_immagine
 'Altra minaccia molto seria per i pinguini imperatore è lo sfruttamento eccessivo degli stock ittici: la pesca non sostenibile rischia di lasciarli senza cibo sufficiente per sopravvivere', -- minacce_2_contenuto
 'immagini2/grazieadozione_pinguino.webp', -- grazie_alla_donazione_img
 'Il WWF protegge il pinguino contribuendo a preservare il suo habitat. Il nostro impegno in favore dell’Antartide passa attraverso la promozione di una rete di aree marine protette, progetti di pesca sostenibile e la lotta per la riduzione degli effetti dei cambiamenti climatici.', -- grazie_alla_donazione
 'immagini2/regaloadozione_pinguino.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un pinguino: insieme aiuterete a dare un futuro a un piccolo supereroe della Natura' -- regalo_adozione
 );
 
 
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('lupo' , -- pet 
'immagini2/lup_sfondo.jpg' ,  -- sfondo
'Il lupo rappresenta una delle specie più emblematiche del patrimonio naturalistico e culturale italiano. La sua presenza è fondamentale per la salute dell''ecosistema, assicurando la biodiversità e consentendo la sopravvivenza di altre specie.
Tuttavia, negli ultimi secoli, la popolazione di lupi è stata e continua ad essere soggetta a una spietata persecuzione. Nonostante, ad oggi, il lupo non rappresenti un pericolo diretto per le persone, si stima che ogni anno tra i 200 e i 500 lupi vengano uccisi dagli esseri umani. Per questo motivo il lupo è stato dichiarato una specie protetta da difendere e tutelare.
Dal 1972 agiamo per garantire la sua conservazione e protezione, attraverso progetti di sensibilizzazione e programmi di reintroduzione e protezione dei lupi. Con un’adozione, puoi contribuire direttamente alla salvaguardia di questa iconica specie e al mantenimento di un patrimonio naturale e culturale di inestimabile valore.',  -- introduzione
 'immagini2/welcomekitconpeluche_lupo.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/welcomekitdigitale_lupo.webp', -- Welcome_Kit_digitale
 'immagini2/kitpeluchejunior_lupo.webp', -- Kit_Peluche_Junior
 'immagini2/kitdigitalejunior_lupo.webp', -- Kit_Digitale_Junior
 'Nonostante la situazione della specie sia migliorata rispetto agli anni ‘70, il lupo affronta quotidianamente diverse minacce che mettono a rischio la sua sopravvivenza e la sua presenza negli ecosistemi. Affrontarle richiede un approccio integrato che comprenda la conservazione dell habitat, la gestione sostenibile delle popolazioni di prede, la mitigazione dei conflitti con l uomo e misure di protezione dirette per i lupi.', -- minacce_introduzione
 'Bracconaggio', -- minacce_1_titolo
 'immagini2/minacce1Lupo.jpg', -- minacce_1_immagine
 'Colpi d’arma da fuoco, veleno, trappole, lacci: gli strumenti con cui l’uomo perseguita il lupo sono fin troppo numerosi. Si tratta di uccisioni illegali eppure ancora presenti nel nostro Paese.', -- minacce_1_contenuto
 'Incidenti stradali', -- minacce_2_titolo
 'immagini2/minacce2Lupo.webp', -- minacce_2_immagine
 'Ogni anno molti lupi restano vittime di incidenti stradali. Gli attraversamenti sulle strade che si addentrano in zone selvagge sono un grande pericolo ma i modi per diminuire i rischi esistono.', -- minacce_2_contenuto
 'immagini2/grazieAdozioneLupo.jpg', -- grazie_alla_donazione_img
 'Ci consentirai di portare avanti il progetto “Viva il lupo” che prevede attività come laboratori di scrittura creativa, incontri con esperti del WWF, una mostra itinerante e una piattaforma digitale. Realizzato in collaborazione con due importanti CEA (centri educazione ambientale) attivi nel Parco nazionale dei Monti Sibillini e nel Parco Nazionale Gran Sasso Monti della Laga ha lobiettivo di sviluppare la conoscenza del lupo, del suo rapporto con l’uomo e del suo valore per la biodiversità.', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneLupo.jpg', -- regalo_adozione_img
 'Per fare un dono unico a una persona speciale per un occasione da ricordare regala l’adozione WWF del lupo. Non è solo un dono speciale per chi lo riceve, ma anche un gesto d amore verso la Natura e tutte le specie che la abitano. Adottando un lupo potrai fare la differenza, fornendo un sostegno tangibile e contribuendo attivamente alla difesa della specie.' -- regalo_adozione
 );
 
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('orso_bruno' , -- pet 
'immagini2/orso_sfondo_pd.webp' ,  -- sfondo
'Per questi giganti delle montagna il mondo dell’uomo è un campo minato: costretto a vivere in un ambiente sempre più ridotto e frammentato si trova ora sull’orlo dell’estinzione.',  -- introduzione
 'immagini2/WelcomeKitConPeluche_OrsoBruno.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitale_OrsoBruno.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJunior_OrsoBruno.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJunior_OrsoBruno.webp', -- Kit_Digitale_Junior
 'In tutto il mondo gli orsi bruni hanno perso gran parte del loro areale originale: questo genera importanti minacce per il futuro dell’orso.', -- minacce_introduzione
 'Conflitto uomo-orso', -- minacce_1_titolo
 'immagini2/minaccia1_OrsoBruno.webp', -- minacce_1_immagine
 'Nei suoi vagabondaggi, l’orso si ritrova a predare gli allevamenti e danneggiare campi coltivati attirando a sé le ire dei cittadini che condividono con lui quei territori', -- minacce_1_contenuto
 'Territori antropizzati', -- minacce_2_titolo
 'immagini2/minacce2Orso_Bruno.webp', -- minacce_2_immagine
 'L’orso abita territori oramai fortemente antropizzati. Strade, nuclei abitativi, allevamenti spezzano la naturalità del suo habitat e rappresentano per lui dei pericoli costanti. Il suo nemico peggiore è l’asfalto: nei suoi spostamenti, l’orso attraversa le strade e rischia di essere investito dalle auto.', -- minacce_2_contenuto
 'immagini2/grazie_adozione_OrdoBruno.webp', -- grazie_alla_donazione_img
 'Grazie alla tua adozione sosterrai il progetto Orso 2×50, che mira a raddoppiare l’areale della specie e il numero di individui presenti entro il 2050. Per farlo sarà necessario creare una cintura di sicurezza intorno alle zone in cui vive l’orso: bisogna ripristinare sottopassi stradali abbandonati e impraticabili per gli animali, distribuire nuove recinzioni a tutela degli allevamenti, installare dissuasori acustici e ottici che scoraggino gli orsi ad attraversare le strade più pericolose, favorire la convivenza con le popolazioni locali ', -- grazie_alla_donazione
 'immagini2/regalaAdozioneOrsoBruno.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un orso bruno: un pensiero che può salvare un’intera specie' -- regalo_adozione
 );
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('leopardo_delle_nevi' , -- pet 
'immagini/snow-leopard-1-1.jpg' ,  -- sfondo
'Il "fantasma delle montagne", uno dei felini più rari al mondo, vive ad oltre 3mila metri di altitudine. Il cambiamento climatico, il bracconaggio, il conflitto con le comunità locali e la distruzione del suo habitat minacciano il suo futuro: ad oggi rimangono meno di 7mila individui di Leopardo delle Nevi in Natura',  -- introduzione
 'immagini2/WlcomeKitConPeluche_leopardo.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleLeopardo.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorLeopardo.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorLeopardo.webp', -- Kit_Digitale_Junior
 'Questa meravigliosa specie deve affrontare quotidianamente molte minacce che, nel corso degli ultimi 20 anni, hanno determinato la perdita di più di un quinto della popolazione.', -- minacce_introduzione
 'Commercio illegale', -- minacce_1_titolo
 'immagini2/minacce1Leopardo.webp', -- minacce_1_immagine
 'Per lungo tempo questi magnifici animali sono stati vittime del bracconaggio e del commercio illegale di animali selvatici. Purtroppo sono ancora molto ricercati per la loro splendida pelliccia, ma anche per le ossa e altre parti del corpo richieste dalla medicina tradizionale di alcuni paesi asiatici', -- minacce_1_contenuto
 'Persecuzione deliberata', -- minacce_2_titolo
 'immagini2/minacce2Leopardo.webp', -- minacce_2_immagine
 'Quando i leopardi delle nevi predano bestiame da allevamento, può verificarsi un conflitto uomo-fauna selvatica. Questa situazione è generata dal mutare delle condizioni climatiche e dalla caccia eccessiva, poiché quando le prede naturali dei leopardi diventano più scarse per loro predare il bestiame diventa una necessità', -- minacce_2_contenuto
 'immagini2/grazieAdozioneLeopardo.webp', -- grazie_alla_donazione_img
 'Il WWF lavora con gli allevatori di capre in Mongolia e Pakistan per sensibilizzare la popolazione sul valore di questa specie per l’intero ecosistema e ridurre i conflitti con le attività umane. Il progetto incoraggia anche gli abitanti dei villaggi a costruire recinzioni a prova di predatori, per ridurre gli attacchi dei leopardi delle nevi. Inoltre, è forte l’impegno per la conservazione dell’habitat del leopardo', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneLeopardo.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un leopardo delle nevi: insieme potrete dare un futuro a uno dei felini più rari del mondo' -- regalo_adozione
 );
 
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('orso_polare' , -- pet 
'immagini2/sfondoOrsoPolare_pd.webp' ,  -- sfondo
'Per il Re dell’Artico il ghiaccio è vita: ne dipende per cacciare e allevare i cuccioli. A causa della crisi climatica, però, il ghiaccio sta scomparendo e per gli orsi è sempre più di difficile sopravvivere.',  -- introduzione
 'immagini2/WelcomeKitConPeluche_OsoPolare.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitale_OrsoPolare.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorOrsoPolare.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorOrsoPolare.webp', -- Kit_Digitale_Junior
 'Per millenni gli orsi polari hanno vissuto in equilibrio con l’ecosistema e le popolazioni locali. Oggi però il loro futuro è messo gravemente in pericolo da diverse minacce.', -- minacce_introduzione
 'Cambiamento climatico', -- minacce_1_titolo
 'immagini2/minacce1_OrsoPolare.webp', -- minacce_1_immagine
 'Rispetto al 1979, la banchisa polare artica si è ridotta del 40%. Questo rende più difficile la caccia per gli orsi polari, che, pur essendo ottimi nuotatori, devono affrontare distanze sempre più lunghe per trovare cibo, rischiando di morire di stenti.', -- minacce_1_contenuto
 'Sviluppo industriale e inquinamento', -- minacce_2_titolo
 'immagini2/minacce2_OrsoPolare.webp', -- minacce_2_immagine
 'Le estrazioni di petrolio nell’Artico sono destinate ad aumentare nei prossimi decenni e con loro i pericoli per gli orsi polari. La dispersione in ambiente di materiali inquinanti come il petrolio è un rischio concreto.', -- minacce_2_contenuto
 'immagini2/grazieAdozioneOrsoPolare.webp', -- grazie_alla_donazione_img
 'Il WWF si impegna a combattere il cambiamento climatico e a creare soluzioni possibili per far fronte alle minacce che esso pone agli orsi polari, in primo luogo la perdita di habitat. Chiediamo con costanza ai governi mondiali di ridurre le emissioni di gas serra ma lavoriamo anche per conoscere meglio le abitudini degli orsi polari, per ridurre al minimo il conflitto con le popolazioni locali e mitigare i rischi dello sviluppo industriale.', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneOrsoPolare.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un orso polare: con questo gesto d’amore ci aiuterete a far sì che nel 2050 l’orso polare non sia solo un ricordo.' -- regalo_adozione
 );
 
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('elefante' , -- pet 
'immagini/elephant-1-1.jpg' ,  -- sfondo
'Circa 55 elefanti vengono uccisi ogni giorno. Commercio d’avorio e deforestazione minacciano ogni giorno gli elefanti. Nel mondo sopravvivono meno di 415mila elefanti africani e meno di 50mila elefanti asiatici',  -- introduzione
 'immagini2/WelcomeKitConPelucheElefante.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleElefante.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorElefante.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorElefante.webp', -- Kit_Digitale_Junior
 'Animali millenari e straordinariamente intelligenti, il numero di elefanti in Africa è passato da 12 milioni a soli 415mila a causa dell’uomo. Numeri che spaventano, soprattutto se si pensa che un futuro senza elefanti è impossibile. Questi animali, infatti, hanno un ruolo cruciale nell’ecologia delle savane e delle foreste', -- minacce_introduzione
 'Distruzione dell’habitat', -- minacce_1_titolo
 'immagini2/minacce1Elefante.webp', -- minacce_1_immagine
 'Quasi il 90% della deforestazione a livello globale è dovuta all’espansione dell’agricoltura. Tra il 2005 e il 2015 gli allevamenti di bovini insieme alle coltivazioni di palma da olio, soia, cacao, gomma, caffè e legno sono stati responsabili del 57% della deforestazione portandoci via un’area di foreste grande quanto la Germania.', -- minacce_1_contenuto
 'Bracconaggio', -- minacce_2_titolo
 'immagini2/minacce2Elefante.webp', -- minacce_2_immagine
 'Nonostante le leggi di protezione di cui gli elefanti godono, il commercio dell’avorio continua a fare strage. Il prezzo di un chilo di avorio sul mercato nero può raggiungere i 3 mila dollari. Significa che una sola zanna d’elefante, che può pesare anche 50 kg, può essere venduta a cifre stellari, anche decine di migliaia di dollari. Un giro di affari così appetibile attira sempre di più la criminalità organizzata.', -- minacce_2_contenuto
 'immagini2/grazieAdozioneElefante.webp', -- grazie_alla_donazione_img
 'Contrasteremo il bracconaggio migliorando la preparazione dei ranger e dotandoli di attrezzature adeguate per pattugliamenti efficaci e a basso rischio; acquisteremo nuove foto-trappole per monitorare gli elefanti; acquisteremo droni per la sorveglianza del territorio da parte dei ranger; coinvolgeremo le comunità locali per individuare e prevenire azioni illegali contro la fauna selvatica.', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneElefante.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un elefante: un gesto d’amore per chi ami e per il futuro di un meraviglioso animale' -- regalo_adozione
 );
 
INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('giaguaro' , -- pet 
'immagini/jaguar-1-1.jpg' ,  -- sfondo
'Tra gli anni ’60 e ’70, circa 18.000 esemplari di giaguaro venivano uccisi ogni anno per via della loro pelliccia o come trofeo. La situazione è migliorata nel 1973, quando è stata istituita la CITES (Conservation on the International Trade in Endangered Species): una convenzione che regola il commercio di flora e fauna a rischio di estinzione. Questo felino resta, però, ancora fortemente minacciato',  -- introduzione
 'immagini2/WelcomeKitConPelucheGiaguaro.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleGiaguaro.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorGiaguaro.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorGiaguaro.webp', -- Kit_Digitale_Junior
 'Il giaguaro è il terzo felino più grande al mondo dopo la tigre e il leone. Purtroppo, però, non basta essere un potente predatore per sopravvivere alle minacce causate dall’uomo', -- minacce_introduzione
 'Distruzione dell’habitat', -- minacce_1_titolo
 'immagini2/minacce1Giaguaro.webp', -- minacce_1_immagine
 'I giaguari sono predatori all’apice della catena alimentare attivi principalmente di notte: necessitano di un territorio molto esteso. La deforestazione e le attività agricole stanno riducendo il loro spazio e le attività umane hanno invaso il loro territorio e isolato le popolazioni.', -- minacce_1_contenuto
 'Conflitto <br> uomo-giaguaro', -- minacce_2_titolo
 'immagini2/minacce2Giaguaro.webp', -- minacce_2_immagine
 'La riduzione dell’habitat del giaguaro rischia di incrementare l’insorgere di conflitti con l’uomo: in assenza di prede il giaguaro può aggredire gli animali da allevamento, rischiando di essere ucciso dall’uomo per vendetta o in modo preventivo.', -- minacce_2_contenuto
 'immagini2/grazieAdozioneGiaguaro.webp', -- grazie_alla_donazione_img
 'Ci consentirai di portare avanti il progetto “Living Amazon Initiative” che vuole creare un “corridoio naturale” attraverso la regione amazzonica: in questo modo gli animali protetti, tra cui il giaguaro, potranno muoversi da una regione all’altra con minori rischi. L’area di questo grande progetto coinvolge Colombia, Ecuador e Perù, e rappresenta una delle regioni di maggior valore per la biodiversità.', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneGiaguaro.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un giaguaro: un pensiero originale che farà sorridere chi ami e proteggerà un’intera specie dall’estinzione.' -- regalo_adozione
 );

 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('leone' , -- pet 
'immagini/lion-1-1.jpg' ,  -- sfondo
'Il leone, “Re della Savana” e simbolo di potenza, oggi lotta per la sopravvivenza. A causa della  distruzione del suo habitat naturale, dei conflitti con l’uomo e delle insidie del bracconaggio e del commercio illegale, queste maestose creature sono a rischio. In soli 100 anni la popolazione dei leoni è infatti passata da 200mila individui a circa 30mila, un calo allarmante che mette in luce il grave pericolo che questa specie sta affrontando.
Ogni azione, anche la più piccola, ha il potere di contribuire positivamente alla salvaguardia della nostra biodiversità. Attraverso l’adozione WWF, non solo partecipi concretamente a progetti di conservazione degli animali in pericolo, ma diventi parte di una comunità globale che vuole fare la differenza per il nostro futuro e per quello di tutte le specie.',  -- introduzione
 'immagini2/WelcomeKitConPelucheLeone.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcoerKitDigitaleLeone.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorLeone.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorLeone.webp', -- Kit_Digitale_Junior
 'Come molte altre specie di animali, anche i leoni sono a rischio di estinzione a causa delle attività umane. Il drastico calo del numero di individui avvenuto in soli 100 anni, ne è la dimostrazione e mette in luce la situazione di criticità in cui versa la specie', -- minacce_introduzione
 'Perdita di habitat', -- minacce_1_titolo
 'immagini2/minacce1Leone.webp', -- minacce_1_immagine
 'Gli habitat adatti ai leoni diventano sempre più scarsi e isolati, la causa è da attribuire principalmente dall’espansione delle attività umane come l’agricoltura e lo sviluppo urbano. Questo trend causa la perdita di diversità genetica e la suscettibilità alle malattie, diminuendo il successo riproduttivo della specie.', -- minacce_1_contenuto
 'Scomparsa delle prede', -- minacce_2_titolo
 'immagini2/minacce2Leone.webp', -- minacce_2_immagine
 'Il commercio di carne di animali selvatici ha causato un diffuso declino della fauna ed è la principale minaccia per i leoni all’interno delle aree protette. Purtroppo molti leoni rimangono feriti o uccisi anche dalle trappole destinate ad altri animali.', -- minacce_2_contenuto
 'immagini2/grazieAdozioneLeone.webp', -- grazie_alla_donazione_img
 'Ci consentirai di portare avanti il progetto Big Cats, con il quale il WWF ha incrementato gli sforzi per la conservazione dei grandi felini e soprattutto dei leoni in Africa. Il lavoro si concentra in particolare su otto grandi territori prioritari nell’area di SOKNOT, a cavallo tra Kenya e Tanzania, dove si svolgono le attività del progetto “SOS Leoni”. L’obiettivo è raddoppiare il numero di leoni in Africa entro il 2050', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneLeone.webp', -- regalo_adozione_img
 'Per fare un regalo unico ad un amante della Natura,o ad una persona speciale per un’occasione da ricordare - come battesimi, compleanni, anniversari, laurea o Natale - regala l’adozione WWF del leone. Non è solo un dono speciale per chi lo riceve, ma anche un gesto d’amore verso il Pianeta e tutte le specie che lo abitano. Adottando un leone potrai fare la differenza, fornendo un sostegno tangibile e contribuendo attivamente alla difesa della specie e del suo habitat.' -- regalo_adozione
 );
 
  
 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('orango' , -- pet 
'immagini/orangutan-1-1.webp' ,  -- sfondo
'Per l’orango sopravvivere è sempre più difficile: sono rimasti poco più di 13mila esemplari di oranghi di Sumatra; 55mila oranghi del Borneo e meno di 800 esemplari dell’orango di Tapanuli.',  -- introduzione
 'immagini2/WelcomeKitConPelucheOrango.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleOrango.webp', -- Welcome_Kit_digitale
 'immagini2/KitPeucheJuniorOrango.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorOrango.webp', -- Kit_Digitale_Junior
 'Tra le grandi scimmie antropomorfe, gli oranghi presentano il tasso di riproduzione più basso: questo fattore, insieme ad altri pericoli causati dall’uomo, rendono gli oranghi tra le scimmie più gravemente minacciate.', -- minacce_introduzione
 'Perdita di habitat', -- minacce_1_titolo
 'immagini2/minacce1Orango.webp', -- minacce_1_immagine
 'Nel Borneo quasi il 40% dell’habitat dell’orango è andato perso tra il 1973 e il 2010 a causa della deforestazione. A Sumatra questa percentuale ha raggiunto addirittura il 60% tra il 1985 e il 2010', -- minacce_1_contenuto
 'Disboscamento e incendi', -- minacce_2_titolo
 'immagini2/minacce2Orango.webp', -- minacce_2_immagine
 'Per guadagnare terreni agricoli dalla foresta pluviale, spesso i contadini appiccano incendi che molte volte non riescono a controllare. Molti oranghi perdono la vita nel fuoco e a volte vengono uccisi mentre fuggono', -- minacce_2_contenuto
 'immagini2/grazieAdozioneOrango.webp', -- grazie_alla_donazione_img
 'Ci permetterai di portare avanti il programma di tutela della specie chiamato "Species Action Plan for Orang-Utans". I suoi principali obiettivi sono: la conservazione dell’habitat forestale, sia in Borneo, sia a Sumatra, attraverso l’istituzione e la gestione delle aree protette; la promozione della gestione forestale sostenibile; la lotta al commercio illegale; la creazione e il sostegno di centri di recupero dove gli Oranghi vengono curati.', -- grazie_alla_donazione
 'immagini2/regalaAdozioneOrango.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di un orango: per un amore unico e protettivo!' -- regalo_adozione
 );

 
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('tartaruga' , -- pet 
'immagini/Tartaruga_masthead-496x432.jpg.webp' ,  -- sfondo
'Le tartarughe marine nuotano nei mari del mondo da 150 milioni di anni. Sono sopravvissute alle più gravi calamità che hanno colpito il nostro pianeta eppure oggi rischiano di scomparire a causa dell’Uomo: pesca accidentale, mare soffocato dalla plastica e spiagge affollate dai turisti rendono la vita delle tartarughe un percorso a ostacoli, sia in mare che in Terra',  -- introduzione
 'immagini2/WelcomeKitConPelucheTartaruga.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleTartaruga.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorTartaryga.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorTartaruga.webp', -- Kit_Digitale_Junior
 'Una specie millenaria che rischia l’estinzione: le tartarughe marine si trovano in un mare di guai! Le attività umane stanno mettendo seriamente a rischio il loro futuro', -- minacce_introduzione
 'Plastica', -- minacce_1_titolo
 'immagini2/minaccia1Tartaruga.webp', -- minacce_1_immagine
 'La plastica è un grave problema del nostro mare e non solo. Si stima che il 52% delle tartarughe marine ingerisce plastica', -- minacce_1_contenuto
 'Attrezzi da pesca', -- minacce_2_titolo
 'immagini2/minaccia2Tartaruga.webp', -- minacce_2_immagine
 'Ogni anno nel Mediterraneo oltre 150mila tartarughe marine rimangono intrappolate in ami, lenze o reti da pesca: di queste circa 40mila muoiono', -- minacce_2_contenuto
 'immagini2/grazieAdozioneTartaruga.webp', -- grazie_alla_donazione_img
 'Grazie al tuo contributo ci consentirai di portare avanti la nostra attività di sorveglianza dei nidi per assicurare che i cuccioli arrivino in mare sani e salvi. Inoltre, ci permetterai di dotare i nostri Centri di Recupero a Molfetta, Policoro, Capo Rizzuto e Torre Guaceto di vasche per la degenza delle tartarughe ferite, strumenti ecografici, radiografici ed incubatrici, strumenti chirurgici per le sale operatori', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneTartaruga.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di una tartaruga marina: un regalo che aiuta a salvare una preziosa specie millenaria' -- regalo_adozione
 );
 
  
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('balena' , -- pet 
'immagini/1-496x432.jpg.webp' ,  -- sfondo
'Le balene continuano a essere in un mare di guai! Nonostante le popolazioni di balena siano finalmente in crescita , questi splendidi animali continuano a trovare sulle loro rotte ostacoli creati dall’uomo che ne minacciano la sopravvivenza.',  -- introduzione
 'immagini2/WelcomeKitConPelucheBalena.webp', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleBalena.webp', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorBalena.webp', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJuniorBalena.webp', -- Kit_Digitale_Junior
 'Fino alla fine degli anni ‘80 la megattera era una specie considerata a rischio estinzione; negli ultimi anni la situazione è fortunatamente migliorata anche grazie all’imposizione del divieto di caccia. Tuttavia, alcune sottopopolazioni come quelle della penisola arabica, sono ancora considerate in grave pericolo di estinzione', -- minacce_introduzione
 'Cambiamento climatico', -- minacce_1_titolo
 'immagini2/minaccia1Balena.webp', -- minacce_1_immagine
 'Gli effetti del cambiamento climatico possono interferire con attività vitali per le balene quali le migrazioni e l’accoppiamento. Inoltre rischiano di ridurre drasticamente la presenza di krill nelle acque artiche: la sua diminuzione costringerebbe le balene a spostamenti più lunghi e sfiancanti', -- minacce_1_contenuto
 'Inquinamento', -- minacce_2_titolo
 'immagini2/minaccia2Balena.webp', -- minacce_2_immagine
 'Il rumore causato dal trasporto marittimo disturba la comunicazione e l’alimentazione delle balene. La presenza di prodotti chimici, plastiche e microplastiche è altrettanto pericolosa: le balene rischiano di ingerire questi materiali e morire per soffocamento o avvelenamento.', -- minacce_2_contenuto
 'immagini2/grazieAdozioneBalena.webp', -- grazie_alla_donazione_img
 'Le balene si muovono attraverso lunghe rotte in tutti gli oceani e i mari del mondo: grazie al tuo contributo potremo identificare e proteggere sei di questi corridoi blu entro il 2030. Questo vuol dire lavorare per recuperare e distruggere le reti “fantasma” in cui le megattere rimangono impigliate e ridurre l’inquinamento da plastica. Inoltre, ci permetterai di continuare le nostre attività nel “Santuario Pelagos”, un’area marina protetta istituita a difesa dei cetacei grazie a un accordo firmato da Italia, Francia e Principato di Monaco', -- grazie_alla_donazione
 'immagini2/regalaAdozioneBalena.webp', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di una balena: un pensiero per un grande amore che può proteggere il futuro di un grande animale' -- regalo_adozione
 );
 
  
  INSERT INTO pets_adoption(pet,sfondo,introduzione,Welcome_Kit_con_Peluche,Welcome_Kit_digitale,Kit_Peluche_Junior, 
Kit_Digitale_Junior, minacce_introduzione, minacce_1_titolo,minacce_1_immagine, minacce_1_contenuto,minacce_2_titolo,
minacce_2_immagine, minacce_2_contenuto, grazie_alla_donazione_img,grazie_alla_donazione, regalo_adozione_img ,regalo_adozione)
VALUES('foca' , -- pet 
'immagini/Immagini-new-sostieni-5800-x-4182-px-26-599x432.jpg.webp' ,  -- sfondo
'Effetti del cambiamento climatico e caccia illegale sono le principali minacce per questa specie che ha visto negli ultimi 150 anni grandi oscillazioni nel numero della popolazione.',  -- introduzione
 'immagini2/WelcomeKitConPelucheFoca.png', -- ,Welcome_Kit_con_Peluche
 'immagini2/WelcomeKitDigitaleFoca.png', -- Welcome_Kit_digitale
 'immagini2/KitPelucheJuniorFoca.png', -- Kit_Peluche_Junior
 'immagini2/KitDigitaleJunioFoca.png', -- Kit_Digitale_Junior
 'Il nemico delle foche siamo noi: le principali minacce che incombono sulla sopravvivenza di questa specie sono, infatti, da attribuire all’attività umana.', -- minacce_introduzione
 'Cambiamento climatico', -- minacce_1_titolo
 'immagini2/minacce1Foca.jpg', -- minacce_1_immagine
 'A causa dello scioglimento dei ghiacci per le foche è sempre più difficile a reperire tane in cui ripararsi e allattare i propri cuccioli, mettendo a repentaglio la capacità riproduttiva della specie. Inoltre l’aumentare delle temperature rischia anche di ridurre la presenza di krill, uno degli alimenti principali di cui si nutrono le foche della Groenlandia', -- minacce_1_contenuto
 'Caccia e commercio illegale', -- minacce_2_titolo
 'immagini2/minacce2Foca.jpg', -- minacce_2_immagine
 'Negli ultimi 150 anni il numero di esemplari ha oscillato dai 9 milioni fino a un minimo di un milione. Oggi la caccia è autorizzata da specifiche normative e restrizioni che però vengono ancora violate', -- minacce_2_contenuto
 'immagini2/grazieAdozioneFoca.jpg', -- grazie_alla_donazione_img
 'Dal 1994 il WWF lavora per la conservazione dell’ambiente artico, sia con progetti sul campo sia partecipando al dibattito politico internazionale, per assicurare un futuro a questa e ad altre specie. Il WWF è in prima linea anche per favorire la produzione di energia sostenibile e limitare a livello industriale la produzione di sostanze tossiche che rischiano poi di essere disperse nell’ambiente.', -- grazie_alla_donazione
 'immagini2/RegalaAdozioneFoca.jpg', -- regalo_adozione_img
 'Per fare un regalo unico a una persona speciale regala l’adozione WWF di una foca: un piccolo gesto che farà sorridere chi ami e darà un futuro a una specie meravigliosa' -- regalo_adozione
 );
 
  

