# testephp
teste de php

# Passos para criar o ambiente

Adicionar ao /etc/hosts
'''
127.0.0.1	testephp.local
'''

Cria conf para o apache /etc/apache2/sites-available/testephp.conf
'''
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
'''

Habilitar o novo dominio no apache
'''
a2ensite testephp.conf
'''

Ativar as novas configurações no apache
'''
services apache2 reload
'''

# Banco de dados
Importar o arquivo instalacao/database.sql no banco testephp
Alterar dados de acesso ao banco no arquivo config.php

# Memcached
Instalar e habilitar o memcached
'''
apt-get install memcached
apt-get install php5-memcached
service apache2 restart
'''

