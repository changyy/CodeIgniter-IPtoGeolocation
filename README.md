## Get GeoLite2 Free Databases (MaxMind DB binary, gzipped)

http://dev.maxmind.com/geoip/geoip2/geolite2/

## Install

```
$ cd /path/CodeIgniter/application/libraries
$ git clone --recursive https://github.com/changyy/CodeIgniter-IPtoGeolocation IPtoGeolocation
$ mv /path/GeoLite2-City.mmdb /path/CodeIgniter/application/libraries/IPtoGeolocation/db/GeoLite2-City.mmdb
```

## Usage

```
$this->load->library('IPtoGeolocation/IP2GeoLocation');
//$this->load->library('IPtoGeolocation/IP2GeoLocation', array('db'=> '/tmp/GeoLite2-City.mmdb') );

print_r($this->ip2geolocation->get($_SERVER['REMOTE_ADDR']);
(
    [xxx.xxx.xxx.xxx] => Array
        (
            [city] => Taipei
            [country] => TW
            [country_name] => Taiwan
            [latitude] => 25.0392
            [longitude] => 121.525
        )

)

print_r($this->ip2geolocation->get($_SERVER['REMOTE_ADDR'], 'raw');
(
    [xxx.xxx.xxx.xxx] => Array
        (
            [city] => Array
                (
                    [geoname_id] => 1668341
                    [names] => Array
                        (
                            [de] => Taipeh
                            [en] => Taipei
                            [es] => Taipéi
                            [fr] => Taipei
                            [ja] => 台北市
                            [pt-BR] => Taipé
                            [ru] => Тайбэй
                            [zh-CN] => 台北市
                        )

                )

            [continent] => Array
                (
                    [code] => AS
                    [geoname_id] => 6255147
                    [names] => Array
                        (
                            [de] => Asien
                            [en] => Asia
                            [es] => Asia
                            [fr] => Asie
                            [ja] => アジア
                            [pt-BR] => Ásia
                            [ru] => Азия
                            [zh-CN] => 亚洲
                        )

                )

            [country] => Array
                (
                    [geoname_id] => 1668284
                    [iso_code] => TW
                    [names] => Array
                        (
                            [de] => Republik China
                            [en] => Taiwan
                            [es] => Taiwán
                            [fr] => Taïwan
                            [ja] => 中華民国
                            [pt-BR] => Taiwan
                            [ru] => Тайвань
                            [zh-CN] => 台湾
                        )

                )

            [location] => Array
                (
                    [latitude] => 25.0392
                    [longitude] => 121.525
                    [time_zone] => Asia/Taipei
                )

            [registered_country] => Array
                (
                    [geoname_id] => 1668284
                    [iso_code] => TW
                    [names] => Array
                        (
                            [de] => Republik China
                            [en] => Taiwan
                            [es] => Taiwán
                            [fr] => Taïwan
                            [ja] => 中華民国
                            [pt-BR] => Taiwan
                            [ru] => Тайвань
                            [zh-CN] => 台湾
                        )

                )

            [subdivisions] => Array
                (
                    [0] => Array
                        (
                            [geoname_id] => 7280290
                            [names] => Array
                                (
                                    [de] => Taipeh
                                    [en] => Taipei
                                    [es] => Taipéi
                                    [ja] => 台北市
                                    [pt-BR] => Taipé
                                    [ru] => Тайбэй
                                )

                        )

                )

        )

)
```
