<?php
//прописываем автозагрузку
	spl_autoload_register(function ($className) 
		{

			$arrDirectories = array(
				'components/', 
				'controllers/',
				'models/'
			);

			foreach ($arrDirectories as $directory) {

				$classPath = FILE_ROOT . $directory . $className . '.php'; 

				if (is_file($classPath)) {
					include_once($classPath);
					break; 
				}

			}

		}
	);
