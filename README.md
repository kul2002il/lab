
# Набор утилит для форматирования вывода на печать

## Блочные элементы

### Автосодержание

	<h2 class="ignoreIndex">Содержание</h2>
	<div data-index="h2/h3/h4/h5/h6"></div>

Прописываются все уровни селекторов узлов для составления содержания.
Для исключение узла их автосодержания прописывается class="ignoreIndex".
Дочерние элементы class="ignoreIndex" включаются в автосодержание по стандартным
правилам.

Всё, что находится внутри блока автосодержания, будет удалено и перезаписано
самим содержанием.

Узлам, на которые ссылаются пункты содержания, будут автоматически присвоены
id с порядковым номером если ранее id не был определён.


### Блочная вставка

	<div class="img">
		<img src="img/1.png">
		<div>Подпись</div>
	</div>

