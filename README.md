# Sobre

Apenas alguns testes para realizar o envio de requisições de maneira "simultânea" com a biblioteca Guzzle do PHP. Caso você precise realizar fazer requisições simultâneas, fique a vontade para baixar este projeto e testar por si mesmo.

# Como instalar

Para usar o projeto, basta fazer um clone do repositório, baixar as dependências do composer e executar o arquivo "index.php" diretamente de seu console. O arquivo irá realizar, por padrão, 20 requisições para uma API que gera mensagens motivacionais aleatórias de maneira sequencial e concorrente. É mostrado os valores de tempo para que você consiga ter uma noção maior do ganho de desempenho obtido.

Dentro do arquivo "sequential" você pode optar por utilizar o Pool do Guzzle, que permite configurar a quantidade de requisições que serão geradas concorrentementes ou usar um array de promisses que, acredito eu, que faça o quanto de concorrência por possível.

Durante a inicialização do script é possível enviar as flags "-c" e "-s", onde a primeira significa "concurrency", ou seja, apenas o modo de concorrência será executado, e a outra significa "sequential", onde apenas as requisições sequenciais serão realizadas.

# Tecnologias utilizadas

- PHP (7.4+)
- Composer
- Guzzle 7
