Guards - Como o usuário esta autenticado

Providers - Como o usuário sera encontrado.

O laravel possui uma facade chamada *Illuminate\Support\Facades\Auth* está facade possui vários métodos para autenticar o usuário. Além das funcionalidades padrão da framework, também podemos utilizar bibliotecas como Breeze e Jetsteam que já trazem todo um sistema de autenticação e autorização prontos.

### Gate

Verifica se o usuário tem a permissão para acessar um determinado recurso ou ação. Definimos os gates no arquivo *app/Providers/AppServiceProvider.php* ou podemos definir diretamente em um controler através da facade *Illuminate\Support\Facades\Gate*.

### Polices

É uma forma de organizar os gates. Juntamos os gates em um arquivo que ira controlar as ações que relacionadas a um recurso do sistema. Iremos escrever as regras do gate, em uma police. O nome de cada método da police se torna o nome do gate.

### Breeze

Para instalar o breeze em um projeto laravel *composer require laravel/breeze --dev* após publicamos a biblioteca do breeze no projeto *art breeze::install* o breeze pode ser utilizado com blade, vue, react, livewire e como API.

No modo blade, vue, react, livewire são criados autimaticamente telas e controler. No módo api apenas os controlers são criados, o módo api utiliza o laravel *sanctum* para o gerenciamento de tokens.

### Jetstream

O jetstram é uma bibloteca mais completa, com os mesmos recursos que o breeze e outros como gerenciamento de times e testes. Para instalar o jetstream *composer require laravel/jetstream*. O Jetstream trabalha apenas com livewire e inertia. Após instalar as dependencias é preciso publicar a o módo como ira utilizado *artisan jetstream:install inertia* ou *artisan jetstream:install livewire*  o ultimo passo é publicar os arquivos no projeto com o comando *vendor:publish --tag=jetstream-views.* 

O jetstream utiliza uma bibloteca chamada *Fortify* para gerenciar as funcionalidades. Ao inves de trabalhar com controllers é utilizado *Actions,* uma classe com uma unica funcionalidade. As configurações do Jetstram são feitas no arquivo *app/Providers/JetstreamServiceProvider.php*