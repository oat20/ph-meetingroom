<? ob_start(); 
#header("Content-Type: text/plain; charset=tis-620"); ?>
<h1>������ѡ</h1>
<?
#if($u == '')
#{
?>
<!--<ul> -->
	<!--<li><a href="stat.php">��Ǩ�ͺ��èͧ��ͧ</a></li> -->
    <!--<li><a href="index.php">��ª�����ͧͺ��</a></li> -->
	<!--<li><a href="login.php">�������к�</a></li> -->
<!--</ul> -->
        <? 
#}
#else
#{
?>
    <ul>
	<li><a href="index.php">˹����ѡ</a></li>
	<li><a href="index.php?mode=first">�ͧ��ͧ</a></li>
    </ul>
    <?
#}
?>
