<script language="JavaScript" type="text/javascript">
var xmlHttp;
function CreateXmlHttpObject()
{
	var xmlHttp = null;
	try { xmlHttp=new XMLHttpRequest(); } // Firefox, Opera 8.0+, Safari
	catch (e) // Internet Explorer
	{
		try {
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
		catch (e)
		{
		alert("Your browser does not support AJAX!");
		}


	}
	return xmlHttp;
}



function SendRequest(value1,table1,field,fk_field)
{
      	var url = "include/ajax_return.php?value="+value1+"&table="+table1+"&field="+field+"&fk_field="+fk_field;
	xmlHttp = CreateXmlHttpObject();
	if(xmlHttp == null)
	{
		alert("Your browser does not support AJAX!");
		return;
	}
	else
	{
		xmlHttp.onreadystatechange = ServerStateChange;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function SendRequests(value1,table1,field,fk_field)
{
      	var url = "include/ajax_return.php?value="+value1+"&table="+table1+"&field="+field+"&fk_field="+fk_field;
	xmlHttp = CreateXmlHttpObject();
	if(xmlHttp == null)
	{
		alert("Your browser does not support AJAX!");
		return;
	}
	else
	{
		xmlHttp.onreadystatechange = ServerStateChanges;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function ServerStateChanges()
{
	//show_Loading();
	if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
	{
		//hide_Loading();
		document.getElementById("view").innerHTML = xmlHttp.responseText;
                document.getElementById("view1").innerHTML = xmlHttp.responseText;
	}
}
function ServerStateChange()
{
	//show_Loading();
	if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
	{
		//hide_Loading();
		document.getElementById("view").innerHTML = xmlHttp.responseText;
	}
}
</script>