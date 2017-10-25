# Teste de PHP
version: `1.0`

date: `2017/10/25`

Author: `Marcos Menezes <mmqfilho@gmail.com>`

# Passos para criar o ambiente

Adicionar no /etc/hosts a seguinte linha:
```
127.0.0.1	testephp.local
```

Criar .conf para o apache /etc/apache2/sites-available/testephp.conf com o conteúdo abaixo:
```
<VirtualHost *:80>
    ServerName  testephp.local
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/testephp
    <Directory /var/www/html/testephp>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error-testephp.log
    LogLevel warn
    CustomLog ${APACHE_LOG_DIR}/access-testephp.log combined
</VirtualHost>
```

Habilitar o novo dominio no apache
```
a2ensite testephp.conf
```

baixar o projeto
```
cd /var/www/html
git clone https://github.com/mmqfilho/testephp.git
```

Ativar as novas configurações no apache
```
services apache2 reload
```

# Banco de dados
Importar o arquivo instalacao/database.sql no banco testephp
Alterar dados de acesso ao banco no arquivo 'config.php'


# Memcached
Instalar e habilitar o memcached
```
apt-get install memcached
apt-get install php-memcached
service apache2 restart
```

O cache pode ser habilitado ou desabilitado via arquivo de configuracao 'config.php' e também ajustado o tempo de expiração em segundos.

Para apagar o cache via browser utilize:
```
http://testephp.local/?g=limparcache
```
