function ShowandDuplicate()
{
	var clicks = 0;

	clicks++;

	if (clicks == 1)
	{
		document.getElementById('performance').style.display = "block";
	}

	if (clicks > 1)
	{
		var original = document.getElementById('performance' + i);
    	var clone = original.cloneNode(true); // "deep" clone
   		clone.id = "performance" + ++i; // there can only be one element with an ID
    	clone.onclick = duplicate; // event handlers are not cloned
    	original.parentNode.appendChild(clone);
	}
}