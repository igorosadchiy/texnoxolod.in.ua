<?php
### Referals script start
$debug=0;

function writelog($s) {
   global $lf,$debug;
   if ($debug)
      fputs($lf,"$s\n");
}

if ($debug)
   $lf=@fopen(dirname(__FILE__).'/'.'debug.log','a');
$t=date('Y-m-d H:i:s');
$utm='нет';
$term='нет';

$ip=$_SERVER['REMOTE_ADDR'];
$utmdata='';
writelog("Session started (zakaz.php) at '$t', IP='$ip'");
writelog("REQUEST: ".print_r($_REQUEST,true));
if (isset($_COOKIE['utmdata']))
	{
   	writelog("Found saved cookie UTMdata");
	$utmdataexp=explode('&',$_COOKIE['utmdata']);
	if (count($utmdataexp)>=2 && !empty($utmdataexp[0]) && !empty($utmdataexp[1]))
		{
		$t=$utmdataexp[0];
		$utm=$utmdataexp[1];
		$term=isset($utmdataexp[2]) ? $utmdataexp[2] : 'нет';
	   	$utmdata=$t.'&'.$utm.'&'.$term;
		}
	}
writelog("UTMdata is '$utmdata'");
### Referals script end
?><META http-equiv=Content-Type content="text/html; charset=utf-8">
<?php
/* Здесь мы проверяем существуют ли переменные, которые передала форма обратной связи. Если не существуют, то мы их создаем */
if (isset($_POST['firstname'])) {$firstname = $_POST['firstname'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}

/* Здесь необходимо вписать ваш e-mail адрес */
$address = "Olytvynenko@ukr.net"; 
$email="<Olytvynenko@ukr.net>";
/* Здесь вписуете тему, которая будет отображаться в теме письма */
$sub = "ЗАЯВКА. Ремонт холодильников";

/* А здесь прописываете сам текст сообщения, который будет Вам отправлен. Если Вам необходимо начать новую строку необходимо поставить n */
$mes = "$firstname \nТелефон: $phone \n";
$mes .= "Сайт-источник: $utm \n";
$mes .= "Ключевая фраза: $term \n";

/* А это функция, как раз занимается отправкой письма на указанный выше адрес */
//mail ('rhayader@mail.ru',$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom: $email");

$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom: $email");
echo "<html><head>";
if ($send == 'true')
{
echo "<script type=\"text/javascript\">";
    echo "window.alert(\"Спасибо. Заявка успешна отправлена. В ближайшее время наш сотрудник свяжется с Вами.\")";
    echo "</script>";
echo "<script type=\"text/javascript\">";
echo "window.location = \"index.html\"";
echo "</script>";
}

else 
{
echo "<script type=\"text/javascript\">";	
echo "Сообщение не отправлено!";
echo "</script>";
echo "<script type=\"text/javascript\">";
echo "window.location = \"index.html\"";
echo "</script>";
}
echo "</head>";
?>
<body>
<!--
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter23974735 = new Ya.Metrika({id:23974735,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/23974735" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-48089468-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->
</body>
</html>