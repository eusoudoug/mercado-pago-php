# Mercado Pago - PHP
Package desenvolvida durante o curso de Análise e desenvolvimento de sistemas da Faculdade Impacta.  
A intenção desse projeto é para validar o uso de cartão de crédito via checkout transparente do Mercado Pago.  

**Atenção**: Esse projeto não foi testado em nenhum projeto produtivo. Porém Pull Requests são bem vindos.


### Requerimentos:

- PHP >= 7.3
- Composer

### Instalação:

1. ```composer require eusoudoug/mercado-pago-php``` 

### Exemplos de uso:
Você poderá encontrar o caso de uso na pasta ```examples/index.php```  
É possível gerar o token de frontend acessando ```examples/index.html``` e preenchendo o formulário.  
 
### Importante:
Para envio das informações para o Mercado Pago preencha o _ACCESS_TOKEN em_ ```src/MercadoPago.php``` e a _PUBLIC_KEY_ em ```examples/index.html```