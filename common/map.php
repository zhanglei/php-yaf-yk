<?php/** *  Copyright (c) 2013-2014  *  This is no free page *  map.php  2014-8-12 下午4:36:53  UTF-8 *  @author yky@yky.pw */namespace common;class map{		private static $_ak = 'ylTiLe9kVVp9uBaIHibYl8av';	//lat, lng	public static function address2location($address, $city){		$url = sprintf("http://api.map.baidu.com/geocoder/v2/?ak=%s&output=json&address=%s&city=%s", self::$_ak, urlencode($address), urlencode($city));		$json = file_get_contents($url);		if (!empty($json)){			$arr = json_decode($json, true);			if ($arr['status'] == 0){				$loca = $arr['result']['location'];				if ($loca['lat'] && $loca['lng']){					return array($loca['lat'], $loca['lng']);				}else{					return false;				}			}else{				return false;			}		}else{			return false;		}	}	}