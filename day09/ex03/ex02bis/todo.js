$(document).ready(function()
{
	var ft_button = $('#ft_but');
	var ft_list = $("#ft_list");
	if (ft_button)
		ft_button.click(addNew);
	var ca = document.cookie;
	if (ca)
	{
		cooks_in = JSON.parse(ca);
		cooks_in.forEach(function (elem){createTask(elem);});
	}
});


window.onunload = function ()
{
	var cooks = ft_list.children;
	var cooks_js = [];
	for (var i = 0; i < cooks.length; i++)
		cooks_js.unshift(cooks[i].innerHTML);
	document.cookie = JSON.stringify(cooks_js);
}

function addNew()
{
	var ft_task_name = prompt("Please enter task name", "New task");

	if (ft_task_name == null)
		return null;
	ft_task_name = ft_task_name.trim();
	if (ft_task_name.length > 0)
		createTask(ft_task_name);
}

function createTask(name)
{
	$('<div/>',{
		text: name,
		class: 'li_Elem'
	}).prependTo(ft_list).click(delElem);
}

function delElem()
{
	if (confirm('Are you sure you want delete the task?'))
		$(this).remove();

}
