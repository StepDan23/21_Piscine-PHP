$(document).ready(function()
{
	var ft_list = $("#ft_list");
	$('#ft_but').click(addNew);
	createTasks();
});

function addNew()
{
	var ft_task_name = prompt("Please enter task name", "New task");

	if (ft_task_name == null)
		return null;
	ft_task_name = ft_task_name.trim();
	if (ft_task_name.length > 0)
		$.ajax({
			method: "GET",
			url: 'insert.php?todo=' + ft_task_name
		}).done(function (data){
			$('<div/>',{
				text: ft_task_name,
				class: 'li_Elem',
				id: data
			}).prependTo(ft_list).click(delElem);
		})
}

function createTasks()
{
	$.ajax({
		method: "GET",
		url: 'select.php'
	}).done(function (data){
		data = jQuery.parseJSON(data);
		jQuery.each(data, function(i, name){
			$('<div/>',{
				text: name,
				class: 'li_Elem',
				id: i
			}).prependTo(ft_list).click(delElem);
		})
	});
}

function delElem()
{
	if (confirm('Are you sure you want delete the task?'))
	{
		$.ajax({
			method: "GET",
			url: 'delete.php?id=' + $(this).attr("id")
		});
		$(this).remove();
	}
}
