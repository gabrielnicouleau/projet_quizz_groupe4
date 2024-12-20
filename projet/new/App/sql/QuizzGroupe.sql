CREATE DATABASE IF NOT EXISTS quizz CHARSET utf8mb4;
USE quizz;

CREATE TABLE IF NOT EXISTS utilisateur(
id_utilisateur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
pseudo_utilisateur VARCHAR(50) NOT NULL,
email_utilisateur VARCHAR(150) NOT NULL UNIQUE,
mdp_utilisateur VARCHAR(100) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS question(
id_question INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
texte_question VARCHAR(255) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS reponse(
id_reponse INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
texte_reponse VARCHAR(255) NOT NULL,
correcte VARCHAR(255) NOT NULL,
id_question INT
)Engine=InnoDB;

ALTER TABLE reponse
ADD CONSTRAINT fk_reponse_question
FOREIGN KEY(id_question)
REFERENCES question(id_question);

INSERT INTO question (texte_question) VALUES 
('Quel langage de balisage est utilisé pour créer la structure d\'une page web ?'),
('Quel langage est principalement utilisé pour styliser les pages web ?'),
('Quel langage de programmation est principalement utilisé pour les interactions côté client dans les pages web ?'),
('Qu\'est-ce que HTML signifie ?'),
('Quel attribut dans HTML est utilisé pour spécifier l\'URL d\'un lien hypertexte ?'),
('Quel est le nom du fichier par défaut généralement servi par un serveur web ?'),
('Quel framework JavaScript est connu pour son utilisation de composants et son approche déclarative ?'),
('Quel protocole est utilisé pour transférer des pages web sur Internet ?'),
('Quel est l\'acronyme pour Cascading Style Sheets ?'),
('Quel est l\'outil de gestion de versions le plus utilisé pour le développement de logiciels ?'),
('Quel est le nom d\'un framework CSS populaire pour créer des sites web réactifs ?'),
('Quel est l\'acronyme pour JavaScript Object Notation ?'),
('Quel est le nom du langage de requête utilisé pour gérer et manipuler des bases de données relationnelles ?'),
('Quelle est la version la plus récente de HTML ?'),
('Quel framework côté serveur est basé sur JavaScript et utilise le moteur V8 de Chrome ?'),
('Quel est le nom du fichier de configuration utilisé par Git pour suivre l\'historique des versions ?'),
('Quelle méthode HTTP est utilisée pour envoyer des données au serveur pour créer une nouvelle ressource ?'),
('Quel est le nom du préprocesseur CSS qui ajoute des fonctionnalités comme les variables et les mixins ?'),
('Quel framework de test est couramment utilisé pour les applications Node.js ?'),
('Quel langage de balisage léger est couramment utilisé pour écrire de la documentation et des fichiers README ?');

INSERT INTO reponse (texte_reponse, correcte, id_question) VALUES 
('HTML', 'HTML', 1),
('XML', 'non', 1),
('SGML', 'non', 1),
('XHTML', 'non', 1),

('CSS', 'CSS', 2),
('JavaScript', 'non', 2),
('HTML', 'non', 2),
('PHP', 'non', 2),

('JavaScript', 'JavaScript', 3),
('PHP', 'non', 3),
('Ruby', 'non', 3),
('Python', 'non', 3),

('HyperText Markup Language', 'HyperText Markup Language', 4),
('Hyperlink and Text Markup Language', 'non', 4),
('Hyper Transfer Markup Language', 'non', 4),
('HyperTool Markup Language', 'non', 4),

('href', 'href', 5),
('src', 'non', 5),
('alt', 'non', 5),
('title', 'non', 5),

('index.html', 'index.html', 6),
('default.html', 'non', 6),
('home.html', 'non', 6),
('main.html', 'non', 6),

('React', 'React', 7),
('Angular', 'non', 7),
('Vue', 'non', 7),
('Backbone', 'non', 7),

('HTTP', 'HTTP', 8),
('FTP', 'non', 8),
('SMTP', 'non', 8),
('SSH', 'non', 8),

('CSS', 'CSS', 9),
('CJS', 'non', 9),
('CCS', 'non', 9),
('CSV', 'non', 9),

('Git', 'Git', 10),
('Subversion', 'non', 10),
('Mercurial', 'non', 10),
('CVS', 'non', 10),

('Bootstrap', 'Bootstrap', 11),
('Foundation', 'non', 11),
('Bulma', 'non', 11),
('Tailwind', 'non', 11),

('JSON', 'JSON', 12),
('AJAX', 'non', 12),
('JQuery', 'non', 12),
('XML', 'non', 12),

('SQL', 'SQL', 13),
('NoSQL', 'non', 13),
('MongoDB', 'non', 13),
('GraphQL', 'non', 13),

('HTML5', 'HTML5', 14),
('HTML4', 'non', 14),
('XHTML', 'non', 14),
('DHTML', 'non', 14),

('Node.js', 'Node.js', 15),
('Deno', 'non', 15),
('Express', 'non', 15),
('Meteor', 'non', 15),

('.git', '.git', 16),
('.gitignore', 'non', 16),
('.gitattributes', 'non', 16),
('.gitconfig', 'non', 16),

('POST', 'POST', 17),
('GET', 'non', 17),
('DELETE', 'non', 17),
('PUT', 'non', 17),

('Sass', 'Sass', 18),
('Less', 'non', 18),
('Stylus', 'non', 18),
('PostCSS', 'non', 18),

('Mocha', 'Mocha', 19),
('Jasmine', 'non', 19),
('Jest', 'non', 19),
('Karma', 'non', 19),

('Markdown', 'Markdown', 20),
('LaTeX', 'non', 20),
('BBCode', 'non', 20),
('reStructuredText', 'non', 20);