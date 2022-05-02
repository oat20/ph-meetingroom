// JavaScript Document
function swap(id,picexpand,pichidden)
{
	control = "ctrl" + id;
	swapbox = "swap" + id;

	target = document.all(swapbox);
  	if (target.style.display != "none")
	{
  		target.style.display = "none";
		document.images[control].src = picexpand;
		document.images[control].alt = "ขยายขนาด";
  	}
	else
	{
  		target.style.display = "";
		document.images[control].src = pichidden;
		document.images[control].alt = "ย่อขนาด";
	}
}