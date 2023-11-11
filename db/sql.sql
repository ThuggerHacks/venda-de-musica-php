CREATE DATABASE musica;
use musica;

CREATE TABLE user(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR
(100) CHECK
(nome!=""),
    senha VARCHAR
(100) CHECK
(senha!=""),
    bi   VARCHAR
(13) NOT NULL,
    celular  VARCHAR
(12),
    workspace   VARCHAR
(50),
    endereco VARCHAR
(100),
    genero  VARCHAR
(10),
    data_nascimento  VARCHAR
(12)
);

CREATE TABLE funcionario(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR
 (100) CHECK
(nome!=""),
	seccao   VARCHAR
(50),
	licenca  VARCHAR
(50)
);

CREATE TABLE projecto (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tipo   VARCHAR
(15),
    duracao  VARCHAR
(10),
    artista   VARCHAR
(50),
    genero   VARCHAR
(50),
    ano_lancamento  VARCHAR
(50),
    titulo  VARCHAR
(50),
    preco  DECIMAL,
    num_faixa  INT,
	amostra varchar
(200),
    capa  VARCHAR
(200),
	tipo_fita VARCHAR
(50),
	modo_gravacao VARCHAR
(50),
   lados_dvd VARCHAR
(50),
	quantidade int
);

CREATE TABLE venda
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    project_id INT NOT NULL,
    tipo VARCHAR
(20),
    FOREIGN KEY
(user_id) REFERENCES user
(id) ON
DELETE CASCADE,
    FOREIGN KEY (project_id)
REFERENCES projecto
(id) ON
DELETE CASCADE
);

CREATE TABLE carrinho
(
    id INT UNIQUE PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    project_id INT NOT NULL,
    quantidade int not null,
    FOREIGN KEY
(user_id) REFERENCES user
(id) ON
DELETE CASCADE,
    FOREIGN KEY (project_id)
REFERENCES projecto
(id) ON
DELETE CASCADE
);

CREATE TABLE pedidosValidados
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    project_id INT NOT NULL,
    quantidade int not null,
    tipo VARCHAR
(20),
    FOREIGN KEY
(user_id) REFERENCES user
(id) ON
DELETE CASCADE,
    FOREIGN KEY (project_id)
REFERENCES projecto
(id) ON
DELETE CASCADE
);

Select*from user;


-- INSERCAO DE DADDOS

INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('1', 'Cd', '1', 'Kabza de Small', 'Amapiano', '2022', 'Ziwangale', '800', '4', 'Ebusuku', 'kabza', '--', '--', '--', '10');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('2', 'Cd', '3', 'Scorpion Kings', 'Amapiano', '2022', 'Live 2.0', '1200', '7', 'Abajuluke', 'Cover', '--', '--', '--', '15');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('3', 'Cd', '3', 'Caiiro', 'Afro House', '2020', 'The future is now', '1000', '6', 'Caiiro', 'Cairo', '--', '--', '--', '20');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('4', 'Cassete', '4', 'Cef Tanzy', 'Kizomba', '2021', 'The Coach', '950', '12', 'cef', 'cef', 'Cromada', '--', '--', '18');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('5', 'Casete', '5', 'Rui Orlano', 'Kizomba', '2022', 'Consagracao', '899', '12', 'Rui', 'ru', 'Normal', '--', '--', '20');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('6', 'Cd', '5', 'Prince Kaybee', 'Afro House', '2020', 'Iam Music', '1000', '10', 'Charlotte', 'pk', '--', '--', '--', '10');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('7', 'Cassete', '3', 'Scorpion Kings', 'Amapiano', '2020', 'Live', '1000', '12', 'Funu', 'Cover', 'Cromada', '--', '--', '8');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('8', 'Dvd', '5', 'Dj Pyto', 'Afro Beat', '2022', 'Meu espaco Meu Mundo', '1100', '12', 'pyto', 'cap', '--', '--', 'Simples', '17');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('9', 'Dvd', '4', 'Kelvin Momo', 'Amapiano', '2021', 'Private School Piano', '1100', '12', 'KelvinMomo', 'km', '--', '--', 'Dupla-Face', '9');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('10', 'Cd', '2', 'Focalist', 'Amapiano', '2021', 'President Ya Straata', '800', '7', 'Paranoia', 'capa', '--', '--', '--', '10');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('11', 'Dvd', '1', 'The Broken Boyz', 'Drums', '2022', 'Xikala Vitu', '600', '5', 'Xibamo', 'th', '--', '--', 'Dupla Face', '7');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('12', 'Fita-Video', '5', 'Kelvin Momo', 'Amapiano', '2021', 'Private School Piano', '999', '12', 'vlc-record-2022-11-09-03h06m09s-Kelvin_Momo_-_Funa_[Feat._TBO_and_JaySax]_(Official_Music_Video)(480p).mp4-', 'km', '--', 'EP', '--', '5');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('13', 'Cd-Video', '6', 'Scorpion Kings', 'Amapiano', '2020', 'Live', '899', '12', 'vlc-record-2022-11-09-03h06m47s-Kabza_De_Small_&_DJ_Maphorisa_-_Hello_(Official_Video)_ft._Madumane(480p).mp4-', 'Cover', '--', '--', '--', '8');
INSERT INTO `musica`.`projecto` (`id`, `tipo`, `duracao`, `artista`, `genero`, `ano_lancamento`, `titulo`, `preco`, `num_faixa`, `amostra`, `capa`, `tipo_fita`, `modo_gravacao`, `lados_dvd`, `quantidade`) VALUES ('14', 'Fita-Video', '5', 'Cef Tanzy', 'Kizomba', '2021', 'The Coach', '650', '12', 'vlc-record-2022-11-09-03h07m28s-Cef_Tanzy_-_Volume_No_Máximo_(Vídeo_Oficial)(480p).mp4-', 'cef', '--', 'SP', '--', '10');

