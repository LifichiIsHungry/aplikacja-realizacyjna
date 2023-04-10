Dla projektu utworzony został serwer Debian 11; na nim będzie znajdował się serwer WWW, bazy danych itp. Każdy uczestnik projektu posiada swoje własne konto na serwerze.

Adres IP: 	64.226.105.141  
Nazwa domenowa:	_Jeszcze nie mam pomyślu :P_  
Dane logowania:	_Każdy użytkownik posiada własne konto_  

Konta użytkowników umożliwiają im poruszanie się po serwerze za pomocą SSH do wszystkich folderów w grupie "projektsan". Aby dostać się do folderu projektowego, który znajduję się pod ścieżką "/srv/www" można użyć protokołu SFTP, przy pomocy graficznego klinenta np. Filezilla.

Logowanie się do serwera po SSH przy użyciu terminala:
```shell
ssh _nazwa-użytkownika_@64.226.105.141
```

Logowanie się do serwera SFTP przy użyciu terminala:
```shell
sftp _nazwa-użytkownika_@64.226.105.141
```
Do tego zalecany jest jednak program graficzny np. Filezilla.
