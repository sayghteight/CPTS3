<?php 
	/*
		Cloud Plataform Division Zero
		Copyright (C) 2017 by Sayghteight

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <http://www.gnu.org/licenses/>.
		
	*/
	
	/*
		Crear conexión base de datos
	*/
	function getSqlConnection($withError = true)
	{
		if(SQL_Database == "")
		{
			return ($withError) ? "No se ha selecionado la base de datos" : false;
		};
		
		$string						=	SQL_Mode.':host='.SQL_Hostname.';port='.SQL_Port.';dbname='.SQL_Database.'';
		if(SQL_SSL != "0")
		{
			$string					.=	';sslmode=require';
		};
		
		try
		{
			$databaseConnection 	= 	new PDO($string, SQL_Username, SQL_Password);
			
			return $databaseConnection;
		}
		catch (PDOException $e)
		{
			return ($withError) ? "Failed to get DB handle: " . $e->getMessage() . "\n" : false;
		};
	};
	