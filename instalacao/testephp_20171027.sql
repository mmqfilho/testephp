-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/10/2017 às 17:50
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- Versão do PHP: 5.6.31-6+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testephp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `caracteristica_id` int(4) NOT NULL,
  `caracteristica_nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `caracteristicas`
--

INSERT INTO `caracteristicas` (`caracteristica_id`, `caracteristica_nome`) VALUES
(1, 'altura'),
(2, 'capacidade'),
(3, 'cor'),
(4, 'largura'),
(5, 'voltagem'),
(6, 'peso'),
(7, 'tela'),
(8, 'modelo'),
(9, 'bocas'),
(10, 'acendimento automático'),
(11, 'degelo'),
(12, 'portas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(4) NOT NULL,
  `categoria_nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`) VALUES
(1, 'eletrodomésticos'),
(2, 'telefonia'),
(3, 'eletroeletrônicos'),
(4, 'autos peças e acessórios'),
(5, 'jogos e games'),
(6, 'informática e escritório');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(4) NOT NULL,
  `cliente_email` varchar(255) NOT NULL,
  `cliente_senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_email`, `cliente_senha`) VALUES
(19, 'marcos@teste.com.br', '698dc19d489c4e4db73e28a713eab07b');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes_endereco`
--

CREATE TABLE `clientes_endereco` (
  `cliente_id` int(4) NOT NULL,
  `endereco_logradouro` varchar(255) NOT NULL,
  `endereco_numero` varchar(15) NOT NULL,
  `endereco_bairro` varchar(255) NOT NULL,
  `endereco_cep` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `clientes_endereco`
--

INSERT INTO `clientes_endereco` (`cliente_id`, `endereco_logradouro`, `endereco_numero`, `endereco_bairro`, `endereco_cep`) VALUES
(19, 'Rua abc', '10', 'bela vista', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(4) NOT NULL,
  `produto_nome` varchar(255) NOT NULL,
  `produto_descricao` text NOT NULL,
  `produto_imagem` varchar(255) NOT NULL,
  `produto_preco` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_nome`, `produto_descricao`, `produto_imagem`, `produto_preco`) VALUES
(1, 'Lavadora de Roupa Samsung Front Load WF106U4SAWQ 10Kg Branca', 'Cor: Branca Voltagem: 110V e 220V Dimensões do produto (LxAxP): 600x850x600 mm Peso do produto: 71 Kg Pressão da água: 50 kPa ~ 800 kPa Volume de água: 116,5L Capacidade de lavagem e centrifugação: 10,1 Kg', 'WF106U4SAWQ.jpg', 1899.00),
(2, 'Smart TV Samsung Slim LED', 'Para os amantes de tecnologia, a Smart TV Samsung Slim torna único cada segundo em frente à TV. Ela foi projetada para levar novas sensações e muito mais diversão para sua casa. Possui a mais alta qualidade de imagem HD e interatividade, exibindo riqueza de detalhes sob qualquer condição de iluminação e possibilitando o acesso a uma diversidade de conteúdos de entretenimento, ela oferece um mundo especial de funções e aplicativos. Smart TV Samsung Slim possui Smart Hub, um espaço para a família e diversas opções de entretenimento. Com ele você pode navegar na internet e transferir aplicativos, apenas pressionando um botão no controle remoto. Aproveite todas as vantagens deste aparelho.\r\n', 'SmartTVLED32HDSamsung32J4300.jpg', 1179.07),
(43, 'Telefone sem fio Motorola Auri 3500', 'Telefone sem fio com tecnologia digital DECT 6.0. Até 4 ramais em uma única linha eletrônica Design moderno, leve e compacto, com viva-voz,ID,visor e teclado iluminado\r\n', 'auri3500.jpg', 135.50),
(44, 'Telefone Sem Fio Panasonic Ident. de Chamadas - Viva-Voz KX-TGC210LBB Preto', 'Telefone Sem Fio Panasonic KX-TGC210LBB com viva-voz, identificador de chamadas e visor grande com teclado iluminado. Se você gosta de uma aparelho versátil, moderno e eficiente, este é o aparelho ideal para você! Além de identificar as chamadas, possuir secretária eletrônica e viva-voz, ainda conta com caixa postal, alarme e bloqueador de chamadas indesejadas. Compacto, porém, completo, vai possibilitar que atenda suas ligações importantes com total qualidade e evitar ligações indesejadas sempre que precisar!\r\n', 'KX-TGC210LBB.jpg', 157.00),
(45, 'Telefone Panasonic KX-TGC220LBB', 'Facilite a comunicação em seu escritório ou dentro de sua residência utilizando este aparelho sem fio! Os Telefones da Panasonic tem frequência de 1.9 GHz, identificador de chamadas, registro de memória, opção de rediscagem, viva-voz e 6 níveis de volume de campainha. A Secretária eletrônica pode atender e gravar chamadas quando você não puder atender ao telefone. Permite que a conversação seja feita sem o uso das mãos, ideal para conferencias. O visor grande e iluminado auxiliam na utilização em ambientes com pouca iluminação.', 'KX-TGC220LBB.jpg', 190.02),
(46, 'Telefone sem Fio Intelbras TS40 Preto', 'Discagem rápida para 10 números. Som de teclado. Data, hora e despertador. 7 tipos de toque. 5 opções de volume de toque. 5 opções de volume de recepção de áudio. Pre-dialing. Atendimento programável. Funções flash, rediale mute.\r\n', 'intelbras-TS40.jpg', 60.90),
(47, 'Telefone Sem Fio Motorola Moto750 Identificador De Chamadas Viva voz', 'Com o Telefone Sem Fio MOTO750, da Motorola, você acaba com os problemas de fios e restrições. Ele possui a tecnologia Multi Ramal Digital, expansivo até 5 ramais, tem identificador de chamadas, viva-voz, agenda, alarme e rediscagem para os últimos 5 números.', 'moto750.jpg', 199.00),
(48, 'Smartphone Samsung Galaxy J5 Prime Desbloqueado GSM 32GB Dual Chip Preto', 'Com um design Premium o Samsung Galaxy J5 Prime possui corpo em metal e suaves bordas arredondadas que lhe garantem um visual altamente sofisticado. Projetado para ampliar ainda mais seu mundo de entretenimento e alcançar a experiência multimídia definitiva. Sua incrível tela de 5 polegadas é do tamanho exato para desfrutar ao máximo de todo seu conteúdo. O Samsung Galaxy J5 Prime é um celular de alta resistência e segurança. Além de garantir que você seja o único a ter acesso ao seu smartphone, o sensor de digitais por toque permite o desbloqueio do aparelho com muito mais segurança e rapidez. Com câmera de 13MP traseira e mais a frontal de 5MP com flash a LED você tem em mãos um smartphone capaz de tirar belíssimas fotos mesmo em condições de baixa iluminação.', 'galaxyl5prime.jpg', 629.91),
(49, 'Smartphone Samsung Galaxy J5 Prime SM-G570M Desbloqueado GSM Dual Chip 32GB Android 6.0 Dourado', 'Tipo de Chip	Nano Chip Quantidade de Chips	Dual Chip Memória Interna	32GB Memória RAM	2GB Processador	Quad-Core 1.4 GHz Sistema Operacional	Android Versão	Android 6.0.1 Tipo de tela	AMOLED Tamanho do Display 5 polegadas Resolução	1280x720 (HD) Câmera traseira	13MP Câmera frontal	5MP Filmadora	Full HD Expansivo até	MicroSD até 200GB Alimentação/Tipo de bateria	bi-volt, íons de lítio 2400 mAh', 'galaxyj5primesm.jpg', 629.91),
(50, 'Smartphone Motorola Moto X4 XT1900 Desbloqueado GSM 32GB Dual Chip Android 7.1 Preto', 'Câmera traseira dupla com recursos exclusivos Super-selfie de 16 MP e modo avançado para baixa luminosidade Design com vidro 3D e estrutura em metal Resistente à água com certificação IP68* Carregamento TurboPower** e bateria que dura o dia todo*** Reproduza seu som em até 4 dispositivos ao mesmo tempo Sensor de impressão digital Experiência do Android™ Puro', 'X4XT1900.jpg', 1489.00),
(51, 'IPhone 7 Apple 128GB Desbloqueado 4G 4.7 Preto Matte', 'O design do iPhone 7 atingiu um nível sem precedentes de precisão e inovação. é diferente de tudo que já fizemos, a estrutura é resistente à água, o botão de Início foi reinventado e a construção unibody dá a sensação de continuidade em todo o aparelho. Só de olhar você já percebe como ele é incrível. O iPhone é a câmera mais popular do mundo. E esta câmera ganhou novos motivos para ser a mais amada. Com estabilização óptica de imagem, abertura ƒ/1.8 e lente de seis elementos, tudo fica lindo – mesmo em ambientes com pouca luz. Juntando isso a recursos como captura de ampla tonalidade de cores, suas fotos, vídeos e Live Photos vão ficar tão populares quanto a própria câmera. Quase tudo que você faz no iPhone acontece na tela. É onde você vê suas fotos, mensagens, navega na Internet e faz inúmeras coisas todos os dias. A tela do iPhone 7 usa o mesmo espaço de cores da indústria de cinema digital. O resultado são imagens nitidamente mais brilhantes e vívidas. O que você vê na tela fica tão real que é difícil de acreditar. Toda a potência do iPhone 7 nasce no chip A10 Fusion, o chip mais poderoso até hoje em um smartphone. Com ele, o iPhone 7 é mais rápido do que qualquer iPhone – e mais eficiente. Isso porque a arquitetura totalmente nova do chip A10 Fusion aumenta o processamento quando você precisa e diminui quando não precisa, oferecendo a maior duração de bateria em um iPhone e o dobro da velocidade do iPhone 6. Pela primeira vez, o iPhone vem com sistema de alto-falantes estéreo. Eles oferecem o dobro da potência de som do iPhone 6s e maior alcance dinâmico. O iPhone 7 é ideal para ouvir música, assistir a vídeos e fazer chamadas com viva-voz. Esse sistema de som é uma novidade que vai fazer barulho. Muito barulho. O iPhone 7 usa a tecnologia 4G LTE com até 25 bandas LTE. É o melhor roaming internacional disponível para um smartphone. Isso significa que você pode se conectar a ainda mais redes de alta velocidade quando viajar para o exterior, inclusive ao 4G LTE Advanced. O iOS dá vida ao iPhone e ao iPad, deixando seus dispositivos ainda mais pessoais, de uma forma poderosa. A interface é bonita e fácil de usar. Sugestões inteligentes aparecem quando você mais precisa. E as tecnologias avançadas protegem sua privacidade e segurança. Experimente o iOS e entenda por que tanta gente adora usar o iPhone e o iPad.', 'iphone7.jpg', 3255.12),
(52, 'IPhone 7 Apple 32GB Desbloqueado 4G 4.7 Dourado', 'O design do iPhone 7 atingiu um nível sem precedentes de precisão e inovação. é diferente de tudo que já fizemos, a estrutura é resistente à água, o botão de Início foi reinventado e a construção unibody dá a sensação de continuidade em todo o aparelho. Só de olhar você já percebe como ele é incrível. O iPhone é a câmera mais popular do mundo. E esta câmera ganhou novos motivos para ser a mais amada. Com estabilização óptica de imagem, abertura ƒ/1.8 e lente de seis elementos, tudo fica lindo – mesmo em ambientes com pouca luz. Juntando isso a recursos como captura de ampla tonalidade de cores, suas fotos, vídeos e Live Photos vão ficar tão populares quanto a própria câmera. Quase tudo que você faz no iPhone acontece na tela. É onde você vê suas fotos, mensagens, navega na Internet e faz inúmeras coisas todos os dias. A tela do iPhone 7 usa o mesmo espaço de cores da indústria de cinema digital. O resultado são imagens nitidamente mais brilhantes e vívidas. O que você vê na tela fica tão real que é difícil de acreditar. Toda a potência do iPhone 7 nasce no chip A10 Fusion, o chip mais poderoso até hoje em um smartphone. Com ele, o iPhone 7 é mais rápido do que qualquer iPhone – e mais eficiente. Isso porque a arquitetura totalmente nova do chip A10 Fusion aumenta o processamento quando você precisa e diminui quando não precisa, oferecendo a maior duração de bateria em um iPhone e o dobro da velocidade do iPhone 6. Pela primeira vez, o iPhone vem com sistema de alto-falantes estéreo. Eles oferecem o dobro da potência de som do iPhone 6s e maior alcance dinâmico. O iPhone 7 é ideal para ouvir música, assistir a vídeos e fazer chamadas com viva-voz. Esse sistema de som é uma novidade que vai fazer barulho. Muito barulho. O iPhone 7 usa a tecnologia 4G LTE com até 25 bandas LTE. É o melhor roaming internacional disponível para um smartphone. Isso significa que você pode se conectar a ainda mais redes de alta velocidade quando viajar para o exterior, inclusive ao 4G LTE Advanced. O iOS dá vida ao iPhone e ao iPad, deixando seus dispositivos ainda mais pessoais, de uma forma poderosa. A interface é bonita e fácil de usar. Sugestões inteligentes aparecem quando você mais precisa. E as tecnologias avançadas protegem sua privacidade e segurança. Experimente o iOS e entenda por que tanta gente adora usar o iPhone e o iPad.', 'iphone7d.jpg', 2815.12),
(53, 'Tablet Samsung Galaxy Tab E SM-T560 Wi-Fi 9.6" 8GB 1.3Ghz 5MP Android 4.4 Preto', 'Conheça o tablet que vai colocar você online e facilitar a sua vida digital. Ele é da Samsung e se chama Galaxy Tab E SM-T560, um aparelho equipado com Android e um telão incrível. O aparelho de tela de 9,6 polegadas tem amplo espaço para manipular aplicativos, games e conferir vídeos e fotografias sem perder detalhes e sem perder o que mais importa em um portátil: a mobilidade. Sua interface, sensível ao toque, facilita o manuseio e dá a interatividade que você precisa e espera no uso de softwares. O sistema operacional utilizado é o Android 4.4, que a partir da lojinha Play Store oferece ferramentas e games de alta qualidade e traz, também, milhares de aplicativos grátis para tablet. No interior do aparelho está um processador de quatro núcleos com 1,3 GHz, para dar desempenho à execução de seus programas, mesmo os mais pesados, uma placa de rede sem fio para acesso Wi-Fi e um localizador GPS para aplicativos de mapas.', 'SM-T560.jpg', 703.00),
(54, 'Tablet Samsung Galaxy Tab A Note SM-P585M 10.1\'\' 4G 16GB Preto', 'Processador	Octa-Core 1.6 GHz Tamanho do Display	10.1" Conexão	4G Memória Interna	16GB Expansivo até	MicroSD até 200GB Câmera traseira	8MP', 'SM-P585M.jpg', 1580.07),
(55, 'Tablet Multilaser M7-S NB184 Quad Core Android 4.4 8GB Preto', 'Alto Falante Externo: SIM; Bateria: 2700 MAH; Câmera Secundária: 0.3; Conexão de Dados Wireless: 802.11 B/G/N; Compatibilidade Cartão de Memória: 32 GB POR CARTÃO MICRO SD; Compatível com Cartão de Memória: SIM; Conexão Fone de Ouvido:; Microfone: SIM; Conteúdo da Embalagem: . 1 TABLET MULTILASER M7S QUAD CORE . 1 CABO USB . 1 CARREGADOR DC 5V 1,5A . 1 GUIA RÁPIDO; Dimensão Aprox. Largura: 11.7; Dimensão Aprox. Profundidade: 1; Dimensão Aprox. Altura: 18.5; Garantia do Fornecedor: 1; Memória Interna de Processamento : 512; Memória Interna de Armazenamento: 8; Mp3 Player; Número de Simcards: 0; Peso Liquido aprox: 0.32; Conexões HDMI: 0; Conexões USB: 1; Resolução da Tela: 800 X 480 PIXELS; Sistema Operacional: ANDROID 4.4; Tamanho Tela Polegadas: 7; Tipo Processador: QUAD CORE', 'M7-S-NB184.jpg', 249.00),
(56, 'Computador LG All In One 24V570 C BJ31P1 Core I5 7200U 2.5GHz 4GB 1TB Windows 10', 'Com o computador LG All in One 24V570-C.BJ31P1 você tem o melhor do conteúdo digital para trabalhar e se divertir. Ele é perfeito para toda a família! Navegue na internet, jogue online e assista aos seus programas favoritos em alta definição direto na tela do seu computador. O All in One 24V570 possui TV Digital integrada com função dupla. Você pode trabalhar e assistir TV simultaneamente na mesma tela. A tela LED Full HD de 23.8 polegadas oferece excelente campo de visualização e as bordas mais finas permitem que você veja todos os detalhes em qualquer ângulo. Faça tudo isso e muito mais com a performance do processador da 7ª geração Intel® Core™ i5 e 4GB de RAM. Trabalhe em multitarefa e alterne entre os aplicativos com muita agilidade. Além disso, o LG 24V570 vem equipado com 1TB de HD, conexão HDMI, portas USB de alta velocidade, Wireless, Bluetooth, alto-falantes estéreo e Windows 10. Tudo integrado para facilitar a sua vida!', 'CBJ31P1.jpg', 2744.10),
(57, 'Computador All In One Dell Inspiron 20 Ione 3064-A20 19.5\'\' Core I3 7100U 2.4GHz 4GB 1TB Windows 10', 'All-in-One Inspiron 20 Série 3000: Compacto e fácil de usar para mais economia de espaço e praticidade. Com tela HD de 19,5 polegadas e antirreflexo em conjunto com uma performance de processamento avançada que conta com 7ª Geração de Processadores Intel Core i3, faz deste All-in-one a opção perfeita para sua casa ou escritório. Se preferir, poderá conectá-lo ao seu roteador de acesso à internet pois conta também com wireless. Tecnologias recentes como USB 3.0, Bluetooth 4.0 e Windows 10 para total conectividade.Possui HD de 1TB para que você possa armazenar fotos, vídeo e todos aqueles arquivos importantes e para a segurança dos seus dados, esse Inspiron quando vendido no Varejo, acompanha 15 meses de McAfee gratuitamente. Além da garantia padrão de 1 ano, a Dell oferece a Garantia com atendimento em Domicílio, onde se necessário após diagnóstico remoto, técnicos são deslocados até a residência ou local escolhido pelo consumidor. Um excelente benefício para total tranquilidade e comodidade.Imagens meramente ilustrativas.Todas as informações divulgadas são de responsabilidade do Fabricante/Fornecedor.Verifique com os fabricantes do produto e de seus componentes eventuais limitações à utilização de todos os recursos e funcionalidades.', 'dell-i3-3064-A20.jpg', 2417.07),
(58, 'Computador Desktop Easypc 5547 Core I3 3.3GHz 4GB 320GB Windows 10', 'A EasyPC tem computadores feitos sob medida e com preço justo para atender as suas necessidades. Todos os nossos modelos são fabricados mediante um rígido controle de qualidade e certificação ISO9001. Seja para sua casa ou empresa, somos a solução ideal para você! Marca: EasyPC Modelo: 5547 Processador: Intel Core i3 3.3ghz ou superior Cache: 3MB Chipset: Intel Corporation Express Mémoria: 4GB DDR3 (Expansível até 16GB) Hd: 320GB Sata Ii Placa Mãe: Compatível EasyPC DDR3 Dual Channel Portas Usb: 6 Portas Usb 2.0 Rede (Lan): Realtek Lan RJ45 Som: Realtek High Definition Memória de vídeo (Gráfico): Integrada ao processador, até 1GB Conexões de vídeo: Rgb (Vga) Conexões traseiras: Ps2 Mouse e Teclado, 1 Conector Rj45, 3 X Áudio Leitor/gravador de Cd/Dvd: Não Mouse: Usb 2.0 Óptico com Scroll (rolagem) Teclado: Usb 2.0 Padrão Abnt Caixa de som: Sim Sistema Operacional: Windows 10 trial. Após 60 dias o produto deve ser ativado, caso contrário o produto deixa de ser genuíno. Conteúdo da Embalagem: 01 Computador, 01 Manual, 01 Cd com drivers, 01 Mouse, 01 Teclado, 01 Caixa de som Voltagem: Bivolt (manual) Dimensões embalagem: 35x35x35 cm Peso da embalagem: 8KG Garantia do Fornecedor: 12 meses ', 'easypc-5547.jpg', 882.55),
(59, 'Notebook Acer Aspire F5-573-51LJ i5-7200U 8GB 1TB LED 15.6” Windows 10', 'Detalhes do produto: Acer: Notebook Acer Aspire F5-573-51LJ com Intel® Core™ i5-7200U, 8GB, 1TB, Gravador de DVD, HDMI, Wireless, Bluetooth, LED 15.6” e Windows 10 O Acer Aspire F5-573-51LJ reúne tecnologia e elegância em um notebook completo para acompanhar o seu dia a dia. Repleto de ferramentas de produtividade e entretenimento, o Acer Aspire F5 oferece tela LED HD de 15.6 polegadas e áudio de alta definição. Perfeito para filmes e jogos! A 7ª geração do processador Intel® Core™ i5 e os 8GB de RAM proporcionam excelente desempenho em multitarefa, incluindo a navegação no Windows 10 e a execução dos seus aplicativos favoritos. Explore as principais conexões e interaja com todos os seus dispositivos. O Acer Aspire F5 possui portas USB de alta velocidade, interface HDMI, Gravador de DVD, Leitor de Cartões e Bluetooth. Aproveite a oportunidade e garanta o seu notebook Acer Aspire F5-573-51LJ! Características Tipo Notebook Processador Intel® Core™ i5-7200U Dual Core 2.5 GHz com Turbo Max até 3.1 GHz Cache 3 MB Sistema operacional Windows 10 Tamanho da tela 15.6" Tipo de tela LCD LED Unidade óptica Gravador de DVD/CD Leitor de cartão SD Leitor biométrico Não Webcam integrada Sim Resolução da webcam HD / HDR (1280 x 720) Sintonizador de TV não Conexão s/ fio (wireless) 802.11 b/g/n Conexão Bluetooth Sim Cor Prata Características Gerais - Tela LCD LED HD Widescreen, com resolução de 1366 x 768 - Conector combo para microfone / fone de ouvido - Webcam Acer Crystal Eye - Áudio: dois alto-falantes estéreo - Bluetooth 4.0 Especificações Técnicas Memória RAM 8 GB DDR4 2133 MHz Tipo de memória DDR4 Expansão da memória até 32 GB Disco rígido (HD) 1 TB 5400 RPM Chipset Integrado ao processador Portas USB 1 (2.0), 2 (3.0), 1 (3.1 Tipo C) Saída HDMI sim Rede 10/100/1000 Outras conexões RJ45 Placa de vídeo Integrada, com tecnologia Intel® HD Graphics 620 Placa de som Integrada, com áudio de alta definição Teclado Português, padrão ABNT, com teclado numérico integrado Mouse Touchpad, com função multitoque Bateria 4 células 2800 mAh Duração aprox. da bateria (h) até 7 horas* Softwares inclusos - Acer Care Center - Acer Hover Access - Acer Portal - abFiles - abPhoto - Accessory Store - Quick Access Tensão/Voltagem Bivolt Conteúdo da Embalagem - Notebook - Adaptador AC - Cabo de energia - Kit de manuais - Termo de garantia Garantia 12 meses Informações Importantes Observações *A bateria poderá, dependendo das configurações de uso, proporcionar o tempo de utilização informado acima, sem a necessidade de plugar o notebook na tomada mais próxima.', 'acer-F5-573-51LJ.jpg', 2249.10),
(60, 'Notebook Lenovo Ideapad 320 80YH0006BR Intel Core i5-7200U 8GB 1TB 2.5GHz 15,6 Windows 10 Prata', 'Conexões HDMI; 2 x USB 3.0; 1 x USB tipo C (USB 3.0); RJ-45. Touchpad Capacidade	8 GB	Expansível	Sim	16GB. Barramento da memória	DDR4 Clock da memória	2133MHz.', 'lenovo80YH0006BR.jpg', 2006.99),
(61, 'Notebook Asus Z550MA-XX005T Intel Celeron Quad Core N2940 4GB 500GB 2,25GHz Windows 10 Branco', 'A tela de 15.6” do Z550MA-XX005T desenvolvido pela Asus é ideal para exercer atividades mais visuais, inclusive por carregar o tão intuitivo sistema operacional Windows 10. São 500 GB de armazenamento e 4GB de memória RAM capazes de garantir excelente processamento de cada ação guiada pelo notebook. Todas as conexões presentes no aparelho aumentam ainda mais as possibilidades de função e são elas WiFi, Bluetooth, HDMI, USB 2.0 e 3.0 e Leitor de Cartão SD (SDHC/SDXC), MMC. Ethernet: 10/100/1000 Mbps Drive Óptico: DVD-RW RW/DL 8x 8.9"mm Tipo de Teclado: Chiclete Audio: Built-in speaker, Built-in microphone e Sonic Master\r\n', 'asusZ550MA-XX005T.jpg', 1499.00),
(62, 'Mini System LG CJ65', 'O Mini System CJ65 vai revolucionar sua experiência sonora. Com 810 watts de potência e muitas funcionalidades, o mini system LG possui entrada USB, função karaokê para você mostrar seu talento como interprete e se tornar a estrela da festa. LG Music Flow Bluetooth Agora ficou fácil controlar seu mini system LG. Baixe o aplicativo LG, controle o aparelho pelo seu Smartphone. Faça playlists, controle a iluminação das caixas com a facilidade da conexão multi Bluetooth. ALG desenvolve seus produtos com o que há de melhor em tecnologia e matéria-prima para suprir a necessidade de consumidores que adoram ouvir músicas em alto e bom som. Surpreenda-se com a qualidade sonora do Mini System CJ65 XBoom.', 'lgCJ65.jpg', 901.55),
(63, 'Mini System Torre Sony MHC-V7D', 'Festas grandes requerem um sistema de som grande. Com o New Sound Pressure Horn, o MHC-V7D produz um nível de pressão sonora incrível em um design compacto em forma de torre. Incremente a festa com controles de gestos; mude as luzes de LED dos alto-falantes, acrescente efeitos de DJ ou simplesmente pule uma faixa com um único movimento. O cone de woofer de 25 cm (9,8 pol) produz batidas muito fortes, foi construído para graves impactantes.', 'sonyMHC-V7D.jpg', 2099.00),
(64, 'Mini System Sony Shake X3D', 'O Mini System Box Shake X3d É Um Mini System De 3 Unidades, Contendo Uma Unidade Principal E Dois Speakers, Possui Ótima Qualidade De Som E Muita Pressão Sonora. Possui Função Dj Effect Que Permite Você Fazer Diversos Efeitos Nas Músicas E Se Tornar O Dj De Sua Festa, E Também Conectividade Bluetooth E Nfc, Permitindo Que Você Ouça As Músicas Do Seu Celular, Tablet Ou Outro Aparelho, Sem A Necessidade De Fios. Traz A Nova Tecnologia Sound Pressure Horn Que Aumenta A Pressão Sonora E As Frequências Graves, Emitindo Sons Mais Claros E Sem Distorção, Economizando Energia (Comparado Aos Modelos De 2014). Possui Led Speaker Multicolorido Que Iluminam Os Falantes Conforme A Batida Da Música, Deixando Sua Festa Ainda Mais Animada, Além De Leitor De Dvd, Permitindo Que Você Conecte O Mini System À Tv E Melhore Ainda Mais O Áudio Do Filme Que Queira Assistir. Com O Aplicativo Songpal E Novo Modo Fiestable, Você Ainda Consegue Controlar O Mini System Pelo Seu Smartphone E Gravar Até 3 Frases De Voz Para Tocar Durante Sua Festa.\r\n', 'sonyshakeX3D.jpg', 2098.99),
(65, 'Mini System Multilaser SP141', 'Performance e qualidade de um Mini System pronto para qualquer espaço. Pratico e com designer moderno ele possui 2.0 Canais e uma potência de 30W. Reproduz CD, DVD, MP3 e e você ainda pode ouvir suas musicas através da entrada USB.', 'multilaserSP141.jpg', 275.40),
(66, 'Smart TV LED 43 Samsung 4K 43MU6100 Conversor Digital', 'Aproveite todos os detalhes da melhor resolução do mercado com a certificação das principais associações internacionais do setor. Com HDR Premium experimente um novo patamar de brilho e contraste que te permite visualizar claramente diferenças entre cenas claras e escuras. Volte a assistir seu conteúdo preferido em 3 cliques: com um simples clique em seu controle, acesse a tela inicial com seus conteúdos, configurações, dispositivos e canais de TV. Se preferir, utilize o App Smart View e controle tudo pelo seu smartphone. Os melhores conteúdos com séries e filmes no conforto de sua casa! Jogue seus games favoritos por streaming ou pelo exclusivo Steam Link. Com 4 vezes mais detalhes que a resolução Full HD a Samsung garante o melhor da tecnologia 4K com painéis ¿RGB¿ genuínos em suas TVs UHD. Não leve susto, 4K de verdade é Samsung.\r\n', 'samsung43MU6100.jpg', 2999.00),
(67, 'Smart TV LED 49\'\' 4K LG 49UJ6565 Sistema Webos 3', 'Detalhes do produto: LG: Smart TV LED 49" Ultra HD 4K LG 49UJ6565 com Sistema WebOS 3.5, Wi-Fi, Painel IPS, HDR, Local Dimming, Magic Mobile Connection, HDMI e USB A Smart TV 4K LG 49UJ6565 irá te surpreender em tecnologia e inovação. Ela possui resolução 4K com 4x mais detalhes que o Full HD você tem imagens de qualidade excepcional, devido ao tamanho dos seus pixels, é possível ficar mais próximo da tela sem sentir nenhum cansaço visual. O HDR é um método de captação de imagem que capta e combina imagens em diferentes exposições, entregando uma qualidade de brilho e contraste superior, com uma riqueza de detalhes nunca vista antes. Os recursos Smart da TV LG 49UJ6565 não deixam a desejar, sua plataforma WebOS 3.5 está mais rápida e intuitiva, oferecendo diversas funções e entregando melhor experiência. Você pode conectar seu smartphone e compartilhar conteúdos de maneira fácil e rápida com o recurso Magic Mobile Connection. Além disso, as bordas ultrafinas da TV LG 49UJ6565 entrega um design arrojado para sua sala. Clique e confira o manual disponível do produto e tire todas as dúvidas Arquivo 1 Características Controle remoto Sim Conversor para TV digital integrado sim Características Gerais QUALIDADE DE IMAGEM Resolução Ultra HD 4K O Ultra HD 4K é o futuro da definição de imagem. Com mais de 8 milhões de pixels, você tem imagens com um nível incrível de detalhes e pode ter uma TV maior mesmo em uma sala pequena. Upscaler 4K O Upscaler 4K permite que você curta todos os seus conteúdos, mesmo os de baixa resolução, com a máxima qualidade Ultra HD 4K! HDR Ao captar e combinar imagens em diferentes exposições (maior e menor exposição), o conteúdo em HDR entrega uma qualidade de brilho e contraste superior, com uma riqueza de detalhes nunca vista antes. Painel IPS 4K O painel IPS 4K oferece excelente qualidade de imagem com 4x mais resolução que o Full HD. E não importa onde você esteja sentado, você sempre tem o melhor ângulo de visão. Local Dimming Através da função Local Dimming, o televisor ajusta o brilho por todo o painel através de blocos, entregando um contraste e um brilho mais fiel. ', 'LG-49UJ6565.jpg', 3499.90),
(68, 'Smart TV 28\'\' Monitor LED LG 28MT49S-PS Preta', 'Descrição do produto  O TV Monitor Smart da LG 28MT49S, foi desenvolvido para atender a grande demanda por TVs conectadas no mercado brasileiro. Design, tecnologia e portabilidade em um só produto!É um produto smart, ou seja pronto para acessar e desfrutar de um mundo de conteúdo na web. Como principal diferencial, possui conectividade wi-fi integrado e sistema operacional webOS 3.5 da LG (sua versão mais atual), e que combinados, proporcionam uma experiência fluida e super intuitiva para navegar em busca de conteúdos.  TV SMARTÉ a TV conectada, a TV com internet! Um mundo de entretenimento através de conteúdos da web. Acesse a serviços de vídeos e músicas em streaming diretamente da internet. webOS 3.5É o sistema operacional da LG para Smart TVs. Ele facilita e deixa tudo mais intuitivo na sua TV conectada a internet', 'LG28MT49S-PS.jpg', 1199.10),
(69, 'Smart TV LED 43 Philips 4K Ultra HD 43PUG6102/78 Conversor Digital Wi-Fi 4 HDMI 2 USB DTVi', 'TV LED Smart ultrafina 4K com Pixel Plus Ultra HD. Conectividade exclusiva, versátil e elegante. A TV Philips 6100 proporciona qualidade de imagem HD ultra 4K com riqueza de detalhes. Com a conexão da Smart TV, você terá fácil acesso ao entretenimento.A TV Ultra HD tem 4 vezes a resolução de uma TV Full HD convencional. Com mais de 8 milhões de pixels e nossa tecnologia de Redimensionamento Ultra Resolution exclusiva, você curtirá a melhor qualidade de imagem. Quanto maior a qualidade de seu conteúdo original, melhor imagem e resolução para você aproveitar. Aproveite melhor nitidez, maior percepção de profundidade, contraste superior, movimentos naturais e detalhes incríveis.Experimente a nitidez do Ultra HD 4K com o mecanismo Pixel Plus Ultra HD da Philips. Ele otimiza a qualidade da imagem para proporcionar imagens fluidas perfeitas com detalhes e profundidade incríveis. Desfrute de imagens 4K mais nítidas com brancos mais brilhantes e pretos mais intensos, sempre.Descubra uma experiência mais inteligente que há além da tradicional transmissão e locação de filmes, vídeos ou jogos a partir de lojas de vídeo on-line. Assista ao catch-up TV de seus canais favoritos e desfrute de uma ampla seleção de aplicativos on-line com a Smart TV.', 'philips4K-43PUG6102-78.jpg', 2099.00),
(70, 'Forno de Micro-ondas Brastemp BMJ38AR Ative 38l Inox 110v', 'Luz interna Display digital Trava de segurança Grill', 'BMJ38AR.jpg', 1027.46),
(71, 'Microondas Brastemp Ative BMS45BBHNA 30L Branco 110V', 'O micro-ondas Brastemp Ative! 30 litros garante maior performance nas suas receitas. Função Adiar Preparo: Essa opção permite você a adiar o tempo final de aquecimento de pratos de acordo com sua preferência, para ajustar o micro-ondas ao seu ritmo. Tecla Meu Jeito: Guarda na memória como você gosta dos seus pratos.\r\n', 'BMS45BBHNA.jpg', 429.90),
(72, 'Lavadora & Secadora Samsung WD10J6410AX Crystal Blue Inox Look 10.2Kg', 'bertura: Front Load Programas de Lavagem: 14 Programas de Secagem: 14 Painel: Eletrônico Temperatura de Água: Quente e fria Nível Automático de Água: Sim Opções de Centrifugação: Enxaguar + centrifugar Velocidade de Centrifugação: 1400 rpm Função Adiar a Centrifugação Filtro Elimina Fiapos', 'WD10J6410AX.jpg', 2802.41),
(73, 'Lavadora de Roupas Electrolux 13kg Branca 110V LTD13', 'A lavadora de roupas Electrolux LTD13 tem capacidade de 13Kg para lavar as peças da família inteira e ainda pode reaproveitar a água com o botão economia. Para ajudar na secagem das roupas utilize a opção turbo secagem. Assim as roupas secas vão mais rápido para o guarda roupa. Possui 4 níveis de água e 12 programas de lavagem que ajuda a limpar cada tipo de peça com eficiência. As roupas menos sujas podem ser lavadas em apenas 19 minutos. É muita praticidade e rapidez no dia a dia. Aproveite para cotar e economizar no JáCotei. Além disso, são pontos ou milhas para você!', 'electroluxLTD13.jpg', 1229.00),
(74, 'Fogão de Piso Atlas Mônaco Glass 4 Bocas Branco', 'Mesa em aço inox sobreposta 02 queimadores família Tampa de vidro sem puxador Manipuladore removíveis Vidro total na porta do forno 01 grade fixa no forno Pés altos Forno autolimpante', 'atlasglass.jpg', 349.00),
(75, 'Refrigerador Electrolux TF51 Frost Free 433 Litros Branco', 'Painel blue touch Gavetão de frutas e legumes Drink Express Turbo Freezer Ice Twister Alarme sonoro na porta	Recipiente para Bebidas Geladas	Controle de temperatura externo', 'TF51FF.jpg', 2099.00),
(76, 'Refrigerador Consul CRM54BK Frost Free Duplex 441 Litros Inox', 'O eficiente Refrigerador Consul CRM54BK, possui capacidade para até 441 litros e dimensões de 187,1 centímetros de altura por 71,1 cm de largura. Além de moderno, ele apresenta um design elegante, capaz de deixar qualquer cozinha muito mais bonita. Com seu controle interno de temperatura, você ajusta a temperatura da sua geladeira de acordo com o ambiente e intensidade de uso. Além disso, possui compartimento extra frio e filtro Bem Estar, que elimina os cheiros desagradáveis de seu refrigerador. E mais: com o sistema Frost Free, não precisa descongelar nunca!', 'CRM54BK.jpg', 2149.00),
(77, 'Playstation 4 Slim 500GB Sony', 'O novo PlayStation®4 Slim abre portas para viagens extraordinárias através de novos mundos de jogos envolventes e uma comunidade de jogadores profundamente conectada.Somente no PlayStationVocê veio ao lugar certo. Jogos exclusivos irão te levar a incríveis jornadas, desde indies aclamados pela crítica até premiados sucessos AAA como Uncharted 4: A Thief’s End™DUALSHOCK®4O controle wireless DUALSHOCK®4 apresenta controle familiar incorporando novas formas de interagir com o jogo e outros jogadores.', 'ps4slim500.jpg', 1499.00),
(78, 'PlayStation 4 Sony 1TB', 'O console PS4 da Sony é perfeito para você jogar com seus amigos, pois ele tem recursos de segunda tela inovadores. Os gráficos são ricos e de alta velocidade, sua personalização é inteligente e você conta com funcionalidades sociais altamente integradas. Ele combina um conteúdo que você nunca viu igual, uma incrível experiência de jogo, além de todos os aplicativos exclusivos do Playstation. O PS4 é centrado nos jogadores, permitindo que joguem quando, onde e como quiserem. Aproveite todas essas vantagens! Encontre o melhor preço e garanta o seu.', 'ps4.jpg', 1549.00),
(79, 'Xbox One Microsoft 1Tb + Jogo Halo 5 Guardians', 'O Xbox One reúne os melhores jogos exclusivos, o modo multijogador mais avançado e uma experiência de entretenimento que você não encontrará em nenhum outro lugar. Esse bundle vem com o jogo Halo 5: Guardians quando a paz é destruída quando as colônias sofrem um ataque inesperado...\r\n', 'xboxone.jpg', 1799.99),
(80, 'Jogo Fifa 18 Playstation 4 Sony', 'Data de lançamento sujeito a alteração pelo fabricante   Com a tecnologia Frostbite™, o EA SPORTS™FIFA 18 elimina o limite entre o mundo virtual e o real, dando vida aos jogadores, times e climas envolventes do maior esporte do mundo. Use a Tecnologia de Movimentação Real de Jogadores para vivenciar os Momentos mais Emocionantes nos intensos Climas Envolventes do mundo do futebol. Acompanhe uma trajetória global com o elenco de craques que participam de "A Jornada: A Volta de Hunter". No FIFA Ultimate Team™, os Ídolos do FUT trazem Ronaldo Nazário e outras lendas do futebol para o FIFA 18   RECURSOS DO JOGO - Tecnologia de Movimentação Real de Jogadores: O sistema de animação inédito e revolucionário oferece a jogabilidade mais responsiva e fluida de toda a série. As novas técnicas de captura de movimento e as transições de animação quadro-a-quadro garantem que a jogabilidade represente adequadamente o futebol real. - Personalidade dos jogadores: Seis novos arquétipos de personagem e a inédita tecnologia de mapeamento vão diferenciar os jogadores em campo, dando a eles sua identidade exclusiva. Pela primeiríssima vez, os movimentos, tamanho e atributos realistas indicam como um jogador se movimenta, deixando você sentir as características reais dos melhores do mundo. O pique característico do Cristiano Ronaldo, as viradas únicas do Sterling e o movimento de braço do Robben são reconhecidos imediatamente no FIFA 18.', 'fifa18ps4.jpg', 200.00),
(81, 'GTA V Xbox 360 Microsoft', 'Desenvolvido pelos criadores da série Grand Theft Auto, o estúdio Rockstar North, Grand Theft Auto V é o maior e mais ambicioso episódio já feito. Situado na intrigante cidade de Lost Santos e seus arredores, Grand Theft Auto V apresenta a você um mundo de uma dimensão e de detalhes nunca vistos, desde picos de montanhas até as profundezas do oceano. Com uma nova visão de liberdade em mundo aberto, jogabilidade com missões e diversos modos online, Grand Theft Auto V é focado na eterna busca pelo dólar em uma releitura moderna do sul da Califórnia.', 'gta5xbox.jpg', 129.00),
(82, 'Jogo Call of Duty Infinite Warfare Activision Playstation 4 Sony', 'Call of Duty: Infinite Warfare é um jogo desenvolvido pela Activision para o console PlayStation 4. Nesta edição da franquia de tiro em primeira pessoa, o gamer será lançado em uma guerra futurista de grande escala, com batalhas épicas e narrativa imersiva. Recomendado para maiores de 16 anos, o jogo permite os modos local (1-2) e em rede (1-18). Contexto A história se desenrola em um futuro em que o conflito humano é realidade além da Terra. Com os recursos naturais esgotados, o planeta depende de colônias espalhadas pelo sistema solar para reunir novas fontes de energia. Mas o estilo de vida vigente é ameaçado pelo Assentamento Front de Defesa (AssDef), facção composta por dissidentes que decidem controlar os postos e as riquezas encontradas, oprimindo os países e sua população. Missão Ao incorporar o Capitão Reyes e assumir o comando da Retribuition - uma das últimas naves de guerra da Terra -, o jogador tem como objetivo abrir fogo com novas armas em ambientes interplanetários inéditos para derrotar o AssDef. Modos de jogo Além do modo Campanha, o jogo conta com os modos Multiplayer, que apresenta sistema de movimento em cadeia com riscos, escolhas e consequências “reais”, elevando a jogabilidade, e Zumbis, que proporciona uma narrativa mais divertida.', 'calldutyps4.jpg', 50.99),
(83, 'Deus Ex Mankind Divided Xbox One Microsoft', 'Deus Ex: Mankind Divided é a continuação de Deus Ex: Human Revolution. O ano é 2029, e o mundo se dividiu entre aqueles que estão melhorados com partes robóticas e os que não foram modificados. As pessoas que foram melhorados com partes robóticas são julgados como párias da sociedade; são excluídos e vivem totalmente segregados do restante do mundo. Você irá controlar novamente Adam Jensen, agora um experiente agente, forçado a operar num mundo que o despreza, usando armas e partes robóticas de última geração. Produto em pré-venda, com data e conteúdo extra a serem confirmados pelo fabricante. Recomendamos comprar apenas um título de pré-venda por pedido, para garantir o envio imediato (assim que o jogo chegar na loja). Para compras com dois títulos diferentes no mesmo pedido, o mesmo será enviado quando ambos forem lançados.', 'deuxexxbox.jpg', 42.66),
(84, 'Auto Radio Pioneer MVH-88UB MP3 USB', 'Com o media receiver mvh-88ub você encara o trânsito numa boa: é só plugar seu pen drive ou smartphone com android 2 na entrada usb frontal, para curtir suas playlists favoritas. ele reproduz arquivos nos formatos mp3, wma, wav e flac, além de oferecer recursos para que você personalize o seu som, como o equalizador gráfico de 5 bandas e o reforçador de graves e a iluminação vermelha dos botões dá um toque especial ao painel do seu carro', 'mvh-88ub.jpg', 180.12),
(85, 'MP3 Automotivo Naveg NVS3030CR + Câmera de Ré', 'Reprodutor e Leitor de MP3 Display LCD 3? com alta definição Com sintonizador de FM , Faixa de frequência FM : 875~108MHZ 18 estações de FM pré-selecionada , busca de estações, scan de estações Painel fixo Saída de Potência: 45w, max saída de potência:4*45W Entrada USB, entrada para cartão SD-MMC Suporta os seguintes formatos de Vídeo MPEG1/ MPEG2/ MPEG4/ DIVX/ RMVB/ H264/ H 263 Suporta os seguintes formatos de Áudio MP3/ WMA/ OGG/ FLAC/ APE/ AAC Suporta as seguintes formatos de fotos JPEG / BMP/ GIF/ PNG Entrada AUX & Saída RCA', 'nvs3030cr.jpg', 140.50),
(86, 'Pneu Michelin 205/55 R16 91V Primacy 3 GRNX', 'Desenvolvido para oferecer segurança e ótima relação custo-benefício as demais opções do mercado, os pneus Michelin atendem as exigências dos automóveis de uso no dia-a-dia, representando uma excelente opção aos consumidores que buscam uma alternativa econômica. O novo pneu Michelin Primacy 3 é 3 vezes mais seguro! Frenagem no seco, freia até 3 metros antes em piso seco, reduzindo o risco de acidentes. Frenagem no molhado, freia até 4 metros antes em piso molhado, reduzindo o risco de acidentes. Aderência nas curvas, com o pneu Michelin Primacy 3, o carro possui maior aderência em curvas e em piso molhado, proporcionando ao condutor um controle da trajetória 12% superior à média dos concorrentes. Transforme sua viagem em uma aventura ainda mais divertida e livre de problemas com estes pneus.', '20555R1691V.jpg', 254.80),
(87, 'Dvd Automotivo Pioneer AVH-298BT 6.2', 'Padrão de cores (NTSC / PAL / SECAM) Iluminação dos botões – azul Super resolução WVGA (480 x 800 x 3) pixels Sincronização de agenda telefônica e busca alfabética Potência de saída contínua (RMS) 23 W x 4 a 4 ohms Conexão Bluetooth - ligações telefônicas e streaming de áudio', 'avh298bt.jpg', 664.91);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_caracteristicas`
--

CREATE TABLE `produtos_caracteristicas` (
  `produto_id` int(4) NOT NULL,
  `caracteristica_id` int(4) NOT NULL,
  `caracteristica_valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos_caracteristicas`
--

INSERT INTO `produtos_caracteristicas` (`produto_id`, `caracteristica_id`, `caracteristica_valor`) VALUES
(1, 1, '85cm'),
(1, 2, '10,1Kg'),
(1, 3, 'branca'),
(1, 4, '60cm'),
(1, 5, 'bivolt'),
(1, 6, '71kg'),
(1, 8, 'WF106U4SAWQ'),
(2, 5, 'bivolt'),
(2, 3, 'preto'),
(2, 3, 'LED'),
(2, 8, 'UN32J4300AGXZD'),
(2, 6, '7kg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_categorias`
--

CREATE TABLE `produtos_categorias` (
  `produto_id` int(4) NOT NULL,
  `categoria_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos_categorias`
--

INSERT INTO `produtos_categorias` (`produto_id`, `categoria_id`) VALUES
(1, 1),
(2, 3),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 3),
(53, 6),
(54, 3),
(54, 6),
(55, 3),
(55, 6),
(56, 6),
(57, 6),
(58, 6),
(59, 6),
(60, 6),
(61, 6),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 5),
(78, 5),
(79, 5),
(80, 5),
(81, 5),
(82, 5),
(83, 5),
(84, 4),
(85, 4),
(86, 4),
(87, 4);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`caracteristica_id`),
  ADD UNIQUE KEY `caracteristica_id` (`caracteristica_id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`),
  ADD UNIQUE KEY `cliente_email_unique` (`cliente_email`);

--
-- Índices de tabela `clientes_endereco`
--
ALTER TABLE `clientes_endereco`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `preco_indice` (`produto_preco`),
  ADD KEY `nome_indice` (`produto_nome`);
ALTER TABLE `produtos` ADD FULLTEXT KEY `produto_nome` (`produto_nome`,`produto_descricao`);

--
-- Índices de tabela `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  ADD UNIQUE KEY `produto_categoria_unique` (`produto_id`,`categoria_id`),
  ADD KEY `produto_categoria_index` (`produto_id`,`categoria_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `caracteristica_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
