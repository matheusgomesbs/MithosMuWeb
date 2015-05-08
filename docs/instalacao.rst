Instalação
##########

A MithosMuWeb é de fácil instalação. Os requisitos mínimos são um servidor web,
SQLServer e os arquivos da Mithos, só isso! Apesar deste manual focar principal na
configuração do Apache (porque ele é o mais comum), você pode configurar e executar
em diversos servidores web, tais como lighttpd ou Microsoft IIS.

Requisitos
==========

-  Servidor HTTP. Por exemplo: Apache. É preferível ter o mod\_rewrite
   habilitado mas não é uma exigência.
-  PHP 5.4.* ou superior.
-  SQLServer 2008 ou superior

Licença
=======

A MithosMuWeb é licenciado sob uma Licença MIT. Isto significa que você tem
liberdade para modificar, distribuir e republicar o código-fonte com a condição
de que os avisos de `copyright` permaneçam intactos. Você também tem liberdade
para incorporar a MithosMuWeb em qualquer aplicação comercial ou de código fechado.

Permissões
==========

A MithosMuWeb usa o diretório ``/cache`` para diferentes operações.

Assim, tenha certeza que o diretório ``/cache`` permite a escrita pelo usuário do servidor web.

Configuração
============

A MithosMuWeb exige para seu funcionamento apenas a configuração do Banco de dados no arquivo
``/configs/database.php``