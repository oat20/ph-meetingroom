// JavaScript Document
function checkResolution(normsize,bigsize)
{
  browserName = navigator.appName;
  browserVer = parseInt(navigator.appVersion);
  if (browserName == "Netscape" && browserVer >= 4 || browserName == "Microsoft Internet Explorer" && browserVer >= 4)
   version = "1";
  else if (browserName == "Netscape" && browserVer >= 3)
   version = "2";
  else
   version = "3";
  if (version == "1") 
  {
   var correctwidth=800
   var correctheight=600
   if (screen.width>correctwidth||screen.height>correctheight)
    location.href=bigsize
   else
    location.href=normsize
  }
  if (version == "2") 
  {
   var toolkit = java.awt.Toolkit.getDefaultToolkit();
   var screen_size = toolkit.getScreenSize();
   var correctwidth=800
   var correctheight=600
   if (screen_size.width>correctwidth||screen_size.height>correctheight)
    location.href=bigsize
   else
    location.href=normsize
   }
  if (version == "3")
  {
    location.href=normsize
  }
}