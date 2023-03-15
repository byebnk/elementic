# Elementic

Elementic é um plugin gratuito para WordPress que integra o construtor de páginas Elementor com a plataforma de automação de marketing Mautic. Com este plugin, você pode facilmente enviar dados de formulários criados no Elementor para formulários do Mautic, simplificando a integração entre os dois sistemas.

## Requisitos

- WordPress versão 5.0 ou superior
- Elementor Pro
- Mautic versão 2.0 ou superior

## Instalação

1. Faça o download do arquivo ZIP do plugin Elementic.
2. Vá para o painel de administração do WordPress, navegue até **Plugins > Adicionar Novo** e clique em **Enviar Plugin**.
3. Envie o arquivo ZIP do plugin e clique em **Instalar Agora**.
4. Após a instalação, clique em **Ativar Plugin**.

## Uso

### Configurando a integração com o Mautic

1. Crie um formulário no Mautic e copie o ID do formulário.
2. Vá para o seu site WordPress e abra o Elementor para editar a página onde você deseja adicionar o formulário.
3. Adicione um widget de formulário do Elementor Pro na página e configure os campos de acordo com suas necessidades.
4. No painel de configurações do formulário, vá para a seção **Ações após o envio** e selecione **Mautic**.
5. Uma nova seção chamada **Mautic** aparecerá nas configurações do formulário. Insira a URL do seu Mautic (por exemplo, `http://yourmauticurl.com/`) no campo **Mautic Form URL***.
6. Insira o ID do formulário do Mautic no campo **Mautic Form ID***.

### Correspondência de campos entre Elementor e Mautic

Certifique-se de que os nomes dos campos (IDs) no formulário do Elementor correspondam aos aliases dos campos no formulário do Mautic. Isso garantirá que os dados do formulário sejam corretamente enviados e armazenados no Mautic.
