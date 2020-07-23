# codeigniter-user-management
CodeIgniter installation with user management

## Getting Started

The quickest way to get started is by using the included docker-compose.yml to create new containers to house the appliction. However, you can also drop this code onto a webserver of your choosing.

## Configuration

Edit the $config array in "myapp/application/config/email.php" to enable emails.
```
$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.example.com',
    'smtp_port' => 465,
    'smtp_user' => 'me@example.com',
    'smtp_pass' => 'password',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);

```
Edit the $db array in "myapp/application/config/database.php" to enable the database.
```
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'mariadb',
	'username' => 'bn_app',
	'password' => 'Vo6gufO1Rg',
	'database' => 'myusers',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

### Prerequisites

Create a MYSQL database and generate the tables using:
```
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `user_org` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `user_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `user_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `user_level` int(3) NOT NULL,
 `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `reset_urls` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `reset_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

```

## Built With

* [CodeIgniter](https://codeigniter.com) - Framework
* [Docker](https://www.docker.com) - Container Management
* [Bitnami](https://hub.docker.com/r/bitnami/codeigniter/dockerfile) - Docker Image


## Authors

* **Ernie Lail** - *Initial work* - [MaranathaTech](https://github.com/MaranathaTech)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


