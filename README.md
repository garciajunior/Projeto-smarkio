# Projeto-smarkio
README
======================


# Instalando Localmente

Siga os passos para seguir a instalação local do codeigniter

### 1 - Adicionando Host para /etc/hosts

```
$ sudo echo "127.0.0.1 teste-smarkio.com.br www.teste-smarkio.com.br" >> /etc/hosts
```

### 2 - Criar Apache's Virtual Host
- Para acessar o arquivo que criou rodar o seguinte comando:

    sudo nano /etc/apache2/sites-available/teste-smarkio.com.br.conf

- Depois editar com as seguites configurações.

    ServerName -> Nome do servidor "teste-smarkio.com.br"
    ServeAlias -> Nome do Alias para o servidor "www.teste-smarkio.com.br"
    DocumetRoot é o caminho de onde encontra o projeto "/home/junior/Documentos/Projeto-smarkio"

```
<VirtualHost *:80>
        ServerName teste-smarkio.com.br
        ServerAlias www.teste-smarkio.com.br
        DocumentRoot "/home/junior/Documentos/Projeto-smarkio"

        SetEnv CI_ENV development

        <Directory "/home/junior/Documentos/Projeto-smarkio">
                AllowOverride All
                Allow from All

                Require all granted
        </Directory>

        ErrorLog "/var/log/apache2/error_log"
        CustomLog "/var/log/apache2/access_log" common
</VirtualHost>
```
 

NÃO ESQUEÇA DE RODAR O COMANDO:
```
sudo a2ensite teste-smarkio.com.br.conf
```

### 3 - Habilitando mod_rewrite

```
sudo a2enmod rewrite
```

### 4 - Reiniciando o Apache

```
sudo service apache2 reload

            ou 

sudo systemctl restart apache2
```

### 5 - Criar o Bando de Dados

```
mysql> CREATE DATABASE 'projeto';
```

### 6 - Incluir a variável de ambiente CI_ENV environment


```
export CI_ENV=development
```

### 7 - Rodar todas as  migrations na raiz do projeto

```
$ php Projeto-smarkio/index.php migrate
```

### 8 - Verificar se as configurações deram certo

na barra de endereços do browser colocar a seguinte url

- [http://http://www.teste-smarkio.com.br/](http://www.teste-smarkio.com.br/) 
