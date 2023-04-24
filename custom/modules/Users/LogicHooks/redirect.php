<?php

Class Redirect{
	function redirect(){
		SugarApplication::redirect('index.php?module=Home&action=mobile');
	}
}
