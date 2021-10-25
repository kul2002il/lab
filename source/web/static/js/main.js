
const MAX_TEXTAREA_HEIGHT = 250;

/*
Обработчик события input, изменяющий размер <textarea> в зависимости от содержимого.
*/
function resizeTextAreaWithContext(event)
{
	let elem = event.target;
	/*
		Так как elem.scrollHeight представляет собой всю прокручиваемую область,
		то он также и является пустым местом от предыдущего расширения области,
		которую следует сначала убрать.
	*/
	elem.style.height = "1px";
	let height = elem.scrollHeight;
	if(height < MAX_TEXTAREA_HEIGHT)
	{
		let parentHeigt = elem.parentElement.offsetHeight;
		if(height < parentHeigt)
		{
			elem.style.height = parentHeigt + "px";
		}
		else
		{
			elem.style.height = height + "px";
		}
		elem.style.overflow = "hidden";
	}
	else
	{
		elem.style.height = MAX_TEXTAREA_HEIGHT + "px";
		elem.style.overflow = "";
	}
}

//Включение изменения размеров для всех textarea.autogrow элементов.
document.querySelectorAll("textarea.autogrow").forEach(e=>{
	e.addEventListener("input", resizeTextAreaWithContext);
});

//Первое приведение в нормальный размер.
document.querySelectorAll("textarea.autogrow").forEach(e=>{
	e.dispatchEvent(new Event('input'));
});