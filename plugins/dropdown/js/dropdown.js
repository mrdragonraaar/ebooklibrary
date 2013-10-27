/**
 * dropdown.js
 * 
 * (c)2013 mrdragonraaar.com
 */
$(document).ready(function()
{
	$('#dropdown .basemenu').click(function()
	{
		var baseMenuId = $(this).attr('id');
		if (baseMenuId == 'open')
		{
			$('#dropdown .submenu').hide();
			$(this).attr('id', 'collapsed');
		}
		else
		{
			$('#dropdown .submenu').show();
			$(this).attr('id', 'open');
		}
	});

	// Mouse click on sub menu
	$('#dropdown .submenu').mouseup(function()
	{
		return false
	});

	// Mouse click on base menu
	$('#dropdown .basemenu').mouseup(function()
	{
		return false
	});

	// Document Click
	$(document).mouseup(function()
	{
		$('#dropdown .submenu').hide();
		$('#dropdown .basemenu').attr('id', 'collapsed');
	});
});

