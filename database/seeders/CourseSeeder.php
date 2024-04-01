<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{

    public function run()
    {
      $cat0 = Category::create(['name' => 'Featured']);
      $cat1 = Category::create(['name' => 'CyberScam']);
      $cat2 = Category::create(['name' => 'Development']);
      $cat3 = Category::create(['name' => 'Design']);
      $cat4 = Category::create(['name' => 'Investments']);
      $cat5 = Category::create(['name' => 'Gaming']);
      $cat6 = Category::create(['name' => 'Marketing']);
      $cat7 = Category::create(['name' => 'SocialSkills']);
      $cat8 = Category::create(['name' => 'Legal']);
      $cat9 = Category::create(['name' => 'Politics']);
      $cat10 = Category::create(['name' => 'Entertainment']);
      $cat11 = Category::create(['name' => 'News']);
      $cat12 = Category::create(['name' => 'Trading']);

      $lvl1 = Level::create(['name'=>'Basic']);
      $lvl2 = Level::create(['name'=>'Intermediate']);
      $lvl3 = Level::create(['name'=>'Advanced']);

      $course1 = Course::create([
        'user_id' => 1,
        'category_id' => $cat1->id,
        'level_id' => $lvl2->id,
        'title' => 'La seguridad en la Blockchain',
        'subtitle' => 'Lo que tienes que saber para no caer en manos de los estafadores',
        'description' => 'En este curso podrás aprender los pilares fundamentalas de la seguridad dentro del mundo blockchain y de las criptodivisas de las manos de uno de nuestros grandes profesionales y experto en el ámbito de los ciberdelitos. En este también se aborda la seguridad fuera de la blockchain y como esta repercute tan positivamente en la seguridad dentro de ella.',
        'image' => 'la-seguridad-en-la-blockchain.png',
        'tags' => ['Blockchain', 'Security', 'Prevention'],
      ]);

      $unit1_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => '¿Que es la Academy Scan DeFi?',
        'subtitle' => 'Todo lo que debes saber para comenzar en la Academy Scan DeFi',
        'description' => 'En esta primera unidad se explica que es y como comenzar a aprender dentro de la Scan Academy. Además, se aporta el orden en el que se sugiere que este audiocurso sea escuchado.',
      ]);

      $lesson1_1_1 = Lesson::create([
        'unit_id' => $unit1_1->id,
        'type' => 'audio', // audio, video, text
        'title' => '¿Que es la Academy Scan DeFi?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211109;235400000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } --> </STYLE> </HEAD> <BODY LANG="es-ES" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%"> <FONT FACE="Times New Roman, serif"><FONT SIZE=3><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><B>¿Qué es la Academy Scan DeFi?</B></FONT></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%"> <FONT FACE="Times New Roman, serif"><FONT SIZE=3><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Es el campus virtual del ecosistema Scan DeFi donde encontrarás todo el material relacionado a la prevención de estafas. Constará de diferentes temas informativos y formativos dictados por expertos en diferentes áreas, tales como especialistas en cibercrimen y en tecnología blockchain para que puedas adentrarte al mundo cripto sin morir en el intento.</FONT></FONT></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%"> <FONT FACE="Times New Roman, serif"><FONT SIZE=3><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">Academy es un pilar importante de nuestra lucha contra las estafas. Aquí pretendemos dotarte no solo de información, herramientas o técnicas, sino también de principios que lleven a desarrollar un reflejo, un hábito, un instinto de observación que te evite caer en las trampas de los estafadores. Analizaremos juntos, su modus operandi, tanto dentro de la Blockchain, como así también fuera y por supuesto comprendernos a nosotros mismos como usuarios lo que nos ayudará a cerrar las brechas que nos dejan expuestos.</FONT></FONT></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%"> <FONT FACE="Times New Roman, serif"><FONT SIZE=3><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">La descentralización y el anonimato son unas de las maravillas del mundo cripto, pero a su vez, para una víctima de fraude estas pueden ser su peor pesadilla. La prevención, es un arma sumamente poderosa, por eso, es una parte sustancial de la Academy Scan DeFi.</FONT></FONT></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.19in; margin-bottom: 0.19in; line-height: 100%"> <FONT FACE="Times New Roman, serif"><FONT SIZE=3><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt">No cerraremos la puerta aquí, hay más novedades que aportarán diferentes expertos para que este recorrido por el campus Academy sea de lo más enriquecedor.</FONT></FONT></FONT></FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1, // 1, 0
        'preview' => '1-1_que-es-la-academia-scandefi.mp3', // video -> ID_YOUTUBE, audio -> '/storage/lessons/'.$lesson1_>_d.'/audio/nombre-del-audio.mp3'
        'duration' => 1, // este campo se define en minutos
      ]);

      $lesson2_1_1 = Lesson::create([
        'unit_id' => $unit1_1->id,
        'type' => 'audio',
        'title' => '¿Por que creamos la Academy SCAN?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;900000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } --> </STYLE> </HEAD> <BODY LANG="es-ES" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>¿Por qué creamos la ACADEMY SCAN?</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Porque entendemos lo que se siente, porque entendemos la angustia que genera, porque entendemos que las estafas del mundo blockchain, nos perjudica a todos directa o indirectamente, debido a que crea desconfianza y retrasa la adopción masiva de las criptomonedas. Es por esto que en Scan DeFi decidimos esforzarnos y sumar este grano de arena a la lucha que llamamos Academy.</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Queremos ayudar y cuidar al prójimo, al principiante, al avanzado, al obrero que desea generar ingresos, a la empresa que opta por tener sus reservas de valores en criptos, al emprendedor que lucha para prosperar, al ciudadano que ve desaparecer sus ahorros frente a la inflación, a todos. Entendemos del esfuerzo de años de trabajo, de privarse de gustos para ahorrar e invertir y no es justo que algún malintencionado venga a arrasar con todo el patrimonio.</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Sabemos que no abarcaremos el cien por ciento las modalidades de estafas, pero una cosa estamos seguros, lo intentaremos y nos actualizaremos. Sabemos también que podemos tener errores y que al trabajo no lo podremos hacer solos, es por eso que esta Academy es colaborativa, descentralizada. Están todos invitados a colaborar y aportar lo que se descubra, que nos cuenten los que les pasó y que como comunidad nos cubramos las espaldas.&nbsp;</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">¡Bienvenidos, las puertas están abiertas!</FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '1-2_por-que-creamos-la-academia-scandefi.mp3',
        'duration' => 1,
      ]);

      $lesson3_1_1 = Lesson::create([
        'unit_id' => $unit1_1->id,
        'type' => 'audio',
        'title' => 'Orden sugerido de temas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Orden Sugerido de Temas</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Esta secci&oacute;n es una gu&iacute;a u orden sugerido de los temas de la Academy Scan DeFi con orientaci&oacute;n a los temas de las estafas. &nbsp;La secuencia que aqu&iacute; se propone es funcional a la construcci&oacute;n de conceptos que nos permitir&aacute; asimilarlos de un modo progresivo. &iexcl;Por supuesto que est&aacute; totalmente permitido el estudio de los temas en el orden que prefieras!</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&ldquo;El Listado&rdquo; de temas es un esquema de los diferentes apartados que abordaremos. Cada tema estar&aacute; compuesto por subtemas, es decir, el tema tratar&aacute; la base del concepto, el fundamento, mientras que los subtemas, ser&aacute;n m&aacute;s org&aacute;nicos, agreg&aacute;ndose conforme transcurra el tiempo, siempre de la mano de los acontecimientos emergentes que requieran atenci&oacute;n.&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Los estafadores se perfeccionan y trabajan en todo tiempo, e incluso, me animo a asegurar que alguno vendr&aacute; a ver de qu&eacute; se trata esta academia. Mientras tanto, nosotros como contramedida, iremos brindando todo lo que est&eacute; a nuestro alcance para exponer sus modus operandi y brindar el mejor contenido para todos aquellos que entiendan que la prevenci&oacute;n por medio de la capacitaci&oacute;n es donde se forjan las herramientas para hacer frente a estas t&eacute;cnicas de enga&ntilde;o.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">A continuaci&oacute;n, te mostraremos los temas tratados en la Academy Scan DeFi orientado a estafas, junto a un peque&ntilde;o resumen de lo que se tratar&aacute;. No desesperes, es solo un listado, a medida que avances ir&aacute;s conociendo todos los t&eacute;rminos y todos los temas.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El Listado</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 1</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Introducci&oacute;n a la Academy Scan DeFi</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Qu&eacute; es la Academy Scan DeFi?</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Porque creamos la ACADEMY SCAN?</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Orden sugerido de temas</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 2</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Que es una estafa</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Aprende todo sobre la bicicleta</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Mi propia peque&ntilde;a historia de terror</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La estafa es&hellip;</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El ciervo y el cocodrilo</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 3</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El ABCD de las estafas</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Introducci&oacute;n</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La &ldquo;A&rdquo;, es de Acci&oacute;n inmediata. Apurate!</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La &ldquo;B&rdquo; de beneficio, regalo inesperado, oportunidad &uacute;nica</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La &ldquo;C&rdquo; de contempor&aacute;neo o actual</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La &ldquo;D&rdquo; de drama, tragedia, peligro</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 4</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Pensar que pensamos</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Apuntan a ti</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Cuestionario de riesgo de estafas</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Mis sesgos cognitivos</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Resumen y recomendaciones</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 5</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tipos de estafas</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Hagamos un experimento</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El titular del diario</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Las categor&iacute;as SCAN DeFi de las estafas</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 6</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Estafas en el mundo Fiat</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La importancia de conocer las estafas del mundo Fiat</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Firme como patada de Le&oacute;nidas</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Qu&eacute; es una estafa Bancaria?</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Pescando en la pecera, las redes sociales</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iexcl;Me confund&iacute; en la Compra Online!</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La estafa de los pl&aacute;sticos, las tarjetas</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">SIM Swapping, el robo de la l&iacute;nea</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 7</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Estafas sat&eacute;lites a la Blockchain</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Introducci&oacute;n</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Qu&eacute; es la ingenier&iacute;a social?</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Ataques de Ingenier&iacute;a Social</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El Phishing</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Caso de estudio de Phishing: Dominios espejos, robo de billeteras cripto</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El Smishing, me contactaron en Telegram.</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Caso de Estudio de Smishing: Contacto v&iacute;a Telegram</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 8</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Estafas en la Blockchain</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Estafas de Preventa</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Y el monumento a la estafa de preventa es&hellip;</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Estafas de Preventas en la BSC, se&ntilde;ales</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Cuando el Pumpeo se convierte en estafa</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Que es t&eacute;cnicamente el pump and dump</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Estafa del pump</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Testimonio de v&iacute;ctima de estafa de pumpeo</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La explicaci&oacute;n de lo que sucede</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Como detectar una estafa de pumpeo</span></p> <p dir="ltr" style="line-height:1.295;margin-left: 36pt;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La modalidad de estafa del grupo VIP del pumpeo</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tema 9</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Prevenci&oacute;n de Estafas y recomendaciones</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Reglas de oro para la protecci&oacute;n de datos y patrimonio</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Errores comunes en DeFi - Resumen</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Recomendaciones</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Confecci&oacute;n y almacenamiento de la frase semilla.</span></p> <p dir="ltr" style="line-height:1.295;text-indent: 36pt;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Solucionar problemas comunes de la frase semilla</span></p>',
        'opened' => 1,
        'preview' => '1-3_orden-sugerido-de-temas.mp3',
        'duration' => 1,
      ]);

      $unit2_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => '¿Que es una estafa?',
        'subtitle' => 'Primeros pasos dentro del mundo de la estafa',
        'description' => 'En la segunda unidad veremos las bases de lo que es una estafa, además de un caso real de una de estas.',
      ]);

      $lesson1_2_1 = Lesson::create([
        'unit_id' => $unit2_1->id,
        'type' => 'audio',
        'title' => 'Aprender todo sobre la bicicleta',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;2400000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } --> </STYLE> </HEAD> <BODY LANG="es-ES" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>Aprender todo sobre la bicicleta</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">¡Qué importante es que estés aquí! Que importante es comprender que, si uno quiere tener éxito en el mundo las criptomonedas, debe, no solo aprender sobre el trading, estudiar proyectos y obtener ganancias, sino que también uno debe aprender cómo operan las estafas y tener una estrategia para evitarlas, sino, todo lo anterior, puede llegar a ser en vano. Es como cuando se aprende a andar en bicicleta, uno aprende con ayuda, se cae, se levanta, aprende a doblar, aprende a frenar, a hacer acrobacias y si no aprende sobre la importancia de ponerle candado a la bici y a no dejarla en cualquier lado, puede llegar a ser en vano todo lo que se aprende sobre ciclismo. Mediante lenguaje claro y entendible intentaremos construir juntos los conceptos más importantes sobre las estafas para tu día a día. Arranquemos con una historia.</FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '2-1_el-mundo-de-la-estafa.mp3',
        'duration' => 1,
      ]);

      $lesson2_2_1 = Lesson::create([
        'unit_id' => $unit2_1->id,
        'type' => 'audio',
        'title' => 'Mi propia pequeña historia de terror',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;3100000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } --> </STYLE> </HEAD> <BODY LANG="es-ES" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>Mi propia pequeña historia de terror</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Aturdido, frustrado y vergüenza, esas son las sensaciones que mejor describe cómo me sentí aquella tarde cuando por fin fui consciente de la estafa en la que había caído. Fue hace bastantes años, sin embargo, lo recuerdo, no con muchos detalles, pero si lo que sentí en ese momento. Me encontraba viendo una vidriera de un local de computación, solamente miraba lo que estaba del otro lado del vidrio, enterándome de lo último que había en el mercado, ya que, en esa época, como estudiante universitario, vivía con lo justo, así que “solo estaba mirando”. De repente, un señor, no muy mayor, se me acerca y me dice: ¿Como estas? ¿Seguís en la universidad? Intenté recordar quien era, y pensé, quizás fue compañero en alguna materia, la verdad es que no lo identifiqué. Pero por cortesía, le respondí con un hola, ¿cómo estás? Antes de que terminara de responderle, se me adelanta y me dice …yo dejé la universidad porque tengo que sostener económicamente a mi familia, tengo dos hijos y ahora trabajo para una empresa que vendemos productos importados, justamente recién le entregamos a este comercio, y me quedó este reloj que no quisieron porque le es muy caro. Pero mira, te lo voy a dejar en precio de costo, te hago un favor, y de paso, no vuelvo a la empresa con el reloj. La verdad que el reloj se veía fantástico, y el precio rondaba los u$ 25. Nunca lo compraría, pero sin querer, deje que desarrollara todo su relato el cual hizo durante unos minutos sin parar, finalmente terminé comprándoselo. Al instante sentí como si me hubieran sacado el dinero directamente de mi bolsillo y sin permiso. Me quedé con un reloj que no necesitaba mientras el señor se marchaba caminando con mí dinero. Peor fue mi asombro, cuando comentándole a mis amigos lo sucedido, se percataron de que el reloj, no superaba el costo de u$ 5 en cualquier shop de baratijas.</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Uno quisiera que no le pasaran nunca estas cosas ¿no?, o como en mi caso, que solo me pasara una vez y aprendiera la lección. Podríamos pensar, bueno, para la próxima ya sé, si me ofrecen un reloj, salgo corriendo sin mediar palabras. Lamentablemente no es tan simple, porque la estafa va mutando, se va camuflando, la estafa se va adaptando y profesionalizando. Pero atentos, con lo que desarrollaremos en estos apartados, nuestra finalidad es alertar y no aterrar. Nunca será la intención generar pánico o fobia, naturalmente uno adopta posturas extremas después de que nos sucede un hecho de estafa. En mi caso, no pude ver más el reloj, lo terminé canjeando por unos tiques de almuerzo con un compañero, pero esta vez sí por su valor real del reloj, e incluso decidí por un tiempo no transitar más por ese sector de la ciudad. Claro que fue absurda la decisión, porque si pensamos en las estadísticas, la probabilidad de volver a encontrarme con ese señor en ese mismo lugar, es cero. Y seguramente, que, si el hombre llegara a divisarme a la distancia, obviamente se escondería.</FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '2-2_mi-propia-historia-de-terror.mp3',
        'duration' => 3,
      ]);

      $lesson3_2_1 = Lesson::create([
        'unit_id' => $unit2_1->id,
        'type' => 'audio',
        'title' => 'La estafa es…',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;3400000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } A:link { color: #0000ff; so-language: zxx } --> </STYLE> </HEAD> <BODY LANG="es-ES" LINK="#0000ff" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>La estafa es…</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Los lectores de esta academia serán de diferentes países, por esto, será oportuno mencionar, que el tratamiento que daremos al tema será didáctico, conceptual y no abordaremos a la estafa con tecnicismos jurídicos. La intención es que se entienda, se asimile y se actúe. Dicho esto, vamos al tema.</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0in; line-height: 100%"> <FONT COLOR="#000000">&nbsp;</FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">La estafa o fraude, es el engaño de una persona a otra, con ánimo de lucro, induciéndola a realizar un acto de disposición en </FONT></FONT><A HREF="https://www.conceptosjuridicos.com/perjuicio/"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><U>perjuicio</U></FONT></FONT></A><FONT COLOR="#000000"><FONT FACE="Calibri, serif"> propio o ajeno. En otras palabras, es una puesta en escena o teatralización de una persona, para hacerle creer a su víctima (a través de la manipulación mental) algo que no existe, o no es tal cosa, con el fin de que entregue su dinero a cambio de esa promesa vacía. La estafa, se construye, se planea y se piensa con anterioridad, se puede improvisar, pero con guiones establecidos. Puede tener una etapa de selección de víctima, o puede ser masivo o al azar. Esto último, se vio favorecido con el aumento del uso de tecnología en todas las esferas y ciencias. Y también no podía quedar afuera, el uso de la tecnología para las estafas. Consiguiendo tristemente hacer el engaño a gran escala. Enviar diez mil correos fraudulentos con la esperanza de que al menos diez personas faciliten los datos reales de su tarjeta de crédito ya les resulta rentable. O pueden enviar millones de Airdops de un Token de un contrato fraudulento, sabiendo que siempre hay personas inadvertidas que quieren obtener ese premio fantástico y lo que en realidad se convertirán es en víctimas de robo.</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">El objetivo del abordaje de estos temas es que conozcas las estafas, su esencia y detectarla en cualquiera de sus formas. Porque de nada nos serviría saber que pueden estafarnos en la calle con relojes baratos, si en la próxima cuadra nos ofrecen un celular y ya no sabríamos interpretar la situación. Suena evidente, pero en el mundo de la tecnología, suele ser más dificultoso advertir la puesta en escena, la teatralización digital, debido a que se pueden hacer copias exactas de una entidad web original de confianza.</FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '2-3_la-estafa-es.mp3',
        'duration' => 2,
      ]);

      $lesson4_2_1 = Lesson::create([
        'unit_id' => $unit2_1->id,
        'type' => 'audio',
        'title' => 'El ciervo y el cocodrilo',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;4200000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } A:link { color: #0000ff; so-language: zxx } --> </STYLE> </HEAD> <BODY LANG="es-ES" LINK="#0000ff" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>El ciervo y el cocodrilo</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Hace un tiempo, se volvió viral en las redes sociales, un curioso video, donde se muestra un ciervo bebe, escapando de las fauces de un cocodrilo gigante de 3 metros de largo. Por el movimiento sigiloso y estado de alerta del siervo, no sabría decir, si se percató o no de que estaba el reptil bajo el agua, no obstante, sus reflejos permitieron que siguiera con vida. Nuestra tendencia de solidarizarnos con el más débil y fantasear con la idea de que el pequeño venció al gigante, contribuyó a la viralización del video. Pero…el mundo salvaje, a diario es en realidad muy cruel, la cadena alimenticia consiste en carnívoros cazando a otros animales, es el modo de supervivencia, por consiguiente, el video, es la excepción a esta regla. Observemos lo siguiente, el cocodrilo sabe de las necesidades de los ciervos, saben que tienen sed y que acudirán a lagos o arroyos para saciarse. Y por eso el reptil espera allí, no lo hace junto al camino, lo hace junto al agua, sabe que allí tendrá más oportunidades. Se apoya en el engaño, en simular que no está, o que no va a pasar nada. El siervo por su parte, se conduce desprevenido o con exceso de confianza, incluso viendo al cocodrilo se acerca demasiado, pues la sed es más fuerte. El mundo de las estafas, es similar, tramposos acechando las comunidades virtuales y merodeando donde está su dinero. “Los malos estudiando a los buenos para hacerles daño” ese es el axioma, saber que los mueve hacia su necesidad, con qué estímulo estarán más distraídos y vulnerables. Buscan estrategias para maximizar sus resultados, observando características externas que les den alguna pista de cómo abordar a su víctima, tal como el estafador de relojes que entabló un diálogo conmigo suponiendo que estaría hablando con un estudiante guiándose por la mochila, los lentes, el interés por las computadoras y quizás mi apariencia de comer solo arroz.</FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif">Acompáñame a ver el próximo tema, &lt;&lt;el ABCD de las estafas&gt;&gt; y aprendamos a detectar cocodrilos, incluso si están camuflados con lodo o bajo el agua.</FONT></FONT></P> <div class="tenor-gif-embed" data-postid="17599254" data-share-method="host" data-aspect-ratio="1.77778" data-width="100%"><a href="https://tenor.com/view/reflex-evade-dodge-gif-17599254">Reflex Evade GIF</a>from <a href="https://tenor.com/search/reflex-gifs">Reflex GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '2-4_el-ciervo-y-el-cocodrilo.mp3',
        'duration' => 2,
      ]);

      $unit3_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'El ABCD de las estafas',
        'subtitle' => 'Aprende las bases de cualquier estafa',
        'description' => 'En esta tercer unidad aprenderemos los pilares fundamentales para detectar cualquier tipo de estafa rápidamente.',
      ]);

      $lesson1_3_1 = Lesson::create([
        'unit_id' => $unit3_1->id,
        'type' => 'audio',
        'title' => 'Introduccion',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;5000000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } A:link { color: #0000ff; so-language: zxx } --> </STYLE> </HEAD> <BODY LANG="es-ES" LINK="#0000ff" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.17in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>Introducción</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3>Hay un dicho en mí país, que reza algo así como: si tiene cuatro patas, mueve la cola y ladra, ¡es un perro!</FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3>Algo similar podría decirse de las estafas. Debido a que hay elementos que son comunes a todas, si es una oferta increíble, si te ganaste algo sin participar en nada y si te apuran a actuar con urgencia, es una estafa. En este apartado, analizaremos estas “características” de los elementos persuasivos que nos indicará ante qué nos encontramos.</FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3>Los acrósticos, son usados para memorizar conceptos, y como nos es importante que lo puedas tener presente en todo momento a los elementos persuasivos que utilizan para estafarnos, es por esta razón que vamos a apoyarnos en este recurso didáctico. Lo denominaremos el ABCD de la estafa.</FONT></FONT></FONT></P> <TABLE WIDTH=4369 CELLPADDING=7 CELLSPACING=0> <COL WIDTH=499> <COL WIDTH=3840> <TR VALIGN=BOTTOM> <TD WIDTH=499 HEIGHT=19 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>A</B></FONT></FONT></FONT></P> </TD> <TD WIDTH=3840 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">cción Inmediata.</FONT></FONT></P> </TD> </TR> <TR VALIGN=BOTTOM> <TD WIDTH=499 HEIGHT=20 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>B</B></FONT></FONT></FONT></P> </TD> <TD WIDTH=3840 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">eneficio, regalo.</FONT></FONT></P> </TD> </TR> <TR VALIGN=BOTTOM> <TD WIDTH=499 HEIGHT=37 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>C</B></FONT></FONT></FONT></P> </TD> <TD WIDTH=3840 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">ontemporaneo, actualidad.</FONT></FONT></P> </TD> </TR> <TR VALIGN=BOTTOM> <TD WIDTH=499 HEIGHT=19 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>D</B></FONT></FONT></FONT></P> </TD> <TD WIDTH=3840 STYLE="border: 1.00pt solid #000001; padding: 0.07in"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in"><FONT COLOR="#000000"><FONT FACE="Calibri, serif">rama, peligro.</FONT></FONT></P> </TD> </TR> </TABLE> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000">&nbsp;<FONT FACE="Calibri, serif"><FONT SIZE=3>Comencemos con la primera letra.</FONT></FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '3-1_el-abcd-de-las-estafas.mp3',
        'duration' => 1,
      ]);

      $lesson2_3_1 = Lesson::create([
        'unit_id' => $unit3_1->id,
        'type' => 'audio',
        'title' => 'La “A”, es de Acción inmediata. Apurate!',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <HTML> <HEAD> <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"> <TITLE></TITLE> <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)"> <META NAME="AUTHOR" CONTENT="Author"> <META NAME="CREATED" CONTENT="20211109;235400000000000"> <META NAME="CHANGEDBY" CONTENT="Author"> <META NAME="CHANGED" CONTENT="20211110;5300000000000"> <META NAME="AppVersion" CONTENT="16.0000"> <META NAME="DocSecurity" CONTENT="0"> <META NAME="HyperlinksChanged" CONTENT="false"> <META NAME="LinksUpToDate" CONTENT="false"> <META NAME="ScaleCrop" CONTENT="false"> <META NAME="ShareDoc" CONTENT="false"> <STYLE TYPE="text/css"> <!-- @page { margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.98in; margin-bottom: 0.98in } P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 } A:link { color: #0000ff; so-language: zxx } --> </STYLE> </HEAD> <BODY LANG="es-ES" LINK="#0000ff" DIR="LTR"> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3><B>La “A”, es de Acción inmediata. ¡Apurate!</B></FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3>Este ingrediente de la estafa busca sacarnos de nuestro eje, nos lleva al plano de actuar bajo presión, perdemos de vista los costos de nuestras acciones y nos movemos sobre terreno inseguro. Los estafadores saben esto, entonces nos instan a actuar influenciados por la preocupación de la urgencia. Nos pueden apurar, empujándonos a que corramos porque los tiempos se agotan, o mencionan que el producto es el último que le queda, pueden ser estímulos positivos como el entusiasmo, la codicia, a través de un beneficio, un regalo, un premio, un descuento o también a través de estímulos negativos apelando al peligro, tales como por ejemplo la suspensión de la cuenta, el bloqueo, un cargo, la perdida de dinero. El bolsillo, es una zona sensible del ser humano, vamos a reconocerlo, por eso reaccionamos de modo urgente y consiguen apurarnos con sus estrategias. Todos tenemos algún compromiso, deuda, servicio, que puede ser usado para captar nuestra atención ante el peligro de su pérdida, o quizás nos atraer con la ambición de querer ser los primeros, los únicos, los exclusivos privilegiados en recibir algún beneficio.</FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3>Para estar bien parados frente a este elemento “A” la acción inmediata, del apuro de la estafa es entender como dice un proverbio de sabiduría milenaria que “las muchas prisas provocan errores”, para ello, es necesario parar, y ello es esperar, pausar, básicamente no hacer nada durante uno o dos minutos, respirar profundo y dudar si es necesario. Si notamos al ser apurados un cierto nerviosismo incómodo hay que esperar y darle tiempo a la razón para que tome nuevamente el control, ya que la razón es más lenta que la emoción. Si reaccionamos urgente y visceralmente desde nuestras emociones más profundas, es muy probable que hagamos algo que no queremos y tengamos una sensación de arrepentimiento cuando la razón tome nuevamente el timón. Es por eso, que la espera, sin realizar nada, simplemente una pausa, sin una toma de decisión, nos permita que poco a poco razonemos más sobre la situación que enfrentamos.</FONT></FONT></FONT></P> <P ALIGN=JUSTIFY STYLE="margin-top: 0.17in; margin-bottom: 0.32in; line-height: 100%"> <FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=3>La segunda letra es…</FONT></FONT></FONT></P> <P STYLE="margin-bottom: 0.11in"><BR><BR> </P> </BODY> </HTML>',
        'opened' => 1,
        'preview' => '3-2_la-a-es-de-accion-inmediata.mp3',
        'duration' => 2,
      ]);

      $lesson3_3_1 = Lesson::create([
        'unit_id' => $unit3_1->id,
        'type' => 'audio',
        'title' => 'La “B” de beneficio, regalo inesperado, oportunidad única',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p style="margin-top:12.0pt;margin-right:0cm;margin-bottom:23.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;"><span style="font-size:16px;color:black;">&nbsp;<strong>La &ldquo;B&rdquo; de beneficio, regalo inesperado, oportunidad &uacute;nica, que son fant&aacute;sticas.</strong></span></p> <p style="margin-top:12.0pt;margin-right:0cm;margin-bottom:23.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;"><span style="font-size:16px;color:black;">Si lo pensamos bien, lo que nos ofrecen no tendr&iacute;a l&oacute;gica alguna. Un dicho dice: Si te dan algo gratis y es demasiado bueno para ser verdad, es porque es demasiado bueno para ser verdad. Pregunt&eacute;monos esto, si alg&uacute;n empresario o agencia de marketing dar&iacute;a semejante recompensa, &iquest;no terminar&iacute;a yendo a la quiebra? &iquest;Tengo alg&uacute;n tipo de v&iacute;nculo con ellos? &nbsp;&iquest;Me anot&eacute; en alg&uacute;n sorteo como para ser tan afortunado? &iquest;Qu&eacute; me est&aacute; pidiendo a cambio? Un cl&aacute;sico de las estafas mediante el ofrecimiento de regalos grandiosos, es que nos solicitan para hacernos acreedores del trofeo, una peque&ntilde;a suma de dinero para supuestos &ldquo;gastos administrativos&rdquo;, siendo estos, los &uacute;nicos movimientos que terminaremos viendo de nuestros balances. As&iacute; sea bien peque&ntilde;o el monto que te soliciten, en la escala, el robo hormiga le resulta muy redituable al estafador. Tengamos presente, el hacernos preguntas coherentes que podr&aacute;n ayudarnos a encuadrar lo que est&aacute; sucediendo e identificar si nos est&aacute;n queriendo enga&ntilde;ar. Buscan lograr, que nos distraigamos fantaseando con lo que vamos a hacer con el regalo, donde lo colocaremos y c&oacute;mo reaccionaran nuestros conocidos cuando lo presumamos. Si entramos en ese di&aacute;logo interno, nos pasar&aacute; un cocodrilo frente a nuestras narices, y no lo vamos a ver. La premisa para cuidarnos de este elemento persuasivo es entender que, nadie regala nada y menos a desconocidos.</span></p> <p style="margin-top:12.0pt;margin-right:0cm;margin-bottom:23.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:Calibri,sans-serif;text-align:justify;"><span style="font-size:16px;color:black;">La tercera letra es..</span></p>',
        'opened' => 1,
        'preview' => '3-3_la-b-de-beneficio.mp3',
        'duration' => 1,
      ]);

      $lesson4_3_1 = Lesson::create([
        'unit_id' => $unit3_1->id,
        'type' => 'audio',
        'title' => 'La “C” de contemporáneo o actual',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.38;text-align: justify;margin-top:12pt;margin-bottom:23pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La &ldquo;C&rdquo; de contempor&aacute;neo o actual</span><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">.</span></p> <p dir="ltr" style="line-height:1.38;text-align: justify;margin-top:12pt;margin-bottom:23pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Los estafadores se apoyan en eventos ciertos, en noticias o sucesos que son de p&uacute;blico conocimiento y de los m&aacute;s resonantes. Se har&aacute;n pasar por una entidad de nuestra confianza; tales como, empleados de banco, gobierno, agentes de salud, empresa de telefon&iacute;a y se comunicar&aacute;n con nosotros para intentar extraernos informaci&oacute;n valiosa o solicitarnos alg&uacute;n tipo de acci&oacute;n que involuntariamente nos perjudique. Utilizar&aacute;n para ello alguna noticia actual, por ejemplo, anuncios de bonos del gobierno, empresas, sistemas de salud. Todas situaciones que pueden ser reales y explotadas por los delincuentes. Cualquier excusa puede ser usada, basta mirar cualquier portal de noticias que siempre veremos un elemento que sea de inter&eacute;s para la gran mayor&iacute;a de la poblaci&oacute;n, pueden apoyarse en noticias globales, nacionales e incluso locales. Todo puede ser usado como pretexto para bajar nuestra barrera de precauci&oacute;n o suspicacia, porque la tem&aacute;tica nos ser&aacute; familiar, o quiz&aacute;s la escuchamos al pasar. Ya con eso ser&aacute; suficiente para captar nuestra atenci&oacute;n y mantener activo el anzuelo de la comunicaci&oacute;n. La premisa para esto, es que: &ldquo;lo que el r&iacute;o trae, el r&iacute;o se lo lleva&rdquo;. Esto quiere decir, que, si nos abordan con una noticia, podemos corroborar en el mismo medio que lo vimos. Y como venimos recomendando,&nbsp;</span><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">hacer una pausa y chequear en Internet ingresando en alg&uacute;n buscador lo que nos dicen y agregar la palabra estafa, o queja, y as&iacute; chequear si hay antecedentes al respecto</span><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">. Adem&aacute;s, consultar con nuestros contactos de confianza que tengan conocimiento sobre la materia. Debemos ser firmes y poder detener al interlocutor para que podamos hacer nuestras propias averiguaciones. Si el contacto es genuino de una entidad verdadera, sabr&aacute; esperar, si no lo es, aprovechar&aacute; la oportunidad para no volver a contactarse.</span></p> <p dir="ltr" style="line-height:1.38;text-align: justify;margin-top:12pt;margin-bottom:23pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Por &uacute;ltimo, el condimento que suele estar presente en una estafa, es el representado por &hellip;</span></p>',
        'opened' => 1,
        'preview' => '3-4_la-c-de-contemporaneo.mp3',
        'duration' => 2,
      ]);

      $lesson5_3_1 = Lesson::create([
        'unit_id' => $unit3_1->id,
        'type' => 'audio',
        'title' => 'La “D” de drama, tragedia, peligro',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.38;text-align: justify;margin-top:12pt;margin-bottom:23pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La &ldquo;D&rdquo; el drama, la tragedia o el peligro</span><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">.</span></p> <p dir="ltr" style="line-height:1.38;text-align: justify;margin-top:12pt;margin-bottom:23pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iexcl;Vaya que nos mueve las emociones esto! Nos bloquea la raz&oacute;n si nos notifica una autoridad para nosotros como puede ser la polic&iacute;a, un m&eacute;dico o un agente de bancario, o cualquier otra entidad reconocida que identifiquemos avis&aacute;ndonos que est&aacute; en peligro nuestro dinero, nuestra suscripci&oacute;n, nuestra informaci&oacute;n personal, nuestras fotos u otras pertenencias. O la otra t&aacute;ctica, se apoyan en que todos fuimos educados para ser amables y ayudar ante la necesidad, entonces, suelen utilizar cierta narrativa sobre alg&uacute;n ser querido que puede estar sufriendo un drama, una tragedia o accidente. Sospechar&iacute;amos si un extra&ntilde;o nos solicita dinero, pero si es alg&uacute;n amigo o familiar actuamos diferente. Entonces combinado este dramatismo con el apurarnos de la letra &ldquo;A&rdquo; del acr&oacute;stico puede ser una combinaci&oacute;n altamente letal. En muchas oportunidades escuch&eacute; a v&iacute;ctimas de estafas con indignaci&oacute;n y al mismo tiempo verg&uuml;enza, se reprochaban porque no se dieron cuenta, si sintieron que algo andaba mal y como que se olvid&oacute; de los consejos racionales que hab&iacute;a o&iacute;do anteriormente. Es entendible que una persona que ve a otra en una situaci&oacute;n de vulnerabilidad, y m&aacute;s si es conocida, acuda a socorrerla, porque es una reacci&oacute;n prosocial, actuar para impedir una situaci&oacute;n peor. Lo raro ser&iacute;a no reaccionar. Pero en esta oportunidad, la premisa para sortear el enga&ntilde;o que apela a explotar nuestra buena voluntad es: &ldquo;Ir a la fuente&rdquo;, esto es, contactar a la persona que supuestamente est&aacute; en peligro y sobre todo a su entorno, ya que mayormente el mecanismo de la estafa es una suplantaci&oacute;n de identidad. Se puede corroborar la identidad de una persona conocida con algo tan simple como solicitar un mensaje de audio o una video llamada. En el caso de entidades oficiales que puedan estar invocadas se puede llamar y solicitar informaci&oacute;n. Como en las recomendaciones anteriores, buscar en Internet si es as&iacute; como me han dicho que opera esa entidad, por ejemplo, la empresa bancaria que nos notifica de la suspensi&oacute;n de nuestra cuenta, o el gasto excesivo de nuestra tarjeta.</span></p> <p dir="ltr" style="line-height:1.38;text-align: justify;margin-top:12pt;margin-bottom:23pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Finalmente, conocer la estrategia con la que operan los estafadores es fundamental en estos casos y planear de antemano c&oacute;mo vamos a reaccionar ante estas diferentes situaciones nos ahorrar&aacute; dolores de cabeza. Esto no es construir un diagrama sofisticado de posibles decisiones, sino, simplemente estar preparados, leer al respecto, conocer y hacer peque&ntilde;as reflexiones ya que el momento que nos sucede, muchas veces no hacemos tiempo o la habilidad del estafador nos manipula para que no pensemos. Tengamos presente este ABCD de la estafa y no nos olvidemos que, si tiene cuatro patas, mueve la cola y ladra, es un perro. &nbsp;</span></p>',
        'opened' => 1,
        'preview' => '3-5_la-d-de-drama.mp3',
        'duration' => 2,
      ]);

      $unit4_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'Pensar que pensamos',
        'subtitle' => 'Piensa antes de responder ante una posible estafa',
        'description' => 'En el tema 4 se aborda las estafas desde el punto de vista de la víctima de la estafa y se dan recomendaciones para evitarlas.',
      ]);

      $lesson1_4_1 = Lesson::create([
        'unit_id' => $unit4_1->id,
        'type' => 'audio',
        'title' => 'Apuntan a ti',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Apuntan a ti</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">A diferencia del mundo Fiat, aqu&iacute; en el mundo Cripto, la totalidad de la responsabilidad recae sobre el usuario.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Es decir, No existe entidad a la cual acudir e ir a golpear la puerta o insistir para revertir alguna transacci&oacute;n o desconocer alg&uacute;n gasto para que el seguro lo cubra. De la mano con todos los beneficios de la blockchain, como la eliminaci&oacute;n de intermediarios, vienen estos deberes de autogesti&oacute;n en el cual, se requiere prestar m&aacute;s atenci&oacute;n. Siendo el respaldo de esta tecnolog&iacute;a, los algoritmos matem&aacute;ticos que corren por detr&aacute;s y que hacen fiable al sistema, por consiguiente, toda la ingenier&iacute;a social de los estafadores apunta entonces a la vulnerabilidad PEBKAC que son las siglas en ingl&eacute;s de &ldquo;Problem Exists Between Keyboard And Chair&rdquo; que ser&iacute;a algo as&iacute; como, que el problema existe entre teclado y la silla. Es una humorada que utilizan los inform&aacute;ticos para referirse a los usuarios en general. Causante de la mayor&iacute;a de vulnerabilidades de los sistemas.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;As&iacute; es, todos los ca&ntilde;ones est&aacute;n apuntando a los usuarios. Intentar&aacute;n quebrar su equilibrio emocional, sacudir&aacute;n las necesidades b&aacute;sicas y los deseos del ser humano. Es importante hacer una aclaraci&oacute;n antes de proseguir con el tema: en este an&aacute;lisis no se busca culpabilizar a la v&iacute;ctima, solo advertir y acompa&ntilde;ar a la reflexi&oacute;n sobre los factores de riesgo.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La pel&iacute;cula &ldquo;El mago de las mentiras&rdquo; protagonizada por Robert De Niro y Michelle Pfeiffer cuenta la historia real de Bernie Madoff, un inversionista burs&aacute;til estadounidense, asesor de inversiones y financiero. Fue el creador del esquema Ponzi m&aacute;s grande de la historia. No solo estaf&oacute; a personas comunes, sino tambi&eacute;n a gente muy inteligente y poderosa del mundo de las finanzas. &iquest;C&oacute;mo lo logr&oacute;?, &iquest;Por qu&eacute; pudo actuar con tanta impunidad a escalas asombrosas? No haremos spoiler aqu&iacute;, as&iacute; que queda como desaf&iacute;o ver la pel&iacute;cula.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tampoco en este apartado nos centraremos en los estafadores ni en su personalidad, si encuadran en la categor&iacute;a de psic&oacute;patas o diagn&oacute;sticos similares que encontramos en el estereotipo del delincuente, hay bastante material de estudio al respecto. En cambio, nos centraremos en analizarnos a nosotros mismos, como usuarios/clientes/consumidores, que estamos del otro lado del teclado. Nos interesa en Academy Scan DeFi que podamos blindarnos y protegernos de las estafas y qu&eacute; mejor manera que conociendo el modus operandi para intentar vulnerarnos como le&iacute;mos en el apartado del &lt;&lt;ABCD de las estafas&gt;&gt;, a esto sumaremos la reflexi&oacute;n sobre si en nuestra conducta contamos con factores de riesgo. Buscaremos reforzar conceptos para crear actos reflejos anti estafas ya que las necesitaremos para coexistir con estas, ya que siempre existieron, existen y por supuesto, seguir&aacute;n existiendo.</span></p>',
        'opened' => 1,
        'preview' => '4-1_pensar-que-pensamos.mp3',
        'duration' => 3,
      ]);

      $lesson2_4_1 = Lesson::create([
        'unit_id' => $unit4_1->id,
        'type' => 'audio',
        'title' => 'Cuestionario de riesgo de estafas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Cuestionario de riesgo de estafas</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Te invito a completar el pr&oacute;ximo cuestionario, fue confeccionado por la Lic. en Psicolog&iacute;a que colabora con la Academia. Es un cuestionario tentativo para acercarte a lo que ser&iacute;an las caracter&iacute;sticas generales de una persona propensa a estafas. Al finalizarlo, el sistema nos arrojar&aacute; un porcentaje de riesgo de estafa, donde un porcentaje mayor indicar&aacute; mayor riesgo. No obstante, es importante se&ntilde;alar, de que, las personas no solemos ser lo suficientemente fidedignas a la auto observancia en los cuestionarios ya que tenemos la tendencia a responder lo razonablemente correcto ante lo que realmente inconscientemente har&iacute;amos en las situaciones de los ejemplos. Para ayudar a esto, la misma ser&aacute; por tiempo. Aseg&uacute;rate de estar listo para clickear COMENZAR ya que no est&aacute; disponible la opci&oacute;n de pausa.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El link del formulario</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><a href="https://forms.gle/cx1RgZzxSPiLZzer8" style="text-decoration:none;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#1155cc;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">https://forms.gle/cx1RgZzxSPiLZzer8</span></a></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tu porcentaje fue de:</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Es importante notar, que por m&aacute;s bajo que sea tu resultado, nadie es inmune a la estafa. El riesgo de estafa se compone de dos resultados. Por un lado, est&aacute; nuestro porcentaje estimativo del cuestionario, por el otro, est&aacute; el porcentaje de habilidad del estafador el cual desconocemos de su preparaci&oacute;n. Por ejemplo, la t&eacute;cnica del estafador es intentar determinar tu personalidad y tender&aacute; a hacer espejo y a amoldarse a tu modo de actuar, hablar&aacute; el mismo lenguaje, demostrar&aacute; confianza para convencerte. Si detecta tu ansiedad intentar&aacute; apurarte, si detecta una personalidad ahorrativa, especuladora, intentar&aacute; convencerte en la base de que no perder&aacute;s, que es seguro y que incrementar&aacute;s tu patrimonio. Si por tu conducta observa que est&aacute;s desesperado, que estas sufriendo una crisis, apuntar&aacute; a reforzar el pensamiento m&aacute;gico, de que lo que te ofrece es la soluci&oacute;n y que te salvar&aacute;s de los problemas. Entonces para bajar esta posibilidad, trabajaremos en la formaci&oacute;n de lo que s&iacute; tenemos a nuestro alcance y es controlable, esto es nuestra formaci&oacute;n y preparaci&oacute;n. Pasemos a estudiar posibles factores generales en base a estudios cient&iacute;ficos. &nbsp;</span></p>',
        'opened' => 1,
        'preview' => '4-2_cuestionario-de-riesgo-de-estafa.mp3',
        'duration' => 2,
      ]);

      $lesson3_4_1 = Lesson::create([
        'unit_id' => $unit4_1->id,
        'type' => 'audio',
        'title' => 'Mis sesgos cognitivos',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Mis sesgos cognitivos</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&laquo;La mitad de nuestras equivocaciones en la vida nacen de que cuando debemos pensar, sentimos, y cuando debemos sentir, pensamos.&raquo;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">John Ch. Collins (1848-1908), cr&iacute;tico literario ingl&eacute;s.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Un estudio de la Escuela de Psicolog&iacute;a de la Universidad de Exeter del Reino Unido bas&aacute;ndose en entrevistas con v&iacute;ctimas de estafas, concluye en que hay ciertos rasgos emocionales y de personalidad que comparten la mayor&iacute;a de las v&iacute;ctimas. Indicando que, al contrario de la creencia popular, estas en su mayor&iacute;a no son personas incultas y sin recursos. Por lo general son personas adultas y con educaci&oacute;n superior, incluso profesionales exitosos. M&aacute;s all&aacute; de esto, es significativo mencionar que el ser v&iacute;ctima de estafa es transversal a toda clase social, g&eacute;nero y edad. Es cierto que la experiencia de vida nos da m&aacute;s herramientas para identificarlas, pero como venimos mencionando, no nos vuelve inmunes.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El estudio indica que existen personas propensas a ser v&iacute;ctimas de estafas, estas poseen rasgos de carencia en la capacidad consciente de regular sus impulsos o directamente no tienen autocontrol. Se puede ver reflejado en conductas como compras compulsivas, reacci&oacute;n en&eacute;rgica de enfado o tristeza. Otra conducta que podemos analizar en nosotros y que, por supuesto es indetectable para otros, es el no comentar con nadie el gran negocio que estamos a punto de realizar. No lo comentamos ni con los familiares ni con amigos, debido a que muy internamente sabemos que no estamos actuando de modo prudente, tampoco lo contamos porque sabemos que nos confirmar&iacute;an lo que estamos suponiendo. Incluso, puede ser que la persona investigue el proyecto de inversi&oacute;n, pero los individuos del estudio reconocieron que es m&aacute;s fuerte la promesa del premio, acallando las voces internas que indican que algo anda mal y prueban de todos modos, por las dudas, con la ilusi&oacute;n de que esa oportunidad sea genuina.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Como venimos observando, cuando la emoci&oacute;n toma el volante, la raz&oacute;n es desplazada al asiento de atr&aacute;s.&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El estudio tambi&eacute;n se&ntilde;ala, que existe un gran p&uacute;blico reincidente que cae siempre como si fuese la primera vez. Y finalmente menciona que hay factores temporales, tales como crisis econ&oacute;micas, falta de trabajo, desequilibrios emocionales debido a p&eacute;rdidas, separaciones favoreciendo la proliferaci&oacute;n del pensamiento m&aacute;gico que el negocio de inversi&oacute;n lo resolver&iacute;a todo. Ser exitoso es la oferta del estafador, insiste con las frases del estilo &ldquo;mente millonaria&rdquo; y &ldquo;s&eacute; tu propio jefe&rdquo; que quiz&aacute;s, en otro momento y tiempo en el que estamos equilibrados, no nos convencer&iacute;an.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Debido a la pandemia reciente, muchas personas perdieron sus empleos y apostaron el capital que les correspond&iacute;a por indemnizaciones o ayuda social, en estas oportunidades financieras milagrosas de la multiplicaci&oacute;n y rentabilidad mensual exorbitante, arriesgando todo lo que les queda.</span></p>',
        'opened' => 1,
        'preview' => '4-3_mis-sesgos-cognitivos.mp3',
        'duration' => 3,
      ]);

      $lesson4_4_1 = Lesson::create([
        'unit_id' => $unit4_1->id,
        'type' => 'audio',
        'title' => 'Resumen y recomendaciones',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Mis sesgos cognitivos</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&laquo;La mitad de nuestras equivocaciones en la vida nacen de que cuando debemos pensar, sentimos, y cuando debemos sentir, pensamos.&raquo;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">John Ch. Collins (1848-1908), cr&iacute;tico literario ingl&eacute;s.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Un estudio de la Escuela de Psicolog&iacute;a de la Universidad de Exeter del Reino Unido bas&aacute;ndose en entrevistas con v&iacute;ctimas de estafas, concluye en que hay ciertos rasgos emocionales y de personalidad que comparten la mayor&iacute;a de las v&iacute;ctimas. Indicando que, al contrario de la creencia popular, estas en su mayor&iacute;a no son personas incultas y sin recursos. Por lo general son personas adultas y con educaci&oacute;n superior, incluso profesionales exitosos. M&aacute;s all&aacute; de esto, es significativo mencionar que el ser v&iacute;ctima de estafa es transversal a toda clase social, g&eacute;nero y edad. Es cierto que la experiencia de vida nos da m&aacute;s herramientas para identificarlas, pero como venimos mencionando, no nos vuelve inmunes.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El estudio indica que existen personas propensas a ser v&iacute;ctimas de estafas, estas poseen rasgos de carencia en la capacidad consciente de regular sus impulsos o directamente no tienen autocontrol. Se puede ver reflejado en conductas como compras compulsivas, reacci&oacute;n en&eacute;rgica de enfado o tristeza. Otra conducta que podemos analizar en nosotros y que, por supuesto es indetectable para otros, es el no comentar con nadie el gran negocio que estamos a punto de realizar. No lo comentamos ni con los familiares ni con amigos, debido a que muy internamente sabemos que no estamos actuando de modo prudente, tampoco lo contamos porque sabemos que nos confirmar&iacute;an lo que estamos suponiendo. Incluso, puede ser que la persona investigue el proyecto de inversi&oacute;n, pero los individuos del estudio reconocieron que es m&aacute;s fuerte la promesa del premio, acallando las voces internas que indican que algo anda mal y prueban de todos modos, por las dudas, con la ilusi&oacute;n de que esa oportunidad sea genuina.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Como venimos observando, cuando la emoci&oacute;n toma el volante, la raz&oacute;n es desplazada al asiento de atr&aacute;s.&nbsp;</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El estudio tambi&eacute;n se&ntilde;ala, que existe un gran p&uacute;blico reincidente que cae siempre como si fuese la primera vez. Y finalmente menciona que hay factores temporales, tales como crisis econ&oacute;micas, falta de trabajo, desequilibrios emocionales debido a p&eacute;rdidas, separaciones favoreciendo la proliferaci&oacute;n del pensamiento m&aacute;gico que el negocio de inversi&oacute;n lo resolver&iacute;a todo. Ser exitoso es la oferta del estafador, insiste con las frases del estilo &ldquo;mente millonaria&rdquo; y &ldquo;s&eacute; tu propio jefe&rdquo; que quiz&aacute;s, en otro momento y tiempo en el que estamos equilibrados, no nos convencer&iacute;an.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Debido a la pandemia reciente, muchas personas perdieron sus empleos y apostaron el capital que les correspond&iacute;a por indemnizaciones o ayuda social, en estas oportunidades financieras milagrosas de la multiplicaci&oacute;n y rentabilidad mensual exorbitante, arriesgando todo lo que les queda.</span></p>',
        'opened' => 1,
        'preview' => '4-4_resumen-y-recomendaciones.mp3',
        'duration' => 3,
      ]);

      $unit5_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'Tipos de estafas',
        'subtitle' => 'Conoce todos las maneras en las que puedes ser estafado',
        'description' => 'En esta nueva unidad se introducen los tipos de estafa que existen tanto en la vida diaria, como en lo relacionado a la Blockchain',
      ]);

      $lesson1_5_1 = Lesson::create([
        'unit_id' => $unit5_1->id,
        'type' => 'audio',
        'title' => 'Hagamos un experimento',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Hagamos un experimento</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Nos pone muy contentos de que est&eacute;s aqu&iacute;. Eso quiere decir que est&aacute;s dispuesto a estar mejor preparado, mejor apto para el mundo Blockchain y eso habla muy bien de vos. La actitud de estar dispuesto a cambiar la manera de percibir lo que tenemos enfrente, de ser proactivo, nos ayudar&aacute; a sortear la estafa y salir airoso. Para explicarlo de un modo sencillo, esto es como hacer rafting, yendo en un bote a trav&eacute;s de los r&aacute;pidos de un r&iacute;o, hay que tener un entrenamiento y conocimiento previo antes de la pr&oacute;xima roca, en ese momento, quiz&aacute;s no tengas mucho tiempo para meditar, (insistimos que no te dejes apurar como explicamos en &lt;&lt;el ABCD de la estafa&gt;&gt;) tu preparaci&oacute;n y estrategia previa ser&aacute;n lo que impida que termines como el coyote del correcaminos abrazado a la roca.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Esa reacci&oacute;n saludable frente a las estafas, se construye con prevenci&oacute;n, conocimiento y formaci&oacute;n de una actitud mental. Cada uno viene con una formaci&oacute;n y experiencia que nos hace ver una misma realidad de diferentes formas. Es por eso que, para algunas personas, ciertos tipos de estafas le parecen tremendamente obvias, tales como aquellas que tienen errores ortogr&aacute;ficos, mala traducci&oacute;n, promesa de ganancia incoherente, sin embargo, otros caen.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Acomp&aacute;&ntilde;ame a realizar este ejercicio pr&aacute;ctico. Al terminar de pronunciar esta oraci&oacute;n, te invito a que cierres los ojos y sin hacer trampa intenta enumerar sin abrir los ojos, cosas que hay en la habitaci&oacute;n o lugar donde te encuentres ahora. Tomate tu tiempo...</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Y Bien? &iquest;Cu&aacute;ntas cosas enumeraste, cuantas te quedaron por enumerar? &iquest;Fueron pocas? Seguramente, si est&aacute;s familiarizado con el lugar donde estas puedas enumerar m&aacute;s, pero al abrir los ojos ver&aacute;s m&aacute;s cosas que se te podr&iacute;an haber ocurrido, pero no fue as&iacute;. Diferente ser&iacute;a si, antes de hacer el experimento te hubiera contado sobre los elementos que por lo general est&aacute;n en esta habitaci&oacute;n, te explicara con respecto para qu&eacute; sirven los muebles que est&aacute;n all&iacute;, de la importancia del tipo de material que se construyen los pisos y dem&aacute;s detalles. Seguramente, si realiz&aacute;ramos el ejercicio a posterior, el listado de elementos que enumerar&iacute;as ser&iacute;a mucho mayor. Y esto es lo que nos interesa que suceda con el estudio de los diferentes tipos de las estafas, que puedas saber en qu&eacute; consisten, donde se encuentran y cu&aacute;l es su objetivo. No queremos adentrarnos en cuestiones t&eacute;cnicas que nos abrumen y nos d&eacute; temor de la cantidad y modalidades de estafas, sino, tener una noci&oacute;n y que esto nos modifique la sinapsis cerebral orientada a recordar conceptos que nos encienden alarmas o dudas razonables al entrar en la habitaci&oacute;n de la estafa.</span></p>',
        'opened' => 1,
        'preview' => '5-1_tipos-de-estafas.mp3',
        'duration' => 3,
      ]);

      $lesson2_5_1 = Lesson::create([
        'unit_id' => $unit5_1->id,
        'type' => 'audio',
        'title' => 'El titular del diario',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">El titular del diario</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Muchos art&iacute;culos period&iacute;sticos (para no decir todos), cuando hacen referencia a &ldquo;las estafas en el mundo de las criptomonedas&rdquo;, resulta que por lo general no tiene nada que ver con las criptomonedas, si, escuchaste bien, en realidad los t&iacute;tulos deber&iacute;an decir algo as&iacute;&hellip;&rdquo; estafas que usan de excusas al mundo de las criptomonedas&rdquo;, si, s&eacute; que suena confuso, pero es la realidad. La situaci&oacute;n es que se est&aacute; en presencia de modalidades de estafas viejas, muy viejas y que, en alg&uacute;n lugar del enga&ntilde;o, los estafadores colocan la palabra m&aacute;gica bitcoin o criptomonedas. Lamentablemente, con cada noticia que sale con esos enf&aacute;ticos t&iacute;tulos sirven para espantar a muchas personas que est&aacute;n queriendo ser parte del ecosistema, logrando que guarden en un caj&oacute;n su idea de adentrarse en este mundo. Es cierto que el mundo de las criptomonedas carece de la registraci&oacute;n de usuarios y controles, por consiguiente, se vuelve complejo la prosecuci&oacute;n para la justicia y las fuerzas del orden por lo tanto se vuelve un caldo de cultivo f&eacute;rtil para los estafadores. Es por eso, que es de suma importancia considerar antes de sumergirse en el mundo de las criptomonedas, estudiar bien en qu&eacute; invertir y sobre todo en qu&eacute; NO INVERTIR, y es all&iacute; el foco que queremos hacer en esta Academy Scan DeFi.</span></p>',
        'opened' => 1,
        'preview' => '5-2_el-titular-del-diario.mp3',
        'duration' => 1,
      ]);

      $lesson3_5_1 = Lesson::create([
        'unit_id' => $unit5_1->id,
        'type' => 'audio',
        'title' => 'Las categorías SCAN DeFi de las estafas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Las categor&iacute;as SCAN DeFi de las estafas</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Para ayudar al razonamiento, es bueno el empleo de categor&iacute;as. Clasificar los elementos seg&uacute;n las caracter&iacute;sticas en com&uacute;n que posean y agruparlos, lo hacemos de modo natural desde muy temprana edad con temas concretos y de f&aacute;cil comprensi&oacute;n. Pero cuando la tem&aacute;tica posee demasiados componentes abstractos ya no es tan intuitivo hacerlo. Por eso te propongo que categoricemos las estafas de un modo l&oacute;gico y as&iacute; nos ser&aacute; m&aacute;s f&aacute;cil comprenderlas. Las clasificaremos en tres tipos.</span></p> <p><br></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Primero,&nbsp;</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">las estafas en el mundo Fiat</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">, estas estafas son las que ocurren d&iacute;a a d&iacute;a en el mundo del sistema bancario actual, pueden ser por ejemplo ciberdelitos orientados al perjuicio patrimonial de las v&iacute;ctimas mediante diferentes t&eacute;cnicas de enga&ntilde;os tales como la suplantaci&oacute;n de identidad, tendientes a que las personas proporcionen sus claves personales, accesos a sus cuentas, persuadir a que transfieran sus fondos, entre tantas otras.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Segundo,&nbsp;</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">las estafas sat&eacute;lites a la blockchain</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">, &iexcl;este es el grupo m&aacute;s grande! Y por la cual las noticias escriben sobre ellas. En este caso, las estafas ser&iacute;an aquellas que utilizan como excusa o pretexto el mundo de las criptomonedas pero que en realidad son las estafas comunes. La finalidad del estafador puede ser mixta, hacerse de tu patrimonio en el mundo Fiat o de tus criptoactivos.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Tercero,&nbsp;</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">las estafas en la blockchain</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">, estas son las estafas concebidas y realizadas en su totalidad dentro de la blockchain. Estas pueden ser ejecutadas por desarrolladores malintencionados que explotan las caracter&iacute;sticas de los est&aacute;ndares para la implementaci&oacute;n de tokens digitales fraudulentos, programando en desmedro de aquellos que acepten el contrato inteligente que terminar&aacute; perjudic&aacute;ndolos.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Finalmente, perm&iacute;tanme so&ntilde;ar, que bueno ser&iacute;a de que todo el mundo pueda hacer esta diferenciaci&oacute;n, de que se estandarizara el uso correcto de las categor&iacute;as de tipos de estafas, incluso por parte de los medios, as&iacute; se deja de perjudicar gratuitamente al mundo de las criptomonedas que con tanto ah&iacute;nco y esmero se dise&ntilde;&oacute; para ser lo m&aacute;s transparente y justo posible. &nbsp;</span></p>',
        'opened' => 1,
        'preview' => '5-3_las-categorias-scandefi-de-las-estafas.mp3',
        'duration' => 2,
      ]);

      $unit6_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'Estafas en el mundo FIAT',
        'subtitle' => 'Introduccion a las estafas en el sistema financiero tradicional',
        'description' => 'En el sexto tema de este curso trataremos los tipos de estafas FIAT más comunes que ocurren en la vida cotidiana',
      ]);

      $lesson1_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => 'La importancia de conocer las estafas del mundo Fiat',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">La importancia de conocer las estafas del mundo Fiat</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Para la academia Scan DeFi, es importante dar los conceptos de lo que son las estafas en el mundo Fiat, debido a que antes de aterrizar en el mundo de las estafas sat&eacute;lites al mundo cripto, las estafas primero se implementan y perfeccionan en el mundo Fiat. Comprender el abanico de posibilidades y lo que le pasa al vecino del barrio, nos da un panorama de lo que se utiliza. Como repetimos en reiteradas oportunidades, no es para asustarnos o simplemente asombrarnos, es para ir formando un concepto y desarrollando un sentido de astucia que haga disminuir considerablemente las posibilidades de que los participantes de esta academia sean v&iacute;ctimas de estafa.</span></p>',
        'opened' => 1,
        'preview' => '6-1_estafas-en-el-mundo-fiat.mp3',
        'duration' => 1,
      ]);

      $lesson2_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => 'Firme como patada de Leónidas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Firme como patada de Le&oacute;nidas</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:italic;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iexcl;Esto es Esparta!</span><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&nbsp;grita el rey espartano Le&oacute;nidas asestando una patada al heraldo persa y arroj&aacute;ndolo al b&aacute;ratro. Esa patada que figura tanto en el c&oacute;mic de Frank Miller &ldquo;300&rdquo; como en su pel&iacute;cula hom&oacute;nima, se convirti&oacute; en un &iacute;cono cinematogr&aacute;fico, no solo por la declaraci&oacute;n simb&oacute;lica de guerra a Persia, sino por el sinf&iacute;n de memes que se crearon a partir de esa legendaria escena. La pandemia hizo lo mismo con los tr&aacute;mites anal&oacute;gicos. De un momento a otro, todas las gestiones que se realizaban de modo presencial, sobre todo las bancarias, fueron como cual heraldo persa pateado en el pecho hacia el exilio anal&oacute;gico. Se&ntilde;or, &ldquo;se tiene que hacer todo v&iacute;a online&rdquo;, es la frase que multitud de usuarios bancarios que nunca hab&iacute;an tocado un teclado para ese fin, escucharon en el &uacute;ltimo tiempo. Las estafas proliferan donde la ambig&uuml;edad del sistema y el desconocimiento del usuario se juntan.</span></p>',
        'opened' => 1,
        'preview' => '6-2_firme-como-patada-de-leonidas.mp3',
        'duration' => 1,
      ]);

      $lesson3_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => '¿Qué es una estafa Bancaria?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Qu&eacute; es una estafa bancaria?</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Qu&eacute; es una estafa bancaria? La podemos definir con el fin que persigue, es decir el objetivo, esto es, apoderarse de las cuentas bancarias de las v&iacute;ctimas, vaciarlas y si el sistema lo permite, solicitar pr&eacute;stamos pre aprobados y por supuesto y transferir todos los fondos a terceros. Son los delitos digitales que m&aacute;s crecieron durante la pandemia. Lo que var&iacute;a, es el m&eacute;todo que utilizan para lograrlo. Estos pueden ser muy variados, pero solo enumeramos los m&aacute;s recientes.</span></p>',
        'opened' => 1,
        'preview' => '6-3_que-es-una-estafa-bancaria.mp3',
        'duration' => 1,
      ]);

      $lesson4_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => 'Pescando en la pecera, las redes sociales',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Pescando en la pecera, las redes sociales</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iquest;Cu&aacute;ntas veces la gente busca ayuda de sus problemas bancarios en Internet? Es una locura, es como poner al lobo a cuidar de las ovejas. Se presta mucho para las estafas, en Internet, sobre todo en las redes sociales, es muy f&aacute;cil crear sitios espejos o perfiles falsos haci&eacute;ndose pasar entidades bancarias. En el incremento desmedido de las llamadas telef&oacute;nicas a los call center o a los asistentes bancarios online, estos se saturan haciendo esperar al usuario indefinidamente hasta que este se cansaba y terminaba la comunicaci&oacute;n, entonces muchas personas optaban por intentar hacer sus reclamos por cualquier medio que se le viniese a la mente, incluso, las redes sociales. Entonces, realizaba una tarea tan simple como peligrosa, colocar en el buscador el nombre del banco de su inter&eacute;s, a partir de all&iacute; se daban dos desenlaces inesperados. Uno, &nbsp;el cliente del banco se comunicaba sin saber con una cuenta falsa y recibiendo respuestas v&iacute;a mensaje privado de parte de esta supuesta pero fraudulenta cuenta quien la orientar&iacute;a para solucionar sus problemas. Dos, los clientes bancarios desesperados, dejaban sus reclamos, quejas o consultas en los muros de las redes oficiales de los bancos, entonces, los estafadores, como cual ave de rapi&ntilde;a, merodean los comentarios para detectar cualquier persona desprevenida que expusiera p&uacute;blicamente un reclamo y por mensaje privado iniciaban el di&aacute;logo dando cuenta del reclamo. Entonces atacaban con un verso cl&aacute;sico tal como &ldquo;Se&ntilde;or/a P&eacute;rez, su reclamo fue asentado en el sistema, tengo asignado su caso para resolverle cualquier tipo de inconveniente, cu&eacute;nteme&rdquo;. En cualquiera de los dos casos, tras un intercambio en la comunicaci&oacute;n, le solicitan al cliente del banco informaci&oacute;n sensible, como los n&uacute;meros de las tarjetas de cr&eacute;ditos, claves personales, que env&iacute;en c&oacute;digos que les llegan v&iacute;a SMS, sino peor a&uacute;n, hacerlos concurrir a los cajeros autom&aacute;ticos para confundirlos y guiarlos a realizar acciones para facilitarles las credenciales o tokens (sirve para autorizar todo tipo de operaciones digitales) con la excusa de solucionarles el problema. Si, parece obvio y sabido por todos de que no se debe compartir esa informaci&oacute;n, pero, la mayor&iacute;a de las v&iacute;ctimas reconocieron tras el hecho, que el poder de persuasi&oacute;n y el convencimiento de los estafadores lograron que compartieran sus datos.</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Por lo general, cuando nos contacta una entidad de confianza, o al menos creemos que lo es, naturalmente somos colaborativos y bajamos el umbral de desconfianza (como lo indica la letra &ldquo;D&rdquo; del &lt;&lt;ABCD de la estafa&gt;&gt; que ya hemos visto). Cuando uno reclama, es porque seguramente el problema bancario es persistente, sumado a los impedimentos de realizar alguna transacci&oacute;n o compra, o peor a&uacute;n, tenemos a nuestro cargo gastos desconocidos, d&eacute;bitos autom&aacute;ticos que no sabemos su origen, todo esto nos resulta muy fastidioso y &iexcl;queremos solucionarlo ya! Es all&iacute; precisamente donde actuamos apresuradamente para resolverlo y nos dejamos llevar m&aacute;s la emoci&oacute;n que la raz&oacute;n, entonces estamos en riesgo.</span></p>',
        'opened' => 1,
        'preview' => '6-4_pescando-en-la-pecera.mp3',
        'duration' => 3,
      ]);

      $lesson5_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => 'Me confundí en la Compra Online!',
        'subtitle' => '',
        'description' => '',
        // 'content' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:12pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">&iexcl;Me confund&iacute; en la Compra Online!</span></p> <p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Otra de las estafas, que empieza de modo colateral al mundo bancario, es a trav&eacute;s de la venta de productos online. En esta oportunidad, el estafador, simula inter&eacute;s con respecto a un producto cualquiera que se publica en alguna plataforma sin intermediarios, como por ejemplo Marketplace de Facebook o cualquier otra plataforma de venta, donde figuran los datos reales del vendedor. Entonces el mecanismo de estafa comienza cuando el vendedor es contactado mediante alg&uacute;n sistema de mensajer&iacute;a instant&aacute;nea de uso masivo como puede ser WhatsApp, y tras entablar una comunicaci&oacute;n en torno al producto de inter&eacute;s, el estafador le solicita al vendedor, en este caso la v&iacute;ctima, que le proporcione los datos bancarios para concretar una transferencia para el pago o se&ntilde;a del producto. Posteriormente, transcurrido unos minutos el estafador, env&iacute;a un comprobante digital ap&oacute;crifo, falso, de la transacci&oacute;n por un monto muy superior pero num&eacute;ricamente similar, pudiendo ser el costo mil y el comprobante dice diez mil, acto seguido el estafador manda un audio, o concreta una llamada telef&oacute;nica simulando desesperaci&oacute;n o llanto, pidiendo por favor que le devuelva la transferencia porque se equivoc&oacute; en el monto y se ver&aacute; envuelto en problemas. Si la persona lo realiza, estar&aacute; entregando al estafador un monto que nunca se le acredit&oacute; a su cuenta. En cambio, si la v&iacute;ctima insiste que no se le acredit&oacute; el pago a&uacute;n y que se debe esperar a que impacte en su estado bancario para luego devolverle el dinero, se pone en marcha la fase dos de la estafa. En este caso, el estafador dice que llamar&aacute; a su banco para que salve la situaci&oacute;n o pause la transferencia, obvio que eso de pausar transferencias no existe, entonces transcurridos unos minutos la v&iacute;ctima recibe un llamado desde otro n&uacute;mero telef&oacute;nico de alguien que presume ser representante del banco, quien le dar&aacute; instrucciones de c&oacute;mo salvar la operatoria y que el receptor tiene que autorizar as&iacute; se acredita. De esta manera, aprovecha para corroborar algunos datos reales del cliente que posea y le solicita otros, si, ya est&aacute;n robando datos, posteriormente le informa a la v&iacute;ctima que le llegar&aacute; un c&oacute;digo v&iacute;a SMS, el cual la persona ya sin voluntad propia producto de la manipulaci&oacute;n y la confusi&oacute;n le proporciona. El c&oacute;digo que entreg&oacute;, fue el doble factor de autenticaci&oacute;n del sistema que tiene el banco para blanquear el Token, que es la llave maestra para todas las gestiones digitales, incluso los cambios de contrase&ntilde;a al acceso bancario online.</span></p>',
        'opened' => 1,
        'preview' => '6-5_me-confundi-en-la-compra-online.mp3',
        'duration' => 2,
      ]);

      $lesson6_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => 'La estafa de los plásticos, las tarjetas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '6-6_la-estafa-de-los-plasticos.mp3',
        'duration' => 3,
      ]);

      $lesson7_6_1 = Lesson::create([
        'unit_id' => $unit6_1->id,
        'type' => 'audio',
        'title' => 'SIM Swapping, el robo de la línea',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '6-7_sim-el-robo-de-la-linea.mp3',
        'duration' => 1,
      ]);

      $unit7_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'Estafas satélites a la Blockchain',
        'subtitle' => 'Introduccion a las estafas relacionadas con la Blockchain, pero que ocurren fuera de ella',
        'description' => 'En este séptimo tema vamos a abordar los tipos de estafas que ocurren satelitalmente a la Blockchain. Abordaremos también temas como el Phising, el Smishing o la Ingeniería Social',
      ]);

      $lesson1_7_1 = Lesson::create([
        'unit_id' => $unit7_1->id,
        'type' => 'audio',
        'title' => 'Introducción',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '7-1_introduccion.mp3',
        'duration' => 1,
      ]);

      $lesson2_7_1 = Lesson::create([
        'unit_id' => $unit7_1->id,
        'type' => 'audio',
        'title' => '¿Qué es la ingeniería social?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '7-2_que-es-la-ingenieria-social.mp3',
        'duration' => 2,
      ]);

      $lesson3_7_1 = Lesson::create([
        'unit_id' => $unit7_1->id,
        'type' => 'audio',
        'title' => 'Ataques de Ingeniería Social',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '7-3_ataques-de-ingenieria-social.mp3',
        'duration' => 1,
      ]);

      $lesson4_7_1 = Lesson::create([
        'unit_id' => $unit7_1->id,
        'type' => 'audio',
        'title' => 'El Phishing',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '7-4_el-phising  .mp3',
        'duration' => 1,
      ]);

      $lesson5_7_1 = Lesson::create([
        'unit_id' => $unit7_1->id,
        'type' => 'audio',
        'title' => 'Caso de estudio de Phishing: Dominios espejos, robo de billeteras cripto',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '7-5_caso-estudio-de-phising.mp3',
        'duration' => 7,
      ]);

      $unit8_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'Estafas en la Blockchain',
        'subtitle' => 'Introduccion a las estafas que ocurren dentro de la Blockchain',
        'description' => 'En el octavo tema del curso es profundiza en los tipos de estafas que ocurren usando las tecnologías blockchain. Entre ellas estudiaremos los Pumps, los Airdrops o las Preventas Falsas entre otras',
      ]);

      $lesson1_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'Estafas de Preventa: Y el monumento a la estafa de preventa es…',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-1_estafas-de-preventa.mp3',
        'duration' => 1,
      ]);

      $lesson2_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'Estafas de Preventas en la BSC, señales',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-2_estafas-de-preventa-bsc.mp3',
        'duration' => 3,
      ]);

      $lesson3_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'Que es técnicamente el pump and dump',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-3_que-es-el-pump-and-dump.mp3',
        'duration' => 1,
      ]);

      $lesson4_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'Estafa del pump',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-4_estafa-del-pump.mp3',
        'duration' => 1,
      ]);

      $lesson5_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'Testimonio de víctima de estafa de pumpeo',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-5_testimonio-de-victima-estafa-pump.mp3',
        'duration' => 2,
      ]);

      $lesson6_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'La explicación de lo que sucede',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-6_la-explicacion-de-lo-que-sucede.mp3',
        'duration' => 1,
      ]);

      $lesson7_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'Como detectar una estafa de pumpeo',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-7_como-detectar-estafa-pumpeo.mp3',
        'duration' => 1,
      ]);

      $lesson8_8_1 = Lesson::create([
        'unit_id' => $unit8_1->id,
        'type' => 'audio',
        'title' => 'La modalidad de estafa del grupo VIP del pumpeo',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '8-8_la-modalidad-estafa-grupo-VIP.mp3',
        'duration' => 2,
      ]);

      $unit9_1 = Unit::create([
        'course_id' => $course1->id,
        'title' => 'Prevención de Estafas y recomendaciones',
        'subtitle' => 'Conoce todo lo que debes saber para protegerte ante estafas',
        'description' => 'En el noveno y último tema del curso se enseña como podemos protegernos de todas las previas estafas vistas y recomendaciones que podemos seguir para evitar estas mismas. Además, esta unidad cuenta con una lección dirigida por @Biyo_BiNet el cual nos dió a conocer los errores más comunes que ocurren en el mundo DeFi.',
      ]);

      $lesson1_9_1 = Lesson::create([
        'unit_id' => $unit9_1->id,
        'type' => 'audio',
        'title' => 'Reglas de oro para la protección de datos y patrimonio',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '9-1_prevencion-estafas-recomendaciones-reglas-oro.mp3',
        'duration' => 3,
      ]);

      $lesson2_9_1 = Lesson::create([
        'unit_id' => $unit9_1->id,
        'type' => 'audio',
        'title' => 'Errores comunes en DeFi - Resumen',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '9-2_errores-comunes-en-defi.mp3',
        'duration' => 3,
      ]);

      $lesson3_9_1 = Lesson::create([
        'unit_id' => $unit9_1->id,
        'type' => 'audio',
        'title' => 'Recomendacinoes: Confección y almacenamiento de la frase semilla.',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '9-3_frase-semilla-confeccion-almacenamiento.mp3',
        'duration' => 2,
      ]);

      $lesson4_9_1 = Lesson::create([
        'unit_id' => $unit9_1->id,
        'type' => 'audio',
        'title' => 'Recomendaciones: Solucionar problemas comunes de la frase semilla',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '9-4_solucionar-problemas-comunes.mp3',
        'duration' => 1,
      ]);

      $course2 = Course::create([
        'user_id' => 1,
        'category_id' => $cat2->id,
        'level_id' => $lvl2->id,
        'title' => 'Creando tu propia criptodivisa con Solidity',
        'subtitle' => 'Cómo debes crear tu propio token ERC20 desde cero',
        'description' => 'Dentro de este curso podrás encontrar todos los pasos necesarios para crear tu propio token ERC20, desde cero, y sin necesidad de tener conocimientos previos, usando como base el lenguaje de programación Solidity.',
        'image' => 'creando-tu-propia-criptodivisa-con-solidity.png',
        'tags' => ['Blockchain', 'Cryptocurrency', 'Programming'],
      ]);

      $unit1_2 = Unit::create([
        'course_id' => $course2->id,
        'title' => 'Introduccion',
        'subtitle' => 'Todo lo que debes saber para empezar en Remix',
        'description' => 'Unidad dedicada a hacer una breve explicación sobre el entorno de desarrollo de Remix y de todas sus funcionalidades',
      ]);

      $lesson1_1_2 = Lesson::create([
        'unit_id' => $unit1_2->id,
        'type' => 'video',
        'title' => 'Presentación del curso',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'GKwCFHXJsIk',
        'duration' => 3,
      ]);

      $lesson1_1_2 = Lesson::create([
        'unit_id' => $unit1_2->id,
        'type' => 'video',
        'title' => 'Remix IDE',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'YEcvKYuGA8w',
        'duration' => 4,
      ]);

      $unit2_2 = Unit::create([
        'course_id' => $course2->id,
        'title' => 'Desarrollo del token',
        'subtitle' => 'Desde 0 a 100 en la creación de tu propio token ERC20',
        'description' => 'En esta segunda unidad es donde se explica como desarrollar un token ERC20 paso a paso.',
      ]);

      $lesson1_2_2 = Lesson::create([
        'unit_id' => $unit2_2->id,
        'type' => 'video',
        'title' => 'Creando un token ERC-20: Parte 1',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'oSdPcasG9Ag',
        'duration' => 14,
      ]);

      $lesson2_2_2 = Lesson::create([
        'unit_id' => $unit2_2->id,
        'type' => 'video',
        'title' => 'Creando un token ERC-20: Parte 2',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'pSgXFa2Nsjs',
        'duration' => 13,
      ]);

      $lesson3_2_2 = Lesson::create([
        'unit_id' => $unit2_2->id,
        'type' => 'video',
        'title' => 'Creando un token ERC-20: Parte 3',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '_aDhKmdcfCw',
        'duration' => 18,
      ]);

      $lesson4_2_2 = Lesson::create([
        'unit_id' => $unit2_2->id,
        'type' => 'video',
        'title' => 'Creando un token ERC-20: Parte 4',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'LiFrNYA64VU',
        'duration' => 20,
      ]);

      $course3 = Course::create([
        'user_id' => 1,
        'category_id' => $cat0->id,
        'level_id' => $lvl2->id,
        'title' => 'Destacados Healthy Pockets',
        'subtitle' => 'Vídeos destacados de nuestro partner Healthy Pockets',
        'description' => 'Recopilación de videos de nuestro partner Healthy Pockets, elegidos por el equipo de Scan DeFi.',
        'image' => 'destacados-healthy-pockets.png',
        'tags' => ['Blockchain', 'Cryptocurrency', 'Investments','Security'],
      ]);

      $unit1_3 = Unit::create([
        'course_id' => $course3->id,
        'title' => 'Destacados Healthy Pockets',
        'subtitle' => 'No te pierdas lo mejor de Healthy Pockets',
        'description' => 'Recopilación de videos destacados de uno de nuestros partners, elegidos por el equipo de Scan DeFi. En esta encontrarás información de cómo obtener ingresos pasivos con las criptomonedas, de como proteger tus ganancias e introduce el innovador Metaverso.',
      ]);

      $lesson1_1_3 = Lesson::create([
        'unit_id' => $unit1_3->id,
        'type' => 'video',
        'title' => '¿Es el futuro el Metaverso?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'EcQREiPFL3A',
        'duration' => 16,
      ]);

      $lesson2_1_3 = Lesson::create([
        'unit_id' => $unit1_3->id,
        'type' => 'video',
        'title' => 'El mayor enemigo de Bitcoin. La verdad sobre las Stablecoins',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'fd7vfOsdPAM',
        'duration' => 13,
      ]);

      $lesson3_1_3 = Lesson::create([
        'unit_id' => $unit1_3->id,
        'type' => 'video',
        'title' => 'Evita las multas y protege tus ganancias de criptomonedas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'lfmrxIz_2BM',
        'duration' => 14,
      ]);

      $lesson4_1_3 = Lesson::create([
        'unit_id' => $unit1_3->id,
        'type' => 'video',
        'title' => 'Aumenta tus beneficios con la inversión pasiva',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '5cung0vMlLg',
        'duration' => 12,
      ]);

      $lesson5_1_3 = Lesson::create([
        'unit_id' => $unit1_3->id,
        'type' => 'video',
        'title' => 'Como ganar ingresos pasivos con fondos de inversión en criptomonedas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'Qqsl1todNu0',
        'duration' => 13,
      ]);

      $course4 = Course::create([
        'user_id' => 1,
        'category_id' => $cat0->id,
        'level_id' => $lvl2->id,
        'title' => 'Destacados Crypto Orell',
        'subtitle' => 'Vídeos destacados de nuestro partner Crypto Orell',
        'description' => 'Recopilación de videos de nuestro partner Crypto Orell, elegidos por el equipo de Scan DeFi.',
        'image' => 'destacados-crypto-orell.png',
        'tags' => ['Blockchain', 'Cryptocurrency', 'Investments','Security'],
      ]);

      $unit1_4 = Unit::create([
        'course_id' => $course4->id,
        'title' => 'Destacados Crypto Orell',
        'subtitle' => 'No te pierdas lo mejor de Crypto Orell',
        'description' => 'Recopilación de videos destacados de uno de nuestros partners, elegidos por el equipo de Scan DeFi. En esta encontrarás información acerca de trading de criptomonedas o de como buscar tus propias gemas. Además también te enseña a como puedes mantenerte seguro usando Metamask o Poocoin.',
      ]);

      $lesson1_1_4 = Lesson::create([
        'unit_id' => $unit1_4->id,
        'type' => 'video',
        'title' => 'Como quitar/revocar contratos en Metamask',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'oaHaEp3nR0I',
        'duration' => 6,
      ]);

      $lesson2_1_4 = Lesson::create([
        'unit_id' => $unit1_4->id,
        'type' => 'video',
        'title' => 'Como usar stop-loss y limit orders en PancakeSwap',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'jyJUPVCg_IA',
        'duration' => 13,
      ]);

      $lesson3_1_4 = Lesson::create([
        'unit_id' => $unit1_4->id,
        'type' => 'video',
        'title' => 'Estrategia de trading en PRIMEXBT usando medias moviles',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'FIIqFh6iJWs',
        'duration' => 9,
      ]);

      $lesson4_1_4 = Lesson::create([
        'unit_id' => $unit1_4->id,
        'type' => 'video',
        'title' => 'Poocoin: Guía de uso y como evitar estafas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'JcqHWMN91ac',
        'duration' => 22,
      ]);

      $lesson5_1_4 = Lesson::create([
        'unit_id' => $unit1_4->id,
        'type' => 'video',
        'title' => 'Mi herramienta secreta para encontrar gemas en la BSC',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'fxkIpMXgFUc',
        'duration' => 17,
      ]);

      $course5 = Course::create([
        'user_id' => 1,
        'category_id' => $cat0->id,
        'level_id' => $lvl2->id,
        'title' => 'Destacados Crypto Boy',
        'subtitle' => 'Vídeos destacados de nuestro partner Crypto Boy',
        'description' => 'Recopilación de videos de nuestro partner Crypto Boy, elegidos por el equipo de Scan DeFi.',
        'image' => 'destacados-crypto-boy.png',
        'tags' => ['Blockchain', 'Cryptocurrency', 'Investments','Security'],
      ]);

      $unit1_5 = Unit::create([
        'course_id' => $course5->id,
        'title' => 'Destacados Crypto Boy',
        'subtitle' => 'No te pierdas lo mejor de Crypto Boy',
        'description' => 'Recopilación de videos destacados de uno de nuestros partners, elegidos por el equipo de Scan DeFi. En esta podrás encontrar entre otras cosas información acerca del yield farming, del apalancamiento, de los futuros en criptomonedas y de como crear tu propio portafolio. Además de esto se introducen ciertos temas de interés dentro del mundo de la blockchain.',
      ]);

      $lesson1_1_5 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'Qué es el apalancamiento? Qué son los futuros?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'Effvo05mau0',
        'duration' => 12,
      ]);

      $lesson2_1_5 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'Cómo construir tu Portafolio de criptomonedas: Tutorial CoinMarketCap',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'lm3ITaBzsa0',
        'duration' => 5,
      ]);

      $lesson1_5_3 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'Cómo funciona el Yield Farming',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '7MwsSZ6agmw',
        'duration' => 13,
      ]);

      $lesson4_1_5 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'No hagas Yield Farming sin saber esto',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'Pz6JDMMk_kI',
        'duration' => 14,
      ]);

      $lesson5_1_5 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'No sabías esto sobre Metamask',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'Z3Qkw4TAarI',
        'duration' => 16,
      ]);

      $lesson6_1_5 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'Importe minimo a declarar: Legalidad sobre criptomonedas',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'e5LgBe6ATSw',
        'duration' => 9,
      ]);

      $lesson7_1_5 = Lesson::create([
        'unit_id' => $unit1_5->id,
        'type' => 'video',
        'title' => 'Deja de comprar Shitcoins',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'NtSwHvH1lSo',
        'duration' => 4,
      ]);

      $course6 = Course::create([
        'user_id' => 1,
        'category_id' => $cat0->id,
        'level_id' => $lvl2->id,
        'title' => 'Destacados Vivir Invirtiendo',
        'subtitle' => 'Vídeos destacados de nuestro partner Vivir Invirtiendo',
        'description' => 'Recopilación de videos de nuestro partner Vivir Invirtiendo, elegidos por el equipo de Scan DeFi.',
        'image' => 'destacados-vivir-invirtiendo.png',
        'tags' => ['Blockchain', 'Cryptocurrency', 'Investments','Security'],
      ]);

      $unit1_6 = Unit::create([
        'course_id' => $course6->id,
        'title' => 'Destacados Vivir Invirtiendo',
        'subtitle' => 'No te pierdas lo mejor de Vivir Invirtiendo',
        'description' => 'Recopilación de videos destacados de uno de nuestros partners, elegidos por el equipo de Scan DeFi. En esta puedes encontrar información útil acerca del sistema P2P de Binance así como de las estafas en las criptomonedas. Además de esto también podrás informarte acerca del gran impacto que tendrán las criptomonedas en el sistema monetario del futuro.',
      ]);

      $lesson1_1_6 = Lesson::create([
        'unit_id' => $unit1_6->id,
        'type' => 'video',
        'title' => 'Binance P2P desde cero',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'pTQfBk57aOo',
        'duration' => 16,
      ]);

      $lesson2_1_6 = Lesson::create([
        'unit_id' => $unit1_6->id,
        'type' => 'video',
        'title' => '¿Como pueden afectar a nuestra vida diaria las criptomonedas en el futuro?',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'rs3bb-9Q0YE',
        'duration' => 10,
      ]);

      $lesson3_1_6 = Lesson::create([
        'unit_id' => $unit1_6->id,
        'type' => 'video',
        'title' => 'Criptomonedas: AFIP y Banco Central',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'zBVzLiN7guQ',
        'duration' => 12,
      ]);

      $course7 = Course::create([
        'user_id' => 1,
        'category_id' => $cat0->id,
        'level_id' => $lvl2->id,
        'title' => 'Destacados White Trader',
        'subtitle' => 'Vídeos destacados de nuestro partner White Trader',
        'description' => 'Recopilación de videos de nuestro partner White Trader, elegidos por el equipo de Scan DeFi.',
        'image' => 'destacados-white-trader.png',
        'tags' => ['Blockchain', 'Cryptocurrency', 'Investments','Security'],
      ]);

      $unit1_7 = Unit::create([
        'course_id' => $course7->id,
        'title' => 'Destacados White Trader',
        'subtitle' => 'No te pierdas lo mejor de White Trader',
        'description' => 'Recopilación de videos destacados de uno de nuestros partners, elegidos por el equipo de Scan DeFi. En esta puedes encontrar información de iniciación a plataformas orientadas al mercado CFD y de métodos para operar con ellos.',
      ]);

      $lesson1_1_7 = Lesson::create([
        'unit_id' => $unit1_7->id,
        'type' => 'video',
        'title' => 'Curso de Trading: Parte1, Introducción al trading de CFDs',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => '41xohXSHpFg',
        'duration' => 16,
      ]);

      $lesson2_1_7 = Lesson::create([
        'unit_id' => $unit1_7->id,
        'type' => 'video',
        'title' => 'Curso de Trading: Parte 2, Estrategia media de 20 y 200',
        'subtitle' => '',
        'description' => '',
        // 'content' => '',
        'opened' => 1,
        'preview' => 'osARbX8Bca4',
        'duration' => 18,
      ]);

      // Coming soon courses
      Course::create(['user_id' => 1, 'category_id' => $cat2->id, 'level_id' => $lvl2->id, 'title' => 'Token ERC20 desde 0', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat4->id, 'level_id' => $lvl2->id, 'title' => 'Manual del inversor', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat4->id, 'level_id' => $lvl2->id, 'title' => 'Noticias Financieras', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat4->id, 'level_id' => $lvl2->id, 'title' => 'Mejores juegos blockchain', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat4->id, 'level_id' => $lvl2->id, 'title' => 'Conoce la magia de los NFT', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat2->id, 'level_id' => $lvl2->id, 'title' => 'Descubre el poder del diseño', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat2->id, 'level_id' => $lvl2->id, 'title' => 'Crea tu primer pack de stickers', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat2->id, 'level_id' => $lvl2->id, 'title' => 'Diseña el arte del futuro', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat4->id, 'level_id' => $lvl2->id, 'title' => 'Todo lo que debes saber antes de invertir', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat2->id, 'level_id' => $lvl2->id, 'title' => 'Master en edición audiovisual', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat2->id, 'level_id' => $lvl2->id, 'title' => 'Los mejores lenguajes de programación', 'start_date' => '2025-01-01 00:00:00']);
      Course::create(['user_id' => 1, 'category_id' => $cat7->id, 'level_id' => $lvl2->id, 'title' => 'Aprende a liderar equipos', 'start_date' => '2025-01-01 00:00:00']);
    }
}