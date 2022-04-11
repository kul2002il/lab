<?php
function read_folder($folder)
{
	$files = scandir($folder);
	$out = [];
	foreach($files as $file)
	{
		if ($file == '.' || $file == '..') continue;
		$fullfilename = $folder . '/' . $file;
		if (is_dir($fullfilename))
			$out = array_merge($out, read_folder($fullfilename));
			else
				array_push($out, $fullfilename);
	}
	return $out;
}

$sources = read_folder("source");
$files = [];
foreach ($sources as $source)
{
	$matches = [];
	preg_match('#^source/(.*)$#', $source, $matches);
	$name = $matches[1];
	$files = array_merge($files, [
		$name => $source
	]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Практическая работа</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="static/style.css">
	<script src="static/main.js"></script>
	<style>
	@page{
		size: A4; /*landscape*/
		margin: 0.5cm 0.5cm 0.5cm 2cm;
	}
	header {
		display: table-header-group;
	}
	main {
		display: table-row-group;
	}
	footer {
		display: table-footer-group;
	}
	body{
		counter-reset: image;
		counter-reset: code;
	}
	.border-header{
		border-top: 1mm solid black;
		height: 0.5cm;
	}
	footer>.spase-bottom
	{
		height: 0.5cm;
	}
	.border-footer{
		border-top: 1mm solid black;
	}
	footer>.border{
		font-size: 9pt;
		border-top: 1mm solid black;
		border-bottom: 1mm solid black;
	}
	footer table{
		background-color: black;
		width: calc(100% + 4px);
		margin: -2px;
	}
	footer table td{
		background-color: white;
	}
	.number-CP{
		font-size: 19pt;
		text-align: center;
	}
	.number-page{
		font-size: 16pt;
	}
	main > div{
		margin-right: 1cm;
		margin-left: 1cm;
	}
	p{
		margin-block-start: 0;
		margin-block-end: 0;
	}
	b, h1, h2, h3, h4, h5{
		font-weight: inherit;
		font-size: 14pt;
	}
	.layer
	{
		position: absolute;
		top:0;
		right: 0;
		left: 0;
	}
	.layer-page
	{
		position: relative;
	}
	.number-page
	{
		position: absolute;
		display: inline-block;
		bottom: 10px;
		right: 20px;
		font-size: 16pt;
	}
	.top-right-page
	{
		position: absolute;
		display: inline-block;
		top: 0;
		right: 1cm;
	}
	main>div
	{
		min-height: 200mm;
	}
	.img-label::before
	{
		counter-increment: image;
		content: "Рисунок " counter(image) ". ";
	}
	.code-label::before
	{
		counter-increment: code;
		content: "Listing " counter(code) ". ";
	}
	section
	{
		page-break-after: always;
	}
	section.border
	{
		border-right: 1mm solid black;
		border-left: 1mm solid black;
	}
	pre
	{
		color: initial;
		background-color: initial;
		border: 1px solid black;
	}
	</style>
	<script type="text/javascript">
	layers.pager =
	{
		pages:
		{
			start: -1,
			from: 3,
			to: 26,
		},
	};
	layers.add1 =
	{
		add1: 27,
		add2: 124,
		pages:
		{
			start: -2,
			from: 27,
			to: 131,
		},
	};
	</script>
</head>
<body>
<section class="border">
	<header>
		<div class="border-header">
		</div>
	</header>
	<footer>
		<div class="spase-bottom"></div>
		<div class="border-footer"></div>
	</footer>
	<main>
		<div class="title_page">

			<div>
				ДЕПАРТАМЕНТ ПРОФЕССИОНАЛЬНОГО ОБРАЗОВАНИЯ<br/>
				ТОМСКОЙ ОБЛАСТИ<br/>
				ОБЛАСТНОЕ ГОСУДАРСТВЕННОЕ БЮДЖЕТНОЕ ПРОФЕССИОНАЛЬНОЕ
				ОБРАЗОВАТЕЛЬНОЕ УЧРЕЖДЕНИЕ<br/>
				«ТОМСКИЙ ТЕХНИКУМ ИНФОРМАЦИОННЫХ ТЕХНОЛОГИЙ»
			</div>

			<div class="discipline">
				Специальность 090207 «Информационные системы и программирование»
			</div>

			<div class="title_work">
				Отчёт по производственной практике<br/>
				ОПП.22.090207.482.06.ПЗ<br/>
			</div>

			<div class="signature">
				<table>
					<tr>
						<td>Студент<br/>«__»________ 2022 г.</td>
						<td>_________________</td>
						<td>Кулманаков И.В.</td>
					</tr>
					<tr>
						<td>Руководитель<br/>«__»________ 2022 г.</td>
						<td>_________________</td>
						<td>Безходарнов И.В.</td>
					</tr>
				</table>
			</div>

			<div>Томск 2022</div><div></div>
		</div>
		<div></div>
	</main>
</section>
<section class="border">
	<header>
		<div class="border-header">
		</div>
	</header>
	<footer>
		<div class="spase-bottom"></div>
		<div class="border">
			<table>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td rowspan="3" colspan="6" class="number-CP">
						ОПП.22.090207.482.06.ПЗ
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-align: center;">Изм.</td>
					<td style="text-align: center;">Лист</td>
					<td style="text-align: center;">№ докум.</td>
					<td style="text-align: center;">Подпись</td>
					<td style="text-align: center;">Дата</td>
				</tr>
				<tr>
					<td colspan="2">Разраб.</td>
					<td></td>
					<td></td>
					<td></td>

					<td rowspan="5" class="number-CP"><!--
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br> -->
						Пояснительная записка
					</td>

					<td colspan="3" style="text-align: center;">Лит.</td>
					<td style="text-align: center;">Лист</td>
					<td style="text-align: center;">Листов</td>
				</tr>
				<tr>
					<td colspan="2">Провер.</td>
					<td></td>
					<td></td>
					<td></td>

					<td></td>
					<td></td>
					<td></td>
					<td>2</td>
					<td>131</td>
				</tr>
				<tr>
					<td colspan="2">Реценз</td>
					<td></td>
					<td></td>
					<td></td>

					<td rowspan="3" colspan="5" class="number-CP">ТТИТ 482 гр.</td>
				</tr>
				<tr>
					<td colspan="2">Н. Контр.</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">Утверд.</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	</footer>
	<main>
		<div>
			<h3 class="ignoreIndex">Содержание</h3>

			<!--<div data-index="h2/h3"></div> -->
			<table style="width: 100%">
				<tr>
					<td>Введение</td>
					<td>3</td>
				</tr>
				<tr>
					<td>1. ОБЩАЯ ЧАСТЬ</td>
					<td>6</td>
				</tr>
				<tr>
					<td>1.1 Анализ предметной области</td>
					<td>6</td>
				</tr>
				<tr>
					<td>1.2 Выбор средств и сред разработки</td>
					<td>8</td>
				</tr>
				<tr>
					<td>2. СПЕЦИАЛЬНАЯ ЧАСТЬ</td>
					<td>9</td>
				</tr>
				<tr>
					<td>2.1 Описание требований к информационной системе</td>
					<td>9</td>
				</tr>
				<tr>
					<td>2.2 Диаграмма вариантов использования</td>
					<td>14</td>
				</tr>
				<tr>
					<td>2.3 Диаграмма состояний</td>
					<td>15</td>
				</tr>
				<tr>
					<td>2.4 Схема данных</td>
					<td>16</td>
				</tr>
				<tr>
					<td>2.6 Описание API</td>
					<td>17</td>
				</tr>
				<tr>
					<td>ЗАКЛЮЧЕНИЕ</td>
					<td>25</td>
				</tr>
				<tr>
					<td>Перечень используемых источников</td>
					<td>26</td>
				</tr>
				<tr>
					<td>Приложение А. Листинг программы</td>
					<td>27</td>
				</tr>
				<tr>
					<td>Приложение Б. Инструкция пользователя</td>
					<td>124</td>
				</tr>
			</table>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div></div>
	</main>
</section>
<section class="border">
	<header>
		<div class="border-header"></div>
	</header>
	<footer>
		<div class="spase-bottom"></div>
		<div class="border">
			<table>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td rowspan="3" class="number-CP">ОПП.22.090207.482.06.ПЗ</td>
					<td>Лист</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td rowspan="2">
					</td>
				</tr>
				<tr>
					<td>Изм.</td>
					<td>Лист</td>
					<td>№ докум.</td>
					<td>Подпись</td>
					<td>Дата</td>
				</tr>
			</table>
		</div>
	</footer>
	<main>
		<div>
			<div data-layer="pager">
				<div class="number-page">{{pageNumber}}</div>
			</div>
			<h2>Введение</h2>

			<h3>Описание места практики</h3>
			<h4>Основная информация</h4>
			<p>
				Томсксофт занимается разработкой программного обеспечения.
			</p>
			<p>
				Самые крупные проекты связаны с передачей и обработкой
				мультимедиа информации, формированием соцсетей для общения между
				пользователями этих проектов и технологическими инструментами
				для обработки мультимедиа.
				Каждый из таких проектов содержит несколько компонентов,
				включая, но не ограничиваясь:
			</p>
			<ol>
				<li>Приложения для десктопных компьютеров</li>
				<li>ВЕБ-сайты и сервисы</li>
				<li>Сетевые сервисы, обслуживающие до нескольких сотен тысяч он-лайн пользователей одновременно</li>
				<li>Приложения для мобильных ОС</li>
				<li>Системы мониторинга и защиты от сетевых атак</li>
			</ol>
			<h4>Организация работы</h4>
			<p>
				Каждая команда раз в неделю собирается в Zoom конференции,
				с участием представителя руководства компании для разбора
				сделанных за прошедшую неделю задач, решенных и нерешенных
				проблем, планирования действий на неделю.
				Остальные организационные принципы устанавливаются конкретной
				рабочей группой самостоятельно.
			</p>

			<h4>Структура компании</h4>
			<p>
				Компания состоит из следующих отделов:
			</p>
			<ol>
				<li>Администрация</li>
				<li>Отдел сетевых разработок</li>
				<li>Отдел разработки приложений</li>
				<li>Отдел системного администрирования и мониторинга</li>
				<li>Multimedia development department</li>
				<li>Отдел дизайна</li>
				<li>Отдел качества ПО и документирования</li>
				<li>Рабочие группы по проектам</li>
			</ol>
			<p>
				Принят в отдел рабочей группы по разработке сайта компании.
				Данный отдел помимо разработки и сопровождения сайта компании
				занимается:
			</p>
			<ol>
				<li>сопровождением существующего сайта,</li>
				<li>сопровождением существующей внутрекорпоративной системы,</li>
				<li>разработкой нового сайта компании,</li>
				<li>разработкой новой внутрекорпоративной системы.</li>
			</ol>
			<p>
				Поставленной задачей является создание API для существующей
				системы с целью интеграции со сторонними сервисами.
			</p>

			<h3>Актуальность</h3>

			<h3>Объект и предмет проекта</h3>
			<p>
				<b>Объект</b>: Информационное взаимодействие внутренних сервисов
				компании Томсксофт с единой внутрикорпоративной системой.
			</p>
			<p>
				<b>Предмет</b>: Интеграция взаимодействия внутренних сервисов
				компании Томсксофт с единой внутрикорпоративной системой.
			</p>

			<h3>Цель проекта</h3>
			<p>
				Разработка информационной системы для организации канала связи
				внутренних сервисов компании Томсксофт с внутрикорпоративной
				системой.
			</p>

			<h3>Задачи</h3>
			<ol>
				<li>
					Изучить особенности взаимодействия сервисов с
					внутрикорпоративной системой.
				</li>
				<li>
					Проанализировать возможности автоматизации данного процесса
				</li>
				<li>
					Рассмотреть существующие варианты программных продуктов,
					автоматизирующие данный процесс
				</li>
				<li>
					Определить основные технические и функциональные требования
					к разрабатываемой системе
				</li>
				<li>
					Выполнить работу по проектированию ИС с учетом заявленных
					требований
				</li>
				<li>
					Разработать спроектированную информационную систему
				</li>
				<li>
					Разработать документацию к API
				</li>
			</ol>

			<h3>Практическая значимость и ожидаемые результаты</h3>
			<p>
				В результате выполнения проекта, будет разработана
				информационная система, позволяющая сторонним сервисам
				обращаться к системе для автоматизации комплекса используемых
				компании сервисов.
			</p>
		</div>

		<!--Анализ объекта-->
		<div>
			<h2>ОБЩАЯ ЧАСТЬ</h2>
			<h3>Анализ предметной области</h3>
			<p>
				В компании Томсксофт имеется множество сотрудников.
				Для учёта рабочего процесса и времени которых применяется внутренняя
				intranet-система.
			</p>
			<p>
				Данная система разработана для
			</p>
			<ol>
				<li>Размещения внутрикорпоративной информации</li>
				<li>Автоматизированной рассылки данных</li>
				<li>Оповещения сотрудников посредством электронной почты</li>
				<li>Размещение файлов</li>
				<li>Хранение учётных данных внешних корпоративных сервисов (логины и пароли)</li>
				<li>Предупреждение коллег о изменении рабочего времени</li>
				<li>Ведение информации о проектах</li>
				<li>Ведение информации о запланированной и проделанной работе</li>
			</ol>
			<p>
				Также система содержит в себе вывод простых отчётов на основе фильтров
				на web-страницу, после чего пользователь может использовать полученные
				данные для своих нужд:
			</p>
			<ol>
				<li>Бухгалтер для расчёта зарплаты</li>
				<li>Администрация для учёта рабочего времени и отпусков</li>
				<li>Руководители проектов для контроля прогресса разработки</li>
				<li>И многие другие</li>
			</ol>
			<p>
				С развитием сторонних систем надобность в ручном расчёте постепенно пропадает
				и всю работу пользователей составляет рутинный перенос данных из web-страницы
				в сторонний сервис.
			</p>
			<p>
				К сторонним сервисам можно отнести:
			</p>
			<ol>
				<li>1С для расчёта заработной платы бухгалтерией</li>
				<li>1С для расчёта отпусков администрацией</li>
				<li>Почтовая служба для рассылок писем</li>
				<li>Планируемая служба для автоматической генерации записей
					и проверки рабочего времени на основе внешних источников</li>
				<li>И многие другие</li>
			</ol>
			<p>
				Исходя из всего вышеперечисленного было принято решение создать
				систему для интеграции данных компании со сторонними сервисами
				с целью автоматизации обработки и передачи данных.
			</p>
		</div>

		<div>
			<h3>Выбор средств и сред разработки</h3>
			<p>
				В качестве средств и сред разработки выбраны
				язык программирования PHP8,
				фреймворк Laravel
				пакет Laravel Sanctum для авторизации и
				пакет kirschbaum-development/eloquent-power-joins
				для построителя запросов.
			</p>
			<p>
				Laravel — бесплатный веб-фреймворк с открытым кодом,
				предназначенный для разработки с использованием архитектурной
				модели MVC (англ. Model View Controller —
				модель-представление-контроллер).
				Laravel выпущен под лицензией MIT.
			</p>
			<p>
				Фреймворк отлично документирован: документация есть ко всему
				и на нескольких языках, в том числе на русском.
				Также каждый метод имеет шапку в PHPDoc.
			</p>
			<p>
				Можно выделить следующие плюсы:
			</p>
			<ol>
				<li>Установка с помощью Composer</li>
				<li>Высокая производительность</li>
				<li>Встроеная валидация форм</li>
				<li>Возможность подключения сторонних библиотек</li>
				<li>Использование миграций баз данных</li>
				<li>Поддержка автоматического модульного и интеграционного
					тестирования</li>
				<li>CLI для автоматизации разработки</li>
			</ol>
			<p>
				Laravel Sanctum предлагает легковесную систему аутентификации
				для SPA (одностраничных приложений), мобильных приложений
				и простых API на основе токенов.
				Sanctum позволяет каждому пользователю вашего приложения
				создавать несколько токенов API для своей учетной записи.
				Этим токенам могут быть предоставлены полномочия / области,
				которые определяют, какие действия токенам разрешено выполнять.
			</p>
		</div>

		<!--Описание требований к системе-->
		<div>
			<h2>СПЕЦИАЛЬНАЯ ЧАСТЬ</h2>
			<h3>Описание требований к информационной системе</h3>

			<h4>Описание функций неавторизованного пользователя</h4>

			<h5>Авторизация</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Ник</li>
				<li>Пароль</li>
			</ol>
			<p>Выходные данные:</p>
			<ol>
				<li>Токен для взаимодействия с API</li>
			</ol>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Считывает данные, отправленные в запросе
				</li>
				<li>
					Валидирует данные.
					Если имеются не верно заполненные поля, то возвращается
					HTTP код ошибки и предупреждающее сообщение в теле ответа.
				</li>
				<li>
					Если пользователь не смог войти, то возвращается
					HTTP код ошибки и предупреждающее сообщение в теле ответа.
				</li>
				<li>
					Если пользователь успешно вошел, то выдаётся токен
					пользователя для дальнейшего взаимодейсвия с API.
				</li>
			</ol>

			<h4>Описание функций авторизованного пользователя</h4>

			<p>
				Для авторизации необходимо предоставить токен в заголовке
				X-Auth-Key.
			</p>

			<h5>Создание токенов для внешних сервисов</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Название токена</li>
				<li>Предоставляемые права</li>
			</ol>
			<p>Выходные данные:</p>
			<ol>
				<li>Токен</li>
			</ol>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Создание токена с заданными именем и правами.
				</li>
				<li>
					Отправка токена пользователю.
				</li>
			</ol>

			<h5>Просмотр созданных токенов пользователя</h5>
			<p>Входные данные: —.</p>
			<p>Выходные данные:</p>
			<ol>
				<li>Список имён токенов и их прав</li>
			</ol>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Выборка токенов пользователя по данным аутентификации.
				</li>
				<li>
					Отправка пользвоателю.
				</li>
			</ol>

			<h5>Просмотр токена</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Название токена</li>
			</ol>
			<p>Выходные данные:</p>
			<ol>
				<li>Имя токена</li>
				<li>Права</li>
				<li>Дата и время изменения</li>
				<li>Дата и время последнего использования</li>
			</ol>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Выборка токена пользователя по его имени.
				</li>
				<li>
					Отправка пользователю.
				</li>
			</ol>

			<h5>Редактирование токена</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Старое название токена</li>
				<li>Новое название токена</li>
				<li>Список прав токена</li>
			</ol>
			<p>Выходные данные:</p>
			<ol>
				<li>Имя токена</li>
				<li>Права</li>
				<li>Дата и время последнего использования</li>
			</ol>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Выборка токена пользователя по его имени.
				</li>
				<li>
					Изменение токена.
				</li>
				<li>
					Если пользователь не обладает правами,
					которые хочет назначить токену, то эти права игнорируются
					и выдаются соответствующие сообщения.
				</li>
				<li>
					Отправка ответа пользователю.
				</li>
			</ol>

			<h5>Удаление токена</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Название токена</li>
			</ol>
			<p>Выходные данные: —.</p>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Выборка токена пользователя по его имени.
				</li>
				<li>
					Удаление токена.
				</li>
				<li>
					Отправка ответа пользователю.
				</li>
			</ol>

			<h5>Отчёт по часам</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Дата начала отчётного периода</li>
				<li>Дата конца отчётного периода</li>
			</ol>
			<p>Выходные данные — список, где каждый элемент содержит:</p>
			<ol>
				<li>Ник сотрудника</li>
				<li>ФИО сотрудника</li>
				<li>Департамент</li>
				<li>Сумма отработанных часов за заданный период</li>
			</ol>
			<p>При этом один сотрудник входит в список только один раз.</p>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Выборка данных для отчёта
				</li>
				<li>
					Отправка результата.
				</li>
			</ol>

			<h5>Отчёт по часам, сруппированный по проектам</h5>
			<p>Входные данные:</p>
			<ol>
				<li>Дата начала отчётного периода</li>
				<li>Дата конца отчётного периода</li>
			</ol>
			<p>Выходные данные — список, где каждый элемент содержит:</p>
			<ol>
				<li>Ник сотрудника</li>
				<li>ФИО сотрудника</li>
				<li>Департамент</li>
				<li>Данные проекта (id и название)</li>
				<li>Данные заказчика (id и название)</li>
				<li>Сумма отработанных часов за заданный период</li>
			</ol>
			<p>При этом один сотрудник входит в список только один раз.</p>
			<p>Описание поведения:</p>
			<ol>
				<li>
					Выборка данных для отчёта
				</li>
				<li>
					Отправка результата.
				</li>
			</ol>


			<h3>Описание требований к среде выполнения</h3>

			<h4>Требования серверной части</h4>
			<p>Операционная система:</p>
			<ul>
				<li>Debian 10</li>
			</ul>
			<p>Версии ПО:</p>
			<ul>
				<li>Appache 2.4.41</li>
				<li>PHP 7.4.3</li>
				<li>MySQL 15.1</li>
			</ul>
			<p>Аппаратное обеспечение:</p>
			<ul>
				<li>Процессор – Intel Core i3, частота 2GHz</li>
				<li>Оперативная память – 6 Гб</li>
				<li>Жесткий диск – 1ТБ</li>
			</ul>

			<h4>Требования клиентской части</h4>
			<ul>
				<li>Возможность отправлять HTTP запросы</li>
				<li>Поддержка JSON</li>
			</ul>
		</div>

		<!--Диаграмма вариантов использования-->
		<div>
			<h3>Диаграммы вариантов использования</h3>
			<div class="img">
				<img src="img/Диаграммы/use_case/TO-BE.svg">
				<div class="img-label">Диаграмма вариантов использования</div>
			</div>
		</div>

		<!--Диаграммы состояний-->
		<div>
			<h3>Диаграммы состояний</h3>
			<div class="img">
				<img src="img/Диаграммы/state/SPA.svg">
				<div class="img-label">Диаграмма состояний абстрактного SPA</div>
			</div>
		</div>

		<!--Диаграмма БД-->
		<div>
			<h3>Схема данных</h3>
			<div class="img">
				<img src="img/Диаграммы/BD/AS-IS.svg">
				<div class="img-label">Диаграмма базы данных</div>
			</div>
		</div>

		<!--Прототип интерфейса-->
		<div>
			<h3>Прототип спецификации api</h3>

			<h4>Authenticating requests</h4>
			<p>
				Authenticate requests to this API's endpoints by sending a
				<b>X-Auth-Key</b>b> header with the value
				<b>"{YOUR_AUTH_KEY}"</b>.
			</p>
			<p>
				All authenticated endpoints are marked with a
				<b>requires authentication</b> badge in the documentation below.
			</p>
			<p>
				You can get a token along the route /api/login (by nick and
				password) or /api/token (by exist token) with POST method
			</p>

			<h4>Tokens</h4>
			<h5>Token generation</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Request: POST api/token.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>name string — Token name.</li>
			</ol>
			<div class="img">
				<pre>
curl --request POST \
    "http://localhost/api/token" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"report-service\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "report-service",
        "token": "{YOUR_AUTH_KEY}"
    }
}</pre>
				<div class="code-label">Example response (201)</div>
			</div>

			<h5>Read all authorized user tokens</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Request: GET api/token .
			</p>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/token" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "tokens": [
            {
                "name": "login",
                "abilities": [
                    "*"
                ],
                "last_used_at": "2022-04-01T11:17:50.000000Z"
            },
            {
                "name": "report-service",
                "abilities": [
                    "*"
                ],
                "last_used_at": null
            }
        ]
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h5>Read an authorized user tokens</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Request: GET api/token/{token_name}.
			</p>
			<p>
				URL Parameters:
			</p>
			<ol>
				<li>token_name string — user token name</li>
			</ol>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/token/report-service" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "report-service",
        "abilities": [
            "*"
        ],
        "last_used_at": null
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h5>Edit token</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Edit token name and rights.
				Rights will be used only those that are available to the user
				of the token.
			</p>
			<p>
				Token key stays the same.
			</p>
			<p>
				Request: PUT api/token/{token_name}.
			</p>
			<p>
				URL Parameters:
			</p>
			<ol>
				<li>token_name string — user token name</li>
			</ol>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>name string — token name</li>
				<li>abilities  string[] optional — list of rules</li>
			</ol>
			<div class="img">
				<pre>curl --request PUT \
    "http://localhost/api/token/report-service" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"report-service\",
    \"abilities\": [
        \"*\"
    ]
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "report-service",
        "abilities": [
            "report:getShort",
            "report:getByProject"
        ],
        "last_used_at": null
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h5>Deleting a token</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Removing an authorized user token by token name.
			</p>
			<p>
				Request: DELETE api/token/{token_name}.
			</p>
			<p>
				URL Parameters:
			</p>
			<ol>
				<li>token_name string — user token name</li>
			</ol>
			<div class="img">
				<pre>curl --request DELETE \
    "http://localhost/api/token/report-service" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>[Empty response]</pre>
				<div class="code-label">Example response (204)</div>
			</div>

			<h4>Users</h4>

			<h5>Authentication</h5>
			<p>
				User authentication. A token is issued for the user's nick
				and password for further interaction with the api.
			</p>
			<p>
				The token is created under the name "login" and is available
				like other tokens.
			</p>
			<p>
				If a "login" token previously existed, it is removed and a new
				user token is generated.
			</p>
			<p>
				Request: POST api/login.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>nick string — user nick</li>
				<li>password string — user password</li>
			</ol>
			<div class="img">
				<pre>curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nick\": \"testuser\",
    \"password\": \"password\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "login",
        "token": "{YOUR_AUTH_KEY}"
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h4>Отчёт по часам</h4>

			<h5>Короткий отчёт</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Получение короткого отчёта о часах сотрудников за определённый период дней.
			</p>
			<p>
				Простая сумма времени, указанного в блогах, сгруппированные по сотрудникам.
			</p>
			<p>
				Request: GET api/report/hours/short.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>
					start_date  string optional — Дата начала периода отчёта.
					Включительно. Must be a valid date.
				</li>
				<li>
					end_date  string optional — Дата конца периода отчёта.
					Включительно. Must be a valid date.
				</li>
			</ol>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/report/hours/short" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2001-10-08\",
    \"end_date\": \"2016-10-08\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "count_reports": 2,
        "reports": [
            {
                "nick": "nherman",
                "name": "Myrna Toy II",
                "company": "ТС",
                "total_hours": 4.7
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "total_hours": 8.200000000000001
            }
        ]
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h5>Отчёт по проектам</h5>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Получение отчёта о часах сотрудников по проектам за определённый
				период дней.
			</p>
			<p>
				Если на одном проекте работало несколько сотрудников,
				то создаётся несколько записей в массиве "reports" с одинаковым
				значением полей, относящихся к проекту.
			</p>
			<p>
				Request: GET api/report/hours/project.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>
					start_date  string optional — Дата начала периода отчёта.
					Включительно. Must be a valid date.
				</li>
				<li>
					end_date  string optional — Дата конца периода отчёта.
					Включительно. Must be a valid date.
				</li>
			</ol>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/report/hours/project" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2001-10-08\",
    \"end_date\": \"2016-10-08\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "count_reports": 4,
        "reports": [
            {
                "nick": "nherman",
                "name": "Myrna Toy II",
                "company": "ТС",
                "customer_id": 24,
                "customer_name": "est explicabo nesciunt",
                "project_id": 26,
                "project_name": "dolores neque quae",
                "total_hours": 4.7
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "customer_id": 28,
                "customer_name": "aut et voluptatem",
                "project_id": 12,
                "project_name": "dicta reiciendis asperiores",
                "total_hours": 4.4
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "customer_id": 15,
                "customer_name": "quo voluptas porro",
                "project_id": 16,
                "project_name": "est voluptas voluptates",
                "total_hours": 2.2
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "customer_id": 23,
                "customer_name": "non aut nisi",
                "project_id": 30,
                "project_name": "assumenda et sequi",
                "total_hours": 1.6
            }
        ]
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>
		</div>


		<div>
			<h2>ЗАКЛЮЧЕНИЕ</h2>
			<p>
				В ходе выполнения курсовой работы было разработано приложение
				для интеграции сервисов с данными компании Томсксофт.
			</p>
			<p>
				Данное приложение является первой версией и закладывает
				основу для развития.
			</p>
			<h3>Реализованный функционал</h3>
			<p>
				В ходе выполнения работы был разработан следующий
				функционал системы:
			</p>
			<ol>
				<li>
					Авторизация
				</li>
				<li>
					CRUD токенов
				</li>
				<li>
					Формирование отчётных данных по часам сотрудников
					и по часам сотрудников по проектам
				</li>
				<li>
					Автоматические тесты разрабатываемой системы
				</li>
			</ol>
		</div>


		<div>
			<h3>Список использованной литературы</h3>
			<ol>
				<li>
					Официальная документация Laravel [Электронный ресурс] URL:
					https://laravel.com/
					(дата обращения: 10.04.2022)
				</li>
				<li>
					Документация Laravel от сообщества [Электронный ресурс] URL:
					https://laravel.su/docs/8.x/
					(дата обращения: 10.04.2022)
				</li>
				<li>
					Документация Laravel Sanctum от сообщества [Электронный ресурс] URL:
					https://laravel.su/docs/8.x/sanctum
					(дата обращения: 10.04.2022)
				</li>
				<li>
					Официальная документация php [Электронный ресурс] URL:
					https://www.php.net
					(дата обращения: 10.04.2022)
				</li>
				<li>
					Laravel — Википедия [Электронный ресурс] URL:
					https://ru.wikipedia.org/wiki/Laravel
					(дата обращения: 10.04.2022)
				</li>
			</ol>
		</div>

		<div></div>
	</main>
</section>
<section class="addiction">
	<header>
		<div>
			&nbsp;
		</div>
	</header>
	<footer>
		<div>&nbsp;</div>
	</footer>
	<main>
		<div>
			<div data-layer="add1">
				<div class="number-page">{{pageNumber}}</div>
			</div>

			<h3>Код системы</h3>
			<?php
			foreach ($files as $key => $val)
			{
				$code = file_get_contents($val);
				$code = htmlspecialchars($code);
				?>
				<h4 style="text-align: center"><?=$key?></h4>
				<pre><?=$code?></pre>
				<?php
			}
			?>
		</div>
	</main>
</section>
<section class="addiction">
	<header>
		<div>
			&nbsp;
		</div>
	</header>
	<footer>
		<div>&nbsp;</div>
	</footer>
	<main>
		<div>
			<h2>Documentation API</h2>

			<h3>Authenticating requests</h3>
			<p>
				Authenticate requests to this API's endpoints by sending a
				<b>X-Auth-Key</b>b> header with the value
				<b>"{YOUR_AUTH_KEY}"</b>.
			</p>
			<p>
				All authenticated endpoints are marked with a
				<b>requires authentication</b> badge in the documentation below.
			</p>
			<p>
				You can get a token along the route /api/login (by nick and
				password) or /api/token (by exist token) with POST method
			</p>

			<h3>Tokens</h3>
			<h4>Token generation</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Request: POST api/token.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>name string — Token name.</li>
			</ol>
			<div class="img">
				<pre>
curl --request POST \
    "http://localhost/api/token" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"report-service\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "report-service",
        "token": "{YOUR_AUTH_KEY}"
    }
}</pre>
				<div class="code-label">Example response (201)</div>
			</div>

			<h4>Read all authorized user tokens</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Request: GET api/token .
			</p>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/token" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "tokens": [
            {
                "name": "login",
                "abilities": [
                    "*"
                ],
                "last_used_at": "2022-04-01T11:17:50.000000Z"
            },
            {
                "name": "report-service",
                "abilities": [
                    "*"
                ],
                "last_used_at": null
            }
        ]
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h4>Read an authorized user tokens</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Request: GET api/token/{token_name}.
			</p>
			<p>
				URL Parameters:
			</p>
			<ol>
				<li>token_name string — user token name</li>
			</ol>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/token/report-service" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "report-service",
        "abilities": [
            "*"
        ],
        "last_used_at": null
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h4>Edit token</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Edit token name and rights.
				Rights will be used only those that are available to the user
				of the token.
			</p>
			<p>
				Token key stays the same.
			</p>
			<p>
				Request: PUT api/token/{token_name}.
			</p>
			<p>
				URL Parameters:
			</p>
			<ol>
				<li>token_name string — user token name</li>
			</ol>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>name string — token name</li>
				<li>abilities  string[] optional — list of rules</li>
			</ol>
			<div class="img">
				<pre>curl --request PUT \
    "http://localhost/api/token/report-service" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"report-service\",
    \"abilities\": [
        \"*\"
    ]
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "report-service",
        "abilities": [
            "report:getShort",
            "report:getByProject"
        ],
        "last_used_at": null
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h4>Deleting a token</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Removing an authorized user token by token name.
			</p>
			<p>
				Request: DELETE api/token/{token_name}.
			</p>
			<p>
				URL Parameters:
			</p>
			<ol>
				<li>token_name string — user token name</li>
			</ol>
			<div class="img">
				<pre>curl --request DELETE \
    "http://localhost/api/token/report-service" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>[Empty response]</pre>
				<div class="code-label">Example response (204)</div>
			</div>

			<h3>Users</h3>

			<h4>Authentication</h4>
			<p>
				User authentication. A token is issued for the user's nick
				and password for further interaction with the api.
			</p>
			<p>
				The token is created under the name "login" and is available
				like other tokens.
			</p>
			<p>
				If a "login" token previously existed, it is removed and a new
				user token is generated.
			</p>
			<p>
				Request: POST api/login.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>nick string — user nick</li>
				<li>password string — user password</li>
			</ol>
			<div class="img">
				<pre>curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nick\": \"testuser\",
    \"password\": \"password\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "name": "login",
        "token": "{YOUR_AUTH_KEY}"
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h3>Отчёт по часам</h3>

			<h4>Короткий отчёт</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Получение короткого отчёта о часах сотрудников за определённый период дней.
			</p>
			<p>
				Простая сумма времени, указанного в блогах, сгруппированные по сотрудникам.
			</p>
			<p>
				Request: GET api/report/hours/short.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>
					start_date  string optional — Дата начала периода отчёта.
					Включительно. Must be a valid date.
				</li>
				<li>
					end_date  string optional — Дата конца периода отчёта.
					Включительно. Must be a valid date.
				</li>
			</ol>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/report/hours/short" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2001-10-08\",
    \"end_date\": \"2016-10-08\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "count_reports": 2,
        "reports": [
            {
                "nick": "nherman",
                "name": "Myrna Toy II",
                "company": "ТС",
                "total_hours": 4.7
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "total_hours": 8.200000000000001
            }
        ]
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>

			<h4>Отчёт по проектам</h4>
			<p>
				<b>Requires authentication.</b>
			</p>
			<p>
				Получение отчёта о часах сотрудников по проектам за определённый
				период дней.
			</p>
			<p>
				Если на одном проекте работало несколько сотрудников,
				то создаётся несколько записей в массиве "reports" с одинаковым
				значением полей, относящихся к проекту.
			</p>
			<p>
				Request: GET api/report/hours/project.
			</p>
			<p>
				Body Parameters:
			</p>
			<ol>
				<li>
					start_date  string optional — Дата начала периода отчёта.
					Включительно. Must be a valid date.
				</li>
				<li>
					end_date  string optional — Дата конца периода отчёта.
					Включительно. Must be a valid date.
				</li>
			</ol>
			<div class="img">
				<pre>curl --request GET \
    --get "http://localhost/api/report/hours/project" \
    --header "X-Auth-Key: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2001-10-08\",
    \"end_date\": \"2016-10-08\"
}"</pre>
				<div class="code-label">Example request</div>
			</div>
			<div class="img">
				<pre>{
    "data": {
        "count_reports": 4,
        "reports": [
            {
                "nick": "nherman",
                "name": "Myrna Toy II",
                "company": "ТС",
                "customer_id": 24,
                "customer_name": "est explicabo nesciunt",
                "project_id": 26,
                "project_name": "dolores neque quae",
                "total_hours": 4.7
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "customer_id": 28,
                "customer_name": "aut et voluptatem",
                "project_id": 12,
                "project_name": "dicta reiciendis asperiores",
                "total_hours": 4.4
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "customer_id": 15,
                "customer_name": "quo voluptas porro",
                "project_id": 16,
                "project_name": "est voluptas voluptates",
                "total_hours": 2.2
            },
            {
                "nick": "sterling03",
                "name": "Oliver Daniel",
                "company": "ТС",
                "customer_id": 23,
                "customer_name": "non aut nisi",
                "project_id": 30,
                "project_name": "assumenda et sequi",
                "total_hours": 1.6
            }
        ]
    }
}</pre>
				<div class="code-label">Example response (200)</div>
			</div>
		</div>
		<div></div>
	</main>
</section>
</body>
</html>
