# kallbuloso Laravel-Tools

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

Este é um pacote que criei para uso pessoal. A maioria dos componentes/comandos adicionados neste `package` é/serão um compilado de comandos já existentes no repositório do [Github](https://github.com). 

Na medida do possível estarei dando crédito aos desenvolvedores de cada commando ou pacote aqui copiado/adicionado. Minha idéa é fazer um compilado dos pacotes existentes, mais os pacotes por mim criados para facilitar o desenvolvimento com `Laravel`. Este `package` destina-se exclusivamente atender meus propósitos. 

Fica a cargo seu o uso e a responsabilidade sobre quaisquer alterações, adaptações, atualizações ou customisações. Sempre que instalar uma ferramenta nova, farei o possível para manter a documentação organizada e atualizada. 

Caso queira contribuir com seu código, será muito bem-vindo.

# Instalação

## Via Json

Adicione em ```composer.json``` o seguinte:
``` php
    {
        "require-dev": {
            "kallbuloso/laravel-karl": "~1.0"
        }
    }
```
Depois execute:
``` bash
    $ composer update
```

## Via Composer (mais simples)

``` bash
    $ composer require kallbuloso/laravel-karl --dev
```
Se você estiver usando o pacote no Laravel 5.5 ou superior, [a descoberta do pacote automática](https://medium.com/@taylorotwell/package-auto-discovery-in-laravel-5-5-ea9e3ab20518) cuida da mágica de adicionar o provedor de serviços. 

Esteja ciente que a descoberta automática também significa que o pacote está carregado também com seu ambiente de produção. Portanto, você pode [desativar a descoberta automática](https://laravel.com/docs/5.5/packages#package-discovery) e, em vez disso colocar no seu `AppServiceProvider` algo como isto:

```php
    if ($this->app->environment('local')) {
        $this->app->register('kallbuloso\Karl\KarlServiceProvider');
    }
```
Opcionalmente, você pode publicar a configuração para fornecer um `stub` de provedor de serviços ajustes e configurações diferentes. O padrão é [este aqui](https://github.com/kallbuloso/laravel-karl/tree/master/config/karl.php). 

## Tools
Aqui estão as informações de uso dos comandos;

- [karl:make-auth](/readme/auth.md)
- [karl:make-multi-auth](/readme/multiauth.md)
- [karl:make-model-replace](/readme/models.md)
- [karl:make-schema](/readme/schema.md)
- [karl:make-reset-db](/readme/resetdb.md)

## Change log

Por favor veja o [changelog](/changelog.md) para mais informações sobre carregamentos recentes.

## Contributing

Por favor, consulte [contribut.md](/contribut.md) para obter detalhes e uma lista de artigos. 

O mantenedor do projeto tem o direito e a responsabilidade de remover, editar ou rejeitar comentários, confirmações, códigos, edições do wiki, problemas e outras contribuições que não estejam alinhadas com este Código de Conduta. O mantenedor do projeto que não seguir o Código de Conduta podem ser removidos da equipe do projeto (havendo).

Instâncias de comportamento abusivo, difamador ou inaceitável podem ser relatadas ao abrir um problema ou entrar em contato com um ou mais mantenedores do projeto.

Este `Código de Conduta` é adaptado do Convênio do Colaborador , versão 1.0.0, [disponível aqui.](http://contributor-covenant.org/version/1/0/0/)

## Security

Se você descobrir algum problema relacionado à segurança, envie um e-mail para contato@kallbuloso.com.br em vez de usar o rastreador de problemas. 

## Credits

- [Amaral karl][link-author]
- [kallbuloso][link-kallbuloso]
- [All Contributors][link-contributors]

## License

O kallbuloso/laravel-tools é liberado sob a licença MIT. Consulte o [arquivo de licença](/license.md) incluído para obter mais informações. 

[ico-version]: https://img.shields.io/packagist/v/kallbuloso/laravel-karl.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kallbuloso/laravel-karl.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/kallbuloso/laravel-karl/master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kallbuloso/laravel-karl
[link-downloads]: https://packagist.org/packages/kallbuloso/laravel-karl
[link-travis]: https://travis-ci.org/kallbuloso/laravel-karl
[link-author]: https://github.com/kallbuloso
[link-kallbuloso]: http://kallbuloso.com.br
[link-contributors]: /contributing.md
