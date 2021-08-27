<?php
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

// Get Database information
require dirname(__FILE__)."/sites/default/settings.php";
/*
$databases['default']['default'] = [
    'database' => '',
    'username' => '',
    'password' => '',
    'host' => 'localhost',
    'port' => '3306',
    'driver' => 'mysql',
    'prefix' => '',
    'collation' => 'utf8mb4_general_ci',
];
*/

/*
EXPORT TEMPLATE:

[
    {
        "id": 83,
        "slug": "wprm-verdens-bedste-boefsandwich",
        "post_status": "publish",
        "type": "food",
        "image_url": "https:\/\/demo.kundesider.dk\/wp-content\/uploads\/2021\/08\/Verdens-bedste-boefsandwich-opskrift-1.jpg",
        "pin_image_url": "https:\/\/demo.kundesider.dk\/wp-content\/uploads\/2021\/08\/Verdens-bedste-boefsandwich-opskrift-1.jpg",
        "name": "Verdens bedste b\u00f8fsandwich",
        "summary": "<p>Jesper Gr\u00e6m fra Rasses Skovp\u00f8lsers udgave<\/p>",
        "author_display": "post_author",
        "author_name": "",
        "author_link": "",
        "cost": "",
        "servings": "2",
        "servings_unit": "personer",
        "prep_time": "360",
        "prep_time_zero": "",
        "cook_time": "15",
        "cook_time_zero": "",
        "total_time": "0",
        "custom_time": "0",
        "custom_time_zero": "",
        "custom_time_label": "",
        "tags": {
            "course": [
                "Frokost",
                "Hovedret"
            ],
            "cuisine": [
                "Dansk"
            ],
            "keyword": [
                "b\u00f8fsandwich",
                "brun sovs",
                "burger",
                "fastfood",
                "hakket oksek\u00f8d",
                "oksek\u00f8d"
            ]
        },
        "equipment": [],
        "ingredients_flat": [
            {
                "name": "Sovs",
                "type": "group"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Sm\u00f8r",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Svinefedt",
                "notes": "her er det fra ribbenstege",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Hvedemel",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "400",
                "unit": "ml",
                "name": "Svindefond",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "200",
                "unit": "ml",
                "name": "R\u00f8dvinssauce",
                "notes": "lavet p\u00e5 r\u00f8dvin, kalvefond og krydderier",
                "type": "ingredient"
            },
            {
                "amount": "1",
                "unit": "kvist",
                "name": "Frisk timian",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "1",
                "unit": "kvist",
                "name": "Frisk rosmarin",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "4",
                "unit": "dl",
                "name": "Fl\u00f8de",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Kul\u00f8r",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Paste",
                "notes": "fermenteret peber og lignende, kan udelades",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Salt og peber",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "1",
                "unit": "spsk.",
                "name": "Ribsgele",
                "notes": "",
                "type": "ingredient"
            },
            {
                "name": "Bl\u00f8de l\u00f8g",
                "type": "group"
            },
            {
                "amount": "",
                "unit": "",
                "name": "L\u00f8g",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Andefedt",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Frisk timian",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Sennep",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Worcestershiresauce",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Engelsk sauce",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Fedtegrever",
                "notes": "",
                "type": "ingredient"
            },
            {
                "name": "R\u00e5 l\u00f8g",
                "type": "group"
            },
            {
                "amount": "1",
                "unit": "stk.",
                "name": "R\u00f8dl\u00f8g",
                "notes": "",
                "type": "ingredient"
            },
            {
                "name": "Ristet l\u00f8g",
                "type": "group"
            },
            {
                "amount": "",
                "unit": "",
                "name": "L\u00f8g",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Hvedemel",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Krydderier",
                "notes": "efter smag, her er der bl.a. salt og sennepspulver i",
                "type": "ingredient"
            },
            {
                "name": "Syltede r\u00f8dbeder",
                "type": "group"
            },
            {
                "amount": "",
                "unit": "",
                "name": "R\u00f8dbeder",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "1\/2",
                "unit": "del",
                "name": "Eddike",
                "notes": "nok til d\u00e6kke r\u00f8dbederne",
                "type": "ingredient"
            },
            {
                "amount": "1\/2",
                "unit": "del",
                "name": "Sukker",
                "notes": "nok til d\u00e6kke r\u00f8dbederne",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Krydderier",
                "notes": "",
                "type": "ingredient"
            },
            {
                "name": "Syltede agurker",
                "type": "group"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Agurker",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Salt",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "1\/2",
                "unit": "del",
                "name": "Sukker",
                "notes": "nok til d\u00e6kke agurkerne",
                "type": "ingredient"
            },
            {
                "amount": "1\/2",
                "unit": "del",
                "name": "Eddike",
                "notes": "nok til d\u00e6kke agurkerne",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Krydderier",
                "notes": "peberkorn, sennepskorn, laurb\u00e6r, kanel, anis, vanilje, alleh\u00e5nde, t\u00f8rrede korianderfr\u00f8 og dild",
                "type": "ingredient"
            },
            {
                "name": "B\u00f8ffer",
                "type": "group"
            },
            {
                "amount": "440",
                "unit": "gram",
                "name": "Hakket oksek\u00f8d",
                "notes": "a&#39; 220 grams b\u00f8ffer",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Sm\u00f8r",
                "notes": "til stegningen",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Olie",
                "notes": "til stegningen",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Flagesalt",
                "notes": "",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Peber",
                "notes": "friskkv\u00e6rnet",
                "type": "ingredient"
            },
            {
                "name": "Boller",
                "type": "group"
            },
            {
                "amount": "2",
                "unit": "stk.",
                "name": "Burgerboller",
                "notes": "gerne potato buns",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Sm\u00f8r",
                "notes": "til stegningen",
                "type": "ingredient"
            },
            {
                "name": "Anretning",
                "type": "group"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Ketchup",
                "notes": "Heinz",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Sennep",
                "notes": "Gul",
                "type": "ingredient"
            },
            {
                "amount": "",
                "unit": "",
                "name": "Remoulade",
                "notes": "gerne hjemmelavet",
                "type": "ingredient"
            }
        ],
        "instructions_flat": [
            {
                "name": "Sovs",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Smelt sm\u00f8r og svinefedtet. Jesper bruger fedt fra hans ribbenstege og du kan selvf\u00f8lgelig blot bruge k\u00f8be-svinefedt eller mere sm\u00f8r. Tils\u00e6t hvedemel under kraftig piskning. Det man laver nu kaldes en roux (eller opbagning) og er sovsen j\u00e6vning. Bliv ved med at piske godt og grundigt ogs\u00e5 n\u00e5r du har f\u00e5et en melbolle ud af det. Det skal varmes godt igennem, ellers s\u00e5 f\u00e5r sovsen melsmag.\u00a0<\/p><p>Tils\u00e6t svinefond og laurb\u00e6rblade mens du stadig r\u00f8rer rundt. Tils\u00e6t cirka 1 dl fl\u00f8de under stadig omr\u00f8ring. Tils\u00e6t r\u00f8dvinssaucen (her er den lavet p\u00e5 kalvefond, r\u00f8dvin og krydderurter) og lidt kul\u00f8r. Lad det koge lidt ind og tils\u00e6t lidt mere fl\u00f8de.\u00a0<\/p><p>Tils\u00e6t pastes (hvis du har, eller kan det udelades) og salt og peber.<\/p><p>Tils\u00e6t rosmarin og timian og lidt mere fl\u00f8de.<\/p><p>Herefter tils\u00e6ttes ribsgele og nu skal der skrues ned p\u00e5 lavt blus.\u00a0<\/p><p>Lad den simre i 10-15 minutter.<\/p><p>Herefter skal den lige op p\u00e5 kogepunktet og smages til med evt. mere salt, peber og fl\u00f8de.<\/p><p>Nu er det vigtigt at sovsen ikke serveres straks, en sovs skal helst have en temperatur mellem 40-50 grader, s\u00e5 man kan smage alle smagene.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Bl\u00f8de l\u00f8g",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Skr\u00e6l l\u00f8g og del dem p\u00e5 langs.\u00a0<\/p><p>Brun dem af p\u00e5 en pande i en smagsneutral olie, s\u00e5 de f\u00e5r lidt farve.<\/p><p>Kom dem i et ovnfast fad med timian, salt, peber, sennep, andefedt og engelsk sauce og konfiter dem ved 100 grader i ovnen i alt fra 1,5-3 timer. De skal v\u00e6re m\u00f8re og klare.<\/p><p>Sk\u00e6r dem i skiver og kom dem i et sylteglas sammen med andefedtblandingen. Det hele g\u00f8res for at hurtigere at kunne lave bl\u00f8de l\u00f8g, da det tager lang tid fra bunden af. L\u00f8gene kan st\u00e5 p\u00e5 k\u00f8l l\u00e6nge, s\u00e5 du let kan lave bl\u00f8de l\u00f8g en anden dag.<\/p><p>N\u00e5r de skal f\u00e6rdigg\u00f8res, er det vigtigt at f\u00e5 b\u00e5de l\u00f8g og fedtet med p\u00e5 panden (hvis du ikke laver hele sylteglasset), da fedtstoffet er det de skal steges i.Kom det p\u00e5 en varm pande og steg dem i et par minutter, mens du r\u00f8rer dem rundt hele tiden. Tils\u00e6t lidt engelsk sauce, worestershire-sauce, salt og peber. Skru ned for blusset og lad dem simre et par minutter.<\/p><p>Kom l\u00f8gene i en sk\u00e5l og tils\u00e6t lidt fedtegrever og r\u00f8r det sammen.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "R\u00e5 l\u00f8g",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Skr\u00e6l l\u00f8get og finhak det.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Ristet l\u00f8g",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Skr\u00e6l l\u00f8gene og sk\u00e6r dem i tynde skiver p\u00e5 cirka 1-2 mm.<\/p><p>Vend l\u00f8gene i hvedemel og herefter i krydderiblandingen.<\/p><p>Steg dem ved cirka 180 grader og pas p\u00e5 med at komme for mange l\u00f8g i ad gangen. Det s\u00e6nker oliens temperatur og f\u00e5r dem til at klumpe sammen. Det er lige meget om du bruger en gryde, pande eller frituregryde med olie til stegningen.<\/p><p>Hold \u00f8je med dem mens de steger, da de ikke m\u00e5 for f\u00e5 lidt (s\u00e5 forbliver de bl\u00f8de) og for meget (s\u00e5 bliver de for bitre), s\u00e5 de skal tages af n\u00e5r de har f\u00e5et en flot gylden farve.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Syltede r\u00f8dbeder",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Bring syltelagen i kog og sigt krydderierne fra.<\/p><p>Skr\u00e6l r\u00f8dbederne og sk\u00e6r dem i sm\u00e5 tern.<\/p><p>Kog r\u00f8dbederne direkte i lagen.<\/p><p>De skal n\u00e6sten v\u00e6re m\u00f8re, men m\u00e5 gerne have en smule bid, s\u00e5 de ikke bliver smattet.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Syltede agurker",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Sk\u00e6r agurkerne i tynde skiver.<\/p><p>Kom dem i en sk\u00e5l.<\/p><p>H\u00e6ld salt p\u00e5.<\/p><p>Lad dem st\u00e5 og tr\u00e6kke i k\u00f8leskabet i et d\u00f8gn. S\u00e5 smider de en del af v\u00e6sken.<\/p><p>Dr\u00e6n agurkerne med h\u00e5ndkraft ved at presse\/knuge dem sammen.<\/p><p>Agurkerne er nu rynket og de er super spr\u00f8de.<\/p><p>H\u00e6ld nu den kolde syltelage henover.<\/p><p>Lad dem st\u00e5 p\u00e5 k\u00f8l og tr\u00e6kke i et d\u00f8gn, men gerne 2-3 dage.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Hakkeb\u00f8ffer",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>S\u00f8rg for at k\u00f8det er taget ud 30 minutter f\u00f8r, s\u00e5 den ikke koger p\u00e5 panden.<\/p><p>Kom olie p\u00e5 panden og n\u00e5r den er varm tils\u00e6tter du sm\u00f8rret.<\/p><p>Kom b\u00f8fferne p\u00e5 panden. Hvis du har noget tungt du kan komme henover, s\u00e5 er det at foretr\u00e6kke.<\/p><p>Kom peber og salt p\u00e5 n\u00e5r du vender b\u00f8ffen. Brug gerne flagesalt.<\/p><p>Coat gerne b\u00f8ffen med sm\u00f8r\/olieblandingen mens den steger.<\/p><p>B\u00f8ffen skal have cirka 4 minutter p\u00e5 hver side og hvile cirka samme tid bagefter.<\/p><p>N\u00e5r saften begynder at tr\u00e6kke op igennem b\u00f8ffen, s\u00e5 du kan se den p\u00e5 toppen, s\u00e5 er den som den skal v\u00e6re. Her er b\u00f8ffen stegt, s\u00e5 den stadig har lidt farve.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Boller",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>N\u00e5r Jesper bager disse boller, s\u00e5 bruges der 3 kg kartoffelmos til 4 kg hvedemel.<\/p><p>Sk\u00e6r dem over, s\u00e5 skal de steges p\u00e5 indersiden.<\/p><p>Det vigtigste er at de bliver spr\u00f8de inden i og bl\u00f8de udenp\u00e5.<\/p><p>De kan steges p\u00e5 en br\u00f8drister, i sm\u00f8r p\u00e5 panden eller i sm\u00f8r\/olieblandingen fra k\u00f8det, da det alligevel st\u00e5r og tr\u00e6kker.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            },
            {
                "name": "Anretning",
                "type": "group"
            },
            {
                "name": "",
                "text": "<p>Placer bunden af bollen p\u00e5 tallerkenen.<\/p><p>Kom en tsk. remoulade p\u00e5 bollen og sm\u00f8r den ud.<\/p><p>Kom sennep og ketchup ovenp\u00e5 og s\u00f8rg for at hele bunden er d\u00e6kket, s\u00e5 man f\u00e5r noget i hver mundfuld.<\/p><p>Kom syltede r\u00f8dbeder p\u00e5, cirka 2-3 tsk.<\/p><p>Kom cirka 2 tsk. r\u00f8dl\u00f8g ovenp\u00e5 og herefter skal b\u00f8ffen p\u00e5.<\/p><p>Krydr b\u00f8ffen med flagesalt.<\/p><p>Kom de bl\u00f8de l\u00f8g med fedtegrever henover.<\/p><p>Tils\u00e6t agurksalat, det m\u00e5 gerne v\u00e6re 2-4 spsk.<\/p><p>Sm\u00f8r topbollen med remoulade p\u00e5 indersiden og l\u00e6g den p\u00e5 din burger.<\/p><p>H\u00e6ld saucen henover din b\u00f8fsandwich og kom en god h\u00e5ndfuld ristet l\u00f8g henover.<\/p><p>Velbekomme.<\/p>",
                "ingredients": [],
                "type": "instruction",
                "image_url": ""
            }
        ],
        "video_embed": "",
        "notes": "<p><img class=\"alignnone size-medium wp-image-82\" src=\"https:\/\/demo.kundesider.dk\/wp-content\/uploads\/2021\/08\/Verdens-bedste-boefsandwich-opskrift-2-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" \/><\/p>\n",
        "nutrition": [],
        "custom_fields": [],
        "ingredient_links_type": "global",
        "unit_system": "default",
        "my_emissions": "",
        "parent": {
            "ID": 78,
            "post_date": "2021-08-13 13:02:08",
            "post_name": "verdens-bedste-boefsandwich",
            "post_title": "Verdens bedste b\u00f8fsandwich",
            "post_content": "<!-- wp:paragraph -->\n<p>I mit arbejde med&nbsp;<a href=\"https:\/\/premium.gastrofun.dk\/\">GastroFun PREMIUM<\/a>&nbsp;er jeg s\u00e5 heldig at m\u00f8de dygtige madprofiler og her har jeg f\u00e5et vist denne l\u00e6kre ret af ejeren af Rasses Skovp\u00f8lser Jesper Gr\u00e6m. De har flere gange vundet priser for denne b\u00f8fsandwich og det kan man godt forst\u00e5.<\/p>\n<!-- \/wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Wow siger vi bare: Jesper har over de sidste mange \u00e5r forfinet sin prisvindende b\u00f8fsandwich. Og vi kan love, at han ikke springer over hvor g\u00e6rdet er lavest \u2014 og alle detaljer er gennemt\u00e6nkt!<\/p>\n<!-- \/wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Opskriften er til 2 voksne, men n\u00e5r du endelig er i gang, s\u00e5 lav gerne store portioner af syltede r\u00f8dbeder, syltede agurker,\u00a0og ristet l\u00f8g. De har alle en lang holdbarhed, og processen tager ikke meget l\u00e6ngere tid ved at lave det i st\u00f8rre portioner end kun til 2 personer.\u00a0<\/p>\n<!-- \/wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Se os lave retten her:<\/p>\n<!-- \/wp:paragraph -->\n\n<!-- wp:embed {\"url\":\"https:\/\/youtu.be\/H8KvRaqVQLU\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps:\/\/youtu.be\/H8KvRaqVQLU\n<\/div><\/figure>\n<!-- \/wp:embed -->\n\n<!-- wp:wp-recipe-maker\/recipe {\"id\":83,\"updated\":1628852440071} -->\n<!--WPRM Recipe 83-->\n<div class=\"wprm-fallback-recipe\">\n\t<h2 class=\"wprm-fallback-recipe-name\">Verdens bedste b\u00f8fsandwich<\/h2>\n\t<img class=\"wprm-fallback-recipe-image\" src=\"https:\/\/demo.kundesider.dk\/wp-content\/uploads\/2021\/08\/Verdens-bedste-boefsandwich-opskrift-1-150x150.jpg\"\/>\t<p class=\"wprm-fallback-recipe-summary\">\n\t\t<p>Jesper Gr\u00e6m fra Rasses Skovp\u00f8lsers udgave<\/p>\t<\/p>\n\t<div class=\"wprm-fallback-recipe-equipment\">\n\t\t\t<\/div>\n\t<div class=\"wprm-fallback-recipe-ingredients\">\n\t\t<h4>Sovs<\/h4><ul><li>Sm\u00f8r<\/li><li>Svinefedt (her er det fra ribbenstege)<\/li><li>Hvedemel<\/li><li>400 ml Svindefond<\/li><li>200 ml R\u00f8dvinssauce (lavet p\u00e5 r\u00f8dvin, kalvefond og krydderier)<\/li><li>1 kvist Frisk timian<\/li><li>1 kvist Frisk rosmarin<\/li><li>4 dl Fl\u00f8de<\/li><li>Kul\u00f8r<\/li><li>Paste (fermenteret peber og lignende, kan udelades)<\/li><li>Salt og peber<\/li><li>1 spsk. Ribsgele<\/li><\/ul><h4>Bl\u00f8de l\u00f8g<\/h4><ul><li>L\u00f8g<\/li><li>Andefedt<\/li><li>Frisk timian<\/li><li>Sennep<\/li><li>Worcestershiresauce<\/li><li>Engelsk sauce<\/li><li>Fedtegrever<\/li><\/ul><h4>R\u00e5 l\u00f8g<\/h4><ul><li>1 stk. R\u00f8dl\u00f8g<\/li><\/ul><h4>Ristet l\u00f8g<\/h4><ul><li>L\u00f8g<\/li><li>Hvedemel<\/li><li>Krydderier (efter smag, her er der bl.a. salt og sennepspulver i)<\/li><\/ul><h4>Syltede r\u00f8dbeder<\/h4><ul><li>R\u00f8dbeder<\/li><li>1\/2 del Eddike (nok til d\u00e6kke r\u00f8dbederne)<\/li><li>1\/2 del Sukker (nok til d\u00e6kke r\u00f8dbederne)<\/li><li>Krydderier<\/li><\/ul><h4>Syltede agurker<\/h4><ul><li>Agurker<\/li><li>Salt<\/li><li>1\/2 del Sukker (nok til d\u00e6kke agurkerne)<\/li><li>1\/2 del Eddike (nok til d\u00e6kke agurkerne)<\/li><li>Krydderier (peberkorn, sennepskorn, laurb\u00e6r, kanel, anis, vanilje, alleh\u00e5nde, t\u00f8rrede korianderfr\u00f8 og dild)<\/li><\/ul><h4>B\u00f8ffer<\/h4><ul><li>440 gram Hakket oksek\u00f8d (a&#039; 220 grams b\u00f8ffer)<\/li><li>Sm\u00f8r (til stegningen)<\/li><li>Olie (til stegningen)<\/li><li>Flagesalt<\/li><li>Peber (friskkv\u00e6rnet)<\/li><\/ul><h4>Boller<\/h4><ul><li>2 stk. Burgerboller (gerne potato buns)<\/li><li>Sm\u00f8r (til stegningen)<\/li><\/ul><h4>Anretning<\/h4><ul><li>Ketchup (Heinz)<\/li><li>Sennep (Gul)<\/li><li>Remoulade (gerne hjemmelavet)<\/li><\/ul>\t<\/div>\n\t<div class=\"wprm-fallback-recipe-instructions\">\n\t\t<h4>Sovs<\/h4><ol><li><p>Smelt sm\u00f8r og svinefedtet. Jesper bruger fedt fra hans ribbenstege og du kan selvf\u00f8lgelig blot bruge k\u00f8be-svinefedt eller mere sm\u00f8r. Tils\u00e6t hvedemel under kraftig piskning. Det man laver nu kaldes en roux (eller opbagning) og er sovsen j\u00e6vning. Bliv ved med at piske godt og grundigt ogs\u00e5 n\u00e5r du har f\u00e5et en melbolle ud af det. Det skal varmes godt igennem, ellers s\u00e5 f\u00e5r sovsen melsmag.\u00a0<\/p><p>Tils\u00e6t svinefond og laurb\u00e6rblade mens du stadig r\u00f8rer rundt. Tils\u00e6t cirka 1 dl fl\u00f8de under stadig omr\u00f8ring. Tils\u00e6t r\u00f8dvinssaucen (her er den lavet p\u00e5 kalvefond, r\u00f8dvin og krydderurter) og lidt kul\u00f8r. Lad det koge lidt ind og tils\u00e6t lidt mere fl\u00f8de.\u00a0<\/p><p>Tils\u00e6t pastes (hvis du har, eller kan det udelades) og salt og peber.<\/p><p>Tils\u00e6t rosmarin og timian og lidt mere fl\u00f8de.<\/p><p>Herefter tils\u00e6ttes ribsgele og nu skal der skrues ned p\u00e5 lavt blus.\u00a0<\/p><p>Lad den simre i 10-15 minutter.<\/p><p>Herefter skal den lige op p\u00e5 kogepunktet og smages til med evt. mere salt, peber og fl\u00f8de.<\/p><p>Nu er det vigtigt at sovsen ikke serveres straks, en sovs skal helst have en temperatur mellem 40-50 grader, s\u00e5 man kan smage alle smagene.<\/p><\/li><\/ol><h4>Bl\u00f8de l\u00f8g<\/h4><ol><li><p>Skr\u00e6l l\u00f8g og del dem p\u00e5 langs.\u00a0<\/p><p>Brun dem af p\u00e5 en pande i en smagsneutral olie, s\u00e5 de f\u00e5r lidt farve.<\/p><p>Kom dem i et ovnfast fad med timian, salt, peber, sennep, andefedt og engelsk sauce og konfiter dem ved 100 grader i ovnen i alt fra 1,5-3 timer. De skal v\u00e6re m\u00f8re og klare.<\/p><p>Sk\u00e6r dem i skiver og kom dem i et sylteglas sammen med andefedtblandingen. Det hele g\u00f8res for at hurtigere at kunne lave bl\u00f8de l\u00f8g, da det tager lang tid fra bunden af. L\u00f8gene kan st\u00e5 p\u00e5 k\u00f8l l\u00e6nge, s\u00e5 du let kan lave bl\u00f8de l\u00f8g en anden dag.<\/p><p>N\u00e5r de skal f\u00e6rdigg\u00f8res, er det vigtigt at f\u00e5 b\u00e5de l\u00f8g og fedtet med p\u00e5 panden (hvis du ikke laver hele sylteglasset), da fedtstoffet er det de skal steges i.Kom det p\u00e5 en varm pande og steg dem i et par minutter, mens du r\u00f8rer dem rundt hele tiden. Tils\u00e6t lidt engelsk sauce, worestershire-sauce, salt og peber. Skru ned for blusset og lad dem simre et par minutter.<\/p><p>Kom l\u00f8gene i en sk\u00e5l og tils\u00e6t lidt fedtegrever og r\u00f8r det sammen.<\/p><\/li><\/ol><h4>R\u00e5 l\u00f8g<\/h4><ol><li><p>Skr\u00e6l l\u00f8get og finhak det.<\/p><\/li><\/ol><h4>Ristet l\u00f8g<\/h4><ol><li><p>Skr\u00e6l l\u00f8gene og sk\u00e6r dem i tynde skiver p\u00e5 cirka 1-2 mm.<\/p><p>Vend l\u00f8gene i hvedemel og herefter i krydderiblandingen.<\/p><p>Steg dem ved cirka 180 grader og pas p\u00e5 med at komme for mange l\u00f8g i ad gangen. Det s\u00e6nker oliens temperatur og f\u00e5r dem til at klumpe sammen. Det er lige meget om du bruger en gryde, pande eller frituregryde med olie til stegningen.<\/p><p>Hold \u00f8je med dem mens de steger, da de ikke m\u00e5 for f\u00e5 lidt (s\u00e5 forbliver de bl\u00f8de) og for meget (s\u00e5 bliver de for bitre), s\u00e5 de skal tages af n\u00e5r de har f\u00e5et en flot gylden farve.<\/p><\/li><\/ol><h4>Syltede r\u00f8dbeder<\/h4><ol><li><p>Bring syltelagen i kog og sigt krydderierne fra.<\/p><p>Skr\u00e6l r\u00f8dbederne og sk\u00e6r dem i sm\u00e5 tern.<\/p><p>Kog r\u00f8dbederne direkte i lagen.<\/p><p>De skal n\u00e6sten v\u00e6re m\u00f8re, men m\u00e5 gerne have en smule bid, s\u00e5 de ikke bliver smattet.<\/p><\/li><\/ol><h4>Syltede agurker<\/h4><ol><li><p>Sk\u00e6r agurkerne i tynde skiver.<\/p><p>Kom dem i en sk\u00e5l.<\/p><p>H\u00e6ld salt p\u00e5.<\/p><p>Lad dem st\u00e5 og tr\u00e6kke i k\u00f8leskabet i et d\u00f8gn. S\u00e5 smider de en del af v\u00e6sken.<\/p><p>Dr\u00e6n agurkerne med h\u00e5ndkraft ved at presse\/knuge dem sammen.<\/p><p>Agurkerne er nu rynket og de er super spr\u00f8de.<\/p><p>H\u00e6ld nu den kolde syltelage henover.<\/p><p>Lad dem st\u00e5 p\u00e5 k\u00f8l og tr\u00e6kke i et d\u00f8gn, men gerne 2-3 dage.<\/p><\/li><\/ol><h4>Hakkeb\u00f8ffer<\/h4><ol><li><p>S\u00f8rg for at k\u00f8det er taget ud 30 minutter f\u00f8r, s\u00e5 den ikke koger p\u00e5 panden.<\/p><p>Kom olie p\u00e5 panden og n\u00e5r den er varm tils\u00e6tter du sm\u00f8rret.<\/p><p>Kom b\u00f8fferne p\u00e5 panden. Hvis du har noget tungt du kan komme henover, s\u00e5 er det at foretr\u00e6kke.<\/p><p>Kom peber og salt p\u00e5 n\u00e5r du vender b\u00f8ffen. Brug gerne flagesalt.<\/p><p>Coat gerne b\u00f8ffen med sm\u00f8r\/olieblandingen mens den steger.<\/p><p>B\u00f8ffen skal have cirka 4 minutter p\u00e5 hver side og hvile cirka samme tid bagefter.<\/p><p>N\u00e5r saften begynder at tr\u00e6kke op igennem b\u00f8ffen, s\u00e5 du kan se den p\u00e5 toppen, s\u00e5 er den som den skal v\u00e6re. Her er b\u00f8ffen stegt, s\u00e5 den stadig har lidt farve.<\/p><\/li><\/ol><h4>Boller<\/h4><ol><li><p>N\u00e5r Jesper bager disse boller, s\u00e5 bruges der 3 kg kartoffelmos til 4 kg hvedemel.<\/p><p>Sk\u00e6r dem over, s\u00e5 skal de steges p\u00e5 indersiden.<\/p><p>Det vigtigste er at de bliver spr\u00f8de inden i og bl\u00f8de udenp\u00e5.<\/p><p>De kan steges p\u00e5 en br\u00f8drister, i sm\u00f8r p\u00e5 panden eller i sm\u00f8r\/olieblandingen fra k\u00f8det, da det alligevel st\u00e5r og tr\u00e6kker.<\/p><\/li><\/ol><h4>Anretning<\/h4><ol><li><p>Placer bunden af bollen p\u00e5 tallerkenen.<\/p><p>Kom en tsk. remoulade p\u00e5 bollen og sm\u00f8r den ud.<\/p><p>Kom sennep og ketchup ovenp\u00e5 og s\u00f8rg for at hele bunden er d\u00e6kket, s\u00e5 man f\u00e5r noget i hver mundfuld.<\/p><p>Kom syltede r\u00f8dbeder p\u00e5, cirka 2-3 tsk.<\/p><p>Kom cirka 2 tsk. r\u00f8dl\u00f8g ovenp\u00e5 og herefter skal b\u00f8ffen p\u00e5.<\/p><p>Krydr b\u00f8ffen med flagesalt.<\/p><p>Kom de bl\u00f8de l\u00f8g med fedtegrever henover.<\/p><p>Tils\u00e6t agurksalat, det m\u00e5 gerne v\u00e6re 2-4 spsk.<\/p><p>Sm\u00f8r topbollen med remoulade p\u00e5 indersiden og l\u00e6g den p\u00e5 din burger.<\/p><p>H\u00e6ld saucen henover din b\u00f8fsandwich og kom en god h\u00e5ndfuld ristet l\u00f8g henover.<\/p><p>Velbekomme.<\/p><\/li><\/ol>\t<\/div>\n\t<div class=\"wprm-fallback-recipe-notes\">\n\t\t<p><img class=\"alignnone size-medium wp-image-82\" src=\"https:\/\/demo.kundesider.dk\/wp-content\/uploads\/2021\/08\/Verdens-bedste-boefsandwich-opskrift-2-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" \/><\/p>\n\t<\/div>\n\t<div class=\"wprm-fallback-recipe-meta\">\n\t\t<div class=\"wprm-fallback-recipe-meta-course\">Frokost, Hovedret<\/div><div class=\"wprm-fallback-recipe-meta-cuisine\">Dansk<\/div><div class=\"wprm-fallback-recipe-meta-keyword\">b\u00f8fsandwich, brun sovs, burger, fastfood, hakket oksek\u00f8d, oksek\u00f8d<\/div>\t<\/div>\n<\/div>\n<!--End WPRM Recipe-->\n<!-- \/wp:wp-recipe-maker\/recipe -->",
            "post_excerpt": "",
            "post_status": "publish",
            "post_type": "opskrift",
            "image_url": "https:\/\/demo.kundesider.dk\/wp-content\/uploads\/2021\/08\/Verdens-bedste-boefsandwich-opskrift-1.jpg",
            "tags": {
                "category": [
                    "Ikke-kategoriseret"
                ]
            }
        }
    }
]

 */



class drupalExportRecipes {

      // Runs everytime
      function __construct($db) {
            $dsn = "mysql:host=".$db["host"].";dbname=".$db["database"].";charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                 $pdo = new PDO($dsn, $db["username"], $db["password"], $options);
                 $this->conn = $pdo;

            } catch (\PDOException $e) {
                 throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }

      }

      // Getting all users from the table users_field_data
      // Most information we do not need in this casem, but will export anyway.
      public function fetchUsers() {

            $stmt = $this->conn->query('SELECT * FROM users_field_data');
            $i="1";
            while ($row = $stmt->fetch())
            {

                  // Check if this is an empty user
                  if($row["pass"] == "" || $row["mail"] == "") { continue; }


                  $output = "";

                  // Fetch Bio data
                  $bio = $this->fetchUserBio($row["uid"]);

                  // If this nis first run, then we want some explanation to the rows

                  if($i == "1") {
                        foreach($row AS $columnName => $data) {
                                    $output .= $columnName.";";
                        }

                        // If there is BIO data, then include it.
                        if(is_array($bio) && count($bio) > 0) {
                              foreach($bio AS $columnName => $data) {
                                          $output .= $columnName.";";
                              }
                        }

                  echo $output."<br>";

                  }

                  // Now output the rows.
                  $output = "";
                  foreach($row AS $columnName => $data) {
                              $output .= $row[$columnName].";";
                  }

                  // If there is BIO data, then include it.
                  if(is_array($bio) && count($bio) > 0) {
                        foreach($bio AS $columnName => $data) {
                                    $output .= $bio[$columnName].";";
                        }
                  }

                  echo $output."<br>";

                  $i++;
            }

      }




}

$drupalExportRecipes = new drupalExportRecipes($databases['default']['default']);


echo $drupalExportRecipes->fetchUsers();
?>
